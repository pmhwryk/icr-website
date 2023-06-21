<?php
$attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal' , 'data-parsley-validate' => '', 'novalidate' => '');
if (empty($update_id)) {
	$update_id = 0;
} else {
	$hidden = array('hdnId' => $update_id); ////edit case
}
if (isset($hidden) && !empty($hidden))
	echo form_open_multipart(ADMIN_BASE_URL . 'outlet/change_password/' . $update_id , $attributes, $hidden);
else
	echo form_open_multipart(ADMIN_BASE_URL . 'outlet/change_password/' . $update_id , $attributes);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <?php
        if(!isset($email))
            $email = "";
        $data = array(
        'name' => 'email',
        'id' => 'email',
        'class' => 'form-control',
        'type' => 'text',
        'value' => $email,
        'data-parsley-maxlength'=>TEXT_BOX_RANGE,
        'readonly'=>'true',
        );
        $attribute = array('class' => 'control-label col-md-3');
        ?>
        <?php echo form_label('Email ', 'user_name', $attribute); ?>
        <div class="col-md-7"> <?php echo form_input($data); ?> </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <?php
        $data = array(
        'name' => 'password',
        'id' => 'new_password',
        'class' => 'form-control validatefield',
        'type' => 'password',
        'required' => 'required',
        'data-parsley-maxlength'=>TEXT_BOX_RANGE,
        
        );
        $attribute = array('class' => 'control-label col-md-3');
        ?>
        <?php echo form_label('New Password <span class="required" style="color:red">*</span>', 'password', $attribute); ?>
        <div class="col-md-7"> <?php echo form_input($data); ?> </div>
        </div>
    </div>
</div>

<div class="form-actions fluid no-mrg">
    <div class="row">
        <div class="col-md-offset-3 col-md-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Save</button>
        </div>
    </div>
</div>

<?php echo form_close(); ?> 
    
<script>
$('#form_sample_1').parsley();

$(document).off("submit", "#form_sample_1").on("submit", "#form_sample_1", function(event){
	event.preventDefault();
    if(validateForm()) {
    	$.ajax({
    		type: 'POST',
    		url: "<?= ADMIN_BASE_URL ?>outlet/change_password",
    		data: {'update_id':'<?=$update_id?>', 'password': $("#new_password").val()},
    		async: false,
    		success: function(){
    			$('#password_Modal').modal('hide')
    			toastr.success('Password changed successfully.');
    		}
    	});
    }
});
function validateForm() {
    var isValid = true;
    $('.validatefield').each(function() {
        if ( $(this).val() === '') {
            $(this).css("border", "1px solid red");
            isValid = false;
        }
        else 
            $(this).css("border", "1px solid #dde6e9");
    });
    return isValid;
}
</script>