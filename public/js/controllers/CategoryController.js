app.controller('CategoryController', ['$scope', 'category', '$routeParams', function($scope, category, $routeParams) {
	alert(1);
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

    var ans = new Array(4);
    ans[0] = ans[1] = ans[2] = ans[3] = 0;

    $scope.choise_click = function(question, answer){
            q = question; 
            ans[answer] = 1 - ans[answer];
           // alert(ans[answer]);
            $scope.isShow = ans[0] | ans[1] | ans[2] | ans[3];
     }

    $scope.incompleteCount = function(){                  
        return _score;
    }

    $scope.count = function(){
        return check;
    }
    
    var index_1 = 0;

    $scope.summit = function(q, typeQuestion){
        var check_answer = true;
        if (typeQuestion != "3")  {
            for (var i=0; i<4; i++) {
            	check_answer &= $scope.data[$scope.pos[q] + i].is_correct == ans[i];
            }
        }
        else {                	
            for (var i=0; i<2; i++) {
            	check_answer &= $scope.data[$scope.pos[q] + i].is_correct == ans[i];
            }
        }

        if (check_answer) _score++;

        check++;
    	ans[0] = ans[1] = ans[2] = ans[3] = 0;
        $scope.isShow = false;
        if (q == $scope.pos.length) {

        }
    }
   });

}]);
