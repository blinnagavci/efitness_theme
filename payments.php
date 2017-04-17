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

        <title>E-Fitness | Payments</title>

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

        <div class="page-container">

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
                        <li>
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
                        <li class="has-sub  opened active">
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
                                <li >
                                    <a href="search_inventory.php">
                                        <span class="title">Search inventory</span>
                                    </a>
                                </li>
                                <li class="active">
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
                        Stock
                    </li>
                    <li class="active">
                        <strong>Payments</strong>
                    </li>
                </ol>

                <h2>Payments</h2>
                <br />
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel minimal minimal-gray">

                            <div class="panel-heading">
                                <div class="panel-title"><h4></h4></div>
                                <div class="panel-options">

                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#profile-1" data-toggle="tab">Purchases</a></li>
                                        <li><a href="#profile-2" data-toggle="tab">Sales</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile-1">
                                        <?php
                                        $sql = "SELECT * FROM item_payment_in";
                                        $result = $conn->query($sql);

                                        // output data of each row
                                        ?>
                                        <script type="text/javascript">
                                            jQuery(window).load(function () {
                                                var $table2 = jQuery("#table-2");

                                                // Initialize DataTable
                                                $table2.DataTable({
                                                    "autoWidth": false,
                                                    "sDom": "Bfrtip",
                                                    "iDisplayLength": 10,
                                                    //                            "columnDefs": [
                                                    //                                {"width": "20%", "targets": 0}
                                                    //                            ],
                                                    "aoColumns": [
                                                        null,
                                                        null,
                                                        null,
                                                        null,
                                                        null,
                                                        null,
                                                    ],
                                                    buttons: [
                                                        'excelHtml5',
                                                        'pdfHtml5'
                                                    ],
                                                    "bStateSave": true
                                                });
                                            });

                                        </script>

                                        <table class="table table-bordered table-striped datatable" id="table-2">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Payment Date</th>                            
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Cost Price</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()): ?>
                                                    <tr>
                                                        <td><?php echo $row['id'] ?></td>
                                                        <td><?php echo $row['payment_date'] ?></td>
                                                        <?php
                                                        $productID = $row['product_id'];
                                                        $sql1 = "SELECT * FROM item where id= '$productID'";
                                                        $result1 = $conn->query($sql1);
                                                        $row1 = $result1->fetch_assoc();
                                                        ?>
                                                        <td><?php echo $row1['name'] ?></td>
                                                        <td><?php echo $row['quantity'] ?></td>
                                                        <td><?php echo $row['cost_price'] . ' €' ?></td>
                                                        <td><?php echo $row['payment_amount'] . ' €' ?></td>
                                                    </tr>

                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane" id="profile-2">
                                        <?php
                                        $sql = "SELECT * FROM item_payment_out";
                                        $result = $conn->query($sql);

                                        // output data of each row
                                        ?>
                                        <script type="text/javascript">
                                            jQuery(window).load(function () {
                                                var $table2 = jQuery("#table-3");

                                                // Initialize DataTable
                                                $table2.DataTable({
                                                    "autoWidth": false,
                                                    "sDom": "Bfrtip",
                                                    "iDisplayLength": 10,
                                                    //                            "columnDefs": [
                                                    //                                {"width": "20%", "targets": 0}
                                                    //                            ],
                                                    "aoColumns": [
                                                        null,
                                                        null,
                                                        null,
                                                        null,
                                                        null,
                                                        null,
                                                    ],
                                                    buttons: [
                                                        'excelHtml5',
                                                        'pdfHtml5'
                                                    ],
                                                    "bStateSave": true
                                                });
                                            });

                                        </script>

                                        <table class="table table-bordered table-striped datatable" id="table-3">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Payment Date</th>                            
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()): ?>
                                                    <tr>
                                                        <td><?php echo $row['id'] ?></td>
                                                        <td><?php echo $row['payment_date'] ?></td>
                                                        <?php
                                                        $productID = $row['product_id'];
                                                        $sql2 = "SELECT * FROM item where id= '$productID'";
                                                        $result2 = $conn->query($sql2);
                                                        $row2 = $result2->fetch_assoc();
                                                        ?>
                                                        <td><?php echo $row2['name'] ?></td>
                                                        <td><?php echo $row['quantity'] ?></td>
                                                        <td><?php echo $row['unit_price'] . ' ' ?></td>
                                                        <td><?php echo $row['payment_amount'] . ' €' ?></td>
                                                    </tr>

                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <footer class="main">
                    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
                </footer>
            </div>
        </div>

        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/js/datatables/datatables.css">
        <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="assets/js/select2/select2.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/TweenMax.min.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>

        <!-- Imported scripts on this page -->
        <script src="assets/js/datatables/datatables.js"></script>
        <script src="assets/js/select2/select2.min.js"></script>
        <script src="assets/js/neon-chat.js"></script>

        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>

        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script> 
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
