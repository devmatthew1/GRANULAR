<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="dist/css/bootstrap.min.css" type="text/css" />
	<style type="text/css">

	  .col-sm-6, .col-md-6{

    max-height: 218px;
    border-radius: 8px;
  }
  #Department{text-align: center;}
  h5{font-weight:bold;}

.customers img
{
width: 100%;
max-width:550px;
max-height: 150px;
padding:5px;
margin:0px;
border-radius: 10px;
}
  
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-6, .col-md-8, .col-md-7,.col-md-5{
background-color: ;
color: black;
border-radius: 8px;
border: 1px solid white;

}
 /* ALL MY PERSONAL RESPONSIVE STYLING STARTS HERE : CONTACT SHOLA FOR ANY HELP*/

 /* Extra small devices (portrait phones, less than 576px) */
@media (max-width: 575.99px) {
 .headnav-sm{text-align:center;}
	.left-nav{display: none;}

}

/* Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767.99px) { 
	 .headnav-sm{text-align:center;}
	.left-nav{padding: 0px;margin: 0px;}
}

/* Medium devices (tablets, 768px and up) */

@media (min-width: 768px) and (max-width: 991.99px) {
 .left-nav{text-align: right;padding: 0.5em 0px;}
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199.99px) { 
	  .left-nav{text-align: right;padding: 0.5em 0px;}
}

/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) { 
	 .left-nav{text-align: right;padding: 0.5em 0px;}
}

/* ALL MY PERSONAL RESPONSIVE STYLING ENDS HERE : CONTACT SHOLA FOR ANY HELP*/</style>
</head>
<body >
<div class="row headnav-sm" style="padding: 0.01em 2.99em;">
  <div style="font-weight:bold;font-size: 30pt;;font-family:Georgia,serif;padding: 0px;" class="col-xs-12  col-sm-4 ">GRANular<span style="color:green"></span></div>
  <div style="font-weight:lighter;font-size:20px;font-family:Segoe UI,Arial,sans-serif;line-height: 30px;" class="col-xs-12  col-sm-8 left-nav ">The world's largest web developer site</div>
</div>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Home</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
  <h1 id="Department"><strong>Welcome To Customer Service Department</strong><br>Only Sms App working At the moment</h1>

 
<div class="row">
  <div class="col-sm-12 col-md-8 col-md-offset-2">
   <div class="row">
        <div class="col-sm-6 col-md-6 customers"><a href="/php login and registration kms/sms/sms.php"><img src="images/caller.jpg"><h5>MAKE A CALL</h5></a></div>
        <div class="col-sm-6 col-md-6 customers"><a href="/php login and registration kms/sms/sms.php"><img src="images/phone_sms.png"><h5>SEND AN SMS</h5></a></div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-md-6 customers"><a href="/php login and registration kms/sms/sms.php"><img src="images/customer-info.jpg"><h5>CHECK CUSTOMER INFO</h5></a></div>
        <div class="col-sm-6 col-md-6 customers"><a href="/php login and registration kms/sms/sms.php"><img src="images/documentation.jpg"><h5>VIEW CUSTOMER SERVICE DOCUMENTATION</h5></a></div>
      </div>
  </div>

</div>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

