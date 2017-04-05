<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
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
    </head>
    <body class="page-body  page-fade" data-url="">
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
                        <li class="">
                            <a href="index.php">
                                <i class="entypo-gauge"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="has-sub active opened active">
                            <a href="add_members">
                                <i class="entypo-users"></i>
                                <span class="title">Members</span>
                            </a>
                            <ul>
                                <li class="active">
                                    <a href="add_members">
                                        <span class="title">Add Members</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Search Members</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="">
                                <i class="entypo-briefcase"></i>
                                <span class="title">Employees</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="">
                                        <span class="title">Add Employees</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Search Employees</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="">
                                <i class="entypo-database"></i>
                                <span class="title">Inventory</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="add_item.php">
                                        <span class="title">Add Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="search_inventory.php">
                                        <span class="title">Search Inventory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="sales.php">
                                        <span class="title">Sales</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="entypo-folder"></i>
                                <span class="title">Reports</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="entypo-user"></i>
                                <span class="title">Accounts</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="entypo-tools"></i>
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
							<img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
							Blin Nagavci
						</a>
		
						<ul class="dropdown-menu">
		
							<!-- Reverse Caret -->
							<li class="caret"></li>
		
							<!-- Profile sub-links -->
							<li>
								<a href="extra-timeline.html">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>
		
							
							<li>
								<a href="extra-calendar.html">
									<i class="entypo-calendar"></i>
									Calendar
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
						<a href="extra-login.html">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>
		
		<hr />

                <ol class="breadcrumb bc-3" >
                    <li>
                        <a href="index.php"><i class="fa-home"></i>Dashboard</a>
                    </li>
                    <li class="active">

                        <strong>Add Members</strong>
                    </li>
                </ol>

                <h2>Add Member</h2>
                <br />


                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                </div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form role="form" class="form-horizontal form-groups-bordered">

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">First Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_firstname" class="form-control" id="field-1" placeholder="">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Last Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_surname" class="form-control" id="field-1" placeholder="">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">First Name</label>

                                        <div class="col-sm-5">
                                            <input type="text" name="member_firstname" class="form-control" id="field-1" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-2" class="col-sm-3 control-label">Disabled</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="field-2" placeholder="Placeholder" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-3" class="col-sm-3 control-label">Password</label>

                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="field-3" placeholder="Placeholder (Password)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">File Field</label>

                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="field-file" placeholder="Placeholder">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-ta" class="col-sm-3 control-label">Textarea</label>

                                        <div class="col-sm-5">
                                            <textarea class="form-control" id="field-ta" placeholder="Textarea"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-ta" class="col-sm-3 control-label">Autogrow</label>

                                        <div class="col-sm-5">
                                            <textarea class="form-control autogrow" id="field-ta" placeholder="I will grow as you type new lines."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group has-error">
                                        <label for="field-4" class="col-sm-3 control-label">Error field</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="field-4" placeholder="Placeholder">
                                        </div>
                                    </div>

                                    <div class="form-group has-warning">
                                        <label for="field-5" class="col-sm-3 control-label">Warning field</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="field-5" placeholder="Placeholder">
                                        </div>
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="field-6" class="col-sm-3 control-label">Success field</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="field-6" placeholder="Placeholder">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Select List</label>

                                        <div class="col-sm-5">
                                            <select class="form-control">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                                <option>Option 4</option>
                                                <option>Option 5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">Checkbox 1
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">Checkbox 2
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio Input 1
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Input 2
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-default">Sign in</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                    Input Sizes
                                </div>

                                <div class="panel-options">
                                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form role="form" class="form-horizontal form-groups-bordered">

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Large</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control input-lg" id="field-1" placeholder="Large input (.input-lg)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Medium</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="field-1" placeholder="Normal input">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label">Small</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control input-sm" id="field-1" placeholder="Large input (.input-sm)">
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                    Input Groups &amp; Addons
                                </div>

                                <div class="panel-options">
                                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form role="form" class="form-horizontal form-groups-bordered">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Left addon</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="text" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Right addon</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Both addons</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Icon addon</label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                                <input type="text" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Minimal type addon</label>

                                        <div class="col-sm-5">
                                            <div class="input-group minimal">
                                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                                <input type="text" class="form-control" placeholder="Email">
                                            </div>

                                            <br />

                                            <div class="input-group minimal">
                                                <input type="text" class="form-control" placeholder="Username">
                                                <span class="input-group-addon"><i class="entypo-user"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Buttons assigned</label>

                                        <div class="col-sm-5">

                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button">Go!</button>
                                                </span>

                                                <input type="text" class="form-control">
                                            </div>

                                            <br />


                                            <div class="input-group">
                                                <input type="text" class="form-control">

                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button">Go!</button>
                                                </span>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Dropdowns assigned</label>

                                        <div class="col-sm-5">

                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-gold dropdown-toggle" data-toggle="dropdown">
                                                        Action <span class="caret"></span>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-gold">
                                                        <li><a href="#">Action</a></li>
                                                        <li><a href="#">Another action</a></li>
                                                        <li><a href="#">Something else here</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Separated link</a></li>
                                                    </ul>
                                                </div>

                                                <input type="text" class="form-control">
                                            </div>

                                            <br />


                                            <div class="input-group">
                                                <input type="text" class="form-control">

                                                <div class="input-group-btn">					
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                        <i class="entypo-info"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown">
                                                        <li><a href="#">Action</a></li>
                                                        <li><a href="#">Another action</a></li>
                                                        <li><a href="#">Something else here</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Separated link</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                    Replaced Checkboxes &amp; Radio
                                </div>

                                <div class="panel-options">
                                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form role="form" class="form-horizontal form-groups-bordered">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Checkboxes</label>

                                        <div class="col-sm-5">
                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-1" checked>
                                                <label>Checkbox 1</label>
                                            </div>

                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-2">
                                                <label>Checkbox 2</label>
                                            </div>

                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-3">
                                                <label>Checkbox 3</label>
                                            </div>

                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-4" disabled>
                                                <label>Disabled</label>
                                            </div>

                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-5" checked disabled>
                                                <label>Checked &amp; Disabled</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Radio Inputs</label>

                                        <div class="col-sm-5">
                                            <div class="radio radio-replace">
                                                <input type="radio" id="rd-1" name="radio1" checked>
                                                <label>Radio 1</label>
                                            </div>

                                            <div class="radio radio-replace">
                                                <input type="radio" id="rd-2" name="radio1">
                                                <label>Radio 2</label>
                                            </div>

                                            <div class="radio radio-replace">
                                                <input type="radio" id="rd-3" name="radio1">
                                                <label>Radio 3</label>
                                            </div>

                                            <div class="radio radio-replace">
                                                <input type="radio" id="rd-4" name="radio1" disabled>
                                                <label>Disabled</label>
                                            </div>

                                            <div class="radio radio-replace">
                                                <input type="radio" id="rd-5" name="radio2" checked disabled>
                                                <label>Checked &amp; Disabled</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Colors</label>

                                        <div class="col-sm-5">
                                            <div class="checkbox checkbox-replace color-primary">
                                                <input type="checkbox" id="chk-20" checked>
                                                <label>Checkbox Red</label>
                                            </div>

                                            <div class="checkbox checkbox-replace color-red">
                                                <input type="checkbox" id="chk-21">
                                                <label>Checkbox Red</label>
                                            </div>

                                            <div class="checkbox checkbox-replace color-blue">
                                                <input type="checkbox" id="chk-22">
                                                <label>Checkbox Blue</label>
                                            </div>

                                            <div class="checkbox checkbox-replace color-green">
                                                <input type="checkbox" id="chk-23">
                                                <label>Checkbox Green</label>
                                            </div>

                                            <div class="checkbox checkbox-replace color-gold">
                                                <input type="checkbox" id="chk-24">
                                                <label>Checkbox Gold</label>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                    Switches - Checkbox &amp; Radio
                                </div>

                                <div class="panel-options">
                                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <form role="form" class="form-horizontal form-groups-bordered">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Toggle Check</label>

                                        <div class="col-sm-5">
                                            <div class="make-switch">
                                                <input type="checkbox" checked="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Toggle Sizes</label>

                                        <div class="col-sm-5">

                                            <div class="bs-example">
                                                <div class="make-switch switch-large">
                                                    <input type="checkbox">
                                                </div>

                                                <div class="make-switch">
                                                    <input type="checkbox">
                                                </div>

                                                <div class="make-switch switch-small">
                                                    <input type="checkbox">
                                                </div>

                                                <div class="make-switch switch-mini">
                                                    <input type="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">No Animation</label>

                                        <div class="col-sm-5">
                                            <div class="make-switch switch-large" data-animated="false">
                                                <input type="checkbox">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Disabled</label>

                                        <div class="col-sm-5">
                                            <div class="make-switch switch-large">
                                                <input type="checkbox" disabled>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Custom Label</label>

                                        <div class="col-sm-5">
                                            <div id="label-switch" class="make-switch" data-on-label="Ja" data-off-label="Nein">
                                                <input type="checkbox" checked>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Apply Icon</label>

                                        <div class="col-sm-5">
                                            <div class="make-switch" data-on-label="<i class='entypo-check'></i>" data-off-label="<i class='entypo-cancel'></i>">
                                                <input type="checkbox" checked />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Middle Label</label>

                                        <div class="col-sm-5">
                                            <div class="make-switch" data-text-label="<i class='entypo-user'></i>">
                                                <input type="checkbox" checked />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Colors</label>

                                        <div class="col-sm-5">

                                            <div class="bs-example">			
                                                <div class="make-switch" data-on="primary" data-off="info">
                                                    <input type="checkbox" checked>
                                                </div>

                                                <div class="make-switch" data-on="info" data-off="success">
                                                    <input type="checkbox" checked>
                                                </div>

                                                <div class="make-switch" data-on="success" data-off="warning">
                                                    <input type="checkbox" checked>
                                                </div>

                                                <div class="make-switch" data-on="warning" data-off="danger">
                                                    <input type="checkbox" checked>
                                                </div>

                                                <div class="make-switch" data-on="danger" data-off="default">
                                                    <input type="checkbox" checked>
                                                </div>

                                                <div class="make-switch" data-on="default" data-off="primary">
                                                    <input type="checkbox" checked>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Radio</label>

                                        <div class="col-sm-5">

                                            <div class="bs-example">
                                                <div class="make-switch is-radio switch-small" data-text-label="<i class='entypo-user'></i>">
                                                    <input type="radio" name="radio1" checked />
                                                </div>

                                                <div class="make-switch is-radio switch-small" data-text-label="<i class='entypo-heart'></i>">
                                                    <input type="radio" name="radio1" />
                                                </div>

                                                <div class="make-switch is-radio switch-small" data-text-label="<i class='entypo-info'></i>">
                                                    <input type="radio" name="radio1" />
                                                </div>

                                                <div class="make-switch is-radio switch-small" data-text-label="<i class='entypo-globe'></i>">
                                                    <input type="radio" name="radio1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title">
                                    Input Grid
                                </div>

                                <div class="panel-options">
                                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder=".col-md-12">
                                    </div>

                                    <div class="clear"></div>
                                    <br />

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder=".col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder=".col-md-6">
                                    </div>

                                    <div class="clear"></div>
                                    <br />

                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder=".col-md-4">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder=".col-md-4">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder=".col-md-4">
                                    </div>

                                    <div class="clear"></div>
                                    <br />

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <div class="clear"></div>
                                    <br />

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                    </div>

                                    <div class="clear"></div>
                                    <br />

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" placeholder=".col-md-1">
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- Footer -->
                <footer class="main">

                    &copy; 2015 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>

                </footer>
            </div>


            <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

                <div class="chat-inner">


                    <h2 class="chat-header">
                        <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                        <i class="entypo-users"></i>
                        Chat
                        <span class="badge badge-success is-hidden">0</span>
                    </h2>


                    <div class="chat-group" id="group-1">
                        <strong>Favorites</strong>

                        <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                        <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
                    </div>


                    <div class="chat-group" id="group-2">
                        <strong>Work</strong>

                        <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                        <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
                    </div>


                    <div class="chat-group" id="group-3">
                        <strong>Social</strong>

                        <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
                    </div>

                </div>

                <!-- conversation template -->
                <div class="chat-conversation">

                    <div class="conversation-header">
                        <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                        <span class="user-status"></span>
                        <span class="display-name"></span>
                        <small></small>
                    </div>

                    <ul class="conversation-body">
                    </ul>

                    <div class="chat-textarea">
                        <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                    </div>

                </div>

            </div>


            <!-- Chat Histories -->
            <ul class="chat-history" id="sample_history">
                <li>
                    <span class="user">Art Ramadani</span>
                    <p>Are you here?</p>
                    <span class="time">09:00</span>
                </li>

                <li class="opponent">
                    <span class="user">Catherine J. Watkins</span>
                    <p>This message is pre-queued.</p>
                    <span class="time">09:25</span>
                </li>

                <li class="opponent">
                    <span class="user">Catherine J. Watkins</span>
                    <p>Whohoo!</p>
                    <span class="time">09:26</span>
                </li>

                <li class="opponent unread">
                    <span class="user">Catherine J. Watkins</span>
                    <p>Do you like it?</p>
                    <span class="time">09:27</span>
                </li>
            </ul>




            <!-- Chat Histories -->
            <ul class="chat-history" id="sample_history_2">
                <li class="opponent unread">
                    <span class="user">Daniel A. Pena</span>
                    <p>I am going out.</p>
                    <span class="time">08:21</span>
                </li>

                <li class="opponent unread">
                    <span class="user">Daniel A. Pena</span>
                    <p>Call me when you see this message.</p>
                    <span class="time">08:27</span>
                </li>
            </ul>


        </div>




        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/TweenMax.min.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>


        <!-- Imported scripts on this page -->
        <script src="assets/js/bootstrap-switch.min.js"></script>
        <script src="assets/js/neon-chat.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>

    </body>
</html>