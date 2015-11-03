@extends("layouts.master")
@section("head.title")
    <title> Quiz-app </title>

@stop


@section("head.style")
    <link rel="stylesheet" href="/css/bootstrap.min.css">

  	<script src="/js/bootstrap.min.js">  </script>
  @stop


@section("body.content")

<div class="container" ng-controller='ProfileController'>
<h2 class="text-center">Profile</h2>

<div class="row">
	<div class="col-md-12">
		<?php  		
			if (Auth::attempt(['email' => 'yz@gmail.com', 'password'=>"$2y$10$387jPSIvukC4w0Y4sBgq2uddH9cxlp1sP.B2aE43B76urflmA9i3y"], false)) {
				echo "<p> OK </p>";
			}

			echo bcrypt('123456') . "<br />";
			echo "$2y$10$387jPSIvukC4w0Y4sBgq2uddH9cxlp1sP.B2aE43B76urflmA9i3y";

	        if (Auth::check()) {
	            $user = Auth::user();
				echo "<div data-ng-init = user_name='" . $user->user_name . "' > </div>";			
				echo "<div data-ng-init = email='" . $user->email . "' > </div>";
	        }
	        else {
	        	echo redirect()->route('auth.login');
	        }
		?>

		<form class="form-horizontal" action="/users/{{$user->user_name}}/editaccount/" method="post" enctype="multipart/form-data">

    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row">
			<div class="col-md-6 ">
				<h3 class="text-center">Personal information</h3>
				<p class="text-center">Your personal information will help us to compare your activity with activity of other users from your country and the neighborhood!</p>
				<br/>
				
				<div class="form-group">
					<label for="inputUsername" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9"><p class="form-control-static">@{{user.name}}</p></div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-7">
						<span id="email-change" class="form-control-static">

							<p class="form-control-static" ng-show="inputEmail==false">
								<span id="email">@{{user.email}}</span> 
								<a id="email-change-button" style="cursor: pointer;" class="btn-link" ng-click="changeEmail()">change</a>
							</p>

							<input class="form-control" type="email" value="@{{user.email}}" name="email" ng-show = "inputEmail">
							<span id="helpBlock" class="help-block" ng-show = "emailAvailable==false"> address is not available </span>
														
							<!-- &nbsp;&nbsp;<button type="button" class="btn btn-link">change</button> -->
						</span>

					</div>

					<div class="col-sm-2 text-center">
						<i id="email-active-status" class="fa fa-check @{{text_descript}}" title="E-mail confirmed!"></i>
					</div>
				</div>

				<div class="form-group">
					<label for="inputName" class="col-sm-3 control-label">Nick<span class="text-danger">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="user_name" value="@{{user.user_name}}" class="form-control" id="inputUserName" placeholder="Nick" required>
												<span id="inputUserName" class="sr-only">(success)</span>
											</div>
				</div>
				<div class="form-group">
					<label for="inputName" class="col-sm-3 control-label">Name <span class="text-danger">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="name" value="@{{user.name}}" class="form-control" id="name" placeholder="Name" required/>
					</div>
				</div>		

				<div class="form-group">
					<label for="inputPhone" class="col-sm-3 control-label">Phone</label>
					<div class="col-sm-7">
						<div class="input-group">
							<div class="input-group-addon"><span class="fa fa-phone fa-fw"></span></div>
							<input type="tel" name="phone" value="@{{user.phone}}" class="form-control" id="inputPhone" placeholder="Phone">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="inputFacebook" class="col-sm-3 control-label">Facebook</label>
					<div class="col-sm-7">
						<div class="input-group">
							<div class="input-group-addon"><span class="fa fa-facebook fa-fw"></span></div>
							<input type="text" name="facebook" value="@{{user.facebook}}" class="form-control" id="inputFacebook" placeholder="Facebook">
						</div>
					
					</div>
				</div>
								<div class="form-group">
					<label for="inputBirthYear" class="col-sm-3 control-label">Birthdate <span class="text-danger">*</span></label>
					<div class="col-sm-3">
						<input type="number" name="birthdate" value="@{{user.birthday}}" class="form-control" id="inputBirthYear" min="1900" max="2015" placeholder="Birth year" required/>
					</div>
				</div>

			</div>
			
						<div class="col-md-6">
				<h3 class="text-center">About me</h3>
				<p>Tell us what you interested in...</p>
				<textarea name="aboutme" class="form-control" id="inputAboutme" rows="7">
					@{{user.aboutme}}
				</textarea>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-6 ">
				<h3 class="text-center">Location</h3>
				<div class="form-group">
					<label for="inputCountry" class="col-sm-3 control-label">Country <span class="text-danger">*</span></label>
					<div class="col-sm-7">
							<select id="selectCountry" name="country" class="form-control" required>
							<option value="@{{user.country}}"></option>
										            	<option value="1" data-code="AF" >Afghanistan</option>
										            	<option value="2" data-code="AL" >Albania</option>
										            	<option value="3" data-code="DZ" >Algeria</option>
										            	<option value="4" data-code="AS" >American Samoa</option>
										            	<option value="5" data-code="AD" >Andorra</option>
										            	<option value="6" data-code="AO" >Angola</option>
										            	<option value="7" data-code="AI" >Anguilla</option>
										            	<option value="9" data-code="AG" >Antigua And Barbuda</option>
										            	<option value="10" data-code="AR" >Argentina</option>
										            	<option value="11" data-code="AM" >Armenia</option>
										            	<option value="12" data-code="AW" >Aruba</option>
										            	<option value="13" data-code="AU" >Australia</option>
										            	<option value="14" data-code="AT" >Austria</option>
										            	<option value="15" data-code="AZ" >Azerbaijan</option>
										            	<option value="16" data-code="BS" >Bahamas</option>
										            	<option value="17" data-code="BH" >Bahrain</option>
										            	<option value="18" data-code="BD" >Bangladesh</option>
										            	<option value="19" data-code="BB" >Barbados</option>
										            	<option value="20" data-code="BY" >Belarus</option>
										            	<option value="21" data-code="BE" >Belgium</option>
										            	<option value="22" data-code="BZ" >Belize</option>
										            	<option value="23" data-code="BJ" >Benin</option>
										            	<option value="24" data-code="BM" >Bermuda</option>
										            	<option value="25" data-code="BT" >Bhutan</option>
										            	<option value="26" data-code="BO" >Bolivia</option>
										            	<option value="27" data-code="BA" >Bosnia And Herzegovina</option>
										            	<option value="28" data-code="BW" >Botswana</option>
										            	<option value="29" data-code="BV" >Bouvet Island</option>
										            	<option value="30" data-code="BR" >Brazil</option>
										            	<option value="31" data-code="IO" >British Indian Ocean Territory</option>
										            	<option value="32" data-code="BN" >Brunei Darussalam</option>
										            	<option value="33" data-code="BG" >Bulgaria</option>
										            	<option value="34" data-code="BF" >Burkina Faso</option>
										            	<option value="35" data-code="BI" >Burundi</option>
										            	<option value="36" data-code="KH" >Cambodia</option>
										            	<option value="37" data-code="CM" >Cameroon</option>
										            	<option value="38" data-code="CA" >Canada</option>
										            	<option value="39" data-code="CV" >Cape Verde</option>
										            	<option value="40" data-code="KY" >Cayman Islands</option>
										            	<option value="41" data-code="CF" >Central African Republic</option>
										            	<option value="42" data-code="TD" >Chad</option>
										            	<option value="43" data-code="CL" >Chile</option>
										            	<option value="44" data-code="CN" >China</option>
										            	<option value="45" data-code="CX" >Christmas Island</option>
										            	<option value="46" data-code="CC" >Cocos (keeling) Islands</option>
										            	<option value="47" data-code="CO" >Colombia</option>
										            	<option value="48" data-code="KM" >Comoros</option>
										            	<option value="49" data-code="CG" >Congo</option>
										            	<option value="50" data-code="CD" >Congo, The Democratic Republic Of The</option>
										            	<option value="51" data-code="CK" >Cook Islands</option>
										            	<option value="52" data-code="CR" >Costa Rica</option>
										            	<option value="53" data-code="CI" >CÔte D'ivoire</option>
										            	<option value="54" data-code="HR" >Croatia</option>
										            	<option value="55" data-code="CU" >Cuba</option>
										            	<option value="56" data-code="CY" >Cyprus</option>
										            	<option value="57" data-code="CZ" >Czech Republic</option>
										            	<option value="58" data-code="DK" >Denmark</option>
										            	<option value="59" data-code="DJ" >Djibouti</option>
										            	<option value="60" data-code="DM" >Dominica</option>
										            	<option value="61" data-code="DO" >Dominican Republic</option>
										            	<option value="62" data-code="EC" >Ecuador</option>
										            	<option value="63" data-code="EG" >Egypt</option>
										            	<option value="64" data-code="SV" >El Salvador</option>
										            	<option value="65" data-code="GQ" >Equatorial Guinea</option>
										            	<option value="66" data-code="ER" >Eritrea</option>
										            	<option value="67" data-code="EE" >Estonia</option>
										            	<option value="68" data-code="ET" >Ethiopia</option>
										            	<option value="69" data-code="FK" >Falkland Islands (malvinas)</option>
										            	<option value="70" data-code="FO" >Faroe Islands</option>
										            	<option value="71" data-code="FJ" >Fiji</option>
										            	<option value="72" data-code="FI" >Finland</option>
										            	<option value="73" data-code="FR" >France</option>
										            	<option value="74" data-code="GF" >French Guiana</option>
										            	<option value="75" data-code="PF" >French Polynesia</option>
										            	<option value="76" data-code="TF" >French Southern Territories</option>
										            	<option value="77" data-code="GA" >Gabon</option>
										            	<option value="78" data-code="GM" >Gambia</option>
										            	<option value="79" data-code="GE" >Georgia</option>
										            	<option value="80" data-code="DE" >Germany</option>
										            	<option value="81" data-code="GH" >Ghana</option>
										            	<option value="82" data-code="GI" >Gibraltar</option>
										            	<option value="83" data-code="GR" >Greece</option>
										            	<option value="84" data-code="GL" >Greenland</option>
										            	<option value="85" data-code="GD" >Grenada</option>
										            	<option value="86" data-code="GP" >Guadeloupe</option>
										            	<option value="87" data-code="GU" >Guam</option>
										            	<option value="88" data-code="GT" >Guatemala</option>
										            	<option value="89" data-code="GN" >Guinea</option>
										            	<option value="90" data-code="GW" >Guinea-bissau</option>
										            	<option value="91" data-code="GY" >Guyana</option>
										            	<option value="92" data-code="HT" >Haiti</option>
										            	<option value="93" data-code="HM" >Heard Island And Mcdonald Islands</option>
										            	<option value="94" data-code="VA" >Holy See (vatican City State)</option>
										            	<option value="95" data-code="HN" >Honduras</option>
										            	<option value="96" data-code="HK" >Hong Kong</option>
										            	<option value="97" data-code="HU" >Hungary</option>
										            	<option value="98" data-code="IS" >Iceland</option>
										            	<option value="99" data-code="IN" >India</option>
										            	<option value="100" data-code="ID" >Indonesia</option>
										            	<option value="101" data-code="IR" >Iran, Islamic Republic Of</option>
										            	<option value="102" data-code="IQ" >Iraq</option>
										            	<option value="103" data-code="IE" >Ireland</option>
										            	<option value="104" data-code="IL" >Israel</option>
										            	<option value="105" data-code="IT" >Italy</option>
										            	<option value="106" data-code="JM" >Jamaica</option>
										            	<option value="107" data-code="JP" >Japan</option>
										            	<option value="108" data-code="JO" >Jordan</option>
										            	<option value="109" data-code="KZ" >Kazakhstan</option>
										            	<option value="110" data-code="KE" >Kenya</option>
										            	<option value="111" data-code="KI" >Kiribati</option>
										            	<option value="112" data-code="KP" >Korea, Democratic People's Republic Of</option>
										            	<option value="113" data-code="KR" >Korea, Republic Of</option>
										            	<option value="114" data-code="KW" >Kuwait</option>
										            	<option value="115" data-code="KG" >Kyrgyzstan</option>
										            	<option value="116" data-code="LA" >Lao People's Democratic Republic</option>
										            	<option value="117" data-code="LV" >Latvia</option>
										            	<option value="118" data-code="LB" >Lebanon</option>
										            	<option value="119" data-code="LS" >Lesotho</option>
										            	<option value="120" data-code="LR" >Liberia</option>
										            	<option value="121" data-code="LY" >Libyan Arab Jamahiriya</option>
										            	<option value="122" data-code="LI" >Liechtenstein</option>
										            	<option value="123" data-code="LT" >Lithuania</option>
										            	<option value="124" data-code="LU" >Luxembourg</option>
										            	<option value="125" data-code="MO" >Macao</option>
										            	<option value="126" data-code="MK" >Macedonia</option>
										            	<option value="127" data-code="MG" >Madagascar</option>
										            	<option value="128" data-code="MW" >Malawi</option>
										            	<option value="129" data-code="MY" >Malaysia</option>
										            	<option value="130" data-code="MV" >Maldives</option>
										            	<option value="131" data-code="ML" >Mali</option>
										            	<option value="132" data-code="MT" >Malta</option>
										            	<option value="133" data-code="MH" >Marshall Islands</option>
										            	<option value="134" data-code="MQ" >Martinique</option>
										            	<option value="135" data-code="MR" >Mauritania</option>
										            	<option value="136" data-code="MU" >Mauritius</option>
										            	<option value="137" data-code="YT" >Mayotte</option>
										            	<option value="138" data-code="MX" >Mexico</option>
										            	<option value="139" data-code="FM" >Micronesia, Federated States Of</option>
										            	<option value="140" data-code="MD" >Moldova, Republic Of</option>
										            	<option value="141" data-code="MC" >Monaco</option>
										            	<option value="142" data-code="MN" >Mongolia</option>
										            	<option value="240" data-code="ME" >Montenegro</option>
										            	<option value="143" data-code="MS" >Montserrat</option>
										            	<option value="144" data-code="MA" >Morocco</option>
										            	<option value="145" data-code="MZ" >Mozambique</option>
										            	<option value="146" data-code="MM" >Myanmar</option>
										            	<option value="147" data-code="NA" >Namibia</option>
										            	<option value="148" data-code="NR" >Nauru</option>
										            	<option value="149" data-code="NP" >Nepal</option>
										            	<option value="150" data-code="NL" >Netherlands</option>
										            	<option value="151" data-code="AN" >Netherlands Antilles</option>
										            	<option value="152" data-code="NC" >New Caledonia</option>
										            	<option value="153" data-code="NZ" >New Zealand</option>
										            	<option value="154" data-code="NI" >Nicaragua</option>
										            	<option value="155" data-code="NE" >Niger</option>
										            	<option value="156" data-code="NG" >Nigeria</option>
										            	<option value="157" data-code="NU" >Niue</option>
										            	<option value="158" data-code="NF" >Norfolk Island</option>
										            	<option value="159" data-code="MP" >Northern Mariana Islands</option>
										            	<option value="160" data-code="NO" >Norway</option>
										            	<option value="161" data-code="OM" >Oman</option>
										            	<option value="162" data-code="PK" >Pakistan</option>
										            	<option value="163" data-code="PW" >Palau</option>
										            	<option value="164" data-code="PS" >Palestinian Territory, Occupied</option>
										            	<option value="165" data-code="PA" >Panama</option>
										            	<option value="166" data-code="PG" >Papua New Guinea</option>
										            	<option value="167" data-code="PY" >Paraguay</option>
										            	<option value="168" data-code="PE" >Peru</option>
										            	<option value="169" data-code="PH" >Philippines</option>
										            	<option value="170" data-code="PN" >Pitcairn</option>
										            	<option value="171" data-code="PL" >Poland</option>
										            	<option value="172" data-code="PT" >Portugal</option>
										            	<option value="173" data-code="PR" >Puerto Rico</option>
										            	<option value="174" data-code="QA" >Qatar</option>
										            	<option value="175" data-code="RE" >RÉunion</option>
										            	<option value="176" data-code="RO" >Romania</option>
										            	<option value="177" data-code="RU" >Russian Federation</option>
										            	<option value="178" data-code="RW" >Rwanda</option>
										            	<option value="179" data-code="SH" >Saint Helena</option>
										            	<option value="180" data-code="KN" >Saint Kitts And Nevis</option>
										            	<option value="181" data-code="LC" >Saint Lucia</option>
										            	<option value="182" data-code="PM" >Saint Pierre And Miquelon</option>
										            	<option value="183" data-code="VC" >Saint Vincent And The Grenadines</option>
										            	<option value="184" data-code="WS" >Samoa</option>
										            	<option value="185" data-code="SM" >San Marino</option>
										            	<option value="186" data-code="ST" >Sao Tome And Principe</option>
										            	<option value="187" data-code="SA" >Saudi Arabia</option>
										            	<option value="188" data-code="SN" >Senegal</option>
										            	<option value="189" data-code="RS" >Serbia</option>
										            	<option value="190" data-code="SC" >Seychelles</option>
										            	<option value="191" data-code="SL" >Sierra Leone</option>
										            	<option value="192" data-code="SG" >Singapore</option>
										            	<option value="193" data-code="SK" >Slovakia</option>
										            	<option value="194" data-code="SI" >Slovenia</option>
										            	<option value="195" data-code="SB" >Solomon Islands</option>
										            	<option value="196" data-code="SO" >Somalia</option>
										            	<option value="197" data-code="ZA" >South Africa</option>
										            	<option value="198" data-code="GS" >South Georgia And The South Sandwich Islands</option>
										            	<option value="199" data-code="ES" >Spain</option>
										            	<option value="200" data-code="LK" >Sri Lanka</option>
										            	<option value="201" data-code="SD" >Sudan</option>
										            	<option value="202" data-code="SR" >Suriname</option>
										            	<option value="203" data-code="SJ" >Svalbard And Jan Mayen</option>
										            	<option value="204" data-code="SZ" >Swaziland</option>
										            	<option value="205" data-code="SE" >Sweden</option>
										            	<option value="206" data-code="CH" >Switzerland</option>
										            	<option value="207" data-code="SY" >Syrian Arab Republic</option>
										            	<option value="208" data-code="TW" >Taiwan</option>
										            	<option value="209" data-code="TJ" >Tajikistan</option>
										            	<option value="210" data-code="TZ" >Tanzania, United Republic Of</option>
										            	<option value="211" data-code="TH" >Thailand</option>
										            	<option value="212" data-code="TL" >Timor-leste</option>
										            	<option value="213" data-code="TG" >Togo</option>
										            	<option value="214" data-code="TK" >Tokelau</option>
										            	<option value="215" data-code="TO" >Tonga</option>
										            	<option value="216" data-code="TT" >Trinidad And Tobago</option>
										            	<option value="217" data-code="TN" >Tunisia</option>
										            	<option value="218" data-code="TR" >Turkey</option>
										            	<option value="219" data-code="TM" >Turkmenistan</option>
										            	<option value="220" data-code="TC" >Turks And Caicos Islands</option>
										            	<option value="221" data-code="TV" >Tuvalu</option>
										            	<option value="222" data-code="UG" >Uganda</option>
										            	<option value="223" data-code="UA" >Ukraine</option>
										            	<option value="224" data-code="AE" >United Arab Emirates</option>
										            	<option value="225" data-code="GB" >United Kingdom</option>
										            	<option value="226" data-code="US" >United States</option>
										            	<option value="227" data-code="UM" >United States Minor Outlying Islands</option>
										            	<option value="228" data-code="UY" >Uruguay</option>
										            	<option value="229" data-code="UZ" >Uzbekistan</option>
										            	<option value="230" data-code="VU" >Vanuatu</option>
										            	<option value="231" data-code="VE" >Venezuela</option>
										            	<option value="232" data-code="VN" >Viet Nam</option>
										            	<option value="233" data-code="VG" >Virgin Islands, British</option>
										            	<option value="234" data-code="VI" >Virgin Islands, U.s.</option>
										            	<option value="235" data-code="WF" >Wallis And Futuna</option>
										            	<option value="236" data-code="EH" >Western Sahara</option>
										            	<option value="237" data-code="YE" >Yemen</option>
										            	<option value="238" data-code="ZM" >Zambia</option>
														</select>
					</div>
				</div>
							            
		            <div class="form-group">
					<label for="inputInsitution" class="col-sm-3 control-label">Institution <span class="text-danger">*</span></label>
					<div class="col-sm-7">
						<input name="institution" type="text" class="form-control" value="@{{user.institution}}" id="school"/>
					</div>
				</div>
		    </div>
		    
		</div>

		<div class="form-group text-center top-2">
			<button type="submit" class="btn btn-primary btn-lg btn-save-profile" ng-show= 'email== user.email'>
				<span class="fa fa-floppy-o"></span>&nbsp;&nbsp;Save
			</button>
		</div>

		</form>

		<div class="row pull-right">
		    <div class="col-xs-12">
			 	<a id="password-change-link" class="btn btn-link" ng-click="changepass()">Change password</a> 
			</div>
		</div>
		<div id="password-change-box" class="row" ng-show="changePassword">
			<div class="col-xs-8">
				<h3 class="text-center">Change password</h3>

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

				<form class="form-inline" action="/changepassword/{{$user->email}}" method="post" enctype="multipart/form-data">

    				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="sr-only" for="inputPassword">Old password</label>
						<input type="password" name="oldpassword" class="form-control" id="inputPassword" placeholder="Old Password" />
					</div>
					<div class="form-group">
						<label class="sr-only" for="inputPassword">New password</label>
						<input type="password" name="newpassword" class="form-control" id="inputPassword" placeholder="New Password">
					</div>
					<div class="form-group">
						<label class="sr-only" for="inputPasswordRe">Retype new password</label>
						<input type="password" name="password_confirmation" class="form-control" id="inputPasswordRe" placeholder="Confirm new password">
					</div>
					<button type="submit" class="btn btn-primary">Change</button>
				</form>
			</div>
		</div>
</div>

@stop

@section("body.js")
@stop