<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Item</h4>
</div>
<div class="modal-body">
    <form id="modal_form_edit_item" name="modal_form_edit_item" role="form" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
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
            <label for="item_name_edit" class="col-sm-3 control-label">Item Name</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="item_name_edit" id="item_name_edit" value="<?php echo $row['name'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="brand_edit" class="col-sm-3 control-label">Brand</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="brand_edit" id="brand_edit" value="<?php echo $row['company_name'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="item_category_edit" class="col-sm-3 control-label">Category</label>

            <div class="col-sm-5">
                <select name="item_category_edit" id="item_category_edit" class="form-control" required>
                    <?php
                    $categoryID = $row['category_id'];
                    $getCategory = "SELECT * FROM item_category WHERE id='$categoryID'";
                    $categoryResult = $conn->query($getCategory);
                    $row_category = $categoryResult->fetch_assoc();

                    if ($row_category['sellable'] == '1') {
                        ?><script>
                                $(".selling-price-group").addClass("hide");
                        </script>
                    <?php }
                    ?>
                    <option value="<?php echo $row_category['category'] ?>" selected><?php echo $row_category['category'] ?></option>
                    <?php
                    $all_cateogry = 'SELECT category FROM item_category WHERE status="0"';
                    $select_category = mysqli_query($conn, $all_cateogry);
                    if (!$select_category) {
                        echo ("Could not retrieve data" . mysql_error());
                    }
                    while ($row2 = $select_category->fetch_assoc()) {
                        $item_category = $row2['category'];

                        if ($row_category['category'] == $item_category) {
                            continue;
                        } else {
                            echo "<option value='$item_category'>$item_category</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="item_barcode_edit" class="col-sm-3 control-label">Barcode</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="item_barcode_edit" id="item_barcode_edit" value="<?php echo $row['barcode'] ?>" required>
            </div>
        </div>

        <div class="form-group selling-price-group">
            <label for="item_selling_price_edit" class="col-sm-3 control-label">Selling Price</label>

            <div class="col-sm-5">
                <input type="number" class="form-control" name="item_selling_price_edit" id="item_selling_price_edit" value="<?php echo $row['selling_price'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="item_unit_edit" class="col-sm-3 control-label">Unit</label>

            <div class="col-sm-5">
                <select name="item_unit_edit" id="item_unit_edit" class="form-control" required>
                    <?php
                    $unitID = $row['unit_id'];

                    $getUnit = "SELECT * FROM item_unit WHERE id='$unitID'";
                    $unitResult = $conn->query($getUnit);
                    $row_unit = $unitResult->fetch_assoc();
                    ?>

                    <option value="<?php echo $row_unit['unit'] ?>" selected><?php echo $row_unit['unit'] ?></option>

                    <?php
                    $allUnit = 'SELECT * FROM item_unit WHERE status="0" ';
                    $select_unit = mysqli_query($conn, $allUnit);
                    if (!$select_unit) {
                        echo ("Could not retrieve data" . mysql_error());
                    }
                    while ($row3 = $select_unit->fetch_assoc()) {
                        $select_unitt = $row3['unit'];
                        if ($row_unit['unit'] == $select_unitt) {
                            continue;
                        } else {
                            echo "<option value='$select_unitt'>$select_unitt</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" name="edit_item" class="btn btn-block btn-primary">Submit</button>
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
<script src="assets/js/toastr.js" type="text/javascript"></script>
<script>

                            $("#modal_form_edit_item").submit(function (event) {
                                $editForm = $(this);
                                event.preventDefault();
                                if ($editForm.valid()) {
                                    var id = $("#test-id").val();
                                    var name = $("#item_name_edit").val();
                                    var company = $("#brand_edit").val();
                                    var barcode = $("#item_barcode_edit").val();
                                    var sellingprice = $("#item_selling_price_edit").val();
                                    var unit = $("#item_unit_edit").val();
                                    var category = $("#item_category_edit").val();
                                    var form_data = new FormData();
                                    form_data.append('name', name);
                                    form_data.append('company', company);
                                    form_data.append('barcode', barcode);
                                    form_data.append('unit', unit);
                                    form_data.append('category', category);
                                    form_data.append('sellingprice', sellingprice);
                                    form_data.append('id', id);
                                    $.ajax({
                                        type: "POST",
                                        dataType: 'text',
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        url: "database/edit_item.php",
                                        data: form_data,
                                        success: function (text) {
                                            if (text === "success") {
                                                window.location = window.location + "#edititemsuccess";
                                                location.reload();
                                            } else {
                                                editItemFail();
                                            }
                                        }
                                    });
                                }

                            });
                            function editItemFail() {
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
                                toastr.error("Unfortunately, we ran into some problems trying to edit the item.", opts);
                            }
</script>