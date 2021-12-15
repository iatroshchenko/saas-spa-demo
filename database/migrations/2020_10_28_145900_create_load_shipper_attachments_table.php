<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadShipperAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_shipper_attachments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('load_shipper_id');
            $table->foreign('load_shipper_id')
                ->references('id')
                ->on('load_shippers')
                ->onDelete('cascade');

            $table->string('path');

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
        Schema::dropIfExists('load_shipper_attachments');
    }
}
