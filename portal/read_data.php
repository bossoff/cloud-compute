<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Cloud Computing</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="../css/zerogrid.css">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/responsiveslides.css" />
	<link rel="stylesheet" href="../css/searchform.css"/>	
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<link href='../images/favicon.ico' rel='icon' type='image/x-icon'/>
	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/responsiveslides.js"></script>
	<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        maxwidth: 960,
        namespace: "centered-btns"
      });
    });
  </script>
    <script>
$(document).ready(function(){
	$("#encrypt").click(function(){
	var passcode = Math.floor(Math.random()*9999999);
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'passcode='+ passcode;
	// AJAX Code To Submit Form.
	$.ajax({
	type: "POST",
	url: "decrypt.php",
	data: dataString,
	cache: false,
	success: function(result){
	var pass = prompt("Please enter the OTP code sent to your phone");
		if(pass==result)
		{
			document.getElementById('R1').style.display="none";
			document.getElementById('R2').style.display="block";
			document.getElementById('RR1').style.display="none";
			document.getElementById('RR2').style.display="block";
		}
		else
		{
			document.getElementById('msg').innerHTML="<font color='#F00'>Please Enter a valid OTP Code</font>";
		}
	}
	});
	return false;
	});
});
</script>
</head>
<body>
<!--------------Navigation--------------->
<section class="featured zerogrid">
	
		<div class="row">
			<div class="col16">
				<div class="rslides_container">
					<ul class="rslides" id="slider">
						<li><img src="../images/1.png" style="height:250px;"/></li>
						<li><img src="../images/2.png" style="height:250px;"/></li>
						<li><img src="../images/3.png" style="height:250px;"/></li>
						<li><img src="../images/4.png" style="height:250px;"/></li>
					</ul>
				</div>
			</div>
		</div>
	
</section>
<?php include('nav.php') ?>
			
