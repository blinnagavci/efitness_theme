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
        <meta name="description" content="Neon Admin Panel" />
        <meta name="Blin Nagavci, Labian Gashi, Besarber Tasholli" content="" />

        <link rel="icon" href="assets/images/favicon.ico">

        <title>E-Fitness | Add employee</title>

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
                                <li class="">
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
                        <li class="has-sub  active opened active">
                            <a href="#">
                                <i class="entypo-briefcase"></i>
                                <span class="title">Employees</span>
                            </a>
                            <ul>
                                <li class="active">
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
                        Employees
                    </li>
                    <li class="active">

                        <strong>Add employee</strong>
                    </li>
                </ol>

                <h2>Add employee</h2>
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

                                <form role="form" id="add_employee_form" name="add_employee_form" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" novalidate="novalidate">

                                    <div class="form-group">
                                        <label for="employee_firstname" class="col-sm-3 control-label" >First name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_firstname" class="form-control" data-validate="required" id="employee_firstname">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_surname" class="col-sm-3 control-label">Last name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_surname" class="form-control" data-validate="required" id="employee_surname" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender_select" class="col-sm-3 control-label">Gender</label>

                                        <div class="col-sm-5">
                                            <select name="employee_gender" class="form-control" data-validate="required" id="employee_gender">
                                                <option value="disabled" disabled selected>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_date" class="col-sm-3 control-label">Birth date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" name="employee_date" id="employee_date" data-validate="required" class="form-control datepicker" data-end-date="+0d" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_address" class="col-sm-3 control-label">Residential address</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_address"  data-validate="required" class="form-control" id="employee_address" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_city" class="col-sm-3 control-label">City</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_city" class="form-control"  data-validate="required" id="employee_city" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="employee_telephone" class="col-sm-3 control-label">Phone no.</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_telephone" class="form-control" data-validate="required" id="employee_telephone" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_alternative" class="col-sm-3 control-label">Alternative no.</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_alternative" class="form-control"  data-validate="required" id="employee_alternative" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_email" class="col-sm-3 control-label">Email</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="employee_email" data-validate="required,email" id="employee_email" placeholder="">
                                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload photo</label>

                                        <div class="col-sm-5">

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                                    <img src="http://placehold.it/200x150" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="employee_upload" id="employee_upload" accept="image/*"   >
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_subscription" class="col-sm-3 control-label">Employee type</label>

                                        <div class="col-sm-5">
                                            <select name="employee_type" class="form-control"  data-validate="required" id="employee_type">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');

                                                $sql = 'SELECT employee_type FROM employee_type WHERE status= "0"';
                                                $retval = mysqli_query($conn, $sql);
                                                if (!$retval) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $retval->fetch_assoc()) {
                                                    $employee_type = $row['employee_type'];
                                                    echo "<option value='$employee_type'>$employee_type</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary_amount" class="col-sm-3 control-label">Salary amount</label>

                                        <div class="col-sm-5">
                                            <input type="number" name="salary_amount" class="form-control" data-validate="required" id="salary_amount" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="employee_start" class="col-sm-3 control-label">Start date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" data-validate="required" name="employee_start" id="employee_start" data-start-date="+0d" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_end" class="col-sm-3 control-label">End date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" data-validate="required" name="employee_end" id="employee_end" data-start-date="+0d" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
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
        <script src="assets/js/toastr.js"></script>
        <script>
            $(document).ready(function () {
                var url = window.location.href;
                var array = url.split('/');
                var lastsegment = array[array.length - 1];
                if (lastsegment === "add_employee.php#addemployeesuccess") {
                    addSuccess();
                    history.pushState("", document.title, window.location.pathname
                            + window.location.search);
                }
            });
            $('input.datepicker').on('changeDate', function (e) {
                $(this).datepicker('hide');
            });
            $("#add_employee_form").submit(function (e) {
                e.preventDefault();
                if ($(this).valid()) {
                    var firstname = $("#employee_firstname").val();
                    var surname = $("#employee_surname").val();
                    var gender = $("#employee_gender").val();
                    var birthdate = $("#employee_date").val();
                    var address = $("#employee_address").val();
                    var city = $("#employee_city").val();
                    var phoneno = $("#employee_telephone").val();
                    var alternativeno = $("#employee_alternative").val();
                    var email = $("#employee_email").val();
                    var employeetype = $("#employee_type").val();
                    var salaryamount = $("#salary_amount").val();
                    var startdate = $("#employee_start").val();
                    var enddate = $("#employee_end").val();
                    var form_data = new FormData();
                    var file_data;
                    var test = '';
                    if (!($("#employee_upload").val().length === 0)) {
                        file_data = $("#employee_upload").prop('files')[0];
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
                    form_data.append('employeetype', employeetype);
                    form_data.append('salaryamount', salaryamount);
                    form_data.append('startdate', startdate);
                    form_data.append('enddate', enddate);
                    form_data.append('test', test);
                    $.ajax({
                        type: "POST",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        url: "database/add_employee.php",
                        data: form_data,
                        success: function (text) {
                            if (text === "success") {
                                window.location = window.location + "#addemployeesuccess";
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
                toastr.success("Employee successfully added.", opts);
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
                toastr.error("Unfortunately, we ran into some problems trying to add the employee.", opts);
            }
        </script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>