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
							<i class="m-menu__link-icon flaticon-list"></i> Categories
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?= ADMIN_BASE_URL ?>categories/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="flaticon-add"></i>
									<span>
										Add Category
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
								Category Title
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if (isset($category)) {
							foreach ($category as $row) :
								$i++;
								$instructor_id = (isset($row['id']) && !empty($row['id']) ? $row['id'] : "");
								$edit_url = ADMIN_BASE_URL . 'categories/create/' . $instructor_id;

						?>
								<tr>
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?= (isset($row['title']) && !empty($row['title']) ? $row['title'] : "") ?>
									</td>
									<td nowrap="">
										<span class="dropdown">
											<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
												<i class="la la-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
												<a class="dropdown-item" href="<?= $edit_url ?>"><i class="la la-edit"></i> Edit Details</a>
												<a class="dropdown-item delete_record" href="javascript:void(0)" rel=<?= $row['id'] ?>><i class="fa fa-trash-o"></i> Delete</a>
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
					url: "<?= ADMIN_BASE_URL ?>categories/delete",
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