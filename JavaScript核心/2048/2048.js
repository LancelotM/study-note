var game={
	data:null,
	RN:4,CN:4,
	start:function(){
		this.data=[];
		for(var r=0;r<this.RN;r++){
			this.data.push([]);
			for(var c=0;c<this.CN;c++){
				this.data[r][c]=0;
			}
		}
		this.randomNum();
		this.randomNum();
		//debugger;
		//console.dir(this.data);
		//console.log(this.data.join("\n"));
		this.updateView();
		document.onkeydown=function(e){
			switch(e.keyCode){
				case 37:
					this.moveLeft();
					break;
				case 38:
					this.moveUp();
					break;
				case 39:
					this.moveRight();
					break;
				case 40:
					this.moveDown();
					break;
			}
		}.bind(this);
	},
	randomNum:function(){
		while(true){
			r=Math.floor(Math.random()*this.RN);
			c=Math.floor(Math.random()*this.CN);
			if(this.data[r][c]===0){
				//if(Math.random()<0.5){
					//this.data[r][c]=2;
				//}else
					//{this.data[r][c]=4;}
				this.data[r][c]=Math.random()<0.5?2:4;
				break;
			}
		}
	},
	updateView:function(){
		for(var r=0;r<this.RN;r++){
			for(var c=0;c<this.CN;c++){
				var div=document.getElementById("c"+r+c);
				if(this.data[r][c]!==0){
					div.innerHTML=this.data[r][c];
					div.className="cell n"+this.data[r][c];
				}else{
					div.innerHTML="";
					div.className="cell";
				}
			}
		}
	},
	moveLeft:function(){//左移所有行
		var before=String(this.data);
		//遍历data中每一行  r
		for(var r=0;r<this.RN;r++){
		  this.moveLeftInRow(r);//左移第r行
		//(遍历结束)
		}
		var after=String(this.data);
		//如果before不等于after
		if(before!==after){
		  this.randomNum();//随机生成一个新数
		  this.updateView();//更新页面
		}
	},
	moveLeftInRow:function(r){//左移第r行
    //c从0开始，到<CN-1结束，遍历r行中每个格
		for(var c=0;c<this.CN-1;c++){
			//找r行c列右侧下一个不为0的位置nextc
			var nextc=this.getNextInRow(r,c);
			//如果nextc为-1,就退出循环
			if(nextc==-1){break;}
			//否则
			else{
				//如果c列的值是0
				if(this.data[r][c]==0){
					//将nextc列的值赋值给c列
					this.data[r][c]=this.data[r][nextc];
					//将nextc列的值置为0
					this.data[r][nextc]=0;
					//c留在原地
					c--;
				//否则 如果c列的值等于nextc列的值
				}else if(this.data[r][c]===this.data[r][nextc]){
					//将c列的值*2
					this.data[r][c]*=2;
					//将nextc列置为0
					this.data[r][nextc]=0;
				}
			}
		}
	},
  //找r行c列右侧下一个不为0的位置
  getNextInRow:function(r,c){
    //c+1
	c++;
    //从c开始，到<CN结束
	for(;c<this.CN;c++){
      //如果r行c位置不是0
	  if(this.data[r][c]!==0)
        //返回c
		{return c;}
    //(遍历结束)
	}
    //返回-1
	return -1;
  },
	moveRight:function(){//右移所有行
    //为data拍照，保存在before中
	var before=String(this.data);
    //遍历data中每一行
	for(var r=0;r<this.Rn;r++){
      //右移第r行
		this.moveRightInRow(r);
    //(遍历结束)
	}
    //为data拍照，保存在after中
	var after=String(this.data);
    //如果发生了移动
	if(before!=after)
      //随机生成数
	  this.randomNum();
      //更新页面
	  this.updateView();
  },
  moveRightInRow:function(r){//右移第r行
    //c从CN-1开始，到>0结束，反向遍历r行中每个格
	for(var c=this.CN-1;c>0;c--){
      //找r行c列左侧前一个不为0的位置prevc
		var prevc=this.getPrevInRow(r,c);
      //如果prevc为-1,就退出循环
		if(prevc==-1){break;}
      //否则
	  else{
        //如果c列的值是0
		if(this.data[r][c]==0){
          //将prevc列的值赋值给c列
		  this.data[r][c]=this.data[r][prevc];
          //将prevc列的值置为0
		  this.data[r][prevc]=0;
          //c留在原地
		  c++;
        //否则 如果c列的值等于prevc列的值
		}else if(this.data[r][c]==this.data[r][prevc]){
          //将c列的值*2
		  this.data[r][c]*=2;
          //将prevc列置为0
		  this.data[r][prevc]=0;
		}
	  }
    }
  },
	getPrevInRow:function(r,c){
    //c-1
	c--;
    //从c开始，到>=0结束，反向遍历
	for(;c>=0;c--){
      //如果r行c位置不是0，就返回c
		if(this.data[r][c]!=0){return c;}
    //(遍历结束)
	}
    //返回-1
	return -1;
  },
	moveUp:function(){
  //为data拍照保存在before中
  var before=String(this.data);
  //遍历data中每一列
  for(var c=0;c<this.CN;c++){
    //调用moveUpInCol上移第c列
	this.moveUpInCol(c);
  }
  //为data拍照保存在after中
   var after=String(this.data);
  //如果before不等于after
	if(before!=after)
    //随机生成数
	this.randomNum();
    //更新页面
	this.updataView();
	},
	moveUpInCol:function(c){
		//r从0开始,到r<RN-1结束，r每次递增1
		for(var r=0;r<this.RN-1;r++)
		  //查找r行c列下方下一个不为0的位置nextr
		  var nextr=this.getNextInCol(r,c)
		  //如果没找到,就退出循环
		  if(nextr==-1){break;}
		  //否则  
		  else{
			//如果r位置c列的值为0
			if(this.data[r][c]=0){
			  //将nextr位置c列的值赋值给r位置
			  this.data[][]=this.data[][];
			  //将nextr位置c列置为0
			  //r留在原地
			}else if{
			//否则，如果r位置c列的值等于nextr位置的值          
			 //将r位置c列的值*2
			  //将nextr位置c列的值置为0
			}
		  }
	},
	getNextInCol:function(r,c){
		//r+1
		//循环，到<RN结束，r每次递增1
		  //如果r位置c列不等于0
			//返回r
		//(遍历结束)
		//返回-1
	},
	moveDown:function(){
	  //为data拍照保存在before中
	  var before=String(this.data);
	  //遍历data中每一列
		//调用moveDownInCol下移第c列
	  //为data拍照保存在after中
	  //如果before不等于after
	  var after=String(this.data);
		//随机生成数
		//更新页面
	},
	moveDownInCol:function(c){
		//r从RN-1开始，到r>0结束，r每次递减1
		  //查找r位置c列上方前一个不为0的位置prevr
		  //如果没找到,就退出循环
		  //否则  
			//如果r位置c列的值为0
			  //将prevr位置c列的值赋值给r位置
			  //将prevr位置c列置为0
			  //r留在原地
			//否则，如果r位置c列的值等于prevr位置的值
			  //将r位置c列的值*2
			  //将prevr位置c列置为0
	},
	getPrevInCol:function(r,c){
		//r-1
		//循环，r到>=0结束，每次递减1
		  //如果r位置c列不等于0
			//返回r
		//(遍历结束)
		//返回-1
	},
}
game.start();