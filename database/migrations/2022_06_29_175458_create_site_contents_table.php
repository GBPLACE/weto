<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo', 255);
            $table->string('fb_link', 255);
            $table->string('insta_link', 255);
            $table->string('tweeter_link', 255);
            $table->string('linkin_link', 255);
            $table->string('footer_title', 255);
            $table->text('footer_text');
            $table->string('favicon', 255);
            $table->string('footer_logo', 255);
            $table->text('footer_Credits')->nullable();
            $table->text('footer_logo_text');
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
        Schema::dropIfExists('site_contents');
    }
}
