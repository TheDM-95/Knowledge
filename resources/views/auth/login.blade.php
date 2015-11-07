@extends("layouts.master")
@section("head.title")
    <title> Quiz-app </title>

@stop

@section("head.style")
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  @stop

@section("body.content")
    <div id='content'>

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 ng-scope" ng-controller="LoginController" style="margin-top:30px;">
            <a class="btn btn-info" href="{{ route('auth.facebook') }}" role="button"> Login with facebook </a>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Đăng nhập</div>
                    <div style="float:right; font-size: 90%; position: relative; top:-20px">
                        <a ui-sref="forgot" href="#/forgot">Quên mật khẩu</a>
                        <a ui-sref="signup" href="{{ url('auth/register') }}"> Đăng ký</a>
                    </div>
                </div>

            <div class="panel-body">
                {!! Form::open(array(
                        'url' => 'auth/login',
                        'method' => 'POST',
                        'role' => 'form',
                        'name' => 'form',
                    )) !!}

                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger" >{{ $error }}</li>
                            @endforeach
                        </ul>
                
                        @include("auth._form", ['button_name' => 'Login'])
                
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop

@section("body.js")
    <script src="js/app.js" ></script>