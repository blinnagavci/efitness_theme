
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Account</h4>
</div>
<div class="modal-body">
    <form role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate" id="editaccount_form">
        <?php
        require('database/db_connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM account WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <input type="hidden" id="test-id" name="test-id" value="<?php echo $row['id']; ?>"/>
        <div class="form-group">
            <label for="account_username" class="col-sm-3 control-label" >Username</label>

            <div class="col-sm-5">
                <input type="text" name="account_username" class="form-control" data-validate="required" id="account_username" value='<?php echo $row['username']; ?>' required>

            </div>
        </div>

        <div class="form-group">
            <label for="account_password" class="col-sm-3 control-label" >Password</label>

            <div class="col-sm-5">
                <input type="password" name="account_password" class="form-control" data-validate="required" id="account_password" value='<?php echo $row['password']; ?>' readonly="true" ondblclick="this.readOnly = ''; value = '';">
                <p class="double-click">Double click to change the password</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" >Email</label>

            <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon"><i class="entypo-mail"></i></span>
                    <input type="text" class="form-control" name="account_email" data-validate="required,email" id="account_email" placeholder="" value='<?php echo $row['email']; ?>'>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Upload photo</label>

            <div class="col-sm-5">

                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                        <img src="repository/account_photos/<?php echo $row['photo'] ?>"  alt="Photo">
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
                <select name="account_type" id="account_type" class="form-control" data-validate="required">
                    <?php
                    $status = $row['admin_status'];
                    if ($status == 0) {
                        echo '<option value="0" selected>Admin</option>';
                    } else {
                        echo '<option value="1" selected>User</option>';
                    }
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
                <input  type="submit" value="Submit" name="account_edit_submit" id="editaccount_form" class="btn btn-primary btn-block" />
            </div>
        </div>

    </form>
    <?php
    mysqli_close($conn);
    ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/neon-custom.js"></script>
<script src="assets/js/toastr.js"></script>
<script>
                    $("#editaccount_form").submit(function (event) {
                        // Initiate Variables With Form Content
                        event.preventDefault();
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
                            url: "database/edit_account_db.php",
                            data: form_data,
                            success: function (text) {
                                if (text === "success") {
                                    formSuccess();
                                } else if (text === "2") {
                                    oneAdmin();
                                } else {
                                    formFail();
                                }
                            }
                        });
                    });
                    function oneAdmin() {
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
                        toastr.error("You must have atleast one admin account", opts);
                    }
                    function formSuccess() {
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
                        toastr.success("Account successfully edited", opts);
                    }
                    function formFail() {

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
                        toastr.error("Unfortunately, we ran into problems trying to edit the account.", opts);
                    }
</script>



