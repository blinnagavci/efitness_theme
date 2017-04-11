<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Manage Subscriptions</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <form id="modal_form_subscription_member" name="modal_form_subscription_member" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
                <?php
                require('database/db_connect.php');
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $sql = "SELECT * FROM member WHERE id = '$id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <input type="hidden" name="test-id" id="test-id" value="<?php echo $row['id']; ?>"/>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Membership Type</label>

                    <div class="col-sm-5">
                        <select name = "member_subscription" class="form-control"  id="member-subscription" required>
                            <option value = "select" disabled selected>Select</option>
                            <?php
                            //include('inc/database/db_connect.php');

                            $sql = 'SELECT membership_type FROM membership WHERE status= "0"';
                            $retval = mysqli_query($conn, $sql);
                            if (!$retval) {
                                echo ("Could not retrieve data" . mysql_error());
                            }
                            while ($row = $retval->fetch_assoc()) {
                                $membership = $row['membership_type'];
                                echo "<option value='$membership'>$membership</option>";
                            }
                            //mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="membership_amount" class="col-sm-3 control-label">Amount</label>

                    <div class="col-sm-5">
                        <input type="number" name="membership_amount" class="form-control" id="membership-amount" placeholder="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Start Date</label>

                    <div class="col-sm-5">
                        <input type="text" id="membership-start" name="membership_start" class="form-control datepicker" data-start-date="+0d" data-format="dd/mm/yyyy" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">End Date</label>

                    <div class="col-sm-5">
                        <input type="text" id="membership-end" name="membership_end" class="form-control datepicker" data-start-date="+0d" data-format="dd/mm/yyyy" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" name="add_subscriptions_submit" class="btn btn-primary btn-block add_subscription_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT id, start_date, end_date, amount_of_payment FROM membership_payment WHERE id_member = '$id' ORDER BY id DESC";
                $result = $conn->query($sql);
            }
            if ($result->num_rows > 0) {
                ?>

                <table class="table table-bordered table-striped datatable" id="membership_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                                <td><?php echo $row['amount_of_payment'] . '€'; ?></td>
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
<script type="text/javascript">
    $('input.datepicker').on('changeDate', function(e){
        $(this).datepicker('hide');
    });
    $("#modal_form_subscription_member").submit(function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            var id = $("#test-id").val();
            var membershiptype = $("#member-subscription").val();
            var membershipamount = $("#membership-amount").val();
            var membershipstart = $("#membership-start").val();
            var membershipend = $("#membership-end").val();
            var form_data = new FormData();
            form_data.append('id', id);
            form_data.append('membershiptype', membershiptype);
            form_data.append('membershipamount', membershipamount);
            form_data.append('membershipstart', membershipstart);
            form_data.append('membershipend', membershipend);
            $.ajax({
                type: "POST",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                url: "database/add_subscriptions_member_db.php",
                data: form_data,
                success: function (text) {
                    if (text === "success") {
                        window.location = window.location + "#addsubscriptionsuccess";
                        location.reload();
                    } else {
                        addSubscriptionFail();
                    }
                }
            });
        }
    });
    function addSubscriptionFail() {
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
        toastr.error("Unfortunately, we ran into some problems trying to add the subscription.", opts);
    }
</script>