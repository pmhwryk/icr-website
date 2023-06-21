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
								<?php
									if (!isset($update_id) ||empty($update_id))
										$update_id = 0;
								?>
								<h3 class="m-portlet__head-text">
                                    <i class="fa fa-list"></i>
									<?php if(!empty($update_id)) echo "Update"; else echo "Add"; ?>
									 Webpages
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
            			if(!isset($categories['cat_image']))
              				$categories['cat_image'] = '';
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'webpages/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Title <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($webpage['page_title']))
											$webpage['page_title'] = '';
									?>
									<input type="text" class="form-control m-input" id="txtPageTitle" name="txtPageTitle" value="<?=$webpage['page_title']?>" maxlength='30' required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Page Slug:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-link"></i>
										</span>
									</div>
									<?php
										if(!isset($webpage['url_slug']))
											$webpage['url_slug'] = '';
									?>
									<input type="text" class="form-control m-input" id="txtPageUrl" name="txtPageUrl" value="<?=$webpage['url_slug']?>" maxlength='60' readonly='readonly'>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
						
							<div class="col-lg-6">
								<div class="form-group1 m-form__group" style="padding:0px;">
									<label for="exampleInputEmail1">
										Page Rank:
									</label>
									<div></div>
									<select name="lstRank" class="custom-select form-control notrequired">
										<option value="0" selected="">
											Select Rank
										</option>
										<?php
											if(!isset($webpage['page_rank']))
												$webpage['page_rank'] = '';
											if(!isset($webpage['page_rank']) || empty($webpage['page_rank'])) 
												$webpage['page_rank'] = "";
											if(!isset($rank) || empty($rank))
												$rank = array();
											if(isset($rank) && !empty($rank)) {
												foreach($rank as $key=> $rt): ?>
													<option <?php if($webpage['page_rank'] == $rt) echo 'selected="selected"';?> value="<?=$rt?>">
														<?=$rt?>
													</option>	
												<?php 	
												endforeach;
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Meta title:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-link"></i>
										</span>
									</div>
									<?php
										if(!isset($webpage['meta_title']))
											$webpage['meta_title'] = '';
									?>
									<input type="text" class="form-control m-input notrequired" name="meta_title" value="<?=$webpage['meta_title']?>" maxlength='60'>
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
                                                    <input type="file" name="news_file" id="news_file" class="default"  />
                                                    <input type="hidden" id="hdn_image" value="<?php if(isset($webpage['image'])) echo  $webpage['image'] ?>" name="hdn_image"/>
                                                </span>
                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<div class="form-group form-group-last">
									<label for="exampleTextarea">Meta Keywords</label>
									<?php
										if(!isset($webpage['meta_keywords']))
											$webpage['meta_keywords'] = '';
									?>
									<textarea class="form-control notrequired" rows="8" cols="10" name="meta_keywords" value="<?=$webpage['meta_keywords']?>"><?=$webpage['meta_keywords']?></textarea>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group form-group-last">
									<label for="exampleTextarea">Meta Description</label>
									<?php
										if(!isset($webpage['meta_description']))
											$webpage['meta_description'] = '';
									?>
									<textarea class="form-control notrequired" rows="8" cols="10" name="txtMetaDesc" value="<?=$webpage['meta_description']?>"><?=$webpage['meta_description']?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<div class="form-group form-group-last">
									<label for="exampleTextarea">Short Description:</label>
									<?php
										if(!isset($webpage['short_desc']))
											$webpage['short_desc'] = '';
									?>
									<textarea class="form-control notrequired" rows="8" cols="10" name="short_desc" value="<?=$webpage['short_desc']?>"><?=$webpage['short_desc']?></textarea>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>
								Long Description:
								</label>
								<div class="input-group m-input-group m-input-group--square">
								<?php
									if(!isset($webpage['page_content']))
									$webpage['page_content'] = '';
								?>
								<textarea class="ckeditor form-control notrequired" name="txtPageCont" rows="4">
									<?php echo $webpage['page_content']?>
								</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="btn btn-primary submit_button">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL . 'webpages'; ?>">
										<button type="reset" class="btn btn-secondary">
											Cancel
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?> 
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
		</div>
	</div>
</div>
</div>
<script>
	$(document).off("keyup", "#txtPageTitle").on("keyup", "#txtPageTitle", function(event) {
		var page_title = $(this).val();
		$("#txtPageUrl").val(page_title.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,''));
	});
	$(document).off("focusout", "#txtPageTitle").on("focusout","#txtPageTitle", function(event) {
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
				$("#txtPageTitle").focus();
			}
		}
		});
	});	
	var validate_input= "input[type=text],input[type=radio],input[type=email],input[type=password], select";
	function validateremove(){
		$(validate_input).off('click').click(function(){
		$('body').find(validate_input).removeClass('red_border');
		$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
		})
	}
	validateremove();
	$('.form-horizontal').submit(function(e){
		e.preventDefault();
		var self = this;
		$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
		if(validateForm()) {
			var page_title = $('#txtPageTitle').val();
			var id = <?=$update_id?>;
			$.ajax({
				type: 'POST',
				url: "<?= ADMIN_BASE_URL ?>webpages/check_page_title",
				data: {'page_title': page_title, 'id':id},
				async: false,
				success: function(result) {
					if(result == true){
						toastr.error('Webpage Title already exist.');
						$("#txtPageTitle").focus();
					}
					else {
						$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
      					self.submit();
					}
				}
			});
		}
    else
      $(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
	});
	function validateForm() {
		var check = true
		$('.form-horizontal').find(validate_input).each(function(){
		if(!$(this).hasClass('notrequired') && !$(this).val()){
			check = false
			$(this).addClass('red_border')
		}
		});
		return check;
	}
</script>