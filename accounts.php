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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="E-Fitness Admin Panel" />
        <meta name="Blin Nagavci, Labian Gashi, Besarber Tasholli" content="" />

        <link rel="icon" href="assets/images/favicon.ico">

        <title>E-Fitness | Accounts</title>

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
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-briefcase"></i>
                                <span class="title">Employees</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_employee.php">
                                        <span class="title">Add Employee</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_employees.php">
                                        <span class="title">Search Employees</span>
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
                                <li class="">
                                    <a href="add_item.php">
                                        <span class="title">Add Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_inventory.php">
                                        <span class="title">Search Inventory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="payments.php">
                                        <span class="title">Payments</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="opened active">
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
                    <li class="active">
                        <strong>Accounts</strong>
                    </li>
                </ol>
                <?php
                $sql = "SELECT * from account WHERE status='0'";
                $result = $conn->query($sql);


                // output data of each row
                ?>
                <h2>Manage Accounts</h2>
                <br />
                <script type="text/javascript">
                    jQuery(window).load(function () {
                        var $table3 = jQuery("#table-accounts");
                        // Initialize DataTable
                        $table3.DataTable({
                            "autoWidth": false,
                            "sDom": "Bfrtip",
                            "iDisplayLength": 10,
                            "aoColumns": [
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

                    var giCount = 1;

                    function fnClickAddRow() {
                        jQuery('#table-2').dataTable().fnAddData(['<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount + ".2", giCount + ".3", giCount + ".4"]);
                        replaceCheckboxes(); // because there is checkbox, replace it
                        giCount++;
                    }
                    ;

                </script>

                <table class="table table-bordered table-striped datatable" id="table-accounts">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <?php
                            if ($row["id"] === $_SESSION['id']):
                                continue;
                            endif;
                            ?>
                            <tr>                 
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo '*******' ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php
                                    $status = $row['admin_status'];
                                    if ($status == 0) {
                                        echo 'Admin';
                                    } else {
                                        echo 'User';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href='' class="btn btn-default btn-sm btn-icon icon-left editButton"  data-toggle='modal' data-target='#modal_edit'  data-id='<?php echo $row["id"]; ?>'>
                                        <i class="entypo-pencil"></i>
                                        Edit
                                    </a>

                                    <a href="javascript:;" onclick="jQuery('#modal-delete').modal('show', {backdrop: 'static'});" name="delete-account" data-target="#modal_delete" data-toggle="modal" class="btn btn-danger btn-sm btn-icon icon-left delete-account" data-id="<?php echo $row['id']; ?>">
                                        <i class="entypo-cancel"></i>
                                        Delete
                                    </a>

                                </td>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
                <br />

                <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#add_account">
                    <i class="entypo-plus"></i>
                    Add Account
                </a>

                <div id="modal_delete" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" id="modal_delete_content">

                        </div>

                    </div>
                </div>


                <div id="add_account" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Account</h4>
                            </div>
                            <div class="modal-body">
                                <form name="add-account-form" id="add-account-form" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered validate" novalidate="novalidate">

                                    <div class="form-group">
                                        <label for="account_username" class="col-sm-3 control-label" >Username</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="account_username" class="form-control" data-validate="required" id="account_username">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="account_password" class="col-sm-3 control-label" data-validate="required">Password</label>

                                        <div class="col-sm-5">
                                            <input type="password" name="account_password" class="form-control" data-validate="required" id="account_password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" >Email</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="account_email" data-validate="required,email" id="account_email" placeholder="">
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
                                                        <input type="file" name="account_upload" id="account_upload" accept="image/*"   >
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Account type</label>

                                        <div class="col-sm-5">
                                            <select name="add_account_type" id="add_account_type" data-validate="required" class="form-control">
                                                <option value="disabled" disabled selected>Select</option>
                                                <option value="0">Admin</option>
                                                <option value="1">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Branches</label>

                                        <div class="col-sm-8">
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
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
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
        <script src="assets/js/fileinput.js"></script>


        <!-- Imported scripts on this page -->
        <script src="assets/js/datatables/datatables.js"></script>
        <script src="assets/js/select2/select2.min.js"></script>
        <script src="assets/js/neon-chat.js"></script>

        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/jquery.multi-select.js"></script>



        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script> 
        <script src="assets/js/toastr.js" type="text/javascript"></script>
        <script>
                                        $(document).ready(function () {
                                            var url = window.location.href;
                                            var array = url.split('/');
                                            var lastsegment = array[array.length - 1];
                                            switch (lastsegment) {
                                                case "accounts.php#editsuccess":
                                                    editAccountSuccess();
                                                    removeHash();
                                                    break;
                                                case "accounts.php#deletesuccess":
                                                    deleteAccountSuccess();
                                                    removeHash();
                                                    break;
                                                case "accounts.php#addsuccess":
                                                    addAccountSuccess();
                                                    removeHash();
                                                    break;
                                                default:
                                                    break;
                                            }
                                        });
                                        $("#add-account-form").submit(function (e) {
                                            e.preventDefault();
                                            if ($(this).valid()) {
                                                var username = $("#account_username").val();
                                                var temporarypassword = $("#account_password").val();
                                                var email = $("#account_email").val();
                                                var account_type = $("#add_account_type").val();
                                                var branches_array = [];
                                                branches_array.join($("#branches_select_multiple").val());
                                                console.log(branches_array);
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
                                                form_data.append('account_type', account_type);
                                                form_data.append('branches', branches_array);
                                                form_data.append('test', test);
                                                $.ajax({
                                                    type: "POST",
                                                    dataType: 'text',
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    url: "database/add_account.php",
                                                    data: form_data,
                                                    success: function (text) {
                                                        if (text === "success") {
                                                            window.location = window.location + "#addsuccess";
                                                            location.reload();
                                                        } else {
                                                            addAccountFail();
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                        $("#delete-account-submit").click(function () {
                                            var id = $("#delete-account").attr('data-id');
                                            var form_data = new FormData();
                                            form_data.append('id', id);
                                            $.ajax({
                                                type: "POST",
                                                dataType: 'text',
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                url: "database/remove_account.php",
                                                data: form_data,
                                                success: function (text) {
                                                    if (text === "success") {
                                                        window.location = window.location + "#deletesuccess";
                                                        location.reload();
                                                    } else if (text === "oneadmin") {
                                                        oneAdmin();
                                                    } else {
                                                        deleteAccountFail();
                                                    }
                                                }
                                            });
                                        });
                                        $('.editButton').click(function () {
                                            var id = $(this).attr('data-id');
                                            $.ajax({
                                                url: "edit_account.php?id=" + id, cache: false, success: function (result) {
                                                    $('#modal_edit_content').html(result);
                                                }
                                            });
                                        });
                                        $('.delete-account').click(function () {
                                            var id = $(this).attr('data-id');
                                            $.ajax({
                                                url: "remove_account.php?id=" + id, cache: false, success: function (result) {
                                                    $('#modal_delete_content').html(result);
                                                }
                                            });
                                        });
                                        function removeHash() {
                                            history.pushState("", document.title, window.location.pathname
                                                    + window.location.search);
                                        }
                                        var opts;
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
                                        function addAccountSuccess() {
                                            toastrAlert();
                                            toastr.success("Account successfully added", opts);
                                        }
                                        function editAccountSuccess() {
                                            toastrAlert();
                                            toastr.success("Account successfully edited", opts);
                                        }
                                        function deleteAccountSuccess() {
                                            toastrAlert();
                                            toastr.success("Account successfully deleted", opts);
                                        }
                                        function addAccountFail() {
                                            toastrAlert();
                                            toastr.error("Unfortunately, we ran into some problems trying to add the account", opts);
                                        }
                                        function deleteAccountFail() {
                                            toastrAlert();
                                            toastr.error("Unfortunately, we ran into some problems trying to delete the account", opts);
                                        }
                                        function oneAdmin() {
                                            toastrAlert();
                                            toastr.error("You must have at least one admin account", opts);
                                        }
        </script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
