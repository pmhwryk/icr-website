<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 
</style>
<input type="hidden" name="old_image_name" value="<?=(isset($services['image']) && !empty($services['image']) ?$services['image'] : '');?>" >
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
									 Gallery
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'gallery/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Name <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="name" value="<?=(isset($services['name']) && !empty($services['name']) ? $services['name'] : '')?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>
								Link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($services['link']))
											$services['link'] = '';
									?>
									<input type="text" class="form-control m-input" id="title" name="link" value="<?=(isset($services['link']) && !empty($services['link']) ? $services['link'] : '')?>">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
                            <div class="col-md-12">
                                    <div class="form-group last">
                                        <label for="exampleInputEmail1">
										Upload Logo:
									</label>
                                        <div class="col-md-8">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                	<img src="<?=(isset($services['image']) && !empty($services['image']) ? Modules::run('api/image_path_with_default',ACTUAL_GALLERY_IMAGE_PATH,$services['image'],STATIC_FRONT_IMAGE,DEFAULT_PACKAGES) : STATIC_FRONT_IMAGE.DEFAULT_PACKAGES);?>" alt=""/>
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
                                                    <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                    <input type="file" name="image" id="image" class="default"  <?php //if($update_id==0) echo 'required="required"';?> />
                                                </span>
                                                
                                            </div>
                                        </div>
                                    </div>
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
									<a href="<?php echo ADMIN_BASE_URL . 'gallery'; ?>">
										<button  class="btn btn-secondary">
											Cancel
										</button>
									</a>
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

<script>

</script>