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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('walletStatu_id')->default(1);
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('walletStatu_id')->references('id')->on('wallet_status');
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