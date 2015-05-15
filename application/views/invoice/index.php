   <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

      <div class="page-header">
        <h4><?php echo $title; ?></h4>
      </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

      <?php if(!is_array($invoices)): ?>
        <small><?php echo $invoices; ?></small>
      <?php else : ?>
        <?php //print_r($invoices); ?>
        <table class="table">
        <tr>
            <th>NR</th>
            <th>Title</th>
            <th>Cost</th>
            <th>Firm</th>
            <th>Status</th>
          </tr>
          <?php foreach ($invoices as $key => $value) : ?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $value->invoice_title; ?></td>
              <td><?php echo $value->invoice_cost; ?></td>
              <td><?php echo $value->firm_name; ?></td>
              <td><?php echo $value->invoice_status != 0 ? "Payed" : "Not payed"; ?></td>
            </tr>
            
          <?php endforeach;?>
        </table>

      <?php endif;?>
    
    </div>
  </div>