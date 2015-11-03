	<div class="input-group form-group">
		<span class="input-group-addon">
			<i class="glyphicon glyphicon-envelope"></i>
		</span>

        <input type="email" id='email' class='form-control' name="email" placeholder='Enter email' value="{{ old('email') }}">
	</div>

	<div class="input-group form-group">
		<span class="input-group-addon">
			<i class="glyphicon glyphicon-lock"></i>
		</span>
		{!! Form::password('password', ['id' => 'password', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter password', 'type'=>"password", 'autocomplete'=>"off"])!!}
	</div>

	<div class="input-group form-group">
		<p> {!! Form::checkbox('checkbox', 'checkbox')!!} Remember me</p>
	</div>

	<div class="form-group">
		{!! Form:: submit($button_name, array('class' => 'btn btn-primary'))!!}
	</div>