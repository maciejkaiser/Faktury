   <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

      <?php if(!is_array($firms)): ?>
        <small><?php echo $firms; ?></small>
      <?php else : ?>
        <?php //print_r($invoices); ?>
        <table class="table table-striped">
        <tr>
            <th>NR</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
          <?php foreach ($firms as $key => $value) : ?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $value->firm_name; ?></td>
              <td>
                <a href="<?php echo base_url()?>firm/edit/<?php echo $value->firm_id;?>">Edit</a> /
                <a href="<?php echo base_url()?>firm/delete/<?php echo $value->firm_id;?>">Delete</a>
              </td>
            </tr>
            
          <?php endforeach;?>
        </table>

      <?php endif;?>
    
    </div>
  </div>