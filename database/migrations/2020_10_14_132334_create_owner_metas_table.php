<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_metas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');

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
        Schema::dropIfExists('owner_metas');
    }
}
