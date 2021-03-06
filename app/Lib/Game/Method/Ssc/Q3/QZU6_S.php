<?php namespace App\Lib\Game\Method\Ssc\Q3;

use App\Lib\Game\Method\Ssc\Base;
use Illuminate\Support\Facades\Validator;


class QZU6_S extends Base
{
    // 123,125,123,123,123,123,
    public $all_count =120;
    public static $bzArr = array('000', '111', '222', '333', '444', '555', '666', '777', '888', '999');

    public static $filterArr = array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,7=>1,8=>1,9=>1);

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=3;
        return implode('',(array)array_rand(self::$filterArr,$rand));
    }

    public function fromOld($codes)
    {
        //112|223|343
        return implode(',',explode('|',$codes));
    }

    public function regexp($sCodes)
    {
        $data['code'] = explode('|', $sCodes);
        $validator = Validator::make($data, [
            'code' => 'required|array|max:100000', //只能十万个号码能传过来
            'code.*' => ['regex:/^((?!\&)(?!.*\&$)(?!.*?\&\&)[\d&]{1,5}?)$/'], //1&2&3
        ]);
        if ($validator->fails()) {
            return false;
        }

        //重复号码
        $temp =explode(",",$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        //豹子号
        if (count(array_intersect(self::$bzArr, $temp)) > 0) {
            return false;
        }

        //重复数字
        $exists=[];
        foreach ($temp as $v) {
            //不能有重复数字
            $aNumber[0] = substr($v, 0, 1);
            $aNumber[1] = substr($v, 1, 1);
            $aNumber[2] = substr($v, 2, 1);
            if ($aNumber[0] == $aNumber[1] || $aNumber[1] == $aNumber[2] || $aNumber[0] == $aNumber[2]) {
                return false;
            }

            //组选不能重复号码
            $vv=$this->strOrder($v);
            if(isset($exists[$vv])) return false;
            $exists[$vv]=1;
        }

        return true;
    }

    public function count($sCodes)
    {
        return count(explode(",",$sCodes));
    }

    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        // 不限顺序
        $str = $this->strOrder(implode('', $numbers));
        $aCodes = explode(',', $sCodes);

        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v >= 2;
        });

        if (count($flip) == 0) {
            foreach ($aCodes as $code) {
                if ($this->strOrder($code) === $str) {
                    return 1;
                }
            }
        }
    }
}
