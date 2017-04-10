<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Manage Contracts</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <form action="database/add_contract_employee_db.php" method="POST" id="modal_form_contract_employee" name="modal_form_contract_employee" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
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
                    <label for="employee_subscription" class="col-sm-3 control-label">Employee type</label>

                    <div class="col-sm-5">
                        <select name="employee_subscription" class="form-control" id="employee_subscription" required>
                            <option value="disabled" disabled selected>Select</option>
                            <?php

                            $sql = 'SELECT employee_type FROM employee_type WHERE status= "0"';
                            $retval = mysqli_query($conn, $sql);
                            if (!$retval) {
                                echo ("Could not retrieve data" . mysql_error());
                            }
                            while ($row = $retval->fetch_assoc()) {
                                $employee_type = $row['employee_type'];
                                echo "<option value='$employee_type'>$employee_type</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="salary_amount" class="col-sm-3 control-label">Salary amount</label>

                    <div class="col-sm-5">
                        <input type="text" name="salary_amount" class="form-control" id="salary_amount" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="employee_start" class="col-sm-3 control-label">Start date</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control datepicker" name="employee_start" id="employee_start" data-format="dd/mm/yyyy" required>

                    </div>
                </div>

                <div class="form-group">
                    <label for="employee_end" class="col-sm-3 control-label">End date</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control datepicker" name="employee_end" id="employee_end" data-format="dd/mm/yyyy" required>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" name="add_contracts_submit" class="btn btn-primary btn-block add_contracts_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM employee_contract WHERE employee_id = '$id' ORDER BY id DESC";
                $result = $conn->query($sql);
            }
            if ($result->num_rows > 0) {
                ?>

                <table class="table table-bordered table-striped datatable" id=contract_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                                <td><?php echo $row['amount_of_salary'] . '€'; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <?php
                    $conn->close();
                    ?>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<div class = "modal-footer">
    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
</div>


<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
