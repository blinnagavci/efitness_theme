<?php
$title = 'Dashboard';
require_once ('header.php');

//include('database/db_connect.php');
$thisWeekQuery = "SELECT count(*) as thisWeekCount FROM member WHERE status='0' AND date_added >= NOW() - INTERVAL 1 WEEK";
$thisWeekSql = mysqli_query($conn, $thisWeekQuery);
$thisWeekValue = mysqli_fetch_assoc($thisWeekSql);

$lastWeekQuery = "SELECT count(*) as lastWeekCount FROM member WHERE status='0' AND date_added BETWEEN NOW()-INTERVAL 2 WEEK AND NOW()-INTERVAL 1 WEEK";
$lastWeekSql = mysqli_query($conn, $lastWeekQuery);
$lastWeekValue = mysqli_fetch_assoc($lastWeekSql);

$twoWeeksAgoQuery = "SELECT count(*) as twoWeeksAgoCount FROM member WHERE status='0' AND date_added BETWEEN NOW()-INTERVAL 3 WEEK AND NOW()-INTERVAL 2 WEEK";
$twoWeeksAgoSql = mysqli_query($conn, $twoWeeksAgoQuery);
$twoWeeksAgoValue = mysqli_fetch_assoc($twoWeeksAgoSql);

$threeWeeksAgoQuery = "SELECT count(*) as threeWeeksAgoCount FROM member WHERE status='0' AND date_added BETWEEN NOW()-INTERVAL 4 WEEK AND NOW()-INTERVAL 3 WEEK";
$threeWeeksAgoSql = mysqli_query($conn, $threeWeeksAgoQuery);
$threeWeeksAgoValue = mysqli_fetch_assoc($threeWeeksAgoSql);

