<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BalanceInSeeder extends Seeder
{
  
    public function run()
    {

        $data = [
            ['creator_user_id' => 1, 'name' => 'Ali', 'type' => 'DBBL', 'amount' => 10000, 'date' =>Carbon::now()->format('Y-m-d')],
            ['creator_user_id' => 1, 'name' => 'Polash', 'type' => 'Cash', 'amount' => 4000, 'date' =>Carbon::now()->format('Y-m-d')],
        ];

        \DB::table('balance_ins')->insert($data);
    }
}
