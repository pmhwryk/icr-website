<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Sub Menues
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
                        <?php $id = $this->uri->segment(4);?>
							<a href="<?=ADMIN_BASE_URL?>blog/create_sub/<?=$id?>" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
								Detail
							</th>
							
                            
							<!-- <th>Sub Manus</th> -->
                            <th>
								Actions
							</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						
                        if (isset($chk)) {
                        	foreach ($chk as $row):
                        		$i++;   
                        		if (!isset($return_page))
                                    $return_page = 0;
                                    
                                $edit_url = ADMIN_BASE_URL . 'blog/create_sub/'.$row['p_id'].'/'.$row['id'];
                                
								
                        ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
                            <td>
								<?php echo $row['long_desc']; ?>
							</td>
							<!-- <td>
							
							</td> -->
							<td nowrap="">
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<!-- <a class="dropdown-item view_details" href="javascript:void(0);" rel="<?=$row['id']?>"><i class="flaticon-file"></i> Detail</a>
										 -->
										<a class="dropdown-item" href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?=$row['id']?>"><i class="fa fa-trash-o"></i> Delete</a>

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
// $(".custom-select").on('change',function(){
//     var getValue=$(this).val();
// 	url='<?= ADMIN_BASE_URL?>document/create_sub/' + getValue;

// 	$(".sub_page").attr("href",url);
    
//   });
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
		var id = $(this).attr('rel');
		//alert(id);
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected Detailed Data?",
			text : "You will not be able to recover this Detailed Data!",
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
					url: "<?= ADMIN_BASE_URL?>blog/sub_delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "Detailed Data has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Detailed Data has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "Detailed Data is safe :)", "error");
		});
    });

	

    
</script>