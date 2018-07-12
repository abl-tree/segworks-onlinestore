<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('item_id' => 1, 'category_id' => 1, 'sub_category_id' => 1),
            array('item_id' => 2, 'category_id' => 1, 'sub_category_id' => 2),
            array('item_id' => 3, 'category_id' => 2, 'sub_category_id' => 3),
            array('item_id' => 4, 'category_id' => 2, 'sub_category_id' => 4)
        );

        ItemCategory::insert($data);
    }
}
