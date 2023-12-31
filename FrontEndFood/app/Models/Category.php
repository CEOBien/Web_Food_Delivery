<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'categories';
    //category childrent
    public function categoryChildrent()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    //phuong thuc trung gian tro den danh muc
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
