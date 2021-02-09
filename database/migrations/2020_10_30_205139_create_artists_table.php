<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('user_id')->nullable()->default(1);
            $table->string('fullname')->nullable();            
            $table->string('exp');
            $table->unsignedBigInteger('location_id')->default(1);
            $table->unsignedBigInteger('event_id')->default(1);
            $table->unsignedBigInteger('act_id')->default(1);
            $table->string('website')->nullable();
            $table->unsignedBigInteger('status_id')->default(2);
            $table->unsignedBigInteger('role_id')->default(1);
            $table->enum('blocked', ['active', 'blocked'])->default('active');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('act_id')->references('id')->on('acts')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
}
