<?php
session_start();
include("../inc_file/network.php");
$P=5;
$Q=7;
$key=$P+$Q;
$A[0]=$_POST['sdata'];
$username=$_SESSION['user'];
$A[1]=date('d-m-Y');

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

$sdata=mysql_real_escape_string($A[0]);
$username=$_SESSION['user'];
$sdate=mysql_real_escape_string($A[1]);

$sql=mysql_query("INSERT INTO draft (Username, Message, sDate) VALUES ('$username','$sdata','$sdate')");
$_SESSION['msg']="Your information saved successfully!!!";
header("Location:keep_data.php");
?>