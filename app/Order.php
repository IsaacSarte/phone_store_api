<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function customer(){
        return $this->belongsTo(Customer::class, 'foreign_key');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'foreign_key');
    }
}
