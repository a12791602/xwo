<?php

use Illuminate\Database\Seeder;

class CasinoGamePlatformsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('casino_game_platforms')->delete();
        
        \DB::table('casino_game_platforms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'main_game_plat_name' => 'DT',
                'main_game_plat_code' => 'dt',
                'rate' => '0.0900',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'main_game_plat_name' => 'MG',
                'main_game_plat_code' => 'mg',
                'rate' => '0.0900',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'main_game_plat_name' => 'PT',
                'main_game_plat_code' => 'pt',
                'rate' => '0.1250',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 23,
                'main_game_plat_name' => 'KY',
                'main_game_plat_code' => 'ky',
                'rate' => '0.1500',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 24,
                'main_game_plat_name' => 'BG',
                'main_game_plat_code' => 'bg',
                'rate' => '0.0800',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}