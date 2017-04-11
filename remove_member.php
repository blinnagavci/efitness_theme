<?php
require('database/db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<input type='hidden' value='<?php echo $id ?>' id='member-id'>
<div class="modal-header">
    <h4 class="modal-title">Delete Member</h4>
</div>

<div class="modal-body">

    Are you sure you want to delete this member?

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <a type="button" class="btn btn-danger" name="delete-member-submit" id="delete-member-submit">Delete</a>
</div>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script>

    $("#delete-member-submit").click(function (e) {
        e.preventDefault();
        var id = $("#member-id").val();
        var form_data = new FormData();
        form_data.append('id', id);

        $.ajax({
            type: "POST",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            url: "database/remove_member_db.php",
            data: form_data,
            success: function (text) {
                if (text === "success") {
                    window.location = window.location + "#deletemembersuccess";
                    location.reload();
                } else {
                    deleteAccountFail();
                }
            }
        });

    });
    function deleteAccountFail() {
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
        toastr.error("Unfortunately, we ran into some problems trying to delete the member.", opts);
    }

</script>
<?php mysqli_close($conn); ?>