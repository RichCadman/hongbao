<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="renderer" content="webkit">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="/hongbao/pub/home/css/base-v1.3.css">
    <link rel="stylesheet" type="text/css" href="/hongbao/pub/home/css/style.css">
    <script type="text/javascript" src="/hongbao/pub/home/js/jquery-1.12.4.min.js"></script>
    <style type="text/css">
        #an{
           background: -webkit-linear-gradient(top,#909090 ,#909090); 
        }
    </style>
    <title>红包页面</title>
</head>
<body class="index">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="/hongbao/pub/home/js/jquery-3.1.1.js"></script>
	<script type="text/javascript">
	
  wx.config({
    debug: false,//调试模式 
    appId: "<?php echo ($signPackage["appId"]); ?>",
    timestamp: "<?php echo ($signPackage["timestamp"]); ?>",//生成签名的时间戳 
    nonceStr: "<?php echo ($signPackage["nonceStr"]); ?>",//生成签名的随机串
    signature: "<?php echo ($signPackage["signature"]); ?>",
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareTimeline',//分享给朋友圈
      'onMenuShareAppMessage',//分享给朋友
      'chooseImage',//拍照或从手机相册中选图接口
      'uploadImage',//上传图片接口
      "previewImage",//预览图片接口
      "downloadImage"//下载图片接口
      
    ]
  });
  wx.ready(function () {
      //分享到朋友圈  
    wx.onMenuShareTimeline({ 
        title: '<?php echo ($share["title"]); ?>',   
        //desc: '每日一题',  
          
        link: 'http://www.dingzankj.com/hongbao/index.php/Share/share', // 分享链接   
        imgUrl: 'http://www.dingzankj.com/hongbao/share.png', // 分享图标   
        success: function() {   
            // 用户确认分享后执行的回调函数 
            //alert("分享成功");
            $('.mask,.index,#share_ss').addClass('act');
			$.post("/hongbao/index.php/Share/share_success",function(){
				
			})
            //处理逻辑增加积分  
        },   
        cancel: function() {   
            // 用户取消分享后执行的回调函数   
             //alert("分享失败");
        }   
    }); 
    // 在这里调用 API
      //分享给朋友  
    wx.onMenuShareAppMessage({ 
  //alert(5);
        title: '<?php echo ($share["title"]); ?>',   
        //desc: '',  
          
        link: 'http://www.dingzankj.com/hongbao/index.php/Share/share', // 分享链接   
        imgUrl: 'http://www.dingzankj.com/hongbao/share.png', // 分享图标   
        success: function() {   
            // 用户确认分享后执行的回调函数 
            //alert("分享成功");  
            $('.mask,.index,#share_ss').addClass('act');
			$.post("/hongbao/index.php/Share/share_success",function(){
				
			})
        },   
        cancel: function() {   
            // 用户取消分享后执行的回调函数   
            //alert("分享失败");
        }   
    }); 
  });
