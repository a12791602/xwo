<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //######################################################
        $this->call(SystemPlatformsTableSeeder::class);
        $this->call(BackendSystemMenusTableSeeder::class);
        $this->call(BackendAdminAccessGroupsTableSeeder::class);
        $this->call(BackendAdminUsersTableSeeder::class);
        //######################################################
        $this->call(BackendAdminRechargePermitGroupsTableSeeder::class);
        $this->call(BackendAdminRechargePocessAmountsTableSeeder::class);
        $this->call(BackendAdminRoutesTableSeeder::class);
        $this->call(BackendPaymentConfigsTableSeeder::class);
        $this->call(BackendPaymentTypesTableSeeder::class);
        $this->call(BackendPaymentVendorsTableSeeder::class);
        $this->call(CasinoGameCategoriesTableSeeder::class);
        $this->call(CasinoGameListsTableSeeder::class);
        $this->call(CasinoGamePlatformsTableSeeder::class);
        $this->call(CronJobsTableSeeder::class);
        $this->call(FrontendAllocatedModelsTableSeeder::class);
        $this->call(FrontendAppRoutesTableSeeder::class);
        $this->call(FrontendInfoCategoriesTableSeeder::class);
        $this->call(FrontendLotteryFnfBetableMethodsTableSeeder::class);
        $this->call(FrontendSystemAdsTypesTableSeeder::class);
        $this->call(FrontendSystemBanksTableSeeder::class);
        $this->call(FrontendUsersTableSeeder::class);
        $this->call(FrontendUsersAccountsTableSeeder::class);
        $this->call(FrontendUsersAccountsTypesTableSeeder::class);
        $this->call(FrontendUsersAccountsTypesParamsTableSeeder::class);
        $this->call(FrontendUsersHelpCentersTableSeeder::class);
        $this->call(FrontendUsersSpecificInfosTableSeeder::class);
        $this->call(FrontendWebRoutesTableSeeder::class);
        $this->call(LotteryBasicMethodsTableSeeder::class);
        $this->call(LotteryBasicWaysTableSeeder::class);
        $this->call(LotteryIssueRulesTableSeeder::class);
        $this->call(LotteryListsTableSeeder::class);
        $this->call(LotteryMethodsTableSeeder::class);
        $this->call(LotteryMethodsLayoutDisplaysTableSeeder::class);
        $this->call(LotteryMethodsLayoutsTableSeeder::class);
        $this->call(LotteryMethodsNumberButtonRulesTableSeeder::class);
        $this->call(LotteryMethodsStandardsTableSeeder::class);
        $this->call(LotteryMethodsValidationsTableSeeder::class);
        $this->call(LotteryMethodsWaysLevelsTableSeeder::class);
        $this->call(LotteryPrizeDetailsTableSeeder::class);
        $this->call(LotteryPrizeGroupsTableSeeder::class);
        $this->call(LotteryPrizeLevelsTableSeeder::class);
        $this->call(LotterySeriesTableSeeder::class);
        $this->call(LotterySeriesMethodsTableSeeder::class);
        $this->call(LotterySeriesWaysTableSeeder::class);
        $this->call(SystemConfigurationsTableSeeder::class);
        $this->call(UserPublicAvatarsTableSeeder::class);
        $this->call(UsersRegionsTableSeeder::class);
    }
}
