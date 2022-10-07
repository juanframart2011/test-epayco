<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            #$table->unsignedBigInteger('tokenStatu_id')->default(1);
            $table->string('name', 6);
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at');
            $table->foreignIdFor(\App\Models\TokenStatu::class);
            #$table->foreign('tokenStatu_id')->references('id')->on('token_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
