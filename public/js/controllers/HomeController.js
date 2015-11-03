app.controller('HomeController', ['$scope', 'cats', function($scope, cats) {
	alert(3);
  cats.success(function(data) {
    $scope.cats = data;
  });
}]);
