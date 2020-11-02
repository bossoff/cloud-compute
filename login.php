<?php
session_start();
include("inc_file/network.php");
$P=5;
$Q=7;
$key=$P+$Q;

$A[0]=strtolower($_POST['username']);
$A[1]=$_POST['password'];

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

$username=mysql_real_escape_string($A[0]);
$password=mysql_real_escape_string($A[1]);

$otp=(int)rand()*999;

$sql=mysql_query("SELECT * FROM cust_profile WHERE Username='$username' AND Password='$password'");
$row=mysql_fetch_assoc($sql);
	if($username==$row['Username'] && $password==$row['Password'])
	{
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

		$str=mysql_query("INSERT INTO recent_otp (Username, OTP_Code, Status) VALUES ('$username','$otp','ACTIVE')");
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		$_SESSION['logv']="YES";
		SMS($phone_no, $otp);
		header("Location:otp.php");
	}
	else
	{
		$_SESSION['msg']="Invalid Username or Password!!!";
		header("Location:access_cloud.php");
	}

function SMS($phone, $otp_code)
{
	//sms API goes here

	$str="You're about to access your cloud account, enter this code to verify: ". $otp_code;

	$message=$str;

	$sender="CCL Cloud"; /* sender id */

	/* create the required URL */

$url = "http://www.multitexter.com/tools/geturl/Sms.php?username=esinniobiwa.quareeb@gmail.com&password=error404&sender=".urlencode($sender)."&message=" . urlencode($message) . "&recipients=" . $phone;
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