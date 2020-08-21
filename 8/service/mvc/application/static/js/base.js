// 使右键和复制失效 
document.oncontextmenu=new Function("event.returnValue=false"); 
document.onselectstart=new Function("event.returnValue=false"); 