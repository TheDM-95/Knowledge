var app = angular.module('AdminUsersListApp', [])

app.controller('AdminUsersListController', function($scope) {
	$scope.usersList = [];
	$scope.init = function () {
		$.ajax({
			url: "http://localhost:8080/Admin/AdminUser/index",
			type: "GET",
			success: function(data) {
				if (data != "") {
					$scope.usersList = JSON.parse(data);
					var len = $scope.usersList.length;
					for (var i = 0; i < len; i ++) {
						$scope.usersList[i].order = i + 1;
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
	$scope.addUser = function () {
		alert("Add user");
	}
});