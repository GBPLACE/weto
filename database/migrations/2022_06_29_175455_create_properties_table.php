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
            $table->unsignedInteger('partner_id');
            $table->string('name', 255)->nullable();
            $table->unsignedInteger('country_id');
            $table->string('province', 255);
            $table->integer('villa_id')->nullable();
            $table->integer('property_type_id')->nullable();
            $table->string('city', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('number', 255)->nullable();
            $table->string('capacity', 255)->nullable();
            $table->string('number_of_people', 255)->nullable();
            $table->string('bedroom', 255)->nullable();
            $table->string('bathroom', 255)->nullable();
            $table->string('floor', 255)->nullable();
            $table->text('description')->nullable();
            $table->double('price_per_night')->nullable();
            $table->string('currency', 255)->nullable();
            $table->string('each_extra_guest', 255)->nullable();
            $table->string('final_cleaning', 255)->nullable();
            $table->string('city_tax', 255)->nullable();
            $table->text('property_url')->nullable();
            $table->integer('draft')->default(0);
            $table->integer('verify')->default(0);
            $table->integer('block')->default(0);
            $table->boolean('reject')->default(0);
            $table->integer('featured')->default(0);
            $table->timestamps();
            
            $table->foreign('country_id', 'properties_country_id_foreign')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('partner_id', 'properties_partner_id_foreign')->references('id')->on('partners')->onDelete('cascade');
            $table->foreign('property_type_id', 'properties_property_type_id_foreign')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('villa_id', 'properties_villa_id_foreign')->references('id')->on('villas')->onDelete('cascade');
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
