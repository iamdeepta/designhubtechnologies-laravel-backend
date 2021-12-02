<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'tbl_newsletter';
    protected $primaryKey = 'newsletter_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    
}
