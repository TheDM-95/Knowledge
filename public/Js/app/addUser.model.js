var app = angular.module('AddUserApp', [])

app.controller('AddUserController', function($scope) {
	$scope.newUser = {};
	//
	$scope.validateUser = function () {
		var password = $scope.newUser.password;
		var cfPassword = $scope.newUser.confirmPassword;
		if (typeof(password) == "undefined" || password.length < 3) {
			alert("The password contain atleast 3 characters!!! Retry please!!!");
			return false;
		}
		else {
			if (password != cfPassword) {
				alert('Password not match to confirm password!!! Please retry !!!');
				return false;
			}
			else {
				return true;
			}
		}
	}
	//
	$scope.addUser = function () {
		if ($scope.validateUser() == false) {
			return null;
		}
		else {
			var newUser = JSON.stringify($scope.newUser);
			$.ajax({
				url: 'http://localhost:8000/Admin/AdminUser/AddUserProcess',
				data: { newUser: newUser },
				type: "POST",
				success: function(data) {
					if (data != "") {
						$scope.newUser = {};
						alert("Adding user is success!!!");
						$scope.$apply();
					}
					else {
						alert("An error orcurred !!! Retry please !!!");
						return null;
					}
				}
			});
		}
	}
});