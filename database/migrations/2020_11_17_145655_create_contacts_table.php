<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');

            $table
                ->unsignedBigInteger('shipper_id')
                ->nullable();

            $table
                ->foreign('shipper_id')
                ->references('id')
                ->on('shippers')
                ->onDelete('cascade');

            $table
                ->unsignedBigInteger('contact_group_id')
                ->nullable();

            $table
                ->foreign('contact_group_id')
                ->references('id')
                ->on('contact_groups')
                ->onDelete('cascade');

            $table
                ->boolean('is_primary')
                ->nullable()
                ->default(false);

            $table->string('first_name');
            $table->string('last_name');

            $table->string('phone');
            $table->string('email');
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
        Schema::dropIfExists('contacts');
    }
}
