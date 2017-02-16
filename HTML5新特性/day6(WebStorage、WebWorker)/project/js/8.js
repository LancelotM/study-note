/**本JS文件必须由Worker线程执行**/

onmessage = function(e){
  console.log('接收到UI线程的消息,开始运算')
  var n = e.data;
  n = parseInt(n);
  for(var i=2; i<n; i++){   //此处模拟的是很耗时的操作
    if(n%i===0){
      break;
    }
  }
  console.log('运算完成，Worker线程给UI主线程发消息')
  if(i===n){
    postMessage(n+'是一个质数');
  }else {
    postMessage(n+'不是质数')
  }
}