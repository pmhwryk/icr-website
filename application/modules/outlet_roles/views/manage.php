<div class="page-content-wrapper">
    <div class="page-content">

		<div id="outlet_role_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Would you like to delete selected record?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default" id="cancel"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                        <button type="button" data-dismiss="modal" class="btn red" id="confirm"><i class="fa fa-times"></i>&nbsp;Delete</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ul class="page-breadcrumb breadcrumb">
                    <div class="">
                        <div class="btn-group">
                            <button class="btn green btn-med" id="ShowForm">
                                Add New <span  class="glyphicon glyphicon-chevron-down"></span>
                            </button>
                        </div>
                    </div>
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo ADMIN_BASE_URL.'dashboard';?>">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                        Human Resources
                        <i class="fa fa-angle-right"></i>
                        Employees
                        <i class="fa fa-angle-right"></i>
                        Roles
                    </li>
                </ul>
            </div>
        </div>
        
        <?php
        $message = $this->session->flashdata('message');
        if (isset($message) && !empty($message)) {
            ?>
            <div id="ok-notice" style="display:none;" > <?= $message ?></div>
            <script>
                $(document).ready(function() {
                    var message = $('#ok-notice').text();
                   toastr.success(message);
                });
            </script>
        <?php } ?>
        <?php
        $warn = $this->session->flashdata('warn');
        if (isset($warn) && !empty($warn)) {
            ?>
            <div id="warn-notice" style="display:none;" > <?= $warn ?></div>
            <script>
                $(document).ready(function() {
                    var message = $('#warn-notice').text();
                    toastr.error(message);
                });
            </script>
        <?php } ?>

        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="tab-pane  active" id="outlet_role_form_content">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-reorder"></i>Roles
                                </div>
                            </div>
                            <div class="portlet-body form" id="outlet_role_form_div">
                                <?php
                                $attributes = array('autocomplete' => 'off', 'id' => 'outlet_role_form', 'class' => 'form-horizontal no-mrg');
                                echo form_open_multipart(ADMIN_BASE_URL.'outlet_roles/submit/'.$update_id, $attributes);
								$data = array(
									'name' => 'hdn_employee_id',
									'type' => 'hidden',
									'value' => $res_user->id,
								);
                                echo form_input($data);
                                ?>
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide"><button class="close" data-close="alert"></button>You have some form errors. Please check below.</div>
									<div class="row">
                                    	<div class="col-sm-6">
                                            <div class="form-group">
                                                <?php
                                                $data = array(
                                                    'name' => 'txt_employee',
                                                    'class' => 'form-control',
                                                    'disabled' => 1,
                                                    'value' => $res_user->first_name . ' ' . $res_user->last_name,
                                                );
                                                $attribute = array('class' => 'control-label col-md-4');?>
                                                <?php echo form_label('Employee', 'txt_employee', $attribute); ?>
                                                <div class="col-md-8"><?php echo form_input($data);?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <?php
                                                $data = array(
                                                    'name' => 'txt_employee_code',
                                                    'class' => 'form-control',
                                                    'disabled' => 1,
                                                    'value' => $res_user->user_name,
                                                );
                                                $attribute = array('class' => 'control-label col-md-4');?>
                                                <?php echo form_label('Username', 'txt_user_name', $attribute); ?>
                                                <div class="col-md-8"><?php echo form_input($data);?></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
											<div class="form-group">
                                                <?php
                                                $options = array('' => 'Select') + $arr_outlet;
                                                $attribute = array('class' => 'control-label col-md-4');
                                                echo form_label('Stations', 'outlet_id', $attribute);?>
                                                <div class="col-md-8"><?php echo form_dropdown('outlet_id', $options, $role_outlet['outlet_id'], 'class="form-control select2me lst_station" id="outlet_id" '); ?></div>
                                            </div>                                        
                                        </div>
                                        <div class="col-md-6">
											<div class="form-group">
                                                <?php
                                                $options = array('' => 'Select');
                                                $attribute = array('class' => 'control-label col-md-4');
                                                echo form_label('Roles', 'role_id', $attribute);?>
                                                <div class="col-md-8" id="role_div"><?php echo form_dropdown('role_id', $options, $role_outlet['outlet_id'], 'class="form-control select2me" id="role_id"');?></div>
                                            </div>                                        
                                        </div>
                                        </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-offset-4 col-md-8">
                                        	<span style="color:#F60; display:none;" id="role_outlet_spinners"><i style="font-size:40px;" class="fa fa-spinner fa-spin"></i></span>
                                            <button type="submit" id="submit" class="btn green" value="submit"><i class="fa fa-check"></i>&nbsp;Submit</button>
                                            <button type="button" class="btn default" id="cancel"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php echo form_close(); ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption"><img class="img_padd" src="<?php echo base_url().'static/admin/theme1/images/vat-icon.png' ?>">Employee Roles</div>
                    </div>
                    <div class="portlet-body" id="outlet_role_data"></div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<style type="text/css">
