<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admins\AdminQuestionModel;
use App\Models\Admins\AddingAnswerModel;
use DB;

class QuestionManagerController extends Controller
{
    public function __construct() {
        //
    }
    //
    public function index() {
        $adminQuestion = new AdminQuestionModel();
        $adminQuestion->init();
        $questionsList = $adminQuestion->questionsList;
        $dataList = json_encode($questionsList);
        echo $dataList;
    }
    //
    public function addAnswer(Request $request) {
        $newAnsData = $request->input('newAnswerData');
        $newAns = json_decode($newAnsData);
        $addingAns = new AddingAnswerModel();
        $addingAns->init($newAns);
        //var_dump($addingAns->newAnswer);
        //return;
        $result = $addingAns->update2Db();
        echo $result;
    }
    //
    public function deleteAnswer(Request $resquest) {
        $answerId = $resquest->input('answerId');
        DB::table('answers')->where('answer_id', $answerId)->delete();
        echo 1;
    }
}
