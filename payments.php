<?php
$title = 'Payments';
require_once ('header.php');
?>
<ol class="breadcrumb bc-3" >
    <li>
        Inventory
    </li>
    <li class="active">
        <strong>Payments</strong>
    </li>
</ol>

<h2>Payments</h2>
<br />
<div class="row">
    <div class="col-md-12">

        <div class="panel minimal minimal-gray">

            <div class="panel-heading">
                <div class="panel-title"><h4></h4></div>
                <div class="panel-options">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile-1" data-toggle="tab">Purchases</a></li>
                        <li><a href="#profile-2" data-toggle="tab">Sales</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <div class="tab-content">
                    <div class="tab-pane active" id="profile-1">
                        <?php
                        $sql = "SELECT * FROM item_payment_in";
                        $result = $conn->query($sql);

                        // output data of each row
                        ?>
                        <script type="text/javascript">
                            jQuery(window).load(function () {
                                var $table2 = jQuery("#table-2");

                                // Initialize DataTable
                                $table2.DataTable({
                                    "autoWidth": false,
                                    "sDom": "Bfrtip",
                                    "iDisplayLength": 10,
                                    //                            "columnDefs": [
                                    //                                {"width": "20%", "targets": 0}
                                    //                            ],
                                    "aoColumns": [
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                    ],
                                    buttons: [
                                        'excelHtml5',
                                        'pdfHtml5'
                                    ],
                                    "bStateSave": true
                                });
                            });

                        </script>

                        <table class="table table-bordered table-striped datatable responsive" id="table-2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Payment Date</th>                            
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Cost Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody>
<?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['payment_date'] ?></td>
                                        <?php
                                        $productID = $row['product_id'];
                                        $sql1 = "SELECT * FROM item where id= '$productID'";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        ?>
                                        <td><?php echo $row1['name'] ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['cost_price'] . ' €' ?></td>
                                        <td><?php echo $row['payment_amount'] . ' €' ?></td>
                                    </tr>

<?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="profile-2">
                        <?php
                        $sql = "SELECT * FROM item_payment_out";
                        $result = $conn->query($sql);

                        // output data of each row
                        ?>
                        <script type="text/javascript">
                            jQuery(window).load(function () {
                                var $table2 = jQuery("#table-3");

                                // Initialize DataTable
                                $table2.DataTable({
                                    "autoWidth": false,
                                    "sDom": "Bfrtip",
                                    "iDisplayLength": 10,
                                    //                            "columnDefs": [
                                    //                                {"width": "20%", "targets": 0}
                                    //                            ],
                                    "aoColumns": [
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                    ],
                                    buttons: [
                                        'excelHtml5',
                                        'pdfHtml5'
                                    ],
                                    "bStateSave": true
                                });
                            });

                        </script>

                        <table class="table table-bordered table-striped datatable responsive" id="table-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Payment Date</th>                            
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody>
<?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['payment_date'] ?></td>
                                        <?php
                                        $productID = $row['product_id'];
                                        $sql2 = "SELECT * FROM item where id= '$productID'";
                                        $result2 = $conn->query($sql2);
                                        $row2 = $result2->fetch_assoc();
                                        ?>
                                        <td><?php echo $row2['name'] ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['unit_price'] . ' ' ?></td>
                                        <td><?php echo $row['payment_amount'] . ' €' ?></td>
                                    </tr>

<?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
<footer class="main">
    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
</footer>
</div>
</div>

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

<!-- Imported scripts on this page -->
<script src="assets/js/datatables/datatables.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
<script src="assets/js/neon-chat.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>

<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script> 
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
