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
            $table->id('ticket_id');
            $table->string('ticket_code');
            //$table->foreignId('route_id')->constrained()->onDelete('cascade');
            $table->foreignId('route_id');
            $table->foreignId('operator_id')->constrained()->onDelete('cascade');
            $table->string('status')->nullable();
            $table->string('price');
            $table->string('seat_number')->nullable();
            // $table->timestamp('departure_date');
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
