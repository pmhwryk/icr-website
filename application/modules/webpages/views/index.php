<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Webpages
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?=ADMIN_BASE_URL?>webpages/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
								Url slug
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
                        		if (!isset($return_page))
									$return_page = 0;
                        		$edit_url = ADMIN_BASE_URL . 'webpages/create/' . $row->id;
                        ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?php echo $row->page_title; ?>
							</td>
							<td>
								<?php echo $row->url_slug; ?>
							</td>
							<td nowrap="">
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a><?php $prefixID = 'desc'; ?>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=$row->id?>"><i class="flaticon-file"></i> Detail</a>
										<a class="dropdown-item" href=" <?php echo ADMIN_BASE_URL.'webpages/manage_sub_pages/'.$row->id.'/'.$row->page_title ?>"><i class="fa fa-sitemap"></i> Manage Sub Pages</a>
									    <a class="dropdown-item action_top_page" href="javascript:void(0);" rel="<?=$row->id?>"  id ="<?php echo $prefixID."-".$row->id; ?>" status ="<?php echo $row->show_in_toppanel; ?>"><?php if ($row->show_in_toppanel == 1) {?><i class="fa fa-chain"></i><?php } else {?><i class="fa fa-chain-broken"></i><?php } ?> Show in Header</a>
									    <a class="dropdown-item action_footer_page" href="javascript:void(0);" rel="<?=$row->id?>" id ="<?php echo $prefixID."-".$row->id; ?>" status ="<?php echo $row->show_in_footer; ?>"><?php if ($row->show_in_footer == 1) {?><i class="fa fa-chain"></i><?php } else {?><i class="fa fa-chain-broken"></i><?php } ?> Show in Footer</a>
										<a class="dropdown-item " href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
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
			title : "Are you sure to delete the selected Webpage?",
			text : "You will not be able to recover this Webpage!",
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
					url: "<?= ADMIN_BASE_URL?>webpages/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "Webpage has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Webpage has been deleted.", "success");
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
			url: "<?=ADMIN_BASE_URL?>webpages/detail",
			data: {'id': id},
			async: false,
			success: function(res_html) {
				$('#detail_model').modal('show')
				$("#detail_model .modal-body").html(res_html);
			}
		});
	});

	$(document).on("click", ".action_home", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL ?>webpages/set_home_page",
			data: {'id': id},
			async: false,
			success: function(result) {
				load_listing();
			}
		});
	});

	$(document).on("click", ".action_top_page", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var ID = $(this).attr('id');
		var status = $(this).attr('status');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL ?>webpages/change_top_panel_pages",
			data: {'id': id, 'status': status},
			async: false,
			success: function(result) {
				load_listing();
			}
		});
	});

	$(document).on("click", ".action_footer_page", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var ID = $(this).attr('id');
		var status = $(this).attr('status');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL ?>webpages/change_footer_panel_pages",
			data: {'id': id, 'status': status},
			async: false,
			success: function(result) {
				toastr.success('Successfully Done.');
				load_listing();
			}
		});
		});
	});

	function load_listing(){
		$("#m_table_1").load("<?php echo ADMIN_BASE_URL ?>webpages/load_listing", function(){
			$('#m_table_1').dataTable();
		});
	}
</script>