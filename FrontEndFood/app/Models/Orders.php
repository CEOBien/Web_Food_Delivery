<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];
    public function orderItems()
    {
        return $this->belongsToMany(Order_Items::class, 'order_id', 'product_id');
    }
}
