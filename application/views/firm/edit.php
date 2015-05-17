   <div class="row">

   	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

 
          <?php if (isset($message) && !empty($message)): ?>
            <div class="alert alert-info"><?php echo $message;?></div>
         <?php endif;?>
   		<?php echo form_open("firm/editFirm", array('class' =>'form-horizontal well')); ?>
         <?php echo form_hidden('firm_id', $firm_id);?>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Name</label>
   			<div class="col-sm-10">
   				<input type="text" class="form-control" name="firm_name" placeholder="Name" value="<?php echo $firm_name?>" autocomplete="off">
   			</div>
   		</div>
   		
   		<div class="form-group">
   			<div class="col-sm-2 col-md-2"></div>
   			<div class="col-sm-10 col-md-3">
   				<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in"></span> Add</button>
   			</div>
   			<div class="col-sm-2 col-md-5"></div>
   			<div class="col-sm-10 col-md-3">
   				<a href="<?php echo base_url();?>invoice" class="btn btn-danger btn-block" ><span class="glyphicon glyphicon-remove"></span> Cancel</a>
   			</div>
   		</div>
   		<?php echo form_close(); ?>

   	</div>
   </div>