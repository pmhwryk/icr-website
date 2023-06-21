<style type="text/css">
  .red_border {
    border:1px solid red !important;
    border-radius: 6px  !important;
  }
</style>
<?///////////////////////////umar apis start///////////////////////// ?>
    <?php include_once("select-box.php");?>
<?php ///////////////////////////end umar apis///////////////////////// ?>
<div class="content-wrapper">

    <h3>
    <?php
    if (empty($update_id))
    $strTitle = 'Add Outlet';
    else
    $strTitle = 'Edit Outlet';
    echo $strTitle;
    ?>
    <a href="<?php echo ADMIN_BASE_URL . 'outlet'; ?>"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>
    </h3>

    <div class="panel panel-default">
        <div class="panel-body">
        <?php
        $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal','data-id'=>$update_id);
        if (empty($update_id)) {
            $update_id = 0;
        } else {
            $hidden = array('hdnId' => $update_id);
        }
        if (isset($hidden) && !empty($hidden))
            echo form_open_multipart(ADMIN_BASE_URL . 'outlet/submit/' . $update_id , $attributes, $hidden);
        else
            echo form_open_multipart(ADMIN_BASE_URL . 'outlet/submit/' . $update_id , $attributes);
        ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'txtBuildingName',
                'id' => 'txtBuildingName',
                'class' => 'form-control validatefield',
                'type' => 'text',
                'value' => $outlet['name']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Name <span class="required" style="color:red">*</span>', 'txtBuildingName', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
            	<div class="form-group">
                <?php
                $data = array(
                'name' => 'txtUrl',
                'id' => 'txtUrl',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['url']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Url   ', 'txtUrl', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name'        => 'url_slug',
                'id'          => 'url_slug',
                'maxlength'   => '60',
                'class'     => 'form-control form-control1',
                'value'       => $outlet['url_slug'],
                'type' => 'text',
                'readonly' => 'readonly',
                );
                $attribute = array('class' => 'control-label form-control1 col-md-4');
                echo form_label('URL Slug ','url_slug', $attribute);
                echo '<div class="col-md-8" style="margin-bottom:15px;">'.form_input($data).'</div>';
                ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="url_slug" class="control-label form-control1 col-md-4">Restaurant Type</label>
                    <div class="col-md-8" style="margin-bottom:15px;">
                        <select class="select-1 form-control restaurant_type" name="restaurant_type">
                            <option>Select Type</option>
                        <?php
                            if(!isset($restaurant_type) || empty($restaurant_type))
                                $restaurant_type = array();
                            if(!isset($outlet['restaurant_type']) || empty($outlet['restaurant_type']))
                                $outlet['restaurant_type'] = '';
                              foreach ($restaurant_type as $rt): 
                                if($rt['status'] == '1' || $outlet['restaurant_type'] == $rt['id']) {
                                ?>
                                <option value="<?=$rt['id']?>" <?php  if($outlet['restaurant_type'] == $rt['id']) echo 'selected="selected"'; ?>>
                                    <?= $rt['type']?>
                                </option>
                             <?php }
                            endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
         <div class="row" style="display:none;">
             <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name'        => 'percentage',
                'id'          => 'percentage',
                'maxlength'   => '2',
                'class'     => 'form-control form-control1',
                'value'       => $outlet['percentage'],
                'type' => 'hidden',
                
                );
                $attribute = array('class' => 'control-label form-control1 col-md-4');
                echo form_label('Disount(%)','Disount(%)', $attribute);
                echo '<div class="col-md-8" style="margin-bottom:15px;">'.form_input($data).'</div>';
                ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
            	<div class="form-group">
                <?php
                $data = array(
                'name' => 'txtPhone',
                'id' => 'txtPhone',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['phone']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Phone   ', 'txtPhone', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'txtEmail',
                'id' => 'txtEmail',
                'class' => 'form-control validatefield',
                'type' => 'text',
                'value' => $outlet['email']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Email <span class="required" style="color:red">*</span>', 'txtEmail', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            	<div class="form-group">
                <?php
                $data = array(
                'name' => 'txtOrgination',
                'id' => 'txtOrgination',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['orgination_no']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Orgaination No.   ', 'txtOrgination', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'txtCity',
                'id' => 'txtCity',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['city']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('City    ', 'txtCity', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'txtState',
                'id' => 'txtState',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['state']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('State   ', 'txtState', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'txtPost_Code',
                'id' => 'txtPost_Code',
                'class' => 'form-control',
                'type' => 'number',
                'pattern' => '[0-9]*',
                'maxlength' => '5',
                'value' => $outlet['post_code']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Post Code   ', 'txtPost', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
				<div class="form-group">
                <?php
                $data = array(
                'name' => 'txtAddress',
                'id' => 'txtAddress',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['address']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Address   ', 'txtAddress', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'txtGoogglemap',
                'id' => 'txtGoogglemap',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['google_map']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Google Map   ', 'txtGoogglemap', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'fax',
                'id' => 'fax',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['fax']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Fax', 'fax', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $data = array(
                'name' => 'web_title',
                'id' => 'web_title',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $outlet['web_title']
                );
                $attribute = array('class' => 'control-label col-md-4');
                ?>
                <?php echo form_label('Web Title', 'web_title', $attribute); ?>
                <div class="col-md-8">
                <?php echo form_input($data); ?>
                </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $attribute = array('class' => 'control-label col-md-4');
                echo form_label('Meta Description', 'meta_description', $attribute);
                ?>
                <div class="col-md-8"><textarea class="form-control" name="meta_description" rows="6"><?php echo $outlet['meta_description']?></textarea></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <?php
                $attribute = array('class' => 'control-label col-md-4');
                echo form_label('About Us', 'about_us', $attribute);
                ?>
                <div class="col-md-8"><textarea class="form-control" name="about_us" rows="6"><?php echo $outlet['about_us']?></textarea></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group last">
                <label class="control-label col-md-4">Logo (front)</label>
                <div class="col-md-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <?
                $filename =  './uploads/outlet/actual_images/' . $outlet['image'];
                if (isset($outlet['image']) && !empty($outlet['image']) && file_exists($filename)) {
                ?>
                <img src = "<?php echo BASE_URL . 'uploads/outlet/actual_images/' . $outlet['image'] ?>" />
                <?php
                } else {
                ?>
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                <?php
                }
                ?>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                </div>
                <div>
                <span class="btn default btn-file">
                <span class="fileupload-new">
                <i class="fa fa-paper-clip"></i> Select Image
                </span>
                <span class="fileupload-exists">
                <i class="fa fa-undo"></i> Change
                </span>
                <input type="file" name="outlet_file" id="outlet_file" class="default" />
                <input type="hidden" id="hdn_image" value="<?= $outlet['image'] ?>" name="hdn_image" />
                </span>
                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                </div>
                </div>
                </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group last">
                <label class="control-label col-md-4">Fav Icon</label>
                <div class="col-md-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <?php
                $filename =  FCPATH.'/uploads/outlet/actual_images/'.$outlet['fav_icon'];
                if (isset($outlet['fav_icon']) && !empty($outlet['fav_icon']) && file_exists($filename)) {
                ?>
                <img src = "<?php echo BASE_URL.'uploads/outlet/actual_images/'.$outlet['fav_icon'] ?>" />
                <?php
                } else {
                ?>
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                <?php
                }
                ?>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                </div>
                <div>
                <span class="btn default btn-file">
                <span class="fileupload-new">
                <i class="fa fa-paper-clip"></i> Select Image
                </span>
                <span class="fileupload-exists">
                <i class="fa fa-undo"></i> Change
                </span>
                <input type="file" name="outlet_fav_icon" id="outlet_fav_icon" class="default" />
                <input type="hidden" id="hdn_image_fav_icon" value="<?= $outlet['fav_icon'] ?>" name="hdn_image_fav_icon" />
                </span>
                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>


<div class="row">
            <div class="col-sm-6">
                <div class="form-group last">
                <label class="control-label col-md-4">Logo (Admin)</label>
                <div class="col-md-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <?
                $filename =  FCPATH.'/uploads/outlet/actual_images/' . $outlet['adminlogo'];
                if (isset($outlet['adminlogo']) && !empty($outlet['adminlogo']) && file_exists($filename)) {
                ?>
                <img src = "<?php echo BASE_URL . 'uploads/outlet/actual_images/' . $outlet['adminlogo'] ?>" />
                <?php
               } else {
                ?>
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                <?php
                }
                ?>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                </div>
                <div>
                <span class="btn default btn-file">
                <span class="fileupload-new">
                <i class="fa fa-paper-clip"></i> Select Image
                </span>
                <span class="fileupload-exists">
                <i class="fa fa-undo"></i> Change
                </span>
                <input type="file" name="outlet_adminlogo" id="outlet_adminlogo" class="default" />
                <input type="hidden" id="hdn_adminlogo" value="<?= $outlet['adminlogo'] ?>" name="hdn_adminlogo" />
                </span>
                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                </div>
                </div>
                </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group last">
                <label class="control-label col-md-4">Small Logo (Admin)</label>
                <div class="col-md-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <?php
                $filename =  FCPATH.'/uploads/outlet/actual_images/'.$outlet['adminlogo_small'];
                if (isset($outlet['adminlogo_small']) && !empty($outlet['adminlogo_small']) && file_exists($filename)) {
                ?>
                <img src = "<?php echo BASE_URL.'uploads/outlet/actual_images/'.$outlet['adminlogo_small'] ?>" />
                <?php
                } else {
                ?>
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                <?php
                }
                ?>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                </div>
                <div>
                <span class="btn default btn-file">
                <span class="fileupload-new">
                <i class="fa fa-paper-clip"></i> Select Image
                </span>
                <span class="fileupload-exists">
                <i class="fa fa-undo"></i> Change
                </span>
                <input type="file" name="outlet_adminlogo_small" id="outlet_adminlogo_small" class="default" />
                <input type="hidden" id="hdn_adminlogo_small" value="<?= $outlet['adminlogo_small'] ?>" name="hdn_adminlogo_small" />
                </span>
                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                </div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group last">
                <label class="control-label col-md-4">Cover Image</label>
                <div class="col-md-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <?php
                if(!isset($outlet['outlet_cover_image']))
                    $outlet['outlet_cover_image'] = "";
                $filename =  FCPATH.'/'.ACTUAL_OUTLET_TYPE_IMAGE_PATH.$outlet['outlet_cover_image'];
                if (isset($outlet['outlet_cover_image']) && !empty($outlet['outlet_cover_image']) && file_exists($filename)) {
                ?>
                <img src = "<?php echo BASE_URL.ACTUAL_OUTLET_TYPE_IMAGE_PATH.$outlet['outlet_cover_image'] ?>" />
                <?php
                } else {
                ?>
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                <?php
                }
                ?>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                </div>
                <div>
                <span class="btn default btn-file">
                <span class="fileupload-new">
                <i class="fa fa-paper-clip"></i> Select Image
                </span>
                <span class="fileupload-exists">
                <i class="fa fa-undo"></i> Change
                </span>
                <input type="file" name="outlet_cover_image" id="outlet_cover_image" class="default" />
                </span>
                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
            <div class="col-md-offset-4 col-md-10">
                <button type="submit" class="btn btn-primary" class="outlet_save" id='save_btn' data-id="<?= $update_id ?>"><i class="fa fa-check"></i>&nbsp;Save</button>
            <a href="<?php echo ADMIN_BASE_URL . 'outlet'; ?>">
            <button type="button" class="btn green btn-default" style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
            </a>
            </div>
            </div>
        </div>

        <?php echo form_close(); ?>
        </div>
    </div>

</div>

<script>
$(document).ready(function() {
	$("#outlet_file").change(function() {
		var img = $(this).val();
		var replaced_val = img.replace("C:\\fakepath\\", '');
		$('#hdn_image').val(replaced_val);
	});

	$("#outlet_fav_icon").change(function() {
		var img = $(this).val();
		var replaced_val = img.replace("C:\\fakepath\\", '');
		$('#hdn_image_fav_icon').val(replaced_val);
	});


	$("#outlet_adminlogo").change(function() {
		var img = $(this).val();
		var replaced_val = img.replace("C:\\fakepath\\", '');
		$('#hdn_adminlogo').val(replaced_val);
	});

	$("#outlet_adminlogo_small").change(function() {
		var img = $(this).val();
		var replaced_val = img.replace("C:\\fakepath\\", '');
		$('#hdn_adminlogo_small').val(replaced_val);
	});


    $(function(){
        $('.order_type:input:checkbox').change(function() {
            var isChecked = $('.order_type:input:checkbox').is(':checked');
            if(!isChecked){
                $(this).prop('checked', true);
            }

        });
    });

});

    $(document).off("keyup", "#txtBuildingName").on("keyup", "#txtBuildingName", function(event) {
        var page_title = $(this).val();
        $("#url_slug").val(page_title.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,''));
    }); 

    $('.form-horizontal').submit(function(e){
        e.preventDefault();
        var self = this;
        var id = $(this).attr('data-id');
        var txtEmail = $("#txtEmail").val();
        if(validateForm()) {
            $.ajax({
                type: 'POST',
                url: "<?php echo ADMIN_BASE_URL ?>outlet/check_duplicate_email",
                data: {'id': id, 'email': txtEmail},
                async: false,
                success: function (data) {
                    if(data.response == true){
                        self.submit();
                    }
                    else
                        $('#txtEmail').css("border", "1px solid red");
            }});
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
    var restaurant_type = $('.restaurant_type').val();
    if(restaurant_type == '' || restaurant_type == null || restaurant_type == 'undefined' || restaurant_type.toLowerCase() == 'select type') {
        isValid = false;
        $('.restaurant_type').parent().find('.select2-selection.select2-selection--single').addClass('red_border');
    }
    else
        $('.restaurant_type').parent().find('.select2-selection.select2-selection--single').removeClass('red_border');
    return isValid;
}
</script>
