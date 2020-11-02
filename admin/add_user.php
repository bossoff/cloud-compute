<?php
session_start();
require_once("../inc_file/network.php");
$P=5;
$Q=7;
$key=$P+$Q;

$sname=strtoupper($_POST['surname']);
$oname=strtoupper($_POST['othername']);

$A[0]=$_POST['surname'];
$A[1]=$_POST['othername'];
$A[2]=$_POST['phone_no'];
$pno=$_POST['phone_no'];

$surname = mysql_real_escape_string($A[0]);
$othername = mysql_real_escape_string($A[1]);
$phone_no = mysql_real_escape_string($A[2]);

$otp=(int)rand()*999;

$str=mysql_query("SELECT * FROM passcodes WHERE Phone_No='$phone_no' AND Status='ACTIVE'");
$row=mysql_fetch_assoc($str);
	if($phone_no==$row['Phone_No'] && $row['Status']=="ACTIVE")
	{
		$_SESSION['msg']="<font color='#FF0000'>You have already generate passcode for this phone no</font>";
		header("Location:index.php");
		exit;
	}
	else{
		$sql = mysql_query("INSERT INTO cust_profile (Surname, Othername, Phone_No) VALUES ('$surname','$othername','$phone_no')");
		$sql = mysql_query("INSERT INTO passcodes (Phone_No, Passcode, Status) VALUES ('$phone_no','$otp','ACTIVE')");
		SMS($pno, $otp, $sname, $oname);
		$_SESSION['msg']="<font color='#009900'>You have generated a passcode successfully</font>";
		header("Location:index.php");
	}


function SMS($phone, $otp_code, $sname, $oname)
{
	//sms API goes here

	$str="DEAR ". $sname. " ". $oname. ",  enter this code: ". $otp_code ." to complete your registration.";

	$message=$str;
//	$phone = "08162609437";
	$sender="CCL Cloud"; /* sender id */

echo $pno;

	/* create the required URL */
$smsclone_user = "shynne326";
                        $smsclone_password = "system2";
                        $sender = "Kwara Poly";
                        $sdate = date("Y-m-d");
                        $username = "shynne326";
                        $password = "system2";

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