<!DOCTYPE html>
<html>
	<head>
		<?php 
		echo $this->fetch('css');
		echo $this->Html->css([
			'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',       // Bootstrap
			'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', // Font Awesome
			'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',         // Ionicons
			'AdminLTE.min',                                                                // AdminLTE main
			'skins/_all-skins.min'                                                          // AdminLTE skin (add to body class)
		]); 
		?>
		
		<?= $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    
	    <title>
	        <?= $this->fetch('title') ?>
	    </title>
	    <?= $this->Html->meta('icon') ?>
	
	    <?= $this->fetch('meta') ?>
	    
	</head>
	
	<body class="fixed skin-blue sidebar-mini">
		<div class="wrapper">
		 	<!-- Main Admin LTE Header -->
			<header class="main-header">
				<!-- Logo -->
				<a href="index2.html" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>V</b>O</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>V</b>Office</span>
				</a>
				<!-- Header Navbar -->
        		<nav class="navbar navbar-static-top" role="navigation">
        			<!-- Sidebar toggle button-->
          			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            			<span class="sr-only">Toggle navigation</span>
          			</a>
          			
          			<!-- Navbar Right Menu -->
          			<div class="navbar-custom-menu">
          				<ul class="nav navbar-nav">
          					<!-- Messages: style can be found in dropdown.less-->
              				<li class="dropdown messages-menu">
								<!-- Menu toggle button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<span class="label label-danger">4</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">You have 4 messages</li>
									<li>
										<!-- inner menu: contains the messages -->
										<ul class="menu">
											<li><!-- start message -->
												<a href="#">
													<div class="pull-left">
														<!-- User Image -->
														<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
													</div>
													<!-- Message title and timestamp -->
													<h4>
														Support Team
														<small><i class="fa fa-clock-o"></i> 5 mins</small>
													</h4>
													<!-- The message -->
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li><!-- end message -->
										</ul><!-- /.menu -->
									</li>
									<li class="footer"><a href="#">See All Messages</a></li>
								</ul>
							</li><!-- /.messages-menu -->
							
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
                				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
	                  				<img src="https://avatars3.githubusercontent.com/u/796840?v=3&s=140" class="user-image" alt="User Image">
	                  				<span class="hidden-xs"><?= $this->request->Session()->read('Auth.User.name') ?></span>
            					</a>
                				<ul class="dropdown-menu">
                  					<!-- User image -->
                  					<li class="user-header">
                    					<img src="https://avatars3.githubusercontent.com/u/796840?v=3&s=140" class="img-circle" alt="User Image">
                    					<p>
                      						<?= $this->request->Session()->read('Auth.User.name') ?> - Web Developer
                      						<small>Member since <?= $this->request->Session()->read('Auth.User.created')->i18nFormat('YYYY MMMM dd'); ?></small>
                    					</p>
                  					</li>
                  					<!-- Menu Body -->
                  					<li class="user-body">
                    					<div class="row">
                      						<div class="col-xs-4 text-center">
                        						<a href="#">Followers</a>
                      						</div>
	                      					<div class="col-xs-4 text-center">
	                        					<a href="#">Sales</a>
	                      					</div>
	                  						<div class="col-xs-4 text-center">
	                        					<a href="#">Friends</a>
	                      					</div>
                    					</div><!-- /.row -->
                  					</li>
                  					<!-- Menu Footer-->
                  					<li class="user-footer">
                    					<div class="pull-left">
                    						<?= $this->Html->link('Profile', 
                    												['controller' => 'users', 'action' => 'view', $this->request->Session()->read('Auth.User.id')],
                    												['class' => 'btn btn-default btn-flat']) ?>
                    					</div>
                    					<div class="pull-right">
                      						<a href="/users/logout" class="btn btn-default btn-flat">Sign out</a>
                    					</div>
                  					</li>
            					</ul>
          					</li>
          					
							<li>
								<a href="#" data-toggle="control-sidebar">
									<i class="fa fa-gears"></i>
								</a>
							</li>
          				</ul>
          			</div>
        		</nav>
      		</header>
      		
      		<!-- Left side column. contains the logo and sidebar -->
      		<aside class="main-sidebar">

        		<!-- sidebar: style can be found in sidebar.less -->
        		<section class="sidebar">

          			<!-- Sidebar user panel (optional) -->
          			<div class="user-panel">
            			<div class="pull-left image">
              				<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            			</div>
	            		<div class="pull-left info">
	              			<p>Alexander Pierce</p>
			              	<!-- Status -->
		            		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	            		</div>
          			</div>

					<!-- search form (Optional) -->
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
      				<!-- /.search form -->

					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">
						<li class="header">TASKS</li>
						<!-- Optionally, you can add icons to the links -->
						<li class="<?= $this->request->controller === 'Users' ? 'active' : '' ?>"><a href="/users"><i class="fa fa-users"></i> <span>Users</span></a></li>
						<li class="<?= $this->request->controller === 'Customers' ? 'active' : '' ?>"><a href="/customers"><i class="fa fa-industry"></i> <span>Customers</span></a></li>
						<li class="<?= $this->request->controller === 'Meetings' ? 'active' : '' ?>"><a href="/meetings"><i class="fa fa-car"></i> <span>Meetings</span></a></li>
						<li class="<?= $this->request->controller === 'Departments' ? 'active' : '' ?>"><a href="/departments"><i class="fa fa-bank"></i> <span>Departments</span></a></li>
						<!--
						<li class="treeview">
							<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
							<ul class="treeview-menu">
								<li><a href="#">Link in level 2</a></li>
								<li><a href="#">Link in level 2</a></li>
							</ul>
						</li>
						-->
					</ul><!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>

  			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?= $this->request->controller; ?>
					<small><?= ucwords($this->request->action); ?></small>
				</h1>
				<?php
				echo $this->Html->getCrumbList(['firstClass' => false, 'lastClass' => 'active']);
				?>
			</section>
			
			<!-- Main content -->
			<section class="content">
				<!-- Your Page Content Here -->
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
			</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			
			<!-- Main Footer -->
      		<footer class="main-footer">
	        	<!-- To the right -->
	        	<div class="pull-right hidden-xs">
	          		Anything you want
	        	</div>
	        	<!-- Default to the left -->
	        	<strong>Copyright &copy; 2015 <a href="#">Andrius Bolšaitis</a>.</strong> All rights reserved.
	      	</footer>
	      	
	      	<!-- Control Sidebar -->
      		<aside class="control-sidebar control-sidebar-dark">
        		<!-- Create the tabs -->
    			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          			<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		        </ul>
        		<!-- Tab panes -->
        		<div class="tab-content">
          			<!-- Home tab content -->
      				<div class="tab-pane active" id="control-sidebar-home-tab">
						<h3 class="control-sidebar-heading">Recent Activity</h3>
						<ul class="control-sidebar-menu">
							<li>
							<a href="javascript::;">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>
								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
									<p>Will be 23 on April 24th</p>
								</div>
							</a>
							</li>
						</ul><!-- /.control-sidebar-menu -->

			            <h3 class="control-sidebar-heading">Tasks Progress</h3>
						<ul class="control-sidebar-menu">
							<li>
								<a href="javascript::;">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="label label-danger pull-right">70%</span>
								</h4>
								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
								</a>
							</li>
						</ul><!-- /.control-sidebar-menu -->
          			</div><!-- /.tab-pane -->
					<!-- Stats tab content -->
					<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
					<!-- Settings tab content -->
					<div class="tab-pane" id="control-sidebar-settings-tab">
						<form method="post">
							<h3 class="control-sidebar-heading">General Settings</h3>
							<div class="form-group">
								<label class="control-sidebar-subheading">
									Report panel usage
									<input type="checkbox" class="pull-right" checked>
								</label>
								<p>
									Some information about this general settings option
								</p>
							</div><!-- /.form-group -->
						</form>
					</div><!-- /.tab-pane -->
				</div>
			</aside><!-- /.control-sidebar -->
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div><!-- ./wrapper -->
      		
			<?php echo $this->Html->script([
		    /*
	        <h1><?php echo $this->request->controller; ?></h1>
	        <p class="lead"><?php echo ucwords($this->request->action); ?></p>
  		
		    <?= $this->fetch('content') ?>
		    */
	
			'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',    // Jquery
			'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', // Bootstrap
			'app.min',                                                             // AdminLTE main
			'plugins/fastclick.min',                                               // AdminLTE plugin
			'plugins/jquery.slimscroll'                                                    // AdminLTE plugin
		]);
	    echo $this->fetch('script');

		?>

	</body>
</html>
