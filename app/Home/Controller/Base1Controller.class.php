<?php
namespace Home\Controller;
use Think\Controller;
class Base1Controller extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['userinfo'])){

            echo "<script type='text/javascript'>window.location=\"/hongbao/index.php/Login1/login\";</script>";
    		
    	}
    	$share=M("sharetitle")->find();
    	$this->assign("share",$share);
    }
}