#outlet_role_form_content{
	display:none;
}
</style>
<script type="text/javascript">

$(document).ready(function() {
	$("#outlet_role_data").load('<?php echo ADMIN_BASE_URL?>outlet_roles/get_outlet_roles/<?=$res_user->id?>');
	$(document).on("click", "#ShowForm", function(event){
		$("#outlet_role_form_content").slideToggle('slow');
		if($('#ShowForm').find('span.glyphicon-chevron-down').hasClass('glyphicon-chevron-down'))
			$('#ShowForm').find('span.glyphicon-chevron-down').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		else
			$('#ShowForm').find('span.glyphicon-chevron-up').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	});

	$(document).on("submit","form#outlet_role_form", function(event){
		event.preventDefault();
		$("#role_outlet_spinners").show();
		var submit_url = $('#outlet_role_form').attr('action');
		$.ajax({
			type: "POST",
			url:  submit_url,
			data: $("#outlet_role_form").serialize(),
			async : false,
			success: function(result){ 
				$("#role_outlet_spinners").hide();
				if(result==1)
					toastr.success('Record updated successfully.');
				else if(result==2)				
					toastr.error('Record already exists.');
				else if(result==3)				
					toastr.success('Record added successfully.');

				$('form#outlet_role_form').find(":input:not([name=txt_employee], [name=txt_employee_code])").val('');
				$("#outlet_role_data").load('<?php echo ADMIN_BASE_URL?>outlet_roles/get_outlet_roles/<?=$res_user->id?>');
			}
		});
	});
	
	$("#outlet_id").change(function(){
		var value = $("#outlet_id").val();
		$.ajax({
			type:'POST',
			url:'<?php echo ADMIN_BASE_URL?>outlet_roles/get_roles_outlets_combo/'+value,
			data:{value:value},
			success:function(res_html){
				$("#role_div").html();
				$("#role_div").html(res_html);
//				$('#role_id').select2();
			}
		});
	});

	$(document).on("click",".action_edit", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		var emp_id = $(this).attr('emp_id');
		var outlet_id = $(this).attr('outlet_id');
		if($('#outlet_role_form_content').css('display') == 'none') {
			$("#outlet_role_form_content").slideToggle('slow');
			if($('#ShowForm').find('span.glyphicon-chevron-down').hasClass('glyphicon-chevron-down'))
				$('#ShowForm').find('span.glyphicon-chevron-down').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
			else
				$('#ShowForm').find('span.glyphicon-chevron-up').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		}
		$.ajax({
			type: "POST",
			url:'<?php echo ADMIN_BASE_URL?>outlet_roles/edit',
			data: {'id': id, 'emp_id':emp_id},
			async: false,
			success: function(form_html){
				if(form_html == 'no_permission'){
					var message = 'You don\'t have permission.';
					toastr.error(message);
					return;
				}
				$("#outlet_role_form_div").html('');
				$("#outlet_role_form_div").html(form_html);
				$("html, body").animate({ scrollTop: "0px" });
				load_roles_combo_selected(emp_id, outlet_id);
			}
		});
		
	});
	
	$(document).on("click",".action_delete", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		$('#outlet_role_modal').modal('show');
		$(".modal-footer #confirm").unbind('click');
		$('#outlet_role_modal').find('.modal-footer #confirm').click(function() {
			$.ajax({
				type: "POST",
				url:'<?php echo ADMIN_BASE_URL?>outlet_roles/delete',
				data: { id: id},
				success: function(result){
					if(result == 'no_permission'){
						var message = 'You don\'t have permission.';
						toastr.error(message);
						return;
					}
					$("#outlet_role_data").load('<?php echo ADMIN_BASE_URL?>outlet_roles/get_outlet_roles/<?=$res_user->id?>');
					toastr.success('Record deleted successfully.');
				}
			});
		});
	});

});

function load_roles_combo_selected(emp_id, outlet_id){
	var outlet_id = outlet_id;
	var emp_id = emp_id;
	$.ajax({
		type:'POST',
		url:'<?php echo ADMIN_BASE_URL?>outlet_roles/get_roles_outlets_combo_selected/'+outlet_id+'/'+emp_id,
		data:{'outlet_id':outlet_id, 'emp_id':emp_id},
		success:function(res_html){
			$("#role_div").html(res_html);
		}
	});
}
</script>