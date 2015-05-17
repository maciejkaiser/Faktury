
  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

      <div class="page-header">
        <h1><?php echo $title; ?></h1>
      </div>

      <div class="well"><?php echo $content; ?></div>
      <a href="<?php echo base_url()?>firm" class="btn btn-danger">No, wait! I changed my mind</a>
      <a href="<?php echo base_url()?>firm/deleteConfirm/<?php echo $firm_id; ?>" class="btn btn-success">DELETE</a>

    </div>

  </div>