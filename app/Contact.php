<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'tbl_contact';
    protected $primaryKey = 'contact_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    
}
