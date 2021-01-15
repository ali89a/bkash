<?php

use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    
    public function run()
    {
        $data = [
            ['creator_user_id' => 1, 'name' => 'Self', 'type' => 'Cash', 'amount' => 50000],
            ['creator_user_id' => 1, 'name' => 'Self', 'type' => 'Cash', 'amount' => 50000],
        ];
        \DB::table('balances')->insert($data);

    }
}
