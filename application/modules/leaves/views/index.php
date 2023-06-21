<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Leaves Requests
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
								Type
							</th>
							<th>
							   Absence Period
							</th>
							<th>
							   Approval Status
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
                        	foreach ($query as $row):
                        		$i++;   
                        		$edit_url = ADMIN_BASE_URL . 'leaves/create/' . (isset($row['leavesID']) && !empty($row['installmentID']) ? $row['installmentID']:'')?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?=(isset($row['leaveRequestedBy']) && !empty($row['leaveRequestedBy']) ? $row['leaveRequestedBy']:'')?>
							</td>
							<td>
							<?=(isset($row['leaveType']) && !empty($row['leaveType']) ? $row['leaveType']:'')?>
							</td>
							<td>
							<?php $leaveFrom=(isset($row['leaveFromDate']) && !empty($row['leaveFromDate']) ? $row['leaveFromDate']:'');
								$leaveFrom = date("d-m-Y", strtotime($leaveFrom));
								  $leaveTo=(isset($row['leaveToDate']) && !empty($row['leaveToDate']) ? $row['leaveToDate']:'');
								  $leaveTo = date("d-m-Y", strtotime($leaveTo));

								echo $leaveFrom .'-to-'; echo $leaveTo;
							?>

							</td>

							<td>
							<?=(isset($row['leaveApprovalStatus']) && !empty($row['leaveApprovalStatus']) ? $row['leaveApprovalStatus']:'')?>
							</td>
							<td nowrap="">
								<?php
								$approval_status=(isset($row['leaveApprovalStatus']) && !empty($row['leaveApprovalStatus']) ? $row['leaveApprovalStatus']:'')
								?>
								<span class="dropdown">
									<a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
									<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=(isset($row['leavesID']) && !empty($row['leavesID']) ? $row['leavesID']:'')?>"><i class="flaticon-file"></i> Detail</a>

									<a class="dropdown-item action_publish" href="javascript:void(0)" rel=<?=(isset($row['leavesID']) && !empty($row['leavesID']) ? $row['leavesID']:'')?> status=<?=(isset($row['leaveApprovalStatus']) && !empty($row['leaveApprovalStatus']) ? $row['leaveApprovalStatus']:'')?>><i class="fa fa-long-arrow-<?php echo ($approval_status=='Approved' ? 'up' : 'down');?>"></i> Update Status</a>

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
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected leaves?",
			text : "You will not be able to recover this leaves!",
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
					url: "<?= ADMIN_BASE_URL?>leaves/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "leaves has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "leaves has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "leaves is safe :)", "error");
		});
    });

	$(document).on("click", ".view_details", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL?>leaves/detail",
			data: {'id': id},
			async: false,
			success: function(res_html) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(res_html);
			}
		});
	});


    $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var status = $(this).attr('status');
		$.ajax({
		type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>leaves/get_approval_name",
			data: {'id': id},
			async: false,
			success: function(result) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(result);
			}
		});
	});
</script>