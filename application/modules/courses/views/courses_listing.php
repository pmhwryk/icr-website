<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Courses
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?= ADMIN_BASE_URL ?>courses/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="flaticon-file-1"></i>
									<span>
										Add New
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
								Title
							</th>
							<th>
								Category
							</th>
							<th>
								Instructor
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if (isset($courses)) {
							foreach ($courses as $row) {
								$i++;
								$edit_url = ADMIN_BASE_URL . 'courses/create/' . (isset($row['courseID']) && !empty($row['courseID']) ? $row['courseID'] : '') ?>
								<tr>
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?= (isset($row['courseTitle']) && !empty($row['courseTitle']) ? $row['courseTitle'] : '') ?>
									</td>
									<td>
										<?= (isset($row['courseCategory']) && !empty($row['courseCategory']) ? $row['courseCategory'] : '') ?>

									</td>
									<td>
										<?= (isset($row['courseInstructor']) && !empty($row['courseInstructor']) ? $row['courseInstructor'] : '') ?>

									</td>
									<td nowrap="">
										<span class="dropdown">
											<a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
												<i class="la la-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
												<a class="dropdown-item" href="<?= $edit_url ?>"><i class="la la-edit"></i> Edit Details</a>
												<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?= (isset($row['courseID']) && !empty($row['courseID']) ? $row['courseID'] : '') ?>"><i class="fa fa-trash-o"></i> Delete</a>
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
			title: "Are you sure to delete the selected courses?",
			text: "You will not be able to recover this courses!",
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
					url: "<?= ADMIN_BASE_URL ?>courses/delete",
					data: {
						'id': id
					},
					async: false,
					success: function() {
						swal("Deleted!", "courses has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "courses has been deleted.", "success");
			}
			if ("cancel" === e.dismiss)
				swal("Cancelled", "courses is safe :)", "error");
		});
	});

	$(document).on("click", ".view_details", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>courses/detail",
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
</script>