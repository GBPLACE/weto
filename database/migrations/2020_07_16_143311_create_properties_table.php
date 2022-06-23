<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('number')->nullable();
            $table->string('capacity')->nullable();
            $table->string('number_of_people')->nullable();
            $table->string('type')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('floor')->nullable();
            $table->text('description')->nullable();
            $table->float('price_per_night')->nullable();
            $table->string('currency')->nullable();
            $table->string('each_extra_guest')->nullable();
            $table->string('final_cleaning')->nullable();
            $table->string('city_tax')->nullable();
            $table->text('property_url')->nullable();
            $table->integer('draft')->default(0);
            $table->integer('verify')->default(0);
            $table->integer('block')->default(0);
            $table->integer('featured')->default(0);

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
        Schema::dropIfExists('properties');
    }
}
