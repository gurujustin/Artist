<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->string('subject')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('name')->nullable();
            $table->string('tel')->nullable();
            $table->boolean('checked')->default(0);
            $table->boolean('draft')->default(1);
            $table->boolean('trashed')->default(0);
            $table->string('event_date')->nullable();
            $table->boolean('owner')->default(0);
            $table->string('file')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
