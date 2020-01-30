<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Eniseyin Olajide',
            'email' => 'eniseyinolajide@gmail.com',
            'password' => 'secret'
        ]);

        $user->assignRole('admin');

        $user2 = \App\User::create([
            'name' => 'Test Tutor',
            'email' => 'a@a.com',
            'operating_regions' => 'Lekki, Ajah, VGC',
            'profile_image' => 'master/images/stock/tutor2.jpeg',
            'password' => 'secret',

        ]);

        $user2->assignRole('tutor');

        $user3 = App\User::create([
            'name' => 'Gift Balogun',
            'email' => 'blgn@gmail.com',
            'password' => 'secret'
        ]);

        $user->assignRole('client');
    }
}
