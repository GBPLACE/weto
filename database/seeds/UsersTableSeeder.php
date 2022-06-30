<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'User',
                'email' => 'user@gmail.com',
                'email_verification' => 1,
                'token' => NULL,
                'password' => '$2y$10$p5XticKFL2lCTQX75194OeR8JToxXHvt5DQftNdO/unCqx1nuOyWy',
                'created_at' => NULL,
                'updated_at' => '2020-10-06 06:57:12',
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Giovanni Battista',
                'email' => 'travel@gbplace.co',
                'email_verification' => 1,
                'token' => 'ciw3Z9v2zN6remvgItsV',
                'password' => '$2y$10$LcVBn5g/gFIuywq3TYpqsuTO1VGpQYPDJWnWg2n34RKUBJ4JrhdpG',
                'created_at' => '2020-10-06 18:58:47',
                'updated_at' => '2020-10-06 18:58:47',
            ),
            2 =>
            array (
                'id' => 6,
                'name' => 'Biagio Colosi',
                'email' => 'info@anticastazione.com',
                'email_verification' => 1,
                'token' => 'erxsYVAKQkaIdVIFG4yG',
                'password' => '$2y$10$0.BoNqHNzdZahTkj6U/TUuFrEyBIi8z7KIX2EGcd6olh1kpVfGzpO',
                'created_at' => '2021-07-23 14:51:13',
                'updated_at' => '2021-07-23 14:51:13',
            ),
        ));


    }
}
