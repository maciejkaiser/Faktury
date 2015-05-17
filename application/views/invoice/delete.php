

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

      <div class="page-header">
        <h1><?php echo $title; ?></h1>
      </div>

      <div class="well"><?php echo $content; ?></div>
      <a href="<?php echo base_url()?>invoice" class="btn btn-danger">No, wait! I changed my mind</a>
      <a href="<?php echo base_url()?>invoice/deleteConfirm/<?php echo $this->session->userdata('user_id'); ?>/<?php echo $invoice_id; ?>" class="btn btn-success">DELETE</a>

    </div>

  </div>