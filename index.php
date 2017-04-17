<?php
//require('database/db_connect.php');
//require('data/sample-login-form.php');
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: extra-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="EFitness Admin Panel" />
        <meta name="Blin Nagavci, Labian Gashi, Besarber Tasholli" content="" />

        <link rel="icon" href="assets/images/favicon.ico">

        <title>E-Fitness | Dashboard</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.3.min.js"></script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body  page-fade" data-url="http://neon.dev">

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <div class="sidebar-menu">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/images/logo@2x.png" width="120" alt="" />
                            </a>
                        </div>

                        <!-- logo collapse icon -->
                        <div class="sidebar-collapse">
                            <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>


                        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                        <div class="sidebar-mobile-menu visible-xs">
                            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>

                    </header>


                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <li class="active opened active">
                            <a href="index.php">
                                <i class="entypo-gauge"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-users"></i>
                                <span class="title">Members</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_member.php">
                                        <span class="title">Add member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_members.php">
                                        <span class="title">Search members</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-briefcase"></i>
                                <span class="title">Employees</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_employee.php">
                                        <span class="title">Add employee</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_employees.php">
                                        <span class="title">Search employees</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="entypo-database"></i>
                                <span class="title">Inventory</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_item.php">
                                        <span class="title">Add item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_inventory.php">
                                        <span class="title">Search inventory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="payments.php">
                                        <span class="title">Payments</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--                        <li class="">
                                                    <a href="">
                                                        <i class="entypo-folder"></i>
                                                        <span class="title">Reports</span>
                                                    </a>
                                                </li>-->
                        <li class="">
                            <a href="accounts.php">
                                <i class="entypo-user"></i>
                                <span class="title">Accounts</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="other_settings.php">
                                <i class="entypo-cog"></i>
                                <span class="title">Settings</span>
                            </a>
                        </li>


                    </ul>

                </div>

            </div>

            <div class="main-content">

                <div class="row">

                    <!-- Profile Info and Notifications -->
                    <div class="col-md-6 col-sm-8 clearfix">

                        <ul class="user-info pull-left pull-none-xsm">

                            <!-- Profile Info -->
                            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php
                                    if ($_SESSION['profile_photo'] == '') {
                                        echo 'assets/images/empty-profile-icon.png';
                                    } else {
                                        echo 'repository/account_photos/' . $_SESSION['profile_photo'];
                                    }
                                    ?>" alt="Profile" class="img-circle" width="44" />
                                    <script> var username = "<?php echo $_SESSION['username'] ?>";</script>
                                    <?php echo $_SESSION['username']; ?>
                                </a>

                                <ul class="dropdown-menu">

                                    <!-- Reverse Caret -->
                                    <li class="caret"></li>

                                    <!-- Profile sub-links -->
                                    <li>
                                        <a href="edit_profile.php" >
                                            <i class="entypo-user"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                        <ul class="user-info pull-left pull-right-xs pull-none-xsm">


                        </ul>

                    </div>


                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                        <ul class="list-inline links-list pull-right">	

                            <li>
                                <a href="database/logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                <hr />




                <div class="row">
                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-red">
                            <div class="icon"><i class="entypo-users"></i></div>
                            <div class="num" data-start="0" data-end="
                            <?php
                            include('database/db_connect.php');
                            $result = mysqli_query($conn, "SELECT * FROM member where status = '0'");
                            $numrows = mysqli_num_rows($result);
                            echo "$numrows";
                            ?>
                                 " data-postfix="" data-duration="1500" data-delay="0">0</div>

                            <h3>Registered Members</h3>
                            <p>all members in our fitness.</p>
                        </div>

                    </div>

                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-green">
                            <div class="icon"><i class="entypo-chart-bar"></i></div>
                            <div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">0</div>

                            <h3>Membership</h3>
                            <p>most popular membership so far.</p>
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
                            <p>all employees in our fitness.</p>
                        </div>

                    </div>

                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-blue">
                            <div class="icon"><i class="entypo-user-add"></i></div>
                            <div class="num" data-start="0" data-end="<?php
                            include('database/db_connect.php');
                            $result2 = mysqli_query($conn, "SELECT count(*) as numRecords FROM member WHERE date_added >= NOW() - INTERVAL 1 WEEK");
                            if (($result2->num_rows > 0)) {
                                while ($row = $result2->fetch_assoc()) {
                                    echo '$row["numRecords"]';
                                }
                            } else {
                                echo 'jkfkj';
                            }
                            ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>

                            <h3>This Week</h3>
                            <p>weekly member joining</p>
                        </div>

                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-sm-8">
                        <!-- 
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
                        
                                        </div> -->

                    </div>

                    <div class="col-sm-4">

                        <!-- <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <div class="panel-title">
                                                <h4>
                                                        Real Time Stats
                                                        <br />
                                                        <small>current server uptime</small>
                                                </h4>
                                        </div>
        
                                        <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
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
                        </div> -->

                    </div>
                </div>


                <br />

                <div class="row">

                    <div class="col-sm-4">
                        <!-- 
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
                                                                                <h4>Monthly Payments</h4>
                                                                        </td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                        </div>
                        -->
                    </div>

                    <div class="col-sm-8">

                        <!-- <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <div class="panel-title">Latest Updated Profiles</div>
        
                                        <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                        </div>
                                </div>
        
                                <table class="table table-bordered table-responsive">
                                        <thead>
                                                <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Activity</th>
                                                </tr>
                                        </thead>
        
                                        <tbody>
                                                <tr>
                                                        <td>1</td>
                                                        <td>Art Ramadani</td>
                                                        <td>CEO</td>
                                                        <td class="text-center"><span class="inlinebar">4,3,5,4,5,6</span></td>
                                                </tr>
        
                                                <tr>
                                                        <td>2</td>
                                                        <td>Ylli Pylla</td>
                                                        <td>Font-end Developer</td>
                                                        <td class="text-center"><span class="inlinebar-2">1,3,4,5,3,5</span></td>
                                                </tr>
        
                                                <tr>
                                                        <td>3</td>
                                                        <td>Arlind Nushi</td>
                                                        <td>Co-founder</td>
                                                        <td class="text-center"><span class="inlinebar-3">5,3,2,5,4,5</span></td>
                                                </tr>
        
                                        </tbody>
                                </table>
                        </div>
                        -->
                    </div>

                </div>

                <br />


