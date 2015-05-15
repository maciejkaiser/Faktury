<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($title) ? $title : "Invoice App"; ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<?php echo $content; ?>
</div>

<hr>
<div class="container">
	<div class="row text-center">
		<div class="col-md-6 col-md-offset-3">Copyright &copy; <?php echo date("Y"); ?> by <a href="http://maciejkaiser.com">Maciej Kaiser</a></div>
	</div>
</div>
</body>
</html>
