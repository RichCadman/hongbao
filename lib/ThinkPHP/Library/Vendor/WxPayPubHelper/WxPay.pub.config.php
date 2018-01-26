<?php
/**
* 	配置账号信息
*/

class WxPayConf_pub
{

    //=======【基本信息设置】=====================================
    //微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
    const APPID = 'wxec9f9ed5706a50a6';
    //受理商ID，身份标识
    const MCHID = '1450790602';
    //商户支付密钥Key。审核通过后，在微信发送的邮件中查看
    const KEY = 'e10adc3949ba59abbe56e057f20f883e';
    //JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
    const APPSECRET = 'ae78c7432ab05adfaccaa03986611f1b';
    
    //=======【证书路径设置】=====================================
    //证书路径,注意应该填写绝对路径
    const SSLCERT_PATH = '';
    const SSLKEY_PATH = '';
    
    //=======【异步通知url设置】===================================
    //异步通知url，商户根据实际开发过程设定
    const NOTIFY_URL = 'http://www.dingzankj.com/hongbao/index.php/Wxpay/notify';
    
    //=======【curl超时设置】===================================
    //本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
    const CURL_TIMEOUT = 30;
    
}
	
?>