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
    
  <script language="javascript">
  function validate()
  {
	  pass=document.getElementById('pass').value;
	  cpass=document.getElementById('cpass').value;
	  if(cpass!=pass)
	  {
			alert("Confirmation password does not correspond to the password!!!");
			document.getElementById('cpass').focus();
			return false;
	  }
  }
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
			<h3 align="center">Change Password</h3>
            <form action="change_process.php" enctype="multipart/form-data" method="post" onSubmit="return validate();">
            	<table style="height:200px;">
                	<tr>
                    	<td colspan="6" align="center" style="font-size:14px; font-weight:bold;"><?php echo @$_SESSION['msg']; ?></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Current Password:
                        </td>
                    	<td colspan="4"><input type="password" placeholder="Input your current Password" name="password" class="textb2" required />
                        </td>
                    </tr>
                	<tr>
                    	<td colspan="2">New Password :
                        </td>
                    	<td colspan="4"><input id="pass" type="password" placeholder="Input new password" name="new_password" class="textb2" required />
                        </td>
                    </tr>
                	<tr>
                    	<td colspan="2">Retype New Password :
                        </td>
                    	<td colspan="4"><input id="cpass" type="password" placeholder="Retype the new password" name="confirm_pass" class="textb2" required />
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="6" align="center">
                        				<input type="submit" class="sub" value="Change Password" style="cursor:pointer;"/>
                        				<input type="reset" class="sub" value="Clear Field" style="cursor:pointer;"/>
                        </td>
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

<?php
unset($_SESSION['msg']);
?>