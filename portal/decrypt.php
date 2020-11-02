<?php
session_start();
include("../inc_file/network.php");
$passcode=$_POST['passcode'];
$username=$_SESSION['user'];

$P=5;
$Q=7;
$key=$P+$Q;

$str=mysql_query("SELECT * FROM recent_otp WHERE Username='$username' And Status='ACTIVE'");
$rw=mysql_fetch_assoc($str);
	if($username==$rw['Username'] && $rw['Status']=="ACTIVE")
	{
		echo $rw['OTP_Code'];
		exit;
	}
	else
	{
		$sql=mysql_query("INSERT INTO recent_otp (Username, OTP_Code, Status) VALUES ('$username','$passcode','ACTIVE')");
		
		$sql=mysql_query("SELECT * FROM cust_profile WHERE Username='$username'");
		$row=mysql_fetch_assoc($sql);
		$phone_no=$row['Phone_No'];
				
				//	$result2="";
				//	$length=strlen($phone_no);
				//	for($i=0; $i<$length; $i++)
				//	{
				//		$asc=ord(substr($phone_no,$i,1));
				//		$dec=$asc-$key;
				//		$ret=chr($dec);
				//		$result2=$result2 . $ret;
				//	}
				//$phone_no=$result2;
				
				SMS($phone_no, $passcode);
				
				echo $passcode;
	}

function SMS($phone, $otp_code)
{
	//sms API goes here

	$str="You're about to read your cloud information, enter this code to verify: ". $otp_code;

	$message=$str;
	
	$sender="CCL Cloud"; /* sender id */
	
	/* create the required URL */
	
	$url = @"http://www.smsclone.com/components/com_spc/smsapi.php?username=samprog&password=victory&sender=" . UrlEncode($sender) . "&recipient=" . UrlEncode($phone) . "&message=" . UrlEncode($message) . "";
	
	/* call the URL */
	
	//echo $url;
	
	if ($f = @fopen($url, "r")){
	
		$answer = fgets($f, 255);
	
		if (substr($answer, 0, 1) == "+"){
	
			//echo "SMS to $dnr was successful.";
	
		}
	
		else{
	
			//echo "an error has occurred: [$answer].";
	
		}
	
	}
	
	else{
	
		//echo "Error: URL could not be opened.";
	
	  }
	
	//sms API goes here	
}
?>