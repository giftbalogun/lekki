<?php

use Illuminate\Database\Seeder;
use App\PackageStatePrice;

class PackageStatePricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PackageStatePrice::create(['package_id' => 1, 'state_id' => 25, 'price_details' => '{"month":40000,"hour": 2000}']);
    }
}
