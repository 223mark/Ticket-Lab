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
            $table->string('expired_status')->nullable()->default('unexpired');
            $table->string('customer_name');
            $table->char('customer_nrc_number');
            $table->string('payment_method');
            //$table->dateTimeTz('departure_date');
            $table->date('departure_date');
            $table->date('created_at');
            $table->date('updated_at')->nullable();
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
