<?php
session_start();
include("../inc_file/network.php");
$username=$_SESSION['admin'];
$A[0]=$_POST['password'];
$A[1]=$_POST['new_password'];

$password=$A[0];
$new_password=$A[1];

$sql=mysql_query("SELECT * FROM admin_pass WHERE Username='$username' AND Password='$password'");
$row=mysql_fetch_assoc($sql);
	if($username==$row['Username'] && $password==$row['Password'])
	{
		$str=mysql_query("UPDATE admin_pass SET Password='$new_password' WHERE Username='$username'");
		$_SESSION['msg']="<font color='#0C0'>Your Password changed successfully!!!</font>";
		header("Location:change_password.php");
	}
	else
	{
		$_SESSION['msg']="<font color='#F00'>Your Password is incorrect!!!</font>";
		header("Location:change_password.php");
	}
?>