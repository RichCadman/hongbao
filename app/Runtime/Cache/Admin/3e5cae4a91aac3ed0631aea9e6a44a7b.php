<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/pub/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/pub/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/pub/admin/css/matrix-style.css" />
<link rel="stylesheet" href="/pub/admin/css/matrix-media.css" />
<link href="/pub/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">


    <!-- <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎&nbsp; &nbsp;<?php echo ($_SESSION['admin']['admin']); ?></span><b class="caret"></b></a>
     <ul class="dropdown-menu">
       <li><a href="/admin.php/Person/add"><i class="icon-user"></i>添加账号</a></li>
       <li class="divider"></li>
       <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
       <li class="divider"></li>
       <li><a href="/admin.php/Login/index.html"><i class="icon-key"></i> 退出</a></li>
     </ul>
    </li> -->


   <!--  <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">信息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
     <ul class="dropdown-menu">
       <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
       <li class="divider"></li>
       <li><a class="sInbox" title="" href="/admin.php/Company/message.html"><i class="icon-envelope"></i> 查看留言</a></li>
       <li class="divider"></li>
       <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
       <li class="divider"></li>
       <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
     </ul>
   </li> -->


    <!-- <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li> -->
    <li class=""><a title="" href="/admin.php/Login/index.html"><i class="icon icon-share-alt"></i> <span class="text"><!-- 退出 --></span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch--> 
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i>菜单栏</a>
  <ul>
    <li> <a href="/admin.php/Index/index.html"><i class="icon icon-home"></i> <span>学员信息</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>题目管理</span> <span class="label label-important"></span></a>
      <ul>
       <li><a href="/admin.php/Problem/index.html">题目总览</a></li>
        <li><a href="/admin.php/Problem/add.html">添加题目</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>分享管理</span> <span class="label label-important"></span></a>
      <ul>
       <li><a href="/admin.php/Share/index.html">修改分享内容</a></li>
        <li><a href="/admin.php/Share/add.html">添加分享</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-pencil"></i> <span>用户管理</span> <span class="label label-important"></span></a>
      <ul>
       <li><a href="/admin.php/Person/index.html">用户总览</a></li>
        <li><a href="/admin.php/Person/add.html">添加用户</a></li>
        
      </ul>
    </li>
    <!--<li class="submenu"> <a href="#"><i class="icon icon-home"></i> <span>首页</span> <span class="label label-important"></span></a>
      <ul>
       <li><a href="/admin.php/Indexs/banner.html">页面顶端图片</a></li>
        <li><a href="/admin.php/Indexs/add_banner.html">上传页面顶端图片</a></li>
        
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>产品中心</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="/admin.php/Indexs/xilie.html">产品中心各系列图片</a></li>
       <li><a href="/admin.php/Indexs/add_xilie.html">上传产品中心各系列图片</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-pencil"></i> <span>解决方案</span> <span class="label label-important"></span></a>
      <ul>
       <li><a href="/admin.php/Fangan/fangan.html">解决方案</a></li>
       <li><a href="/admin.php/Fangan/add_fangan.html">添加解决方案</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th"></i> <span>美鸣贴面</span> <span class="label label-important"></span></a>
      <ul>
       <li><a href="/admin.php/Mmtm/img.html">产品体验图片</a></li>
       <li><a href="/admin.php/Mmtm/add_img.html">添加产品体验图片</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-fullscreen"></i> <span>客户专区</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="/admin.php/Khzq/video.html">客户专区视频</a></li>
       <li><a href="/admin.php/Khzq/add_video.html">上传视频</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>新闻中心</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="/admin.php/News/news.html">新闻</a></li>
       <li><a href="/admin.php/News/add_news.html">添加新闻</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-tint"></i> <span>企业信息</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="/admin.php/Company/company.html">分公司</a></li>
       <li><a href="/admin.php/Company/add_company.html">添加分公司</a></li>
       <li><a href="/admin.php/Company/network.html">美鸣全国网络</a></li>
        <li><a href="/admin.php/Company/add_network.html">添加美鸣全国网络</a></li>
        <li><a href="/admin.php/Company/qita.html">其他分类</a></li>
        <li><a href="/admin.php/Company/add_qita.html">添加其他分类</a></li>
      </ul>
    </li>
    <li> <a href="/admin.php/Company/message.html"><i class="icon icon-inbox"></i> <span>查看留言</span></a> </li>
    <li> <a href="/admin.php/Company/phone.html"><i class="icon icon-inbox"></i> <span>联系电话</span></a> </li>
    <li> <a href="/admin.php/Company/fenx.html"><i class="icon icon-inbox"></i> <span>分享内容</span></a> </li>-->
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#">修改用户</a> </div>
    <h1>修改用户</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5></h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" action="/admin.php/Person/mod_do/id/<?php echo ($person["id"]); ?>" method="post">
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">用户名</label>
                  <div class="controls">
                    <input id="username" type="text" name="username" value="<?php echo ($person["admin"]); ?>" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">密码</label>
                  <div class="controls">
                    <input id="password" type="password" name="password" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">重复密码</label>
                  <div class="controls">
                    <input id="password2" type="password" name="password2" />
                  </div>
                </div>
              </div>
    
              <div class="form-actions">
             
                <button type="submit" class="btn btn-success">修改</button>

              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>
</div> -->
<!--end-Footer-part-->
<script src="/pub/admin/js/jquery.min.js"></script> 
<script src="/pub/admin/js/jquery.ui.custom.js"></script> 
<script src="/pub/admin/js/bootstrap.min.js"></script> 
<script src="/pub/admin/js/jquery.validate.js"></script> 
<script src="/pub/admin/js/jquery.wizard.js"></script> 
<script src="/pub/admin/js/matrix.js"></script> 
<script src="/pub/admin/js/matrix.wizard.js"></script>
</body>
</html>