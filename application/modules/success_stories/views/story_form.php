<style>
	.red_border {
		border: 1px solid red !important;
	}
</style>
<?php $update_id = $this->uri->segment(4); ?>
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
								if (!isset($update_id) || empty($update_id))
									$update_id = 0;
								?>
								<h3 class="m-portlet__head-text">
									<?php if (!empty($update_id)) echo "Update";
									else echo "Add"; ?>
									Story
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<?php
					$attributes = array('autocomplete' => 'off', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal', 'method' => 'post', 'id' => 'm_form_1');
					$hidden = array('update_id' => $update_id);
					echo form_open_multipart(ADMIN_BASE_URL . 'success_stories/submit/' . $update_id, $attributes, $hidden);
					?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Student Name <span style="color:red">*</span>:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-user"></i>
										</span>
									</div>
									<input type="text" required class="form-control m-input" name="name" value="<?= (isset($success_story['name']) && !empty($success_story['name'])) ? $success_story['name'] : "" ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<label>
									Job Title <span style="color:red">*</span>:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-user"></i>
										</span>
									</div>
									<input type="text" required class="form-control m-input" name="job_title" value="<?= (isset($success_story['job_title']) && !empty($success_story['job_title'])) ? $success_story['job_title'] : "" ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<label>
									Story Category <span style="color:red">*</span>:
								</label>
								<select name="category" class="custom-select form-control" required>
									<option value="" selected="selected">Select Category</option>
									<option value="shining star" <?= (isset($success_story['category']) && ($success_story['category'] == "shining star")) ? "selected" : "" ?>>Shining Star</option>
									<option value="rising star" <?= (isset($success_story['category']) && ($success_story['category'] == "rising star")) ? "selected" : "" ?>>Rising Star</option>
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Story Description <span style="color:red">*</span>:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<textarea required class="form-control m-input" name="description" rows="10"><?= (isset($success_story['description']) && !empty($success_story['description'])) ? $success_story['description'] : "" ?></textarea>
								</div>
							</div>
							<div class="col-lg-4">
								<label>
									Image
								</label>
								<div class="" imagetype="imagevalidation" id="<?= (isset($update_id) && !empty($update_id) ? $update_id : '') ?>" image="<?= (isset($success_story['image']) && !empty($success_story['image']) ? $success_story['image'] : ''); ?>">
									<?php
									$path = (isset($success_story['image']) && !empty($success_story['image']) ? Modules::run('api/image_path_with_default', SUCCESS_STORIES_IMAGE_PATH, $success_story['image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
									$path = ($path == STATIC_FRONT_IMAGE . DEFAULT_PACKAGES ? '' : $path);
									?>
									<input type="file" name="image" class="dropify imagevalidation notrequired" accept='image/*' data-default-file="<?= $path ?>">
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
									<a href="<?= ADMIN_BASE_URL ?>success_stories" class="btn btn-secondary">
										Cancel
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