<?php
$title = 'Search Inventory';
require_once ('header.php');
?>
<ol class="breadcrumb bc-3" >
    <li>
        Inventory
    </li>
    <li class="active">
        <strong>Search Inventory</strong>
    </li>
</ol>

<?php
$checksellable2 = "SELECT * FROM item_category where sellable='0' and status='0'";
$retval = mysqli_query($conn, $checksellable2);
$array2 = array();
while ($thisrow2 = mysqli_fetch_assoc($retval)) {
    $array2[] = $thisrow2['id'];
}
$sqlnotsellable = 'SELECT * FROM item where category_id in (' . implode(',', array_map('intval', $array2)) . ') and status="0"';
$resultnonsellable = $conn->query($sqlnotsellable);
?>
<h2>Search Inventory</h2>
<br />
<div class='row'>
    <div class='col-md-12'>
        <div class="panel minimal minimal-gray">

            <div class="panel-heading">
                <div class="panel-title"><h4></h4></div>
                <div class="panel-options">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#stock" data-toggle="tab">Stock</a></li>
                        <li><a href="#other" data-toggle="tab">Other</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="stock">
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
                                        {"width": "100px"},
                                        null,
                                        null,
                                        null,
                                        null,
                                        {"width": "20px"},
                                        null,
                                        {"bSortable": false}
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
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Company Name</th>
                                    <th>Barcode</th>
                                    <th>Selling Price</th>
                                    <th>Quantity</th>
                                    <th>Options</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while ($row = $resultnonsellable->fetch_assoc()): ?>
                                    <tr>
                                        <?php $tempCategoryID = $row['category_id'] ?>
                                        <?php $tempUnitID = $row['unit_id'] ?>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <?php
                                        $sql1 = "SELECT category FROM item_category where id= '$tempCategoryID'";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        ?>
                                        <td><?php echo $row1['category'] ?></td>
                                        <?php
                                        $sql2 = "SELECT unit FROM item_unit where id= '$tempUnitID'";
                                        $result2 = $conn->query($sql2);
                                        $row2 = $result2->fetch_assoc();
                                        ?>
                                        <td><?php echo $row2['unit'] ?></td>
                                        <td><?php echo $row['company_name'] ?></td>
                                        <td><?php echo $row['barcode'] ?></td>
                                        <td><?php echo $row['selling_price'] ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-sm btn-icon icon-left editButton" data-toggle='modal' data-target='#modal_edit'  data-id='<?php echo $row["id"]; ?>'>
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>

                                            <a class="btn btn-danger btn-sm btn-icon icon-left deleteButton" data-toggle='modal' data-target='#modal_delete' data-id='<?php echo $row["id"]; ?>'>
                                                <i class="entypo-cancel"></i>
                                                Delete
                                            </a>

                                            <a href="#" class="btn btn-info btn-sm btn-icon icon-left addButton" data-toggle='modal' data-target='#modal_add'  data-id='<?php echo $row["id"]; ?>'>
                                                <i class="entypo-plus"></i>
                                                Add
                                            </a>
                                            <a href="#" class="btn btn-sm btn-icon btn-green icon-left sellButton" data-toggle="modal" data-target="#modal_sell" data-id="<?php echo $row['id']; ?>">
                                                <i class="entypo-minus"></i>
                                                Sell
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="other">
                        <script type="text/javascript">
                            jQuery(window).load(function () {
                                var $table3 = jQuery("#table-3");

                                // Initialize DataTable
                                $table3.DataTable({
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
                                        {"width": "20px"},
                                        null,
                                        {"bSortable": false}
                                    ],
                                    buttons: [
                                        'excelHtml5',
                                        'pdfHtml5'
                                    ],
                                    "bStateSave": true
                                });
                            });
                        </script>
                        <?php
                        $checksellable = "SELECT * FROM item_category where sellable='1' and status='0'";
                        $retval2 = mysqli_query($conn, $checksellable);
                        $array = array();
                        while ($thisrow = mysqli_fetch_assoc($retval2)) {
                            $array[] = $thisrow['id'];
                        }
                        $sqlsellable = 'SELECT * FROM item where category_id in (' . implode(',', array_map('intval', $array)) . ') and status="0"';
                        $resultsellable = $conn->query($sqlsellable);
                        ?>

                        <table class="table table-bordered table-striped datatable responsive" id="table-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Company Name</th>
                                    <th>Barcode</th>
                                    <th>Quantity</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resultsellable->fetch_assoc()): ?>
                                    <tr>
                                        <?php $tempCategoryID = $row['category_id'] ?>
                                        <?php $tempUnitID = $row['unit_id'] ?>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <?php
                                        $sql1 = "SELECT category FROM item_category where id= '$tempCategoryID'";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        ?>
                                        <td><?php echo $row1['category'] ?></td>
                                        <?php
                                        $sql2 = "SELECT unit FROM item_unit where id= '$tempUnitID'";
                                        $result2 = $conn->query($sql2);
                                        $row2 = $result2->fetch_assoc();
                                        ?>
                                        <td><?php echo $row2['unit'] ?></td>
                                        <td><?php echo $row['company_name'] ?></td>
                                        <td><?php echo $row['barcode'] ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-sm btn-icon icon-left editButton" data-toggle='modal' data-target='#modal_edit'  data-id='<?php echo $row["id"]; ?>'>
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>

                                            <a class="btn btn-danger btn-sm btn-icon icon-left deleteButton" data-toggle="modal" data-target="#modal_delete"  data-id="<?php echo $row['id']; ?>">
                                                <i class="entypo-cancel"></i>
                                                Delete
                                            </a>

                                            <a href="#" class="btn btn-info btn-sm btn-icon icon-left addButton" data-toggle='modal' data-target='#modal_add'  data-id='<?php echo $row["id"]; ?>'>
                                                <i class="entypo-plus"></i>
                                                Add
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="add_item.php" class="btn btn-primary" >
                <i class="entypo-plus"></i>
                Add Item
            </a>
        </div>

    </div>
