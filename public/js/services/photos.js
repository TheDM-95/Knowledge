app.factory('photos', ['$http', function($http) {
  return $http.get('/home/qhungnb/Desktop/angularjs_codeacademy/js/services/photos.json')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);

