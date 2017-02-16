/**
 * Created by Web on 2016/12/15.
 */
onmessage=function(e){
  var n=parseInt(e.data);
  console.log(n)
  console.log(e)
  function isodd(n){
    var result='';
    if(n%2==1){
      result=n+'是奇数';

    }else{
      result=n+'不是奇数';
    }
    return result;
  }
  var msg=isodd(n);
  postMessage(msg);
  console.log(msg)
};