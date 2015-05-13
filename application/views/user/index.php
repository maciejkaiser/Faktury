   <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="page-header">
                <h4><?php echo $title; ?></h4>
            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

          <?php echo $content; ?>

          <?php if(($this->session->userdata('user_name')!="")): ?>
            <a href="<?php echo base_url();?>user/logout">Sign out</a>
          <?php endif; ?>

        </div>
    </div>