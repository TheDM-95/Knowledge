<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{    
    protected $table = 'questions';
    protected $fillable = ['cat_id', 'content', 'type', 'level', 'image'];
}
