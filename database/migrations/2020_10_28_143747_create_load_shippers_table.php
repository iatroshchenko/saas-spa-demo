<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_shippers', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('load_id');
            $table->foreign('load_id')
                ->references('id')
                ->on('loads')
                ->onDelete('cascade');

            /* Mandatory fields -> info from quote */
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone', 10);
            $table->string('email');
            $table->tinyInteger('type');
            $table->string('company');

            $table->string('description')->nullable();

            $table->string('address_1')
                ->nullable();
            $table->string('address_2')
                ->nullable();

            $table->string('zip', 5)
                ->nullable();
            $table->string('city')
                ->nullable();

            $table->string('state')
                ->nullable();

            $table->string('phone_2',10)
                ->nullable();
            $table->string('mobile', 10)
                ->nullable();

            $table->string('fax', 20)
                ->nullable();
            $table->text('notes_from_shipper')
                ->nullable();

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
        Schema::dropIfExists('load_shippers');
    }
}
