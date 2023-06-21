<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 


	
</style>
<input type="hidden" name="old_image_name" value="<?=(isset($installments['image']) && !empty($installments['image']) ?$installments['image'] : '');?>" >
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
									 Installments
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'installments/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
						<div class="col-md-2">
								<label>
								Select Student <span style="color:red">*</span>
								</label>
								<select name="student_id" class="student_id custom-select form-control">
										<?php if(isset($installments['studentID']) && !empty($installments['studentID'])){
            							$selected = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$installments['studentID']), 'id desc','id','students','*','1','0','','','')->row_array();
										?>
											<option value="<?=(isset($selected['id']) && !empty($selected['id']) ? $selected['id']:'')?>" selected="selected"><?=(isset($selected['fullname']) && !empty($selected['fullname']) ? $selected['fullname']:'')?></option>
<?php										}else{
											?>
											<option value="" selected="selected">Select Student</option>
										<?php }
										?>
											<?php
												if(isset($students) && !empty($students)) {?>
<?php 
													foreach($students as $row){
														?>
														<option  value="<?=(isset($row['id']) && !empty($row['id']) ? $row['id']:'')?>"><?=(isset($row['fullname']) && !empty($row['fullname']) ? $row['fullname']:'')?></option>
												<?php }
												}
											?>
										</select>
							</div>
						</div>

						<?php if(isset($installment_data) && !empty($installment_data)){
							$totall_paid=0;
							$paid_installments=0;
							foreach($installment_data as $row){
								if($row['is_paid']==1){
									$paid_installments++;
									$totall_paid+=$row['installment_amount'];
								}
							}
							$total_fee = (isset($installments['totall_fee_package']) && !empty($installments['totall_fee_package']) ? $installments['totall_fee_package']:'0');
							$remaining_fee = $total_fee-$totall_paid;
						} 
					
						?>
						<div class="form-group m-form__group row">
						<div class="col-md-4">
					
								<label>
								Totall Fee Package <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" readonly class="form-control m-input totall_fee_package" id="totall_fee_package" name="totall_fee_package" value="<?=(isset($total_fee) && !empty($total_fee) ? $total_fee:'0')?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>
								Remaining Fee <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" readonly class="form-control m-input remaining_fee" id="remaining_fee" name="remaining_fee" value="<?=(isset($remaining_fee) && !empty($remaining_fee) ? $remaining_fee:'0')?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>
								Paid Installments <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" readonly class="form-control m-input installments_number" id="installments_number" name="installments_number" value="<?=(isset($paid_installments) && !empty($paid_installments) ? $paid_installments:'0')?>">
								</div>
							</div>
						</div>
				<div id="zero-fee">
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Installment Title <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" required class="form-control m-input no" id="title" name="title" value="<?=(isset($installments['installmentTitle']) && !empty($installments['installmentTitle']) ? $installments['installmentTitle'] : '')?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>
								Installment Amount <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($installments['installmentAmount']))
											$installments['installmentAmount'] = '';
									?>
									<input type="number" required class="form-control m-input" id="installment_amount" name="installment_amount" value="<?=(isset($installments['installmentAmount']) && !empty($installments['installmentAmount']) ? $installments['installmentAmount'] : '')?>">
								</div>
							</div>
							
						</div>
						<div class="form-group m-form__group row">
							
						<div class="col-md-6">
								<label>
								Due date <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($installments['installmentDueDate']))
											$installments['installmentDueDate'] = '';
									?>
									<input type="date" required class="form-control m-input" id="payment_date" name="payment_date" value="<?=(isset($installments['installmentDueDate']) && !empty($installments['installmentDueDate']) ? $installments['installmentDueDate'] : '')?>">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>
								Installment Description:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<textarea class="ckeditor form-control notrequired" name="description" rows="4"><?=(isset($installments['installmentDescription']) && !empty($installments['installmentDescription']) ? $installments['installmentDescription'] : '')?></textarea>
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
									<a href="<?php echo ADMIN_BASE_URL . 'installments'; ?>" class="btn btn-secondary">
											Cancel	</button>
									</a>
								</div>
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
$('.submit_button').on('click',function(){
	var installment = $('#installment_amount').val();
	var remaining = $('#remaining_fee').val();
	var installment =parseInt(installment)
	var remaining =parseInt(remaining)
	if(installment > remaining){
		swal("Error","Installment Amount Should be less then or equal to remaining fee","error");
		return false;
	 }
});
 $(".student_id").change(function () {
        var student_id = this.value;
		$.ajax({
			type:'post',
			url:'<?ADMIN_BASE_URL?>check_student_fee',
			data:{'student_id':student_id},
			success:function(data){
				$('.totall_fee_package').val(data.total_fee);
				$('.remaining_fee').val(data.remaining_fee);

				$('.installments_number').val(data.installments_number);
					// swal("Error","The Remaining Fee of Student is Less Then The Amount of Current Voucher","error");

				if(data.remaining_fee==0){
					swal("Warning","This Student has no remaining fee, You Cannot create Installment for This Student","error");
					$('#zero-fee').hide();
					$('.submit_button').hide();
				}else{
					$('#zero-fee').show();
					$('.submit_button').show();

				}
			
			}
		})
    });
</script>