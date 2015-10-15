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
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body class="hold-transition login-page">

				<!-- Your Page Content Here -->
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>

		<?php echo $this->Html->script([
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