<!-- <script type="text/javascript">
        // Code used to add Todo Tasks
        jQuery(document).ready(function($)
        {
                var $todo_tasks = $("#todo_tasks");

                $todo_tasks.find('input[type="text"]').on('keydown', function(ev)
                {
                        if(ev.keyCode == 13)
                        {
                                ev.preventDefault();

                                if($.trim($(this).val()).length)
                                {
                                        var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
                                        $(this).val('');

                                        $todo_entry.appendTo($todo_tasks.find('.todo-list'));
                                        $todo_entry.hide().slideDown('fast');
                                        replaceCheckboxes();
                                }
                        }
                });
        });
</script> -->

                <div class="row">

                    <div class="col-sm-3">
                        <!-- 	<div class="tile-block" id="todo_tasks">
                
                                        <div class="tile-header">
                                                <i class="entypo-list"></i>
                
                                                <a href="#">
                                                        Tasks
                                                        <span>To do list, tick one.</span>
                                                </a>
                                        </div>
                
                                        <div class="tile-content">
                
                                                <input type="text" class="form-control" placeholder="Add Task" />
                
                
                                                <ul class="todo-list">
                                                        <li>
                                                                <div class="checkbox checkbox-replace color-white">
                                                                        <input type="checkbox" />
                                                                        <label>Website Design</label>
                                                                </div>
                                                        </li>
                
                                                        <li>
                                                                <div class="checkbox checkbox-replace color-white">
                                                                        <input type="checkbox" id="task-2" checked />
                                                                        <label>Slicing</label>
                                                                </div>
                                                        </li>
                
                                                        <li>
                                                                <div class="checkbox checkbox-replace color-white">
                                                                        <input type="checkbox" id="task-3" />
                                                                        <label>WordPress Integration</label>
                                                                </div>
                                                        </li>
                
                                                        <li>
                                                                <div class="checkbox checkbox-replace color-white">
                                                                        <input type="checkbox" id="task-4" />
                                                                        <label>SEO Optimize</label>
                                                                </div>
                                                        </li>
                
                                                        <li>
                                                                <div class="checkbox checkbox-replace color-white">
                                                                        <input type="checkbox" id="task-5" checked="" />
                                                                        <label>Minify &amp; Compress</label>
                                                                </div>
                                                        </li>
                                                </ul>
                
                                        </div>
                
                                        <div class="tile-footer">
                                                <a href="#">View all tasks</a>
                                        </div>
                
                                </div> -->
                    </div>

                    <div class="col-sm-9">

        <!-- 	<script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                                var map = $("#map-2");

                                map.vectorMap({
                                        map: 'europe_merc_en',
                                        zoomMin: '3',
                                        backgroundColor: '#383f47',
                                        focusOn: { x: 0.5, y: 0.8, scale: 3 }
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

                </div> -->

                    </div>

                </div>

                <!-- Footer -->
                <footer class="main">

                    <strong>E-Fitness 2017 </strong>&copy; All Rights Reserved

                </footer>
            </div>

        </div>

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
        <!-- <script src="assets/js/morris.min.js"></script> -->
        <script src="assets/js/toastr.js"></script>
        <script src="assets/js/neon-chat.js"></script>
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

        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>

    </body>
</html>