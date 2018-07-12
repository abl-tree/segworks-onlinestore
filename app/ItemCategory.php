<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public function item() {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }

    public function sub_category() {
        return $this->hasOne('App\SubCategory', 'id', 'subcategory_id');
    }

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
