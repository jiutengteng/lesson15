<?php
if($_POST['uname'] == '' || $_POST['upwd'] == ''){
	die("<script>alert('请输入完整用户信息');location.href='login.html'</script>");
}

$link = mysqli_connect('127.0.0.1','root','root','www_tt_com');

$sel = "select * from user where uname='".$_POST['uname']."'";

$sql = mysqli_query($link,$sel);

if(!$sql){
	die("<script>alert('用户信息信息不存在,请先注册');location.href='login.html'</script>");
}

$sel = "select * from user where uname='".$_POST['uname']."' and upwd='".$_POST['upwd']."'";

$sql = mysqli_query($link,$sel);
if(!$sql){
	die("<script>alert('密码输入错误');location.href='login.html'</script>");
}