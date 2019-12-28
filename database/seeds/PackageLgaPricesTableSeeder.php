<?php

use Illuminate\Database\Seeder;
use App\PackageLgaPrice;

class PackageLgaPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PackageLgaPrice::create(['package_id' => 1, 'lga_id' => 516, 'price_details' => '{"month":60000,"hour": 4000}']);

    }
}
