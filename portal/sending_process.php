<?php
session_start();
include("../inc_file/network.php");
$P=5;
$Q=7;
$key=$P+$Q;
$A[0]=$_POST['sdata'];
$A[1]=strtolower($_POST['receiver']);
$username=$_SESSION['user'];
$A[2]=date('d-m-Y');

//for($j=0;$j<=2;$j++)
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

$sdata=mysql_real_escape_string($A[0]);
$receiver=mysql_real_escape_string($A[1]);
$sdate=mysql_real_escape_string($A[2]);

$check=mysql_query("SELECT * FROM cust_profile WHERE Username='$receiver'");
$rcheck=mysql_fetch_assoc($check);
	if($username==$receiver)
	{
		$_SESSION['msg']="<font color='#F00'>You cannot send information to yourself!!!</font>";
		$_SESSION['data']=$sdata;
		header("Location:send_data.php");
	}
	else if($receiver==$rcheck['Username'])
	{		
		$sql=mysql_query("INSERT INTO send_file (Sender, Receiver, Message, sDate) VALUES ('$username','$receiver','$sdata','$sdate')");
		$_SESSION['msg']="<font color='#0C0'>Your information sent successfully!!!</font>";
		header("Location:send_data.php");
	}
	else
	{
		$_SESSION['msg']="<font color='#F00'>recipient you are sending to does not exist on this network!!!</font>";
		$_SESSION['data']=$sdata;
		header("Location:send_data.php");
	}
?>