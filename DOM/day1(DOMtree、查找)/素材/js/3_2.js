//Step1: 先遍历给定父元素的直接子节点
function getChildren1(parent){
//  console.log(parent.nodeType!=3?
//             parent.nodeName:parent.nodeValue);
  //获得parent的直接子节点:
  var children=parent.childNodes;
               //parent.children;
  //遍历children中每个子节点
  for(var i=0,len=children.length;i<len;i++){
   //Step2:对每个子节点调用和父节点完全相同的方法
    getChildren1(children[i]);
  }
}
function getChildren2(parent){
  var iterator=document.createNodeIterator(
    parent,NodeFilter.SHOW_ALL,null,false  
  );
  var node=null;
  while((node=iterator.nextNode())!=null){
//    console.log(node.nodeType!=3?
//             node.nodeName:node.nodeValue);
  }
}
console.time("getChildren1");
for(var i=0;i<10000;i++){
  getChildren1(document);
}
console.timeEnd("getChildren1");
console.time("getChildren2");
for(var i=0;i<10000;i++){
  getChildren2(document);
}
console.timeEnd("getChildren2");
