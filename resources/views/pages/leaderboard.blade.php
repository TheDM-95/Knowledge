@extends('layouts.master')
@section('head.title')
    <span class="glyphicon glyphicon-question-sign">
    Homepage </span>
@stop

@section('body.content')
<div class="container content">

    @foreach($users as $u)

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2>{{ $u->name}}</h2>
                <p>{{ $u->score }}</p>
            </div>
        </div>

    @endforeach
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {!! $users->render() !!}
        </div>
    </div>

</div>

@stop