<?php
$title = 'Dashboard';
require_once ('header.php');

//include('database/db_connect.php');
$thisWeekSql = "SELECT count(*) as numRecords FROM member WHERE date_added >= NOW() - INTERVAL 1 WEEK";
$thisWeekValue = mysqli_query($conn, $thisWeekSql);
$data = mysqli_fetch_assoc($thisWeekValue);
echo $data['numRecords'];
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
        var line_chart_demo = $("#line-chart-demo");

        var line_chart = Morris.Line({
            element: 'line-chart-demo',
            parseTime: false,
            data: [
                {y: 'asd', a: 100, b: 90},
                {y: '2007', a: 75, b: 65},
                {y: '2008', a: 50, b: 40},
                {y: '2009', a: 75, b: 65},
                {y: '2010', a: 50, b: 40},
                {y: '2011', a: 75, b: 65},
                {y: '2012', a: 100, b: 90}
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['October 2013', 'November 2013'],
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




        // Rickshaw
        var seriesData = [[], []];

        var random = new Rickshaw.Fixtures.RandomData(50);

        for (var i = 0; i < 50; i++)
        {
            random.addData(seriesData);
        }

        var graph = new Rickshaw.Graph({
            element: document.getElementById("rickshaw-chart-demo"),
            height: 193,
            renderer: 'area',
            stroke: false,
            preserve: true,
            series: [{
                    color: '#73c8ff',
                    data: seriesData[0],
                    name: 'Upload'
                }, {
                    color: '#e0f2ff',
                    data: seriesData[1],
                    name: 'Download'
                }
            ]
        });

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail({
            graph: graph,
            xFormatter: function (x) {
                return new Date(x * 1000).toString();
            }
        });

        var legend = new Rickshaw.Graph.Legend({
            graph: graph,
            element: document.getElementById('rickshaw-legend')
        });

        var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight({
            graph: graph,
            legend: legend
        });

        setInterval(function () {
            random.removeData(seriesData);
            random.addData(seriesData);
            graph.update();

        }, 500);
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
            $result2 = mysqli_query($conn, "SELECT count(*) as numRecords FROM member WHERE date_added >= NOW() - INTERVAL 1 WEEK");
            if (($result2->num_rows > 0)) {
                $data = mysql_fetch_assoc($result);
                echo $data['numRecords'];
            } else {
                echo '0';
            }
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
                <div class="panel-title">Site Stats</div>

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

    </div>

    <div class="col-sm-4">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        Real Time Stats
                        <br />
                        <small>current server uptime</small>
                    </h4>
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div id="rickshaw-chart-demo">
                    <div id="rickshaw-legend"></div>
                </div>
            </div>
        </div> 

    </div>
</div>


<br />

<div class="row">

    <div class="col-sm-4">

        <div class="panel panel-primary">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="padding-bottom-none text-center">
                            <br />
                            <br />
                            <span class="monthly-sales"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="panel-heading">
                            <h4>Members per day</h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

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

<div class="row">

    <div class="col-sm-3">
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

    <div class="col-sm-9">
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                var map = $("#map-2");

                map.vectorMap({
                    map: 'europe_merc_en',
                    zoomMin: '3',
                    backgroundColor: '#383f47',
                    focusOn: {x: 0.5, y: 0.8, scale: 3}
                });
                $("#add-task-form").submit(function (e) {
                    e.preventDefault();
                    if (!($("#add-task").val() === "")) {
                        var id = $("#hidden-id").val();
                        var taskname = $("#add-task").val();
                        var form_data = new FormData();
                        form_data.append('id', id);
                        form_data.append('taskname', taskname);
                        $.ajax({
                            type: "POST",
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            url: "database/add_task.php",
                            data: form_data
                        });
                        $("#add-task").val('');
                    }
                });
                $(".checkbox").change(function () {
                    if ($(this).find("#task-checkbox").is(":checked")) {
                        var id = $(this).find(".task-text").attr('data-attr');
                        var form_data = new FormData();
                        form_data.append('id', id);
                        $.ajax({
                            type: "POST",
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            url: "database/remove_task.php",
                            data: form_data
                        });
                    }
                });
            });
        </script>

        <div class="tile-group">

            <div class="tile-left">
                <div class="tile-entry">
                    <h3>Map</h3>
                    <span>top visitors location</span>
                </div>

                <div class="tile-entry">
                    <img src="assets/images/sample-al.png" alt="" class="pull-right op" />

                    <h4>Albania</h4>
                    <span>25%</span>
                </div>

                <div class="tile-entry">
                    <img src="assets/images/sample-it.png" alt="" class="pull-right op" />

                    <h4>Italy</h4>
                    <span>18%</span>
                </div>

                <div class="tile-entry">
                    <img src="assets/images/sample-au.png" alt="" class="pull-right op" />

                    <h4>Austria</h4>
                    <span>15%</span>
                </div>
            </div>

            <div class="tile-right">

                <div id="map-2" class="map"></div>

            </div>

        </div>

    </div>

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