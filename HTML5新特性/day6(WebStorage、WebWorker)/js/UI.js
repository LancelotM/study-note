/**
 * Created by Web on 2016/12/15.
 */
btn1.onclick=function(){
  console.log("111");
}
btn2.onclick=function(){
  console.log("222");
}
start.onclick=function(){
  var msg=search.value;
  var worker=new Worker('js/Worker.js');
  worker.postMessage(msg);
  result.innerHTML='计算结果：';
  worker.onmessage=function(e){
    result.innerHTML+=e.data;
  }
}
