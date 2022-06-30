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
        $this->call(SiteSeosTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(VillasTableSeeder::class);
        $this->call(PropertyTypesTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(PropertyAttributesTableSeeder::class);
        $this->call(PropertyMainPhotosTableSeeder::class);
        $this->call(PropertyPhotosTableSeeder::class);
        $this->call(ClicksTableSeeder::class);
        $this->call(SiteContentsTableSeeder::class);
        $this->call(HeaderBannerContentsTableSeeder::class);
        $this->call(UnavailableDatesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WishListsTableSeeder::class);
    }
}
