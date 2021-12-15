<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_vehicles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('load_id');
            $table->foreign('load_id')
                ->references('id')
                ->on('loads')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('year');
            $table->string('make', 40);
            $table->string('model', 30);
            $table->boolean('is_running')->nullable();
            $table->tinyInteger('size');

            $table->string('vin')
                ->nullable();

            $table->string('state')
                ->nullable();

            $table->string('color', 30)
                ->nullable();
            $table->string('plate_number', 10)
                ->nullable();
            $table->string('lot_number', 10)
                ->nullable();
            $table->string('p_o_number', 10)
                ->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('load_vehicles');
    }
}
