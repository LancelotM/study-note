//Step1: 定义Cell类型描述格子对象统一的结构
function Cell(r,c){
  this.r=r;this.c=c;this.src="";
}
function State(r0,c0,r1,c1,r2,c2,r3,c3){
	this.r0=r0;this.c0=c0;
	this.r0=r1;this.c0=c1;
	this.r0=r2;this.c0=c2;
	this.r0=r3;this.c0=c3;
}
//Step2: 抽象公共父类型Shape
function Shape(r0,c0,r1,c1,r2,c2,r3,c3,src,states,orgi){
  this.cells=[new Cell(r0,c0), new Cell(r1,c1),
              new Cell(r2,c2), new Cell(r3,c3)];
  for(var i=0;i<this.cells.length;i++){
    this.cells[i].src=src;
  }
  this.states=states;
  this.orgCell=this.cells[orgi];
  this.Statei=0;
}
//定义父类型原型对象封装公共的方法
Shape.prototype={
  IMG:{
    T:"img/T.png",O:"img/O.png",I:"img/I.png"
  },
  moveDown(){//this->当前图形
    //遍历当前图形的cells
    for(var i=0;i<this.cells.length;i++){
      this.cells[i].r++;//将当前cell的r+1
    }
  },
  moveLeft(){//this->当前图形
    //遍历当前图形的cells
    for(var i=0;i<this.cells.length;i++){
      this.cells[i].c--;//将当前cell的c-1
    }
  },
  moveRight(){//this->当前图形
    //遍历当前图形的cells
    for(var i=0;i<this.cells.length;i++){
      this.cells[i].c++;//将当前cell的c+1
    }
  },
  rotateR(){},
  rotateL(){},
}
//Step3:定义具体图形类型描述所有图形的数据结构
function T(){//借用Shape()
  Shape.call(this,0,3,0,4,0,5,1,4,this.IMG.T,[
	  new State(0,-1,0,0,0,1,1,0),
	  new State(-1,0,0,0,1,0,0,-1),
	  new State(0,1,0,0,0-1,-1,0),
	  new State(1,0,0,0,-1,0,0,1) , 
  ],1);
}
//设置子类型原型对象继承父类型原型对象
Object.setPrototypeOf(
  T.prototype,Shape.prototype
);
//定义O类型描述所有O图形的数据结构
function O(){//借用Shape()
  Shape.call(this,0,4,0,5,1,4,1,5,this.IMG.O,[
	  new State(0,-1,0,0,0,1,1,0),
  ],1);
}
Object.setPrototypeOf(
  O.prototype,Shape.prototype
);
function I(){//借用Shape()
  Shape.call(this,0,3,0,4,0,5,0,6,this.IMG.I,[
	  new State(0,-1,0,0,0,1,0,2),
	  new State(-1,0,0,0,1,0,2,0),
  ],1);
}
Object.setPrototypeOf(
  I.prototype,Shape.prototype
);