<!--------------Content--------------->
<section id="content">
	<div class="zerogrid">
		<div class="row block offbottom">
			<div class="main-content col11">
			<div class="mymain2">
			<h3 align="center">Read saved information</h3>
            	<table align="center" style="width:100%;" id="R1">
                	<tr style="color:#FFF; background-color:#000;">
                        <td colspan="4" align="center">&nbsp;&nbsp;Message</td>
                        <td align="center">Date</td>
                    </tr>
                    <?php
					include("../inc_file/network.php");
						$sql=mysql_query("SELECT * FROM draft WHERE Username='". $_SESSION['user'] ."'");
						while($row=mysql_fetch_assoc($sql))
						{
							?>
					<tr>
                        <td colspan="4">&nbsp;&nbsp; <a style="color:#000;"><textarea cols="40" rows="4" readonly="readonly" /><?php echo $row['Message']; ?></textarea></a></td>
                        <td><?php echo $row['sDate']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5"><hr></td>
                    </tr>
                    <?php
						}
					?>
                </table>
                <!------------------------------------------------------------------------------------------->
                <table align="center" style="width:100%; display:none;" id="R2">
                	<tr style="color:#FFF; background-color:#000;">
                        <td colspan="4" align="center">&nbsp;&nbsp;Message</td>
                        <td align="center">Date</td>
                    </tr>
                    <?php
					include("../inc_file/network.php");
					$P=5;
					$Q=7;
					$key=$P+$Q;
					$k=1;
						$sql=mysql_query("SELECT * FROM draft WHERE Username='". $_SESSION['user'] ."'");
						while($row=mysql_fetch_assoc($sql))
						{
							$result1="";
							$length=strlen($row['Message']);
							for($i=0; $i<$length; $i++)
							{
								$asc=ord(substr($row['Message'],$i,1));
								$dec=$asc-$key;
								$ret=chr($dec);
								$result1=$result1 . $ret;
							}
							$message=$result1;
							
							$result2="";
							$length=strlen($row['sDate']);
							for($i=0; $i<$length; $i++)
							{
								$asc=ord(substr($row['sDate'],$i,1));
								$dec=$asc-$key;
								$ret=chr($dec);
								$result2=$result2 . $ret;
							}
							$sdate=$result2;
							
							?>
					<tr>
                        <td colspan="4">&nbsp;&nbsp; <a style="color:#000;"><?php echo $message; ?></a></td>
                        <td><?php echo $sdate; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5"><hr></td>
                    </tr>
                    <?php
						}
					?>
                </table>
                <!------------------------------------------------------------------------------------------->
                <hr />
                <h3 align="center">Read Received message</h3>
            	<table align="center" style="width:100%;" id="RR1">
                	<tr style="color:#FFF; background-color:#000;">
                        <td>Sender</td>
                        <td colspan="5">&nbsp;&nbsp; Message</td>
                        <td>Date</td>
                    </tr>
                    <?php
						$sql2=mysql_query("SELECT * FROM send_file WHERE Receiver='". $_SESSION['user'] ."'");
						while($row2=mysql_fetch_assoc($sql2))
						{
							?>
					<tr>
                        <td style="font-weight:bold;"><?php echo $row2['Sender']; ?></td>
                        <td colspan="5">&nbsp;&nbsp; <a style="color:#000;"><textarea rows="4" cols="40" readonly="readonly" /><?php echo $row2['Message']; ?></textarea></a></td>
                        <td><?php echo $row2['sDate']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="7"><hr></td>
                    </tr>
                    <?php
						}
					?>
                </table>
                <!------------------------------------------------------------------------------------------->
                <table align="center" style="width:100%; display:none" id="RR2">
                	<tr style="color:#FFF; background-color:#000;">
                        <td>Sender</td>
                        <td colspan="5">&nbsp;&nbsp; Message</td>
                        <td>Date</td>
                    </tr>
                    <?php
					$k=1;
					$P=5;
					$Q=7;
					$key=$P+$Q;
						$sql2=mysql_query("SELECT * FROM send_file WHERE Receiver='". $_SESSION['user'] ."'");
						while($row2=mysql_fetch_assoc($sql2))
						{
							$result1="";
							$length=strlen($row2['Message']);
							for($i=0; $i<$length; $i++)
							{
								$asc=ord(substr($row2['Message'],$i,1));
								$dec=$asc-$key;
								$ret=chr($dec);
								$result1=$result1 . $ret;
							}
							$message=$result1;
							
							$result2="";
							$length=strlen($row2['sDate']);
							for($i=0; $i<$length; $i++)
							{
								$asc=ord(substr($row2['sDate'],$i,1));
								$dec=$asc-$key;
								$ret=chr($dec);
								$result2=$result2 . $ret;
							}
							$sdate=$result2;
							
							$result3="";
							$length=strlen($row2['Sender']);
							for($i=0; $i<$length; $i++)
							{
								$asc=ord(substr($row2['Sender'],$i,1));
								$dec=$asc-$key;
								$ret=chr($dec);
								$result3=$result3 . $ret;
							}
							$sender=$result3;
							?>
					<tr>
                        <td style="font-weight:bold;"><?php echo $sender; ?></td>
                        <td colspan="5">&nbsp;&nbsp; <a style="color:#000;"><?php echo $message; ?></a></td>
                        <td><?php echo $sdate; ?></td>
                    </tr>
                    <tr>
                        <td colspan="7"><hr></td>
                    </tr>
                    <?php
						}
					?>
                </table>
                <!------------------------------------------------------------------------------------------->
                <form enctype="multipart/form-data" method="post">
                <table align="center" style="width:100%;">
                	<tr>
                        <td colspan="5" align="center"><input id="encrypt" class="sub" value="Encrypt Data" style="cursor:pointer;" type="submit"></td>
                    </tr>
                </table>
                </form>
			</div>
			</div>
			
		</div>
	</div>
</section>
<!--------------Footer--------------->
<footer>
</footer>
<?php include('../inc_file/footer.php') ?>

</body></html>