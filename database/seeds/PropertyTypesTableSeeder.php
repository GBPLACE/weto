<?php

use Illuminate\Database\Seeder;

class PropertyTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('property_types')->delete();

        \DB::table('property_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Apartment',
                'create_at' => '2020-10-15 06:48:37',
            ),
            1 =>
            array (
                'id' => 5,
                'name' => 'Loft',
                'create_at' => '2020-10-15 08:20:31',
            ),
            2 =>
            array (
                'id' => 8,
                'name' => 'Villas',
                'create_at' => '2020-10-18 10:09:29',
            ),
            3 =>
            array (
                'id' => 11,
                'name' => 'Penthouse',
                'create_at' => '2020-10-18 18:24:15',
            ),
            4 =>
            array (
                'id' => 12,
                'name' => 'Suite',
                'create_at' => '2020-10-18 18:24:26',
            ),
            5 =>
            array (
                'id' => 13,
                'name' => 'Deluxe Suite',
                'create_at' => '2020-10-18 18:24:35',
            ),
            6 =>
            array (
                'id' => 14,
                'name' => 'Double Room',
                'create_at' => '2020-10-18 18:24:52',
            ),
            7 =>
            array (
                'id' => 15,
                'name' => 'Single Room',
                'create_at' => '2020-10-18 18:24:57',
            ),
            8 =>
            array (
                'id' => 16,
                'name' => 'Triple Room',
                'create_at' => '2020-10-18 18:26:36',
            ),
            9 =>
            array (
                'id' => 17,
                'name' => 'Senior Suite',
                'create_at' => '2020-10-18 18:26:54',
            ),
            10 =>
            array (
                'id' => 18,
                'name' => 'Deluxe',
                'create_at' => '2020-10-18 18:27:28',
            ),
            11 =>
            array (
                'id' => 19,
                'name' => 'Standard',
                'create_at' => '2020-10-18 18:27:41',
            ),
            12 =>
            array (
                'id' => 20,
                'name' => 'Junior Suite',
                'create_at' => '2021-03-08 12:18:21',
            ),
            13 =>
            array (
                'id' => 21,
                'name' => 'Master Suite',
                'create_at' => '2021-03-08 17:16:32',
            ),
        ));


    }
}
