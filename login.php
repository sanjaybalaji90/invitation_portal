<?php
include './class/dbFunctions.php';
$dbFunctions_obj = new dbFunctions();
$_GET['name']=$_SESSION["name"];
if($_SESSION["user"]!=''&& $_SESSION["role"]=='1') {
	header('Location: user-inv-list.php');
} else if($_SESSION["user"]!=''&& ($_SESSION["role"]=='0' || $_SESSION["role"]=='2')) { 
	header('Location: Invitaion_portal_admin.php');
}
/*DB initilization */
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = $_POST['userName'];
	$password = $_POST['password'];	
	//$_SESSION["user"]=$username;
	if($username == NULL || $password == NULL || $username == "" || $password == "")
	{
		echo "<script>alert('Please provide the credentials');</script>";
	}
	else
	{		
		$dbFunction_login = $dbFunctions_obj->admin_user_login($username, $password,$roleId,$status);
		if($dbFunction_login->num_rows > 0)
		{
			$_SESSION["user"]=$username;
			$_SESSION["role"]=$roleId;
			if(!$roleId)
			{
					header('Location: Invitaion_portal_admin.php');
			}
			elseif(!$status){
					header('Location: change_password.php');
					$_SESSION["username"]=$username;
			}elseif($roleId=='2'){
				header('Location: Invitaion_portal_admin.php');
			}else{
					header('Location: user-inv-list.php');
			}
		} else 	{
			echo "<script>alert('Login Failure');</script>";
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
						<h3 class="login-text">Login</h3>
						<div id="loginError" class="error-msg align-center"> <span class="success-msg help-block"
								id="errorDiv"></span>
						</div>
					</div>
					<div class="col-xs-8 center login-sub-container clearfix">
						<form action="" method="post">
							<div class="login-form-elements">
								<div class="col-xs-2 login-form-icon login-form-div">
									<i class="fa fa-user"></i>
								</div>
								<div class="col-xs-10 form-group login-form-div">
									<input class="form-control" id="loginUser" name="userName" placeholder="Email"
										onkeypress="setDiv('loginError', '');setDiv('userError', '');" autocomplete="off"
										onblur="this.value=this.value.trim();validEmailaddress('loginUser','userError','Please enter your Email address','Please enter a valid Email address')"
										type="text" required>
									<div class="has-error" id="userError"> &nbsp;</div>
								</div>
								<div class="col-xs-2 login-form-icon">
									<i class="fa fa-lock"></i>
								</div>
								<div class="col-xs-10 form-group form-group-login">
									<input class="form-control" id="loginPass" name="password" placeholder="Password"
										maxlength="15" onblur="validatePassword()"
										onkeypress="setDiv('loginError', '');setDiv('passwordError', '');" type="password"
										required>
									<div class="has-error" id="passwordError"> &nbsp;</div>
								</div>

								<div class="col-xs-12 no-padding" style="padding:0;">
									<div class="form-group login-btn">
										<input value="Submit" class="btn btn-blue form-control pull-right"
											name="loginSubmit" type="submit">
									</div>
								</div>
								<label>Username: your emailid <br />
									Default first time user password: girmiti01
								</label>
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