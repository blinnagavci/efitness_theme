<?php
$title = 'Search Employees';
require_once ('header.php');
?>
<ol class="breadcrumb bc-3" >
    <li>
        Employees
    </li>
    <li class="active">
        <strong>Search employees</strong>
    </li>
</ol>
<?php
$sql = "SELECT id, first_name, last_name, gender, city, birth_date, telephone_no FROM employee where status='0'";
$result = $conn->query($sql);
?>
<h2>Search employees</h2>
<br />
<script type="text/javascript">
    jQuery(window).load(function () {
        var $table_employees = jQuery("#tableEmployees");

        // Initialize DataTable
        $table_employees.DataTable({
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

<table class="table table-bordered table-striped datatable responsive" id="tableEmployees">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>City</th>
            <th>Date of Birth</th>
            <th>Phone no.</th>
            <th>Position</th>
            <th>Options</th>
        </tr>
    </thead>

    <tbody>
<?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['first_name'] . ' ', $row['last_name'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['birth_date'] ?></td>
                <td><?php echo $row['telephone_no'] ?></td>
                <?php
                $employeeID = $row['id'];
                $employeeLastestContract = mysqli_query($conn, "SELECT employee_type_id from employee_contract WHERE employee_id ='$employeeID' ORDER BY id DESC");
                $employeeContract = mysqli_fetch_row($employeeLastestContract);
                $employeeJobPosition = mysqli_query($conn, "SELECT employee_type from employee_type WHERE id ='$employeeContract[0]'");
                $employeeJob = mysqli_fetch_row($employeeJobPosition);
                ?>
                <td><?php echo $employeeJob[0] ?></td>
                <td>
                    <a href="#" class="btn btn-default btn-sm btn-icon icon-left editButton" data-toggle='modal' data-target='#modal_edit'  data-id='<?php echo $row["id"]; ?>'>
                        <i class="entypo-pencil"></i>
                        Edit
                    </a>

                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left delete-employee" name="delete-employee" data-toggle='modal' data-target='#modal-delete' data-id='<?php echo $row["id"]; ?>'>
                        <i class="entypo-cancel"></i>
                        Delete
                    </a>

                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left contractButton" data-toggle='modal' data-target='#modal_add_contract' data-id='<?php echo $row["id"]; ?>' >
                        <i class="entypo-check"></i>
                        Contracts
                    </a>
                </td>
            </tr>
<?php endwhile; ?>
    </tbody>
</table>
<br />
<a href="add_employee.php" class="btn btn-primary" >
    <i class="entypo-plus"></i>
    Add Employee
</a>
<div id="modal_edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="modal_edit_content">

        </div>

    </div>
</div>

<div id="modal_add_contract" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 80%">

        <!-- Modal content-->
        <div class="modal-content" id="modal_add_contract_content">

        </div>

    </div>
</div>
<div id="modal-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="modal_delete_employee_content">

        </div>

    </div>
</div>

<footer class="main">
    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
</footer>
</div>
</div>
<script>
    $(document).ready(function () {
        var url = window.location.href;
        var array = url.split('/');
        var lastsegment = array[array.length - 1];
        switch (lastsegment) {
            case "search_employees.php#deleteemployeesuccess":
                deleteEmployeeSuccess();
                removeHash();
                break;
            case "search_employees.php#editemployeesuccess":
                editEmployeeSuccess();
                removeHash();
                break;
            case "search_employees.php#addcontractsuccess":
                addContractSuccess();
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
                url: "edit_employee.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_edit_content').html(result);
                }
            });
        });
        $(".delete-employee").click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "remove_employee.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_delete_employee_content').html(result);
                }
            });
        });
        $('.contractButton').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "add_contract_employee.php?id=" + id, cache: false, success: function (result) {
                    $('#modal_add_contract_content').html(result);
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
    function addEmployeeSuccess() {
        toastrAlert();
        toastr.success("Employee successfully added.", opts);
    }
    function editEmployeeSuccess() {
        toastrAlert();
        toastr.success("Employee successfully edited.", opts);
    }
    function deleteEmployeeSuccess() {
        toastrAlert();
        toastr.success("Employee successfully deleted.", opts);
    }
    function addEmployeeFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to add the employee.", opts);
    }
    function deleteEmployeeFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the employee.", opts);
    }
    function addContractSuccess() {
        toastrAlert();
        toastr.success("Contract successfully added.", opts);
    }
    function addContractFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to add the contract.", opts);
    }
</script>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="assets/js/datatables/datatables.css">
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">

<!-- Bottom scripts (common) -->
<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
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
</body>
</html>
