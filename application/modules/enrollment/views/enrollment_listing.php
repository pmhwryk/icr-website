<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-list"></i> Enrollments
						</h3>
					</div>
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
								Enrollment ID
							</th>
							<th>
								Student Name
							</th>
							<th>
								Phone
							</th>
							<th>
								Email
							</th>
							<th>
								Batch
							</th>
							<th>
								Course
							</th>
							<th>
								Shift
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if (isset($enrollments)) {
							foreach ($enrollments as $row) {
								$i++;
								$edit_url = ADMIN_BASE_URL . 'enrollment/create/' . (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>
								<tr>
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?= (isset($row['enroll_id']) && !empty($row['enroll_id']) ? $row['enroll_id'] : '') ?>
									</td>
									<td>
										<?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : '') ?>
									</td>
									<td>
										<?= (isset($row['phone']) && !empty($row['phone']) ? $row['phone'] : '') ?>
									</td>
									<td>
										<?= (isset($row['email']) && !empty($row['email']) ? $row['email'] : '') ?>
									</td>
									<td>
										<?= (isset($row['batch_title']) && !empty($row['batch_title']) ? $row['batch_title'] : '') ?>
									</td>
									<td>
										<?= (isset($row['course_title']) && !empty($row['course_title']) ? $row['course_title'] : '') ?>
									</td>
									<td>
										<?= (isset($row['shift']) && !empty($row['shift']) ? $row['shift'] : '') ?>
									</td>
									<td>
										<span class="dropdown">
											<a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
												<i class="la la-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
												<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><i class="flaticon-file"></i> Detail</a>
												<!-- <a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><i class="fa fa-trash-o"></i> Delete</a> -->
											</div>
										</span>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<script type="application/javascript">
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e) {
		var id = $(this).attr('rel');
		e.preventDefault();
		swal({
			title: "Are you sure to delete the selected enrollment?",
			text: "You will not be able to recover this enrollment!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0,
			closeOnConfirm: false
		}).then(function(e) {
			if (e.value) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL ?>enrollment/delete",
					data: {
						'id': id
					},
					async: false,
					success: function() {
						swal("Deleted!", "enrollment has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "enrollment has been deleted.", "success");
			}
			if ("cancel" === e.dismiss)
				swal("Cancelled", "enrollment is safe :)", "error");
		});
	});

	$(document).on("click", ".view_details", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>enrollment/detail",
			data: {
				'id': id
			},
			async: false,
			success: function(res_html) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(res_html);
			}
		});
	});

	$(document).off("click", ".action_publish").on("click", ".action_publish", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var status = $(this).attr('status');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>enrollment/get_receiver_name",
			data: {
				'id': id
			},
			async: false,
			success: function(result) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(result);
			}
		});
	});
</script>