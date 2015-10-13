<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Objects\AnswerBaseModel;
class AddingAnswerModel extends Model
{
    //
    public $newAnswer;
    //
    public function __construct() {
    	//
    	$this->newAnswer = new AnswerBaseModel();
    }
    //
    public function init($tmpAnswer) {
    	$query = DB::table('answers')->where('answer_id', DB::raw("(select max(`answer_id`) from answers)"))->get();
        if (count($query) == 0) {
            $answerId = 1;
        }
        else {
          $answerId = intval($query[0]->answer_id) + 1;            
        }
    	$this->newAnswer->answer_id = $answerId;
    	$this->newAnswer->question_id = $tmpAnswer->question_id;
    	$this->newAnswer->answer = $tmpAnswer->answer;
    	$this->newAnswer->is_correct = $tmpAnswer->is_correct;
    }
    //
    public function update2Db() {
    	$ansData = array(
    		'answer_id' => $this->newAnswer->answer_id,
    		'question_id' => $this->newAnswer->question_id,
    		'answer' => $this->newAnswer->answer,
    		'is_correct' => $this->newAnswer->is_correct
    	);
    	DB::table('answers')->insert($ansData);
    	DB::disconnect('answers');
    	return 1;
    }
}