</div>
<div id="modal_edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="modal_edit_content">

        </div>

    </div>
</div>


<div id="modal_add" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="modal_add_content">

        </div>

    </div>
</div>

<div id="modal_sell" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="modal_sell_content">

        </div>

    </div>
</div>
<div class="modal fade" id="modal_delete" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content" id="modal_delete_item_content">


        </div>
    </div>
</div>
<footer class="main">
    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
</footer>
<script>

    $(document).ready(function () {
        var url = window.location.href;
        var array = url.split('/');
        var lastsegment = array[array.length - 1];
        switch (lastsegment) {
            case "search_inventory.php#edititemsuccess":
                editItemSuccess();
                removeHash();
                break;
            case "search_inventory.php#deleteitemsuccess":
                deleteItemSuccess();
                removeHash();
                break;
            case "search_inventory.php#addquantitysuccess":
                addQuantitySuccess();
                removeHash();
                break;
            case "search_inventory.php#sellitemsuccess":
                sellItemSuccess();
                removeHash();
            default:
                break;
        }
        function removeHash() {
            history.pushState("", document.title, window.location.pathname
                    + window.location.search);
        }
        $(".deleteButton").click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "remove_item.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_delete_item_content').html(result);
                }
            });

        });
        $('.editButton').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "edit_item.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_edit_content').html(result);
                }
            });
        });

        $('.addButton').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "add_item_quantity.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_add_content').html(result);
                }
            });
        });

        $('.sellButton').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "sell_item.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_sell_content').html(result);
                }
            });
        });

    });
    function toastrAlert() {
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
    }
    function editItemSuccess() {
        toastrAlert();
        toastr.success("Item successfully edited.", opts);
    }
    function deleteItemSuccess() {
        toastrAlert();
        toastr.success("Item successfully deleted.", opts);
    }
    function deleteItemFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the item.", opts);
    }
    function addQuantitySuccess() {
        toastrAlert();
        toastr.success("Item quantity successfully added.", opts);
    }
    function sellItemSuccess() {
        toastrAlert();
        toastr.success("Item successfully sold.", opts);
    }
</script>

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
<script src="assets/js/toastr.js"></script>

<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script> 
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
