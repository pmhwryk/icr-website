<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn green"><i class="fa fa-check"></i>&nbsp;Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal"><i class="fa fa-undo"></i>&nbsp;Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="#">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo ADMIN_BASE_URL . 'outlet'; ?>">Outlet Manager</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:;">Outlet Lang Manager</a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-custom boxless">
                    <div class="tab-content">
                        <div class="tab-pane  active" id="tab_2">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-reorder"></i>Outlet Language Information
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
							<?php 
                            $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
							echo form_open(ADMIN_BASE_URL.'outlet_lang/submit',$attributes); 
							?>											                                       
                                    <div class="form-body">
									<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
             <?php
             if(isset($outlets) && !empty($outlets))
             {
                $options = array(''=> '---select--') + $outlets;
				$attribute = array('class' => 'control-label col-md-2');
                echo form_label('Outlet','lstOutlet', $attribute); 
                echo '<div class="col-md-10">'.form_dropdown('lstOutlet', $options,$outlet_id, 'class = "form-control validate[required]" id = "lstOutlet"').'</div>';
             }
             ?>
            </div>
        </div>
     </div>



 <div class="row">
    <div class="col-sm-12">
      <?php if(isset($langs)): foreach($langs->result() as $lang): 
	  if($lang->id != $store_lang_id){
	  ?>    
    <div class="form-group">
      <label for="<?php echo $lang->lang_name;?>" class="control-label col-md-2"><?php if($lang->id != $store_lang_id) echo $lang->lang_name;?></label>
     <div class="make-switch h-30" data-on-label="Yes" data-off-label="No" data-on="success" data-off="danger">
      <input type="checkbox" value="<?=$lang->id?>" name="chkLang[]"  class="toggle" <?php 	  
	  if(isset($outlet_selected_langs)):
	  foreach($outlet_selected_langs->result() as $outlet_selected_lang): 
		  if($lang->id == $outlet_selected_lang->lang_id ){
			   echo "checked"; 
			} 
		   endforeach; 
		  endif;
		   ?>  />
	 </div>           
	</div>           <? }
		  else
		  {
			 ?>
    <div class="form-group">
             <label for="<?php echo $lang->lang_name;?>" class="control-label  col-md-2"><?php echo $lang->lang_name;?></label>
        <div class="make-switch h-30" data-on-label="Yes" data-off-label="No" data-on="success" data-off="danger">
             <input type="checkbox"  onclick="return false" checked="checked" disabled="disabled" class="toggle"/>
        </div>     
    </div>
		             <?
		  }
		   ?>
			<?php endforeach; endif; ?> 
		</div>
 </div>
    
									</div>

                                    <div class="form-actions fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-md-offset-3 col-md-8">
                                                    <button type="submit" class="btn green"><i class="fa fa-check"></i>&nbsp;Submit</button>
													<button type="button" class="btn default" onclick="window.history.back()"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?> 
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function() {
        // binds form submission and fields to the validation engine
       // jQuery("#frmOutletLang").validationEngine();
    });
/*$(function() {  //  document.ready
	$('#lstOutlet').change(function(){
		var outlet_id = $(this).val();
		if($(this).val()!="")
			window.location.href = '<?php echo ADMIN_BASE_URL?>outlet_lang/manage/'+outlet_id;
	});
});*/
<?php

if(!empty($outlet_id))
{
	?>
	$("#lstOutlet").css("pointer-events", "none");
	$("#lstOutlet").css("cursor", "default");
	<?php
}
?>
</script>
