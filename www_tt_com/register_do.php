<?php

if($_POST['uname'] == '' || $_POST['upwd'] == '' || $_POST['aupwd'] == '' || $_POST['uiph'] == ''){
	die("<script>alert('请输入完整用户信息');location.href='register.html'</script>");
}

if($_POST['upwd'] != $_POST['aupwd']){
	die("<script>alert('两次密码不一致，请重新输入');location.href='register.html'</script>");
}

$link = mysqli_connect('127.0.0.1','root','root','www_tt_com');

$sel = "select uname from user where uname='".$_POST['uname']."'";

$sql = mysqli_query($link,$sel);
$data = mysqli_fetch_all($sql,1);

if(!$data){
	$in = "insert into user values(null,'".$_POST['uname']."','".$_POST['upwd']."',".$_POST['uiph'].",'".$_SERVER['REMOTE_ADDR']."',".time().")";

	$sql = mysqli_query($link,$in);
	if(!$sql){
		die("<script>alert('注册失败');location.href='register.html'</script>");
	}
	die("<script>alert('注册成功');location.href='index.html'</script>");
}else{
	die("<script>alert('用户名已占用');location.href='register.html'</script>");
}