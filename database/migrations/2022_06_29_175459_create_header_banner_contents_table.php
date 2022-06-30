<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderBannerContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_banner_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_content_id')->nullable();
            $table->string('image', 255);
            $table->text('text');
            $table->timestamps();
            
            $table->foreign('site_content_id', 'header_banner_contents_site_content_id_foreign')->references('id')->on('site_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_banner_contents');
    }
}
