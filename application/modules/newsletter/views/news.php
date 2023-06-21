<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> newsletter
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
						
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
								Email
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
                    	$i=0;
                        if (isset($news)) {
                        	foreach ($news->result() as $row):
                        		$i++;   ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?php echo $row->email; ?>
							</td>
							
							<td nowrap="">
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
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
$(document).ready(function(){
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected Message?",
			text : "You will not be able to recover this Message!",
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
					url: "<?= ADMIN_BASE_URL?>newsletter/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "Message has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Message has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "User is safe :)", "error");
		});
    });

	$(document).on("click", ".view_details", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL?>newsletter/detail",
			data: {'id': id},
			async: false,
			success: function(res_html) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(res_html);
			}
		});
	});
	});

</script>