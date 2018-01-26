<?php
namespace Home\Controller;
use Think\Controller;
class SendController extends Controller{
	public function httpGet($url,$data=array()){
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	    // POST数据
	    curl_setopt($ch, CURLOPT_POST, 1);
	    // 把post的变量加上
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    return $output;
	}
	public function send(){
		// $json_token=http_request("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".C('WX_APPID')."&secret=".C('WX_SECRET'));
		// $access_token=json_decode($json_token,true);
		//获得access_token
		//$this->access_token=$access_token[access_token];
		$this->access_token="5_qd1T4E0K8T5ZOfvT16TaZBR2Pkor2MeedBmEZNyxHypQfAYM9k5EMEN6uwHiH06hbtFD7oxdjKlEVDxZtf3O8TFCo9g7DI1ImJEb4PIVZ3vKBpQI4KRx7n3iMarGd3v1WN9T0g2kD2tRx_8zZVGcAGAEAL";
		//echo $this->access_token;exit;
		//模板消息
		$template=array(
		        'touser'=>"oDpc20en1-o09dtEYhk0RBgHHkZo",
		        'template_id'=>"LyT3V71lZJvXvaASyKfZ5inoVAdys9N4WgHLfeel_Bg",
		        'url'=>"www.baidu.com",
		        'topcolor'=>"#7B68EE",
		        'data'=>array(
		                'first'=>array('value'=>urlencode("这是测试"),'color'=>"#FF0000"),
						'keyword1'=>array('value'=>urlencode('鼎赞科技'),'color'=>'#FF0000'),
		                'keyword4'=>array('value'=>urlencode(date("Y-m-d H:i:s")),'color'=>'#FF0000'),
		                // 'keyword3'=>array('value'=>urlencode('这是测试'),'color'=>'#FF0000'),
		                // 'keyword4'=>array('value'=>urlencode('这是测试'),'color'=>'#FF0000'),
		                'remark'=>array('value'=>urlencode('今天天气晴朗，万里无云，都TM篮子'),'color'=>'#FF0000'), )
		            );
		$json_template=json_encode($template);
		//echo $json_template;
		//echo $this->access_token;
		$url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=5_qd1T4E0K8T5ZOfvT16TaZBR2Pkor2MeedBmEZNyxHypQfAYM9k5EMEN6uwHiH06hbtFD7oxdjKlEVDxZtf3O8TFCo9g7DI1ImJEb4PIVZ3vKBpQI4KRx7n3iMarGd3v1WN9T0g2kD2tRx_8zZVGcAGAEAL";
		$res=$this->httpGet($url,urldecode($json_template));
		$res=json_decode($res,true);
		var_dump($res);exit;
		if ($res['errcode']==0){
			echo '发送成功';
		} else {
			echo '发送失败123';
		}
	}
}