<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{    
    protected $table = 'questions';
    protected $fillable = ['question_id', 'cat_id', 'content', 'type', 'is_active', 'level', 'image'];
}
