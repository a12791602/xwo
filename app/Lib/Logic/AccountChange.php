<?php
namespace App\Lib\Logic;

use App\Models\User\Fund\FrontendUsersAccount;
use App\Models\User\Fund\FrontendUsersAccountsTypesParam;
use App\Models\User\Fund\FrontendUsersAccountsReportsParamsWithValue;
use Illuminate\Support\Facades\Log;
use App\Models\User\Fund\FrontendUsersAccountsReport;
use App\Models\User\Fund\FrontendUsersAccountsType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * 帐变主逻辑
 * Class AccountChange
 * @package App\Lib\Moon
 */
class AccountChange
{
    public const FROZEN_STATUS_OUT = 1;
    public const FROZEN_STATUS_BACK = 2;
    public const FROZEN_STATUS_TO_PLAYER = 3;
    public const FROZEN_STATUS_TO_SYSTEM = 4;
    public const FROZEN_STATUS_BONUS = 5;
    public const FROZEN_STATUS_LOTTERY_WIN = 6;

    public const MODE_CHANGE_AFTER = 2;
    public const MODE_CHANGE_NOW = 1;

    public const MODE_REPORT_AFTER = 2;
    public const MODE_REPORT_NOW = 1;

    /**
     * @var integer
     */
    public $reportMode = 1;
    /**
     * @var integer
     */
    public $changeMode = 1;

    /**
     * @var array
     */
    public $changes = [];
    /**
     * @var array
     */
    public $reports = [];
    /**
     * @var array
     */
    public $accounts = [];

    /**
     * @param integer $mode 设置报表保存模式.
     * @return integer
     */
    public function setReportMode(int $mode)
    {
        $this->reportMode = $mode;
        return 1;
    }

    /**
     * @param integer $mode 设置帐变保存模式.
     * @return integer
     */
    public function setChangeMode(int $mode)
    {
        $this->changeMode = $mode;
        return 1;
    }

    /**
     * @param object $account UserObj.
     * @param string $type    Sign.
     * @param array  $params  Params.
     * @return string
     */
    public function change(object $account, string $type, array $params)
    {
        try {
            $this->accounts[$account->user_id] = $account;
            return $this->doChange($account, $type, $params);
        } catch (\Exception $e) {
            Log::channel('account')->error('error-'.$e->getMessage().'|'.$e->getLine().'|'.$e->getFile());
            return $e->getMessage();
        }
    }

