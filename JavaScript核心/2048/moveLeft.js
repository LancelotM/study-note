  ,
  moveLeft:function(){//左移所有行
    var before=String(this.data);
    //遍历data中每一行  r
    for(var r=0;r<this.RN;r++)
      this.moveLeftInRow(r);//左移第r行
    //(遍历结束)
    var after=String(this.data);
    //如果before不等于after
    if(before!==after){
      this.randomNum();//随机生成一个新数
      this.updateView();//更新页面
    }
  },
  moveLeftInRow:function(r){//左移第r行
    //c从0开始，到<CN-1结束，遍历r行中每个格
      //找r行c列右侧下一个不为0的位置nextc
      var nextc=this.getNextInRow(r,c);
      //如果nextc为-1,就退出循环
      //否则  
        //如果c列的值是0
          //将nextc列的值赋值给c列
          //将nextc列的值置为0
          //c留在原地
        //否则 如果c列的值等于nextc列的值
          //将c列的值*2
          //将nextc列置为0       
  },
  //找r行c列右侧下一个不为0的位置
  getNextInRow:function(r,c){
    //c+1
    //从c开始，到<CN结束
      //如果r行c位置不是0
        //返回c
    //(遍历结束)
    //返回-1
  },