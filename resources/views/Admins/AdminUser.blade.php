<?php
    $list = $usersList;
?>
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
<link rel="stylesheet" href="/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<div id = "page"></div>
    <div class="dt-wrapper" id="DtWrapper">
        <h1><strong>Danh sách người dùng</strong></h1>
        <br/>
        <div>
            <a href="Javascript:void(0)" class="btn btn-primary"  class="fa fa-pencil-square-o" onclick="addUser();alert('ok');">Thêm người dùng</a>
        </div>
        <table id="dt_basic" class="table table-striped table-bordered table-hover dataTable" aria-describedby="dt_basic_info">
            <thead>
                <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 5%; text-align: center">Stt</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 20%; text-align: center">Họ tên</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 20%; text-align: center">Email</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 15%; text-align: center">Ngày tạo</th>
                <th style = "width :7%; text-align: center" >Mật khẩu</th>
                <th style="width: 4%; text-align: center">Sửa</th>
                <th style="width: 4%; text-align: center">Xóa</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php $i = 1; ?>
                    @foreach($list as $user)
                    <tr id = "<?php echo $user->user_id;?>" class="<?php echo $i % 2 == 0 ? 'odd' : 'event';?>">
                        <td class=" sorting_1" align="center">{{ $i }}</td>
                        <td id="<?php echo "name-".$user->user_id ?>" class="">{{ $user->name }}</td>
                        <td class=" ">{{ $user->email }}</td>
                        <td class=" "><?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $user->created_at); echo $date->format('d/m/Y')?></td>
                        <td align = "center" ><div href="Javascript:void(0)" class = "changePasswordButtons" class="btn btn-primary"><i class="fa  fa-lock fa-2x "></i></div></td>
                        <td align = "center" ><div href="Javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-x fa-pencil-square-o"></i></div></td>
                        <td align = "center" ><a href="Javascript:void(0)"  class="btn btn-primary btn-danger btn-sm"><i class="glyphicon fa-x glyphicon-trash"></i></a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div id = "addUserPopup"></div>
<script type="text/javascript" src = "/Js/jquery.min.js"></script>
<script type="text/javascript">
    function addUser() {
        $('#addUserPopup').html('<h1>ok ok ok</h1>');
    }
</script>