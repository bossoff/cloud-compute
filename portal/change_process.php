<?php
session_start();
include("../inc_file/network.php");
$P=5;
$Q=7;
$key=$P+$Q;
$username=$_SESSION['user'];
$A[0]=$_POST['password'];
$A[1]=$_POST['new_password'];


//for($j=0;$j<=1;$j++)
//{
//	$length=strlen($A[$j]);
//	$result="";
//	for($i=0;$i<$length;$i++)
//	{
//		$asc=ord(substr($A[$j],$i,1));
//		$enc=$asc+$key;
//		$ret=chr($enc);
//		$result=$result . $ret;
//	}
//	$A[$j]=$result;
//}


$password=$A[0];
$new_password=$A[1];

$sql=mysql_query("SELECT * FROM cust_profile WHERE Username='$username' AND Password='$password'");
$row=mysql_fetch_assoc($sql);
	if($username==$row['Username'] && $password==$row['Password'])
	{
		$str=mysql_query("UPDATE cust_profile SET Password='$new_password' WHERE Username='$username'");
		$_SESSION['msg']="<font color='#0C0'>Your Password changed successfully!!!</font>";
		header("Location:change_password.php");
	}
	else
	{
		$_SESSION['msg']="<font color='#F00'>Your Password is incorrect!!!</font>";
		header("Location:change_password.php");
	}
?>