<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_transports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->tinyInteger('carrier_type');
            $table->date('available_date');
            $table->date('delivery_date');
            $table->tinyInteger('delivery_accuracy'); // Around / Before / On / or After this date
            $table->float('price', 15, 4);
            $table->float('deposit', 15, 4)->nullable();
            $table->timestamps();

            $table->foreign('quote_id')
                ->references('id')
                ->on('quotes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_transports');
    }
}
