

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
									 Points
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'pkg/submit/', $attributes, $hidden);
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
									<input type="text" class="form-control m-input" id="title" name="name" value="<?=(isset($services['name']) && !empty($services['name']) ? $services['name'] : '')?>">
								</div>
                            </div>
                        </div> 
       <!--                 <div class="form-group m-form__group row">-->
							<!--<div class="col-md-6">-->
							<!--	<label>-->
							<!--	Price <span style="color:red">*</span>-->
							<!--	</label>-->
							<!--	<div class="input-group m-input-group m-input-group--square">-->
							<!--		<div class="input-group-prepend">-->
							<!--			<span class="input-group-text">-->
							<!--				<i class="flaticon-edit-1"></i>-->
							<!--			</span>-->
							<!--		</div>-->
							<!--		<input type="text" class="form-control m-input" id="title" name="price" value="<?=(isset($services['price']) && !empty($services['price']) ? $services['price'] : '')?>">-->
							<!--	</div>-->
       <!--                     </div>-->
       <!--                 </div> -->
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
									<input type="text" class="form-control m-input" id="title" name="description" value="<?=(isset($services['description']) && !empty($services['description']) ? $services['description'] : '')?>">
								</div>
                            </div>
                        </div> 
                       
				
						
                        
                        




						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Rank <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="rank" value="<?=(isset($services['rank']) && !empty($services['rank']) ? $services['rank'] : '')?>">
								</div>
							</div>
						</div>
						<!-- input for inclueds items-->
						<!--<div class="row">
                                <div class="col-md-6">
                                    <label class="">
                                        Logo:
                                    </label>
                                    <div class="" imagetype="imagevalidation" id="<?=(isset($update_id) && !empty($update_id) ? $update_id : '')?>"  image="<?=(isset($services['image']) && !empty($services['image']) ? $services['image'] : '');?>" imagename='image'>
										<?php 
											$path = (isset($services['image']) && !empty($services['image']) ? Modules::run('api/image_path_with_default',ACTUAL_PACKAGE_TYPE_IMAGE_PATH, $services['image'], STATIC_FRONT_IMAGE, NO_IMAGE) : '');
											$path = ($path == STATIC_FRONT_IMAGE.NO_IMAGE ? '' : $path);
										?>
										<input type="file" name="image"  class="dropify imagevalidation notrequired"  accept='image/*' data-default-file="<?=$path?>">
										
									</div>
								</div>
						</div>-->


			
			<!-- end input for inclueds items-->

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="submit btn btn-primary submit_button">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL .'pkg'; ?>">
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
 /*   $(document).ready(function(){
        $('#m_select2_3').parent().find('.select2-selection.select2-selection--single').addClass('red_border');
                $('#m_select2_3').parent().find('.select2-selection.select2-selection--multiple').addClass('red_border');
    }); */


    	function image_remover() {
        var dropifyElements = {};
        $('.dropify').each(function() {
            dropifyElements[this.id] = true;
        });
        console.log(JSON.stringify(dropifyElements))
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
					console.log('is confirm'+JSON.stringify(isConfirm))
                    if (isConfirm.value) {
                        var id = abc.parent().parent().attr('id');
                        var image = abc.parent().parent().attr('image');
                        var imagename = abc.parent().parent().attr('imagename');
                        if(id) {
                            $.ajax({
                                type: 'POST',
                                url: "<?= ADMIN_BASE_URL?>outlet/delete_image",
                                data: {'id': id,image:image,'imagename':imagename},
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