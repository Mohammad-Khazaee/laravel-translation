<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statusesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status' => 'در حال برسی'
        ]);
        DB::table('statuses')->insert([
            'status' => 'قیمت گذاری شده'
        ]);
        DB::table('statuses')->insert([
            'status' => 'پرداخت شده'
        ]);
        DB::table('statuses')->insert([
            'status' => 'ترجمه شده'
        ]);
        DB::table('statuses')->insert([
            'status' => 'رد شده'
        ]);
    }
}
