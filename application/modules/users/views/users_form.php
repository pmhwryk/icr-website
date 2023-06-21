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
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<?php
									if (!isset($update_id) ||empty($update_id))
										$update_id = 0;
								?>
								<h3 class="m-portlet__head-text">
									<?php if(!empty($update_id)) echo "Update"; else echo "Add"; ?>
									 User
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'users/submit/' . $update_id , $attributes, $hidden);
					?> 
						<div class="m-portlet__body">
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label>
										Username <span style="color:red">*</span>:
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
										<input type="text" class="form-control m-input user_name" name="user_name" value="<?=$users['user_name']?>">
									</div>
								</div>
								<div class="col-lg-4">
									<label>
										First Name <span style="color:red">*</span>:
									</label>
									<div class="input-group m-input-group m-input-group--square">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-user"></i>
											</span>
										</div>
										<?php
											if(!isset($users['first_name']) || empty($users['first_name'])) 
												$users['first_name'] = "";
										?>
										<input type="text" class="form-control m-input" name="first_name" value="<?=$users['first_name']?>">
									</div>
								</div>
								<div class="col-lg-4">
									<label>
										Last Name:
									</label>
									<div class="input-group m-input-group m-input-group--square">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-user"></i>
											</span>
										</div>
										<?php
											if(!isset($users['last_name']) || empty($users['last_name'])) 
												$users['last_name'] = "";
										?>
										<input type="text" class="form-control m-input notrequired" name="last_name" value="<?=$users['last_name']?>">
									</div>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Country:
									</label>
									<?php
										if(!isset($users['country']) || empty($users['country'])) 
											$users['country'] = "";
									?>
									<input type="text" class="form-control m-input notrequired" name="country" value="<?=$users['country']?>">
								</div>
								<div class="col-lg-4">
									<label class="">
										City:
									</label>
									<?php
										if(!isset($users['city']) || empty($users['city'])) 
											$users['city'] = "";
									?>
									<input type="text" class="form-control m-input notrequired" name="city" value="<?=$users['city']?>">
								</div>
								<div class="col-lg-4">
									<label class="">
										State:
									</label>
									<?php
										if(!isset($users['state']) || empty($users['state'])) 
											$users['state'] = "";
									?>
									<input type="text" class="form-control m-input notrequired" name="state" value="<?=$users['state']?>">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label for="exampleInputEmail1">
										Phone Number:
									</label>
									<div class="input-group m-input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-phone"></i>
											</span>
										</div>
										<?php
											if(!isset($users['phone']) || empty($users['phone'])) 
												$users['phone'] = "";
										?>
										<input type="text" class="form-control m-input " name="phone" value="<?=$users['phone']?>" aria-describedby="basic-addon1">
									</div>
								</div>
								<div class="col-lg-4">
									<label for="exampleInputEmail1">
										Email <span style="color:red">*</span>:
									</label>
									<div class="input-group m-input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												@
											</span>
										</div>
										<?php
											if(!isset($users['email']) || empty($users['email'])) 
												$users['email'] = "";
										?>
										<input type="email" class="form-control m-input email" name="email" value="<?=$users['email']?>" aria-describedby="basic-addon1">
									</div>
								</div>
								<?php 
									if($update_id == 0) { ?>
								<div class="col-lg-4">
									<label for="exampleInputEmail1">
										Password <span style="color:red">*</span>:
									</label>
									<div class="input-group m-input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-unlock-alt"></i>
											</span>
										</div>
										<input type="password" class="form-control m-input" name="password">
									</div>
								</div>
								<?php } ?>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label>
										Address:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<?php
											if(!isset($users['address1']) || empty($users['address1'])) 
												$users['address1'] = "";
										?>
										<input type="text" class="form-control m-input notrequired" name="address1" value="<?=$users['address1']?>">
										<span class="m-input-icon__icon m-input-icon__icon--right">
											<span>
												<i class="la la-map-marker"></i>
											</span>
										</span>
									</div>
								</div>
								<div class="col-lg-4">
									<label class="">
										Gender:
									</label>
									<div class="m-radio-inline">
										<?php
											if(!isset($users['gender']) || empty($users['gender'])) 
												$users['gender'] = "";
										?>
										<label class="m-radio m-radio--solid notrequired">
											<input type="radio" name="gender" <?php if(strtolower($users['gender']) == 'male') echo 'checked';?> value="Male">
											Male
											<span></span>
										</label>
										<label class="m-radio m-radio--solid">
											<input type="radio" name="gender" <?php if(strtolower($users['gender']) == 'female') echo 'checked';?> value="Female">
											Female
											<span></span>
										</label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group1 m-form__group" style="padding:0px;">
										<label for="exampleInputEmail1">
											Assign Role <span style="color:red">*</span>:
										</label>
										<div></div>
										<select name="role_id" class="custom-select form-control" <?php  if($users['role_id']=="1") echo "readonly"; ?>>
											<option value="" selected="">
												Select role
											</option>
											<?php
												if(!isset($users['role_id']) || empty($users['role_id'])) 
													$users['role_id'] = "";
												if(isset($roles_title) && !empty($roles_title)) {
													foreach($roles_title as $key=> $rt): ?>
														<option <?php if($users['role_id'] == $key) echo 'selected="selected"';  ?> value="<?=$key?>">
															<?=$rt?>
														</option>	
													<?php 	
													endforeach;
												}
											?>
										</select>
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
										<button type="reset" class="btn btn-secondary">
											Cancel
										</button>
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
		var email = $('.email').val();
		$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
		if(validateForm()) {
			$.ajax({
				type: 'POST',
				url: "<?php echo ADMIN_BASE_URL; ?>users/check_duplicate_email",
				data: {'email': email,'user':'<?=$update_id?>'},
				async: false,
				success: function (result) {
					$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
					var message= $(result).find('message').text();
					var type= $(result).find('type').text();
					if(type == "error") {
						swal( {title: "Email all ready exist!", text: "Please select another email", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"});
						$(".email").addClass("red_border");
					}
					else{
						$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
						var user_name=$(".user_name").val();
						$.ajax({
							type:"post",
							data: {'user_name': user_name,'user':'<?=$update_id?>'},
							url: "<?= ADMIN_BASE_URL?>users/validate",
							success:function(result){
								$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
								if(result == 1)
									swal( {title: "Username all ready exist!", text: "Please select another username", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"});
								else
									self.submit();
							}
						});
					}
					
				}
			});
		}
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