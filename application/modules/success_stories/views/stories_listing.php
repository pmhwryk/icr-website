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
							<i class="m-menu__link-icon flaticon-users"></i> Success Stories
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?= ADMIN_BASE_URL ?>success_stories/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="flaticon-user-add"></i>
									<span>Add Story</span>
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
								Student Name
							</th>
							<th>
								Job Title
							</th>
							<th>
								Category
							</th>
							<th>
								Description
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if (isset($success_stories)) {
							foreach ($success_stories as $row) :
								$i++;
								$row_id = (isset($row['id']) && !empty($row['id']) ? $row['id'] : "");
								$edit_url = ADMIN_BASE_URL . 'success_stories/create/' . $row_id;
						?>
								<tr>
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : "") ?>
									</td>
									<td>
										<?= (isset($row['job_title']) && !empty($row['job_title']) ? $row['job_title'] : "") ?>
									</td>
									<td style="text-transform: capitalize;">
										<?= (isset($row['category']) && !empty($row['category']) ? $row['category'] : "") ?>
									</td>
									<td>
										<?= (isset($row['description']) && !empty($row['description']) ? $row['description'] : "") ?>
									</td>
									<td>
										<span class="dropdown">
											<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
												<i class="la la-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
												<a class="dropdown-item" href="<?= $edit_url ?>"><i class="la la-edit"></i> Edit Details</a>
												<a class="dropdown-item delete_record" href="javascript:void(0)" rel=<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : "") ?>><i class="fa fa-trash-o"></i> Delete</a>
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
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e) {
		var id = $(this).attr('rel');
		e.preventDefault();
		swal({
			title: "Are you sure to delete the selected Record?",
			text: "You will not be able to recover this Record!",
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
					url: "<?= ADMIN_BASE_URL ?>success_stories/delete",
					data: {
						'id': id
					},
					async: false,
					success: function() {
						swal("Deleted!", "Record has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Record has been deleted.", "success");
			}
			if ("cancel" === e.dismiss)
				swal("Cancelled", "Record is safe :)", "error");
		});
	});
</script>