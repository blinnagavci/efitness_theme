<!DOCTYPE html>
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
    <body class="page-body  page-fade" data-url="">
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
                                        <span class="title">Add Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_members.php">
                                        <span class="title">Search Members</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub opened active">
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
                                        <span class="title">Add Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_item.php">
                                        <span class="title">Search Inventory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="sales.php">
                                        <span class="title">Sales</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="entypo-folder"></i>
                                <span class="title">Reports</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="entypo-user"></i>
                                <span class="title">Accounts</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="entypo-tools"></i>
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
                                    <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
                                    Blin Nagavci
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


                                    <li>
                                        <a href="extra-calendar.html">
                                            <i class="entypo-calendar"></i>
                                            Calendar
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
                                <a href="extra-login.html">
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

                                <form action='database/add_employee.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate" novalidate="novalidate">

                                    <div class="form-group">
                                        <label for="employee_firstname" class="col-sm-3 control-label" >First Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_firstname" class="form-control" data-validate="required" id="employee_firstname">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_surname" class="col-sm-3 control-label">Last Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_surname" class="form-control" data-validate="required" id="employee_surname" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender_select" class="col-sm-3 control-label">Gender</label>

                                        <div class="col-sm-5">
                                            <select name="employee_gender" class="form-control" data-validate="required" id="gender_select">
                                                <option value="disabled" disabled selected>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_date" class="col-sm-3 control-label">Birth Date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" name="employee_date" data-validate="required" class="form-control datepicker" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_address" class="col-sm-3 control-label">Residential Address</label>

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
                                        <label for="employee_telephone" class="col-sm-3 control-label">Phone No.</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_telephone" class="form-control" data-validate="required" id="employee_telephone" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_alternative" class="col-sm-3 control-label">Alternative No.</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="employee_alternative" class="form-control"  data-validate="required" id="employee_alternative" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_email" class="col-sm-3 control-label">Email</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="employee_email" data-validate="required, email" id="employee_email" placeholder="">
                                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload Photo</label>

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
                                                        <input type="file" name="employee_upload" id="employee-upload" accept="image/*"   >
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_subscription" class="col-sm-3 control-label">Employee type</label>

                                        <div class="col-sm-5">
                                            <select name="employee_subscription" class="form-control"  data-validate="required" id="employee_subscription">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('inc/database/db_connect.php');

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
                                            <input type="text" name="salary_amount" class="form-control" data-validate="required" id="salary_amount" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="employee_start" class="col-sm-3 control-label">Start Date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" data-validate="required" name="employee_start" id="employee_start" data-format="dd/mm/yyyy">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_end" class="col-sm-3 control-label">End Date</label>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" data-validate="required" name="employee_end" id="employee_end" data-format="dd/mm/yyyy">

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




                <div class="row">
                    <div class="col-md-12">


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

    </body>
</html>