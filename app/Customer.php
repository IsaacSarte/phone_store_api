<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email_address', 'mobile_number', 'address', 'status'];

    public function order() {
        return $this->hasMany(Order::class);
    }
}
