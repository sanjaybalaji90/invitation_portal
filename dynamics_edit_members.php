<?php
include 'dynamic_members2.php';
if ($_SESSION['user'] == '') {
    header('Location: login.php');
}
$username1 = $_SESSION['user'];
$id = $_GET['id'];
$sqlQuery_member_select = "SELECT * FROM members_table where Id=".$id;
$result_member_select = $db->query($sqlQuery_member_select);
$row = mysqli_fetch_assoc($result_member_select);
$name = $row['name'];
$emailid = $row['emailId'];
$phonenum = $row['phone_num'];
$groupdid = $row['groupId'];

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $membersname   = $_POST['membersname'];
    $membersemail  = $_POST['membersemail'];
    $membersoldemail  = $_POST['membersoldemail'];
    $membersphone  = $_POST['membersphone'];
    $membersgroup  = $_POST['membersgroup'][0];
    $group_info = explode(":",$membersgroup);
    $group_id 	= $group_info[0];
    $groupname 	= $group_info[1];
    $sql="UPDATE members_table SET name='$membersname',emailId='$membersemail',phone_num='$membersphone',groupId='$group_id',groupname='$groupname' WHERE Id =$id";
    $results = $db->query($sql);
    if($membersoldemail!=$membersemail && $results) {
        $sql_update ="UPDATE user_table SET emailId='" .$membersemail."' WHERE emailId = '" .$membersoldemail."'";
        $sql_request_delete ="DELETE FROM invitations_request_table  WHERE invitation_members ='" .$membersoldemail."'";
        $sql_response_delete ="DELETE FROM invitations_response_table  WHERE invitation_members ='" .$membersoldemail."'";
        $results_user = $db->query($sql_update);
        $results_user_request = $db->query($sql_request_delete);
        $results_user_response = $db->query($sql_response_delete);
    }
    header('Location: dynamics_members.php');
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Invitation Portal | Home</title>

        <link rel='icon' href='images/favicon.ico'>

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
                                            <td class='profile-text'>Welcome <?php echo "$username1"; ?><a
                                                    href='logout.php'><span class='profile-text'></span>| Logout</a></td>
                                            <td align='profile-text'></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--Header Welcome Text and Logout button End -->
                    </header>
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
                        <div class='tab-header-container active'>
                            Create Members
                        </div>
                    </a>
                    <?php 
                        if($_SESSION['role']=='0'){
                            ?>
                    <a href='manage_admin.php'>
                        <div class='tab-header-container '>
                            Manage admin
                        </div>
                    </a>
                    <?php
                        }
                        ?>
                </div>
                <div class='searchConteiner'>
                    <div class='row rowfluidalignment'>
                        <form id="member_edit" class="" method="post" action="">
                            <div class="col-sm-8">
                                <label><span class='requiredFiled'>*</span>Members Name</label>
                                <input id='membersname' name='membersname' class='form-control'
                                    onblur='this.value=this.value.trim();' type='text' value='<?php echo $name;?>'>
                                <div class='discriptionErrorMsg nameerror'>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <label><span class='requiredFiled'></span>Members Email</label>
                                <input id='membersemail' name='membersemail' class='form-control'
                                    onblur='this.value=this.value.trim();' type='email' value='<?php echo $emailid;?>'>
                                <div class='discriptionErrorMsg nameerror'>
                                </div>
                            </div>

                            <input id='membersoldemail' name='membersoldemail' type="hidden" readonly
                                value='<?php echo $emailid;?>'>

                            <div class="col-sm-8">
                                <label><span class='requiredFiled'></span>Members PhoneNo</label>
                                <input id='membersphone' name='membersphone' class='form-control'
                                    onblur='this.value=this.value.trim();' type='text' value='<?php echo $phonenum;?>'>
                                <div class='discriptionErrorMsg nameerror'>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label><span class='requiredFiled'></span>Members group</label>
                                <?php
                                    echo "<select id='membersgroup' name='membersgroup[]' class='error_msg'>";
                                        echo "<option value=''>Select Group</option>";
                                            while ($row = $result->fetch_assoc()) 
                                            {
                                                //unset($inv_from);
                                                $group_name = $row['name'];
                                                $group_id = $row['id'];
                                                if($groupdid ==$group_id){
                                                    echo '<option value="'.$group_id.':'.$group_name.'" selected="selected">'.$group_name.'</option>';
                                                } else{
                                                    echo '<option value="'.$group_id.':'.$group_name.'">'.$group_name.'</option>';
                                                }
                                            }
                                        echo "</select>";
                                    ?>
                                <div class="discriptionErrorMsg error-span-hide red-error news"></div>
                            </div>
                            <div class='col-sm-8'>
                                <input name="submit" type="submit" value="Update" id="submit"
                                    class='btn btn-info cust-bttn submit' />
                                <input name="reset" type="reset" value="Reset" id="submit"
                                    class='btn btn-info cust-bttn submit' />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </body>