    /**
     * @param object $account  UserObj.
     * @param string $typeSign Sign.
     * @param array  $params   Params.
     * @return string
     */
    public function doChange(object $account, string $typeSign, array $params)
    {
        $user       = $account->user;
        $typeConfig = FrontendUsersAccountsType::getTypeBySign($typeSign);
        $params['param'] = FrontendUsersAccountsType::where('sign', $typeSign)->first(['param'])->toArray()['param'];
        $typeParams = $params['param'] ?? '';

        //　1. 获取帐变配置
        $paramsValidator = FrontendUsersAccountsType::getParamToTransmit($typeSign);
        // 2. 参数检测
        $validator = Validator::make($params, $paramsValidator);
        if ($validator->fails()) {
            return 'doChange'.$validator->errors()->first();
        }
        // 3. 检测金额
        $amount = abs($params['amount']);
        if (isset($params['frozen_release'])) {
            $frozen_release = abs($params['frozen_release']);
            if ((pack('f', $amount) === pack('f', 0)) && $params['frozen_release'] < 1) {
                return true;
            }
        } else {
            if (pack('f', $amount) === pack('f', 0)) {
                return true;
            }
        }
        // 冻结类型 1 冻结自己金额 2 冻结退还　3 冻结给玩家　4 冻结给系统　5 中奖
        // 资金增减. 需要检测对应
        // 保存记录
        $report = [
            'serial_number'=> self::getSerialNumber(),
            'activity_sign' => $params['activity_sign'] ?? 0,
            'created_at' => date('Y-m-d H:i:s'),
            'desc' => $params['desc'] ?? 0,
            'frozen_type' => $typeConfig['frozen_type'],
            'is_tester' => $user->is_tester,
            'parent_id' => $user->parent_id,
            'process_time' => time(),
            'rid' => $user->rid,
            'sign' => $user->sign,
            'param' => $typeParams,
            'top_id' => $user->top_id,
            'type_name' => $typeConfig['name'],
            'type_sign' => $typeConfig['sign'],
            'in_out' => $typeConfig['in_out'],
            'username' => $user->username,
        ];
        $beforeBalance = $account->balance;
        $beforeFrozen = $account->frozen;
        // 根据冻结类型处理
        switch ($typeConfig['frozen_type']) {
            case self::FROZEN_STATUS_OUT:
                $ret = $this->frozen($account, $amount);
                break;
            case self::FROZEN_STATUS_BACK:
                $ret = $this->unFrozen($account, $amount);
                break;
            case self::FROZEN_STATUS_TO_PLAYER:
            case self::FROZEN_STATUS_TO_SYSTEM:
                $ret = $this->unFrozenToPlayer($account, $amount);
                break;
            case self::FROZEN_STATUS_LOTTERY_WIN:
                $ret = $this->addLotteryWin($account, $amount, $frozen_release);
                break;
            default:
                if ($typeConfig['in_out'] === 1) {
                    $ret = $this->add($account, $amount);
                } else {
                    $ret = $this->cost($account, $amount);
                }
        }
        if ($ret !== true) {
            return '对不起, 账户异常' . $ret . '!';
        }
        $balance = $account->balance;
        $frozen = $account->frozen;
        $report['before_balance'] = $beforeBalance;
        $report['balance'] = $balance;
        $report['frozen_balance'] = $frozen;
        $report['before_frozen_balance'] = $beforeFrozen;
        $change['updated_at'] = date('Y-m-d H:i:s');


        // 4. 兼容扩展表的字段值
        $typeParamM    = FrontendUsersAccountsTypesParam::where('compatible', 1)->get();
        foreach ($typeParamM as $typeParam) {
            switch ($typeParam->param) {
                case 'amount':
                    $report[$typeParam->param] = abs($params[$typeParam->param]);
                    break;
                case 'user_id':
                    $report[$typeParam->param] = $user->id;
                    break;
                default:
                    $report[$typeParam->param] = $params[$typeParam->param] ?? 0;
                    break;
            }
        }
        // 5.根据param 传递的id。获取param存储的值
        $reportWithVal = [];
        $typeParamArr  = explode(',', $typeParams);
        $typeParamM    = FrontendUsersAccountsTypesParam::whereIn('id', $typeParamArr)->get();
        foreach ($typeParamM as $typeParam) {
            switch ($typeParam->param) {
                case 'amount':
                    $reportWithVal[$typeParam->param] = abs($params[$typeParam->param]);
                    break;
                case 'user_id':
                    $reportWithVal[$typeParam->param] = $user->id;
                    break;
                default:
                    $reportWithVal[$typeParam->param] = $params[$typeParam->param] ?? 0;
                    break;
            }
        }
        \DB::beginTransaction();    //子事务
        $lastId = $this->saveReportData($report);
        if (!$lastId) {
            \DB::rollBack();         //子事务回滚
            return false;
        }
        $reportWithVal['parent_id'] = $lastId;
        $saveParamWithStatus        = $this->saveTypeParamWithData($reportWithVal);

        if (!$saveParamWithStatus) {
            \DB::rollBack();         //子事务回滚
            return false;
        }
        \DB::commit();  //子事务回滚
        return true;
    }

    /**
     * @param FrontendUsersAccount $account Account.
     * @param float                $money   Money.
     * @return boolean
     */
    public function add(FrontendUsersAccount &$account, float $money)
    {
        $account = $account->fresh();
        if ($this->changeMode === self::MODE_CHANGE_AFTER) {
            if (isset($this->changes[$account->user_id])) {
                if (isset($this->changes[$account->user_id]['add'])) {
                    $this->changes[$account->user_id]['add'] += $money;
                } else {
                    $this->changes[$account->user_id]['add'] = $money;
                }
            } else {
                $this->changes[$account->user_id] = [];
                $this->changes[$account->user_id]['add'] = $money;
            }
            $account->balance += $money;
            return true;
        } else {
            $account->balance += $money;
            if ($account->save()) {
                $ret = true;
            } else {
                $ret = false;
            }
            return $ret;
        }
    }


