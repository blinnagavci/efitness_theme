<?php
require('database/db_connect.php');
if (isset($_POST['account_edit_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $username = $_POST['account_username'];
    $temporary_password = ($_POST['account_password']);
    $email = ($_POST['account_email']);
    $accounttypeselect = $_POST['account_type'];

    $getAccount = mysqli_query($conn, "SELECT admin_status FROM account WHERE id = '$id'");
    $accountType = mysqli_fetch_row($getAccount);

    if ($accountType[0] == 0) {
        if ($accounttypeselect == 1) {
            $getAll = "SELECT username FROM account WHERE admin_status='0' AND status='0'";
            $result = $conn->query($getAll);

            if ($result->num_rows <= 1) {
                echo "<script type=text/javascript>window.alert('You must have at least one Admin account')</script>";
                header("refresh: 0; url = accounts.php");
                exit();
            }
        }
    }

    $getAccountPassword = mysqli_query($conn, "SELECT password FROM account WHERE id = '$id'");
    $accountPassword = mysqli_fetch_row($getAccountPassword);

    if (!($accountPassword[0] == $temporary_password)) {
        $password = sha1($temporary_password);
    } else {
        $password = $temporary_password;
    }
    $sql = "UPDATE account SET username='$username', password='$password', email='$email', admin_status='$accounttypeselect' WHERE id = $id";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to account table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Account successfully edited')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = accounts.php");
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Account</h4>
</div>
<div class="modal-body">
    <form action='edit_account.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate" novalidate="novalidate">
        <?php
        require('database/db_connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT username, password, email, admin_status FROM account WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <div class="form-group">
            <label for="account_username" class="col-sm-3 control-label" >Username</label>

            <div class="col-sm-5">
                <input type="text" name="account_username" class="form-control" data-validate="required" id="account_username" value='<?php echo $row['username']; ?>'>

            </div>
        </div>

        <div class="form-group">
            <label for="account_password" class="col-sm-3 control-label" data-validate="required">Password</label>

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
                    <input type="text" class="form-control" name="account_email" data-validate="required" id="account_email" placeholder="" value='<?php echo $row['email']; ?>'>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Account Type</label>

            <div class="col-sm-5">
                <select name="account_type" class="form-control" data-validate="required">
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


<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/neon-api.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>