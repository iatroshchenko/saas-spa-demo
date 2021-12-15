<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_destinations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('load_id');
            $table->foreign('load_id')
                ->references('id')
                ->on('loads')
                ->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();

            $table->string('city');
            $table->string('state');
            $table->string('zip', 5);

            $table->decimal('lat', 11, 7)
                ->nullable();
            $table->decimal('lng', 11, 7)
                ->nullable();

            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();

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
        Schema::dropIfExists('load_destinations');
    }
}
