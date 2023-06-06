<?php
	include 'init.php';
	@$sub=$_POST['sub'];
	if($sub){
		@$username=filterstr($_POST['username']);
		@$password=filterstr(md5($_POST['password']));
		$result=$conn->query("select * from users where username = '$username'");
		if($result->num_rows > 0){
			$row=$result->fetch_assoc();
			if($row['password']==$password){				
				$_SESSION['username']=$username;
				redirect('2','main.php','登录成功');
			}else{
				echo "<script>alert('账号或密码错误')</script>";
			}
		}else{
			echo "<script>alert('登录失败')</script>";
		}
		
		}
	
	
	
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>『我姓空山』后台管理</title>
	<link rel="stylesheet" type="text/css" href="css/admin_login.css"/>
	<script>
			function check(form){
				var username=form.username.value;
				if(username.length==0){
					alert("用户名不能为空");
					form.username.focus();
					return false;
					
				}
				
				var password=form.password.value;
				if(password.length==0){
					alert("密码不能为空");
					form.password.focus();
					return false;
					
				}
				
			}
		</script>
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="login.php" method="post" onsubmit="return check(this);">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password"id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" name="sub" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    
</div>
</body>
</html>





<!--<html>
	<head>
		<meta charset="utf-8">
		<title>用户登录</title>
		<style>
			.login{
				width: 400px;
				margin: 0px auto;
			}
		</style>
		<script>
			function check(form){
				var username=form.username.value;
				if(username.length==0){
					alert("用户名不能为空");
					form.username.focus();
					return false;
					
				}
				
				var password=form.password.value;
				if(password.length==0){
					alert("密码不能为空");
					form.password.focus();
					return false;
					
				}
				
			}
		</script>
	</head>
	<body>
		<div class="login">
			<form method="post" onsubmit="return check(this)">
				<table>
				<tr><td><label for="username">用户: </label ></td><td><input type="text" name="username" id="username"/></td></tr>
				<tr><td><label for="password">密码: </label></td><td><input type="password" name="password" id="password"/></td></tr>
				<tr><td colspan="2"><input type="submit" value="登录" name="sub"/></td></tr>
				</table>
			</form>
		
		
		</div>

	</body>
</html>-->