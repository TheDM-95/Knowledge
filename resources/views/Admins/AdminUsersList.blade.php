<style type="text/css">
    #DtWrapper {
        width:80%;
        position: absolute;
        background-color: white;
        left:10%;
        top:10%;
    }
    #page {
        width: 100%;
        height: 100%;
        background-color: #b8b8cc;
        z-index: 1.5;
        opacity: 0.5;
        filter: Alpha(opacity=50);
        background-color: #f9fdff;
    }
</style>
<link rel="stylesheet" href="/font-awesome-4.3.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="/Js/bootstrap.min.js"></script> 
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
 -->
 <!-- <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
 -->
<script src="/Js/angular.min.js"></script>
<script src="/Js/app/UsersList.model.js"></script>
<script src="/Js/jquery.min.js"></script>
<script src="/Js/jquery.form.js"></script>

<div ng-app ="AdminUsersListApp">
	<div ng-controller = "AdminUsersListController">

<div id = "page"></div>
    <div class="dt-wrapper" id="DtWrapper">
        <h1><strong>Danh sách người dùng</strong></h1>
        <br/>
        <div>
            <a href="Javascript:void(0)" class="btn btn-primary"  class="fa fa-pencil-square-o" ng-click = "addUser();">Thêm người dùng</a>
        </div>
        <table id="dt_basic" class="table table-striped table-bordered table-hover dataTable" aria-describedby="dt_basic_info">
            <thead style="background-color: #e8f0f0;">
                <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 5%; text-align: center">Order</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 20%; text-align: center">Full name</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 20%; text-align: center">User name</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 20%; text-align: center">Gender</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 20%; text-align: center">E-mail</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 15%; text-align: center">Created at</th>
                <th style = "width :7%; text-align: center" >Password</th>
                <th style="width: 4%; text-align: center">Edit</th>
                <th style="width: 4%; text-align: center">Delete</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr  ng-repeat = "user in usersList">
                        <td>@{{ user.order }}</td>
                        <td>@{{ user.name }}</td>
                        <td>@{{ user.user_name}}</td>
                        <td>@{{ user.gender }}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.created_at}}</td>
                        <td align = "center" ><div href="Javascript:void(0)" class = "changePasswordButtons" class="btn btn-primary"><i class="fa  fa-lock fa-2x "></i></div></td>
                        <td align = "center" ><div href="Javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-x fa-pencil-square-o"></i></div></td>
                        <td align = "center" ><a href="Javascript:void(0)"  class="btn btn-primary btn-danger btn-sm"><i class="glyphicon fa-x glyphicon-trash"></i></a></td>
                    </tr>                
            </tbody>
        </table>
    </div>
<script type="text/javascript" src = "/Js/jquery.min.js"></script>
<script type="text/javascript">
</script>
		<input type="hidden" id="clickBinding" ng-click="init()" />
	</div>
</div>
<script type="text/javascript">
	$('document').ready(function () {
		$('#clickBinding').click();
	});
</script>