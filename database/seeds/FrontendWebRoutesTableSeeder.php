<?php

use Illuminate\Database\Seeder;

class FrontendWebRoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('frontend_web_routes')->delete();
        
        \DB::table('frontend_web_routes')->insert(array (
            0 => 
            array (
                'id' => 20,
                'route_name' => 'web-api.HomepageController.banner',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'banner',
                'frontend_model_id' => 13,
                'title' => '首页轮播图',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-06-04 15:40:30',
                'updated_at' => '2019-06-05 20:43:20',
            ),
            1 => 
            array (
                'id' => 22,
                'route_name' => 'web-api.HomepageController.notice',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'notice',
                'frontend_model_id' => 17,
                'title' => '首页公告列表',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-06-04 15:41:08',
                'updated_at' => '2019-06-05 20:43:26',
            ),
            2 => 
            array (
                'id' => 24,
                'route_name' => 'web-api.HomepageController.activity',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'activity',
                'frontend_model_id' => 20,
                'title' => '首页热门活动',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-06-04 15:42:11',
                'updated_at' => '2019-07-30 17:08:08',
            ),
            3 => 
            array (
                'id' => 25,
                'route_name' => 'web-api.login',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\FrontendAuthController',
                'method' => 'login',
                'frontend_model_id' => 22,
                'title' => '登录',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-06-04 15:46:53',
                'updated_at' => '2019-06-05 20:43:34',
            ),
            4 => 
            array (
                'id' => 26,
                'route_name' => 'web-api.HomepageController.show-homepage-model',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'showHomepageModel',
                'frontend_model_id' => 8,
                'title' => '获取需要展示的前台模块',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 21:50:05',
                'updated_at' => '2019-07-25 15:15:41',
            ),
            5 => 
            array (
                'id' => 28,
                'route_name' => 'web-api.HomepageController.popular-methods',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'popularMethods',
                'frontend_model_id' => 19,
                'title' => '热门彩种2',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 21:53:14',
                'updated_at' => '2019-07-19 21:53:14',
            ),
            6 => 
            array (
                'id' => 29,
                'route_name' => 'web-api.HomepageController.ranking',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'ranking',
                'frontend_model_id' => 15,
                'title' => '中奖排行',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 21:54:32',
                'updated_at' => '2019-07-19 21:54:32',
            ),
            7 => 
            array (
                'id' => 30,
                'route_name' => 'web-api.UserHelpCenterController.menus',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\User\\Help\\UserHelpCenterControl',
                'method' => 'menus',
                'frontend_model_id' => 25,
                'title' => '帮助中心',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 21:57:19',
                'updated_at' => '2019-07-19 21:57:19',
            ),
            8 => 
            array (
                'id' => 31,
                'route_name' => 'web-api.HomepageController.lottery-notice-list',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'lotteryNoticeList',
                'frontend_model_id' => 26,
                'title' => '开奖公告',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 21:58:52',
                'updated_at' => '2019-07-19 21:58:52',
            ),
            9 => 
            array (
                'id' => 32,
                'route_name' => 'web-api.LotteriesController.lotteryList',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Game\\Lottery\\LotteriesControlle',
                'method' => 'lotteryList',
                'frontend_model_id' => 27,
                'title' => '获取彩种接口',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 22:00:01',
                'updated_at' => '2019-07-19 22:00:01',
            ),
            10 => 
            array (
                'id' => 33,
                'route_name' => 'web-api.LotteriesController.lotteryInfo',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Game\\Lottery\\LotteriesControlle',
                'method' => 'lotteryInfo',
                'frontend_model_id' => 27,
                'title' => '获取奖期历史',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-19 22:00:30',
                'updated_at' => '2019-07-19 22:00:30',
            ),
            11 => 
            array (
                'id' => 34,
                'route_name' => 'web-api.HomepageController.popular-lotteries',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'popularLotteries',
                'frontend_model_id' => 27,
                'title' => 'web首页热门彩种列表',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-07-31 20:40:33',
                'updated_at' => '2019-07-31 20:40:37',
            ),
            12 => 
            array (
                'id' => 37,
                'route_name' => 'web-api.register',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\FrontendAuthController',
                'method' => 'register',
                'frontend_model_id' => 23,
                'title' => '注册',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-08-15 17:30:00',
                'updated_at' => '2019-08-15 17:30:11',
            ),
            13 => 
            array (
                'id' => 38,
                'route_name' => 'web-api.HomepageController.get-web-info',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'getWebInfo',
                'frontend_model_id' => 14,
                'title' => '获取网站基本信息',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-08-17 15:33:59',
                'updated_at' => '2019-08-17 15:34:20',
            ),
            14 => 
            array (
                'id' => 39,
                'route_name' => 'web-api.HomepageController.get-basic-content',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'getBasicContent',
                'frontend_model_id' => 14,
                'title' => '获取网站基本内容',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-08-17 15:34:37',
                'updated_at' => '2019-08-17 15:35:16',
            ),
            15 => 
            array (
                'id' => 40,
                'route_name' => 'web-api.HomepageController.get-popular-game',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'getPopularGame',
                'frontend_model_id' => 14,
                'title' => '热门游戏',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-08-17 15:35:03',
                'updated_at' => '2019-08-17 15:35:16',
            ),
            16 => 
            array (
                'id' => 45,
                'route_name' => 'mobile-api.HomepageController.notice',
                'controller' => 'App\\Http\\Controllers\\MobileApi\\Homepage\\HomepageController',
                'method' => 'notice',
                'frontend_model_id' => 10,
                'title' => '34232',
                'description' => NULL,
                'is_open' => 0,
                'created_at' => '2019-08-17 16:04:32',
                'updated_at' => '2019-08-17 16:04:32',
            ),
            17 => 
            array (
                'id' => 46,
                'route_name' => 'web-api.SystemController.is-crypt-data',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\System\\SystemController',
                'method' => 'isCryptData',
                'frontend_model_id' => 33,
                'title' => '是否加密传递的数据',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-09-13 15:57:35',
                'updated_at' => '2019-09-13 15:57:38',
            ),
            18 => 
            array (
                'id' => 48,
                'route_name' => 'web-api.CasinosController.casinoPlat',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Game\\Casino\\CasinosController',
                'method' => 'casinoPlat',
                'frontend_model_id' => 34,
                'title' => '娱乐城平台列表',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-09-24 21:59:40',
                'updated_at' => '2019-09-24 21:59:42',
            ),
            19 => 
            array (
                'id' => 50,
                'route_name' => 'web-api.CasinosController.casinoList',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Game\\Casino\\CasinosController',
                'method' => 'casinoList',
                'frontend_model_id' => 34,
                'title' => '娱乐城所有游戏列表',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-09-24 22:01:43',
                'updated_at' => '2019-09-24 22:02:02',
            ),
            20 => 
            array (
                'id' => 51,
                'route_name' => 'web-api.CasinosController.searchGameCasino',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Game\\Casino\\CasinosController',
                'method' => 'searchGameCasino',
                'frontend_model_id' => 34,
                'title' => '娱乐城查找游戏',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-09-24 22:01:59',
                'updated_at' => '2019-09-24 22:02:02',
            ),
            21 => 
            array (
                'id' => 52,
                'route_name' => 'web-api.HomepageController.casino-game',
                'controller' => 'App\\Http\\Controllers\\FrontendApi\\Homepage\\HomepageController',
                'method' => 'casinoGame',
                'frontend_model_id' => 30,
                'title' => '娱乐城首页推荐',
                'description' => NULL,
                'is_open' => 1,
                'created_at' => '2019-09-24 22:03:08',
                'updated_at' => '2019-09-24 22:03:11',
            ),
        ));
        
        
    }
}