<?php defined('BASEPATH') OR exit('No direct script access allowed');?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Sumit Jangid">
		<title>Image Redundancy Elimination</title>
		
		<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
		<link href="<?php echo base_url();?>/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url();?>/css/custom.css" rel="stylesheet">
		
		<!-- Custom Fonts -->
		<link href="<?php echo base_url();?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
		<?php 
			$SessionUserData = $this->session->userdata();
			$isLoggedIn = (isset($SessionUserData["is_loggedin"]) && $SessionUserData["is_loggedin"] === TRUE)?true:false;
		?>
	</head>
	
	<body id="page-top" class="index">
		
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<?php if(isset($success) || isset($error) || isset($warning)){?>
			<div class="row">
				<?php if(isset($success)){?>
					<div class="col-lg-12">
						<div class="bs-component">
							<div class="alert alert-dismissible alert-success">
								<button data-dismiss="alert" class="close" type="button">×</button>
								<p><?php echo $success;?></p>
							</div>
						</div>
					</div>
				<?php }?>
				<?php if(isset($error)){?>
					<div class="col-lg-12">
						<div class="bs-component">
							<div class="alert alert-dismissible alert-danger">
								<button data-dismiss="alert" class="close" type="button">×</button>
								<p><?php echo $error;?></p>
							</div>
						</div>
					</div>
				<?php }?>
				<?php if(isset($warning)){?>
					<div class="col-lg-12">
						<div class="bs-component">
							<div class="alert alert-dismissible alert-warning">
								<button data-dismiss="alert" class="close" type="button">×</button>
								<p><?php echo $warning;?></p>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
			<?php }?>
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url();?>">Image Redundancy Elimination</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="page-scroll">
							<?php if($isLoggedIn):?><a href="<?php echo base_url('user/logout');?>">Logout</a><?php else:?><a href="<?php echo base_url('login/connect');?>">Login</a><?php endif;?> 
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		