<style>
	.red_border {
      border: 1px solid red !important;
    }
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-users"></i>Users
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?=ADMIN_BASE_URL?>users/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="flaticon-user-add"></i>
									<span>
										Add User
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
					<thead>
						<tr>
							<th>
								S.No
							</th>
							<th>
								User Name
							</th>
							<th>
								Full Name
							</th>
							<th>
								Email
							</th>
							<th>
								Phone
							</th>
							<th>
								Status
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
                    	$i = 0;
                    	if (isset($users_rec)) {
                        	foreach ($users_rec as $row):
                            	$i++;
                            	$edit_url = ADMIN_BASE_URL . 'users/create/' . $row['id'];
                           
                        ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?php echo $row['user_name'];?>
							</td>
							<td>
								<?php echo $row['first_name']." ".$row['last_name'];?>
							</td>
							<td>
								<?php echo $row['email'];?>
							</td>
							<td>
								<?php echo $row['phone'];?>
							</td>
							<td>
								<?php 
									$status_class = "danger";
									if(isset($row['status']) && !empty($row['status']))
										if($row['status'] == 1)
											$status_class = "info";

								?>
								<span class="m-badge  m-badge--<?=$status_class?> m-badge--wide">
									<?php
										echo ($status_class != 'danger' ? 'Active' : 'Unactive');
									?>
								</span>
							</td>
							<td nowrap="">
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item action_publish" href="javascript:void(0)" rel=<?=$row['id']?> status=<?=$row['status']?>><i class="fa fa-long-arrow-<?php echo ($status_class != 'danger' ? 'up' : 'down');?>"></i> Update Status</a>
										<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=$row['id']?>"><i class="flaticon-file"></i> Detail</a>
										<a class="dropdown-item change_password" href="javascript:void(0);" rel="<?=$row['id']?>"><i class="fa fa-eye"></i> Change Password</a>
										<a class="dropdown-item" href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel=<?=$row['id']?>><i class="fa fa-trash-o"></i> Delete</a>
									</div>
								</span>
							</td>
						</tr>
							<?php endforeach;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
</div>
<script>
	$(document).on("click", ".view_details", function(event){
        event.preventDefault();
        var id = $(this).attr('rel');
          $.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>users/detail",
			data: {'id': id},
			async: false,
			success: function(test_body) {
			var test_desc = test_body;
			$('#detail_model').modal('show');
			$("#detail_model .modal-body").html(test_desc);
			}
		});
	});
	$(document).off("click",".action_publish").on("click",".action_publish", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var status = $(this).attr('status');
			$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>users/change_status_event",
			data: {'id': id, 'status': status},
			async: false,
			success: function(result) {
				toaster_success_setting();
				toastr.success("Status change successfully");
				location.reload();
			}
		});
	});
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected User?",
			text : "You will not be able to recover this User!",
			type : "warning",
			showCancelButton : true,
			confirmButtonColor : "#DD6B55",
			confirmButtonText : "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0,
			closeOnConfirm : false
		}).then(function(e) {
			if(e.value) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL?>users/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "User has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "User has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "User is safe :)", "error");
		});
    });
	$(document).on("click", ".change_password", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>users/change_password",
			data: {'id': id},
			async: false,
			success: function(test_body) {
				var test_desc = test_body;
				$('#password_model').modal('show');
				$("#password_model .modal-body").html(test_desc);
				password_submit();
			}
		});
	});
	function password_submit() {
		$('.submit_password').off('click').click(function(e){
			e.preventDefault();
			var check = true;
			$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
			$("input[type=text],input[type=password]").off('click').click(function(){
				$('body').find("input[type=text],input[type=password]").removeClass('red_border');
				$(".submit_password").removeClass("m-loader m-loader--light m-loader--right");
			});
			$('.form-horizontal').find("input[type=text],input[type=password]").each(function(){
			if(!$(this).hasClass('notrequired') && !$(this).val()){
				check = false;
				$(this).addClass('red_border');
				$(".submit_password").removeClass("m-loader m-loader--light m-loader--right");
			}
			});
			if(check == true) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL ?>users/change_password_action",
					data: {'user_name': $('.form-horizontal').find("input[name=update]").val(), 'password':$('.form-horizontal').find("input[name=password]").val()},
					async: false,
					success: function(){
						$('#password_model').modal('hide');
						toastr.success('Password changed successfully.');
					}
				});
			}
		});
	}
</script>