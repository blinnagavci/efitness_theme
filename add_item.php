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
        <title>E-Fitness | Add item</title>

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
                        <li class="has-sub opened active">
                            <a href="#">
                                <i class="entypo-database"></i>
                                <span class="title">Inventory</span>
                            </a>
                            <ul>
                                <li class="active">
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
                    <li>
                        Inventory
                    </li>
                    <li class="active">
                        <strong>Add item</strong>
                    </li>
                </ol>
                <h2>Add item</h2>
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

                                <form role="form" id="add_item_form" action="database/add_item.php" name="add_item_form" method="post" class="form-horizontal form-groups-bordered validate">

                                    <div class="form-group">
                                        <label for="item_name" class="col-sm-3 control-label">Item Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="item_name" id="item_name" data-validate="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="company_name" class="col-sm-3 control-label">Company Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="company_name" id="company_name" data-validate="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="item_category" class="col-sm-3 control-label">Category</label>

                                        <div class="col-sm-5">
                                            <select name="item_category" id="item_category" class="form-control" data-validate="required">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');

                                                $sql = 'SELECT category FROM item_category WHERE status="0"';
                                                $select_category = mysqli_query($conn, $sql);
                                                if (!$select_category) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $select_category->fetch_assoc()) {
                                                    $item_category = $row['category'];
                                                    echo "<option value='$item_category'>$item_category</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

<!--                                        <script type="text/javascript">
                                            $("#item_category").change(function () {

                                                var model = $('#item_category').val();
                                        <?php
                                        //$test = $_GET['item_category'];
                                        //$category_s = mysqli_query($conn, "SELECT sellable FROM item_category WHERE sellable = '$test'");
                                        //$sellable = mysqli_fetch_row($category_s);
                                        ?>

                                                var val = '<?php //echo $sellable[0];      ?>';
                                                console.log(val);
                                                if (val == '1') {
                                                    if ($(".form-group").hasClass("selling-price")) {
                                                        $(".selling-price").addClass("hide");
                                                        $(".selling-price input").attr("data-validate: ''");
                                                    }
                                                } else if (val != '1') {
                                                    $(".selling-price").removeClass("hide");
                                                }
                                            });
                                        </script>-->
                                    </div>

                                    <div class="form-group">
                                        <label for="item_barcode" class="col-sm-3 control-label">Barcode</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="item_barcode" id="item_barcode" data-validate="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="item_price" class="col-sm-3 control-label ">Cost Price</label>

                                        <div class="col-sm-5">
                                            <input type="number" class="form-control totalControl" name="item_price" id="item_price" data-validate="required">
                                        </div>
                                    </div>
                                    <div class="form-group selling-price">
                                        <label for="item_selling_price" class="col-sm-3 control-label">Selling Price</label>

                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" name="item_selling_price" id="item_selling_price" data-validate="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="item_unit" class="col-sm-3 control-label">Unit</label>

                                        <div class="col-sm-5">
                                            <select name="item_unit" id="item_unit" class="form-control" data-validate="required">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');

                                                $sql = 'SELECT * FROM item_unit WHERE status="0" ';
                                                $select_unit = mysqli_query($conn, $sql);
                                                if (!$select_unit) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $select_unit->fetch_assoc()) {
                                                    $select_unitt = $row['unit'];
                                                    echo "<option value='$select_unitt'>$select_unitt</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                                                      
                                    <div class="form-group">
                                        <label for="item_quantity" class="col-sm-3 control-label">Quantity</label>

                                        <div class="col-sm-5">
                                            <input type="number" class="form-control totalControl" name="item_quantity" id="item_quantity" value="1" data-validate="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="item_tax" class="col-sm-3 control-label">Tax</label>

                                        <div class="col-sm-5">
                                            <input type="number" class="form-control totalControl" name="item_tax" id="item_tax" data-validate="required" value="18.00" readonly ondblclick="this.readOnly = ''; value = '';">
                                            <p class="double-click" style="margin: 10px 0px 0px 0px">Double click to change the tax value</p>
                                        </div>
                                    </div>                

                                    <div class="form-group">
                                        <label for="item_total" class="col-sm-3 control-label">TOTAL</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="item_total" id="item_total" data-validate="required" value="0 €" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" name="add_item" class="btn btn-block btn-primary">Add Item</button>
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
        <script type="text/javascript">
            $(".totalControl").change(function () {
                var price = $('#item_price').val();
                var quantity = $('#item_quantity').val();
                var tax = $('#item_tax').val();
                var temporary = tax / 100;
                var realTax = (price * quantity) * temporary;
                
                var total = (price * quantity) + realTax;
                
                console.log(total);
                
                $('#item_total').val(total + " €");
            });
        </script>


        <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/TweenMax.min.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

        <!-- Imported scripts on this page -->
        <script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
        <script src="assets/js/jquery.sparkline.min.js"></script>
        <script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
        <script src="assets/js/rickshaw/rickshaw.min.js"></script>
        <script src="assets/js/raphael-min.js"></script>
        <!-- <script src="assets/js/morris.min.js"></script> -->
        <script src="assets/js/toastr.js"></script>
        <script src="assets/js/neon-chat.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>

    </body>
</html>