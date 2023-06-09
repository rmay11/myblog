<?php
include "./init.php";

@$sub=$_POST['sub'];
if($sub){
	$title=filterstr($_POST['title']);
	$author=filterstr($_POST['author']);
	$content=filterstr($_POST['content']);
	$keyword=filterstr($_POST['keyword']);
	$catid=$_POST['colId'];
	$c_time=time();
	$conn->query("insert into article (title,author,content,keyword,catid,c_time) values('$title','$author','$content','$keyword','$catid','$c_time')");
	if($conn->affected_rows){
		redirect('2','article_add.php','发布成功');
		
	}else{
		redirect('2','article_add.php','发布失败');
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
            <h1 class="topbar-logo none"><a href="main.php" class="navbar-brand">后台管理</a></h1>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form  method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <?php
                                    $cate_result=$conn->query("select * from cate ");
                                    while($row=$cate_result->fetch_assoc()){
                                    ?>	
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['class_name']; ?> </option>                                   
                                    <?php
                                    }                                                      		
                                    ?>                                   
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>作者：</th>
                                <td><input class="common-text" name="author" size="50" value="admin" type="text"></td>
                            </tr>
                            <tr>
                                <th>关键字</th>
                                <td><input class="common-text" name="keyword" size="50"  type="text" placeholder="输入关键字以空格或逗号隔开"></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" id="EditorId" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit" name='sub'/>
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button"/>
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" charset="utf-8">//初始化编辑器
    window.UEDITOR_HOME_URL = "ueditor/";//配置路径设定为UEditor所放的位置
    window.onload=function(){
        /* window.UEDITOR_CONFIG.initialFrameHeight=600;//编辑器的高度*/
        /* window.UEDITOR_CONFIG.initialFrameWidth=1200;//编辑器的宽度*/
        var editor = new UE.ui.Editor({
            imageUrl : '',
            fileUrl : '',
            imagePath : '',
            filePath : '',
            imageManagerUrl:'', //图片在线管理的处理地址
            imageManagerPath:''
        });
        editor.render("EditorId");//此处的EditorId与<textarea name="content" id="EditorId">的id值对应 </textarea>
    }
</script>
</body>

</html>