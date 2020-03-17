<!DOCTYPE HTML>
<html>

<head>
<?php
$uri = $_SERVER['REQUEST_URI'];

$url_components = parse_url($uri); 

  
// Use parse_str() function to parse the 
// string passed via URL 
//print_r(parse_url($url_components['query']));
parse_str(urlencode($url_components['query']),$params); 

$var = array_keys($params);
$var1 = explode("=",$var[0],2);
$var2 = explode("&id",$var1[1]);


$encryption = $var2[0];
$id = substr($var2[1], 1); 
      
// Display result 

// $encryption = $params['param'];
// $id         = $params['id']; 

$ciphering = "AES-128-CTR";
$options = 0; 
		// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121'; 

// Store the decryption key 
$decryption_key = "encryptiontest"; 

// Use openssl_decrypt() function to decrypt the data 
$email=openssl_decrypt ($encryption, $ciphering,  
$decryption_key, $options, $decryption_iv);

?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Invitation Portal | User</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' />
	<link rel='stylesheet' href='css/main.css'>
	<link rel='stylesheet' href='css/font-awesome.css'>
	<link rel='icon' href='images/favicon.ico'>
	<link href='css/glyphicons-regular.css' rel='stylesheet'>
	<script src='js/jquery.js' type='text/javascript'></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.tree-multiselect.min.js"></script>
	<script src='js/bootstrap.js' type='text/javascript'></script>
	<script src="js/jquery.popupoverlay.js" type="text/javascript"></script>
	<script src='js/bootstrap-datetimepicker.min.js' type='text/javascript'></script>
