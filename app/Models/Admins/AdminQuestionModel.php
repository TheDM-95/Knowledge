<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Model;
use App\Models\Objects\QuestionBaseModel;
use App\Models\Objects\AnswerBaseModel;
use DB;

class AdminQuestionModel extends Model
{
	public $questionsList;
    public function __construct() {
    	$this->questionsList = array();
    	//
    }
    //
    public function init() {
    	$answersTable = DB::table('answers')->select('answer_id', 'question_id', 'answer', 'is_correct', 'created_at')->get();
    	$questionsTable = DB::table('questions')->select('question_id','content', 'cat_id', 'is_active', 'level', 'image','created_at')->get();
    	$iCount = 0;
    	foreach ($questionsTable as $qst) {
    		$this->questionsList[$iCount] = $qst;
    		$jCount = 0;
    		foreach ($answersTable as $ans) {
    			if ($ans->question_id == $qst->question_id) {
    				$this->questionsList[$iCount]->answersList[$jCount] = $ans;
    				$jCount ++;
    			}
    		}
    		$iCount ++;
    	}
    }
}
