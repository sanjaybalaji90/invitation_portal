<?php
session_start();
include('Config.php');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	// If the values are posted, insert them into the database.
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$oldpassword = $_POST['oldpassword'];
		$newPassword = $_POST['newpassword'];
		$cpassword   = $_POST['confirmpassword'];
		if ($newPassword != $cpassword) {
			$msg = "passwords doesn't match";
			echo $msg;
		}else{
		$user_name = $_SESSION["username"];
		//$user_name      = str_replace(' ', '', $user_name);
		$changePWDquery = "UPDATE user_table SET status='1',password='$newPassword' WHERE emailId= '$user_name'";
		$result3        = mysqli_query($db, $changePWDquery);
		if (mysqli_affected_rows($db) > 0) {
			echo "<script>alert('Change Password Sucessfully')</script>";
			header("Location: login.php?name='$user_name'");
		} else {
			echo "Status : Failed to upload!";
			echo "<script>alert('insert failure')</script>";
	}
		}
}
?>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="images/favicon.ico">
    <title>Invitation Portal | Login</title>

   <link rel="stylesheet" href="css/bootstrap.css">
	 <link href="css/login/main.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.css">
	  
    <link href="css/login/line-icons.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
 

</head>

<body class="login-body" style="background-color: #e6ecf0;">
   <div class="container cw-admin-login">
			<div class="cw-admin-login-main-container">
				<header id="loginHeader" class="col-xs-12 login-header"> 
					<img src="images/logo.png" class="center">
				</header>
				<section class="login-container">
					<div class="col-xs-12 center login-sub-container clearfix">
						<h3 class="login-text">Reset Password</h3>
						<div id="loginError" class="error-msg align-center"> <span class="success-msg help-block" id="errorDiv"></span>
						</div>
					</div>
					<div class="col-xs-8 center login-sub-container clearfix">
					
						<form action="" method="post" >
							<div class="login-form-elements">
								<div class="col-xs-2 login-form-icon">
									<i class="fa fa-lock"></i>	
								</div>
								<div class="col-xs-10 form-group login-form-div">
									<input class="form-control" id="oldpwd" name="oldpassword" placeholder="Enter Old Password" onkeypress="setDiv('loginError', '');setDiv('userError', '');" autocomplete="off" onblur="this.value=this.value.trim();validEmailaddress('loginUser','userError','Please enter your Email address','Please enter a valid Email address')" type="text" required>
									<div class="has-error" id="userError">  &nbsp;</div>
								</div>
								<div class="col-xs-2 login-form-icon">
									<i class="fa fa-lock"></i>	
								</div>
								<div class="col-xs-10 form-group form-group-login">
									<input class="form-control" id="newpwd" name="newpassword" placeholder="Enter New Password" maxlength="15" onblur="validatePassword()" onkeypress="setDiv('loginError', '');setDiv('passwordError', '');" type="password" required>
									<div class="has-error" id="passwordError">   &nbsp;</div>
								</div>
								<div class="col-xs-2 login-form-icon">
									<i class="fa fa-lock"></i>	
								</div>
								<div class="col-xs-10 form-group form-group-login">
									<input class="form-control" id="confirmpwd" name="confirmpassword" placeholder="Confirm your password" maxlength="15" onblur="validatePassword()" onkeypress="setDiv('loginError', '');setDiv('passwordError', '');" type="password">
									<div class="has-error" id="passwordError" required>   &nbsp;</div>
								</div>
								
								<div class="col-xs-12 no-padding" style="padding:0;">
									<div class="form-group login-btn">
										<input value="Submit" class="btn btn-blue form-control pull-right" name="submit" type="submit">
									</div>
								</div>
							</div>
						</form>
						
						
						
					</div>
				</section>
				<!-- login-container end -->
				<footer class="footer login-footer">
					<p class="footer-txt">Copyright © 2019 Girmiti. All rights reserved.</p>
				</footer>
			</div>
		</div>

</body>

</html>