<?php namespace App\Lib\Game\Method\K3\SBTH;

use App\Lib\Game\Method\K3\Base;
use Illuminate\Support\Facades\Validator;

//三不同号
class SBTH extends Base
{
    //1&2&3&4&5&6

    public static $filterArr = array('1' => 1,'2' => 1,'3' => 1,'4' => 1,'5' => 1,'6' => 1);

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $cnt=count(self::$filterArr);
        $rand = rand(3,$cnt);
        return implode('&',(array)array_rand(self::$filterArr,$rand));
    }

    public function fromOld($codes)
    {
        return implode('&',str_split($codes));
    }

    public function regexp($sCodes)
    {
        $data['code'] = $sCodes;
        $validator = Validator::make($data, [
            'code' => ['regex:/^(?!\|)(?!.*\|\|$)(?!.*\|$)((([1-4][2-5][3-6]))\|?){1,20}$/'],//123|124|125|126|134|135|136|145|146|156|234|235|236|245|246|256|345|346|356|456 和值快三
        ]);
        if ($validator->fails()) {
            return false;
        }
        return true;
    }

    public function count($sCodes)
    {
        //C(n,3)
        $temp = explode('&',$sCodes);
        $n = count($temp);
        return $this->getCombinCount($n,3);
    }

    public function bingoCode(Array $numbers)
    {
        $counts=array_count_values($numbers);
        if(count($counts)!=3) return [array_fill(0,count(self::$filterArr),0)];

        $arr=array_keys(self::$filterArr);

        $result=[];
        foreach($arr as $code){
            $result[]=intval(isset($counts[$code]));
        }
        return [$result];
    }


    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //三不同号投注：当期开奖号码的三个号码各不相同，且投注号码与当期开奖号码全部相符，即中奖。
        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v >= 2;
        });

        //非重复的
        if (count($flip) == 0) {
            $preg = "|[" . str_replace('&', '', $sCodes) . "]{3}|";
            if (preg_match($preg, implode("", $numbers))) {
                return 1;
            }
        }
    }

}
