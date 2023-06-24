<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function commentshow()
    {
        return $this->HasMany(Comment::class, 'idBlog', 'id')->orderBy('id','DESC');
    }

}
