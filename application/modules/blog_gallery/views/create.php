<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 
</style>
<!--  -->


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
									Blog Gallery Image
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'blog_gallery/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						
                        <div class="form-group m-form__group row">
						
							<div class="col-md-12">
								<label>
									Image
								</label>
								<div class="" imagetype="imagevalidation" id="<?=(isset($update_id) && !empty($update_id) ? $update_id : '')?>"  image="<?=(isset($services['image']) && !empty($services['image']) ? $services['image'] : '');?>">
									<?php 
										$path = (isset($services['image']) && !empty($services['image']) ? Modules::run('api/image_path_with_default',ACTUAL_BLOG_IMAGE_PATH, $services['image'], STATIC_FRONT_IMAGE, DEFAULT_STATISTICS) : STATIC_FRONT_IMAGE.DEFAULT_STATISTICS);
										$path = ($path == STATIC_FRONT_IMAGE.DEFAULT_STATISTICS ? '' : $path);
									?>
									<input type="file" name="image"  class="dropify imagevalidation notrequired"  accept='image/*' data-default-file="<?=$path?>">
									<input type="hidden" name="old" class="form-control m-input" value="<?=(isset($services['image']) && !empty($services['image']) ? $services['image'] : '');?>" >
									<div class="input-group m-input-group m-input-group--square">
										<div class="input-group-prepend">
											<span class="input-group-text">
												Alt Image
											</span>
										</div>
										<input type="text" class="form-control m-input notrequired" id="alt_image" name="alt_image" value="<?=(isset($services['alt_image']) && !empty($services['alt_image']) ? $services['alt_image'] : '')?>">
									</div>
									<div class="input-group m-input-group m-input-group--square">
										<div class="input-group-prepend">
											<span class="input-group-text">
												Image Name
											</span>
										</div>
										<input type="text" class="form-control m-input notrequired product_image_name" id="replaceing_name" name="replaceing_name" value="<?=(isset($services['image']) && !empty($services['image']) ? pathinfo($services['image'], PATHINFO_FILENAME)  : '')?>">
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
									<a href="<?php echo ADMIN_BASE_URL . 'blog'; ?>">
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script> 
<script type="text/javascript">
	
	$('.form-horizontal').submit(function(e) {
		// alert('das');
		// e.preventDefault();
		var self = this;
		$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
		if(validateForm()) {
			$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
			self.submit();
		}
        else {
			$('body, html').animate({ scrollTop: $('form').offset().top }, 'slow');
            $(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
		}
	});
	function validateForm() {
		var check = true;
		$('.form-horizontal').find(validate_input).each(function() {
			if(!$(this).hasClass('notrequired') && (!$(this).val() || $(this).val().length == 0)){
                check = false;
				$(this).addClass('redclasss');
				$(this).parent().find('.select2-selection.select2-selection--single').addClass('redclasss');
				$(this).parent().find('.select2-selection.select2-selection--multiple').addClass('redclasss');
            }
		});
		$('.form-horizontal').find('input[type=tel]').each(function(){
            var filter = /^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            if(!$(this).hasClass('notrequired') && !$(this).val() || !$(this).val().match(filter)) {
                check = false
                $(this).addClass('redclasss')
            }
        });
		$('.form-horizontal').find('input[type=email]').each(function(){
            var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!$(this).hasClass('notrequired') && !$(this).val() || !filter.test($(this).val())) {
                check = false
                $(this).addClass('redclasss')
            }
        });
		return check;
	}
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
                                url: "<?= ADMIN_BASE_URL?>blog_gallery/delete_image",
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height:200,
//        

});

            
            
          
        // SummernoteDemo.init();

    })
</script>