@extends('layouts.master')
@section("head.title") 
    <title>Quiz App</title>
@stop
@section('body.content')
	<div ng-app="QuizApp" ng-controller="QuizCtrl">
   <!-- Back button-->
   <div class="theader"><a href="back">Back</a></div>
   <!-- Body-->
   <div  class="tbody">
            <div ng-repeat="items in data">
                <!--Question area -->
                <h2>{{items.questions}}</h2>
                <!--Answer area -->
                <div ng-repeat="item in items.answers">
                    <input type='radio' ng-click='choise_click(item.choise,items.correct)'> 
                    <h4>{{item.choise}} : {{item.ans}}</h4> 
                </div>
            </div> 
   </div>
   <!-- Score area -->
   <div class="tfooter">
        <h1>Your score</h1>
        <span>{{incompleteCount()}}</span>
   </div>
</div>
@stop
@section('body.js')
	<script type="text/javascript">
		 var  app = angular.module('QuizApp',[]);
        app.controller('QuizCtrl',function($scope){
           var   database =  [ {
                  questions : 'Did you do that ?',
                  answers : [{choise: 'A', ans : 'yes, i did' },{choise: 'B', ans : 'no, i did not'}],
                  correct : 'A' 
                } ,
                {
                  questions : 'How did you know ?',
                   answers : [{choise: 'A', ans : 'yes, i did' },{choise: 'B', ans : 'no, i did not'}],
                  correct: 'A' 
                }
            ];
             $scope.data = database;
             var _score = 0;
            $scope.choise_click = function(item_choise,item_ans){
                    if ((item_choise) &&(item_ans) &&(item_choise == item_ans)) _score++;
             }


            $scope.incompleteCount = function(){
                  
                    return _score;
            }

        });
	</script>
@stop
