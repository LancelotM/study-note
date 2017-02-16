/**
 * Created by Web on 2016/12/28.
 */
var app=angular.module('myModule', ['ng'])
  app.service('$print',function(){
    this.print=function(msg){
      console.log('msg is '+msg);
    }
  })
  app.controller('myCtrl',ctrFunc)
  var ctrFunc=function ($scope,$print) {
    $scope.callPrint=function(){
      $print.print('标记式依赖注入');
    }
  }
  ctrFunc.$inject=["$scope","$print"]

