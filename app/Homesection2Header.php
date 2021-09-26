<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homesection2Header extends Model
{
    protected $table = 'tbl_homesection2_header';
    protected $primaryKey = 'homesection2_header_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    
}
