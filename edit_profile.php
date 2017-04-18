<?php $title = "Edit Profile";
require_once ('header.php');
?>
<ol class="breadcrumb bc-3" >
    <li>
        Dashboard
    </li>
    <li class="active">

        <strong>Edit Profile</strong>
    </li>
</ol>

<h2>Edit Profile</h2>
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

                <form id="editprofile_form" name="editprofile_form" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate">
                    <?php
                    require('database/db_connect.php');
                    $id = $_SESSION['id'];
                    $sql = "SELECT id, username, password, email, admin_status, photo FROM account WHERE id = '$id'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    ?>
                    <input type="hidden" id="test-id" name="test-id" value="<?php echo $row['id']; ?>"/>
                    <div class="form-group">
                        <label for="account_username" class="col-sm-3 control-label" >Username</label>

                        <div class="col-sm-5">
                            <input type="text" name="account_username" class="form-control" id="account_username" value='<?php echo $row['username']; ?>' required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="account_password" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-5">
                            <input type="password" name="account_password" class="form-control" required id="account_password" value='<?php echo $row['password']; ?>' readonly ondblclick="this.readOnly = ''; value = '';">
                            <p class="double-click">Double click to change the password</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Email</label>

                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="account_email" required id="account_email" placeholder="" value='<?php echo $row['email']; ?>'>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Upload photo</label>

                        <div class="col-sm-5">

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                    <?php
                                    if ($row['photo'] === '') {
                                        echo '<img src="http://placehold.it/200x150" alt="Empty Photo"/>';
                                    } else {
                                        ?>
                                        <img src="repository/account_photos/<?php echo $row["photo"]; ?>" alt="Photo">
                                        <?php
                                    }
                                    ?>
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
                            <select id="account_type" name="account_type" class="form-control" required>
                                <?php
                                $status = $row['admin_status'];
                                if ($status == 0) {
                                    echo '<option value="0" selected>Admin</option>';
                                } else {
                                    echo '<option value="1" selected>User</option>';
                                }
                                ?>                    
                                <?php
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
                            <input  type="submit" value="Submit" name="account_edit_submit" id="account_edit_submit" class="btn btn-primary btn-block" />
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>

<footer class="main">
    <div class="col-md-6">
        <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
    </div>
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
<script>
                                $("#deactivate-account").click(function () {
                                    window.location("database/logout.php");
                                });
                                $(document).ready(function () {
                                    history.pushState("", document.title, window.location.pathname
                                            + window.location.search);
                                });
                                var url = window.location.href;
                                var array = url.split('/');
                                var lastsegment = array[array.length - 1];
                                if (lastsegment === "edit_profile.php#editprofilesuccess") {
                                    editProfileSuccess();
                                }
                                $("#editprofile_form").submit(function (event) {
                                    $editForm = $(this);
                                    event.preventDefault();
                                    if ($editForm.valid()) {
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
                                            url: "database/edit_profile_db.php",
                                            data: form_data,
                                            success: function (text) {
                                                if (text === "success") {
                                                    window.location = window.location + "#editprofilesuccess";
                                                    location.reload();
                                                } else {
                                                    editAccountFail();
                                                }
                                            }
                                        });
                                    }

                                });
                                function editProfileSuccess() {
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
                                    toastr.success("Profile successfully edited.", opts);
                                }
                                function editProfileFail() {
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
                                    toastr.error("Unfortunately, we ran into some problems trying to edit your profile.", opts);
                                }

</script>
</body>
</html>