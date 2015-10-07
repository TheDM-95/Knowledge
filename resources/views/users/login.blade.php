@extends("layouts.master")
@section("head.title")
	<title> Quiz-app </title>

@stop


@section("head.style")
    <link href="css/bootstrap.min.css" rel="stylesheet">
  @stop

@section("body.content")
	<div id='content'>
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 ng-scope" ng-controller="LoginController" style="margin-top:30px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">Đăng nhập</div>
					<div style="float:right; font-size: 80%; position: relative; top:-10px">
						<a ui-sref="forgot" href="#/forgot">Quên mật khẩu</a>
						<a ui-sref="signup" href="#/signup">Đăng ký</a>
					</div>
				</div>

			<div class="panel-body">
				{!! Form::open(array(
						'route' => ['users.login'],
						'method' => 'POST',
						'role' => 'form',
						'ng-submit' => "doLogin()",
						'name' => 'form',
			    		'class' =>  'ng-pristine ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength'
					)) !!}
				
							@include("users._form", ['button_name' => 'Login'])
			    
				{!! Form::close() !!}
			</div>
		</div>

	</div>
@stop

@section("body.js")
    <script src="js/app.js" ></script>
@stop
