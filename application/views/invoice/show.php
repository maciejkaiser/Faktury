   <div class="row">

   	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

         <div class="panel panel-default">
            <div class="panel-heading"><h1><?php echo $invoice_title; ?></h1></div>
            <div class="panel-body">
               <div class="well"><?php echo $invoice_status != 0 ? "Payed" : "Not payed"; ?></div>
               <p>Cost : <?php echo $invoice_cost; ?></p>
               <p>Firm : <?php echo $firm_name; ?></p>
            </div>
            <div class="panel-footer">
               <a href="<?php echo base_url();?>invoice/download/<?php echo $this->session->userdata('user_id');?>/<?php echo $invoice_file ;?>" class="btn btn-default">DOWNLOAD</a>
            </div>
         </div>


        <a href="<?php echo base_url();?>invoice" class="btn btn-default">back</a>

   	</div>
   </div>