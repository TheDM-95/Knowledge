

var app = angular.module('myApp', ['ngRoute']);
app.config(function ($routeProvider) { 
  $routeProvider 
    .when('/', { 
      controller: 'HomeController',
    	templateUrl:''
  	})
    .when('/login'{
      controller: 'LoginController',
      templateUrl: ''
    })
    .otherwise({
    	redirectTo: '/'
  	})
});

