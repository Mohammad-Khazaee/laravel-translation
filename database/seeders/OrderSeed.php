<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('orders')->insert([
                'user_id' => 1,
                'files' => json_encode(['1'=>'2']),
                'status_id' => 1
            ]);
    }
}
