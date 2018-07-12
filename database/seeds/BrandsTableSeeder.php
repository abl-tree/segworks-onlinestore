<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Brand X'),
            array('name' => 'Brand Y'),
            array('name' => 'Brand Z')
        );

        Brand::insert($data);
    }
}
