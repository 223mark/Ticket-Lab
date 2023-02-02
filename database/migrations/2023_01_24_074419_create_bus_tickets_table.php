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
        Schema::create('bus_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_code');
            // $table->integer('operator_id');
            $table->string('status')->nullable();
            $table->string('seat_number')->nullable();
            $table->dateTime('date');
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
        Schema::dropIfExists('bus_tickets');
    }
};
