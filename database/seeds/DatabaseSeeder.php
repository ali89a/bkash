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

      
          $this->call(UserSeeder::class);
          $this->call(AccessControllerTableSeeder::class);
          $this->call(PermissionSeeder::class);
          $this->call(BalanceSeeder::class);
          $this->call(BalanceInSeeder::class);
          $this->call(BalanceOutSeeder::class);
    }
}
