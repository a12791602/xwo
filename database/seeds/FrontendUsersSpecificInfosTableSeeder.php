<?php

use Illuminate\Database\Seeder;

class FrontendUsersSpecificInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('frontend_users_specific_infos')->delete();
        
        \DB::table('frontend_users_specific_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nickname' => '蛤蛤',
                'realname' => '1233',
                'mobile' => '13880628809',
                'email' => '1823444@qq.com',
                'zip_code' => '233333',
                'address' => '朝歌',
                'register_type' => 0,
                'created_at' => NULL,
                'updated_at' => '2019-08-28 15:46:01',
                'total_members' => 0,
                'user_id' => 1,
                'domain' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nickname' => NULL,
                'realname' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'zip_code' => NULL,
                'address' => NULL,
                'register_type' => 0,
                'created_at' => NULL,
                'updated_at' => '2019-08-17 21:24:55',
                'total_members' => 0,
                'user_id' => 2,
                'domain' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nickname' => NULL,
                'realname' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'zip_code' => NULL,
                'address' => NULL,
                'register_type' => 0,
                'created_at' => NULL,
                'updated_at' => '2019-09-26 00:30:56',
                'total_members' => 0,
                'user_id' => 3,
                'domain' => NULL,
            ),
        ));
        
        
    }
}