<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>支付</title>
		<link rel="stylesheet" type="text/css" href="/hongbao/pub/home/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="/hongbao/pub/home/css/mall.css"/>
		<script src="/hongbao/pub/home/js/jquery-1.12.4.min.js" type="text/javascript"></script>
		<script src="/hongbao/pub/home/js/common.js" type="text/javascript"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	</head>
	<body style="background: rgb(242,242,242);">
		<div class="Upay">
			<p class="Upay-text">支付金额</p>
			<input type="number" name="blance" id="blance" placeholder="订单金额"/>
		</div>
		<div class="Upay2">
			<p class="Upay-text">支付方式</p>
			<div class="Upay-con">
				<span><img src="/hongbao/pub/home/img/zf-wx.png"/></span>
				<div>
					<p>微信支付</p>
					<p>推荐安装微信5.0及以上版本</p>
				</div>
				
			</div>
		</div>
		<div class="bottom-inp">
		<input type="button" name="" id="zhifu" value="支付"/>
		</div>
		<script>
		$(function(){
			
			$("#zhifu").click(function(){
				var yue=$('#blance').val();
				if(yue<=0){
				alert('余额不能为空!');
				}else{
					location.href="/hongbao/index.php/User/fukuan/je/"+yue+"";
					}
			})
		})
		
		</script>
	</body>
</html>