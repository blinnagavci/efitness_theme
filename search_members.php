<?php
$title = 'Search Members';
require_once ('header.php');
?>

<ol class="breadcrumb bc-3" >
    <li>
        Members
    </li>
    <li class="active">
        <strong>Search members</strong>
    </li>
</ol>
<?php
$sql = "SELECT id, first_name, last_name, gender, city, birth_date, telephone_no FROM member where status='0'";
$result = $conn->query($sql);


// output data of each row
?>
<h2>Search members</h2>
<br />
<script type="text/javascript">
    jQuery(window).load(function () {
        var $table2 = jQuery("#table-2");

        // Initialize DataTable
        $table2.DataTable({
            "autoWidth": false,
            "sDom": "Bfrtip",
            "iDisplayLength": 10,
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
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

<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>City</th>
            <th>Date of Birth</th>
            <th>Phone no.</th>
            <th>Options</th>
        </tr>
    </thead>

    <tbody>
<?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['birth_date'] ?></td>
                <td><?php echo $row['telephone_no'] ?></td>
                <td>
                    <a href="#" class="btn btn-default btn-sm btn-icon icon-left editButton" data-toggle='modal' data-target='#modal_edit'  data-id='<?php echo $row["id"]; ?>'>
                        <i class="entypo-pencil"></i>
                        Edit
                    </a>

                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left delete-member" name="delete-member" data-toggle='modal' data-target='#modal-delete' data-id='<?php echo $row["id"]; ?>'>
                        <i class="entypo-cancel"></i>
                        Delete
                    </a>

                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left subscriptionButton" data-toggle='modal' data-target='#modal_add_subscription' data-id='<?php echo $row["id"]; ?>'>
                        <i class="entypo-check"></i>
                        Subscriptions
                    </a>
                </td>
            </tr>

<?php endwhile; ?>
    </tbody>
</table>
<br />

<a href="add_member.php" class="btn btn-primary" >
    <i class="entypo-plus"></i>
    Add Member
</a>
<div class="modal fade" id="modal-delete" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content" id="modal_delete_member_content">


        </div>
    </div>
</div>
<footer class="main">

    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved

</footer>
</div>
<div id="modal_edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="modal_edit_content">

        </div>

    </div>
</div>

<div id="modal_add_subscription" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 80%">

        <!-- Modal content-->
        <div class="modal-content" id="modal_add_subscription_content">

        </div>

    </div>
</div>
</div>
<script src="assets/js/toastr.js" type="text/javascript"></script>


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
<script src="assets/js/jquery.inputmask.bundle.js"></script>
<script src="assets/js/datatables/datatables.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
<script src="assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script> 
<script>
            $(document).ready(function () {
                var url = window.location.href;
                var array = url.split('/');
                var lastsegment = array[array.length - 1];
                switch (lastsegment) {
                    case "search_members.php#deletemembersuccess":
                        deleteMemberSuccess();
                        removeHash();
                        break;
                    case "search_members.php#editmembersuccess":
                        editMemberSuccess();
                        removeHash();
                        break;
                    case "search_members.php#addsubscriptionsuccess":
                        addSubscriptionSuccess();
                        removeHash();
                        break;
                    default:
                        break;
                }
                function removeHash() {
                    history.pushState("", document.title, window.location.pathname
                            + window.location.search);
                }
                $('.editButton').click(function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "edit_member.php?id=" + id, cache: false, success: function (result) {
                            $('#modal_edit_content').html(result);
                        }
                    });
                });

                $('.subscriptionButton').click(function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "add_subscription_member.php?id=" + id, cache: false, success: function (result) {
                            $('#modal_add_subscription_content').html(result);
                        }
                    });
                });
                $(".delete-member").click(function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "remove_member.php?id=" + id, cache: false, success: function (result) {
                            $('#modal_delete_member_content').html(result);
                        }
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
                function editMemberSuccess() {
                    toastrAlert();
                    toastr.success("Member successfully edited", opts);
                }
                function deleteMemberSuccess() {
                    toastrAlert();
                    toastr.success("Member successfully deleted", opts);
                }
                function deleteMemberFail() {
                    toastrAlert();
                    toastr.error("Unfortunately, we ran into some problems trying to delete the member", opts);
                }
                function addSubscriptionSuccess() {
                    toastrAlert();
                    toastr.success("Subscription successfully added", opts);
                }
                function addSubscriptionFail() {
                    toastrAlert();
                    toastr.error("Unfortunately, we ran into some problems trying to add the subscription", opts);
                }
            });
</script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>
