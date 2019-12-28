<?php

use Illuminate\Database\Seeder;
use App\Meta;

class MetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Meta::create(['key' => 'permitted_states', 'value' => "{'25':'Lagos', '15':'FCT', '33':'Rivers'}"]);
    }
}
