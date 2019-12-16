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
        // don't change the order
        $this->call(RolesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
    }
}
