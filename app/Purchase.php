<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function courier() {
        return $this->hasOne('App\Courier', 'id', 'courier_id');
    }
    
    public function customer() {
        return $this->hasOne('App\User', 'id', 'customer_id');
    }

    public function purchase_items() {
        return $this->hasMany('App\PurchaseItem');
    }
}
