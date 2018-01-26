<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="favicon.png" type="image/x-icon">
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<title>在线支付</title>
</head>
<body>
<input type="hidden" value="<?php echo $_SESSION['duanxin']['s_tel']; ?>" id="s_tel"/>
<input type="hidden" value="<?php echo $_SESSION['duanxin']['u_tel']; ?>" id="u_tel"/>
</body>
<script src="/hongbao/pub/home/js/jquery-1.12.4.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function(){
        callpay();
    });

    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
        <?php echo $jsApiParameters;?>,
        function(res){
            WeixinJSBridge.log(res.err_msg);
            //alert(res.err_code+res.err_desc+res.err_msg);
            if(res.err_msg == "get_brand_wcpay_request:ok"){
                //alert("支付成功");
                //WeixinJSBridge.call('closeWindow');
                var phone = $("#s_tel").val();
                var u_phone = $("#u_tel").val();
//                alert(phone);
                reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
                $.ajax({
                    type: "POST", //用POST方式传输
                    dataType: "text", //数据格式:JSON
                    url: 'http://www.gongyuba.cn/index.php/Home/Index/sms_do', //目标地址
                    data: "tel=" + phone + "&u_tel=" + u_phone,
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
//                        alert('短信发送失败');
                    },
                    success: function (msg){
                        if(msg!=1){
                            alert( msg );
                        }
                    }
                });
                window.location.href="http://www.dingzankj.com/hongbao/index.php/User/index";
            }else{
                //alert("支付失败");
                //WeixinJSBridge.call('closeWindow');
            	  window.location.href="http://www.dingzankj.com/hongbao/index.php/User/index";
            }
        }
    );
    }

    function callpay()
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
</script>
</html>