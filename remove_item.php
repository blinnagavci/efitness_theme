<?php
require('database/db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<input type='hidden' value='<?php echo $id ?>' id='item-id'>
<div class="modal-header">
    <h4 class="modal-title">Delete Item</h4>
</div>

<div class="modal-body">

    Are you sure you want to delete this item?

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <a type="button" class="btn btn-danger" name="delete-item-submit" id="delete-item-submit">Delete</a>
</div>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script>

    $("#delete-item-submit").click(function (e) {
        e.preventDefault();
        var id = $("#item-id").val();
        var form_data = new FormData();
        form_data.append('id', id);

        $.ajax({
            type: "POST",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            url: "database/remove_item.php",
            data: form_data,
            success: function (text) {
                if (text === "success") {
                    window.location = window.location + "#deleteitemsuccess";
                    location.reload();
                } else {
                    deleteItemFail();
                }
            }
        });

    });
    function deleteItemFail() {
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
        toastr.error("Unfortunately, we ran into some problems trying to delete the item.", opts);
    }
</script>
<?php mysqli_close($conn); ?>