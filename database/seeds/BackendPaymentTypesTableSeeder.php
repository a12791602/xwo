<?php

use Illuminate\Database\Seeder;

class BackendPaymentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('backend_payment_types')->delete();
        
        \DB::table('backend_payment_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_type_name' => '支付宝',
                'payment_type_sign' => 'zfb',
                'is_bank' => 0,
                'payment_ico' => '111',
                'created_at' => '2019-09-23 20:49:04',
                'updated_at' => '2019-09-23 20:49:04',
            ),
            1 => 
            array (
                'id' => 2,
                'payment_type_name' => '微信',
                'payment_type_sign' => 'wx',
                'is_bank' => 0,
                'payment_ico' => '222',
                'created_at' => '2019-09-23 20:49:04',
                'updated_at' => '2019-09-23 20:49:04',
            ),
            2 => 
            array (
                'id' => 3,
                'payment_type_name' => '工商银行',
                'payment_type_sign' => 'icbc',
                'is_bank' => 1,
                'payment_ico' => '333',
                'created_at' => '2019-09-23 20:49:04',
                'updated_at' => '2019-09-23 20:49:04',
            ),
            3 => 
            array (
                'id' => 4,
                'payment_type_name' => '建设银行',
                'payment_type_sign' => 'ccb',
                'is_bank' => 1,
                'payment_ico' => '444',
                'created_at' => '2019-09-23 20:49:04',
                'updated_at' => '2019-09-23 20:49:04',
            ),
            4 => 
            array (
                'id' => 5,
                'payment_type_name' => '网银在线',
                'payment_type_sign' => 'wy',
                'is_bank' => 0,
                'payment_ico' => '777',
                'created_at' => '2019-09-23 20:49:04',
                'updated_at' => '2019-09-23 20:57:48',
            ),
        ));
        
        
    }
}