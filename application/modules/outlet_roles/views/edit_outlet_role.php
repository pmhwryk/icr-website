<?php
$attributes = array('autocomplete' => 'off', 'id' => 'outlet_role_form', 'class' => 'form-horizontal no-mrg');
echo form_open_multipart(ADMIN_BASE_URL.'outlet_roles/submit/'.$outlet_role_id, $attributes);
$data = array(
	'name' => 'hdn_outlet_role_id',
	'type' => 'hidden',
	'value' => $outlet_role_id,
);
echo form_input($data);
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
				<div class="col-md-8"><?php echo form_dropdown('outlet_id', $options, $role_outlet['outlet_id'], 'class="form-control select2me lst_station" id="lst_station" '); ?></div>
			</div>                                        
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?php
				$options = array('' => 'Select');
				$attribute = array('class' => 'control-label col-md-4');
				echo form_label('Roles', 'role_id', $attribute);?>
				<div class="col-md-8" id="role_div">
					<?php echo form_dropdown('role_id', $options, $role_outlet['outlet_id'], 'class="form-control select2me" '); ?>
				</div>
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
