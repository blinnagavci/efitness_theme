<?php
$title = 'Accounts';
require_once ('header.php');
?>

<ol class="breadcrumb bc-3" >
    <li class="active">
        <strong>Accounts</strong>
    </li>
</ol>
<?php
$sql = "SELECT * from account WHERE status='0'";
$result = $conn->query($sql);
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
    

</script>

<table class="table table-bordered table-striped datatable responsive" id="table-accounts">
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

<div id="modal_edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="modal_edit_content">

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
                            <select multiple="multiple" id="branches_select_multiple" name="branches_select_multiple[]" class="form-control multi-select" data-validate="required">
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
                                $('select#branches_select_multiple option:selected').each(function (i) {
                                    branches_array[i] = $(this).val();
                                });
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
                                form_data.append('branches_array', branches_array);
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
                                        } else if (text === "emailexists") {
                                            emailExists();
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
                        function emailExists() {
                            toastrAlert();
                            toastr.error("Email already exists", opts);
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
