<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_email');
            $table->integer('ticket_id');
            $table->integer('operator_id');
            //$table->string('cancel_status')->nullable();
            $table->string('customer_name');
            $table->char('customer_nrc_number');
            $table->string('payment_method');
            //$table->dateTimeTz('departure_date');
            $table->string('departure_date');
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
        Schema::dropIfExists('orders');
    }
};
