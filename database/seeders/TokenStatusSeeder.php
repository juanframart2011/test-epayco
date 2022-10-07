<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokenStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'payment_status' )->insert([
            'name' => 'activo'
        ]);

        DB::table( 'payment_status' )->insert([
            'name' => 'cancelado'
        ]);

        DB::table( 'payment_status' )->insert([
            'name' => 'vencido'
        ]);
    }
}
