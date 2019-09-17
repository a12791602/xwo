<?php namespace App\Lib\Game\Method\Pcdd\TM;

use App\Lib\Game\Method\Pcdd\Base;

// 特码7
class T7 extends Base
{
    public $totalCount  = 1000;

    // 是否复式
    public function isMulti()
    {
        return true;
    }

    // 供测试用 生成随机投注
    public function randomCodes()
    {
        return 0;
    }

    // 检测号码
    public function regexp($sCode)
    {
        $intCode = intval($sCode);

        if ($intCode != $sCode) {
            return false;
        }

        if ($intCode !== 7) {
            return false;
        }

        return true;
    }

    public function count($sCodes)
    {
        return 1;
    }

    // 判定中奖
    public function assertLevel($levelId, $sCode, Array $numbers)
    {
        $tmCode = $numbers[0] + $numbers[1] + $numbers[2];
        if($sCode == 7 && $tmCode == $sCode) {
            return 1;
        }
        return 0;
    }
}
