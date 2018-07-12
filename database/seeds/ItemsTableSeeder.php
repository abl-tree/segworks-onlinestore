<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Item A', 'price' => 120, 'brand_id' => 1, 'seller_id' => 1),
            array('name' => 'Item B', 'price' => 295.50, 'brand_id' => 2, 'seller_id' => 1),
            array('name' => 'Item C', 'price' => 430, 'brand_id' => 3, 'seller_id' => 1),
            array('name' => 'Item D', 'price' => 99, 'brand_id' => 2, 'seller_id' => 1),
        );

        Item::insert($data);
    }
}
