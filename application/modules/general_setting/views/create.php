<?php


function timezone_menu2($default = 'UTC', $class = "form-control select2me", $name = 'timezones')
{
	$CI = &get_instance();
	$CI->lang->load('date');
	$zones_array = array();
	$timestamp = time();
	foreach (timezone_identifiers_list() as $key => $zone) {
		date_default_timezone_set($zone);
		$zones_array[$key]['zone'] = $zone;
		$zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
	}

	if ($default == 'GMT')
		$default = 'UTC';

	$menu = '<select name="' . $name . '"';

	if ($class != '') {
		$menu .= ' class="' . $class . '"';
	}

	$menu .= ' data-placeholder="Select Time Zone ...">\n';

	foreach ($zones_array as $row) {
		$selected = ($default == $row['zone']) ? " selected='selected'" : '';
		$menu .= "<option value='{$row['zone']}'{$selected}>" . $row['diff_from_GMT'] . ' ' . $row['zone'] . "</option>\n";
	}

	$menu .= "</select>";

	return $menu;
}
?>
<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	.thumbnail {
		background-color: #f1f1f7;
	}

	/* Firefox */
	input[type=number] {
		-moz-appearance: textfield;
	}
</style>
<input type="hidden" name="old_image_name" value="<?= (isset($general_settings['pack_image']) && !empty($general_settings['pack_image']) ? $general_settings['pack_image'] : ''); ?>">
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
								if (!isset($pack_id) || empty($pack_id))
									$pack_id = 0;
								?>
								<h3 class="m-portlet__head-text">
									<i class="fa fa-list"></i>
									Update General Setting
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<?php
					$attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal no-mrg');
					if (!empty($general_settings))
						$update_id = $general_settings['id'];
					if (empty($update_id) || $update_id == 0) {
						$update_id = 0;
						$hidden = array('hdnId' => $update_id); ////edit case
					} else {
						$hidden = array('hdnId' => $update_id); ////edit case
					}
					echo form_open_multipart(ADMIN_BASE_URL . 'general_setting/submit/' . $update_id, $attributes, $hidden);
					?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-md-3">
								<label>
									Header Logo
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($general_settings['image']) && !empty($general_settings['image']) ? $general_settings['image'] : ''); ?>">
									<?php
									$path = (isset($general_settings['image']) && !empty($general_settings['image']) ? Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, $general_settings['image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="image" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
								</div>
							</div>
							<div class="col-md-3">
								<label>
									Footer Logo
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($general_settings['footer_logo']) && !empty($general_settings['footer_logo']) ? $general_settings['footer_logo'] : ''); ?>">
									<?php
									$path = (isset($general_settings['footer_logo']) && !empty($general_settings['footer_logo']) ? Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, $general_settings['footer_logo'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="footer_logo" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
								</div>
							</div>
							<div class="col-md-3">
								<label>
									Fav Icon
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($general_settings['fav_icon']) && !empty($general_settings['fav_icon']) ? $general_settings['fav_icon'] : ''); ?>">
									<?php
									$path = (isset($general_settings['fav_icon']) && !empty($general_settings['fav_icon']) ? Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, $general_settings['fav_icon'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="fav_icon" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
								</div>
							</div>
							<div class="col-md-3">
								<label>
									Home Background Image
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($general_settings['home_image']) && !empty($general_settings['home_image']) ? $general_settings['home_image'] : ''); ?>">
									<?php
									$path = (isset($general_settings['home_image']) && !empty($general_settings['home_image']) ? Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, $general_settings['home_image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="home_image" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Home Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="home_heading" name="home_heading" value="<?= (isset($general_settings['home_heading']) && !empty($general_settings['home_heading']) ? $general_settings['home_heading'] : '') ?>" required="required">
								</div>
							</div>

							<div class="col-lg-6">
								<label>
									Footer Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="footer_heading" name="footer_heading" value="<?= (isset($general_settings['footer_heading']) && !empty($general_settings['footer_heading']) ? $general_settings['footer_heading'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Footer text <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="footer_text" name="footer_text" value="<?= (isset($general_settings['footer_text']) && !empty($general_settings['footer_text']) ? $general_settings['footer_text'] : '') ?>" required="required">
								</div>
							</div>
						</div>
						<legend>Homepage Section Headings:</legend>

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Team Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="team_heading" name="team_heading" value="<?= (isset($general_settings['team_heading']) && !empty($general_settings['team_heading']) ? $general_settings['team_heading'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Platform Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="platform_heading" name="platform_heading" value="<?= (isset($general_settings['platform_heading']) && !empty($general_settings['platform_heading']) ? $general_settings['platform_heading'] : '') ?>" required="required">
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Feature Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="feature_heading" name="feature_heading" value="<?= (isset($general_settings['feature_heading']) && !empty($general_settings['feature_heading']) ? $general_settings['feature_heading'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Subscriber Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="subscriber_heading" name="subscriber_heading" value="<?= (isset($general_settings['subscriber_heading']) && !empty($general_settings['subscriber_heading']) ? $general_settings['subscriber_heading'] : '') ?>" required="required">
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">

							<div class="col-lg-6">
								<label>
									About Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="about_heading" name="about_heading" value="<?= (isset($general_settings['about_heading']) && !empty($general_settings['about_heading']) ? $general_settings['about_heading'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									About Us <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<textarea type="text" class="form-control m-input" id="about_us" name="about_us" rows="5"><?= (isset($general_settings['about_us']) && !empty($general_settings['about_us']) ? $general_settings['about_us'] : '') ?></textarea>
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									About Us Home <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<textarea type="text" class="form-control m-input" id="about_short" name="about_short" rows="5"><?= (isset($general_settings['about_short']) && !empty($general_settings['about_short']) ? $general_settings['about_short'] : '') ?></textarea>
								</div>
							</div>
						</div>

						<legend>Contact Page Information:</legend>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Contact Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="contact_heading" name="contact_heading" value="<?= (isset($general_settings['contact_heading']) && !empty($general_settings['contact_heading']) ? $general_settings['contact_heading'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Contact Description <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="contact_desc" name="contact_desc" value="<?= (isset($general_settings['contact_desc']) && !empty($general_settings['contact_desc']) ? $general_settings['contact_desc'] : '') ?>" required="required">
								</div>
							</div>

							<div class="col-lg-6">
								<label>
									Map embed link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="map" name="map" value="<?= (isset($general_settings['map']) && !empty($general_settings['map']) ? $general_settings['map'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Address <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="address" name="address" value="<?= (isset($general_settings['address']) && !empty($general_settings['address']) ? $general_settings['address'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Phone # <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="phone" name="phone" value="<?= (isset($general_settings['phone']) && !empty($general_settings['phone']) ? $general_settings['phone'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Email <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="email" name="email" value="<?= (isset($general_settings['email']) && !empty($general_settings['email']) ? $general_settings['email'] : '') ?>" required="required">
								</div>
							</div>
						</div>
						<legend>Social Links</legend>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Facebook Link
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="facebook" name="facebook" value="<?= (isset($general_settings['facebook']) && !empty($general_settings['facebook']) ? $general_settings['facebook'] : '') ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Instagram Link
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="instagram" name="instagram" value="<?= (isset($general_settings['instagram']) && !empty($general_settings['instagram']) ? $general_settings['instagram'] : '') ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									LinkedIn Link
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="linkedin" name="linkedin" value="<?= (isset($general_settings['linkedin']) && !empty($general_settings['linkedin']) ? $general_settings['linkedin'] : '') ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									Youtube Link
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="youtube" name="youtube" value="<?= (isset($general_settings['youtube']) && !empty($general_settings['youtube']) ? $general_settings['youtube'] : '') ?>">
								</div>
							</div>
						</div>

						<legend>Email Configuration</legend>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									SMTP Username <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="smtp_user" name="smtp_user" value="<?= (isset($general_settings['smtp_user']) && !empty($general_settings['smtp_user']) ? $general_settings['smtp_user'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									SMTP Email <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="smtp_email" name="smtp_email" value="<?= (isset($general_settings['smtp_email']) && !empty($general_settings['smtp_email']) ? $general_settings['smtp_email'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									SMTP Port <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="smtp_port" name="smtp_port" value="<?= (isset($general_settings['smtp_port']) && !empty($general_settings['smtp_port']) ? $general_settings['smtp_port'] : '') ?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
									SMTP Password <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="smtp_password" name="smtp_password" value="<?= (isset($general_settings['smtp_password']) && !empty($general_settings['smtp_password']) ? $general_settings['smtp_password'] : '') ?>" required="required">
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
										<a href="<?php echo ADMIN_BASE_URL . 'packages'; ?>">
											<button type="button" id="cancel_edit" value="Cancel" class="btn btn-secondary">
												Cancel
											</button>
										</a>
									</div>
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
	jQuery(document).ready(function() {

		//      $.fn.editable.defaults.mode = 'inline';

		$("#media_file").change(function() {
			var img = $(this).val();
			var replaced_val = img.replace("C:\\fakepath\\", '');
			$('#hdn_image').val(replaced_val);
		});

		$('.theme-panel ul li').click(function() {
			var theme = $(this).attr('data-style');
			$('#hdn_theme').val(theme);
			$('ul > li').removeClass("current");
			$("html, body").animate({
				scrollTop: "0px"
			});
		});

		$('.theme-panel ul li').removeClass('current');
		$('.theme-panel ul li').each(function() {
			var theme = $(this).attr('data-style');
			var current_theme = $('#hdn_theme').val();
			if (theme == current_theme) {
				$(this).addClass('current');
			}
		});

	});


	$("#outlet_fav_icon").change(function() {
		var img = $(this).val();
		var replaced_val = img.replace("C:\\fakepath\\", '');
		$('#hdn_image_fav_icon').val(replaced_val);
	});
</script>



<script>
	function image_remover() {
		var dropifyElements = {};
		$('.dropify').each(function() {
			dropifyElements[this.id] = true;
		});
		var drEvent = $('.dropify').dropify();

		drEvent.on('dropify.beforeClear', function(event, element) {
			var abc = $(this);
			id = event.target.id;
			if (dropifyElements[id]) {
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
					reverseButtons: true
				}).then(function(isConfirm) {
					if (isConfirm.value) {
						var id = abc.parent().parent().attr('id');
						var image = abc.parent().parent().attr('image');
						if (id) {
							$.ajax({
								type: 'POST',
								url: "<?= ADMIN_BASE_URL ?>genera_setting/delete_image",
								data: {
									'id': id,
									image: image
								},
								async: false,
								success: function(result) {
									var message = $(result).find('message').text();
									var status = $(result).find('status').text();
									abc.parent().parent().attr('id', '');
									abc.parent().parent().attr('image', '');
									element.resetPreview();
									element.clearElement();
									swal.close();
									swal({
										title: "Message",
										text: message,
										type: status,
										timer: 2000
									});
								}
							});
						} else {
							element.resetPreview();
							element.clearElement();
							swal.close();
						}
					} else {
						swal({
							title: "Cancelled",
							text: "Delete Cancelled :)",
							type: "error",
							timer: 2000,
						});
					}
				});
				return false;
			}
		});
	}
	image_remover();
</script>