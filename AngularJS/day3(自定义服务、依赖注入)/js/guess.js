/**
 * Created by Web on 2016/12/28.
 */
angular.module('myModule', ['ng'])
  .factory('$show',function($window){
    return{
      showFunc:function(){
        $window.alert('推断式的依赖注入')
      }
    }
  })
  .controller('myCtrl', function ($scope,$show) {
    $scope.callShow=function(){
      $show.showFunc();
    }
  })