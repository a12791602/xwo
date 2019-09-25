<?php

use Illuminate\Database\Seeder;

class BackendAdminAccessGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('backend_admin_access_groups')->delete();
        
        \DB::table('backend_admin_access_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_name' => '超级管理组',
                'role' => '*',
                'status' => 1,
                'created_at' => '2019-04-10 10:10:56',
                'updated_at' => '2019-04-10 10:10:51',
                'platform_id' => 1,
            ),
        ));
        
        
    }
}