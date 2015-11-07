@extends('layouts.master')
@section("head.title")
	<title> Quiz App </title>
@stop

@section("head.style")	
  	<link rel="stylesheet" href="/css/materialize.min.css">
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
					<div class='question-title'>
						<h4>Scorecard: @{{_score()}}</h4>
					</div>
					<div class='single-question' ng-repeat="p in pos" ng-show='isShowScore'>
						<div class="row">
							<div class="col s6">
								@{{data[p].content}}
							</div>
							<div class="col s6">
								<p ng-if='check_answer[$index]'><i class="fa fa-check"></i></p>
								<p ng-if='!check_answer[$index]'><i class="fa fa-times"></i></p>
							</div>
						</div>
					</div>
					
				</div>

		        <div class='questions'>
          
			          <div class='single-question' ng-repeat="p in pos" ng-init='index1 = $index' ng-show='$index == count()'>
			            <!--Question area -->
			            <div class='question-title'>
				          	<h3>
				            	@{{ data[p].content }}
				          	</h3>

				          	<button class='btn-floating btn-small right' ng-click='summit($index, data[p].type)' ng-show='isShow==true'>
				            	<i class='fa fa-check'></i>  Submit 
				          	</button>
			            </div>

			            <!--Answer area -->
			            <div class='question-content'>
			              	<div ng-if='data[p].type== "1"' ng-repeat="a in ans[$index]" ng-init='index2 = $index'>
			                	<label class="row">
									<div class="col m3 s12">
										<button class="btn-floating btn-large center" ng-click='choise_click(p, $index)'>
											<p>
												@{{ a.type }}
											</p>
										</button>
									</div>
				                  	<div class="col m9 s12">	
										<h4>
				                    		@{{ a.answer }}
				                  		</h4>
									</div>
			                	</label>
			              	</div>

			              	<div ng-if='data[p].type== "2"' ng-repeat="a in ans[$index]" ng-init='index2 = $index'>
			                	<label class="row">
				                  	<div class="col m3 s12">
										<button class="btn-floating btn-large center" ng-click='choise_click(p, $index)'>
											<p>
												@{{ a.type }}
											</p>
										</button>
									</div>
				                  	<div class="col m9 s12">	
										<h4>
				                    		@{{ a.answer }}
				                  		</h4>
									</div>
			                	</label>
			              	</div>

			              	<div ng-if='data[p].type== "3"' ng-repeat="a in ans[$index]" ng-init='index2 = $index'>
			                	<label class="row">
				                  	<div class="col m3 s12">
										<button class="btn-floating btn-large center" ng-click='choise_click(p, $index)'>
											<p>
												@{{ a.type }}
											</p>
										</button>
									</div>
				                  	<div class="col m9 s12">	
										<h4>
				                    		@{{ a.answer }}
				                  		</h4>
									</div>
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
			            <div class='col m9 s12'> 
			            	<?php
		                            if (Auth::check()) {
		                                $user = Auth::user();
		                                echo "<img src='/" . $user->avatar . "'class='left'  />";
		                            }
		                    ?>
				            <p> Geography  </p>
				            <p>  @{{count()}}/@{{pos.length}} </p>
				              
					    </div>
				        <div class='col m3 s12'>
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