    /**
     * 资金增加
     * @param FrontendUsersAccount $account        UserObj.
     * @param float                $money          Money.
     * @param float                $frozen_release Frozen.
     * @return boolean
     */
    public function addLotteryWin(FrontendUsersAccount &$account, float $money, float $frozen_release): bool
    {
        $account = $account->fresh();
        $account->balance += $money;
        $account->frozen -= $frozen_release;
        if ($account->save()) {
            $ret = true;
        } else {
            $ret = false;
        }
        return $ret;
    }

    /**
     * 消耗资金
     * @param FrontendUsersAccount $account User.
     * @param float                $money   Money.
     * @return string
     */
    public function cost(FrontendUsersAccount $account, float $money)
    {
        if ($money > $account->balance) {
            return '对不起, 用户余额不足!';
        }
        if ($this->changeMode === self::MODE_CHANGE_AFTER) {
            if (isset($this->changes[$account->user_id])) {
                if (isset($this->changes[$account->user_id]['cost'])) {
                    $this->changes[$account->user_id]['cost'] += $money;
                } else {
                    $this->changes[$account->user_id]['cost'] = $money;
                }
            } else {
                $this->changes[$account->user_id] = [];
                $this->changes[$account->user_id]['cost'] = $money;
            }
            $account->balance -= $money;
            return true;
        } else {
            $updated_at = date('Y-m-d H:i:s');
            $ret = DB::update(
                    "update `frontend_users_accounts` set `balance`=`balance`-'{$money}' ,
`updated_at`='$updated_at'  where `user_id` ='{$account->user_id}' and `balance`>='{$money}'"
                ) > 0;
            if ($ret) {
                $account->balance -= $money;
            }
            return $ret;
        }
    }


    /**
     * 冻结资金
     * @param FrontendUsersAccount $account U.
     * @param float                $money   MOney.
     * @return string
     */
    public function frozen(FrontendUsersAccount &$account, float $money)
    {
        $account = $account->fresh();
        if ($money > $account->balance) {
            return '对不起, 用户余额不足!';
        }
        $account->balance -= $money;
        $account->frozen += $money;
        if ($account->save()) {
            $ret = true;
        } else {
            $ret = false;
        }
        return $ret;
    }

    /**
     * 解冻
     * @param FrontendUsersAccount $account U.
     * @param float                $money   MOney.
     * @return string
     */
    public function unFrozen(FrontendUsersAccount $account, float $money)
    {
        if ($this->changeMode === self::MODE_CHANGE_AFTER) {
            if (isset($this->changes[$account->user_id])) {
                if (isset($this->changes[$account->user_id]['unFrozen'])) {
                    $this->changes[$account->user_id]['unFrozen'] += $money;
                } else {
                    $this->changes[$account->user_id]['unFrozen'] = $money;
                }
            } else {
                $this->changes[$account->user_id] = [];
                $this->changes[$account->user_id]['unFrozen'] = $money;
            }
            $account->balance += $money;
            $account->frozen -= $money;
            return true;
        } else {
            $updated_at = date('Y-m-d H:i:s');

            $ret = DB::update(
                    "update `frontend_users_accounts` set `balance`=`balance`+'{$money}',
`frozen`=`frozen`- '{$money}' , `updated_at`='$updated_at'  where `user_id` ='{$account->user_id}'"
                ) > 0;

            if ($ret) {
                $account->balance += $money;
                $account->frozen -= $money;
            }
            return $ret;
        }
    }

