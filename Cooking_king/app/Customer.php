<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guraded = [];
    protected $table = 'customers';
    public function order()
    {
        return $this->hasMany(Order::class, 'user_id', 'customer_id');
    }
}
