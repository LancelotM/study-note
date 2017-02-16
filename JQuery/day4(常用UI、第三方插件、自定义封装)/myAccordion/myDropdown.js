if(window.jQuery===undefined)
	throw new Error("myDropdown插件基于")
jQuery.fn.myDropdown=function(){
	this.addClass("dropdown");
	this.children("a").attr('data-trigger','dropdown')
						.next().addClass("dropdown-menu fade")
	$('[data-trigger="dropdown"]').click(
        function(e){
          e.preventDefault();
          $(this).next().toggleClass("in");
        }
      );
}









