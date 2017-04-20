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

                            $sql = 'SELECT id, membership_type, offer, amount FROM membership WHERE status= "0"';
                            $retval = mysqli_query($conn, $sql);
                            if (!$retval) {
                                echo ("Could not retrieve data" . mysql_error());
                            }
                            while ($row = $retval->fetch_assoc()) {
                                $membershipId = $row['id'];
                                $membership = $row['membership_type'];
                                $membershipOffer = $row['offer'];
                                $membershipAmount = $row['amount'];
                                if ($membershipOffer === "") {
                                    echo "<option value='$membershipId'>$membership, $membershipAmount €</option>";
                                } else {
                                    echo "<option value='$membershipId'>$membership, $membershipOffer, $membershipAmount €</option>";
                                }
                            }
                            //mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Start Date</label>

                    <div class="col-sm-5">
                        <input type="text" id="membership-start" name="membership_start" class="form-control datepicker" data-start-date="+0d" data-format="dd/mm/yyyy" readonly style="background-color: transparent; cursor: pointer;" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">End Date</label>

                    <div class="col-sm-5">
                        <input type="text" id="membership-end" name="membership_end" class="form-control datepicker" data-start-date="+0d" data-format="dd/mm/yyyy" readonly style="background-color: transparent; cursor: pointer;" required>
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
                $sql = "SELECT id, start_date, end_date, amount, id_membership FROM membership_payment WHERE id_member = '$id' ORDER BY id DESC";
                $result = $conn->query($sql);
            }
            if ($result->num_rows > 0) {
                ?>

                <table class="table table-bordered table-striped datatable responsive" id="membership_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row1 = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row1["id"]; ?></td>
                                <td><?php echo $row1['start_date']; ?></td>
                                <td><?php echo $row1['end_date']; ?></td>
                                <?php
                                $tempId = $row1["id_membership"];
                                $sql1 = "SELECT membership_type FROM membership where id= '$tempId'";
                                $result1 = $conn->query($sql1);
                                $row2 = $result1->fetch_assoc();
                                ?>
                                <td><?php echo $row2['membership_type']; ?></td>
                                <td><?php echo $row1['amount'] . '€'; ?></td>
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

<link rel="stylesheet" href="assets/js/datatables/datatables.css">
<script src="assets/js/datatables/datatables.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var $tablemembership = $("#membership_table");
        $tablemembership.DataTable({
            "autoWidth": false,
            "sDom": "Bfrtip",
            "iDisplayLength": 10,
            "aoColumns": [
                null,
                null,
                null,
                null,
                null
            ],
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ],
            "bStateSave": true
        });
        $('input.datepicker').on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });


    $("#modal_form_subscription_member").submit(function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            var id = $("#test-id").val();
            var membershipId = $("#member-subscription").val();
            var membershipstart = $("#membership-start").val();
            var membershipend = $("#membership-end").val();
            var form_data = new FormData();
            form_data.append('id', id);
            form_data.append('membershipId', membershipId);
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
        toastr.error("Unfortunately, we ran into some problems trying to add the subscription", opts);
    }
</script>