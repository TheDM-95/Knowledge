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
            <div ng-repeat="items in data" ng-init='index1 = $index' ng-show='index1 == count()'>
                <!--Question area -->
                <h2>{{items.questions}}</h2>
                <!--Answer area -->
                <div ng-repeat="item in items.answers" ng-init='index2 = $index'>
                  <label>
                    <input type='radio' ng-click='choise_click(index1, index2)'> 
                    <h4>{{item.choise}} : {{item.ans}}</h4>
                  </label>
                  
                </div>
                <!--button summit appear when user chose a choise -->
                <input type='summit' value='summit' ng-click='summit()' ng-show='isShow==true' />
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
                   answers : [{choise: 'A', ans : 'yes, i did ! Yahoo' },{choise: 'B', ans : 'no, i did not Whoope'}],
                  correct: 'A' 
                }
            ];
             $scope.data = database;
             var _score = 0, check = 0;
             $scope.isShow = false;
            $scope.choise_click = function(question,answer){
                    if ($scope.data[question].answers[answer].choise == $scope.data[question].correct )
                    {
                            _score++;
                    }
                    $scope.isShow = $scope.isShow ? false : true;
                   // alert($scope.isShow);
             }
            $scope.incompleteCount = function(){
                  
                    return _score;
            }

            $scope.count = function(){
                    return check;
            }

            $scope.summit = function(){
                   check++;
                  $scope.isShow = $scope.isShow ? false: true;
            }
        });
	</script>
@stop
