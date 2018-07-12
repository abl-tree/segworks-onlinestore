<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function brand() {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }

    public function item_category() {
        return $this->hasOne('App\ItemCategory');
    }

    public function purchase_item() {
        return $this->hasOne('App\PurchaseItem');
    }

    public function seller() {
        return $this->hasOne('App\User', 'id', 'seller_id');
    }

    public function images() {
        return $this->hasMany('App\ItemImage');
    }
}