</head>
<body>
	<article class="user1 container">
		<!-- <div class="col-xs-12 content-wrapper container" style="overflow-x: hidden;"> -->
				<div class="col-xs-12 content-wrapper container" style="overflow: hidden;height: 96vh;">
			<div>
				<header class="col-sm-12 col-xs-12 all-page-header1 user_header1">
					<!--Header Logo Start -->
					<div class="col-sm-7 " align="right">
						<p><img class="image" src="images/logo.png" alt="Logo" align="left"></p>
					</div>
					<div class="col-sm-5 user_text">
						<a href="http://192.168.3.214/Invitation_Portal/login.php">
							<p id="user"></p>
						</a>
					</div>
					<!--Header Welcome Text and Logout button End -->
				</header>
				<div class="searchConteiner2 ">
					<div class="row rowfluidalignment searchContainer_image">
						<div class="col-sm-12 padding0" >
							<form class="" id="eventDetails" action="" method="post" enctype="multipart/form-data">
								<!--   <h4>Invitaion Portal <h4> -->
								<div class="container  user_container">
									<div class='row rowfluidalignment invitation_image_user col-sm-5' style="width: 61%;height: 74vh;">
										<div class="changeme">
											<fieldset class='col-sm-12 form-group temp_field invitation_headings'>
												<h2 id="InvitationName"></h2>
											</fieldset>
											<fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
												<p id="InvitationMessage" class="invitation_color"></p>
											</fieldset>
											<fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
												<h4 class="invitation_color">From</h4>
												<p id="InvitationFrom" class="invitation_color">
												</p>
											</fieldset>
											<fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
												<h4 class="invitation_color">On</h4>
												<div id='datetimepicker1' class='input-append date eventDate'>
													<p id="date" class="invitation_color">
													</p>
													<p id="time" class="invitation_color">
													</p>
												</div>
											</fieldset>
											<fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
												<h4 class="invitation_color">Venue</h4>
												<p id="eventPlace" class="invitation_color">
												</p>
											</fieldset>
											<fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
												<h4 class="invitation_color">Address</h4>
												<p id="InvitationAddress" class="invitation_color"></p>
											</fieldset>
										</div>
									</div>
								
								<div class=" user_form">
									<div class="user_form_text">
									<fieldset class="form-group col-sm-2 ">
										<label class="container_check paddingL35"><b>Alone</b>
											<input name="alone" value="alone" checked="checked" type="radio"
												class="alone">
											<span class="checkmark dot_check"></span>
										</label>
									</fieldset>
									<fieldset class="form-group col-sm-2 ">
										<label class="container_check paddingL35"><b>With Spouse</b>
											<input name="alone" value="with spouse" type="radio" class="alone">
											<span class="checkmark dot_check"></span>
										</label>
									</fieldset>
									<div class="form-group col-sm-4">
											<table style="margin-top: 0px; width: 54%">
													<tbody><tr>
														<td>
															<label for="email"><b>Children</b></label>
														</td>
														<td>
															<select class="form-control" style="" name="childs" id="Childern">
																							<option value="0" selected="selected">0</option>
																							<option value="1">1</option>
																							<option value="2">2</option>
																						</select>
														</td>
													</tr>
													</tbody></table>
																			
									</div>
									<!-- <div class="form-group col-sm-4">
										<label for="pwd">Others</label>
										<select class="form-control" name="others" id="others">
											<option value="0" selected="selected">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div> -->
									<!-- <fieldset class="form-group col-sm-2 ">
										<label class="container_check paddingL35">Comments(optional)
											<textarea name="comments" id="comments"></textarea>
										</label>
									</fieldset> -->
									<fieldset class="col-sm-12 col-xs-12 col-md-5 col-lg-5 form-group submit_button">
										<div class="widgetSearchButton user_buttons" style="margin-top: -78px; margin-right: 90px;">
											<input name="decline" id="decline" value="Decline"
												class="btn btn-info new-btn-chang cust-bttn " type="submit">
											<input name="sub" id="accept" value="Attend" class="btn btn-info cust-bttn "
												type="submit">
										</div>
									</fieldset>
								</div>
								</div>
							</div>
								<!-- Form Button Start -->

								<!-- Form Button End -->
							</form>
						</div>
						<!-- Page Form End -->
					</div>
				</div>
			</div>
			<div class='widgetDescriptionRow clearfix newbody'>
				<div class='popup searchpopups'>
					<div class='popupremove'>
						<span class='fa fa-remove close1' onclick='closePopup()'></span>
					</div>
					<div class=' popup-search-container'>
						<div class='row rowfluidalignment'>
							<div class='col-sm-12'>
								<div class='col-sm-12 widgetDescriptionForm'>
									<div class='row'>
										<div class='widgetDescriptionRow'>
											<h1 class='popup_text'> Invitation Accept Successfully..... &#128578;</h1>
										</div>
									</div>
									<!-- Popup Form Button Start  -->
									<div class='role-makerchecker-btn'>
										<fieldset class='form-group'>
											<div class='widgetSearchButton col-sm-12 no-padding'>
												<input type='button' name='decline' value='OK'
													class='btn btn-info new-btn-chang-pass pull-right cust-bttn close1'>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='widgetDescriptionRow clearfix newbody'>
				<div class='error_popup searchpopups'>
					<div class='popupremove'>
						<span class='fa fa-remove close1' onclick='closePopup()'></span>
					</div>
					<div class=' popup-search-container'>
						<div class='row rowfluidalignment'>
							<div class='col-sm-12'>
								<div class='col-sm-12 widgetDescriptionForm'>
									<div class='row'>
										<div class='widgetDescriptionRow'>
											<h1 class='popup_text'> Your earlier confirmation has been recorded. &#128578; </h1>
										</div>
									</div>
									<!-- Popup Form Button Start  -->
									<div class='role-makerchecker-btn'>
										<fieldset class='form-group'>
											<div class='widgetSearchButton col-sm-12 no-padding'>
												<input type='button' name='decline' value='OK'
													class='btn btn-info new-btn-chang-pass pull-right cust-bttn close1'>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='widgetDescriptionRow clearfix newbody'>
				<div class='decline_popup searchpopups'>
					<div class='popupremove'>
						<span class='fa fa-remove close1' onclick='closePopup()'></span>
					</div>
					<div class=' popup-search-container'>
						<div class='row rowfluidalignment'>
							<div class='col-sm-12'>
								<div class='col-sm-12 widgetDescriptionForm'>
									<div class='row'>
										<div class='widgetDescriptionRow'>
											<h1 class='popup_text'> Your Invitation Decline Sucessfully... &#128543; </h1>
										</div>
									</div>
									<!-- Popup Form Button Start  -->
									<div class='role-makerchecker-btn'>
										<fieldset class='form-group'>
											<div class='widgetSearchButton col-sm-12 no-padding'>
												<input type='button' name='decline' value='OK'
													class='btn btn-info new-btn-chang-pass pull-right cust-bttn close1'>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='widgetDescriptionRow clearfix newbody'>
					<div class='no_invitationpopup searchpopups'>
						<div class='popupremove'>
							<span class='fa fa-remove close1' onclick='closePopup()'></span>
						</div>
						<div class=' popup-search-container'>
							<div class='row rowfluidalignment'>
								<div class='col-sm-12'>
									<div class='col-sm-12 widgetDescriptionForm'>
										<div class='row'>
											<div class='widgetDescriptionRow'>
												<h1 class='popup_text'>You Don't Have Any Invitation.... &#128542; </h1>
											</div>
										</div>
										<!-- Popup Form Button Start  -->
										<div class='role-makerchecker-btn'>
											<fieldset class='form-group'>
												<div class='widgetSearchButton col-sm-12 no-padding'>
													<input type='button' name='decline' value='OK'
														class='btn btn-info new-btn-chang-pass pull-right cust-bttn close1'>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
</body>

