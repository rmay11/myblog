<?php
include "./init.php";
include "../commen/Page.class.php";

@$action=$_GET['action'];
$page=isset($_GET['page'])? $_GET['page']:1;
$subPages=8;
$start =($page-1)*$subPages;
if($action=='del'){
	$id=$_GET['id'];
	$conn->query("delete from cate where id='$id'");
	if($conn->affected_rows>0){
        redirect('2','article_list.php','删除成功');
        
    }else{
        redirect('2','article_list.php','删除失败');
        
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
                <li><a class="on" href="article_list.php">首页</a></li>
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
                        <a href="article_add.php"><i class="icon-font"></i>新增作品</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>                            
                            <th>ID</th>
                            <th>标题</th>               
                            <th>点击</th>
                            <th>发布人</th>
                            <th>分类</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        
                        	<?php
                        	$article_result=$conn->query("select * from article");
                        	$num=$article_result->num_rows;
                        	$article_result_2=$conn->query("select * from article limit $start,$subPages ");
                        	while($row=$article_result_2->fetch_assoc()){
                        	
                        	?>
                        	<tr>
                        	<td><?php echo $row['id']; ?></td>
                        	<td title="<?php echo $row['title'];?>"><a target="_blank" href="article_edit.php?id=<?php echo $row['id'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a>
                        	<td><?php echo $row['number']; ?></td>
                        	<td><?php echo $row['author'];  ?></td>
                        	<td>
                        	<?php
                        		$t_id_1=$row['catid'];
                        		$result_11=$conn->query("select * from cate where id='$t_id_1'");                       		
                        		$row_4=$result_11->fetch_assoc();
                        		echo $row_4['class_name'];
                        	?>
                        	</td>
                        	<td><?php echo @date("Y-m-d H:i:s",$row['c_time']);  ?></td>
                        	
                        	<td>
                                <a class="link-update" href="article_edit.php?id=<?php echo $row['id'];?>">修改</a>
                                <a class="link-del" href="javascript:del(<?php echo $row['id'];?>);">删除</a>
                            </td>
                            </tr>
                        	<?php	                        		
                        	}
                        	?>
                                         
                    </table>
                    <div class="list-page"> 
                    <?php
                    $p=new Page($num,4,$page,$subPages);
                    echo $p->showPages(1);
                    ?>
                    
                    </div>
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