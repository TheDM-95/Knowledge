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
<header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</header>
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
<script src="/Js/app/questionsList.model.js"></script>
<script src="/Js/jquery.min.js"></script>
<script src="/Js/jquery.form.js"></script>

<div ng-app ="questionsListApp">
	<div ng-controller = "questionsListController">

<div id = "page"></div>
    <div class="dt-wrapper" id="DtWrapper">
        <h1><strong>Questions List</strong></h1>
        <br/>
        <div>
            <a href="Javascript:void(0)" class="btn btn-primary"  class="fa fa-pencil-square-o" ng-click = "addQuestion();">Add new question</a>
        </div>
        <br/>
        <table ng-repeat = "question in questionsList" id="dt_basic" class="table table-striped table-bordered table-hover dataTable" aria-describedby="dt_basic_info">
            <thead style="background-color: #e8f0f0;">
                <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 5%; text-align: center">Order</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 5%; text-align: center">Category Id</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 5%; text-align: center">Is active</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 40%; text-align: center">Content</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 10%; text-align: center">Level</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_basic" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 25%; text-align: center">Image</th>
                <th style="width: 5%; text-align: center">Edit</th>
                <th style="width: 5%; text-align: center">Delete</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr >
                        <td>{{ question.order }}</td>
                        <td>{{ question.cat_id}}</td>
                        <td>{{ question.is_active }}</td>
                        <td>{{ question.content }}</td>
                        <td>{{ question.level }}</td>
                        <td>{{ question.image}}</td>
                        <td align = "center" ><div href="Javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-x fa-pencil-square-o"></i></div></td>
                        <td align = "center" ><a href="Javascript:void(0)"  class="btn btn-primary btn-danger btn-sm"><i class="glyphicon fa-x glyphicon-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><i>Answers list</i></td>
                        <td>Order</td>
                        <td>Answer</td>
                        <td>Is correct</td>
                        <td>Created at</td>
                        <th style="text-align: center">Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                    <tr ng-repeat = "ans in question.answersList">
                        <td colspan="2"><i></i></td>
                        <td>{{ans.order}}</td>
                        <td>{{ans.answer}}</td>
                        <td>{{ans.is_correct}}</td>
                        <td>{{ans.created_at}}</td>
                        <td align = "center" ><div href="Javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-x fa-pencil-square-o"></i></div></td>
                        <td align = "center" ><a href="Javascript:void(0)"  class="btn btn-primary btn-danger btn-sm" ng-click = "deleteAnswer(question.question_id, ans.answer_id);"><i class="glyphicon fa-x glyphicon-trash"></i></a></td>

                    </tr>
                    <tr>
                        <td colspan="2"><i></i></td>
                        <td>{{question.answersList.length + 1}}</td>
                        <td><input ng-model = "question.activeAnswer.answer" type = "text" placeholder = "Enter new answer....."/></td>
                        <td>
                            <select ng-options = "option.value for option in correctness.availableOptions track by option.key" ng-model = "correctness.selectedOption">
                            </select>
                        </td>
                        <td align= "center"><i>---YY/MM/DD---</i></td>
                        <td align = "center" ><div href="Javascript:void(0)" class="btn btn-labeled btn-success" type = "submit" ng-click="addAnswer(question.question_id);"><i class="glyphicon fa-x glyphicon-ok"></i></div>
                        </td>
                        <td align = "center" ><div href="Javascript:void(0)" class="btn btn-labeled btn-danger" ng-click="cancelAddingAnswerProcess(question.question_id);" ><i class="glyphicon fa-x glyphicon-remove"></i></div>
                        </td>
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
    // function getIsCorrect() {
    //     var isCorrect = $('#isCorrect').val();
    //     $("#correctness").val(isCorrect);
    //     alert(isCorrect);
    //     alert($("#correctness").val());
    // }
</script>