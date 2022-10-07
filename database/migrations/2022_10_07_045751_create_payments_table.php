<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_id');
            $table->unsignedBigInteger('token_id');
            $table->unsignedBigInteger('paymentStatu_id');
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at');
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->foreign('token_id')->references('id')->on('tokens');
            $table->foreign('paymentStatu_id')->references('id')->on('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
