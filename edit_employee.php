

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Employee</h4>
</div>
<div class="modal-body">
    <form id="modal_form_edit_employee" name="modal_form_edit_employee" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        <?php
        require('database/db_connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM employee WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <input type="hidden" name="test-id" id="test-id" value="<?php echo $row['id']; ?>"/>
        <div class="form-group">
            <label for="employee_firstname" class="col-sm-3 control-label" >First name</label>

            <div class="col-sm-5">
                <input type="text" name="employee_firstname" class="form-control"  id="employee_firstname" data-mask="^[a-zçëA-ZËÇ\s]+$" data-is-regex="true" value="<?php echo $row['first_name']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="employee_surname" class="col-sm-3 control-label">Last name</label>

            <div class="col-sm-5">
                <input type="text" name="employee_surname" class="form-control" id="employee_surname" data-mask="^[a-zçëA-ZËÇ\s]+$" data-is-regex="true" value="<?php echo $row['last_name']; ?>" required> 
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Gender</label>

            <div class="col-sm-5">
                <select name="employee_gender" class="form-control" id="gender_select" required>
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
                <input type="text" name="employee_date" id="employee_date" class="form-control datepicker" data-format="dd/mm/yyyy" value="<?php echo $row['birth_date']; ?>" readonly style="background-color: transparent; cursor: pointer;" required>
            </div>
        </div>

        <div class="form-group">
            <label for="employee_address" class="col-sm-3 control-label">Residential address</label>

            <div class="col-sm-5">
                <input type="text" name="employee_address" class="form-control" id="employee_address" value="<?php echo $row['residential_address']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="employee_city" class="col-sm-3 control-label">City</label>

            <div class="col-sm-5">
                <input type="text" name="employee_city" class="form-control" id="employee_city" value="<?php echo $row['city']; ?>" required>
            </div>
        </div>


        <div class="form-group">
            <label for="employee_telephone" class="col-sm-3 control-label">Phone no.</label>

            <div class="col-sm-5">
                <input type="text" name="employee_telephone" class="form-control" id="employee_telephone" value="<?php echo $row['telephone_no']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="employee_alternative" class="col-sm-3 control-label">Alternative no.</label>

            <div class="col-sm-5">
                <input type="text" name="employee_alternative" class="form-control"id="employee_alternative" value="<?php echo $row['alternative_no']; ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>

            <div class="col-sm-5">
                <input type="email" class="form-control" name="employee_email" id="employee_email" value="<?php echo $row['email']; ?>" required>
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
                            <img src="repository/employee_photos/<?php echo $row["photo"]; ?>" alt="Photo">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                    <div>
                        <span class="btn btn-white btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="employee_upload" id="employee_upload" accept="image/*"   >
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" >Remove</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" name="edit_employee_submit" class="btn btn-primary btn-block">Submit</button>
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
<script src="assets/js/jquery.inputmask.bundle.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script type="text/javascript">

    $("#modal_form_edit_employee").submit(function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            var id = $("#test-id").val();
            var firstname = $("#employee_firstname").val();
            var surname = $("#employee_surname").val();
            var gender = $("#employee_gender").val();
            var birthdate = $("#employee_date").val();
            var address = $("#employee_address").val();
            var city = $("#employee_city").val();
            var phoneno = $("#employee_telephone").val();
            var alternativeno = $("#employee_alternative").val();
            var email = $("#employee_email").val();
            var form_data = new FormData();
            var file_data;
            var test = '';
            if (!($("#employee_upload").val().length === 0)) {
                file_data = $("#employee_upload").prop('files')[0];
                form_data.append('file', file_data);
                var test = 'pic';
            }
            form_data.append('id', id);
            form_data.append('firstname', firstname);
            form_data.append('surname', surname);
            form_data.append('gender', gender);
            form_data.append('birthdate', birthdate);
            form_data.append('address', address);
            form_data.append('city', city);
            form_data.append('phoneno', phoneno);
            form_data.append('alternativeno', alternativeno);
            form_data.append('email', email);
            form_data.append('test', test);
            $.ajax({
                type: "POST",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                url: "database/edit_employee_db.php",
                data: form_data,
                success: function (text) {
                    if (text === "success") {
                        window.location = window.location + "#editemployeesuccess";
                        location.reload();
                    } else {
                        editEmployeeFail();
                    }
                }
            });
            function editEmployeeFail() {
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
                toastr.error("Unfortunately, we ran into some problems trying to edit the employee.", opts);
            }
        }
    });
    $('input.datepicker').on('changeDate', function (e) {
        $(this).datepicker('hide');
    });
</script>