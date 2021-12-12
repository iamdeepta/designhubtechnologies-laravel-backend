<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $table = 'tbl_contact_detail';
    protected $primaryKey = 'contact_detail_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    
}
