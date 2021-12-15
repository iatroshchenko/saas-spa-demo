<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_metas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->tinyInteger('type');
            $table->string('company');

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
        Schema::dropIfExists('client_metas');
    }
}
