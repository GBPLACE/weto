<?php

use Illuminate\Database\Seeder;

class WishListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('wish_lists')->delete();

        \DB::table('wish_lists')->insert(array (
            0 =>
            array (
                'id' => 33,
                'user_id' => 1,
                'property_id' => 19,
                'created_at' => '2021-04-19 15:16:11',
                'updated_at' => '2021-04-19 15:16:11',
            ),
        ));


    }
}
