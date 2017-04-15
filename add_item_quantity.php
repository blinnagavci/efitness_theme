<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add new quantity</h4>
</div>
<div class="modal-body">
    <form action="database/add_item_quantity.php" method="POST" id="modal_form_add_quantity" name="modal_form_add_quantity" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        <?php
        require('database/db_connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $sql = "SELECT * FROM item WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>

        <input type="hidden" name="test-id" id="test-id" value="<?php echo $row['id']; ?>"/>

        <div class="form-group">
            <label for="item_price" class="col-sm-3 control-label ">Cost Price</label>

            <div class="col-sm-5">
                <input type="number" class="form-control totalControl" name="item_price" id="item_price" required>
            </div>
        </div>

        <div class="form-group">
            <label for="item_quantity" class="col-sm-3 control-label">Quantity</label>

            <div class="col-sm-5">
                <input type="number" class="form-control totalControl" name="item_quantity" id="item_quantity" value="" required>
            </div>
        </div>        

        <div class="form-group">
            <label for="item_total" class="col-sm-3 control-label">TOTAL</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="item_total" id="item_total" required value="0 €" readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" name="add_item_quantity" class="btn btn-primary btn-block">Submit</button>
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
<script type="text/javascript">
    $(".totalControl").bind('paste change keyup', function () {
        var price = $('#item_price').val();
        var quantity = $('#item_quantity').val();

        var total = (price * quantity);

        $('#item_total').val(total + " €");
    });
</script>

<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/fileinput.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>