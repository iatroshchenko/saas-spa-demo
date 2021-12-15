<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipperMailTemplatesTable extends Migration
{
    public function up()
    {
        /* Default migration changed */
        Schema::create('shipper_mail_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('background_color')
                ->default('#f5f6fa');
            $table->string('mailable'); // type
            $table->string('name');
            $table->text('subject')->nullable();
            $table->text('html_template');
            $table->text('text_template')->nullable();
            $table->boolean('is_active');
            $table->foreignId('shipper_id')
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('shipper_mail_templates');
    }
}
