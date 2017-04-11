<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: extra-login.php');
}
?>
<html lang="en">
    <head>
        <?php require('database/db_connect.php'); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="E-Fitness Admin Panel" />
        <meta name="Blin Nagavci, Labian Gashi, Besarber Tasholli" content="" />

        <link rel="icon" href="assets/images/favicon.ico">

        <title>E-Fitness | Edit Profile</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.3.min.js"></script>


    </head>
    <body class="page-body  page-fade">

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <div class="sidebar-menu">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/images/logo@2x.png" width="120" alt="" />
                            </a>
                        </div>

                        <!-- logo collapse icon -->
                        <div class="sidebar-collapse">
                            <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>


                        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                        <div class="sidebar-mobile-menu visible-xs">
                            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>

                    </header>


                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <li class="">
                            <a href="index.php">
                                <i class="entypo-gauge"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-users"></i>
                                <span class="title">Members</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_member.php">
                                        <span class="title">Add member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_members.php">
                                        <span class="title">Search members</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-briefcase"></i>
                                <span class="title">Employees</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_employee.php">
                                        <span class="title">Add employee</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_employees.php">
                                        <span class="title">Search employees</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-database"></i>
                                <span class="title">Inventory</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_item.php">
                                        <span class="title">Add item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_inventory.php">
                                        <span class="title">Search inventory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="sales.php">
                                        <span class="title">Sales</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--                        <li class="">
                                                    <a href="">
                                                        <i class="entypo-folder"></i>
                                                        <span class="title">Reports</span>
                                                    </a>
                                                </li>-->
                        <li class="">
                            <a href="accounts.php">
                                <i class="entypo-user"></i>
                                <span class="title">Accounts</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="other_settings.php">
                                <i class="entypo-cog"></i>
                                <span class="title">Settings</span>
                            </a>
                        </li>


                    </ul>

                </div>

            </div>

            <div class="main-content">

                <div class="row">

                    <!-- Profile Info and Notifications -->
                    <div class="col-md-6 col-sm-8 clearfix">

                        <ul class="user-info pull-left pull-none-xsm">

                            <!-- Profile Info -->
                            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="repository/account_photos/<?php
                                    if ($_SESSION['profile_photo'] == '') {
                                        echo 'empty-profile-icon.png';
                                    } else {
                                        echo $_SESSION['profile_photo'];
                                    }
                                    ?>" alt="Profile" class="img-circle" width="44" />
                                         <?php echo $_SESSION['username']; ?>
                                </a>

                                <ul class="dropdown-menu">

                                    <!-- Reverse Caret -->
                                    <li class="caret"></li>

                                    <!-- Profile sub-links -->
                                    <li>
                                        <a href="extra-timeline.html">
                                            <i class="entypo-user"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                        <ul class="user-info pull-left pull-right-xs pull-none-xsm">


                        </ul>

                    </div>


                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                        <ul class="list-inline links-list pull-right">	

                            <li>
                                <a href="database/logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                <hr />

                <ol class="breadcrumb bc-3" >
                    <li>
                        Dashboard
                    </li>
                    <li class="active">

                        <strong>Edit Profile</strong>
                    </li>
                </ol>

                <h2>Edit Profile</h2>
                <br />


                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                </div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form id="editprofile_form" name="editprofile_form" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate">
                                    <?php
                                    require('database/db_connect.php');
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT id, username, password, email, admin_status, photo FROM account WHERE id = '$id'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <input type="hidden" id="test-id" name="test-id" value="<?php echo $row['id']; ?>"/>
                                    <div class="form-group">
                                        <label for="account_username" class="col-sm-3 control-label" >Username</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="account_username" class="form-control" id="account_username" value='<?php echo $row['username']; ?>' required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="account_password" class="col-sm-3 control-label">Password</label>

                                        <div class="col-sm-5">
                                            <input type="password" name="account_password" class="form-control" required id="account_password" value='<?php echo $row['password']; ?>' readonly ondblclick="this.readOnly = ''; value = '';">
                                            <p class="double-click">Double click to change the password</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" >Email</label>

                                        <div class="col-sm-5">
                                            <input type="email" class="form-control" name="account_email" required id="account_email" placeholder="" value='<?php echo $row['email']; ?>'>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload photo</label>

                                        <div class="col-sm-5">

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                                    <?php
                                                    if ($row['photo'] === '') {
                                                        echo '<img src="http://placehold.it/200x150" alt="Empty Photo"/>';
                                                    } else {
                                                        ?>
                                                        <img src="repository/account_photos/<?php echo $row["photo"]; ?>" alt="Photo">
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="account_upload" id="account_upload" accept="image/*"   >
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Account Type</label>

                                        <div class="col-sm-5">
                                            <select id="account_type" name="account_type" class="form-control" required>
                                                <?php
                                                $status = $row['admin_status'];
                                                if ($status == 0) {
                                                    echo '<option value="0" selected>Admin</option>';
                                                } else {
                                                    echo '<option value="1" selected>User</option>';
                                                }
                                                ?>                    
                                                <?php
                                                switch ($row['admin_status']) {
                                                    case '0':
                                                        echo '<option value="1">User</option>';
                                                        break;
                                                    case '1':
                                                        echo '<option value="0">Admin</option>';
                                                        break;
                                                    default:
                                                        echo 'Something went wrong';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <input  type="submit" value="Submit" name="account_edit_submit" id="account_edit_submit" class="btn btn-primary btn-block" />
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                <footer class="main">
                    <div class="col-md-6">
                        <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
                    </div>
                </footer>
            </div>


        </div>




        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/TweenMax.min.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/select2/select2.min.js"></script>
        <script src="assets/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/js/typeahead.min.js"></script>
        <script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
        <script src="assets/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/bootstrap-timepicker.min.js"></script>
        <script src="assets/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/daterangepicker/daterangepicker.js"></script>
        <script src="assets/js/jquery.multi-select.js"></script>
        <script src="assets/js/icheck/icheck.min.js"></script>
        <script src="assets/js/neon-chat.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <!-- Imported scripts on this page -->
        <script src="assets/js/bootstrap-switch.min.js"></script>
        <script src="assets/js/neon-chat.js"></script>

        <script src="assets/js/fileinput.js"></script>
        <script src="assets/js/dropzone/dropzone.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>
        <script src="assets/js/toastr.js" type="text/javascript"></script>
        <script>
                                                $("#deactivate-account").click(function () {
                                                    window.location("database/logout.php");
                                                });
                                                $(document).ready(function () {
                                                    history.pushState("", document.title, window.location.pathname
                                                            + window.location.search);
                                                });
                                                var url = window.location.href;
                                                var array = url.split('/');
                                                var lastsegment = array[array.length - 1];
                                                if (lastsegment === "edit_profile.php#editprofilesuccess") {
                                                    editProfileSuccess();
                                                }
                                                $("#editprofile_form").submit(function (event) {
                                                    $editForm = $(this);
                                                    event.preventDefault();
                                                    if ($editForm.valid()) {
                                                        var id = $("#test-id").val();
                                                        var username = $("#account_username").val();
                                                        var temporarypassword = $("#account_password").val();
                                                        var email = $("#account_email").val();
                                                        var account_type = $("#account_type").val();
                                                        var form_data = new FormData();
                                                        var file_data;
                                                        var test = '';
                                                        if (!($("#account_upload").val().length === 0)) {
                                                            file_data = $("#account_upload").prop('files')[0];
                                                            form_data.append('file', file_data);
                                                            var test = 'pic';
                                                        }
                                                        form_data.append('username', username);
                                                        form_data.append('temporarypassword', temporarypassword);
                                                        form_data.append('email', email);
                                                        form_data.append('id', id);
                                                        form_data.append('account_type', account_type);
                                                        form_data.append('test', test);
                                                        $.ajax({
                                                            type: "POST",
                                                            dataType: 'text',
                                                            cache: false,
                                                            contentType: false,
                                                            processData: false,
                                                            url: "database/edit_profile_db.php",
                                                            data: form_data,
                                                            success: function (text) {
                                                                if (text === "success") {
                                                                    window.location = window.location + "#editprofilesuccess";
                                                                    location.reload();
                                                                } else {
                                                                    editAccountFail();
                                                                }
                                                            }
                                                        });
                                                    }

                                                });
                                                function editProfileSuccess() {
                                                    var opts = {
                                                        "closeButton": true,
                                                        "debug": false,
                                                        "positionClass": "toast-top-full-width",
                                                        "onclick": null,
                                                        "showDuration": "300",
                                                        "hideDuration": "1000",
                                                        "timeOut": "5000",
                                                        "extendedTimeOut": "1000",
                                                        "showEasing": "swing",
                                                        "hideEasing": "linear",
                                                        "showMethod": "fadeIn",
                                                        "hideMethod": "fadeOut"
                                                    };
                                                    toastr.success("Profile successfully edited.", opts);
                                                }
                                                function editProfileFail() {
                                                    var opts = {
                                                        "closeButton": true,
                                                        "debug": false,
                                                        "positionClass": "toast-top-full-width",
                                                        "onclick": null,
                                                        "showDuration": "300",
                                                        "hideDuration": "1000",
                                                        "timeOut": "5000",
                                                        "extendedTimeOut": "1000",
                                                        "showEasing": "swing",
                                                        "hideEasing": "linear",
                                                        "showMethod": "fadeIn",
                                                        "hideMethod": "fadeOut"
                                                    };
                                                    toastr.error("Unfortunately, we ran into some problems trying to edit your profile.", opts);
                                                }

        </script>
    </body>
</html>