<?php

use Illuminate\Database\Seeder;

class UnavailableDatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('unavailable_dates')->delete();



    }
}
