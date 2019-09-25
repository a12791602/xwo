<?php

use Illuminate\Database\Seeder;

class BackendAdminRechargePermitGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('backend_admin_recharge_permit_groups')->delete();
        
        \DB::table('backend_admin_recharge_permit_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_id' => 1,
                'group_name' => '超级管理组',
                'created_at' => '2019-09-19 10:10:41',
                'updated_at' => '2019-09-19 10:10:41',
            ),
        ));
        
        
    }
}