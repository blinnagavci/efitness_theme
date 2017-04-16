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

        <title>E-Fitness | Add member</title>

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
                        <li class="has-sub active opened active">
                            <a href="#">
                                <i class="entypo-users"></i>
                                <span class="title">Members</span>
                            </a>
                            <ul>
                                <li class="active">
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
                                <span class="title">Stock</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_item.php">
                                        <span class="title">Add item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_inventory.php">
                                        <span class="title">Search stock</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="payments.php">
                                        <span class="title">Payments</span>
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
                                        <a href="edit_profile.php">
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
                        Members
                    </li>
                    <li class="active">

                        <strong>Add member</strong>
                    </li>
                </ol>

                <h2>Add member</h2>
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

                                <form id="add-member-form" name="add-member-form" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered validate" novalidate="novalidate">

                                    <div class="form-group">
                                        <label for="member_firstname" class="col-sm-3 control-label" >First name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_firstname" class="form-control" data-validate="required" id="member_firstname">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="member_surname" class="col-sm-3 control-label">Last name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_surname" class="form-control" data-validate="required" id="member_surname" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>

                                        <div class="col-sm-5">
                                            <select name="member_gender" id="member_gender" class="form-control" data-validate="required">
                                                <option value="disabled" disabled selected>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Birth date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" name="member_date" id="member_date" data-validate="required" class="form-control datepicker" data-end-date="+0d" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="member_address" class="col-sm-3 control-label">Residential address</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_address"  data-validate="required" class="form-control" id="member_address" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="member_city" class="col-sm-3 control-label">City</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_city" class="form-control"  data-validate="required" id="member_city" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="member_telephone" class="col-sm-3 control-label">Phone no.</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_telephone" class="form-control" data-validate="required" id="member_telephone" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="member_alternative" class="col-sm-3 control-label">Alternative no.</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_alternative" class="form-control"  data-validate="required" id="member_alternative" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="member_email" data-validate="required,email" id="member_email" placeholder="">
                                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload photo</label>

                                        <div class="col-sm-5">

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                                    <img src="assets/images/img200x150.png" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="member_upload" id="member_upload" accept="image/*"   >
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Membership type</label>

                                        <div class="col-sm-5">
                                            <select name="member_subscription" class="form-control"  data-validate="required" id="member_subscription">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('inc/database/db_connect.php');

                                                $sql = 'SELECT id, membership_type, offer, amount FROM membership WHERE status= "0"';
                                                $retval = mysqli_query($conn, $sql);
                                                if (!$retval) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $retval->fetch_assoc()) {
                                                    $membershipId = $row['id'];
                                                    $membership = $row['membership_type'];
                                                    $membershipOffer = $row['offer'];
                                                    $membershipAmount = $row['amount'];
                                                    if ($membershipOffer === "") {
                                                        echo "<option value='$membershipId'>$membership, $membershipAmount €</option>";
                                                    } else {
                                                        echo "<option value='$membershipId'>$membership, $membershipOffer, $membershipAmount €</option>";
                                                    }
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Start date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" data-validate="required" id="membership-start" name="membership_start" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">End date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" data-validate="required" id="membership-end" name="membership_end" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" id="add-member-submit" name="add-member-submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                <footer class="main">

                    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved

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
        <script type="text/javascript">
            $(document).ready(function () {
                var url = window.location.href;
                var array = url.split('/');
                var lastsegment = array[array.length - 1];
                if (lastsegment === "add_member.php#addmembersuccess") {
                    addSuccess();
                    history.pushState("", document.title, window.location.pathname
                            + window.location.search);
                }
            });
            $('input.datepicker').on('changeDate', function (e) {
                $(this).datepicker('hide');
            });
            $("#add-member-form").submit(function (e) {
                e.preventDefault();
                if ($(this).valid()) {
                    var firstname = $("#member_firstname").val();
                    var surname = $("#member_surname").val();
                    var gender = $("#member_gender").val();
                    var birthdate = $("#member_date").val();
                    var address = $("#member_address").val();
                    var city = $("#member_city").val();
                    var phoneno = $("#member_telephone").val();
                    var alternativeno = $("#member_alternative").val();
                    var email = $("#member_email").val();
                    var membershipId = $("#member_subscription").val();
                    var startdate = $("#membership-start").val();
                    var enddate = $("#membership-end").val();
                    var form_data = new FormData();
                    var file_data;
                    var test = '';
                    if (!($("#member_upload").val().length === 0)) {
                        file_data = $("#member_upload").prop('files')[0];
                        form_data.append('file', file_data);
                        var test = 'pic';
                    }
                    form_data.append('firstname', firstname);
                    form_data.append('surname', surname);
                    form_data.append('gender', gender);
                    form_data.append('birthdate', birthdate);
                    form_data.append('address', address);
                    form_data.append('city', city);
                    form_data.append('phoneno', phoneno);
                    form_data.append('alternativeno', alternativeno);
                    form_data.append('email', email);
                    form_data.append('membershipId', membershipId);
                    form_data.append('startdate', startdate);
                    form_data.append('enddate', enddate);
                    form_data.append('test', test);
                    $.ajax({
                        type: "POST",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        url: "database/add_member.php",
                        data: form_data,
                        success: function (text) {
                            if (text === "success") {
                                window.location = window.location + "#addmembersuccess";
                                location.reload();
                            } else {
                                addFail();
                            }
                        }
                    });
                }
            });
            function addSuccess() {
                opts = {
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
                toastr.success("Member successfully added", opts);
            }
            function addFail() {
                opts = {
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
                toastr.error("Unfortunately, we ran into some problems trying to add the member", opts);
            }
        </script>

    </body>
</html>