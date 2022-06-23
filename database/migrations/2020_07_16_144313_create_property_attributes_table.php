<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->integer('terrace')->nullable();
            $table->integer('pool')->nullable();
            $table->integer('tennis')->nullable();
            $table->integer('spa')->nullable();
            $table->integer('gym')->nullable();
            $table->integer('kitchen')->nullable();
            $table->integer('breakfast')->nullable();
            $table->integer('restaurant')->nullable();
            $table->integer('wifi')->nullable();
            $table->integer('tv')->nullable();
            $table->integer('elevator')->nullable();
            $table->integer('safebox')->nullable();
            $table->integer('ac')->nullable();
            $table->integer('coffee')->nullable();
            $table->integer('pets_allowed')->nullable();
            $table->integer('reception')->nullable();
            $table->integer('hairdryer')->nullable();
            $table->integer('bathrobe')->nullable();
            $table->integer('towels')->nullable();
            $table->integer('kit_bathroom')->nullable();
            $table->integer('shower')->nullable();
            $table->integer('bathtub')->nullable();
            $table->integer('dishwasher')->nullable();
            $table->integer('washing_machine')->nullable();
            $table->integer('iron')->nullable();
            $table->integer('ironboard')->nullable();
            $table->integer('baby_cot')->nullable();
            $table->integer('stroller')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('garage')->nullable();
            $table->integer('check_in_24h')->nullable();
            $table->integer('luggage_deposit')->nullable();

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
        Schema::dropIfExists('property_attributes');
    }
}
