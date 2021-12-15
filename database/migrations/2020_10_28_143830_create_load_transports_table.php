<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Quote\QuoteTransport;

class CreateLoadTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_transports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('load_id');
            $table->foreign('load_id')
                ->references('id')
                ->on('loads')
                ->onDelete('cascade');

            $table->tinyInteger('carrier_type');
            $table->date('available_date');
            $table->date('delivery_date');

            $table
                ->tinyInteger('available_accuracy')
                ->default(QuoteTransport::DELIVERY_ACCURACY_ON);

            $table->tinyInteger('delivery_accuracy');// Around / Before / On / or After this date

            $table->float('price', 15, 4);
            $table->float('deposit', 15, 4)->nullable();

            $table->tinyInteger('customer_pay_terms')->nullable();
            $table->tinyInteger('carrier_pay_terms')->nullable();
            $table->float('carrier_pay', 15, 4)->nullable();

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
        Schema::dropIfExists('load_transports');
    }
}
