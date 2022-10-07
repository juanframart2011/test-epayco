<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
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
            'name' => 'pendiente de confirmación de token'
        ]);

        DB::table( 'payment_status' )->insert([
            'name' => 'aceptado'
        ]);

        DB::table( 'payment_status' )->insert([
            'name' => 'rechazado'
        ]);
    }
}
