<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletStatusSeeder extends Seeder
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
            'name' => 'pendiente de aprobación'
        ]);

        DB::table( 'payment_status' )->insert([
            'name' => 'rechazado'
        ]);

        DB::table( 'payment_status' )->insert([
            'name' => 'cancelada'
        ]);
    }
}
