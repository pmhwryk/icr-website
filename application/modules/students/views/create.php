<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<input type="hidden" name="old_image_name" value="<?=(isset($students['image']) && !empty($students['image']) ?$students['image'] : '');?>" >
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
									 Students
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'students/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Student Name <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="fullname" name="fullname" value="<?=(isset($students['fullname']) && !empty($students['fullname']) ? $students['fullname'] : '')?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>
								Email Address <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['email']))
											$students['email'] = '';
									?>
									<input type="email" class="form-control m-input" id="email" name="email" value="<?=(isset($students['email']) && !empty($students['email']) ? $students['email'] : '')?>">
								</div>
							</div>
							
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Username <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="username" name="username" value="<?=(isset($students['username']) && !empty($students['username']) ? $students['username'] : '')?>">
								</div>
							</div>
							<?php $update_id=$this->uri->segment(4);
							if(empty($update_id)){
							?>
						<div class="col-md-6">
								<label>
								Password <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['password']))
											$students['password'] = '';
									?>
									<input type="text" class="form-control m-input" id="password" name="password" value="">
								</div>
							</div>
						<?php	}?>
						
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Profile Description <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="profile_description" name="profile_description" value="<?=(isset($students['profile_description']) && !empty($students['profile_description']) ? $students['profile_description'] : '')?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>
								Fiver Account Link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['fiver_account_link']))
											$students['fiver_account_link'] = '';
									?>
									<input type="text" class="form-control m-input" id="fiver_account_link" name="fiver_account_link" value="<?=(isset($students['fiver_account_link']) && !empty($students['fiver_account_link']) ? $students['fiver_account_link'] : '')?>">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-4">
								<label>
								Phone <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="phone" name="phone" value="<?=(isset($students['studentPhoneNo']) && !empty($students['studentPhoneNo']) ? $students['studentPhoneNo'] : '')?>">
								</div>
							</div>
							
							<div class="col-md-4">
								<label>
								Date of Birth <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['studentDateOfBirth']))
											$students['studentDateOfBirth'] = '';
									?>
									<input type="date" class="form-control m-input" id="dob" name="dob" value="<?=(isset($students['studentDateOfBirth']) && !empty($students['studentDateOfBirth']) ? $students['studentDateOfBirth'] : '')?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>
								Address <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['address']))
											$students['address'] = '';
									?>
									<input type="text" class="form-control m-input" id="address" name="address" value="<?=(isset($students['address']) && !empty($students['address']) ? $students['address'] : '')?>">
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
						
							<div class="col-md-6">
								<input type="hidden" name="student_id" value="<?=(isset($students['studentID']) && !empty($students['studentID']) ? $students['studentID']:'')?>">
							<label>
								Assign Instructor <span style="color:red">*</span>
								</label>
							<select class="js-select2-multi form-control" multiple="multiple" name='instructor_id[]'>
							<?php if(isset($students['studentID']) && !empty($students['studentID'])){
										$selected = Modules::run('Students/student_with_multiple_instructors',array('studendinstructors.student_id'=>$students['studentID']), 'studendinstructors.id desc','studendinstructors.id','','0','','','','');
										if(isset($selected) && !empty($selected)){
											foreach($selected as $row){
												if(isset($row['instructorDeleteStatus'])){
													if($row['instructorDeleteStatus']==0){?>
													<option value="<?=(isset($row['instructorID']) && !empty($row['instructorID']) ? $row['instructorID']:'')?>" selected="selected"><?=(isset($row['instructorName']) && !empty($row['instructorName']) ? $row['instructorName']:'')?></option>

												<?php 	}else{
													$deleted = 1;
													?>
														
													<?php 
												}
												}
												?>

											<?php }
										}
										?>
<?php										}
										?>
							<?php
												if(isset($instructors) && !empty($instructors)) {?>
<?php 
													foreach($instructors as $row){
														?>
														<option  value="<?=(isset($row['id']) && !empty($row['id']) ? $row['id']:'')?>"><?=(isset($row['name']) && !empty($row['name']) ? $row['name']:'')?></option>
												<?php }
												}
											?>
										</select>
							</div>
							<div class="col-md-6">
								<label>
								Assign Course <span style="color:red">*</span>
								</label>
								<select name="course_id" class="custom-select form-control">
										<?php if(isset($students['studentCourseID']) && !empty($students['studentCourseID'])){
            							$selected = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$students['studentCourseID']), 'id desc','id','course_category','*','1','0','','','')->row_array();
										?>
											<option value="<?=(isset($selected['id']) && !empty($selected['id']) ? $selected['id']:'')?>" selected="selected"><?=(isset($selected['title']) && !empty($selected['title']) ? $selected['title']:'')?></option>
<?php										}else{
											?>
											<option value="" selected="selected">Select Course</option>
										<?php }
										?>
											<?php
												if(isset($categories) && !empty($categories)) {?>
<?php 
													foreach($categories as $row){
														?>
														<option  value="<?=(isset($row['id']) && !empty($row['id']) ? $row['id']:'')?>"><?=(isset($row['title']) && !empty($row['title']) ? $row['title']:'')?></option>
												<?php }
												}
											?>
								</select>
									
							</div>
						</div>
						<div class="form-group m-form__group row">
						<div class="col-md-4">
								<label>
								Totall fee Package <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['studentFeePackage']))
											$students['studentFeePackage'] = '';
									?>
									<input type="text" class="form-control m-input" id="totall_fee_package" name="totall_fee_package" value="<?=(isset($students['studentFeePackage']) && !empty($students['studentFeePackage']) ? $students['studentFeePackage'] : '')?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>
								Batch  <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['studentBatch']))
											$students['studentBatch'] = '';
									?>
									<input type="text" class="form-control m-input" id="batch" name="batch" value="<?=(isset($students['studentBatch']) && !empty($students['studentBatch']) ? $students['studentBatch'] : '')?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>
								Roll Number  <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['studentRollNumber']))
											$students['studentRollNumber'] = '';
									?>
									<input type="text" class="form-control m-input" id="roll_number" name="roll_number" value="<?=(isset($students['studentRollNumber']) && !empty($students['studentRollNumber']) ? $students['studentRollNumber'] : '')?>">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-6">
								<label>
								Course Enroll Date <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="date" class="form-control m-input" id="course_enroll_date" name="course_enroll_date" value="<?=(isset($students['course_enroll_date']) && !empty($students['course_enroll_date']) ? $students['course_enroll_date'] : '')?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>
								Course End Date <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($students['course_end_date']))
											$students['course_end_date'] = '';
									?>
									<input type="date" class="form-control m-input" id="course_end_date" name="course_end_date" value="<?=(isset($students['course_end_date']) && !empty($students['course_end_date']) ? $students['course_end_date'] : '')?>">
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
									<a href="<?php echo ADMIN_BASE_URL . 'students'; ?>" class="btn btn-secondary">
										Cancel
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
<?php 
$cdeleted = (isset($deleted) && !empty($deleted) ? $deleted :'0');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script>

$(document).ready(function() {
	var deleted = '<?=$cdeleted?>'
	if(deleted==1){
		instructorAlert();
	}

  $(".js-select2").select2();
  
  $(".js-select2-multi").select2();

  $(".large").select2({
    dropdownCssClass: "big-drop",
  });
  
});
function instructorAlert(){
	swal('Warning',"One of The Instructor has left or Deleted You should consider Assign new Instructor","warning");
}

$('.select2-selection__choice__remove').on('click',
function(){
	alert("ok");
})
</script>