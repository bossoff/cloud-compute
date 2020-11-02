<?php
session_start();
include("../inc_file/network.php");
$A[0]=strtolower($_POST['username']);
$A[1]=$_POST['password'];

$username=$A[0];
$password=$A[1];

$sql=mysql_query("SELECT * FROM admin_pass WHERE Username='$username' AND Password='$password'");
$row=mysql_fetch_assoc($sql);
	if($username==$row['Username'] && $password==$row['Password'])
	{	
		$_SESSION['admin']=$username;
		$_SESSION['loga']="YES";
		header("Location:../admin/");
	}
	else
	{
		$_SESSION['msg']="Invalid Username or Password!!!";
		header("Location:../admin/");
	}
	
?>