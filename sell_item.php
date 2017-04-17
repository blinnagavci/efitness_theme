<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sell Item</h4>
</div>
<div class="modal-body">
    <form id="modal_form_sell_item" name="modal_form_sell_item" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
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
    $("#modal_form_sell_item").submit(function (e) {
        e.preventDefault();
        var id = $("#test-id").val();
        var quantity = $("#item_quantity_sell").val();
        var sellingprice = $("#selling_price_sell").val();
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('quantity', quantity);
        form_data.append('sellingprice', sellingprice);
        $.ajax({
            type: "POST",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            url: "database/sell_item.php",
            data: form_data,
            success: function (text) {
                if (text === "success") {
                    window.location = window.location + "#sellitemsuccess";
                    location.reload();
                } else if (text === "outofstock") {
                    outOfStock();
                } else {
                    sellItemFail();
                }
            }
        });

    });
    function sellItemFail() {
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
        toastr.error("Unfortunately, we ran into some problems trying to sell the item.", opts);
    }
    function outOfStock() {
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
        toastr.error("Not enough quantity to complete the transaction.", opts);
    }
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