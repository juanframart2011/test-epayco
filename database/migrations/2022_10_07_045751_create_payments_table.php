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
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at');

            $table->foreignIdFor(\App\Models\PaymentStatu::class)->default(2);
            $table->foreignIdFor(\App\Models\Token::class);
            $table->foreignIdFor(\App\Models\Wallet::class);
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
