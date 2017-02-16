/**
 * Created by bjwsl-001 on 2016/12/28.
 */

var app = angular.module('myModule',['ng']);

app.factory('$alert', function () {
  return {
    alertFunc:function(){
      alert('行内式依赖注入');
    }
  }
})

//行内式依赖注入
app.controller('myCtrl',
  ["$scope","$alert", function ($scope,$alert) {
    $scope.callAlert = function () {
      $alert.alertFunc();
    }
}]);




