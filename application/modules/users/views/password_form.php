<?php
$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal');
if (empty($update_id))
	$update_id = 0;

$hidden = array('update_id' => $update_id);
echo form_open_multipart(ADMIN_BASE_URL . 'users/change_pass/' . $update_id , $attributes, $hidden);
?>
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
                    if(!isset($users['user_name']) || empty($users['user_name'])) 
                        $users['user_name'] = "";
                ?>
                <input type="text" class="form-control m-input user_name" name="user_name" value="<?=$users['user_name']?>" readonly="readonly">
                
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
                <input type="password" class="form-control m-input" name="password">
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?> 
  