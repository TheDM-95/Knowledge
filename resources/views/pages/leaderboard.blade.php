@extends('layouts.master')
@section('head.title')
    <title> Leader Board</title>
@stop

@section('head.style') 
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <style>
        table{
            margin-top:70px;
            height:600px;
            background-color:#FFF;
        }
        .glyphicon{
            color:#333;
        }
        thead{
            background-color:#09F;
            color:#FFF;
        }
        img{
            width:60px;
            height:60px;
            background-color:#0CF;
        }

        td{
            text-align:center;
        }
        body{
            background-color:#CCC;
        }
    </style>
@stop

@section('body.content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="/"><h3><span class="glyphicon glyphicon-arrow-left"></span></h3></a>
            </div>
            <div class="col-md-5">
                <table class=" table table-hover table-responsive ">
                    <thead>
                        <tr>
                            <th colspan="4"><h3>Leaderboard</h3></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $u)
                        <tr>
                            <td>{{$pos++}}</td>
                            <td><img class="img-circle"  src="{{ $u->avatar }}" /></td>
                            <td>{{ $u->name}}</td>
                            <td>{{ $u->score }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop