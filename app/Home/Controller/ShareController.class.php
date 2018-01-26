<?php
namespace Home\Controller;
use Think\Controller;
class ShareController extends Controller{
	//分享页面
	public function share(){
		Vendor('WXAPI.JSSDK');
		$jssdk = new \JSSDK("wxec9f9ed5706a50a6","ae78c7432ab05adfaccaa03986611f1b");
		$signPackage = $jssdk->GetSignPackage();
		$this->assign("signPackage",$signPackage);
		$share=M("sharetitle")->find();
    	$this->assign("share",$share);
		$this->display();
	}

	//分享成功
	public function share_success(){
		$uid=$_SESSION['userinfo']['id'];
		$data['share_time']=time();
		M("users")->where("id=$uid")->save($data);
	}
}