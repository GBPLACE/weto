<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnavailableDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unavailable_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('property_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            
            $table->foreign('property_id', 'unavailable_dates_property_id_foreign')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unavailable_dates');
    }
}
