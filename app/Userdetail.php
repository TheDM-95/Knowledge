<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{    
    protected $table = 'userdetails';
    protected $fillable = ['user_id', 'question_id', 'is_correct'];
}
