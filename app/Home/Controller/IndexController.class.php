<?php
namespace Home\Controller;
class IndexController extends BaseController {
	//红包页面
    public function index(){
		$uid=$_SESSION['userinfo']['id'];
        $info=M("users")->where("id=$uid")->find();
		$money = $info['money'];
        //echo $money;exit;
		Vendor('WXAPI.JSSDK');
		$jssdk = new \JSSDK("wxec9f9ed5706a50a6","ae78c7432ab05adfaccaa03986611f1b");
		$signPackage = $jssdk->GetSignPackage();
        //var_dump($signPackage);exit;
        $this->assign("money",$money);
		$this->assign("signPackage",$signPackage);
    	$this->display();
    }

    //抢红包
    public function grab(){
    	//当前时间戳
		$t = time();
		//今日时间戳范围
		$now_start_time = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
		$now_end_time = mktime(24,0,0,date("m",$t),date("d",$t),date("Y",$t));
    	//先判断今天的红包是否已经抢过
    	$uid=$_SESSION['userinfo']['id'];
    	$res=M("detail")->field("id")->where("userid=$uid and time between $now_start_time and $now_end_time and types='分享红包'")->find();
    	if($res){//已经抢过
    		$this->ajaxReturn(0);//提示信息
    	}else{
    		//判断今日是否分享过页面
    		$share_info = M("users")->field("share_time,share_num")->where("id=$uid")->find();
    		if($now_start_time < $share_info['share_time'] && $share_info['share_time'] < $now_end_time){//分享过
    			//从表中获取红包金额数
                /*$hb_power = M("power")->find();
                $max = $hb_power['max'];
                $min = $hb_power['min'];*/
                //设置红包随机数
    			//$hb_num = mt_rand($min,$max)/10;
                
                //根据条件变动红包金额
                $share_num = $share_info['share_num'];
                if ($share_num ==0) {
                    $hb_num = mt_rand(18,20)/10;
                } else if ($share_num == 1) {
                    $hb_num = mt_rand(16,18)/10;
                } else if ($share_num ==2) {
                    $hb_num = mt_rand(14,16)/10;
                } else if ($share_num == 3) {
                    $hb_num = mt_rand(12,14)/10;
                } else if ($shrare_num == 4) {
                    $hb_num = mt_rand(10,12)/10;
                } else if ($share_num == 5) {
                    $hb_num = mt_rand(8,10)/10;
                } else if ($share_num > 5) {
                    $hb_num = mt_rand(5,8)/10;
                }
                
    			//更改红包金额
    			$res1 = M("users")->where("id=$uid")->setInc('money',$hb_num);
    			if($res1){//更改成功
                    M("users")->where("id=$uid")->setInc('share_num');
    				//添加红包记录
    				$data['userid']=$uid;
    				$data['jine']=$hb_num;
    				$data['time']=time();
                    $data['types']="分享红包";
                    $data['username']=$_SESSION['userinfo']['wx_name'];
    				M("detail")->add($data);
    				$hb_jine['hb_jine']=$hb_num;
    				$this->ajaxReturn($hb_jine);//传递红包信息
    			}
    		}else{//没有分享
    			$this->ajaxReturn(1);//提示分享信息
    		}
    		
    	}

    }

    //我的红包
    public function my_rp(){
    	$uid=$_SESSION['userinfo']['id'];
    	$my_rp=M("users")->where("id=$uid")->find();
    	$this->ajaxReturn($my_rp);
    }

     //我的红包记录
    public function my_rpjl(){
    	$uid=$_SESSION['userinfo']['id'];
    	//获取红包记录
    	$detail=M("detail")->where("userid=$uid")->order("time desc")->select();
    	$this->ajaxReturn($detail);
    }

    //我的金额
    public function my_money(){
    	$uid=$_SESSION['userinfo']['id'];
    	$my_money=M("users")->where("id=$uid")->find();
    	$this->ajaxReturn($my_money);
    }

    //意向提交
    public function submit(){
    	$uid=$_SESSION['userinfo']['id'];
    	$data['gl_id']=$uid;
    	$data['names']=$_POST['names'];
    	$data['tel']=$_POST['tel'];
    	$data['content']=$_POST['content'];
    	$data['stage']="待跟进";
    	$data['time']=time();
    	$res=M("submit")->add($data);
    	if($res){
    		echo "<script type='text/javascript'>window.location='/hongbao/index.php/Index/index';</script>";
    	}else{
    		echo "<script type='text/javascript'>alert('服务繁忙,稍后再试');window.history.go(-1);</script>";
    	}
    }

    //我的意向客户
    public function my_khjl(){
    	$uid=$_SESSION['userinfo']['id'];
    	//获取我的意向客户
    	$submit=M("submit")->where("gl_id=$uid")->select();
    	$this->ajaxReturn($submit);
    }

     //我的返利
    public function my_fl(){
    	$uid=$_SESSION['userinfo']['id'];
    	$my_fl_jine=M("users")->where("id=$uid")->find();
    	$this->ajaxReturn($my_fl_jine);
    }

    //领取返利金额
    public function ling(){
   		$uid=$_SESSION['userinfo']['id'];
   		$info=M("users")->where("id=$uid")->find();
   		$fl_jine=$info['fl_jine'];
   		$data['fl_jine']=0;
   		$data['money']=$info['money']+$fl_jine;
   		$res=M("users")->where("id=$uid")->save($data);
   		if($res){
            //添加红包记录
            $data['userid']=$uid;
            $data['jine']=$fl_jine;
            $data['time']=time();
            $data['types']="返利红包";
            $data['username']=$_SESSION['userinfo']['wx_name'];
            M("detail")->add($data);
   			$this->ajaxReturn(1);
   		}else{
   			$this->ajaxReturn(0);
   		}
    }	
}


























