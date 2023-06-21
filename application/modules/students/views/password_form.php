<?php
if (empty($update_id))
	$update_id = 0;

$hidden = array('update_id' => $update_id);
?>


<style>
.modal-footer{
    display: none;
}
</style>
<form method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal">
<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-12">
            <label>
                Username:
            </label>
            <div class="input-group m-input-group m-input-group--square">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-user"></i>
                    </span>
                </div>
                <?php
                    if(!isset($users['username']) || empty($users['username'])) 
                        $users['username'] = "";
                ?>
                <input type="text" class="form-control m-input username" name="username" value="<?=$users['username']?>" readonly="readonly">
                
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-12">
            <label for="exampleInputEmail1">
                Password:
            </label>
            <div class="input-group m-input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-unlock-alt"></i>
                    </span>
                </div>
                <input type="hidden" class="form-control m-input update" name="update" value="<?=$update_id?>" readonly="readonly">
                <input type="password" class="form-control m-input password" name="password">
            </div>
        </div>
    </div>
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="button" class="btn btn-primary submit_button">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL . 'students'; ?>" class="btn btn-secondary">
										Cancel
									</a>
								</div>
							</div>
						</div>
					</div>
</form>
  

<script>
$('.submit_button').on('click',function(){
    var pass = $('.password').val();
    var id = $('.update').val();
    $.ajax({
        type:'post',
        url:'<?=ADMIN_BASE_URL?>students/change_pass',
        data:{'password':pass,'update_id':id},
        success:function(data){
            if(data.status==true){
                toastr.success('password change successfully');
                setTimeout(function() { 
				$('#password_model').modal('hide');

    }, 2000);
            }
        }
    })
})

</script>