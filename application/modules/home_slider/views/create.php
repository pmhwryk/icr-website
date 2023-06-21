<style>
	.red_border {
		border: 1px solid red !important;
	}
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<?php
								$update_id = (!isset($update_id) || empty($update_id) ? 0 : $update_id);
								?>
								<h3 class="m-portlet__head-text">
									<?php if (!empty($update_id)) echo "Update";
									else echo "Add"; ?>
									Slide
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="m-portlet__nav">
								<li class="m-portlet__nav-item">
									<a style="margin-left: 5px;float: right;" href="<?= ADMIN_BASE_URL . 'home_slider'; ?>" class="btn btn-outline-primary m-btn m-btn--icon m-btn--pill m-btn--air">
										<span>
											<i class="fa flaticon-folder-3"></i>
											<span>
												Back
											</span>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<?php
					$attributes = array('autocomplete' => 'off', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal', 'method' => 'post', 'id' => 'm_form_1');
					$hidden = array('update_id' => $update_id);
					echo form_open_multipart(ADMIN_BASE_URL . 'home_slider/submit/' . $update_id, $attributes, $hidden);
					?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group last">
									<label for="exampleInputEmail1">
										Slider Image:
									</label>
									<div class="col-md-8">
										<div class="input-group m-input-group m-input-group--square">
											<?php
											if (!isset($home_slider['image']) || empty($home_slider['image']))
												$home_slider['image'] = "";
											?>
											<input type="file" class="form-control m-input dropify" data-default-file="<?php echo BASE_URL . ACTUAL_GENERAL_SETTING_IMAGE_PATH . $home_slider['image']; ?>" name="image" value="">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<label>
									Alt Text <span style="color:red">*</span>:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<input type="text" class="form-control m-input" id="alt_text" name="alt_text" value="<?= (isset($home_slider['alt_text']) && !empty($home_slider['alt_text']) ? $home_slider['alt_text'] : '') ?>" required="required">
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
									<a href="<?= ADMIN_BASE_URL ?>home_slider">
										<button type="button" class="btn btn-secondary">
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
	$('.form-horizontal').submit(function(e) {
		e.preventDefault();
		var self = this;
		var alt_text = $('#alt_text').val();
		$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
		if (validateForm()) {
			$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
			self.submit();
		} else
			$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
	});
	var validate_input = "input[type=text],input[type=radio],input[type=email],input[type=password], select";

	function validateremove() {
		$(validate_input).off('click').click(function() {
			$('body').find(validate_input).removeClass('red_border');
			$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
		});
	}
	validateremove();

	function validateForm() {
		var check = true
		$('.form-horizontal').find(validate_input).each(function() {
			if (!$(this).hasClass('notrequired') && !$(this).val()) {
				check = false;
				$(this).addClass('red_border');
			}
		});
		return check;
	}

	$('.dropify').dropify();
</script>