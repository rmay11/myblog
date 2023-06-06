<?php
include "init.php";
$system_result=$conn->query('select * from config');
$arry=array();
while($row=$system_result->fetch_assoc()){
	$arry[$row['name']]=$row['value'];
}
@$sub=$_POST['sub'];
if($sub){
	$web_url=filterstr($_POST['url']);
	$web_title=filterstr($_POST['title']);
	$web_keyword=filterstr($_POST['keyword']);
	$web_descry=filterstr($_POST['descry']);
	$web_arry=array($web_url,$web_title,$web_keyword,$web_descry);
	for($i=1;$i<5;$i++){
		$value=$web_arry[$i-1];
		$conn->query("update config set value='$value' where id='$i' ");
	}
	if($conn->affected_rows){
		redirect('2','system.php','修改成功');
	}else{
		redirect('2','system.php','修改失败');
	}
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>『我姓空山』后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="article_list.php">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="login.php">退出</a></li>
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
                        <li><a href="article_list.php"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="article_list.php"><i class="icon-font">&#xe005;</i>友情链接</a></li>
                        
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
   
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>
        <div class="result-wrap">
            <form action="system.php" method="post" id="myform" name="myform">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>网站信息设置</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody><tr>
                                <th width="15%"><i class="require-red">*</i>域名：</th>
                                <td><input type="text" id="" value="<?php echo $arry['website_url']; ?>" size="85" name="url" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>站点标题：</th>
                                    <td><input type="text" id="" value="<?php echo $arry['website_title']; ?>" size="85" name="title" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>关键字：</th>
                                    <td><input type="text" id="" value="<?php echo $arry['website_keyword']; ?>" size="85" name="keyword" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>描述：</th>
                                    <td><input type="text" id="" value="<?php echo $arry['website_descry']; ?>" size="85" name="descry" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10" name="sub">
                                        <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                </div>                
            </form>
        </div>
    </div>

</div>
</body>
</html>
