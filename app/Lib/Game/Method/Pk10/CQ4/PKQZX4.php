<?php namespace App\Lib\Game\Method\Pk10\CQ4;

use App\Lib\Game\Method\Pk10\Base;

//直选4
class PKQZX4 extends Base
{
    //01&02&03&04&05&06&07&08|01&02&03&04&05&06&07&08|01&02&03&04&05&06&07&08|01&02&03&04&05&06&07&08

    public static $filterArr = ['0' => 1, '1' => 1, '2' => 1, '3' => 1, '4' => 1, '5' => 1, '6' => 1, '7' => 1, '8' => 1, '9' => 1];

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $arr = [];
        $rand = rand(1, 10);
        $arr[] = implode('&', (array)array_rand(self::$filterArr, $rand));
        $rand = rand(1, 10);
        $arr[] = implode('&', (array)array_rand(self::$filterArr, $rand));
        $rand = rand(1, 10);
        $arr[] = implode('&', (array)array_rand(self::$filterArr, $rand));
        $rand = rand(1, 10);
        $arr[] = implode('&', (array)array_rand(self::$filterArr, $rand));

        return implode('|', $arr);
    }

    public function fromOld($sCodes)
    {
        return implode('|', array_map(function ($v) {
            return implode('&', explode(' ', $v));
        }, explode('|', $sCodes)));
    }

    public function regexp($sCodes)
    {
        //格式
        if (!preg_match('/^(((?!\&)(?!.*\&$)(?!\|)(?!.*\|$)(?!.*?\d\d)([\d]\&?){1,10})\|?){1,4}$/', $sCodes)) {
            return false;
        }

        $filterArr = self::$filterArr;

        $aCode = explode('|', $sCodes);
        foreach ($aCode as $sCode) {
            $t = explode('&', $sCode);
            $iUniqueCount = count(array_filter(array_unique($t), function ($v) use ($filterArr) {
                return isset($filterArr[$v]);
            }));
            if ($iUniqueCount != count($t)) {
                return false;
            }

            if ($iUniqueCount == 0) {
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        $iNums = 0;
        $aNums = [];
        $aCode = explode('|', $sCodes);
        foreach ($aCode as $sCode) {
            $aNums[] = explode('&', $sCode);
        }

        if (count($aNums[0]) > 0 && count($aNums[1]) > 0 && count($aNums[2]) > 0 && count($aNums[3]) > 0) {
            for ($i = 0, $iMax = count($aNums[0]); $i < $iMax; $i++) {
                for ($j = 0, $jMax = count($aNums[1]); $j < $jMax; $j++) {
                    for ($k = 0, $kMax = count($aNums[2]); $k < $kMax; $k++) {
                        for ($y = 0, $yMax = count($aNums[3]); $y < $yMax; $y++) {
                            if ($aNums[0][$i] != $aNums[1][$j] && $aNums[0][$i] != $aNums[2][$k] && $aNums[0][$i] != $aNums[3][$y] &&
                                $aNums[1][$j] != $aNums[2][$k] && $aNums[1][$j] != $aNums[3][$y] &&
                                $aNums[2][$k] != $aNums[3][$y]
                            ) {
                                $iNums++;
                            }
                        }
                    }
                }
            }
        }

        return $iNums;
    }

    public function bingoCode(Array $numbers)
    {
        $result = [];
        $arr = array_keys(self::$filterArr);

        foreach ($numbers as $pos => $code) {
            $tmp = [];
            foreach ($arr as $_code) {
                $tmp[] = intval($code == $_code);
            }
            $result[$pos] = $tmp;
        }

        return $result;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = explode('|', $sCodes);

        $aCodes = $this->convertLtCodes($aCodes);
        $numbers = $this->convertLtCodes($numbers);

        $preg = '|[' . str_replace('&', '', $aCodes[0]) . '][' . str_replace('&', '', $aCodes[1]) . '][' . str_replace('&', '', $aCodes[2]) . '][' . str_replace('&', '', $aCodes[3]) . ']|';

        if (preg_match($preg, implode('', $numbers))) {
            return 1;
        }
    }
}
