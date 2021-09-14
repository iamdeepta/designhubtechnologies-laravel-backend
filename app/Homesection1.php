<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homesection1 extends Model
{
    protected $table = 'tbl_homesection1';
    protected $primaryKey = 'homesection1_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // protected $attributes = [
    //     'homesection1_category' => '',
    //     'homesection1_image1' => '',
    //     'homesection1_image2' => '',
    //     'homesection1_image3' => '',
    //     'homesection1_image4' => '',
    // ];

    //protected $fillable = ['homesection1_category', 'homesection1_image1', 'homesection1_image2', 'homesection1_image3', 'homesection1_image4'];
    
}
