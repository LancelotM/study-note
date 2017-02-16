/**
 * Created by Web on 2016/12/28.
 */
angular.module('myModule', ['ng'])
  .service('$argSum',function(){
    this.argSum=function(arg1,arg2){
      return arg1+arg2;
    }
  })
  .controller('myCtrl', ['$scope','$argSum',function($scope,$argSum){
    console.log($scope.num1)
    $scope.add=function(){
      var result=$argSum.argSum($scope.num1,$scope.num2);
      alert('result is '+result)
    }
  }])