<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnToVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->after('venue_id');
            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('city_id')->after('country_id');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
            $table->integer('pin_code')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venues', function (Blueprint $table) {
            //
        });
    }
}
