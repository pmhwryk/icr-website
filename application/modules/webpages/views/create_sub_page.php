<style>
	.red_border {
    border: 1px solid red !important;
  }
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
                                    <i class="fa fa-list"></i>
									<?php
                    				  $page_title = urldecode($page_title);
                                        if ($update_id == 0)
                                            $strTitle = 'Add Sub Pages';
                                       if($update_id != 0)
                                            $strTitle = 'Edit Sub Pages';
                                        
                                        echo $strTitle.'-'. '('.$page_title.')';
                                        ?>
								</h3>
							</div>
						</div>
					</div>
					<?php 
                          $attributes = array('autocomplete' => 'off', 'id' => 'frmSubPages', 'class' => 'form-horizontal');
                          if(empty($update_id)){
                            $update_id = 0;
                            $hidden = array('hdnParentId' => $parent_id);
                          }
                          else{
                            $hidden = array('hdnParentId' => $parent_id, 'hdnId' => $update_id,'hdnActive' => $webpage['is_publish']); ////edit case
                          }
                        echo form_open_multipart(ADMIN_BASE_URL.'webpages/submit_sub_page/'.$parent_id.'/'.$update_id, $attributes, $hidden); ?>
                        <div class="row m-portlet__body" Description>
                            <div class="col-sm-6" >
                                <div class="form-group"> 
                                <?php
                                $data = array(
                                'name'        => 'txtPageTitle',
                                'maxlength'   => '30',
                                'id'          => 'txtPageTitle',
                                'class'     => 'form-control form-control1 text-input col-md-9',
                                'value'       => $webpage['page_title'],
                                'required'   => 'required',
                                );
                            $attribute = array('class' => 'control-label form-control1 col-md-3');
                                echo form_label('Page Title <span class="required" style="color:red">*</span>','txtPageTitle', $attribute);
                                echo '<div class="col-md-9" style="margin-bottom:15px;">'.form_input($data).'</div>';
                                ?>
                                </div>
                                <div class="form-group" >
                                <?php
                                $data = array(
                                'name'        => 'txtPageUrl',
                                'id'          => 'txtPageUrl',
                                'maxlength'   => '60',
                                'class'     => 'form-control form-control1',
                                'value'       => $webpage['url_slug'],
                                'type' => 'text',
                                );
                            $attribute = array('class' => 'control-label form-control1 col-md-3');
                                echo form_label('Page Slug ','txtPageUrl', $attribute);
                                echo '<div class="col-md-9" style="margin-bottom:15px;">'.form_input($data).'</div>';
                                ?>
                                </div>
                                <div class="form-group" >
                                <?php
                                $data = array(
                                'name'        => 'meta_title',
                                'id'          => 'meta_title',
                                'maxlength'   => '60',
                                'class'     => 'form-control form-control1',
                                'value'       => $webpage['meta_title'],
                                'type' => 'text',
                                );
                            $attribute = array('class' => 'control-label form-control1 col-md-3');
                                echo form_label('Meta Title ','meta_title', $attribute);
                                echo '<div class="col-md-9" style="margin-bottom:15px;">'.form_input($data).'</div>';
                                ?>
                                </div>
                             
                                <div class="form-group">
                                <?php
                                $options = array(''=> '---select--') + $rank;
                            $attribute = array('class' => 'control-label  col-md-3');
                                echo form_label('Page Rank ','lstRank', $attribute);
                                echo '<div class="col-md-9">'.form_dropdown('lstRank', $options,$webpage['page_rank'], 'class = "form-control  form-control1 select2me " id = "lstRank"').'</div>';
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                              
                                 <div class="form-group">
                                  <?php
                                    $data = array(
                                        'name' => 'txtMetaDesc',
                                        'id' => 'maxlength_textarea',
                                        'rows' => '11',
                                        'cols' => '10',
                                        'class' => 'form-control note-editor',
                                        'value' => $webpage['meta_description']
                        
                                    );
                                    $attribute = array('class' => 'control-label col-md-4');
                                    echo form_label('Short Description', 'txtMetaDesc', $attribute);
                                    ?>
                                  <div class="col-md-8"> <?php echo form_textarea($data); ?> </div>
                                </div>    
                            </div>
                            <div class="col-md-5 col-md-offset-6">
                                <div class="col-md-12">
                                    <div class="form-group last">
                                        <label class="control-label col-md-4">Image Upload </label>
                                        <div class="col-md-8">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <?
                                                    if(!isset( $webpage['image']))
                                                     $webpage['image']='';
                                                    $filename =ACTUAL_WEBPAGES_IMAGE_PATH.$webpage['image'];
                                                    if (isset($webpage['image']) && !empty($webpage['image']) && file_exists($filename)) {
                                                    ?>
                                                    <img src = "<?php echo BASE_URL.ACTUAL_WEBPAGES_IMAGE_PATH.$webpage['image'] ?>" />
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
                                                        <i class="fa fa-paper-clip"></i> Select image
                                                    </span>
                                                    <span class="fileupload-exists">
                                                        <i class="fa fa-undo"></i> Change
                                                    </span>
                                                    <input type="file" name="news_file" id="news_file" class="default"  <?php if($update_id==0) echo 'required="required"';?> />
                                                    <input type="hidden" id="hdn_image" value="<?php if(isset($webpage['image'])) echo  $webpage['image'] ?>" name="hdn_image"/>
                                                </span>
                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php 
                                    $attribute = array('class' => 'control-label col-md-2');
                                    echo form_label('Long Description', 'txtPageCont', $attribute);
                                    ?>
                                  <div class="col-md-9" style="float:left; margin-left:135px; margin-bottom:60px;"><textarea class="ckeditor form-control" name="txtPageCont" rows="6"><?php echo $webpage['page_content']?></textarea></div>
                                </div>
                             </div>
                        </div>     
                        <div class="form-actions fluid no-mrg">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="col-md-offset-3 col-md-9" style="padding-bottom:15px;">
                               <span style="margin-left:40px"></span><input type="submit" class="btn btn-primary" value="Save">
                                <a href="<?php echo ADMIN_BASE_URL.'webpages/manage_sub_pages/'.$parent_id; ?>">
                                <button type="button" class="btn green btn-default" style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                                </a> </div>
                            </div>
                            <div class="col-md-6"> </div>
                          </div>
                        </div>  
                        <?php echo form_close(); ?> 
				    </div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<script>
$(document).ready(function() {
	$(document).off("keyup", "#txtPageTitle").on("keyup", "#txtPageTitle", function(event) {
		var page_title = $(this).val();
		$("#txtPageUrl").val(page_title.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,''));
	});
////////////////////  FOR TEXT PAGE TITLE ////////////////////////////////////////	
$(document).off("focusout","#txtPageTitle").on("focusout","#txtPageTitle", function(event) {
    //alert('heelo');
		event.preventDefault();
		var page_title = $(this).val();
    var id = <?=$update_id?>;
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>webpages/check_page_title",
			data: {'page_title': page_title, 'id':id},
			async: false,
			success: function(result) {
				if(result == true){
					toastr.error('Webpage Title already exist.');
					//$("#txtPageTitle").val('');
					$("#txtPageTitle").focus();
				}
			}
		});
	});	
//////////////////////////////////////////////////////////////////////////////////

////////////////////////   FOR TEXTPAGURL   ///////////////////////////////////	
$(document).off("focusout","#txtPageUrl").on("focusout","#txtPageUrl", function(event) {
		event.preventDefault();
		var page_title = $(this).val();
    var id = <?=$update_id?>;
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>webpages/check_page_url",
			data: {'url_slug': page_title, 'id':id},
			async: false,
			success: function(result) {
				if(result == true){
					toastr.error('Webpage URL already exist.');
					//$("#txtPageUrl").val('');
					$("#txtPageUrl").focus();
				}
			}
		});
	});	
////////////////////////////////////////////////////////////////////////////////	
   
   
    $(document).on('keypress', '.wysiwyg', function(){
        $("#hdn_textarea").val( $(".wysiwyg").html() );
    });
    $(document).on('click', '.btn-group', function(){
        $("#hdn_textarea").val( $(".wysiwyg").html() );
    });
});
</script>


