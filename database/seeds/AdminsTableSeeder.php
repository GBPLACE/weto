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
            1 =>
                array (
                    'id' => 8,
                    'name' => 'Matteo Galacci',
                    'email' => 'm.galacci@gmail.com',
                    'token' => NULL,
                    'password' => '$2y$10$uqr45PmEc2qId5BlAUTVMeoQBWeOb.10OKeJSNZ1kjNqEaQ6Is3zW',
                    'created_at' => '2022-06-30 15:00:42',
                    'updated_at' => '2022-06-30 15:00:42',
                ),
        ));


    }
}
