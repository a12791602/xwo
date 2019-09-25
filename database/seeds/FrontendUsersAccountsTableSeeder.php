<?php

use Illuminate\Database\Seeder;

class FrontendUsersAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('frontend_users_accounts')->delete();
        
        \DB::table('frontend_users_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'balance' => '0.0000',
                'frozen' => '0.0000',
                'status' => 1,
                'created_at' => '2019-05-16 11:07:18',
                'updated_at' => '2019-09-25 12:11:04',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'balance' => '0.0000',
                'frozen' => '0.0000',
                'status' => 1,
                'created_at' => '2019-06-12 16:15:44',
                'updated_at' => '2019-06-12 16:15:44',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'balance' => '0.0000',
                'frozen' => '0.0000',
                'status' => 1,
                'created_at' => '2019-06-19 22:07:40',
                'updated_at' => '2019-09-25 11:52:03',
            ),
        ));
        
        
    }
}