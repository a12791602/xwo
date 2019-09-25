<?php

use Illuminate\Database\Seeder;

class FrontendUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('frontend_users')->delete();
        
        \DB::table('frontend_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'harriszhongdai',
                'top_id' => 0,
                'parent_id' => 0,
                'rid' => '1',
                'platform_id' => 1,
                'sign' => 'a',
                'account_id' => 1,
                'type' => 2,
                'vip_level' => 0,
                'is_tester' => 0,
                'frozen_type' => 4,
                'password' => '$2y$10$NiD/0SJjZP.FGEbILMizPOBKIAY4VOzwMa9HZdd8xQ4.TNlTlACTq',
                'fund_password' => '$2y$10$71x11gceU8LOzZbQA47F4OojCJfv2Y3GO3E8rf9rKJQFfSvWXqnFW',
                'prize_group' => 1960,
                'remember_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuOTE3MHR0dC5jb21cL3dlYi1hcGlcL2xvZ2l',
                'level_deep' => 0,
                'register_ip' => '172.19.0.1',
                'last_login_ip' => '103.104.16.186',
                'register_time' => NULL,
                'last_login_time' => '2019-09-25 21:12:02',
                'user_specific_id' => 1,
                'status' => 1,
                'created_at' => '2019-05-16 11:07:18',
                'updated_at' => '2019-09-25 21:12:02',
                'daysalary_percentage' => '0.0',
                'bonus_percentage' => 0,
                'pic_path' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'stefan',
                'top_id' => 0,
                'parent_id' => 0,
                'rid' => '2',
                'platform_id' => 1,
                'sign' => 'a',
                'account_id' => 2,
                'type' => 2,
                'vip_level' => 0,
                'is_tester' => 0,
                'frozen_type' => 0,
                'password' => '$2y$10$efl1L3ea89YOyDZrYIIXteYp6oSqeE9hc32DRAqoQVNwAVPPF8i5S',
                'fund_password' => '$2y$10$6ZfiBVB.dq0pmLUMOYROyuNl7eMH1fEsO78ZQVYjAxMIgB7zv1bqC',
                'prize_group' => 1960,
                'remember_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuOTE3MHR0dC5jb21cL3dlYi1hcGlcL2xvZ2l',
                'level_deep' => 0,
                'register_ip' => '172.19.0.1',
                'last_login_ip' => '103.42.94.10',
                'register_time' => NULL,
                'last_login_time' => '2019-09-19 11:00:27',
                'user_specific_id' => 2,
                'status' => 1,
                'created_at' => '2019-06-12 16:15:44',
                'updated_at' => '2019-09-20 11:52:25',
                'daysalary_percentage' => '0.0',
                'bonus_percentage' => 0,
                'pic_path' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'kiki',
                'top_id' => 0,
                'parent_id' => 0,
                'rid' => '3',
                'platform_id' => 1,
                'sign' => 'a',
                'account_id' => 3,
                'type' => 2,
                'vip_level' => 0,
                'is_tester' => 0,
                'frozen_type' => 0,
                'password' => '$2y$10$ahZMLxTCtvCodFhHb1MJOuFRoMIGFnSEmD5VpkgO5w/ceff3zeoaS',
                'fund_password' => '$2y$10$zae..JJcL8DvDraqMN47huvyLQ9xIrKs3pm4Yil2wT.tmwnJGdjHq',
                'prize_group' => 1960,
                'remember_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuOTE3MHR0dC5jb21cL21vYmlsZS1hcGlcL2x',
                'level_deep' => 0,
                'register_ip' => '116.50.231.34',
                'last_login_ip' => '103.42.94.10',
                'register_time' => NULL,
                'last_login_time' => '2019-09-25 19:55:13',
                'user_specific_id' => 41,
                'status' => 1,
                'created_at' => '2019-06-19 21:57:55',
                'updated_at' => '2019-09-25 19:55:13',
                'daysalary_percentage' => '0.0',
                'bonus_percentage' => 0,
                'pic_path' => NULL,
            ),
        ));
        
        
    }
}