<?php
namespace Home\Controller;
class UserController extends Base1Controller {
    //
    public function index(){
        $this->display();
    }

    //
    public function fukuan(){

        $data['total_price'] = $_GET['je'];
        $data['user_id'] = $_SESSION['userinfo']['id'];
        $data['posttime'] = date("Y-m-d H:i:s",time());
        $data['order_num'] = time();
        $row = M("liushui")->add($data);
        if($row){
            echo "<script>location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxec9f9ed5706a50a6&redirect_uri=http://www.dingzankj.com/hongbao/index.php/Wxpay/pay/lx/".$row."&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect'</script>";
        }
         //echo "<script>location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx91c5af6352af0584&redirect_uri=http://www.baonakang.com/index.php/Home/Goods/pay/order_id/".$orders."&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect'</script>";


    }
}