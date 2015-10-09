<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'categories';
    protected $fillable = ['cat_name', 'img_url', 'cat_about', 'cat_position'];
}
