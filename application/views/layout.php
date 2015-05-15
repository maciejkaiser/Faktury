<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($title) ? $title : "Invoice App"; ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
</head>
<body>

	<?php if(($this->session->userdata('user_name')!="")): ?>
		<nav class="navbar navbar-invert navbar-collapse">
		<div class="navbar-inner">
			<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url()?>user">Invoices</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url()?>invoice">Show invoices</a></li>
							<li><a href="<?php echo base_url()?>invoice/add">Add invoice</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
				        
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->session->userdata('user_name')?> <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				           <li><a href="<?php echo base_url()?>user/actions">Actions</a></li>
				            <li><a href="<?php echo base_url()?>user/settings">Settings</a></li>
				            <li class="divider"></li>
				            <li><a href="<?php echo base_url();?>user/logout">Sign out</a></li>
				          </ul>
				        </li>
				      </ul>
					</div>
				</div>
			</div>
		</nav>
	<?php endif; ?>
	<div class="container">
		<?php echo $content; ?>
	</div>

	<hr>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-6 col-md-offset-3">Copyright &copy; <?php echo date("Y"); ?> by <a href="http://maciejkaiser.com">Maciej Kaiser</a></div>
		</div>
	</div>

	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>