</script>

    <section class="mask tra0_3"></section>
        <!-- 关注 -->
    <section class="popmodal t50 tra0_3" id="follow">
        <div class="scroll c_w">
            <img src="/hongbao/pub/home/img/erweima.png">
            <p>更多跟进信息，请关注我们的公众号</p>
        </div>
        <button class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    <!-- 意向客户 -->
    <section class="popmodal t50 tra0_3" id="customer">
        <div class="scroll">
            <div class="ultitle clearfix">
                <div class="fl">我的意向客户</div>
                <div class="fr">状态</div>
            </div>
            <ul id="jilu2">
               <!-- <li class="clearfix">
                    <div class="fl">张三</div>
                    <div class="fr">状态</div>
                </li>
                <li class="clearfix">
                    <div class="fl">张三</div>
                    <div class="fr">状态</div>
                </li>-->
            </ul>
            <div class="bottom clearfix">
                <div class="fl">
                    我的返利金额
                    <span id="fanli"></span>元
                </div>
                <div class="fr">
                    <input type="button" name="" id="ling" value="领取">
                </div>
                <script type="text/javascript">
                    $(function(){
                        $("#ling").click(function(){
                            var fl_jine=$("#fanli").text();
                            if(fl_jine==0){
                                //alert("无金额可领");
                                $('.mask,.index,#wjekl').addClass('act');
                            }else{
                                $.post("/hongbao/index.php/Index/ling",function(data){
                                    if(data==0){
                                        alert("服务繁忙,稍后再试");
                                    }else{
                                        //alert("领取成功");
                                        $('.mask,.index,#lqcg').addClass('act');
                                        //window.location="/hongbao/index.php/Index/index";
                                    }
                                })
                            }
                        })
                    })
                </script>
            </div>
        </div>
        <button class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    <!-- 抢红包 -->
    <section class="popmodal t50 tra0_3" id="snatch">
        <div class="scroll">
            <img src="/hongbao/pub/home/img/rp2.png">
            <p class="ab t50">
                恭喜获得
                <span id="hb_jine">0.8</span>
                元
            </p>
        </div>
        <button id="guanbi" class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>

    <!-- 已领弹框 -->
    <section class="popmodal t50 tra0_3" id="yling">
        <div class="scroll">
            <p class="ab t50">
                今日已领过,明日分享可继续领取!
            </p>
        </div>
        <button id="guanbi" class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    
    <!-- 无金额可领弹框 -->
    <section class="popmodal t50 tra0_3" id="wjekl">
        <div class="scroll">
            <p class="ab t50">
                无金额可领!
            </p>
        </div>
        <button id="guanbi" class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>

    <!-- 领取成功弹框 -->
    <section class="popmodal t50 tra0_3" id="lqcg">
        <div class="scroll">
            <p class="ab t50">
                领取成功!
            </p>
        </div>
        <button id="guanbi" class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>

    <!-- 分享成功弹框 -->
    <section class="popmodal t50 tra0_3" id="share_ss">
        <div class="scroll">
            <p class="ab t50">
                分享成功!
            </p>
        </div>
        <button id="guanbi" class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    <!-- 分享抢红包 -->
    <section class="popmodal t50 tra0_3" id="sharetips">
            <img src="/hongbao/pub/home/img/sharetips.png">
        <button class="close">知道了</button>
    </section>
    <!-- 我的红包 -->
    <section class="popmodal t50 tra0_3" id="myrp">
        <div class="scroll">
            <div class="top tac c_w">
                我的红包: <span id="my_rp"></span> 元
            </div>
            <p>红包记录</p>
            <ul id="jilu">
                <!--<li class="clearfix">
                    <div class="ib left">
                        <div class="type">分享红包</div>
                        <div class="time">2017-10-10 19:20:20</div>
                    </div>
                    <div class="ib right">0.8元</div>
                </li>-->
            
            </ul>
            
            <?php if($money > '19.99'): ?><input type="submit" name="" value="提现" data-target="cash">
            <?php else: ?>
            <input type='submit' id='an' value='满20元可提现' disabled><?php endif; ?>

           
        </div>
        <button class="close tx50">
            <img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    <!-- 提现 -->
    <section class="popmodal t50 tra0_3" id="cash">
        <div class="scroll">
            <form action="/hongbao/index.php/Withdraw/tixian" onsubmit="return tixian()" method="post">
                <div class="top tac c_w">
                    红包余额：
                    <span id="my_money"></span>
                </div>
                <div class="group">
                    <label>提现金额：</label>
                    <input type="number" name="jine" id="tx_jine">
                    <span class="ty50">元</span>
                </div>
                <input type="submit" name="" value="确定">
            </form>
            <script type="text/javascript">
                //提现
                function tixian(){
                    var tx_jine=$("#tx_jine").val();
                    if(tx_jine<=0){
                        alert("请输入正确的金额");
                        return false;
                    }
                }
            </script>
        </div>
        <button class="close tx50"><img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    <!-- 意见提交 -->
    <section class="popmodal t50 tra0_3" id="advice">
        <div class="scroll">
            <p class="c_w">若您有意向客户可通过本页面进行提交，我们将根据意向客户的跟进状态，对您进行相应的奖励</p>
            <form action="/hongbao/index.php/Index/submit" method="post" onsubmit="return sub();">
                <div class="group">
                    <label>姓名：</label>
                    <input type="text" name="names" id="name"></div>
                <div class="group">
                    <label>电话：</label>
                    <input type="text" name="tel" id="tel"></div>
                <div class="group">
                    <label>意向服务：</label>
                    <input type="text" name="content" id="content"></div>
                <input type="submit" name="" value="提交">
            </form>
        </div>
        
        <script type="text/javascript">
            function sub(){
                var name=$("#name").val();
                var tel=$("#tel").val();
                var content=$("#content").val();
                if(name==""){
                    $("#name").focus();
                    return false;
                }else if(!(/^1[34578]\d{9}$/.test(tel))){
                    alert("格式错误");
                    return false;
                }else if(content==""){
                    $("#content").focus();
                    return false;
                }
            }
        </script>
        <button class="close tx50"><img src="/hongbao/pub/home/img/close.png"></button>
    </section>
    <div class="bg">
        <!-- 关注我们 -->
        <button class="ab follow" data-target="follow">
            <img src="/hongbao/pub/home/img/follow.png"></button>
        <!-- 抢红包 按钮-->
        <button class="ab snatch tx50" id="qiang" data-target="snatch">
            <img src="/hongbao/pub/home/img/qiang.png"></button>
        <!-- 我的红包 -->
        <button class="ab myrp" data-target="myrp">
            <img src="/hongbao/pub/home/img/rp.png"></button>
        <!-- 意见提交 -->   
        <button class="ab advice" data-target="advice">
            <img src="/hongbao/pub/home/img/advice.png"></button>
        <!-- 意向客户 -->
        <button class="ab customer" data-target="customer">
            <img src="/hongbao/pub/home/img/customer.png"></button>
        <img src="/hongbao/pub/home/img/bg.png">
        <p>本活动最终解释权归济南鼎赞网络科技有限公司所有</p>
    </div>

    
    
    <script type="text/javascript">
        $(function() {
            
            $('.mask,.close').click(function() {
                $('.mask,.index,.popmodal').removeClass('act');
            });
            //单独关闭控制
            $('#guanbi').click(function() {
                $('.mask,.index,.popmodal').removeClass('act');
                window.location="/hongbao/index.php/Index/index";
            });
            $('[data-target]').click(function() {
                var dt = $(this).data('target');
                 if (dt == 'follow') {
                    $('.mask,.index,#follow').addClass('act');
                }
                //抢红包
                if (dt == 'snatch') {
                    $.getJSON("/hongbao/index.php/Index/grab",function(json){
                        if(json==0){
                            $('.mask,.index,#yling').addClass('act');
                        }else if(json==1){
                            //alert("分享抢红包");
                            $("#sharetips,.mask").addClass('act');
                        }else{
                            hb_jine=json.hb_jine;
                            $("#hb_jine").empty();
                            $("#hb_jine").text(hb_jine);
                            $('#' + dt + ',.mask,.index').addClass('act');
                        }
                    })
                }else if(dt == 'cash'){
                    //提现之我的余额
                    $.getJSON("/hongbao/index.php/Index/my_money",function(json){
                        $("#my_money").empty();
                        $("#my_money").text(json.money);
                    })
                    $('#myrp').removeClass('act');
                    $('#' + dt + ',.mask,.index').addClass('act');
                }else if(dt == 'myrp'){
                    //我的红包
                    $.getJSON("/hongbao/index.php/Index/my_rp",function(json){
                        $("#my_rp").empty();
                        $("#my_rp").text(json.money);
                    })
                    
                    
                    var result = "";
                    $.getJSON("/hongbao/index.php/Index/my_rpjl",function(json){
                        //alert(json);
                        $.each(json,function(i,n){
                            result+="<li class='clearfix'>"+
                                       " <div class='ib left'>"+
                                            "<div class='type'>"+n.types+"</div>"+
                                            "<div class='time'>"+n.datetime+"</div>"+
                                        "</div>"+
                                        "<div class='ib right'>"+n.jine+"元</div>"+
                                    "</li>";
                        })
                        $("#jilu").empty();
                        $("#jilu").append(result);

                        /*$.getJSON("/hongbao/index.php/Index/my_rp",function(json){
                            var money=json.money;
                            //alert(money);
                            if(money<20){
                                //alert("啦啦啦");
                                $("#money").empty();
                                var input="";
                                input="<input type='submit' id='an' value='满20元可提现' disabled>";
                                $("#money").append(input);
                                //$("#money").css("color","#323232")
                                $('#' + dt + ',.mask,.index').addClass('act');
                            }else{
                                $("#money").empty();
                                var input1="";
                                //<input type="submit" name="" value="提现" data-target="cash">
                                input1="<input type='submit' name='' value='提现' data-target='cash'>";
                                $("#money").append(input1);
                                $('#' + dt + ',.mask,.index').addClass('act');
                            }
                        })*/

                        $('#' + dt + ',.mask,.index').addClass('act');
                    })
                    
                }else if(dt == 'advice'){
                    //意向提交
                    $('#' + dt + ',.mask,.index').addClass('act');
                }else if(dt == 'customer'){
                     //我的返利金额
                    $.getJSON("/hongbao/index.php/Index/my_fl",function(json){
                        $("#fanli").empty();
                        $("#fanli").text(json.fl_jine);
                    })
                    //我的意向客户
                    var result1 = "";
                    $.getJSON("/hongbao/index.php/Index/my_khjl",function(json){
                        //alert(json);
                        $.each(json,function(i,n){
                            result1+="<li class='clearfix'>"+
                                        "<div class='fl'>"+n.names+"</div>"+
                                        "<div class='fr'>"+n.stage+"</div>"+
                                    "</li>";
                        })
                        $("#jilu2").empty();
                        $("#jilu2").append(result1);
                        $('#' + dt + ',.mask,.index').addClass('act');
                    })
                }
                
            });
        });
    </script>
</body>
</html>