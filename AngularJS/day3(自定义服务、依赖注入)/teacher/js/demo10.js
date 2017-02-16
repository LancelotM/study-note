/**
 * Created by bjwsl-001 on 2016/12/28.
 */
var app = angular.module('myApp', ['ng']);

//  factory方法创建一个服务
app.factory('$show', function ($window) {
  return {
    showFunc:function(){
      $window.alert('推断式依赖注入');
    }
  }
})

app.controller('myCtrl', function ($scope,$show) {
  $scope.callShow = function () {
    $show.showFunc();
  }
})
