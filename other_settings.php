<?php
$title = 'Settings';
require_once ('header.php');
?>
<ol class="breadcrumb bc-3" >
    <li class="active">
        Settings
    </li>
</ol>

<h2>Settings</h2>
<br />

<div class='row'>
    <div class='col-md-12'>
        <div class="panel minimal minimal-gray">

            <div class="panel-heading">
                <div class="panel-title"><h4></h4></div>
                <div class="panel-options">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#membership" data-toggle="tab">Membership</a></li>
                        <li><a href="#job_positions" data-toggle="tab">Job Positions</a></li>
                        <li><a href="#category" data-toggle="tab">Category</a></li>
                        <li><a href="#unit" data-toggle="tab">Unit</a></li>
                        <li><a href="#branch" data-toggle="tab">Branch</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="membership">

                        <div class="panel-body">

                            <form action='database/add_membership.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">
                                <div class="form-group">
                                    <label for="membership_name" class="col-sm-3 control-label" >Membership type</label>

                                    <div class="col-sm-5">
                                        <input type="text" id="membership_type" name="membership_type" class="form-control" data-validate="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="membership_offer_name" class="col-sm-3 control-label" >Offer (optional description)</label>

                                    <div class="col-sm-5">
                                        <input type="text" id="membership_offer_name" name="membership_offer_name" class="form-control">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="membership_payment_amount" class="col-sm-3 control-label" >Amount</label>
                                    <div class="col-sm-5">
                                        <input type="number"  name="membership_payment_amount" id="membership_payment_amount" class="form-control" data-validate="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Branches</label>

                                    <div class="col-sm-7">
                                        <select multiple="multiple" name="branches_select_multiple[]" class="form-control multi-select" data-validate="required">
                                            <?php
                                            include('database/db_connect.php');
                                            $sqlb = 'SELECT * FROM branches WHERE status= "0"';
                                            $retvalb = mysqli_query($conn, $sqlb);
                                            if (!$retvalb) {
                                                echo ("Could not retrieve data" . mysql_error());
                                            }
                                            while ($rowb = $retvalb->fetch_assoc()) {
                                                $branch_temp_id = $rowb['id'];
                                                $branch_city = $rowb['city'];
                                                $branch_name = $rowb['branch'];
                                                echo "<option value='$branch_temp_id'>$branch_city, $branch_name</option>";
                                            }
                                            mysqli_close($conn);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <button type="submit" name="add_membership_submit" id="add_membership_submit" class=" btn btn-block btn-primary"/>Add
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </form>
                            <form action='database/remove_membership.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="gender_select" class="col-sm-3 control-label">Membership types</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <select name="remove_membership_select" class="form-control" data-validate="required" id="remove_membership_select">
                                                <option value="disabled" disabled selected>Select</option>

                                                <?php
                                                include('database/db_connect.php');
                                                $sql = 'SELECT * FROM membership WHERE status= "0"';
                                                $retval = mysqli_query($conn, $sql);
                                                if (!$retval) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $retval->fetch_assoc()) {
                                                    $tempId = $row['id'];
                                                    $membership = $row['membership_type'];
                                                    $offer = $row['offer'];
                                                    if ($offer === "") {
                                                        echo "<option value='$tempId'>$membership</option>";
                                                    } else {
                                                        echo "<option value='$tempId'>$membership, $offer</option>";
                                                    }
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" name="remove_membership_submit" id="remove_membership_submit" class="btn btn-primary">Remove</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                    <div class="tab-pane" id="job_positions">
                        <div class="panel-body">

                            <form action='database/add_employee_type.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="employeetype_settings" class="col-sm-3 control-label" >New employee type</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text"  name="employeetype_settings" id="employeetype_settings" class="form-control" data-validate="required">
                                            <span class="input-group-btn">
                                                <button type="submit" name="add_employee_type_submit" id="add_employee_type_submit" class="width-72 btn btn-primary">Add</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </form>
                            <form action='database/remove_employee_type.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="remove_employee_type_select" class="col-sm-3 control-label">Employee types</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <select name="remove_employee_type_select" class="form-control" data-validate="required" id="remove_employee_type_select">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');
                                                $sql1 = 'SELECT id, employee_type FROM employee_type WHERE status= "0"';
                                                $retval1 = mysqli_query($conn, $sql1);
                                                if (!$retval1) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $retval1->fetch_assoc()) {
                                                    $employeeId = $row['id'];
                                                    $employeetype = $row['employee_type'];
                                                    echo "<option value='$employeeId'>$employeetype</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>

                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" name="remove_employee_type_submit" id="remove_employee_type_submit" class="btn btn-primary">Remove</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="category">
                        <div class="panel-body">

                            <form action='database/add_item_category.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="item_category_settings" class="col-sm-3 control-label" >New item category</label>

                                    <div class="col-md-5">
                                        <input type="text"  name="item_category_settings" id="item_category_settings" class="form-control" data-validate="required">

                                        <div class="input-group" style="margin-top: 10px;">
                                            <select name="item_category_sellable" id="item_category_sellable" class="form-control" data-validate="required">
                                                <option value="disabled" disabled selected>Select</option>
                                                <option value="0">Sellable</option>
                                                <option value="1">Not sellable</option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" name="add_item_category_submit" id="add_item_category_submit" class="width-72 btn btn-primary">Add</button>
                                            </span>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group"></div>

                            </form>
                            <form action='database/remove_item_category.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="remove_item_category_select" class="col-sm-3 control-label">Item categories</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <select id="remove_item_category_select" name="remove_item_category_select" class="form-control" data-validate="required">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');
                                                $sql2 = 'SELECT id, category FROM item_category WHERE status= "0"';
                                                $retval2 = mysqli_query($conn, $sql2);
                                                if (!$retval2) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $retval2->fetch_assoc()) {
                                                    $itemcategoryId = $row['id'];
                                                    $itemcategory = $row['category'];
                                                    echo "<option value='$itemcategoryId'>$itemcategory</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>

                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" name="remove_item_category_submit" id="remove_item_category_submit" class="btn btn-primary">Remove</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="unit">
                        <div class="panel-body">
                            <form action='database/add_item_unit.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="item_unit_settings" class="col-sm-3 control-label" >New item unit</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text" id="item_unit_settings" name="item_unit_settings" class="form-control" data-validate="required">
                                            <span class="input-group-btn">
                                                <button type="submit" name="add_item_unit_submit" id="add_item_unit_submit" class="width-72 btn btn-primary">Add</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </form>
                            <form action='database/remove_item_unit.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="remove_item_unit_select" class="col-sm-3 control-label">Item units</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <select id="remove_item_unit_select" name="remove_item_unit_select" class="form-control" data-validate="required">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');
                                                $sql4 = 'SELECT id, unit FROM item_unit WHERE status= "0"';
                                                $retval4 = mysqli_query($conn, $sql4);
                                                if (!$retval4) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($row = $retval4->fetch_assoc()) {
                                                    $itemunitId = $row['id'];
                                                    $itemunit = $row['unit'];
                                                    echo "<option value='$itemunitId'>$itemunit</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>

                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" name="remove_item_unit_submit" id="remove_item_unit_submit" class="btn btn-primary">Remove</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="branch">
                        <div class="panel-body">
                            <form action='database/add_branch.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="branch_city" class="col-sm-3 control-label" >Branch city</label>

                                    <div class="col-sm-5">
                                        <input type="text" id="branch_city" name="branch_city" class="form-control" data-validate="required">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="branch_name" class="col-sm-3 control-label">Branch name</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text" id="branch_name" name="branch_name" class="form-control" data-validate="required"  >
                                            <span class="input-group-btn">
                                                <button type="submit" name="add_branch_submit" id="add_branch_submit" class="width-72 btn btn-primary">Add</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </form>
                            <form action='database/remove_branch.php' method="POST" role="form" class="form-horizontal form-groups-bordered validate">

                                <div class="form-group">
                                    <label for="remove_branch_select" class="col-sm-3 control-label">Remove branch</label>

                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <select name="remove_branch_select" class="form-control" data-validate="required" id="remove_branch_select">
                                                <option value="disabled" disabled selected>Select</option>
                                                <?php
                                                include('database/db_connect.php');
                                                $sqlrb = 'SELECT * FROM branches WHERE status= "0"';
                                                $retvalrb = mysqli_query($conn, $sqlrb);
                                                if (!$retvalrb) {
                                                    echo ("Could not retrieve data" . mysql_error());
                                                }
                                                while ($rowrb = $retvalrb->fetch_assoc()) {
                                                    $tempId = $rowrb['id'];
                                                    $branch_city = $rowrb['city'];
                                                    $branch_name = $rowrb['branch'];
                                                    echo "<option value='$tempId'>$branch_city, $branch_name</option>";
                                                }
                                                mysqli_close($conn);
                                                ?>

                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" name="remove_branch_submit" id="remove_branch_submit" class="btn btn-primary">Remove</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="main">
    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
</footer>

<!-- Bottom scripts (common) -->
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">
<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/neon-api.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
<script src="assets/js/bootstrap-tagsinput.min.js"></script>
<script src="assets/js/typeahead.min.js"></script>
<script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker/daterangepicker.js"></script>
<script src="assets/js/jquery.multi-select.js"></script>
<script src="assets/js/icheck/icheck.min.js"></script>
<script src="assets/js/neon-chat.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<!-- Imported scripts on this page -->
<script src="assets/js/bootstrap-switch.min.js"></script>
<script src="assets/js/neon-chat.js"></script>

<script src="assets/js/fileinput.js"></script>
<script src="assets/js/dropzone/dropzone.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script>
<script src="assets/js/toastr.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location.href;
        var array = url.split('/');
        var lastsegment = array[array.length - 1];
        switch (lastsegment) {
            case "other_settings.php#addmembershipsuccess":
                addMembershipSuccess();
                removeHash();
                break;
            case "other_settings.php#deletemembershipsuccess":
                deleteMembershipSuccess();
                removeHash();
                break;
            case "other_settings.php#addpositionsuccess":
                addPositionSuccess();
                removeHash();
                break;
            case "other_settings.php#deletepositionsuccess":
                deletePositionSuccess();
                removeHash();
                break;
            case "other_settings.php#addcategorysuccess":
                addCategorySuccess();
                removeHash();
                break;
            case "other_settings.php#deletecategorysuccess":
                deleteCategorySuccess();
                removeHash();
                break;
            case "other_settings.php#addunitsuccess":
                addUnitSuccess();
                removeHash();
                break;
            case "other_settings.php#deleteunitsuccess":
                deleteUnitSuccess();
                removeHash();
                break;
            case "other_settings.php#addbranchsuccess":
                addBranchSuccess();
                removeHash();
                break;
            case "other_settings.php#deletebranchsuccess":
                deleteBranchSuccess();
                removeHash();
                break;
            default:
                break;
        }
    });

    function removeHash() {
        history.pushState("", document.title, window.location.pathname
                + window.location.search);
    }

    var opts;
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
    function addMembershipSuccess() {
        toastrAlert();
        toastr.success("Membership successfully added", opts);
    }
    function addMembershipFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to add the membership type", opts);
    }
    function deleteMembershipSuccess() {
        toastrAlert();
        toastr.success("Membership successfully added", opts);
    }
    function deleteMembershipFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the membership type", opts);
    }
    function addPositonSuccess() {
        toastrAlert();
        toastr.success("Employee type successfully added", opts);
    }
    function addPositionFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to add the employee type", opts);
    }
    function deletePositonSuccess() {
        toastrAlert();
        toastr.success("Employee type successfully deleted", opts);
    }
    function deletePositonFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the employee type", opts);
    }
    function addCategorySuccess() {
        toastrAlert();
        toastr.success("Item category successfully added", opts);
    }
    function addCategoryFail() {
        toastrAlert();
        toastr.success("Unfortunately, we ran into some problems trying to add the item category", opts);
    }
    function deleteCategorySuccess() {
        toastrAlert();
        toastr.success("Item category successfully deleted", opts);
    }
    function deleteCategoryFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the item category", opts);
    }
    function addUnitSuccess() {
        toastrAlert();
        toastr.success("Item unit successfully added", opts);
    }
    function addUnitFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to add the item unit", opts);
    }
    function deleteUnitSuccess() {
        toastrAlert();
        toastr.success("Item unit successfully deleted", opts);
    }
    function deleteUnitFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the item unit", opts);
    }
    function addBranchSuccess() {
        toastrAlert();
        toastr.success("Branch successfully added", opts);
    }
    function addBranchFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to add the branch", opts);
    }
    function deleteBranchSuccess() {
        toastrAlert();
        toastr.success("Branch successfully deleted", opts);
    }
    function deleteBranchFail() {
        toastrAlert();
        toastr.error("Unfortunately, we ran into some problems trying to delete the branch", opts);
    }
</script>

</body>
</html>