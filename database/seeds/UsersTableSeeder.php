<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Customer One', 'email' => 'one@gmail.com', 'password' => bcrypt('password')),
            array('name' => 'Customer Two', 'email' => 'two@gmail.com', 'password' => bcrypt('password'))
        );

        User::insert($data);
    }
}
