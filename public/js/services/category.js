app.factory('category', ['$http', function($http) {
alert(12);
  return $http.get('http://localhost:8000/categories/1/getquestions')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);

