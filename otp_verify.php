<?php
session_start();
include("inc_file/network.php");
$P=5;
$Q=7;
$key=$P+$Q;

$otp=$_POST['otp'];
$username=$_SESSION['user'];
$password=$_SESSION['pass'];

$sql=mysql_query("SELECT * FROM recent_otp WHERE Username='$username' AND OTP_Code='$otp' AND Status='ACTIVE'");
$row=mysql_fetch_assoc($sql);
	if($username==$row['Username'] && $otp==$row['OTP_Code'] && $row['Status']=="ACTIVE")
	{
		$str=mysql_query("UPDATE recent_otp SET Status='EXPIRED' WHERE Username='$username'");
		unset($_SESSION['logv']);
		$_SESSION['log']="YES";
		header("Location:portal/");
	}
	else
	{
		$_SESSION['msg']="Invalid OTP code, check and try again!!!";
		header("Location:otp.php");
	}
?>