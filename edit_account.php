
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Account</h4>
</div>
<div class="modal-body">
    <form action='database/edit_account_db.php' id="modal_form_edit_account" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate">
        <?php
        require('database/db_connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT id, username, password, email, admin_status, photo FROM account WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <input type="hidden" name="test-id" value="<?php echo $row['id']; ?>"/>
        <div class="form-group">
            <label for="account_username" class="col-sm-3 control-label" >Username</label>

            <div class="col-sm-5">
                <input type="text" name="account_username" class="form-control" required id="account_username" value='<?php echo $row['username']; ?>' required>

            </div>
        </div>

        <div class="form-group">
            <label for="account_password" class="col-sm-3 control-label" required>Password</label>

            <div class="col-sm-5">
                <input type="password" name="account_password" class="form-control" required id="account_password" value='<?php echo $row['password']; ?>' readonly="true" ondblclick="this.readOnly = ''; value = '';">
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
                <select name="account_type" class="form-control" required>
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
    <?php
    mysqli_close($conn);
    ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>



