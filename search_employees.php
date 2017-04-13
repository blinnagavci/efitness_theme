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

        <title>E-Fitness | Search employees</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.3.min.js"></script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


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
                                <li>
                                    <a href="add_employee.php">
                                        <span class="title">Add employee</span>
                                    </a>
                                </li>
                                <li class="active">
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
                        Employees
                    </li>
                    <li class="active">
                        <strong>Search employees</strong>
                    </li>
                </ol>
                <?php
                $sql = "SELECT id, first_name, last_name, gender, city, birth_date, telephone_no FROM employee where status='0'";
                $result = $conn->query($sql);


                // output data of each row
                ?>
                <h2>Search employees</h2>
                <br />
                <script type="text/javascript">
                    jQuery(window).load(function () {
                        var $table_employees = jQuery("#tableEmployees");

                        // Initialize DataTable
                        $table_employees.DataTable({
                            "sDom": "Bfrtip",
                            "iDisplayLength": 10,
                            "aoColumns": [
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                {"bSortable": false}
                            ],
                            buttons: [
                                'excelHtml5',
                                'pdfHtml5'
                            ],
                            "bStateSave": true
                        });
                    });

                </script>

                <table class="table table-bordered table-striped datatable" id="tableEmployees">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Date of Birth</th>
                            <th>Phone no.</th>
                            <th>Position</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['first_name'] . ' ', $row['last_name'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['city'] ?></td>
                                <td><?php echo $row['birth_date'] ?></td>
                                <td><?php echo $row['telephone_no'] ?></td>
                                <?php
                                $employeeID = $row['id'];
                                $employeeLastestContract = mysqli_query($conn, "SELECT employee_type_id from employee_contract WHERE employee_id ='$employeeID' ORDER BY id DESC");
                                $employeeContract = mysqli_fetch_row($employeeLastestContract);
                                $employeeJobPosition = mysqli_query($conn, "SELECT employee_type from employee_type WHERE id ='$employeeContract[0]'");
                                $employeeJob = mysqli_fetch_row($employeeJobPosition);
                                ?>
                                <td><?php echo $employeeJob[0] ?></td>
                                <td>
                                    <a href="#" class="btn btn-default btn-sm btn-icon icon-left editButton" data-toggle='modal' data-target='#modal_edit'  data-id='<?php echo $row["id"]; ?>'>
                                        <i class="entypo-pencil"></i>
                                        Edit
                                    </a>

                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left delete-employee" name="delete-employee" data-toggle='modal' data-target='#modal-delete' data-id='<?php echo $row["id"]; ?>'>
                                        <i class="entypo-cancel"></i>
                                        Delete
                                    </a>

                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left contractButton" data-toggle='modal' data-target='#modal_add_contract' data-id='<?php echo $row["id"]; ?>' >
                                        <i class="entypo-check"></i>
                                        Contracts
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br />
                <a href="add_employee.php" class="btn btn-primary" >
                    <i class="entypo-plus"></i>
                    Add Employee
                </a>
                <div id="modal_edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" id="modal_edit_content">

                        </div>

                    </div>
                </div>

                <div id="modal_add_contract" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="width: 80%">

                        <!-- Modal content-->
                        <div class="modal-content" id="modal_add_contract_content">

                        </div>

                    </div>
                </div>
                <div id="modal-delete" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" id="modal_delete_employee_content">

                        </div>

                    </div>
                </div>

                <footer class="main">
                    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
                </footer>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var url = window.location.href;
                var array = url.split('/');
                var lastsegment = array[array.length - 1];
                switch (lastsegment) {
                    case "search_employees.php#deleteemployeesuccess":
                        deleteEmployeeSuccess();
                        removeHash();
                        break;
                    case "search_employees.php#editemployeesuccess":
                        editEmployeeSuccess();
                        removeHash();
                        break;
                    case "search_employees.php#addcontractsuccess":
                        addContractSuccess();
                        removeHash();
                        break;
                    default:
                        break;
                }
                function removeHash() {
                    history.pushState("", document.title, window.location.pathname
                            + window.location.search);
                }
                $('.editButton').click(function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "edit_employee.php?id=" + id, cache: false, success: function (result) {
                            $('#modal_edit_content').html(result);
                        }
                    });
                });
                $(".delete-employee").click(function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "remove_employee.php?id=" + id, cache: false, success: function (result) {
                            $('#modal_delete_employee_content').html(result);
                        }
                    });
                });
                $('.contractButton').click(function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "add_contract_employee.php?id=" + id, cache: false, success: function (result) {
                            $('#modal_add_contract_content').html(result);
                        }
                    });
                });
            });
            function toastrAlert() {
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
            }
            function addEmployeeSuccess() {
                toastrAlert();
                toastr.success("Employee successfully added.", opts);
            }
            function editEmployeeSuccess() {
                toastrAlert();
                toastr.success("Employee successfully edited.", opts);
            }
            function deleteEmployeeSuccess() {
                toastrAlert();
                toastr.success("Employee successfully deleted.", opts);
            }
            function addEmployeeFail() {
                toastrAlert();
                toastr.error("Unfortunately, we ran into some problems trying to add the employee.", opts);
            }
            function deleteEmployeeFail() {
                toastrAlert();
                toastr.error("Unfortunately, we ran into some problems trying to delete the employee.", opts);
            }
            function addContractSuccess() {
                toastrAlert();
                toastr.success("Contract successfully added.", opts);
            }
            function addContractFail() {
                toastrAlert();
                toastr.error("Unfortunately, we ran into some problems trying to add the contract.", opts);
            }
        </script>

        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/js/datatables/datatables.css">
        <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="assets/js/select2/select2.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/TweenMax.min.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>

        <!-- Imported scripts on this page -->
        <script src="assets/js/datatables/datatables.js"></script>
        <script src="assets/js/select2/select2.min.js"></script>
        <script src="assets/js/neon-chat.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>
        <script src="assets/js/toastr.js"></script>

        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script> 
    </body>
</html>
