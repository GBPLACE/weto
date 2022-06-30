<?php

use Illuminate\Database\Seeder;

class SiteContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('site_contents')->delete();

        \DB::table('site_contents')->insert(array (
            0 =>
            array (
                'id' => 1,
                'header_logo' => '1655485420eymo7.png',
                'fb_link' => 'https://www.facebook.com/wetooo.co',
                'insta_link' => 'https://instagram.com/wetooo.co',
                'tweeter_link' => 'https://twitter.com/travelwithweto',
                'linkin_link' => 'https://www.linkedin.com/showcase/weto-the-best-way-to-travel',
                'footer_title' => 'Available Soon',
                'footer_text' => 'The platform is fully responsive but the app will also be available soon. For Apple and Android devices.
Thank you.',
                'favicon' => '1655485740l1aln.png',
                'footer_logo' => '1655485420dr96b.png',
                'footer_Credits' => '<p style="text-align: center;"><span style="color: #333333;"><strong>© WETO 2020/21 <br></strong></span><span style="color: #333333;"><a style="color: #333333;" href="https://wetooo.co/travel/terms-privacy-cookies-and-conditions/">Terms</a> - <a style="color: #333333;" href="https://wetooo.co/travel/contact">Contact</a> - <a style="color: #333333;" href="https://wetooo.co/travel/newsletter/">Newsletter</a>
</span></p>
<p style="text-align: center;"><span style="color: #333333;"><strong>Project by </strong></span><span style="color: #333333;"><a style="color: #333333;" href="https://gbplace.co/" target="_blank" rel="noopener"><br>GB PLACE</a> </span></p>',
                'footer_logo_text' => 'WETO. WETOGHETER.',
                'created_at' => NULL,
                'updated_at' => '2022-06-18 00:09:00',
            ),
        ));


    }
}
