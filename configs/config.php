<?php
	header("content-type:text/html;charset=utf-8");
	session_start();
	$server="localhost";
	$username="root";
	$password="123456";
	$dbname="myblog";
	@$conn=new mysqli($server,$username,$password,$dbname);
	if($conn->connect_error){
		echo "connect is fail !"."</br>";	
	}
	$conn->query("set names utf8");
?>