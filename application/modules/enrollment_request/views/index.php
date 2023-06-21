<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Enrollments Requests
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
								Student Name
							</th>
							<th>
								Student Phone
							</th>
							<th>
								University
							</th>
							<th>
								Department
							</th>
							<th>
								Semester
							</th>
							<th>
								Address
							</th>
							<th>
								Career Plan
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if (isset($query)) {
							foreach ($query as $row) :
								$i++;
								$edit_url = ADMIN_BASE_URL . 'enrollment/create/' . (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>
								<tr>
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : '') ?>
									</td>
									<td>
										<?= (isset($row['phone_number']) && !empty($row['phone_number']) ? $row['phone_number'] : '') ?>


									</td>
									<td>
										<?= (isset($row['university']) && !empty($row['university']) ? $row['university'] : '') ?>


									</td>
									<td>
										<?= (isset($row['department']) && !empty($row['department']) ? $row['department'] : '') ?>


									</td>
									<td>
										<?= (isset($row['semester']) && !empty($row['semester']) ? $row['semester'] : '') ?>


									</td>
									<td>
										<?= (isset($row['address']) && !empty($row['address']) ? $row['address'] : '') ?>


									</td>
									<td>
										<?= (isset($row['careerplan']) && !empty($row['careerplan']) ? $row['careerplan'] : '') ?>


									</td>

									<td nowrap="">
										<span class="dropdown">
											<a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
												<i class="la la-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
												<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><i class="flaticon-file"></i> Detail</a>
												<a class="dropdown-item accept_record" href="javascript:void(0);" rel="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><i class="fa-solid fa-check-to-slot"></i> Accept Student</a>
												<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>"><i class="fa fa-trash-o"></i> Delete</a>
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
					url: "<?= ADMIN_BASE_URL ?>enrollment_request/delete",
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

	$(document).off('click', '.accept_record').on('click', '.accept_record', function(e) {
		var id = $(this).attr('rel');
		e.preventDefault();
		swal({
			title: "Are you sure to Approve the selected enrollment?",
			text: "You will not be able to recover this action!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, Approve it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0,
			closeOnConfirm: false
		}).then(function(e) {
			if (e.value) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL ?>enrollment_request/approve_request",
					data: {
						'id': id
					},
					async: false,
					success: function() {
						swal("Approved!", "enrollment has been Approved.", "success");
						location.reload();
					}
				});
				swal("Approved!", "enrollment has been Approved.", "success");
			}
			if ("cancel" === e.dismiss)
				swal("Cancelled", "enrollment is not approved :)", "error");
		});
	});
	$(document).on("click", ".view_details", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>enrollment_request/detail",
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