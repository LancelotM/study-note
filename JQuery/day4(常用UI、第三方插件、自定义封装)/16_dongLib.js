if(window.jQuery===undefined)
	throw new Error("dongLib插件依赖于jquery-1.11.3.js");
$.dong={
	sum:function(elems){
		var sum=0;
		$.each(elems,function(){
			sum+=parseFloat(this.innerHTML)
		});
		return sum;
	},
}
jQuery.fn.sum=function(){
	var sum=0;
	$.each(this,function(){
		sum+=parseFloat(this.innerHTML);
	});
	return sum;
}