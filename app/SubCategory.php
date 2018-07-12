<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function item_categories() {
        return $this->hasMany('App\ItemCategory');
    }
}
