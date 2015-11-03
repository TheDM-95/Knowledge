app.factory('cats', ['$http', function($http) {
	alert(13);
  return $http.get('http://localhost:8000/getallcategories')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);

