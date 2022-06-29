<?php

use Illuminate\Database\Seeder;

class SiteSeosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('site_seos')->delete();

        \DB::table('site_seos')->insert(array (
            0 =>
            array (
                'id' => 1,
                'site_page_number' => 1,
                'page_title' => 'The New Way to Travel | Homes, Places and Vacation Rentals. Directly.',
                'keywords' => 'Travel, weekend, weto, booking, reservation, holiday, trip, no fee',
                'description' => 'WETO was born with the intention of making the choice of accommodation for your holidays or weekends even faster, practical and economical. Enter the necessary information the engine will look for accommodation in all available accommodation facilities. Once the most suitable accommodation is found for the search, the client will be directed directly to the site of the accommodation. The New Way to Travel, Homes, Places and Vacation Rentals. Directly.',
                'created_at' => NULL,
                'updated_at' => '2021-07-22 23:23:35',
            ),
            1 =>
            array (
                'id' => 2,
                'site_page_number' => 2,
                'page_title' => 'Search your house, apartment or room',
                'keywords' => 'house, apartment, room, loft, chalet, hotel, b&B',
                'description' => 'Example description',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'site_page_number' => 3,
                'page_title' => 'Rent your house, apartment or room. Directly.',
                'keywords' => 'rent, house, apartment, room, directly',
                'description' => 'WETO get 1% at the time of actual booking, only by the hotel. This means a considerable saving on the part of the structure compared to other platforms and therefore the possibility of applying prices more competitive on their rooms or apartments. If the structure does not have its own website, suitable for online reservations, WETO will be able to make it.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
