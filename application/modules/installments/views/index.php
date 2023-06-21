<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Installments
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?=ADMIN_BASE_URL?>installments/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
								Student Name
							</th>
							<th>
							   Payment Status
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
                        		$edit_url = ADMIN_BASE_URL . 'installments/create/' . (isset($row['installmentID']) && !empty($row['installmentID']) ? $row['installmentID']:'')?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?=(isset($row['installmentTitle']) && !empty($row['installmentTitle']) ? $row['installmentTitle']:'')?>
							</td>
							<td>
							<?=(isset($row['studentName']) && !empty($row['studentName']) ? $row['studentName']:'')?>


							</td>
							<td>
							<?php $payment_status=(isset($row['installmentPaidStatus']) && !empty($row['installmentPaidStatus']) ? $row['installmentPaidStatus']:'');
							if($payment_status==1){
								?>
								<span class="label label-success">paid</span><?php
							}else{
								?><span class="label label-danger">Unpaid</span><?php
							}
							?>

							</td>
							<td nowrap="">
								<span class="dropdown">
									<a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
									<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=(isset($row['installmentID']) && !empty($row['installmentID']) ? $row['installmentID']:'')?>"><i class="flaticon-file"></i> Detail</a>

									<a class="dropdown-item action_publish" href="javascript:void(0)" rel=<?=(isset($row['installmentID']) && !empty($row['installmentID']) ? $row['installmentID']:'')?> status=<?=(isset($row['installmentPaidStatus']) && !empty($row['installmentPaidStatus']) ? $row['installmentPaidStatus']:'')?>><i class="fa fa-long-arrow-<?php echo ($payment_status==1 ? 'up' : 'down');?>"></i> Update Status</a>

										<a class="dropdown-item" href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?=(isset($row['installmentID']) && !empty($row['installmentID']) ? $row['installmentID']:'')?>"><i class="fa fa-trash-o"></i> Delete</a>
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
			title : "Are you sure to delete the selected installments?",
			text : "You will not be able to recover this installments!",
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
					url: "<?= ADMIN_BASE_URL?>installments/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "installments has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "installments has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "installments is safe :)", "error");
		});
    });

	$(document).on("click", ".view_details", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL?>installments/detail",
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
			url: "<?= ADMIN_BASE_URL ?>installments/get_receiver_name",
			data: {'id': id},
			async: false,
			success: function(result) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(result);
			}
		});
	});
</script>