$fourWeeksAgoQuery = "SELECT count(*) as fourWeeksAgoCount FROM member WHERE status='0' AND date_added BETWEEN NOW()-INTERVAL 5 WEEK AND NOW()-INTERVAL 4 WEEK";
$fourWeeksAgoSql = mysqli_query($conn, $fourWeeksAgoQuery);
$fourWeeksAgoValue = mysqli_fetch_assoc($fourWeeksAgoSql);
?>
<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        // Sparkline Charts
        $('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'});
        $('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'});
        $('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'});
        $('.bar').sparkline([[1, 4], [2, 3], [3, 2], [4, 1]], {type: 'bar'});
        $('.pie').sparkline('html', {type: 'pie', borderWidth: 0, sliceColors: ['#3d4554', '#ee4749', '#00b19d']});
        $('.linechart').sparkline();
        $('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'});
        $('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'});


        $(".monthly-sales").sparkline([1, 2, 3, 5, 6, 7, 2, 3, 3, 4, 3, 5, 7, 2, 4, 3, 5, 4, 5, 6, 3, 2], {
            type: 'bar',
            barColor: '#485671',
            height: '80px',
            barWidth: 10,
            barSpacing: 2
        });


        // JVector Maps
        var map = $("#map");

        map.vectorMap({
            map: 'europe_merc_en',
            zoomMin: '3',
            backgroundColor: '#383f47',
            focusOn: {x: 0.5, y: 0.8, scale: 3}
        });



        // Line Charts
        var week1 = "<?php echo $thisWeekValue['thisWeekCount']; ?>";
        var week2 = "<?php echo $lastWeekValue['lastWeekCount']; ?>";
        var week3 = "<?php echo $twoWeeksAgoValue['twoWeeksAgoCount']; ?>";
        var week4 = "<?php echo $threeWeeksAgoValue['threeWeeksAgoCount']; ?>";
        var week5 = "<?php echo $fourWeeksAgoValue['fourWeeksAgoCount']; ?>";
        var line_chart_demo = $("#line-chart-demo");

        var line_chart = Morris.Line({
            element: 'line-chart-demo',
            parseTime: false,
            data: [
                {y: '4 weeks ago', a: week5},
                {y: '3 weeks ago', a: week4},
                {y: '2 weeks ago', a: week3},
                {y: 'Last week', a: week2},
                {y: 'This week', a: week1}
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Weekly members'],
            xLabelMargin: 10,
            xLabelAngle: 60,
            redraw: true
        });

        line_chart_demo.parent().attr('style', '');


        // Donut Chart
        var donut_chart_demo = $("#donut-chart-demo");

        donut_chart_demo.parent().show();

        var donut_chart = Morris.Donut({
            element: 'donut-chart-demo',
            data: [
                {label: "Download Sales", value: getRandomInt(10, 50)},
                {label: "In-Store Sales", value: getRandomInt(10, 50)},
                {label: "Mail-Order Sales", value: getRandomInt(10, 50)}
            ],
            colors: ['#707f9b', '#455064', '#242d3c']
        });

        donut_chart_demo.parent().attr('style', '');


        // Area Chart
        var area_chart_demo = $("#area-chart-demo");

        area_chart_demo.parent().show();

        var area_chart = Morris.Area({
            element: 'area-chart-demo',
            data: [
                {y: '2006', a: 100, b: 90},
                {y: '2007', a: 75, b: 65},
                {y: '2008', a: 50, b: 40},
                {y: '2009', a: 75, b: 65},
                {y: '2010', a: 50, b: 40},
                {y: '2011', a: 75, b: 65},
                {y: '2012', a: 100, b: 90}
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            lineColors: ['#303641', '#576277']
        });

        area_chart_demo.parent().attr('style', '');


    });


    function getRandomInt(min, max)
    {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
</script>
<?php
include('database/db_connect.php');
$result = mysqli_query($conn, "SELECT * FROM member where status = '0'");
$numrows = mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-sm-3 col-xs-6">
        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-users"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $numrows ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>

            <h3>Registered Members</h3>
            <p>total number of members registered</p>
        </div>

    </div>

    <div class="col-sm-3 col-xs-6">
        <?php
        $querymembership = "SELECT id_membership, COUNT(*) AS membership FROM membership_payment GROUP BY id_membership ORDER BY membership DESC LIMIT 1";
        $resultmembership = mysqli_query($conn, $querymembership);
        $resultmembershiptype = 'None';
        if (($resultmembership->num_rows > 0)) {
            $resultfetch = mysqli_fetch_assoc($resultmembership);
            $resultidmembership = $resultfetch['id_membership'];
            $querymembershiptype = "SELECT membership_type from membership WHERE id = $resultidmembership";
            $mainresult = mysqli_query($conn, $querymembershiptype);
            while ($row = $mainresult->fetch_assoc()) {
                $resultmembershiptype = $row['membership_type'];
            }
        } else {
            $resultmembershiptype = 'None';
        }
        ?>
        <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="600"><?php echo $resultmembershiptype; ?></div>
            <h3>Membership</h3>
            <p>most popular membership so far</p>
        </div>

    </div>

    <div class="clear visible-xs"></div>

    <div class="col-sm-3 col-xs-6">

        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-briefcase"></i></div>
            <div class="num" data-start="0" data-end="
            <?php
            include('database/db_connect.php');
            $result1 = mysqli_query($conn, "SELECT * FROM employee where status = '0'");
            $numrows1 = mysqli_num_rows($result1);
            echo "$numrows1";
            ?>
                 " data-postfix="" data-duration="1500" data-delay="1200">0</div>

            <h3>Registered Employees</h3>
            <p>total number of employees working</p>
        </div>

    </div>

    <div class="col-sm-3 col-xs-6">

        <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-user-add"></i></div>
            <div class="num" data-start="0" data-end="<?php
            include('database/db_connect.php');
            $thisWeekSql1 = "SELECT count(*) as countMembers FROM member WHERE date_added >= NOW() - INTERVAL 1 WEEK";
            $thisWeekValue1 = mysqli_query($conn, $thisWeekSql1);
            $data1 = mysqli_fetch_assoc($thisWeekValue1);
            echo $data1['countMembers'];
            ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>

            <h3>This Week</h3>
            <p>weekly member joinings</p>
        </div>

    </div>
</div>

<br />

<div class="row">
    <div class="col-sm-8">

        <div class="panel panel-primary" id="charts_env">

            <div class="panel-heading">
                <div class="panel-title">Member Stats</div>

                <div class="panel-options">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
                        <li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
                        <li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane" id="area-chart">
                        <div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
                    </div>
                    <div class="tab-pane active" id="line-chart">
                        <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                    </div>
                    <div class="tab-pane" id="pie-chart">
                        <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-responsive">

                <thead>
                    <tr>
                        <th width="50%" class="col-padding-1">
                            <div class="pull-left">
                                <div class="h4 no-margin">Pageviews</div>
                                <small>54,127</small>
                            </div>
                            <span class="pull-right pageviews">4,3,5,4,5,6,5</span>

                        </th>
                        <th width="50%" class="col-padding-1">
                            <div class="pull-left">
                                <div class="h4 no-margin">Unique Visitors</div>
                                <small>25,127</small>
                            </div>
                            <span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
                        </th>
                    </tr>
                </thead>

            </table>

        </div>
        <script type="text/javascript">
            // Code used to add Todo Tasks
            jQuery(document).ready(function ($)
            {
                var $todo_tasks = $("#todo_tasks");

                $todo_tasks.find('input[type="text"]').on('keydown', function (ev)
                {
                    if (ev.keyCode == 13)
                    {
                        if ($.trim($(this).val()).length)
                        {
                            var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>' + $(this).val() + '</label></div></li>');

                            $todo_entry.appendTo($todo_tasks.find('.todo-list'));
                            $todo_entry.hide().slideDown('fast');
                            replaceCheckboxes();
                        }
                    }
                });
            });
        </script> 
    </div>
    <div class="col-sm-4">
        <div class="tile-block" id="todo_tasks">

            <div class="tile-header">
                <i class="entypo-list"></i>

                <a href="#">
                    Tasks
                    <span>To do list</span>
                </a>
            </div>
            <?php
            include('database/db_connect.php');
            $id = $_SESSION['id'];
            $executequery = mysqli_query($conn, "SELECT * FROM tasks where account_id='$id' AND status='0' UNION SELECT * FROM tasks where account_id='$id' AND status='1' AND timestamp >= NOW() - INTERVAL 2 DAY");
            ?>
            <div class="tile-content">
                <form id="add-task-form" name="add-task-form">
                    <input type='hidden' id='hidden-id' value='<?php echo $id; ?>'>
                    <input type="text" class="form-control" placeholder="Add Task" id="add-task" name="add-task"/>
                </form>

                <ul class="todo-list" style="margin-top: 20px;">
                    <?php while ($row = $executequery->fetch_assoc()): ?>
                        <li>
                            <div class="checkbox checkbox-replace color-white">
                                <?php
                                if ($row['status'] == '1') {
                                    echo "<input type='checkbox' id='task-checkbox' name='task-checkbox' checked disabled/>";
                                } else {
                                    echo "<input type='checkbox' id='task-checkbox' name='task-checkbox'/>";
                                }
                                ?>
                                <label class='task-text' data-attr='<?php echo $row['id'] ?>'><?php echo $row['name']; ?></label>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>


    <br />

    <div class="row">

        <div class="col-sm-8">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Latest members</div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                <?php
                include('database/db_connect.php');
                $sqlgetaccounts = "SELECT * FROM member ORDER BY id DESC LIMIT 3";
                $executegetaccounts = mysqli_query($conn, $sqlgetaccounts) or die(mysqli_error());
                ?>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $executegetaccounts->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <br />
</div>

<?php if ($_SESSION['popup'] === 1) {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($)
        {
            setTimeout(function ()
            {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                    "toastClass": "red",
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
                toastr.success("Welcome back " + username + ".", opts);
            }, 1000);
        });
    </script>
    <?php
}
$_SESSION['popup'] = NULL;
?>
<footer class="main">
    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved
</footer>
<!-- Imported styles on this page -->
<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/neon-api.js"></script>
<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

<!-- Imported scripts on this page -->
<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="assets/js/rickshaw/rickshaw.min.js"></script>
<script src="assets/js/raphael-min.js"></script>
<script src="assets/js/morris.min.js"></script>
<script src="assets/js/toastr.js"></script>
<script src="assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>

</body>
</html>