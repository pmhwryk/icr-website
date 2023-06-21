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
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title"><?php if (empty($update_id)) $strEmployee = " Add Fiscal Year"; else $strEmployee = "Edit Fiscal Year"; ?></h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="#">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                        Setup
                        <i class="fa fa-angle-right"></i>
                        <a href="<?php echo ADMIN_BASE_URL.'fiscal_year'; ?>">Fiscal Year</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><?php if (empty($update_id)) echo "Add"; else echo "Edit"; ?></li>
                </ul>
            </div>
        </div>
        <?php echo validation_errors('<p style="color:#f00;">', '</p>'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="tab-pane  active" id="tab_2">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-reorder"></i> <?php echo $strEmployee; ?>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php
                                $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal no-mrg');
                                echo form_open_multipart(ADMIN_BASE_URL.'fiscal_year/submit/'.$update_id, $attributes);
                                ?>
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide"><button class="close" data-close="alert"></button>You have some form errors. Please check below.</div>
									<div class="row">
                                    	<div class="col-sm-6">
                                            <div class="form-group">
                                                <?php
                                                $data = array(
                                                    'name' => 'txtTitle',
                                                    'class' => 'form-control',
                                                    'value' => $fiscal_year['title'],
                                                    'type' => 'text',
                                                    'required' => '1',
                                                );
                                                $attribute = array('class' => 'control-label col-md-4');?>
                                                <?php echo form_label('Title <span class="required">*</span>', 'txtTitle', $attribute); ?>
                                                <div class="col-md-8"><?php echo form_input($data);?></div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
											<div class="form-group">
                                                <?php
                                                $options = array('' => 'Select') + $arr_month;
                                                $attribute = array('class' => 'control-label col-md-4');
                                                echo form_label('Month From', 'lstMonthFrm', $attribute);?>
                                                <div class="col-md-8"><?php echo form_dropdown('lstMonthFrm', $options, $fiscal_year['month_from'], 'class="form-control select2me" '); ?></div>
                                            </div>                                        
                                        </div>
                                         <div class="col-md-6">
											<div class="form-group">
                                                <?php
                                                $options = array('' => 'Select') + $arr_month;
                                                $attribute = array('class' => 'control-label col-md-4');
                                                echo form_label('Month To', 'lstMonthTo', $attribute);?>
                                                <div class="col-md-8"><?php echo form_dropdown('lstMonthTo', $options, $fiscal_year['month_to'], 'class="form-control select2me" '); ?></div>
                                            </div>                                        
                                        </div>   
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
											<div class="form-group">
                                                <?php
                                                $options = array('' => 'Select') + $arr_year;
                                                $attribute = array('class' => 'control-label col-md-4');
                                                echo form_label('Year From', 'lstYearFrm', $attribute);?>
                                                <div class="col-md-8"><?php echo form_dropdown('lstYearFrm', $options, $fiscal_year['year_from'], 'class="form-control select2me" '); ?></div>
                                            </div>                                        
                                        </div>
                                         <div class="col-md-6">
											<div class="form-group">
                                                <?php
                                                $options = array('' => 'Select') + $arr_year;
                                                $attribute = array('class' => 'control-label col-md-4');
                                                echo form_label('Year To', 'lstYearTo', $attribute);?>
                                                <div class="col-md-8"><?php echo form_dropdown('lstYearTo', $options, $fiscal_year['year_to'], 'class="form-control select2me" '); ?></div>
                                            </div>                                        
                                        </div>   
                                        </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn green" value="submit" tabindex="36">
                                                <i class="fa fa-check"></i>&nbsp;Submit
                                            </button>
                                            <a href="<?php echo ADMIN_BASE_URL.'issue_form'; ?>">
                                                <button type="button" class="btn default" tabindex="37"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
								
							<?php echo form_close(); ?> 
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                    <!--                                                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {

// binds form submission and fields to the validation engine
<?php if (empty($update_id)) {
    ?>
            $("#txtEmail").blur(function() {
                var txtEmail = $("#txtEmail").val();
				if(txtEmail != ''){
					$.ajax({
						type: 'POST',
						url: "<?= ADMIN_BASE_URL ?>employee/check_email",
						data: 'txtEmail=' + txtEmail,
						async: false,
						success: function(result) {
							if (result == 1)
							{
								toastr.error('This Email is already used');
								$("#txtEmail").focus();
								$("#txtEmail").val('');
							}
							return false;
						}
					});
				}
            });
    <?php
} else {
    ?>
            $("#txtEmail").blur(function() {
                var txtEmail = $("#txtEmail").val();
				if(txtEmail != ''){
					var Id = <?= $update_id ?>;
					$.ajax({
						type: 'POST',
						url: "<?= ADMIN_BASE_URL ?>employee/check_email_edit",
						data: 'txtEmail=' + txtEmail + '&id=' + Id,
						async: false,
						success: function(result) {
							if (result == 1)
							{
								toastr.error('This Email is already used');
								$("#txtEmail").focus();
								$("#txtEmail").val(txtEmail);
							}
							return false;
						}
					});
				}
            });
    <?php
}
?>

<?php if (empty($update_id)) {
    ?>
            $("#txtUserName").blur(function() {
                var txtUserName = $("#txtUserName").val();
				if(txtUserName != ''){
					$.ajax({
						type: 'POST',
						url: "<?= ADMIN_BASE_URL ?>employee/check_username",
						data: 'txtUserName=' + txtUserName,
						async: false,
						success: function(result) {
							if (result == 1)
							{
								toastr.error('This Username is already used');
								$("#txtUserName").focus();
								$("#txtUserName").val('');
							}
							return false;
						}
					});
				}
            });
    <?php
} else {
    ?>
            $("#txtUserName").blur(function() {
                var txtUserName = $("#txtUserName").val();
				if(txtUserName != ''){
					var Id = <?= $update_id ?>;
					$.ajax({
						type: 'POST',
						url: "<?= ADMIN_BASE_URL ?>employee/check_username_edit",
						data: 'txtUserName=' + txtUserName + '&id=' + Id,
						async: false,
						success: function(result) {
							if (result == 1)
							{
								toastr.error('This Username is already used');
								$("#txtUserName").focus();
								$("#txtUserName").val(txtUserName);
							}
							return false;
						}
					});
				}
            });
    <?php
}
?>
<?php if (empty($update_id)) {
    ?>
            $("#txtNi").blur(function() {
                var txtNi = $("#txtNi").val();
				if(txtNi != ''){
					$.ajax({
						type: 'POST',
						url: "<?= ADMIN_BASE_URL ?>employee/check_ni_no",
						data: 'txtNi=' + txtNi,
						async: false,
						success: function(result) {
							if (result == 1)
							{
								toastr.error('This National Insurance Number is already used');
								$("#txtNi").focus();
								$("#txtNi").val('');
							}
							return false;
						}
					});
				}
            });
    <?php
} else {
    ?>
            $("#txtNi").blur(function() {
                var txtNi = $("#txtNi").val();
				if(txtNi != ''){
					var Id = <?= $update_id ?>;
					$.ajax({
						type: 'POST',
						url: "<?= ADMIN_BASE_URL ?>employee/check_ni_edit",
						data: 'txtNi=' + txtNi + '&id=' + Id,
						async: false,
						success: function(result) {
							if (result == 1)
							{
								toastr.error('This National Insurance Number is already used');
								$("#txtNi").focus();
								$("#txtNi").val(txtNi);
							}
							return false;
						}
					});
				}
            });
    <?php
}
?>
$("#txtLineManager").on("click", function(event) {
            event.preventDefault();
            var lstPosition = $("#lstPosition").val();
            if (lstPosition)
            {
                $.fancybox(
                        {
                            width: 600,
                            height: 500,
                            autoSize: false,
                            href: "<?= ADMIN_BASE_URL ?>employee/get_empyloyee_line_manager2",
                            type: 'ajax',
                            ajax: {
                                type: 'POST',
                                data: {'lstPosition': lstPosition},
                            }
                        });
            }
            else {
                $.fancybox(
                        {
                            width: 600,
                            height: 500,
                            autoSize: false,
                            href: "<?= ADMIN_BASE_URL ?>employee/get_empyloyee_line_manager",
type: 'ajax',
ajax: {
type: 'POST',
}
});
}
}); 

});

</script>
<script>
$(document).ready(function() {
$("#employee_image_file").change(function() {
var img = $(this).val();
var replaced_val = img.replace("C:\\fakepath\\", '');
$('#hdn_image_employee').val(replaced_val);
});
});
</script>