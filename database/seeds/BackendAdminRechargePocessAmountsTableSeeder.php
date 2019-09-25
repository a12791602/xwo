<?php

use Illuminate\Database\Seeder;

class BackendAdminRechargePocessAmountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('backend_admin_recharge_pocess_amounts')->delete();
        
        \DB::table('backend_admin_recharge_pocess_amounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'admin_id' => 1,
                'fund' => '0.00',
                'created_at' => '2019-05-10 16:16:06',
                'updated_at' => '2019-09-24 15:48:22',
            ),
            1 => 
            array (
                'id' => 2,
                'admin_id' => 2,
                'fund' => '0.00',
                'created_at' => '2019-05-10 16:18:54',
                'updated_at' => '2019-09-24 15:48:27',
            ),
            2 => 
            array (
                'id' => 3,
                'admin_id' => 3,
                'fund' => '0.00',
                'created_at' => '2019-05-11 16:08:56',
                'updated_at' => '2019-05-11 16:08:56',
            ),
            3 => 
            array (
                'id' => 4,
                'admin_id' => 4,
                'fund' => '0.00',
                'created_at' => '2019-05-11 16:08:56',
                'updated_at' => '2019-05-23 17:45:10',
            ),
        ));
        
        
    }
}