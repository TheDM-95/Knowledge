<head>
    <meta charset="utf-8" />
    <title>Add user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="/Js/jquery.min.js"></script>
    <script src="/Js/bootstrap.min.js"></script> 
    <script src="/Js/angular.min.js"></script>
    <script src="/Js/app/addUser.model.js"></script>
    <script src="/Js/jquery.min.js"></script>
    <script src="/Js/jquery.form.js"></script>
    <script src="/Js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Add user</h1>
</div>

<!-- Registration form - START -->
<div class="container" ng-app = "AddUserApp">
    <div class="row" ng-controller = "AddUserController">
        <form role="form" method = "POST" ng-model = "newUser">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="fa fa-warning "></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter full name</label>
                    <div class="input-group">
                        <input ng-model = "newUser.name" type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter full name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter email</label>
                    <div class="input-group">
                        <input ng-model = "newUser.email" type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputName">Enter user name</label>
                    <div class="input-group">
                        <input ng-model = "newUser.user_name" type="text" class="form-control" name="userName" id="userName" placeholder="Enter user name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Enter password</label>
                    <div class="input-group">
                        <input ng-model = "newUser.password" type="password" class="form-control" id="password" name="password" placeholder="********" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputConfirmPassword">Confirm password</label>
                    <div class="input-group">
                        <input ng-model = "newUser.confirmPassword" type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="********" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input ng-click = "addUser();" type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
</div>
<!-- Registration form - END -->

</div>

</body>