<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class AnswerBaseModel extends Model
{
    //
    public $answer_id;
    public $question_id;
    public $answer;
    public $is_correct;
    public $created_at;
    public $updated_at;
    public function init($id, $question_id, $answer, $is_correct) {
    	$this->answer_id = $id;
    	$this->question_id = $question_id;
    	$this->answer = $answer;
    	$this->is_correct = $is_correct;
    }
}
