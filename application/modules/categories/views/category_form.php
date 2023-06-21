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
									Category
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<?php
					$attributes = array('autocomplete' => 'off', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal', 'method' => 'post', 'id' => 'm_form_1');
					$hidden = array('update_id' => $update_id);
					echo form_open_multipart(ADMIN_BASE_URL . 'categories/submit/' . $update_id, $attributes, $hidden);
					?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Category Title <span style="color:red">*</span>:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-user"></i>
										</span>
									</div>
									<?php
									if (!isset($users['title']) || empty($users['title']))
										$users['title'] = "";
									?>
									<input type="text" required class="form-control m-input title" name="title" value="<?= $users['title'] ?>">
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
									<a href="<?= ADMIN_BASE_URL ?>categories" class="btn btn-secondary">
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