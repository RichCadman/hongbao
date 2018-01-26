<?php
namespace Home\Controller;
class WithdrawController extends BaseController{
	//提现页面
	public function tixian(){
		$jine=$_POST['jine'];
		$uid=$_SESSION['userinfo']['id'];
		$info=M("users")->where("id=$uid")->find();
		if($jine > $info['money']){
			echo "<script type='text/javascript'>alert('金额超出余额');window.history.go(-1);</script>";
		}else{
			//扣除金额
			$da['money']=$info['money']-$jine;
			$res=M("users")->where("id=$uid")->save($da);
			if($res){
				//添加红包记录
				$data['userid']=$uid;
				$data['jine']=$jine;
				$data['time']=time();
				$data['types']="红包提现";
				$data['username']=$_SESSION['userinfo']['wx_name'];
				M("detail")->add($data);
				echo "<script type='text/javascript'>alert('提现成功,联系客服');window.location='/hongbao/index.php/Index/index';</script>";
			}
		}
	}
}