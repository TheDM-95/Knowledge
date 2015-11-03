var app = angular.module('myApp', []);

app.constant("CSRF_TOKEN", '{!! csrf_token() !!}');

  app.controller('HomeController', ['$scope', 'cats', function($scope, cats) {
    cats.success(function(data) {
      $scope.cats = data;
    });
  }]);


  app.factory('cats', ['$http', function($http) {
    return $http.get(window.location.href + '/getallcategories')
           .success(function(data) {
             return data;
           })
           .error(function(data) {
             return data;
           });
  }]);

app.controller('CategoryController', ['$scope', 'category', '$http', '$location', '$window',
  function($scope, category, $http, $location, $window, CSRF_TOKEN) {
  category.success(function(data) {

   $scope.data = data;

   $scope.pos = [];
   $scope.pos.push(0);
   for (var i=1; i<$scope.data.length; i++) {
      if ($scope.data[i].question_id != $scope.data[i-1].question_id) {           
        $scope.pos.push(i);
      } 
    }
   $scope.ans = new Array($scope.pos.length);

   var typechar = ['A', 'B', 'C', 'D'];

   for (var i=0; i<$scope.pos.length; i++) {
      var r = i==($scope.pos.length-1)? $scope.data.length:$scope.pos[i+1];

      $scope.ans[i] = new Array();
      for (var j=$scope.pos[i]; j<r; j++) {           
        $scope.ans[i].push({
          answer : $scope.data[j].answer,
          type   : typechar[j - $scope.pos[i]]
        });
      }
   }
   var _score = 0, check = 0;
     $scope.isShow = false;
     var q = 0;
      $scope.isShowScore = false;

    var ans = new Array(4);
    ans[0] = ans[1] = ans[2] = ans[3] = 0;

    $scope.choise_click = function(question, answer){
            q = question; 
            ans[answer] = 1 - ans[answer];
           // alert(ans[answer]);
            $scope.isShow = ans[0] | ans[1] | ans[2] | ans[3];
     }

    $scope._score = function(){                  
        return _score;
    }

    $scope.count = function(){
        return check;
    }
    
    var index_1 = 0;

    $scope.check_answer = [];
    for (var i=0; i<$scope.pos.length; i++) $scope.check_answer.push(true);

    $scope.question = [];  
    $scope.summit = function(q, typeQuestion){
        if (typeQuestion != "3")  {
            for (var i=0; i<4; i++) {
              $scope.check_answer[q] &= $scope.data[$scope.pos[q] + i].is_correct == ans[i];
            }
        }
        else {                  
            for (var i=0; i<2; i++) {
              $scope.check_answer[q] &= $scope.data[$scope.pos[q] + i].is_correct == ans[i];
            }
        }

        if ($scope.check_answer[q]) _score++;
        $scope.question.push({
          user_id   : $scope.Id,
          question_id: $scope.data[$scope.pos[q]].question_id,
          is_correct   : $scope.check_answer[q]
        });
        //alert($scope.question[$scope.question.length-1].question_id);

        check++;
        ans[0] = ans[1] = ans[2] = ans[3] = 0;
        $scope.isShow = false;
        if (q == $scope.pos.length-1) {
          $scope.isShowScore = true;

          var datatoken = {'_token':CSRF_TOKEN};

          // update score for user
          $http({
              method: 'POST',
              url:  '/postupdate',
              headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
              data: 'id=' + $scope.Id + '&score=' + _score
          }).success(function(data){
              alert('Your Score has been updated succesfull!');
            })
            .error(function(data) {
              alert('Something be wrong!');
            }); 

          //update information question, which this user has been answer
          alert('sent');
          $http({
              method: 'POST',
              url:  '/postupdatequestion',
              headers: { 'Content-Type' : 'application/json; charset=utf-8'},
              data: $scope.question
          }).success(function(data){
              alert('This resquest has been updated succesfull!');
            })
            .error(function(data) {
              alert('Something be wrong!');
            }); 


          $window.location.href = '/';
        }
    }
   });

}]);

app.factory('category', ['$http', function($http) {
  //alert($routeParams.id);
  return $http.get(window.location.href + '/getquestions')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);



app.factory('user', ['$http', function($http) {
  return $http.get(window.location.href + '/getuserdata')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);

app.controller('ProfileController', ['$scope', 'user', '$http', '$location', '$window', 
  function($scope, user, $http, $location, $window, CSRF_TOKEN) {
  user.success(function(data) {
      $scope.user = data[0];
      $scope.text_descript = "text-success";
      $scope.inputEmail = false;
      $scope.emailAvailable = true;
      $scope.changePassword = false;

      $scope.changeEmail = function() {
        $scope.inputEmail = !$scope.inputEmail;
      }
      $scope.changepass = function(){
        $scope.changePassword = !$scope.changePassword;
      }
    });
  }]);