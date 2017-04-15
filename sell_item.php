<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sell Item</h4>
</div>
<div class="modal-body">
    <form action="database/sell_item.php" method="POST" id="modal_form_sell_item" name="modal_form_sell_item" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
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
            <label for="selling_price_sell" class="col-sm-3 control-label ">Selling Price</label>

            <div class="col-sm-5">
                <input type="number" class="form-control totalControlSell" name="selling_price_sell" id="selling_price_sell" value="<?php echo $row['selling_price']; ?>" readonly required>
            </div>
        </div>

        <div class="form-group">
            <label for="item_quantity_sell" class="col-sm-3 control-label">Quantity</label>

            <div class="col-sm-5">
                <input type="number" class="form-control totalControlSell" name="item_quantity_sell" id="item_quantity_sell" required>
            </div>
        </div>              

        <div class="form-group">
            <label for="item_total_sell" class="col-sm-3 control-label">TOTAL</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="item_total_sell" id="item_total_sell" required value="0 €" readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" name="sell_item" class="btn btn-primary btn-block">Submit</button>
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

    
    $(".totalControlSell").bind('paste change keyup', function () {
        var price = $('#selling_price_sell').val();
        var quantity = $('#item_quantity_sell').val();

        var total = (price * quantity);

        $('#item_total_sell').val(total + " €");
    });
 
</script>

<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/fileinput.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>