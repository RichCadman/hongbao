<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="format-detection" content="telephone=no, email=no" />
	<meta name="renderer" content="webkit">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="/hongbao/pub/home/css/base-v1.3.css">
	<link rel="stylesheet" type="text/css" href="/hongbao/pub/home/css/style.css">
	<title>分享页面</title>
</head>
<body class="share">
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="/hongbao/pub/home/js/jquery-3.1.1.js"></script>
	<script type="text/javascript">
	
  wx.config({
    debug: false,//调试模式 
    appId: "<?php echo ($signPackage["appId"]); ?>",
    timestamp: "<?php echo ($signPackage["timestamp"]); ?>",//生成签名的时间戳 
    nonceStr: "<?php echo ($signPackage["nonceStr"]); ?>",//生成签名的随机串
    signature: "<?php echo ($signPackage["signature"]); ?>",
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareTimeline',//分享给朋友圈
      'onMenuShareAppMessage',//分享给朋友
      'chooseImage',//拍照或从手机相册中选图接口
      'uploadImage',//上传图片接口
      "previewImage",//预览图片接口
      "downloadImage"//下载图片接口
      
    ]
  });
  wx.ready(function () {
      //分享到朋友圈  
    wx.onMenuShareTimeline({ 
        title: '<?php echo ($share["title"]); ?>',   
        //desc: '每日一题',  
          
        link: 'http://www.dingzankj.com/hongbao/index.php/Share/share', // 分享链接   
        imgUrl: 'http://www.dingzankj.com/hongbao/share.png', // 分享图标   
        success: function() {   
            // 用户确认分享后执行的回调函数 
            //alert("分享成功");
            $('.mask,.index,#share_ss').addClass('act');
			$.post("/hongbao/index.php/Share/share_success",function(){
				
			})
            //处理逻辑增加积分  
        },   
        cancel: function() {   
            // 用户取消分享后执行的回调函数   
             //alert("分享失败");
        }   
    }); 
    // 在这里调用 API
      //分享给朋友  
    wx.onMenuShareAppMessage({ 
  //alert(5);
        title: '<?php echo ($share["title"]); ?>',   
        //desc: '',  
          
        link: 'http://www.dingzankj.com/hongbao/index.php/Share/share', // 分享链接   
        imgUrl: 'http://www.dingzankj.com/hongbao/share.png', // 分享图标   
        success: function() {   
            // 用户确认分享后执行的回调函数 
            //alert("分享成功");  
            $('.mask,.index,#share_ss').addClass('act');
			$.post("/hongbao/index.php/Share/share_success",function(){
				
			})
        },   
        cancel: function() {   
            // 用户取消分享后执行的回调函数   
            //alert("分享失败");
        }   
    }); 
  });
</script>

	<div class="bg">
		<img src="/hongbao/pub/home/img/sharebg.jpg">
	</div>
</body>
</html>