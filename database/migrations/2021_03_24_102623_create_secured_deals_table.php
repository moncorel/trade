<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuredDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secured_deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->string('second_party_nickname');
            $table->string('conditions');
            $table->string('deadline');
            $table->string('currency_type');
            $table->string('amount');
            $table->string('password')->nullable();
            $table->timestamps();

            $table
                ->foreign('seller_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('buyer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secured_deals');
    }
}
