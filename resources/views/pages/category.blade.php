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

                <div ng-if='items.kind=="mul-choise"'ng-repeat="item in items.answers" ng-init='index2 = $index'>
                  <label>
                    <input type='radio' ng-click='choise_click(index1, index2)'> 
                    <h4>{{item.choise}} : {{item.ans}}</h4>
                  </label>
                </div>
                <div ng-if='items.kind=="not-mul-choise"'>
                   <h4>Answer</h4>
                   <input type='text' ng-model='notmulchoise.answer' ng-click='unMulchoise(index1)'/>
                </div>
                <input type='summit' value='summit' ng-click='summit(items.kind)' ng-show='isShow==true' />
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
                  kind :'mul-choise',
                  answers : [{choise: 'A', ans : 'yes, i did' },{choise: 'B', ans : 'no, i did not'}],
                  correct : 'A' 
                } ,
                {
                  questions : 'How did you know ?',
                   kind : 'not-mul-choise',
                  correct: 'ooh' 
                }
            ];
             $scope.data = database;
             var _score = 0, check = 0;
             $scope.isShow = false;
             var question_1 = 0, answer_1 = 0;
            $scope.choise_click = function(question,answer){
                    question_1 = question; answer_1 = answer;
                    $scope.isShow = $scope.isShow ? false : true;
                   // alert($scope.isShow);
             }
            $scope.incompleteCount = function(){
                  
                    return _score;
            }

            $scope.count = function(){
                    return check;
            }

            $scope.notmulchoise = { answer : ''};
            
            var index_1 = 0;

            $scope.unMulchoise = function(index1){
                  index_1 = index1;
                  $scope.isShow = $scope.isShow ? false : true;
            }

            $scope.summit = function(item_kind){
                  if ((item_kind == 'mul-choise') && ($scope.data[question_1].answers[answer_1].choise == $scope.data[question_1].correct) )
                    {
                            _score++;
                    }
                  if((item_kind=='not-mul-choise')&&($scope.data[index_1].correct==$scope.notmulchoise.answer)) _score++;
                   check++;
                  $scope.isShow = $scope.isShow ? false: true;
            }

            

          
        });
	</script>
@stop
