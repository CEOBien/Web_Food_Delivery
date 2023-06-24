<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'coment';
    protected $guarded = [];
    //phần này nếu các bạn k hiểu có thể xem lại khoa relationship laravel của a Đức
    public function cus()
    {
        return $this->hasOne(User::class, 'id', 'idUser');
    }
    public function reply()
    {
        return $this->hasMany( Comment ::class, 'reply_id', 'id');
    }
}
