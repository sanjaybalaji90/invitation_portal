<?php
include './class/dbFunctions.php';
include('Config.php');
error_reporting(E_ERROR | E_PARSE);
$username = $_SESSION['user'];
if ($_SESSION['user'] == ''&& $_SESSION["role"]!='1' && $_SESSION["role"]!='2') {
            header('Location: login.php');
}
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$sqlQuery_member = "SELECT * FROM user_table where roleId=2";
$result_member = $db->query($sqlQuery_member);
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Invitation Portal | Home</title>
        <!-- Bootstrap  -->
        <!-- ... -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' />
        <link rel='stylesheet'
            href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/2.0.1/css/bootstrap-datetimepicker.min.css' />
        <link rel="stylesheet" href="css/jquery.tree-multiselect.min.css">
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
        <!-- Multi-select-jQuery-Dropdown Start -->
        <link href='https://www.jqueryscript.net/css/jquerysctipttop.css' rel='stylesheet' type='text/css'>
        <script src='js/mock.js' type='text/javascript'></script>
        <!--link rel='stylesheet' href='css/jquery.dropdown.css'-->
        <script src='js/jquery.dropdown.js' type='text/javascript'></script>

        <!-- Multi-select-jQuery-Dropdown End -->
        <!-- List JS CDN Link -->
        <script src='js/list.min.js'></script>
    </head>

