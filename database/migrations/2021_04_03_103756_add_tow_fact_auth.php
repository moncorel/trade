<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTowFactAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('two_factor_active')->default(false);
            $table->string('two_factor_code')->nullable();
            $table->string('two_factor_method')->nullable();
            $table->string('telegram_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('two_factor_active');
            $table->dropColumn('two_factor_code');
            $table->dropColumn('two_factor_method');
            $table->dropColumn('telegram_id');
        });
    }
}
