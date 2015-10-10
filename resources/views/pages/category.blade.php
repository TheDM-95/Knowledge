@extends('layouts.master')
@section("head.title") 
    <title>Quiz App</title>
@stop
@section('body.content')
	<!-- Back button-->
   <div class="theader"><a href="back">Back</a><div>
   <!-- Body-->
   <div  class="tbody" ng-app="QuizApp">
      <div ng-controller="QuizCtrl">
            <div ng-repeat="items in data">
                <!--Question area -->
                <h2>{{items.questions}}</h2>
                <!--Answer area -->
                <div ng-repeat="item in items.answers">
                    <input type='radio' ng-click='choise_click(item.choise, item.correct_ans)'><h4>{{item.choise}} : {{item.ans}}</h4>
                </div>
            </div> 
      </div>
   </div>
   <!-- Score area -->
   <div class="tfooter">
        <h1>Your score</h1>
   </div>
@stop
@section('body.js')
	<script type="text/javascript">
		 var  app = angular.module('QuizApp',[]);
        app.controller('QuizCtrl',function($scope){
             database =  [ {
                  questions : 'Did you do that ?',
                  answers : [{choise: 'A', ans : 'yes, i did' },{choise: 'B', ans : 'no, i did not'}],
                  correct_ans : 'A' 
                } 
            ];
             $scope.data = database;
             var _score = 0;
             $scope.choise_click = function(item_choise, item_ans){
                    if (item_choise == item_ans) _score += 8;
             }

             $scope.scope = _score;
        });
	</script>
@stop
