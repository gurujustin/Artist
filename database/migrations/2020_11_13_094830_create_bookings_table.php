<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number');
            $table->unsignedBigInteger('price_location_id');
            $table->string('name');
            $table->string('email');
            $table->string('tel');
            $table->unsignedBigInteger('event_id');
            $table->text('venue');
            $table->string('datetime');
            $table->text('other');
            $table->float('amount');
            $table->integer('status_id');
            $table->dateTime('paid_datetime')->nullable();
            $table->dateTime('datetime1');
            $table->timestamps();

            $table->foreign('price_location_id')->references('id')->on('price_locations')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
