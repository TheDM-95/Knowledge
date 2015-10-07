@extends('layouts.master')
@section("head.title") 
    <title>Quiz App</title>
@stop


@section("head.style")
@stop

@section("body.content")
	<div id="content">
	    <div class="row">
	        <div class="col l4 m6 s12">
	            <div class="row">
	                <div class="col l6 m12 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/Cherries-and-fruit-drink.jpg">
	                        </div>
	                        <div class="card-content red">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Food & Drink<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Food & Drink</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col l6 m12 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/general-knowleadge.jpg">
	                        </div>
	                        <div class="card-content gray">
	                            <p><a href="http://google.com">
	                                <span class="card-title">General Knowledge<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">General Knowledge</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col l6 m12 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/nature_and_science.jpg">
	                        </div>
	                        <div class="card-content green">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Science & Nature<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Science and Nature</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col l6 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/TVandMoivies.jpg">
	                        </div>
	                        <div class="card-content violet">
	                            <p><a href="http://google.com">
	                                <span class="card-title">TV & Movies<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">TV & Movies</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/history.jpg">
	                        </div>
	                        <div class="card-content yellow">
	                            <p><a href="http://google.com">
	                                <span class="card-title">History<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">History</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col l4 m6 s12">
	            <div class="row">
	                <div class="col l6 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/music.jpg">
	                        </div>
	                        <div class="card-content violet">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Music<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Music</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col l6 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/sport.jpg">
	                        </div>
	                        <div class="card-content green">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Sports<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Sports</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col s12">
	                    <div class="card higher-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/leaderboard.jpg">
	                        </div>
	                        <div class="card-content yellow">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Leaderboard<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Leaderboard</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col l4 m6 s12">
	            <div class="row">
	                <div class="col s12">
	                    <div class="card higher-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/geography.jpg">
	                        </div>
	                        <div class="card-content blue">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Geography<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Geography</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col l6 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/bbc_entertainment__468.jpg">
	                        </div>
	                        <div class="card-content red">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Entertainment<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Entertainment</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="col l6 s12">
	                    <div class="card shorter-box">
	                        <div class="card-image waves-effect waves-block waves-light">
	                            <img class="activator" src="images/profile.jpg">
	                        </div>
	                        <div class="card-content gray">
	                            <p><a href="http://google.com">
	                                <span class="card-title">Profile<i class="fa fa-arrow-circle-right right"></i></span>
	                            </a></p>
	                        </div>
	                        <div class="card-reveal">
	                            <span class="card-title grey-text text-darken-4">Profile</span>

	                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
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
    	$(".button-collapse").sideNav();
	</script>
@stop