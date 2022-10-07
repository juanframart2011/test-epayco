<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {

            $table->id();
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at');
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\WalletStatu::class)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}