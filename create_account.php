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
	<meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
	<link rel="stylesheet" href="css/searchform.css"/>	
	
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
	
	<link href='images/favicon.ico' rel='icon' type='image/x-icon'/>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/responsiveslides.js"></script>
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
  <script>
$(document).ready(function(){
	$("#v1").click(function(){
	var passcode = $("#passcode").val();
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'passcode='+ passcode;
	// AJAX Code To Submit Form.
	$.ajax({
	type: "POST",
	url: "verify.php",
	data: dataString,
	cache: false,
	success: function(result){
	var A=result.split("==//==");
		if(A[0]=="CORRECT")
		{
			document.getElementById('surname').value=A[1];
			document.getElementById('othername').value=A[2];
			document.getElementById('phone_no').value=A[3];
			document.getElementById('t1').style.display="block";
		}
		else
		{
			document.getElementById('msg').innerHTML="<font color='#F00'>Please Enter a valid Passcode</font>";
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
						<li><img src="images/1.png" style="height:250px;"/></li>
						<li><img src="images/2.png" style="height:250px;"/></li>
						<li><img src="images/3.png" style="height:250px;"/></li>
						<li><img src="images/4.png" style="height:250px;"/></li>
					</ul>
				</div>
			</div>
		</div>
</section>
			
<!--------------Content--------------->
<section id="content">
	<div class="zerogrid">
		<div class="row block offbottom">
			<div class="main-content col11">
	            <div class="mymain">
					<h3 align="center">Create New Account</h3>
                    <h4 align="center">Enter Passcode sent to your phone to continue registration</h4>
                    <form enctype="multipart/form-data" method="post">
					<table>
                    	<tr>
                        	<td colspan="6" align="center" style="color:#0C0; font-size:14px; font-weight:bold;" id="msg">
                            <?php echo @$_SESSION['msg']; ?>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="right">Enter your passcode:
                            </td>
                        	<td colspan="4">&nbsp;<input id="passcode" type="text" class="textb" name="passcode" required />
                            </td>
                        </tr>
                           <tr>
                        	<td style="padding:15px;" colspan="6" align="center"><input id="v1" type="submit" value="Verify" name="submit" class="sub" style="cursor:pointer;" /></td>
                        </tr>
                    </table>
                    </form>
                    <form action="register.php" enctype="multipart/form-data" method="post" onSubmit="return validate();">
					<table style=" height:400px; display:none;" id="t1">
                    	<tr>
                        	<td colspan="6" align="center" style="color:#0C0; font-size:14px; font-weight:bold;">
                            <?php echo @$_SESSION['msg']; ?>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="right" style="padding:10px;">Surname:
                            </td>
                        	<td colspan="4">&nbsp;<input id="surname" type="text" class="textb" name="surname" readonly required />
                            </td>
                        </tr>
                    	<tr>
                        	<td colspan="2" align="right" style="padding:10px;">Othername:
                            </td>
                        	<td colspan="4">&nbsp;<input id="othername" type="text" class="textb" name="othername" readonly required />
                            </td>
                        </tr>
                    	<tr>
                        	<td colspan="2" align="right" style="padding:10px;">Gender:
                            </td>
                        	<td colspan="4">&nbsp;<select class="textb" name="gender" required />
                            					<option value="">Select</option>
                            					<option>Male</option>
                            					<option>Female</option>
                            				</select>
                           	</td>
                        </tr>
                    	<tr>
                        	<td colspan="2" align="right" style="padding:10px;">Phone Number:
                            </td>
                        	<td colspan="4">&nbsp;<input id="phone_no" type="text" class="textb" name="phone_no" readonly required />
                            </td>
                        </tr>
                    	<tr>
                        	<td colspan="2" align="right" style="padding:10px;">Username:
                            </td>
                        	<td colspan="4">&nbsp;<input type="text" class="textb" name="username" id="user" required />
                            </td>
                        </tr>
                    	<tr>
                        	<td colspan="2" align="right" style="padding:10px;">Password:
                            </td>
                        	<td colspan="4">&nbsp;<input type="password" class="textb" name="password" id="pass" required />
                            </td>
                        </tr>
                    	<tr>
                        	<td colspan="2" align="right" style="padding:10px;">Retype Password:
                            </td>
                        	<td colspan="4">&nbsp;<input type="password" class="textb" name="c_password" id="cpass" required />
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="6" align="center" style="padding:10px;"><input type="submit" value="Register" name="submit" class="sub" style="cursor:pointer;" />
                           				<input type="reset" class="sub" name="reset" value="Clear Fields" style="cursor:pointer;" />
                            </td>
                        </tr>
                    </table>
                    </form>
		    <a href="index.php">Home Page</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<footer>
</footer>

<div id="copyright">
<p>Copyright © 2016</p>
</div>

</body></html>
<?php
unset($_SESSION['msg']);
?>