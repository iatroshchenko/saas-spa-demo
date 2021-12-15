<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShippersTableAddPaymentInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shippers', function (Blueprint $table) {
            $table->string('public_key')->nullable();
            $table->string('secret_key')->nullable();
            $table->boolean('test_mode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shippers', function (Blueprint $table) {
            $table->dropColumn('public_key');
            $table->dropColumn('secret_key');
            $table->dropColumn('test_mode');
        });
    }
}
