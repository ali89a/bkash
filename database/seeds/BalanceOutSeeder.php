<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BalanceOutSeeder extends Seeder
{
    
    public function run()
    {
        $data = [
            ['creator_user_id' => 1, 'name' => 'kholil', 'type' => 'Cash', 'amount' => 6000, 'date' =>Carbon::now()->format('Y-m-d')],
            ['creator_user_id' => 1, 'name' => 'haris', 'type' => 'Datch Bangla Bank', 'amount' => 4000, 'date' =>Carbon::now()->format('Y-m-d')],
        ];
        \DB::table('balance_outs')->insert($data);

    }
}
