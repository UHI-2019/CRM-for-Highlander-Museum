<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // customer
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('Password123!'),
        ]);

        // superuser
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('Password123!'),
        ]);

        // admin
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('Password123!'),
        ]);
    }
}
