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
            $table->string('header_logo') ;
            $table->string('banner_img') ;
            $table->text('banner_txt') ;
            $table->string('fb_link') ;
            $table->string('insta_link') ;
            $table->string('tweeter_link') ;
            $table->string('linkin_link') ;
            $table->string('footer_title') ;
            $table->text('footer_text') ;
            $table->string('favicon') ;
            $table->string('footer_logo') ;
            $table->text('footer_logo_text') ;
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
