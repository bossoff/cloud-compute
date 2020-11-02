<?php
include("inc_file/network.php");
$passcode=$_POST['passcode'];

$P=5;
$Q=7;
$key=$P+$Q;

$sql=mysql_query("SELECT * FROM passcodes WHERE Passcode='$passcode' AND Status='ACTIVE'");
$row=mysql_fetch_assoc($sql);
	if($passcode==$row['Passcode'] && $row['Status']=="ACTIVE")
	{
		$phone=$row['Phone_No'];
		$str=mysql_query("SELECT * FROM cust_profile WHERE Phone_No='$phone'");
		$rw=mysql_fetch_assoc($str);
		$A[0]=$rw['Surname'];
		$A[1]=$rw['Othername'];
		$A[2]=$rw['Phone_No'];
		
		//for($m=0; $m<=2; $m++)
		//{
		////==============================
		//	$result1="";
		//	$length=strlen($A[$m]);
		//	for($i=0; $i<$length; $i++)
		//	{
		//		$asc=ord(substr($A[$m],$i,1));
		//		$dec=$asc-$key;
		//		$ret=chr($dec);
		//		$result1=$result1 . $ret;
		//	}
		//	$A[$m]=$result1;
		//}
		//==============================
		echo "CORRECT==//==".$A[0]."==//==".$A[1]."==//==".$A[2]."==//==";
	}
	else
	{
		echo "WRONG==//==";
	}
?>