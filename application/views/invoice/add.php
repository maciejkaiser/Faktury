   <div class="row">

   	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

   		<div class="page-header">
   			<h1><?php echo $this->session->userdata('user_id'); ?></h1>
   		</div>


          <?php if (isset($message) && !empty($message)): ?>
            <div class="alert alert-info"><?php echo $message;?></div>
         <?php endif;?>
   		<?php echo form_open_multipart("invoice/addInvoice", array('class' =>'form-horizontal well')); ?>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Name</label>
   			<div class="col-sm-10">
   				<input type="text" class="form-control" name="invoice_name" placeholder="Name" autocomplete="off">
   			</div>
   		</div>
         <div class="form-group">
            <label class="col-sm-2 control-label">Firm</label>
            <div class="col-sm-10">
               <select class="form-control" name="invoice_firm">
                  <option value="0">--- select ---</option>
                  <?php foreach ($firms as $key => $value) : ?>
                     <option value="<?php echo $value->firm_id?>"><?php echo $value->firm_name?></option>
                  <?php endforeach; ?>
               </select>
            </div>
         </div>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Cost</label>
   			<div class="col-sm-10">
   				<input type="text" class="form-control" name="invoice_cost" placeholder="0.00$" autocomplete="off">
   			</div>
   		</div>
         <div class="form-group">
            <label class="col-sm-2 control-label">Invoice File</label>
            <div class="col-sm-10">
               <input type="file" name="invoice_file">
               <p class="help-block">.PDF files preferred</p>
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