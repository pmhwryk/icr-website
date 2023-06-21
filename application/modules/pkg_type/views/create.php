

<header>
<script src="<?php echo STATIC_ADMIN_JS?>admin_select2.js"></script>
</header>

<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 
	
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
									 Pckage type
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'pkg_type/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Title <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="name" value="<?=(isset($pkg_type['title']) && !empty($pkg_type['title']) ? $pkg_type['title'] : '')?>">
								</div>
                            </div>
						</div> 
						<!--<div class="form-group m-form__group row">-->
						<!--	<div class="col-md-6">-->
						<!--		<label>-->
						<!--		Background Color: <span style="color:red">*</span>-->
						<!--		</label>-->
						<!--		<div class="input-group m-input-group m-input-group--square">-->
						<!--			<div class="input-group-prepend">-->
						<!--				<span class="input-group-text">-->
						<!--					<i class="flaticon-edit-1"></i>-->
						<!--				</span>-->
						<!--			</div>-->
						<!--			<input type="color" class="form-control" id="bg_color" name="bg_color" value="<?=(isset($pkg_type['bg_color']) && !empty($pkg_type['bg_color']) ? $pkg_type['bg_color'] : '')?>">-->
						<!--		</div>-->
      <!--                      </div>-->
						<!--</div> -->
							<div class="row">
                                <div class="col-md-6">
                                    <label class="">
                                        Image:
                                    </label>
                                    <div class="" imagetype="imagevalidation" id="<?=(isset($update_id) && !empty($update_id) ? $update_id : '')?>"  image="<?=(isset($pkg_type['image']) && !empty($pkg_type['image']) ? $pkg_type['image'] : '');?>" imagename='image'>
										<?php 
											$path = (isset($pkg_type['image']) && !empty($pkg_type['image']) ? Modules::run('api/image_path_with_default',ACTUAL_PRICE_PLANS_IMAGE_PATH, $pkg_type['image'], STATIC_FRONT_IMAGE, NO_IMAGE) : '');
											$path = ($path == STATIC_FRONT_IMAGE.NO_IMAGE ? '' : $path);
										?>
										<input type="file" name="image"  class="dropify imagevalidation notrequired"  accept='image/*' data-default-file="<?=$path?>">
										
									</div>
								</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Price
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="price" value="<?=(isset($pkg_type['price']) && !empty($pkg_type['price']) ? $pkg_type['price'] : '')?>">
								</div>
                            </div>
						</div>
						
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Description <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="description" value="<?=(isset($pkg_type['description']) && !empty($pkg_type['description']) ? $pkg_type['description'] : '')?>">
								</div>
                            </div>
						</div>
                        

						</div>
						 <div class="form-group m-form__group row"> 
                        <div class="col-lg-6">
                                <label class="">
                                    Included Features <span style="color:red">*</span>:
									
                                </label>
                                <select class="form-control m-select2 validatefield" id="m_select2_3" name="points[]" multiple="multiple">
                                    <?php
									
                                        $selectedtypes = (!isset($selectedtypes) || empty($selectedtypes) ? array() : $selectedtypes);
											$selected = 'selected="selected"';
											//print_r($points);exit;
                                            foreach($points as $pt):
                                                if(isset($pt['id']) && !empty($pt['id'])) {
                                                    $previous = array_search($pt['id'], array_column($selectedtypes, 'point_id'));
                                                    if(($pt['status'] == 1 && $pt['is_deleted'] == 0) || is_numeric($previous))
                                                        echo '<option value="'.$pt['id'].'"'.(is_numeric($previous) ? $selected : "").'>'.$pt['title'].'</option>';
                                                }
                                            endforeach;
                                        
                                    ?>
                                </select>
                            </div>
                        </div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Package Type <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<select class="custom-select form-control notrequired" id="custom-select" name="pkg" >
                                    <option value="0" selected="">
											Select Package Type
										</option>
                                    <?php
											//print_r($points);exit;
                                            foreach($pkg as $pkgg):
                                                if(isset($pkgg['id']) && !empty($pkgg['id'])) {?>
                                                   <option <?php if($pkgg['id'] == $pkg_type['pkg_id']) echo 'selected="selected"';?> value="<?=$pkgg['id']?>">
                                                   <?=$pkgg['title']?>
													</option>	    
                                               <? }
                                            endforeach;
                                        
                                    ?>
                                	</select>
								</div>
                            </div> 
                        </div>
                       
					   
					   
						<!-- input for inclueds items-->

						<div class="form-group m-form__group row">
							<div class="col-md-6">
								
								<div id="point"></div>
                            </div>
                        </div> 

			
			<!-- end input for inclueds items-->

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="submit btn btn-primary submit_button">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL .'pkg_type'; ?>">
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

<script type="application/javascript">
	function image_remover() {
        var dropifyElements = {};
        $('.dropify').each(function() {
            dropifyElements[this.id] = true;
        });
        var drEvent = $('.dropify').dropify();
        
        drEvent.on('dropify.beforeClear', function(event, element) {
            var abc = $(this);
            id = event.target.id;
            if(dropifyElements[id]) {
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able undo this operation!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",
                    cancelButtonText: "No, cancel!",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false,   
                    closeOnCancel: false,
					reverseButtons : true
                }).then(function(isConfirm) {
                    if (isConfirm.value) {
                        var id = abc.parent().parent().attr('id');
                        var image = abc.parent().parent().attr('image');
                        if(id) {
                            $.ajax({
                                type: 'POST',
                                url: "<?= ADMIN_BASE_URL?>pkg_type/delete_image",
                                data: {'id': id,image:image},
                                async: false,
                                success: function(result) {
									var message= $(result).find('message').text();
									var status= $(result).find('status').text();
                                    abc.parent().parent().attr('id','');
                                    abc.parent().parent().attr('image','');
                                    element.resetPreview();
                                    element.clearElement();
                                    swal.close();
									swal({ title:"Message", text:message, type:status, timer: 2000 });
                                }
                            });
                        }
                        else {
                            element.resetPreview();
                            element.clearElement();
                            swal.close();
                        }
                    } else {    
                        swal({ title:"Cancelled", text:"Delete Cancelled :)", type:"error", timer: 2000, });
                    } 
                });
				return false;
            }
        });
	}
	image_remover();
</script>