<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: extra-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('database/db_connect.php'); ?>
        <title>E-Fitness | Settings</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="E-Fitness Admin Panel" />
        <meta name="Blin Nagavci, Labian Gashi, Besarber Tasholli" content="" />      

        <link rel="icon" href="assets/images/favicon.ico">

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
    <body class="page-body page-fade">
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
                                    <a href="payments.php">
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
                        <li>
                            <a href="accounts.php">
                                <i class="entypo-user"></i>
                                <span class="title">Accounts</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="other_settings.php">
                                <i class="entypo-cog active"></i>
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
                                <a href="database/logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                <hr />

                <ol class="breadcrumb bc-3" >
                    <li class="active">
                        Settings
                    </li>
                </ol>

                <h2>Settings</h2>
                <br />


                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">Membership</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form action='database/add_membership.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">
                                    <div class="form-group">
                                        <label for="membership_name" class="col-sm-3 control-label" >Membership type</label>

                                        <div class="col-sm-5">
                                            <input type="text" id="membership_type" name="membership_type" class="form-control" data-validate="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="membership_offer_name" class="col-sm-3 control-label" >Offer (optional description)</label>

                                        <div class="col-sm-5">
                                            <input type="text" id="membership_offer_name" name="membership_offer_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Branches</label>

                                        <div class="col-sm-7">
                                            <select multiple="multiple" name="branches_select_multiple[]" class="form-control multi-select" data-validate="required">
                                                <?php
                                                include('database/db_connect.php');
                                                $sqlb = 'SELECT * FROM branches WHERE status= "0"';
                                                $retvalb = mysqli_query($conn, $sqlb);
                                                if (!$retvalb) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($rowb = $retvalb->fetch_assoc()) {
                                                    $branch_temp_id = $rowb['id'];
                                                    $branch_city = $rowb['city'];
                                                    $branch_name = $rowb['branch'];
                                                    echo "<option value='$branch_temp_id'>$branch_city, $branch_name</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="membership_payment_amount" class="col-sm-3 control-label" >Amount</label>
                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text"  name="membership_payment_amount" id="membership_payment_amount" class="form-control" data-validate="required">
                                                <span class="input-group-btn">
                                                    <button type="submit" name="add_membership_submit" id="add_membership_submit" class="width-72 btn btn-primary">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>

                                </form>

                                <form action='database/remove_membership.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="gender_select" class="col-sm-3 control-label">Membership types</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <select name="remove_membership_select" class="form-control" data-validate="required" id="remove_membership_select">
                                                    <option value="disabled" disabled selected>Select</option>

                                                    <?php
                                                    include('database/db_connect.php');
                                                    $sql = 'SELECT * FROM membership WHERE status= "0"';
                                                    $retval = mysqli_query($conn, $sql);
                                                    if (!$retval) {
                                                        echo ("Could not retrieve data" . mysql_error());
                                                    }
                                                    while ($row = $retval->fetch_assoc()) {
                                                        $tempId = $row['id'];
                                                        $membership = $row['membership_type'];
                                                        $offer = $row['offer'];
                                                        if($offer===""){
                                                            echo "<option value='$tempId'>$membership</option>";
                                                        }
                                                        else{
                                                            echo "<option value='$tempId'>$membership, $offer</option>";
                                                        }
                                                    }
                                                    mysqli_close($conn);
                                                    ?>
                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="remove_membership_submit" id="remove_membership_submit" class="btn btn-primary">Remove</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>


                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">Employee type</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form action='database/add_employee_type.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="employeetype_settings" class="col-sm-3 control-label" >New employee type</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text"  name="employeetype_settings" id="employeetype_settings" class="form-control" data-validate="required">
                                                <span class="input-group-btn">
                                                    <button type="submit" name="add_employee_type_submit" id="add_employee_type_submit" class="width-72 btn btn-primary">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </form>
                                <form action='database/remove_employee_type.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="remove_employee_type_select" class="col-sm-3 control-label">Employee types</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <select name="remove_employee_type_select" class="form-control" data-validate="required" id="remove_employee_type_select">
                                                    <option value="disabled" disabled selected>Select</option>
                                                    <?php
                                                    include('database/db_connect.php');
                                                    $sql1 = 'SELECT id, employee_type FROM employee_type WHERE status= "0"';
                                                    $retval1 = mysqli_query($conn, $sql1);
                                                    if (!$retval1) {
                                                        echo ("Could not retrieve data" . mysql_error());
                                                    }
                                                    while ($row = $retval1->fetch_assoc()) {
                                                        $employeeId = $row['id'];
                                                        $employeetype = $row['employee_type'];
                                                        echo "<option value='$employeeId'>$employeetype</option>";
                                                    }
                                                    mysqli_close($conn);
                                                    ?>

                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="remove_employee_type_submit" id="remove_employee_type_submit" class="btn btn-primary">Remove</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">Category</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form action='database/add_item_category.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="item_category_settings" class="col-sm-3 control-label" >New item category</label>

                                        <div class="col-md-5">
                                            <input type="text"  name="item_category_settings" id="item_category_settings" class="form-control" data-validate="required">

                                            <div class="input-group" style="margin-top: 10px;">
                                                <select name="item_category_sellable" id="item_category_sellable" class="form-control" data-validate="required">
                                                    <option value="disabled" disabled selected>Select</option>
                                                    <option value="0">Sellable</option>
                                                    <option value="1">Not sellable</option>
                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="add_item_category_submit" id="add_item_category_submit" class="width-72 btn btn-primary">Add</button>
                                                </span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group"></div>

                                </form>
                                <form action='database/remove_item_category.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="remove_item_category_select" class="col-sm-3 control-label">Item categories</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <select id="remove_item_category_select" name="remove_item_category_select" class="form-control" data-validate="required">
                                                    <option value="disabled" disabled selected>Select</option>
                                                    <?php
                                                    include('database/db_connect.php');
                                                    $sql2 = 'SELECT id, category FROM item_category WHERE status= "0"';
                                                    $retval2 = mysqli_query($conn, $sql2);
                                                    if (!$retval2) {
                                                        echo ("Could not retrieve data" . mysql_error());
                                                    }
                                                    while ($row = $retval2->fetch_assoc()) {
                                                        $itemcategoryId = $row['id'];
                                                        $itemcategory = $row['category'];
                                                        echo "<option value='$itemcategoryId'>$itemcategory</option>";
                                                    }
                                                    mysqli_close($conn);
                                                    ?>

                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="remove_item_category_submit" id="remove_item_category_submit" class="btn btn-primary">Remove</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">Unit</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form action='database/add_item_unit.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="item_unit_settings" class="col-sm-3 control-label" >New item unit</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" id="item_unit_settings" name="item_unit_settings" class="form-control" data-validate="required">
                                                <span class="input-group-btn">
                                                    <button type="submit" name="add_item_unit_submit" id="add_item_unit_submit" class="width-72 btn btn-primary">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </form>
                                <form action='database/remove_item_unit.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="remove_item_unit_select" class="col-sm-3 control-label">Item units</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <select id="remove_item_unit_select" name="remove_item_unit_select" class="form-control" data-validate="required">
                                                    <option value="disabled" disabled selected>Select</option>
                                                    <?php
                                                    include('database/db_connect.php');
                                                    $sql4 = 'SELECT id, unit FROM item_unit WHERE status= "0"';
                                                    $retval4 = mysqli_query($conn, $sql4);
                                                    if (!$retval4) {
                                                        echo ("Could not retrieve data" . mysql_error());
                                                    }
                                                    while ($row = $retval4->fetch_assoc()) {
                                                        $itemunitId = $row['id'];
                                                        $itemunit = $row['unit'];
                                                        echo "<option value='$itemunitId'>$itemunit</option>";
                                                    }
                                                    mysqli_close($conn);
                                                    ?>

                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="remove_item_unit_submit" id="remove_item_unit_submit" class="btn btn-primary">Remove</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">Branch</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form action='database/add_branch.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="branch_city" class="col-sm-3 control-label" >Branch city</label>

                                        <div class="col-sm-5">
                                            <input type="text" id="branch_city" name="branch_city" class="form-control" data-validate="required">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="branch_name" class="col-sm-3 control-label">Branch name</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" id="branch_name" name="branch_name" class="form-control" data-validate="required"  >
                                                <span class="input-group-btn">
                                                    <button type="submit" name="add_branch_submit" id="add_branch_submit" class="width-72 btn btn-primary">Add</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </form>
                                <form action='database/remove_branch.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="remove_branch_select" class="col-sm-3 control-label">Remove branch</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <select name="remove_branch_select" class="form-control" data-validate="required" id="remove_branch_select">
                                                    <option value="disabled" disabled selected>Select</option>
                                                    <?php
                                                    include('database/db_connect.php');
                                                    $sqlrb = 'SELECT * FROM branches WHERE status= "0"';
                                                    $retvalrb = mysqli_query($conn, $sqlrb);
                                                    if (!$retvalrb) {
                                                        echo ("Could not retrieve data" . mysql_error());
                                                    }
                                                    while ($rowrb = $retvalrb->fetch_assoc()) {
                                                        $tempId = $rowrb['id'];
                                                        $branch_city = $rowrb['city'];
                                                        $branch_name = $rowrb['branch'];
                                                        echo "<option value='$tempId'>$branch_city, $branch_name</option>";
                                                    }
                                                    mysqli_close($conn);
                                                    ?>

                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="remove_branch_submit" id="remove_branch_submit" class="btn btn-primary">Remove</button>
                                                </span>
                                            </div>
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
        <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="assets/js/select2/select2.css">
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