    /**
     * 解冻 - 到其他玩家头上
     * @param FrontendUsersAccount $account U.
     * @param float                $money   MOney.
     * @return string
     */
    public function unFrozenToPlayer(FrontendUsersAccount $account, float $money)
    {
        if ($money > $account->frozen) {
            Log::channel('account')->error('error-' . $account->user_id .'-' . $money . '-' . $account->frozen .'-冻结金额不足!');
            return '对不起, 用户冻结金额不足!';
        }

        if ($this->changeMode === self::MODE_CHANGE_AFTER) {
            if (isset($this->changes[$account->user_id])) {
                if (isset($this->changes[$account->user_id]['unFrozenToPlayer'])) {
                    $this->changes[$account->user_id]['unFrozenToPlayer'] += $money;
                } else {
                    $this->changes[$account->user_id]['unFrozenToPlayer'] = $money;
                }
            } else {
                $this->changes[$account->user_id] = [];
                $this->changes[$account->user_id]['unFrozenToPlayer'] = $money;
            }
            $account->frozen -= $money;
            return true;
        } else {
            $updated_at = date('Y-m-d H:i:s');
            $ret = DB::update(
                    "update `frontend_users_accounts` set  `frozen`=`frozen`- '{$money}' ,
 `updated_at`='$updated_at'  where `user_id` ='{$account->user_id}'"
                ) > 0;
            if ($ret) {
                $account->frozen -= $money;
            }
            return $ret;
        }
    }

    /**
     * 存储
     * @return boolean
     */
    public function triggerSave()
    {
        // 报表保存
        if ($this->reports) {
            $ret = FrontendUsersAccountsReport::insert($this->reports);
            if (!$ret) {
                return false;
            }
            $this->reports = [];
        }
        // 帐变保存
        if ($this->changes) {
            foreach ($this->changes as $userId => $_data) {
                $balanceAdd = 0;
                $frozenAdd = 0;
                foreach ($_data as $_key => $amount) {
                    switch ($_key) {
                        case 'add':
                            $balanceAdd += $amount;
                            break;
                        case 'cost':
                            $balanceAdd -= $amount;
                            break;
                        case 'frozen':
                            $balanceAdd -= $amount;
                            $frozenAdd += $amount;
                            break;
                        case 'unfrozen':
                            $balanceAdd += $amount;
                            $frozenAdd -= $amount;
                            break;
                        case 'unFrozenToPlayer':
                            $frozenAdd -= $amount;
                            break;
                        default:
                            break;
                    }
                }
                if ($balanceAdd === 0 && $frozenAdd === 0) {
                    continue;
                }
                $sql = 'update `frontend_users_accounts` set ';
                // 冻结金额
                if ($frozenAdd > 0) {
                    $sql .= " `frozen`=`frozen` + '{$frozenAdd}',";
                } else {
                    if ($frozenAdd < 0) {
                        $frozenAdd = abs($frozenAdd);
                        $sql .= " `frozen`=`frozen` - '{$frozenAdd}',";
                    }
                }
                // 资金
                if ($balanceAdd > 0) {
                    $sql .= " `balance`=`balance` + '{$balanceAdd}',";
                } else {
                    if ($balanceAdd < 0) {
                        $balanceAdd = abs($balanceAdd);
                        $sql .= " `balance`=`balance` - '{$balanceAdd}',";
                    }
                }
                // 更新时间
                $updated_at = date('Y-m-d H:i:s');
                $sql .= " `updated_at`='$updated_at'  where `user_id` ='{$userId}'";
                $ret = DB::update($sql);
                if (!$ret) {
                    return false;
                }
            }
            $this->changes = [];
            $this->accounts = [];
        }
        return true;
    }

    /**
     * 保存记录
     * @param array $report Data.
     * @return boolean
     */
    public function saveReportData(array $report)
    {
        $lastId = false;
        if ($this->reportMode === self::MODE_REPORT_AFTER) {
            $this->reports[] = $report;
        } else {
            $lastId = FrontendUsersAccountsReport::insertGetId($report);
            if (!$lastId) {
                return false;
            }
        }
        return $lastId;
    }

    /**
     * 保存记录
     * @param array $report Data.
     * @return boolean
     */
    public function saveTypeParamWithData(array $report)
    {
        if ($this->reportMode === self::MODE_REPORT_AFTER) {
            $this->reports[] = $report;
        } else {
            $ret = FrontendUsersAccountsReportsParamsWithValue::insert($report);
            if (!$ret) {
                return false;
            }
        }
        return true;
    }

    /**
     * 生成帐变编号
     * @return string
     */
    public static function getSerialNumber(): string
    {
        return 'XWTX'.Str::orderedUuid()->getNodeHex();
    }
}
