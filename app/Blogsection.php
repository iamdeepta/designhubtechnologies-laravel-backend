<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogsection extends Model
{
    protected $table = 'tbl_blogsection';
    protected $primaryKey = 'blogsection_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    
}
