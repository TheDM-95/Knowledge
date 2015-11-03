@extends('layouts.master')
<<<<<<< Updated upstream
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
        var  app = angular.module('QuizApp',['firebase']);
        app.controller('QuizCtrl',function($scope,$firebaseArray){
           var  ref = new Firebase('https://quizapp0.firebaseio.com/questions');
             $scope.data = $firebaseArray(ref);
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
=======

@section("head.title")
	<title> Quiz App </title>
@stop

@section("head.style")	
  	<link rel="stylesheet" href="/css/materialize.min.css">
 	<link rel="stylesheet" href="/css/bootstrap.min.css">
  	<script src="/js/bootstrap.min.js">  </script>
  	<link rel="stylesheet" type="text/css" href="/css/category.css">
@stop

@section("body.content")  
	<?php  		
        if (Auth::check()) {
            $user = Auth::user();
			echo "<div data-ng-init = Id='" . $user->id . "' > </div>";
        }
        else {
        	echo redirect()->route('auth.login');
        }
	?>
	
	<div class="wrap-content"  ng-controller="CategoryController">
      	<div class="back">
        	<a href="{{ route('pages.index') }}">
          		<i class="fa fa-arrow-left">
          		</i>
      		</a>
    	</div>

    	<div  class="container">

		    <div class='wrap-question'>

		        <div class='scorecard' ng-show='isShowScore'>
		        	<h2> @{{_score()}}</h2>
		        	<div class='single-question' ng-repeat="p in pos" ng-show='isShowScore'>
		        		<p ng-if='check_answer[$index]'>A</p>
		        		<p ng-if='!check_answer[$index]'>B</p>
		        		@{{data[p].content}}
		        	</div>
		        </div>


		        <div class='questions'>
		          
		          <div class='single-question' ng-repeat="p in pos" ng-init='index1 = $index' ng-show='$index == count()'>
		            <!--Question area -->
		            <div class='question-title'>
		              <h2>
		                @{{ data[p].content }}
		              </h2>

		              <button class='btn-floating btn-small right' ng-click='summit($index, data[p].type)' ng-show='isShow==true'>
		                <i class='fa fa-check'></i>  Submit 
		              </button>
		            </div>

		            <!--Answer area -->
		            <div class='question-content'>
		                <div ng-if='data[p].type== "1"' ng-repeat="a in ans[$index]" ng-init='index2 = $index'>
		                  <label>
		                      <button class="btn-floating btn-large center" ng-click='choise_click(p, $index)'>
		                        <h4>
		                            @{{ a.type }}
		                        </h4>
		                      </button>
		                        <h2>
		                          @{{ a.answer }}
		                        </h2>
		                  </label>
		                </div>

		                <div ng-if='data[p].type== "2"' ng-repeat="a in ans[$index]" ng-init='index2 = $index'>
		                  <label>
		                      <button class="btn-floating btn-sm center" ng-click='choise_click(p, $index)'>
		                        <h4>
		                            @{{ a.type }}
		                        </h4>
		                      </button>
		                        <h2>
		                          @{{ a.answer }}
		                        </h2>
		                  </label>
		                </div>

		                <div ng-if='data[p].type== "3"' ng-repeat="a in ans[$index]" ng-init='index2 = $index'>
		                  <label>
		                      <button class="btn-floating btn-sm center" ng-click='choise_click(p, $index)'>
		                        <h4>
		                            @{{ a.type }}
		                        </h4>
		                      </button>
		                        <h2>
		                          @{{ a.answer }}
		                        </h2>
		                  </label>
		                </div>
		              
		            </div>
		          </div>
		          
		        </div>
		    </div>



		    <div class='title'>
		        <p>
		          Geography
		        </p>
		        <a class='btn-floating btn-large waves-effect waves-light right'>
		          <i class='fa fa-chevron-right'> </i>
		        </a>
		    </div>
	      <!-- Score area -->
	      	<div class="wrap-progress">
	        	<div class='progress'>
		          	<div class='determinate' style='width: @{{100*count()/pos.length}}%'> </div>
	        	</div>
	        	<div class='avatar'>
		          	<div class='row'>
			            <div class='col m6'> 
			            	<?php
		                            if (Auth::check()) {
		                                $user = Auth::user();
		                                echo "<img src='/" . $user->avatar . "'class='left'  />";
		                            }
		                    ?>
				            <p> Geography  </p>
				            <p>  @{{count()}}/@{{pos.length}} </p>
				              
					    </div>
				        <div class='col m6'>
				            <div class='score'>
					            <p> Score  </p>
					            <p> @{{_score()}} </p>
		              		</div>
		            	</div>
	         		</div>
	        	</div>
	      	</div>
    	</div>
  	</div>
@stop

@section("body.js")	

  	<script>
    	$(".btn-large").click(function(){
      		$(".title").hide("slow");
      		$(".wrap-progress").css("opacity","1");
      		$(".questions").css({ "opacity":"1", "transform":"translateX(0)" });
    	});
    
  	</script>
@stop
>>>>>>> Stashed changes
