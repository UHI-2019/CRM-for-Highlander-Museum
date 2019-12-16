<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('customers')->insert([
            'user_id' => DB::table('users')->whereNull('role_id')->first()->id,
            'username' =>$faker->userName,
            'address_line_1' => $faker->address,
            'postcode' => $faker->postcode,
            'city' => $faker->city,
            'contact_telephone_number' => $faker->phoneNumber,
            'is_newsletter_subscriber' => '1',
            'customer_type' => '1'
        ]);
    }
}
