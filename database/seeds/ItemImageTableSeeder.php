<?php

use Illuminate\Database\Seeder;
use App\ItemImage;

class ItemImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('item_id' => '1', 'image' => 'img/products/item1_1.webp'),
            array('item_id' => '1', 'image' => 'img/products/item1_2.webp'),
            array('item_id' => '1', 'image' => 'img/products/item1_3.webp'),
            array('item_id' => '2', 'image' => 'img/products/item2_1.webp'),
            array('item_id' => '2', 'image' => 'img/products/item2_2.webp'),
            array('item_id' => '2', 'image' => 'img/products/item2_3.webp'),
            array('item_id' => '3', 'image' => 'img/products/item3_1.webp'),
            array('item_id' => '3', 'image' => 'img/products/item3_2.webp'),
            array('item_id' => '3', 'image' => 'img/products/item3_3.webp'),
            array('item_id' => '4', 'image' => 'img/products/item4_1.webp'),
            array('item_id' => '4', 'image' => 'img/products/item4_2.webp'),
            array('item_id' => '4', 'image' => 'img/products/item4_3.webp')
        );

        ItemImage::insert($data);
    }
}
