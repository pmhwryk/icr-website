<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
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
									Faqs
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'faqs/submit/', $attributes, $hidden);
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
									<?php
										if(!isset($services['name']))
											$services['name'] = '';
									?>
									<input type="text" class="form-control m-input" id="title" name="name" value="<?=(isset($services['name']) && !empty($services['name']) ? $services['name'] : '')?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group1 m-form__group" style="padding:0px;">
									<label for="exampleInputEmail1">
										Page Rank:
									</label>
									<div></div>
									<select name="lstRank" class="custom-select form-control notrequired">
										<option value="0" selected="">
											Select Rank
										</option>
										<?php
											if(!isset($services['page_rank']))
												$services['page_rank'] = '';
											if(!isset($rank) || empty($rank))
												$rank = array();
											if(isset($rank) && !empty($rank)) {
												foreach($rank as $key=> $rt): ?>
													<option <?php if($services['page_rank'] == $rt) echo 'selected="selected"';?> value="<?=$rt?>">
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
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>
									Long Description:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<textarea class="ckeditor form-control notrequired" name="description" rows="4"><?=(isset($services['description']) && !empty($services['description']) ? $services['description'] : '')?></textarea>
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
									<a href="<?php echo ADMIN_BASE_URL . 'faqs'; ?>">
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

</script>