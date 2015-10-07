
					<div class="input-group form-group" ng-class="{ 'has-error' : form.userName.$invalid && !form.userName.$pristine }">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-envelope"></i>
						</span>

    					{!! Form:: email('email', null, ['id'=>'email', 'class'=>'form-control ng-pristine ng-untouched ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength', 'name'=>'email', 'placeholder'=>'Email', 'autocomplete'=>"off", 'ng-maxlength'=>"30" , 'ng-minlength'=>"3", 'required'=>""]) !!}
					</div>
						<p class="text-danger ng-hide" ng-show="form.email.$error.minlength || form.email.$error.maxlength">Tài khoản từ 3 đến 30 ký tự.</p>

					<div class="input-group form-group" ng-class="{ 'has-error' : form.password.$invalid && !form.password.$pristine }">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-lock"></i>
						</span>
    					{!! Form::password('password', ['id' => 'password', 'name'=>'password', 'class'=>'form-control ng-pristine ng-untouched ng-invalid ng-invalid-required ng-valid-minlength', 'placeholder'=>'Enter password', 'type'=>"password", 'ng-minlength'=>"6", 'required'=>"", 'autocomplete'=>"off", 'ng-model'=>"formData.password"]) !!}
					</div>
						<p class="text-danger ng-hide" ng-show="form.password.$invalid && !form.password.$pristine">Mật khẩu ít nhất 6 ký tự..</p>
					<div class="form-group">

    					{!! Form:: submit($button_name, array('class' => 'btn btn-primary', 'ng-disabled'=>'form.$invalid || !form.$dirty', 'disabled'=>"disabled"))!!}
					</div>
<!--

<div class="form-group">
    {!! Form:: label('Email', 'Email:', array('class' => 'control-label col-sm-2'))!!}

    <div class="col-sm-10">
    	{!! Form:: email('email', null, ['id'=>'email', 'class'=>'form-control', 'name'=>'Enter email', 'placeholder'=>' Email']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form:: label('password', 'Password:', array('class' => 'control-label col-sm-2'))!!}

    <div class="col-sm-10">          
    	{!! Form::password('password', ['id' => 'password', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter password']) !!}
    </div>
</div>


<div class="form-group">        
  <div class="col-sm-offset-2 col-sm-10">
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
  </div>
</div>


<div class="form-group">        
  <div class="col-sm-offset-2 col-sm-10">
    {!! Form:: submit($button_name, array('class' => 'btn btn-primary'))!!}
  </div>
</div>
-->