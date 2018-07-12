<?php

use Illuminate\Database\Seeder;
use App\Courier;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'LBC', 'fee' => 200),
            array('name' => 'JRS', 'fee' => 150),
            array('name' => 'ToGo', 'fee' => 180)
        );

        Courier::insert($data);
    }
}
