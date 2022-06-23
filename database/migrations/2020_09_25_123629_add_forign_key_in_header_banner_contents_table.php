<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForignKeyInHeaderBannerContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('header_banner_contents', function (Blueprint $table) {

            $table->unsignedBigInteger('site_content_id')->after('id')->nullable();
            $table->foreign('site_content_id')->references('id')->on('site_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('header_banner_contents', function (Blueprint $table) {
            //
        });
    }
}
