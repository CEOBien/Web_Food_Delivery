<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    public $timestamps = false;
    protected $table = 'statistical';
    // protected $primaryKey = "id";
    protected $guarded = [];
}
