<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipper_id')
                ->references('id')
                ->on('shippers')
                ->onDelete('cascade');

            $table->foreignId('client_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->tinyInteger('status')->default(\App\Models\Quote::STATUS_QUOTE);

            $table
                ->tinyInteger('deleted_with_status')
                ->nullable();

            $table->text('signature_image')
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
        Schema::dropIfExists('quotes');
    }
}
