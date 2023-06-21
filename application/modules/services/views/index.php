<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> services
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?=ADMIN_BASE_URL?>services/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
								Description
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
                    	$i=0;
                        if (isset($query)) {
                        	foreach ($query->result() as $row):
                        		$i++;   
                        		$edit_url = ADMIN_BASE_URL . 'services/create/' . $row->id;
                        ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?php echo $row->name; ?>
							</td>
							<td>
								<?php echo $row->description; ?>
							</td>
							<td>
								<?php 
									$status_class = "danger";
									if(isset($row->status) && !empty($row->status))
										if($row->status == 1)
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
									<a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=$row->id?>"><i class="flaticon-file"></i> Detail</a>
										<a class="dropdown-item action_publish" href="javascript:void(0)" rel="<?=$row->id?>" status=<?=$row->status?>><i class="fa fa-long-arrow-<?php echo ($status_class != 'danger' ? 'up' : 'down');?>"></i> Update Status</a>
										<a class="dropdown-item action_top_page" href="javascript:void(0);" rel="<?=$row->id?>" status ="<?php echo $row->is_home; ?>"><?php if ($row->is_home == 1) {?><i class="fa fa-chain"></i><?php } else {?><i class="fa fa-chain-broken"></i><?php } ?> Show on Home page</a>
										<a class="dropdown-item" href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?=$row->id?>"><i class="fa fa-trash-o"></i> Delete</a>
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
<script type="application/javascript">
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected services?",
			text : "You will not be able to recover this services!",
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
					url: "<?= ADMIN_BASE_URL?>services/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "services has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "services has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "services is safe :)", "error");
		});
    });

	$(document).on("click", ".view_details", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL?>services/detail",
			data: {'id': id},
			async: false,
			success: function(res_html) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(res_html);
			}
		});
	});

	$(document).on("click", ".action_top_page", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var status = $(this).attr('status');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL ?>services/set_as_homepage",
			data: {'id': id, 'status': status},
			async: false,
			success: function(result) {
				location.reload();
			}
		});
	});

    $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var status = $(this).attr('status');
		$.ajax({
		type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>services/change_status",
			data: {'id': id, 'status': status},
			async: false,
			success: function(result) {
				toaster_success_setting();
				toastr.success("Status change successfully");
				location.reload();
			}
		});
	});
</script>