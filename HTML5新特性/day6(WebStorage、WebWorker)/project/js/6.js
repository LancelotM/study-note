/**Worker线程接收UI主线程的消息**/
console.log('Worker线程开始待命....')

//接收到UI线程的消息后才能开始运算
onmessage = function(e){
  console.log('开始质数判定...')
  console.time('质数判定');
  var n = e.data;  //从消息事件中读取数据
  n = parseInt(n); //消息中的数据都是字符串
  var result = isPrime(n);
  console.timeEnd('质数判定')
  console.log('质数判定结束...')
  console.log(n+'是质数吗：'+result);
}




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