<?php
include 'dynamics_group_members2.php';
if ($_SESSION['user'] == '') {
    header('Location: login.php');
}
$username1 = $_SESSION['user'];
$id = $_GET['id'];
$sqlQuery_group_select = "SELECT * FROM groups_table where id=".$id;
$result_group_select = $db->query($sqlQuery_group_select);
$row = mysqli_fetch_assoc($result_group_select);
$name = $row['name'];
$discrpition = $row['discription'];

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $groupsname   = $_POST['groupsname'];
    $groupsdiscription  = $_POST['groupsdiscription'];
    $sql="UPDATE groups_table SET name='$groupsname',discription='$groupsdiscription' WHERE id =$id";
    $sql_members="UPDATE members_table SET groupname='$groupsname' WHERE groupId =$id";
    $results =$db->query($sql);
    $results =$db->query($sql_members);
    header('Location: dynamics_group_members.php');
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
                        <div class='tab-header-container active'>
                            Create Groups
                        </div>
                    </a>
                    <a href='dynamics_members.php'>
                        <div class='tab-header-container'>
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
                                <label><span class='requiredFiled'>*</span>Group Name</label>
                                <input id='groupsname' name='groupsname' class='form-control'
                                    onblur='this.value=this.value.trim();' type='text' value='<?php echo $name;?>'>
                                <div class='discriptionErrorMsg nameerror'>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <label><span class='requiredFiled'></span>Group Discription</label>
                                <input id='groupsdiscription' name='groupsdiscription' class='form-control'
                                    onblur='this.value=this.value.trim();' type='text' value='<?php echo $discrpition;?>'>
                                <div class='discriptionErrorMsg nameerror'>
                                </div>
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