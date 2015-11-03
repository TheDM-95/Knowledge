
<div class="input-group form-group">
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
    </span>
    {!! Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Your Name', 'class'=>'form-control')) !!}
</div>

<div class="input-group form-group">
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
    </span>
    {!! Form::text('user_name', null, array('class'=>'input-block-level', 'placeholder'=>'User Name', 'class'=>'form-control')) !!}
</div>

<div class="input-group form-group">
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-envelope"></i>
    </span>
    {!! Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address', 'class'=>'form-control')) !!}
</div>

<div class="input-group form-group">
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
    </span>
    {!! Form::password('password', ['id' => 'password', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter password', 'type'=>"password", 'autocomplete'=>"off"]) !!}
</div>

<div class="input-group form-group">
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
    </span>
    {!! Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password', 'class'=>'form-control')) !!}
</div>
<div class="input-group form-group">
    {!! Form::submit($button_name, array('class'=>'btn btn-large btn-primary btn-block')) !!}
</div>