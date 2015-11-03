@extends("layouts.master")
@section("head.title")
    <title> Quiz-app </title>

@stop

@section("head.style")
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  @stop

@section("body.content")
    <div id='content'>
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top:30px;">
            
            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="panel-title">Please Register</div>
                </div>

                <div class="panel-body">
                    {!! Form::open(array(
                        'url' => 'auth/register', 
                        'class'=>'form-signup',
                        'role' => 'form',
                        'method' => 'POST',
                        'name' => 'form'
                    )) !!}

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    @include("auth.__form", ['button_name' => "Register"])

                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>
@stop

@section("body.js")
    <script src="js/app.js" ></script>
@stop

