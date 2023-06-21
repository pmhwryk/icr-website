<style>
	input.larger {
		transform: scale(1.4);
		margin-top: 5px;
		margin-left: 20px;
		margin-right: 20px;
	}
</style>
<input type="hidden" name="old_image_name" value="<?= (isset($courses['image']) && !empty($courses['image']) ? $courses['image'] : ''); ?>">
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
								if (!isset($update_id) || empty($update_id))
									$update_id = 0;
								?>
								<h3 class="m-portlet__head-text">
									<i class="fa fa-list"></i>
									<?php if (!empty($update_id)) echo "Update";
									else echo "Add"; ?>
									Course
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<?php
					$attributes = array('autocomplete' => 'off', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal', 'method' => 'post', 'id' => 'm_form_1');
					$hidden = array('update_id' => $update_id);
					echo form_open_multipart(ADMIN_BASE_URL . 'courses/submit/', $attributes, $hidden);
					?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
									Course Title <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="title" value="<?= (isset($courses['courseTitle']) && !empty($courses['courseTitle']) ? $courses['courseTitle'] : '') ?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>
									URL <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="title" name="url" value="<?= (isset($courses['url']) && !empty($courses['url']) ? $courses['url'] : '') ?>">
								</div>
							</div>
							<div class="col-md-6 mt-3">
								<label>
									Course Duration <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
									if (!isset($courses['duration']))
										$courses['duration'] = '';
									?>
									<input type="text" class="form-control m-input" id="duration" name="duration" value="<?= (isset($courses['courseDuration']) && !empty($courses['courseDuration']) ? $courses['courseDuration'] : '3 Month') ?>">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
									Assign Instructor <span style="color:red">*</span>
								</label>
								<select name="instructor_id" class="custom-select form-control">
									<?php if (isset($courses['courseIsntructorID']) && !empty($courses['courseIsntructorID'])) {
										$selected = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $courses['courseIsntructorID']), 'id desc', 'id', 'instructors', '*', '1', '0', '', '', '')->row_array();
									?>
										<option value="<?= (isset($selected['id']) && !empty($selected['id']) ? $selected['id'] : '') ?>" selected="selected"><?= (isset($selected['name']) && !empty($selected['name']) ? $selected['name'] : '') ?></option>
									<?php										} else {
									?>
										<option value="" selected="selected">Select Instructor</option>
									<?php }
									?>
									<?php
									if (isset($instructors) && !empty($instructors)) { ?>
										<?php
										foreach ($instructors as $row) {
										?>
											<option value="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : '') ?></option>
									<?php }
									}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label>
									Course Category <span style="color:red">*</span>
								</label>
								<select name="category_id" class="custom-select form-control">
									<?php if (isset($courses['courseCategoryID']) && !empty($courses['courseCategoryID'])) {
										$selected = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $courses['courseCategoryID']), 'id desc', 'id', 'course_category', '*', '1', '0', '', '', '')->row_array();
									?>
										<option value="<?= (isset($selected['id']) && !empty($selected['id']) ? $selected['id'] : '') ?>" selected="selected"><?= (isset($selected['title']) && !empty($selected['title']) ? $selected['title'] : '') ?></option>
									<?php										} else {
									?>
										<option value="" selected="selected">Select Category</option>
									<?php }
									?>
									<?php
									if (isset($categories) && !empty($categories)) { ?>
										<?php
										foreach ($categories as $row) {
										?>
											<option value="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><?= (isset($row['title']) && !empty($row['title']) ? $row['title'] : '') ?></option>
									<?php }
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>
									Course Description:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<textarea class="ckeditor form-control notrequired" name="description" rows="4"><?= (isset($courses['courseDescrition']) && !empty($courses['courseDescrition']) ? $courses['courseDescrition'] : '') ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-4">
								<label>
									Course Image
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($courses['courseImage']) && !empty($courses['courseImage']) ? $courses['courseImage'] : ''); ?>">
									<?php
									$path = (isset($courses['courseImage']) && !empty($courses['courseImage']) ? Modules::run('api/image_path_with_default', ACTUAL_COURSE_IMAGE_PATH, $courses['courseImage'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="image" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>
									Course Icon
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($courses['courseIcon']) && !empty($courses['courseIcon']) ? $courses['courseIcon'] : ''); ?>">
									<?php
									$path = (isset($courses['courseIcon']) && !empty($courses['courseIcon']) ? Modules::run('api/image_path_with_default', ACTUAL_COURSE_IMAGE_PATH, $courses['courseIcon'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="icon" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
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
									<a href="<?php echo ADMIN_BASE_URL . 'courses'; ?>" class="btn btn-secondary">
										Cancel </button>
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
								url: "<?= ADMIN_BASE_URL ?>courses/delete_image",
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