<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('description' => 'Shirts', 'category_id' => 1),
            array('description' => 'Pants', 'category_id' => 1),
            array('description' => 'Shirts', 'category_id' => 2),
            array('description' => 'Pants', 'category_id' => 2)
        );

        SubCategory::insert($data);
    }
}