<script>
	$(document).ready(function () {
		
		//var url = window.location.href;
		// var dataValue = url.split('?')[1].split('&');
		// var email = dataValue[0].split('=')[1];
		// var id = dataValue[1].split('=')[1];
		// console.log(email);

		// var data = {
		// 	'email': email,
		// 	'id': id,
		// 	'fname': 'onload'
		// }
		

		var email ="<?php echo $email ?>";
		var id ="<?php echo $id ?>";
		var data = {
			'email': email.trim(),
			'id': id,
			'fname': 'onload'
		}


		$.ajax({
			url: 'user_invitation.php',
			type: 'get',
			data: data,
			dataType: 'JSON',
			success: function (response) {
				var len = response.length;
				for (var i = 0; i < len; i++) {
					var InvitationFrom = response[i].from_name;
					var InvitationName = response[i].name;
					var address = response[i].address;
					var message = response[i].message;
					var date = response[i].date;
					var time = response[i].time;
					var place = response[i].place;
					var user = response[i].membername;
					var salutation = response[i].salutation;
					var template=response[i].template_id;
					var templatepath=response[i].templatepath;
					var fontcolor = response[i].fontcolor;
					var fontsize = response[i].fontsize;
					$('.invitation_headings p,.invitation_headings h4,.invitation_headings h2').css('color', fontcolor);
					$('.changeme').css('font-size', fontsize + "px");
					$("#InvitationName").html(InvitationName);
					$("#InvitationMessage").html(message);
					$("#InvitationFrom").html(InvitationFrom);
					$("#date").html(date);
					$("#time").html(time);
					$("#eventPlace").html(place);
					$("#InvitationAddress").html(address);
					$("#user").html(user);
					
					if (template == 1) {
						$('.invitation_image_user').css('background-image', 'url(images/invitation.jpg)');
					}else if(template=='default'){
						$('.changeme').empty();
						//$('.invitation_image_user').css('background-image', 'url(images/dynamic.jpg)');
						$('.invitation_image_user').css('background-image', 'url(images/'+templatepath+')');
						$('.invitation_image_user').css('width', '61%');
					} else {
						$('.invitation_image_user').css('background-image', 'url(images/inv14.PNG)');
					}
				if(InvitationName==null){
					$(".searchConteiner2").css('display','none');
					$('.no_invitationpopup').popup('show');
						$('.close1').click(function () {
							$('.no_invitationpopup').popup('hide');
						})
				}
				}
			
			}
		});

		$("#accept").on('click', function (event) {
		//alert("called");
			event.preventDefault();
			//var url = window.location.href;
			//var dataValue = url.split('?')[1].split('&');
			//var email = dataValue[0].split('=')[1];
			//var id = dataValue[1].split('=')[1];
			var alone_or_spouse = $("input:checked").val();
			var Childern = $("#Childern").val();
			//var others = $("#others").val();
			//var comments = $("textarea#comments").val();
			var email ="<?php echo $email ?>";
			var id ="<?php echo $id ?>";
			var data = {
				'alone_or_spouse': alone_or_spouse,
				'email': email,
				'id': id,
				'Childern': Childern,
				//'others': others,
				//'comments':comments,
				'fname': 'accept'
			}
			$.ajax({
				url: 'user_invitation_Post.php',
				type: "get",
				data: data,
				success: function (response) {
					alert(response);return false;
					// if (response === 'sucess') {
					// 	$('.popup').popup('show');
					// 	$('.close1').click(function () {
					// 		$('.popup').popup('hide');
					// 	})
					// }
					// if (response === 'error') {
					// 	$('.error_popup').popup('show');
					// 	$('.close1').click(function () {
					// 		$('.error_popup').popup('hide');
					// 	})
					// }
				}
			});

		});
		$("#decline").on('click', function (event) {
		//alert("declined called");
			event.preventDefault();
			//var url = window.location.href;
			//var dataValue = url.split('?')[1].split('&');
			//var email = dataValue[0].split('=')[1];
			//var id = dataValue[1].split('=')[1];
			var email ="<?php echo $email ?>";
			var id ="<?php echo $id ?>";
			var decline = $("#decline").val();
			var comments = $("textarea#comments").val();
			var data = {
				'email': email,
				'decline': decline,
				'id': id,
				//'comments':comments,
				'fname': 'Decline'
			}
			$.ajax({
				url: 'user_invitation_Post.php',
				type: "get",
				data: data,
				success: function (response) {
					alert(response);return false;
					// if (response === 'decline') {
					// 	$('.decline_popup').popup('show');
					// 	$('.close1').click(function () {
					// 		$('.decline_popup').popup('hide');
					// 	})
					// }
					// if (response === 'error') {
					// 	$('.error_popup').popup('show');
					// 	$('.close1').click(function () {
					// 		$('.error_popup').popup('hide');
					// 	})
					// }
				}
			})

		})
	});
</script>

</html>
