<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<h1>Manage Outlet languages</h1>
 <?php
    $message = $this->session->flashdata('message');
    if(!empty($message)){ ?>
   
                    <div class="col-sm-12 alert alert-success  min_h" align="center">
                        <?php //echo  $this->session->flashdata('message');
                        echo $message;
                        ?>
                    </div>
    <?php } ?><br />
<table class="table table-striped table-responsive">
    <thead>
  <tr class="table-heading">
    <th>Sr.No</th>
    <th>Name</th>
    <th>Url</th>
    <th>Action</th>
  </tr>
    </thead>
    <tbody>
  <?php $count=1; if(isset($outlet_langs)): foreach($outlet_langs->result() as $outlet_lang):?>
  <tr>
    <td><?php echo $count;?></td>
    <td><?php echo $outlet_lang->name?></td>
    <td><?php echo $outlet_lang->url?></td>
    <td>
		<?php 
			echo anchor(base_url()."outlet_lang/create/".$outlet_lang->id,"Edit"); 
		?>
    </td>
    
  </tr>
  <?php $count++; endforeach; endif; ?>
        </tbody>
</table>