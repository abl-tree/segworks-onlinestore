<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    public function purchase() {
        return $this->hasOne('App\Purchase', 'id', 'purchase_id');
    }

    public function item() {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
