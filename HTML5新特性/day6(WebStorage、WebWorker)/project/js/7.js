//用Worker线程给UI主线程发消息
console.log('开始质数判定...')
console.time('质数判定');
var n = 13;
var result = isPrime(n);
console.timeEnd('质数判定')
console.log('质数判定结束...')
var msg = n+'是质数吗：'+result;
//用Worker线程给UI主线程发消息
postMessage(msg);



function isPrime(num){

  //模拟PHP中的sleep函数
  var start = new Date().getTime();
  do{
    var now = new Date().getTime();
  }while( (now-start)<=5000 );


  for(var i=2; i<num; i++){
    if(num%i===0){
      break;
    }
  }
  if(i===num){
    return true;
  }else {
    return false;
  }
}