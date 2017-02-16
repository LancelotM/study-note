/**
 * Created by Web on 2016/12/28.
 */
angular.module('myModule', ['ng'])
  .factory('$alert',function(){
    return{
      alertFunc:function(){
        alert('行内式的依赖注入')
      }
    }
  })
  .controller('myCtrl',["$scope","$alert",function ($scope,$alert){
    $scope.callAlert=function(){
      $alert.alertFunc();
    }
  }])