var app = angular.module('questionsListApp', [])

app.controller('questionsListController', function($scope) {
	$scope.questionsList = [];
	$scope.activeQuestion = {};
	$scope.correctness = {
		availableOptions: [
			{key: '-1', value : 'Correct ?'},
			{key: '1', value : 'Yes'},
			{key: '0', value : 'No'}
		],
		selectedOption : {key: '-1', value: 'Correct ?'}
	};
	$scope.init = function () {
		$.ajax({
			url: "http://localhost:8080/Admin/AdminQuestion/index",
			type: "GET",
			success: function(data) {
				if (data != "") {
					$scope.questionsList = JSON.parse(data);
					var len = $scope.questionsList.length;
					for (var i = 0; i < len; i ++) {
						$scope.questionsList[i].order = i + 1;
						$scope.questionsList[i].activeAnswer = {};
						var ansList = $scope.questionsList[i].answersList;
						if (ansList != null) {
							ansList.activeAnswer = {};
							var lenAns = ansList.length;
							$scope.questionsList[i].activeAnswer.order = lenAns + 1;
							for(var j = 0; j < lenAns; j ++) {
								ansList[j].order = j + 1;
							}
							$scope.$apply();
						}
						else {
							$scope.questionsList[i].answersList = [];
							$scope.questionsList[i].activeAnswer.order = 1;
							$scope.$apply();
						}
					}
					$scope.$apply();
				}
				else {
					alert("An Error occurred!!!");
				}
			}
		});
	};
	//
	$scope.validateAnswer = function (ans) {
		if (typeof(ans.answer) == "undefined" || typeof(ans.is_correct) == "undefined" || ans.answer == "" || ans.is_correct == "-1") {
			return false;
		}
		else {
			return true;
		}
	}
	//
	$scope.cancelAddingAnswerProcess = function (questionId) {
		var lenList = $scope.questionsList.length;
		for (var i = 0; i < lenList; i ++) {
			if ($scope.questionsList[i].question_id == questionId) {
				$scope.questionsList[i].activeAnswer = {};
				$scope.questionsList[i].activeAnswer.order = $scope.questionsList[i].answersList.activeAnswer.length + 1;
				$scope.correctness.selectedOption = $scope.correctness.availableOptions[0];
			}
		}
	}
	//
	$scope.addAnswer = function (questionId) {
		var lenList = $scope.questionsList.length;
		for (var i = 0; i < lenList; i ++) {
			if ($scope.questionsList[i].question_id == questionId) {
				var newAnswer = {};
				newAnswer.question_id = questionId;
				newAnswer.order = $scope.questionsList[i].activeAnswer.order;
				newAnswer.answer = $scope.questionsList[i].activeAnswer.answer;
				newAnswer.is_correct = $scope.correctness.selectedOption.key;
				if ($scope.validateAnswer(newAnswer) == true) {
					$scope.questionsList[i].activeAnswer = {};
					$scope.correctness.selectedOption = $scope.correctness.availableOptions[0];
					var ansJsonData = JSON.stringify(newAnswer);
					const idx = i;
					$.ajax({
						url: 'http://localhost:8080/Admin/AdminQuestion/addAnswer',
						type: "GET",
						data: {newAnswerData: ansJsonData},
						success: function (data) {
							if (data == "1") {
								$scope.questionsList[idx].answersList.push(newAnswer);
								$scope.questionsList[idx].activeAnswer = {};
								$scope.questionsList[idx].activeAnswer.order = $scope.questionsList[idx].answersList.length + 1;
								alert("Add answer succcessfully !!!");
								$scope.$apply();
								return null;
							}
						}
					});
				}
				else {
					alert("Fill to all field correctlly !!! Please !!!");
					return null;
				}
			}
		}
	}
	//
	$scope.reOdering = function(idx, list) {
		var lenList = list.length;
		if (idx == lenList) {
			alert("Answer was deleted succcessfully !!!");
			return list;
		}
	}
	//
	$scope.deleteAnswer = function (questId, answerId) {
		var cfr = confirm("Do you really want to delete this answer ???");
		if (cfr == false ) {
			return null;
		}
		else {
			$.ajax({
				url: "http://localhost:8080/Admin/AdminQuestion/deleteAnswer",
				type: "GET",
				data : {answerId : answerId},
				success: function (data) {
					if (data == "1") {
						var lenQs = $scope.questionsList.length;
						for (var i = 0; i < lenQs; i ++) {
							if ($scope.questionsList[i].question_id == questId) {
								var ansList = $scope.questionsList[i].answersList;
								var lenAns = ansList.length;
								for ( var j = 0; j <lenAns; j ++) {
									if (ansList[j].answer_id == answerId) {
										ansList.splice(j, 1);
										$scope.questionsList[i].activeAnswer.order --;
										$scope.questionsList[i].answersList = $scope.reOdering(j, ansList);
										$scope.$apply();
										return null;
									}
								}
							}
						}
					}
					else {	
						alert("Error ! Please try again !!!");
						return null;
					}
				}
			});
		}
	}
});