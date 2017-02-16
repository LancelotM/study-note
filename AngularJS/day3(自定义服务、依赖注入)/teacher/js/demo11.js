/**
 * Created by bjwsl-001 on 2016/12/28.
 */


var app = angular.module('myModule',['ng']);

//创建了一个$print的服务
app.service('$print', function () {
  this.print = function (msg) {
    console.log(" msg is "+msg);
  }
})

var ctrFunc = function ($scopes,$print) {
    $scopes.callPrint = function () {
      $print.print('标记式依赖注入');
    }
};

//做标记
ctrFunc.$inject = ["$scope","$print"];

//标记式依赖注入
app.controller('myCtrl',ctrFunc)