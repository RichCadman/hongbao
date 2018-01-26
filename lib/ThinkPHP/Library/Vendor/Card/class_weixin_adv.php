<?php

/**
 * 微信SDK
 * pan041ymail@gmail.com
 */

class class_weixin_adv
{
    var $appid = "wxec9f9ed5706a50a6";
    var $appsecret = "ae78c7432ab05adfaccaa03986611f1b";

    //构造函数，获取Access Token
    public function __construct($appid = NULL, $appsecret = NULL)
    {
        if($appid){
            $this->appid = $appid;
        }
        if($appsecret){
            $this->appsecret = $appsecret;
        }


        $this->lasttime = 1512632724;
        $this->access_token = "6G5oMmRsJcd4C1URWkVwpKn_h1hFVeuLxIuBcLRSP3QokIBj6NqYqAwSfpf-5yCoUzFz3sOwRsp9MWYHfQN_PBLRJTxx4v53ArQXh3WOgSnyWySdBTu0WaPOZNrLyQbBZGMeADAIPV";

        if (time() > ($this->lasttime + 7200)){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $res = $this->https_request($url);
            $result = json_decode($res, true);

            $this->access_token = $result["access_token"];
            $this->lasttime = time();
        }
    }
//获取用户基本信息
    public function get_user_info($openid)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->access_token."&openid=".$openid."&lang=zh_CN";
        $res = $this->https_request($url);
        return json_decode($res, true);
    }

//https请求
    public function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}