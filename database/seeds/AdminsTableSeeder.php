<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'softenicauser@gmail.com',
                'token' => NULL,
                'password' => '$2y$10$2q/3s6S5px.bRw3RKYSKvuNR0j/LtTtgYTIKGHYAWzgF9SSjw/sIS',
                'created_at' => '2020-07-24 11:14:38',
                'updated_at' => '2020-09-26 06:47:25',
            ),
            1 =>
            array (
                'id' => 5,
                'name' => 'softenica',
                'email' => 'softenicauser121@gmail.com',
                'token' => NULL,
                'password' => '12345678',
                'created_at' => '2020-10-08 06:30:46',
                'updated_at' => '2020-10-08 06:46:52',
            ),
            2 =>
            array (
                'id' => 7,
                'name' => 'GB',
                'email' => 'admin@wetooo.co',
                'token' => NULL,
                'password' => '$2y$10$sbBFBNHfMmvkX.CnBs3RTu2lwMdqCGgRJBg3ohfMTu9.UTYOvGACC',
                'created_at' => '2021-06-14 18:03:30',
                'updated_at' => '2021-06-14 18:03:30',
            ),
        ));


    }
}
