<?php

use Illuminate\Database\Seeder;

class VillasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('villas')->delete();

        \DB::table('villas')->insert(array (
            0 =>
            array (
                'id' => 3,
                'villa' => 'Apartments',
                'create_at' => '2020-10-18 16:45:41',
            ),
            1 =>
            array (
                'id' => 4,
                'villa' => 'Loft',
                'create_at' => '2020-10-18 18:20:27',
            ),
            2 =>
            array (
                'id' => 5,
                'villa' => 'Guesthouses',
                'create_at' => '2020-10-18 18:20:33',
            ),
            3 =>
            array (
                'id' => 7,
                'villa' => 'Hotels',
                'create_at' => '2020-10-18 18:20:47',
            ),
            4 =>
            array (
                'id' => 8,
                'villa' => 'Vacation Homes',
                'create_at' => '2020-10-18 18:20:52',
            ),
            5 =>
            array (
                'id' => 9,
                'villa' => 'Hostels',
                'create_at' => '2020-10-18 18:20:59',
            ),
            6 =>
            array (
                'id' => 10,
                'villa' => 'Homestays',
                'create_at' => '2020-10-18 18:21:07',
            ),
            7 =>
            array (
                'id' => 11,
                'villa' => 'Villas',
                'create_at' => '2020-10-18 18:21:23',
            ),
            8 =>
            array (
                'id' => 12,
                'villa' => 'Farm Stays',
                'create_at' => '2020-10-18 18:21:28',
            ),
            9 =>
            array (
                'id' => 13,
                'villa' => 'Resort Villages',
                'create_at' => '2020-10-18 18:21:34',
            ),
            10 =>
            array (
                'id' => 14,
                'villa' => 'Resort',
                'create_at' => '2020-10-18 18:21:39',
            ),
            11 =>
            array (
                'id' => 15,
                'villa' => 'Campgrounds',
                'create_at' => '2020-10-18 18:21:46',
            ),
            12 =>
            array (
                'id' => 16,
                'villa' => 'Lodges',
                'create_at' => '2020-10-18 18:21:51',
            ),
            13 =>
            array (
                'id' => 17,
                'villa' => 'Motorhomes',
                'create_at' => '2020-10-18 18:21:56',
            ),
            14 =>
            array (
                'id' => 18,
                'villa' => 'Boats',
                'create_at' => '2020-10-18 18:22:01',
            ),
            15 =>
            array (
                'id' => 20,
                'villa' => 'B&B',
                'create_at' => '2020-10-22 09:35:27',
            ),
        ));


    }
}
