   <div class="row">

   	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

   	
   		<?php echo form_open_multipart("invoice/editInvoice", array('class' =>'form-horizontal well')); ?>
   		<?php echo form_hidden('invoice_id', $invoice_id); ?>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Name</label>
   			<div class="col-sm-10">
   				<input type="text" class="form-control" name="invoice_name" placeholder="Name" value="<?php echo $invoice_title; ?>" autocomplete="off">
   			</div>
   		</div>
         <div class="form-group">
            <label class="col-sm-2 control-label">Firm</label>
            <div class="col-sm-10">
               <select class="form-control" name="invoice_firm">
                  <option value="0">--- select ---</option>
                  <?php foreach ($firms as $key => $value) : ?>
                     <option value="<?php echo $value->firm_id?>" <?php if($firm_id === $value->firm_id) { echo "selected='selected'"; } ?> ><?php echo $value->firm_name?></option>
                  <?php endforeach; ?>
               </select>
            </div>
         </div>
   		<div class="form-group">
   			<label class="col-sm-2 control-label">Cost</label>
   			<div class="col-sm-10">
   				<input type="text" class="form-control" name="invoice_cost" placeholder="0.00$" value="<?php echo $invoice_cost; ?>" autocomplete="off">
   			</div>
   		</div>
   		<div class="form-group">
   			<div class="col-sm-2 col-md-2"></div>
   			<div class="col-sm-10 col-md-3">
   				<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in"></span> Edit</button>
   			</div>
   			<div class="col-sm-2 col-md-5"></div>
   			<div class="col-sm-10 col-md-3">
   				<a href="<?php echo base_url();?>invoice" class="btn btn-danger btn-block" ><span class="glyphicon glyphicon-remove"></span> Cancel</a>
   			</div>
   		</div>
   		<?php echo form_close(); ?>

   	</div>
   </div>