<?php

use Illuminate\Database\Seeder;

class BackendPaymentVendorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('backend_payment_vendors')->delete();
        
        \DB::table('backend_payment_vendors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_vendor_name' => '熊猫支付',
                'payment_vendor_sign' => 'panda',
                'whitelist_ips' => '103.42.94.10|3.113.223.134',
                'created_at' => '2019-09-23 20:46:50',
                'updated_at' => '2019-09-23 20:46:50',
            ),
        ));
        
        
    }
}