
	//不加windowonload:不许加载在body前写
var scale=1/window.devicePixelRatio;
document.write('<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale='+scale+',minimum-scale='+scale+',maximum-scale='+scale+'"/>')//写入标签
var html=document.getElementsByTagName("html")[0];
//var deviceWidth=document.documentElement.clientWidth();
var deviceWidth=html.getBoundingClientRect().width;//可以获取整个屏幕的宽度
html.style.fontSize=deviceWidth/20+"px"   

	

