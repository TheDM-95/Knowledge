<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    
    protected $table = 'answers';
    protected $fillable = ['question_id', 'answer', 'is_correct'];
    protected $hidden = ['is_correct'];
}
