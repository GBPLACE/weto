<?php

use Illuminate\Database\Seeder;

class HeaderBannerContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('header_banner_contents')->delete();

        \DB::table('header_banner_contents')->insert(array (
            0 =>
            array (
                'id' => 1,
                'site_content_id' => 1,
                'image' => '16020124242xnhs.jpeg',
                'text' => 'THE BEST WAY TO TRAVEL',
                'created_at' => NULL,
                'updated_at' => '2020-10-06 19:27:04',
            ),
        ));


    }
}
