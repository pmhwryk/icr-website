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
						echo form_open_multipart(ADMIN_BASE_URL . 'point/submit/', $attributes, $hidden);
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
									<input type="text" class="form-control m-input" id="title" name="name" value="<?=(isset($services['title']) && !empty($services['title']) ? $services['title'] : '')?>">
								</div>
							</div>
						</div>
						
						
						</div>
						<!-- input for inclueds items-->



			
			<!-- end input for inclueds items-->

					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="btn btn-primary submit_button">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL . 'point'; ?>">
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

function validateForm() {
		var check = true
		$(".include").each(function(){
            if(!$(this).val()){
                check = false;
                $(this).addClass('red_border');
            }
		});
		return check;
	}
	var validate_input= "input[type=text],input[type=number],input[type=radio],input[type=email],input[type=password], select";
	function validateremove(){
		$(validate_input).off('click').click(function(){
		$('body').find(validate_input).removeClass('red_border');
		})
	}
      $(document).on("click", ".addmore", function(e){

		if(validateForm() ==true)
  {
    $("#add").append($('<div class="form-group m-form__group row"><div class="col-md-3"><label>Includes <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-edit-1"></i></span></div><input type="text" class="include form-control m-input" id="title" name="include[]"></div></div><div class="col-md-2"><label>Standard Account <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div></div><select name="stndrd[]" class="custom-select form-control" ><option>Select</option><option>Yes</option><option>No</option></select></div></div><div class="col-md-2"><label>Gold Account <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div></div><select name="gold[]" class="custom-select form-control" ><option>Select</option><option>Yes</option><option>No</option></select></div></div><div class="col-md-2"><label>Planium Account <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div></div><select name="platinum[]" class="custom-select form-control" ><option>Select</option><option>Yes</option><option>No</option></select></div></div><div class="col-md-2"><label>Select Rank <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div></div><select name="rank[]" class="custom-select form-control" ><option>Select</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></div></div><div class="col-md-1"><a class="delete_record" href="#"><button>Remove</a></button></div></div>'))
  validateremove();
  }
});

$(document).on("click", '.delete_record', function(e){
      //alert('delete');
        e.preventDefault();
      //  $(this).parent().remove();
		$(this).closest('.row').remove()
      //  $("#row").remove();
      });



	$('.form-horizontal').submit(function(e) {
		e.preventDefault();
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
                                url: "<?= ADMIN_BASE_URL?>features/delete_image",
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