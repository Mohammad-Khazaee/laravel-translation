<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ticketsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert([
            'id' => 1,
            'status' => 'didnt answer'
        ]);
        DB::table('ticket_statuses')->insert([
            'id' => 2,
            'status' => 'answered'
        ]);
        DB::table('ticket_statuses')->insert([
            'id' => 3,
            'status' => 'closed'
        ]);
    }
}
