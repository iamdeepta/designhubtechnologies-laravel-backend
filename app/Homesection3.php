<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homesection3 extends Model
{
    protected $table = 'tbl_homesection3';
    protected $primaryKey = 'homesection3_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // protected $attributes = [
    //     'homesection1_category' => '',
    //     'homesection1_image1' => '',
    //     'homesection1_image3' => '',
    //     'homesection1_image3' => '',
    //     'homesection1_image4' => '',
    // ];

    //protected $fillable = ['homesection1_category', 'homesection1_image1', 'homesection1_image3', 'homesection1_image3', 'homesection1_image4'];
    
}
