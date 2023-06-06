<?php
	include "./init.php";
	if(!$_SESSION["username"]){
		header('Location:login.php');
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>欢迎来到我姓空山的博客空间！</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="main.php" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="#">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="user_edit.php">修改密码</a></li>
                <li><a href="login.php" onclick="<?php session_unset(); ?>" >退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="article_list.php"><i class="icon-font">&#xe008;</i>作品管理</a></li>

                        <li><a href="cate_list.php"><i class="icon-font">&#xe006;</i>分类管理</a></li>            
                        <li><a href="flink_list.php"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.php"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>『我姓空山』博客，记录学习。</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="article_add.php"><i class="icon-font">&#xe001;</i>新增作品</a>
                    <a href="flink_add.php"><i class="icon-font">&#xe048;</i>新增友链</a>
                    <a href="cate_add.php"><i class="icon-font">&#xe041;</i>新增分类</a>

                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info"><?php echo php_uname('s')?></span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info"><?php echo $_SERVER['SERVER_SOFTWARE']?></span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info"><?php echo  php_sapi_name()?></span>
                    </li>
                    <li>
                        <label class="res-lab">moonsec-版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info"><?php echo ini_get('upload_max_filesize')?></span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info"><?php echo @date("Y-m-d H:i:s",time());?></span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info"><?php echo $_SERVER['HTTP_HOST'];?> [ <?php echo $_SERVER['SERVER_ADDR']?>]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info"><?php echo $_SERVER['SERVER_ADDR'];?> </span>
                    </li>
                </ul>
            </div>
        </div>
      
    </div>
    <!--/main-->
</div>
</body>
</html>