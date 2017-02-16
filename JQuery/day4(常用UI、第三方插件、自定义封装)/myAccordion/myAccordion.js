if(window.jQuery===undefined)
	throw new Error("myAccordion插件依赖于jquery-1.11.3.js");
jQuery.fn.myAccordion=function(){
	this.addClass("accordion")
	this.children(":nth-child(odd)")
		.addClass("title")
		.attr("data-toggle","title")
	this.children(":nth-child(even)")
		.addClass("content")
	this.children(":nth-child(even):first")
		.addClass("open")
	$(".accordion").on(
      "click","[data-toggle='title']",
      function(){//处理函数: 
        $(this).next().toggleClass("open")
               .siblings(".open")
               .removeClass("open");
      }
    );
}



	