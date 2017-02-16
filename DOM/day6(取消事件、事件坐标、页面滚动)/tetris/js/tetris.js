var game={
  CSIZE:26,//格子大小
  OFFSET:15,//内边距
  pg:null,//容器元素
  shape:null,
  nextShape:null,//主角图形——正在下落的图形
  interval:200,//下落的时间间隔——游戏速度
  timer:null,//定时器序号
  wall:null,//保存停止下落的方块的墙
  RN:20,CN:10,//保存总行数和总列数
  randomShape(){
	switch(Math.floor(Math.random()*3)){
		case 0:
			return new O();
		case 1:
			return new T();
		case 2:
			return new I();
	}
  },
  start(){//启动游戏
    this.wall=[];//创建空数组保存在wall中
    //r从0开始到<RN结束
    for(var r=0;r<this.RN;r++){
      //设置wall中r行为CN个空元素的数组
      this.wall[r]=new Array(this.CN);
    }

    //查找class为playground的元素保存在pg属性中
    this.pg=
      document.querySelector(".playground");
    //实例化一个T类型的对象保存在shape属性中
    this.shape=this.randomShape();
    this.nextShape=this.randomShape();
    this.paint();//绘制主角图形
    //启动周期性定时器,设置任务函数为moveDown,间隔为interval,再将序号保存在timer中
    this.timer=setInterval(
      this.moveDown.bind(this),this.interval
    );
	document.onkeydown=function(e){
	switch(e.keyCode){
		case 37:
			this.moveLeft();
			break;
		case 39:
			this.moveRight();
			break;
		case 40:
			this.moveDown();
			break;
		case 32:
			this.hardDrop();
			break;
	}
  }.bind(this)
  },
  paintShape(){//绘制主角图形
    var frag=//创建文档片段frag
      document.createDocumentFragment();
    //遍历shape的cells
    for(var i=0;i<this.shape.cells.length;i++){
      //将当前cell临时保存在cell变量中
      var cell=this.shape.cells[i];
      this.paintCell(cell,frag);//绘制cell
    }
    this.pg.appendChild(frag);//将frag追加到pg中
  },
  paintCell(cell,frag){//单绘一个格
    var img=new Image();//创建img
    img.src=cell.src;//设置img的src为cell的src
    //设置img的left为OFFSET+cell的c*CSIZE
    img.style.left=
      this.OFFSET+cell.c*this.CSIZE+"px";
    //设置img的top为OFFSET+cell的r*CSIZE
    img.style.top=
      this.OFFSET+cell.r*this.CSIZE+"px";
    frag.appendChild(img);//将img追加到frag中
  },
  paint(){//重绘一切
    //删除pg内容中所有img
    //替换pg内容中的所有<img[^>]*>为""
    this.pg.innerHTML=
     this.pg.innerHTML.replace(/<img[^>]*>/g,"");
    this.paintShape();//重绘主角
    this.paintWall();//重绘墙
    this.paintNext();//重绘备胎
    //重绘分数
  },
  paintNext(){
	var frag=//创建文档片段frag
      document.createDocumentFragment();
    //遍历shape的cells
    for(var i=0;i<this.nextShape.cells.length;i++){
      //将当前cell临时保存在cell变量中
      var cell=this.nextShape.cells[i];
      var img=this.paintCell(cell,frag);
	  var lefg=parseFloat(img.style.left);
	  var top=parseFloat(img.style.top);
	  img.style.left=left+1*this.CSIZE+"px";
	  img.style.top=top+1*this.CSIZE+"px";
		
    }
    this.pg.appendChild(frag);//将frag追加到pg中
  },
  hardDrop(){
	while(this.canDown()){
		this.moveDown();
	}
  },
  paintWall(){
    //创建文档片段frag
	var frag=document.createDocumentFragment();
    //遍历wall
	for(var r=this.RN-1;r>=0;r--){
		if(this.wall[r].join("")===""){break;
		}else{
			for(var c=0;c<this.CN;c++){
				 //将当前格临时保存在cell中
				var cell=this.wall[r][c];
				 //调用paintCell，传入cell和frag
				if(cell!==undefined){
					this.paintCell(cell,frag);
				}
		//(遍历结束)
			}
		}
	}
    //将frag追加到pg中
	this.pg.appendChild(frag);
  },
  landIntoWall(){//落到墙里
    //遍历shape的cells
    for(var i=0;i<this.shape.cells.length;i++){
      //将当前格保存在变量cell中
      var cell=this.shape.cells[i];  
      //将cell放入wall中和cell相同的位置
		this.wall[cell.r][cell.c]=cell;
    }
  },
  canDown(){//判断能否下落
    //遍历shape的cells
    for(var i=0;i<this.shape.cells.length;i++){
      //将当前格保存在变量cell中
      var cell=this.shape.cells[i];
      //如果cell的r等于RN-1或
        //wall中cell的下方不是undefined
        //返回false
      if(cell.r==this.RN-1||
          this.wall[cell.r+1][cell.c]!==undefined){
        return false;
      }
    }//(遍历结束)
    return true;//返回true
  },
  moveDown(){//下落一步
    if(this.canDown()){//如果可以下落
      this.shape.moveDown();//调用shape的moveDown  
    }else{//否则
      this.landIntoWall();//落到墙里
	  var ln=this.deleteRows();
      //实例化一个T图形保存在shape中
      this.shape=new O();
    }
    this.paint();//重绘主角
  },
  deleteRows(){
	for(var r=this.RN-1,ln=0;r>=0;r--){
		if(this.wall[r].join("")==""){break;}
		var reg=/^,|,,|,$/
		if(!reg.test(String(this.wall[r]))){
			this.deleteRow(r);
			if(++ln==4){break;}
			r++;
		}
		return ln;
	}
  },
  deleteRow(r){
	for(;r>=0;r--){
		this.wall[r]=this.wall[r-1].slice();
		if(this.wall[r-1].join("")==""){break;}
		else{
			this.wall[r-1]=new Array(this.CN);
			for(var c=0;c<this.CN;c++){
				this.wall[r][c]!==undefined&&this.wall[r][c].r++;
			}
		}
	}
  },
  canLeft(){
	for(var i=0;i<this.shape.cells.length;i++){
		var cell=this.shape.cells[i];
		if(cell.c==0||this.wall[cell.r][cell.c-1]){
			return false;
		}
		return true;
	}
  },
  moveLeft(){
	if(this.canLeft()){
		this.shape.moveLeft();
		this.paint();
	}
  },
  canRight(){
	for(var i=0;i<this.shape.cells.length;i++){
		var cell=this.shape.cells[i];
		if(cell.c+1==this.CN-1||this.wall[cell.r][cell.c+1]){
			return false;
		}
		return true;
	}
  },
  moveRight(){
	if(this.canRight()){
		this.shape.moveRight();
		this.paint();
	}	
  },
}
game.start();