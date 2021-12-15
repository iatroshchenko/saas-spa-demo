<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();

            $table->string('zip', 5);
            $table->string('type', 10);
            $table->boolean('decommissioned');
            $table->string('primary_city', 60);
            $table->string('state', 2);
            $table->string('timezone', 30);


            $table->string('world_region', 60);
            $table->string('country', 60);

            $table->float('latitude', 11, 7);
            $table->float('longitude', 11, 7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
