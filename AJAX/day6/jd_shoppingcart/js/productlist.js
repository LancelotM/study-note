/**功能点1：页面加载完后，异步请求页头和页尾**/
$('#header').load('data/header.php');
$('#footer').load('data/footer.php');


/**功能点2：为登录按钮绑定事件监听，实现异步的用户登录**/
var loginUname = null;  //当前登录的用户名
var loginUid = null;    //当前登录的用户编号
$('#bt-login').click(function(){
  //收集用户的输入，组成一个k=v&k=v形式字符串
  var data = $('#login-form').serialize();
  //发起异步请求，进行服务器验证
  $.ajax({
    type: 'POST',
    url:'data/2_user_login.php',
    data: data,
    success: function(result){
      //console.log('响应完成且成功');
      //console.log(arguments);
      if(result.code!==1){  //登录验证失败
        $('p.alert').html(result.msg);
        return;
      }
      /////登录验证成功/////
      $('.modal').hide();
      loginUname = result.uname; //登录用户名
      loginUid = result.uid;     //登录用户编号
      $('#welcome').html('欢迎回来：'+loginUname);
    },
    error: function(){ 
      alert('响应完成但有问题');
      console.log(arguments);
    }
  });
});

/**功能点3：当页面加载完后，异步请求产品列表**/
loadProductByPage(1);
//异步请求商品数据(分页)，修改商品列表，修改分页条内容
function loadProductByPage(pageNum){
  $.ajax({
    type: 'GET',
    //url: 'data/3_product_select.php',
    url: 'data/4_product_select.php',
    data: {pageNum: pageNum},
    success: function(pager){ //服务器返回分页对象
      //遍历分页对象中的产品数据
      var html = '';  //产品内容
      $.each(pager.data, function(i, p){ //遍历每一个商品
        html += `
          <li>
              <a href="#"><img src="${p.pic}"></a>
              <p>￥${p.price}</p>
              <h1><a href="#">${p.pname}</a></h1>
              <div>
                  <a href="${p.pid}" class="contrast"><i></i>对比</a>
                  <a href="${p.pid}" class="p-operate"><i></i>关注</a>
                  <a href="${p.pid}" class="addcart"><i></i>加入购物车</a>
              </div>
          </li>  
        `;
      });
      $('#plist ul').html(html);
      //修改分页条中的内容
      var html = '';  //分页条中的内容
      html += `<li><a href="${pager.pageNum-2}">${pager.pageNum-2}</a></li> `;
      html += `<li><a href="${pager.pageNum-1}">${pager.pageNum-1}</a></li> `;
      html += `<li class="active"><a href="#">${pager.pageNum}</a></li> `;
      html += `<li><a href="${pager.pageNum+1}">${pager.pageNum+1}</a></li> `;
      html += `<li><a href="${pager.pageNum+2}">${pager.pageNum+2}</a></li> `;
      $('.pager').html(html);
    },
    error: function(){
      alert('产品列表响应完成但有问题');
    }
  });
}

/**功能点4：为分页条中的每个超链接绑定事件监听**/
$('.pager').on('click', 'a', function(e){
  e.preventDefault();
  var pn = $(this).attr('href'); //要显示的页号
  loadProductByPage(pn); //异步加载商品数据
});


/**功能点5：为每个“添加到购物车”超链接绑定单击事件监听**/
$('#plist').on('click','a.addcart', function(e){
  e.preventDefault();
  var pid = $(this).attr('href');
  //异步请求，实现添加到购物车
  $.ajax({
    type: 'POST',
    url: 'data/5_cart_product_add.php',
    data: {uid: loginUid, pid: pid},
    success: function(result){
      //////处理购物车添加结果//////
      if(result.code===1){
        alert('商品成功添加到购物车！该商品已购买的数量：'+result.count);
      }else {
        alert('添加失败！错误消息：'+result.msg);
      }
    }
  });
});


/**功能点6：为“去购物车”结算添加单击事件绑定**/
/*
注意：下述代码不能为异步请求页头/页尾中的元素绑定监听函数！！！！ 只能使用事件代理，委托DOM树上已有的父元素！
$('#settle_up').click(function(){
  alert(999999);
});
alert('JS脚本执行完成'+$('#settle_up').length);
*/
$('#header').on('click','#settle_up',function(){
  //将用户的登录信息保存为Cookie，共下一个页面使用
  document.cookie = 'LoginUserId='+loginUid;
  document.cookie = 'LoginUserName='+loginUname;
  location.href = 'shoppingcart.html';
});