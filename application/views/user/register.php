   <div class="row">

   	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

   		<div class="page-header">
   			<h4><?php echo $title; ?></h4>
   		</div>

   		<div class="well">Registration</div>
   		<?php echo form_open("user/registerUser", array('class' =>'form-horizontal well')); ?>
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
   				<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in"></span> Create</button>
   			</div>
   			<div class="col-sm-2 col-md-5"></div>
   			<div class="col-sm-10 col-md-3">
   				<a href="<?php base_url();?>home" class="btn btn-danger btn-block" ><span class="glyphicon glyphicon-remove"></span> Cancel</a>
   			</div>
   		</div>
   		<a href="<?php echo base_url();?>user/login">Have account already?</a>
   		<?php echo form_close(); ?>

   	</div>
   </div>