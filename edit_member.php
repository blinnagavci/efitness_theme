

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Member</h4>
</div>
<div class="modal-body">
    <form action='database/edit_member_db.php' id="modal_form_edit_member" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        <?php
        require('database/db_connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM member WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <input type="hidden" name="test-id" value="<?php echo $row['id']; ?>"/>
        <div class="form-group">
            <label for="member_firstname" class="col-sm-3 control-label" >First name</label>

            <div class="col-sm-5">
                <input type="text" name="member_firstname" class="form-control" id="member_firstname" value="<?php echo $row['first_name']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="member_surname" class="col-sm-3 control-label">Last name</label>

            <div class="col-sm-5">
                <input type="text" name="member_surname" class="form-control" id="member_surname" placeholder="" value="<?php echo $row['last_name']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Gender</label>

            <div class="col-sm-5">
                <select name="member_gender" class="form-control"  id="gender_select" required>
                    <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                    <?php
                    switch ($row['gender']) {
                        case "Male":
                            echo '<option value="Female">Female</option>';
                            echo '<option value="Other">Other</option>';
                            break;
                        case "Female":
                            echo '<option value="Male">Male</option>';
                            echo '<option value="Other">Other</option>';
                            break;
                        case "Other":
                            echo '<option value="Male">Male</option>';
                            echo '<option value="Female">Female</option>';
                            break;
                        default:
                            echo 'Something went wrong';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Birth date</label>

            <div class="col-sm-5">
                <input type="text" name="member_date" class="form-control datepicker" data-format="dd/mm/yyyy" value="<?php echo $row['birth_date']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="member_address" class="col-sm-3 control-label">Residential address</label>

            <div class="col-sm-5">
                <input type="text" name="member_address"  required class="form-control" id="member_address" placeholder="" value="<?php echo $row['residential_address']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="member_city" class="col-sm-3 control-label">City</label>

            <div class="col-sm-5">
                <input type="text" name="member_city" class="form-control"  required id="member_city" placeholder="" value="<?php echo $row['city']; ?>">
            </div>
        </div>


        <div class="form-group">
            <label for="member_telephone" class="col-sm-3 control-label">Phone no.</label>

            <div class="col-sm-5">
                <input type="text" name="member_telephone" class="form-control" required id="member_telephone" placeholder="" value="<?php echo $row['telephone_no']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="member_alternative" class="col-sm-3 control-label">Alternative no.</label>

            <div class="col-sm-5">
                <input type="text" name="member_alternative" class="form-control"  required id="member_alternative" placeholder="" value="<?php echo $row['alternative_no']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>

            <div class="col-sm-5">
                <input type="email" class="form-control" name="member_email" required id="member_email" placeholder="" value="<?php echo $row['email']; ?>">

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
                            <img src="repository/member_photos/<?php echo $row["photo"]; ?>" alt="Photo">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                    <div>
                        <span class="btn btn-white btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="member_upload" id="member_upload" accept="image/*"   >
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" name="edit_member_submit" class="btn btn-primary btn-block">Submit</button>
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


<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/fileinput.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>

