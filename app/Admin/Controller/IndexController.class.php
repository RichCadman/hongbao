<?php
namespace Admin\Controller;
class IndexController extends BaseController {
	//客户信息
    public function kehu(){
    	$submit=M("submit a,hb_users b")->field("a.id,a.content,a.time,a.names,a.stage,b.wx_name")->where("a.gl_id=b.id")->select();
    	$this->assign("submit",$submit);
    	$this->display();
    }

    //修改客户页面
    public function mod_kh($id){
    	$info=M("submit")->where("id=$id")->find();
    	$this->assign("info",$info);
    	$this->display();
    }

    //修改客户
    public function mod_ku_do($id){
    	$data['names']=$_POST['names'];
    	$data['stage']=$_POST['stage'];
    	$res=M("submit")->where("id=$id")->save($data);
    	if($res){
    		echo "<script type='text/javascript'>alert('修改成功');window.location='/admin.php/Index/kehu.html';</script>";
    	}else{
    		echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
    	}

    }

    //删除客户
    public function del_kh($id){
    	$res=M("submit")->where("id=$id")->delete();
    	if($res){
    		echo "<script type='text/javascript'>alert('删除成功');window.location='/admin.php/Index/kehu.html';</script>";
    	}else{
    		echo "<script type='text/javascript'>alert('删除失败');window.history.go(-1);</script>";
    	}
    }
   //推荐人信息
    public function tuijian(){
    	$tuijian=M("users")->select();

    	$this->assign("tuijian",$tuijian);
    	$this->display();
    }

    //修改推荐人页面 
    public function mod_tj($id){
    	$info=M("users")->where("id=$id")->find();
    	$this->assign("info",$info);
    	$this->display();
    }
	 //修改推荐人页
    public function mod_tj_do($id){
    	$data['wx_name']=$_POST['wx_name'];
    	$data['money']=$_POST['money'];
    	$data['fl_jine']=$_POST['fl_jine'];
    	$res=M("users")->where("id=$id")->save($data);
    	if($res){
    		echo "<script type='text/javascript'>alert('修改成功');window.location='/admin.php/Index/tuijian.html';</script>";
    	}else{
    		echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
    	}

    }
    //删除推荐人
    public function del_tj($id){
    	$res=M("users")->where("id=$id")->delete();
    	if($res){
    		echo "<script type='text/javascript'>alert('删除成功');window.location='/admin.php/Index/tuijian.html';</script>";
    	}else{
    		echo "<script type='text/javascript'>alert('删除失败');window.history.go(-1);</script>";
    	}
    }

    //修改红包随机数
    public function hb_power(){
        $info=M("power")->find();
        $this->assign("info",$info);
        $this->display();
    }

     //修改推荐人页
    public function mod_hb_do($id){
        $data['max']=$_POST['max'];
        $data['min']=$_POST['min'];
        $res=M("power")->where("id=$id")->save($data);
        if($res){
            echo "<script type='text/javascript'>alert('修改成功');window.location='/admin.php/Index/hb_power.html';</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
        }
    }

    //红包明细
    public function hb_detail(){
        $info=M("detail")->select();
        $this->assign("info",$info);
        $this->display();
    }

    //分享标题
    public function share_title(){
        $title=M("sharetitle")->find();
        $this->assign("title",$title);
        $this->display();
    }

    //修改分享标题
    public function mod_title_do($id){
        $data['title'] = $_POST['title'];
        $res = M("sharetitle")->where("id=$id")->save($data);
        if($res){
            echo "<script type='text/javascript'>alert('修改成功');window.location='/hongbao/admin.php/Index/share_title.html';</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
        }
    }
}