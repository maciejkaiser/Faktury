   <div class="row">

   	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

   		<div class="page-header">
   			<h1><?php echo $title; ?></h1>
   		</div>
         
         <?php if (isset($message) && !empty($message)): ?>
            <div class="alert alert-info"><?php echo $message;?></div>
         <?php endif;?>
   		<?php echo form_open("user/loginUser", array('class' =>'form-horizontal well')); ?>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Username</label>
   			<div class="col-sm-10">
   				<input type="text" class="form-control" name="user_name" placeholder="Name">
   			</div>
   		</div>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Password</label>
   			<div class="col-sm-10">
   				<input type="password" class="form-control" name="user_password" placeholder="Pass">
   			</div>
   		</div>
   		<div class="form-group">
   			<div class="col-sm-2 col-md-2"></div>
   			<div class="col-sm-10 col-md-3">
   				<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>
   			</div>
   			<div class="col-sm-2 col-md-5"></div>
   			<div class="col-sm-10 col-md-3">
   				<a href="<?php echo base_url();?>/home/index" class="btn btn-danger btn-block" ><span class="glyphicon glyphicon-remove"></span> Cancel</a>
   			</div>
   		</div>
   		<a href="<?php echo base_url();?>user/register">Don't have an account yet?</a>
   		<?php echo form_close(); ?>

   	</div>
   </div>