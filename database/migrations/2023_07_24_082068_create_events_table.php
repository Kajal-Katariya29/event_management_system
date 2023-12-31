<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('event_id');
            $table->text('name');
            $table->text('description');
            $table->unsignedBigInteger('event_category_id');
            $table->foreign('event_category_id')->references('event_category_id')->on('event_categories')->onDelete('cascade');
            $table->unsignedBigInteger('organizer_id');
            $table->foreign('organizer_id')->references('organizer_id')->on('organizers')->onDelete('cascade');
            $table->unsignedBigInteger('venue_id');
            $table->foreign('venue_id')->references('venue_id')->on('venues')->onDelete('cascade');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->enum('status',[0,1]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