<body>
    <article class='all-main-container'>
        <div class='col-xs-12 content-wrapper'>
            <!-- Main Page Error Messages Start -->
            <span class='success-msg help-block align-center' id='sucessDiv'></span>
            <span class='has-error help-block align-center' id='errorDiv'></span>
            <!-- Main Page Error Messages End -->
            <div>
                <header class='col-sm-12 all-page-header'>
                    <!--Header Logo Start -->
                    <div class='col-sm-7 ' align='right'>
                        <p><img src='images/logo.png' alt='Logo' align='left'></p>
                        <p class='invitation-title'><b>Invitation Portal</b></p>
                    </div>
                    <!--Header Logo End -->
                    <!--Header Welcome Text and Logout button Start -->
                    <div class='col-sm-5'>
                        <div class='pull-right user-settings'>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class='profile-text'>Welcome <?php echo "$username"; ?> <a
                                                href='logout.php'><span class='profile-text'></span>| Logout</a></td>
                                        <td align='profile-text'></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Header Welcome Text and Logout button End -->
                </header>
                <!-- Content Block Start -->
                <a href='Invitaion_portal_admin.php'>
                    <div class='tab-header-container marginL40'>
                        Create Invitation
                    </div>
                </a>
                <a href='Invitation_list.php'>
                    <div class='tab-header-container'>
                        View Invitation Response
                    </div>
                </a>
                <a href='dynamics_group_members.php'>
                    <div class='tab-header-container'>
                        Create Groups
                    </div>
                </a>
                <a href='dynamics_members.php'>
                    <div class='tab-header-container '>
                        Create Members
                    </div>
                </a>
                <?php 
					if($_SESSION['role']=='0'){
						?>
                <a href='manage_admin.php'>
                    <div class='tab-header-container active'>
                        Manage admin
                    </div>
                </a>
                <?php
					}
					?>
                <div class="row rowfluidalignment">
                    <div class="col-sm-12">

                        <!-- Page Form Start -->
                        <?php
							echo "<table class=\"user_history_table\">
									<tr>
										<th>Name</th>
										<th>Action</th>
									</tr>";
							while($row = mysqli_fetch_array($result_member))
							{
										echo "<tr>";
                                        echo "<td>" . $row['emailId'] . "</td>";
                                        echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='manage_admin_post.php?id=".$row['EmpId']."'>Delete</a></td>"; //use double quotes for js inside php!
                                        echo "</tr>";
							}
							
								echo "</table>";
							?>
                        <!-- Page Form End -->
                    </div>
                </div>
                <div class='searchConteiner'>
                    <div class='row rowfluidalignment'>
                        <div class='col-sm-12'>
                            <!-- Page Form Start -->
                            <!--form id='eventDetails' action='' method='post'-->
                            <div class='col-sm-12 widgetDescriptionForm'>
                                <div class=''>
                                    <h4 class='header_title'>Creating admins</h4>
                                    <div class='widgetDescriptionRow clearfix'>
                                        <div class="clear_both check-box col-sm-6">
                                            <fieldset class='col-sm-12 form-group padding0'>
                                                <label class='container_check paddingL35'>Select To Create admin
                                                    <input type='radio' name='Invitees_bulk' id='select_id' value="0"
                                                        required>
                                                    <span class='checkmark dot_check'></span>
                                                </label>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <form method="post" action="" enctype="multipart/form-data" name="frmer" id="frmer">
                                        <div class="manually_members">
                                            <input type='hidden' name='tot_field' id='tot_field' value="0">
                                            <div class='widgetDescriptionRow2 clearfix'>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dynamic_field">
                                                        <tr>
                                                            <td><input type="email" name="email_0"
                                                                    placeholder="Email id"
                                                                    class="form-control name_list" />
                                                                <div
                                                                    class="discriptionErrorMsg error-span-hide red-error news">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                    <div><button type="button" name="add" id="add"
                                                            class="dynamic_field add_fields2 btn add-bttn">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class='col-sm-12 form-group pull-right'>
                                                <div class='widgetSearchButton no-search-criteria pull-right'>
                                                    <input name="submit" type="submit" value="Submit" id="submit"
                                                        class='btn btn-info cust-bttn submit' />
                                                </div>
                                            </fieldset>
                                        </div>
                                    </form>
                                    <div class='widgetDescriptionRow clearfix newbody'>
                                        <div class='popup searchpopups' id="myModal">
                                            <div class='popupremove'>
                                                <span class='fa fa-remove close1' onclick='closePopup()'></span>
                                            </div>
                                            <div class=' popup-search-container'>
                                                <div class='row rowfluidalignment'>
                                                    <div class='col-sm-12'>
                                                        <div class='col-sm-12 widgetDescriptionForm'>
                                                            <div class='row'>
                                                                <div class='widgetDescriptionRow'>
                                                                    <h1 class='popup_text'> Admin Created Sucessfully
                                                                        <br />
                                                                        Default first time user password: girmiti01</h1>
                                                                </div>
                                                            </div>
                                                            <!-- Popup Form Button Start -->
                                                            <div class='role-makerchecker-btn'>
                                                                <fieldset class='form-group'>
                                                                    <div
                                                                        class='widgetSearchButton col-sm-12 no-padding'>
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
                                        <div class='popup searchpopups new' id="myModal2">
                                            <div class='popupremove'>
                                                <span class='fa fa-remove close1' onclick='closePopup()'></span>
                                            </div>
                                            <div class=' popup-search-container'>
                                                <div class='row rowfluidalignment'>
                                                    <div class='col-sm-12'>
                                                        <div class='col-sm-12 widgetDescriptionForm'>
                                                            <div class='row'>
                                                                <div class='widgetDescriptionRow'>
                                                                    <h1 class='popup_text'> Admin Creation Failed</h1>
                                                                </div>
                                                            </div>
                                                            <!-- Popup Form Button Start -->
                                                            <div class='role-makerchecker-btn'>
                                                                <fieldset class='form-group'>
                                                                    <div
                                                                        class='widgetSearchButton col-sm-12 no-padding'>
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
                                </div>
                            </div>
                            <!-- table End -->
                        </div>
                        <!--/form-->
                        <!-- Page Form End -->
                    </div>
                </div>
            </div>
    </article>
    <script>
    //Add Input Fields
    $(document).ready(function() {
        $("#select_id").on("click", function() {
            $(".manually_members").show();
            $(".manual_submit").show();
        })
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        //var postURL = "dynamics_group_members2.php";
        var i = 0;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="email" name="email_' + i +
                '" placeholder="Email id" class="form-control name_list" /><div class="discriptionErrorMsg error-span-hide red-error news"></div></td><td><button type="button" name="remove" id="' +
                i + '" class="btn  btn_remove">X</button></td></tr>');
            $("#tot_field").val(i);
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        //alert("fmr 1");		
        $('#frmer').on('submit', function() {
            //alert("fmr 1");
            //event.preventDefault();
            $(".discriptionErrorMsg").empty();

            var values = new Array();
            var tot = 0;
            $('.name_list').each(function() {
                tot++;
                if (this.value == '') {
                    values.push(1);
                    nameError = "Please Enter Email id* ";
                    $(this).siblings()[0].innerHTML = nameError;
                }
            });
            if (values.length == 0) {
                $.ajax({
                    url: "manage_admin_post.php",
                    method: "POST",
                    data: $('#frmer').serialize(),
                    type: 'json',

                    success: function(data) {
                        i = 1;
                        $('.dynamic-added').remove();
                        $('#frmer')[0].reset();
                        //alert('Record Inserted Successfully.');
                        $('.popup').popup('show');
                        $('.close1').click(function() {
                            $('.popup').popup('hide');
                            window.location.href = "manage_admin.php";
                        })
                    }
                });
            }
            return false;
        });
    });
    </script>
</body>