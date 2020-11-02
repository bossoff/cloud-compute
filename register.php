<?php
session_start();
$P=5;
$Q=7;
$key=$P+$Q;
include("inc_file/network.php");
$A[0]=$_POST['surname'];
$A[1]=$_POST['othername'];
$A[2]=$_POST['gender'];
$A[3]=$_POST['phone_no'];
$A[4]=strtolower($_POST['username']);
$A[5]=$_POST['password'];

//for($j=0;$j<=5;$j++)
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

$surname=mysql_real_escape_string($A[0]);
$othername=mysql_real_escape_string($A[1]);
$gender=mysql_real_escape_string($A[2]);
$phone_no=mysql_real_escape_string($A[3]);
$username=mysql_real_escape_string($A[4]);
$password=mysql_real_escape_string($A[5]);

//====================================================
	$str=mysql_query("SELECT * FROM cust_profile WHERE Username='$username'");
	$row=mysql_fetch_assoc($str);
	if($username==$row['Username'])
	{
		$_SESSION['msg']="Username not available try another!!!";
		header("Location:create_account.php");		
		exit;	
	}
//====================================================

$sql=mysql_query("UPDATE cust_profile SET Gender='$gender', Username='$username', Password='$password' WHERE Phone_No='$phone_no'");
$sql=mysql_query("UPDATE passcodes SET Status='USED' WHERE Phone_No='$phone_no'");
$_SESSION['msg']="Account created successfully!!!";
header("Location:create_account.php");
?>
