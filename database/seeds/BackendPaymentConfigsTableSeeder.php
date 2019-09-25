<?php

use Illuminate\Database\Seeder;

class BackendPaymentConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('backend_payment_configs')->delete();
        
        \DB::table('backend_payment_configs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_vendor_id' => 1,
                'payment_vendor_name' => '熊猫支付',
                'payment_vendor_sign' => 'panda',
                'payment_type_id' => 1,
                'payment_type_name' => '支付宝',
                'payment_type_sign' => 'zfb',
                'banks_code' => '',
            'payment_name' => '熊猫(支付宝扫码)',
                'payment_sign' => 'panda_zfbscan',
                'request_url' => 'https://api.cqvip9.com/v1_beta/recharge',
                'request_mode' => 0,
                'direction' => 1,
                'status' => 1,
                'created_at' => '2019-09-23 00:00:00',
                'updated_at' => '2019-09-23 20:51:39',
            ),
            1 => 
            array (
                'id' => 2,
                'payment_vendor_id' => 1,
                'payment_vendor_name' => '熊猫支付',
                'payment_vendor_sign' => 'panda',
                'payment_type_id' => 5,
                'payment_type_name' => '网银在线',
                'payment_type_sign' => 'wy',
                'banks_code' => 'icbc=gh|ccb=js',
            'payment_name' => '熊猫(网银在线)',
                'payment_sign' => 'panda_wyonline',
                'request_url' => 'https://api.cqvip9.com/v1_beta/recharge',
                'request_mode' => 0,
                'direction' => 1,
                'status' => 1,
                'created_at' => '2019-09-23 00:00:00',
                'updated_at' => '2019-09-23 21:00:00',
            ),
        ));
        
        
    }
}