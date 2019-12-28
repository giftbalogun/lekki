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
        $this->call(RolesAndPermissionSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PackagesSeeder::class);
        $this->call(StateAndLgaTableSeeder::class);
        $this->call(PackageLgaPricesTableSeeder::class);
        $this->call(MetaTableSeeder::class);
        $this->call(PackageStatePricesTableSeeder::class);
    }
}
