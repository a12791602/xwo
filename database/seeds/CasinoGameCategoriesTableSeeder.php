<?php

use Illuminate\Database\Seeder;

class CasinoGameCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('casino_game_categories')->delete();
        
        \DB::table('casino_game_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '真人视讯',
                'code' => 'live',
                'home' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '电子游戏',
                'code' => 'e-game',
                'home' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '电子竞技',
                'code' => 'e-sports',
                'home' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '体育',
                'code' => 'sport',
                'home' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '彩票',
                'code' => 'lottery',
                'home' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '棋牌',
                'code' => 'card',
                'home' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}