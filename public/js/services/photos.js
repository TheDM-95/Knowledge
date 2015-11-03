app.factory('photos', ['$http', function($http) {
  return $http.get('/home/qhungnb/Desktop/new/js/services/photos.json')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);

