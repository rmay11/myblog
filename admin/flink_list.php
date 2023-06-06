<?php
include "./init.php";
include "../commen/Page.class.php";

@$action=$_GET['action'];
if($action=='del'){
	$id=$_GET['id'];
	$conn->query("delete from flink where id='$id'");
	if($conn->affected_rows>0){
        redirect('2','flink_list.php','删除成功');
        
    }else{
        redirect('2','flink_list.php','删除失败');
        
    }
	
	
}


?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="flink_list.php">首页</a></li>
                <li><a href="main.php" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="login.php" onclick="<?php session_unset(); ?>">退出</a></li>
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
                        <li><a href="flink_list.php"><i class="icon-font">&#xe005;</i>友情链接</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>       
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="flink_add.php"><i class="icon-font"></i>新增友链</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>                            
                            <th>ID</th>
                            <th>网站名称</th>
                            <th>url</th>               
                            <th>操作</th>
                        </tr>
                        <?php 
                        	$cate_result=$conn->query("select * from flink");
                        	while($cate_row=$cate_result->fetch_assoc()){
                        		
                        	
                        	?>                                                	
                        <tr>
                        	
                        	<td><?php echo $cate_row['id'];?></td>
                        	<td><?php echo $cate_row['url_name'];?></td>
                        	<td><?php echo $cate_row['url'];?></td>
                        	                      	
                        <td>
                                <a class="link-update" href="flink_edit.php?id=<?php echo $cate_row['id'];?>">修改</a>
                                <a class="link-del" href="javascript:del(<?php echo $cate_row['id'];?>);">删除</a>
                        </td>
                        </tr>
                        <?php
                        	}
                        	?>                      	         
                    </table>
                    
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
<script>
	function del(id){
		if(false==confirm("是否确定删除当前记录？")) return;
		location.href='?action=del&id='+id;
	}
</script>
</body>
</html>
	
