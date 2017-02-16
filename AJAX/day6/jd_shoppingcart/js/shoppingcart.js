/**功能点1：读取上一页面共享的Cookie数据**/
var arr = document.cookie.split('; '); //此处用;+空格拆分
var cookieData = {};
for(var i=0; i<arr.length; i++){
  var kv = arr[i];    //"k=v"形式的键值对
  var pair = kv.split('='); //使用=拆分每个键值对
  cookieData[pair[0]] = pair[1];
}
var loginUid = cookieData['LoginUserId'];
var loginUname = cookieData['LoginUserName'];

/**功能点2：异步请求页头页页尾**/
$('#header').load('data/header.php',function(){
  //load的回调函数——异步请求成功完成后才执行
  $('#welcome').html("欢迎回来："+loginUname);
});
$('#footer').load('data/footer.php');
/*
//修改失败！！
$('#welcome').html("欢迎回来："+loginUname);
alert('JS执行完成:'+$('#welcome').length);
*/

/**功能点3：页面加载完后，异步请求当前登录用户的购物车内容**/
$.ajax({  
  type: 'GET',
  url: 'data/6_cart_detail_select.php',
  data: {uid: loginUid},
  success: function(list){
    //遍历购物车中的每个商品，生成TR和TD
    var html = '';
    $.each(list, function(i,p){
      html += `
      <tr>
          <td>
              <input type="checkbox"/>
              <input type="hidden" value="${p.did}" />
              <div><img src="${p.pic}"></div>
          </td>
          <td><a href="">${p.pname}</a></td>
          <td>${p.price}</td>
          <td>
              <button>-</button><input type="text" value="${p.count}"/><button>+</button>
          </td>
          <td><span>${p.price*p.count}</span></td>
          <td><a href="${p.did}">删除</a></td>
      </tr>  
      `;
    });
    $('#cart tbody').html(html);
  }
});