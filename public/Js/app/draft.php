var app = angular.module("AttributesListApp", []);
app.controller("AttributesListController", function($scope) {
    $scope.AttributesList= [];
    $scope.activeAttribute = {};
    $scope.init = function(){
    	$.ajax({
    		url: 'http://localhost/ecom/index.php/AdminAttribute/GetData',
    		type: 'GET',
    		success: function(data){
    			$scope.AttributesList = JSON.parse(data);
                var attrLst = $scope.AttributesList;
                var cnt = attrLst.length;
                for(var idx = 0; idx < cnt; idx ++){
                    var item = attrLst[idx];
                    item.activeValue = {};
                }
    			$scope.$apply();
    		}
    	});
    };
    $scope.addAttribute = function(){
        var callback = function(data){
            if(data > 0)
            {
                var activeAttribute = $scope.activeAttribute;
                activeAttribute.Id = data;
                $scope.AttributesList.push({ Id: activeAttribute.Id, Code: activeAttribute.Code, Name : activeAttribute.Name });
                $scope.activeAttribute = {};
                $scope.$apply();
            }
        }
    }
    $scope.addValue = function(attrId){
        var attrData = {};
        var attrLst = $scope.AttributesList;
        var cnt = attrLst.length;
        for(var idx = 0; idx < cnt; idx ++){
            var item = attrLst[idx];
            if(item.Id == attrId){
                attrData = item;
                break;
            }
        }
        var valueData = attrData.activeValue;
        attrData.AttributeValuesList.push({Id: "5", AttributeId: attrData.Id, Value : valueData.Value });
        attrData.activeValue = {};
    }
});