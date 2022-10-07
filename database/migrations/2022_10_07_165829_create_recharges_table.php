<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            #$table->unsignedBigInteger('wallet_id');
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at');
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
        Schema::dropIfExists('recharges');
    }
}
