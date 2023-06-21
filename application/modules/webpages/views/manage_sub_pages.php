                       
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> <?= $page_title = $ParentPageDetails['page_title']?> - Sub Pages
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?php echo ADMIN_BASE_URL . 'webpages/create_sub_page/' . $ParentPageDetails['id']; ?>" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th  style="width:2%">S.No</th>
                        <th width="400px">Title</th>
                        <th class="" style="width:320px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                                <?php
                                $i=0;
                                if (isset($query)) {
                                    foreach ($query->result() as
                                            $row) {
                                        $i++;
                                        $manage_sub_page_url = ADMIN_BASE_URL . 'webpages/manage_sub_pages/' . $row->id ;
                                        $active_url = ADMIN_BASE_URL . 'webpages/sub_pages_active/' . $row->parent_id . '/' . $row->id;
                                        $in_active_url = ADMIN_BASE_URL . 'webpages/sub_pages_in_active/' . $row->parent_id .  '/' . $row->id;
                                        $edit_url = ADMIN_BASE_URL . 'webpages/create_sub_page/' . $row->parent_id . '/' . $row->id;
                                       $delete_url = ADMIN_BASE_URL . 'webpages/delete_sub_page/' . $row->id . '/' .  $row->parent_id;
                                        $set_publish_url = ADMIN_BASE_URL . 'webpages/active/' . $row->id;
                                        $set_unpublish_url = ADMIN_BASE_URL . 'webpages/in_active/' . $row->id;
                                        ?>
                                        <tr class="odd gradeX" id = "row_<?=$row->id?>">
                                          <td class="table-checkbox"><?php echo $i; ?></td>
                                            <td><?php  echo $row->page_title; ?></td>
                                               <?php
                                                if ($row->is_publish == 1){
                                                    $publish_class = 'table_action_publish';
                                                    $publis_title = 'Set Un-Publish';
                                                    $icon = '<i class="fa fa-long-arrow-up"></i>';
                                                    $iconbgclass = ' btn green c-btn';
                                                }
                                                if ($row->is_publish != 1) {
                                                    $publish_class = 'table_action_unpublish';
                                                    $publis_title = 'Set Publish';
                                                    $icon = '<i class="fa fa-long-arrow-down"></i>';
                                                    $iconbgclass = ' btn default c-btn';
                                                }?>
                                            
                                            <td nowrap="">
                								<span class="dropdown">
                									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                										<i class="la la-ellipsis-h"></i>
                									</a><?php $prefixID = 'desc'; ?>
                									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
                										<!--<a class="dropdown-item view_sub_details" href="javascript:void(0);" rel="<?=$row->id?>"><i class="flaticon-file"></i> Detail</a>-->
                										<a class="dropdown-item action_publish <?php echo  $publish_class.' '. $iconbgclass  ?>" href="javascript:void(0);" rel="<?=$row->id?>" status="<?php echo $row->is_publish; ?>"  title="<?=$publis_title ?>"><?=$icon?>Status</a>
                									    <a class="dropdown-item " href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
                										<a class="dropdown-item delete_records" href="javascript:void(0)" rel="<?=$row->id?>" rel2 =<?=$row->parent_id?>><i class="fa fa-trash-o"></i> Delete</a>
                									</div>
                								</span>
                							</td>
							
							
                                        </tr>
                                    <?php }
                                    ?>    
                                <?php } ?>
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


    /*//////////////////////// code for detail //////////////////////////*/
            $(document).off("click",".view_sub_details").on("click", ".view_sub_details", function(event){

            event.preventDefault();
            var id = $(this).attr('rel');
           
           // alert(id+pid); return false;
              $.ajax({
                        type: 'POST',
                        url: "<?php echo  ADMIN_BASE_URL?>webpages/detail",
                        data: {'id': id},
                        async: false,
                        success: function(test_body) {
                        var test_desc = test_body;
                        //var test_body = '<ul class="list-group"><li class="list-group-item"><b>Description:</b> Akabir Abbasi Test</li></ul>';
                        $('#myModal').modal('show')
                        //$("#myModal .modal-title").html(test_title);
                        $("#myModal .modal-body").html(test_desc);
                        }
                    });
            });


    /*///////////////////////// end for code detail //////////////////////////////*/

	/*//////////////////////// code for DELETE //////////////////////////*/
	
		$(document).off('click', '.delete_records').on('click', '.delete_records', function(e){
        var id = $(this).attr('rel');
        var pid = $(this).attr('rel2');
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
					url: "<?= ADMIN_BASE_URL?>webpages/delete_sub_pages",
                    data: {'id': id , 'pid': pid },
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

	/*//////////////////////// END code for DELETE //////////////////////////*/

       
    /*///////////////////////////////// START STATUS  ///////////////////////////////////*/
        
        $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
            event.preventDefault();
            var id = $(this).attr('rel');
            var status = $(this).attr('status');
             $.ajax({
                type: 'POST',
                url: "<?=ADMIN_BASE_URL ?>webpages/change_status_sub_pages",
                data: {'id': id, 'status': status},
                async: false,
                success: function(result) {
                    if($('#'+id).hasClass('default')==true)
                    {
                        $('#'+id).addClass('green');
                        $('#'+id).removeClass('default');
                        $('#'+id).find('i.fa-long-arrow-down').removeClass('fa-long-arrow-down').addClass('fa-long-arrow-up');
                    }else{
                        $('#'+id).addClass('default');
                        $('#'+id).removeClass('green');
                        $('#'+id).find('i.fa-long-arrow-up').removeClass('fa-long-arrow-up').addClass('fa-long-arrow-down');
                    }
                    location.reload();
                    $("#listing").load('<?php echo ADMIN_BASE_URL?>webpages/manage');
                    toastr.success('Status Changed Successfully');
                }
            });
            if (status == 1) {
                $(this).removeClass('table_action_publish');
                $(this).addClass('table_action_unpublish');
                $(this).attr('title', 'Set Publish');
                $(this).attr('status', '0');
            } else {
                $(this).removeClass('table_action_unpublish');
                $(this).addClass('table_action_publish');
                $(this).attr('title', 'Set Un-Publish');
                $(this).attr('status', '1');
            }
           
        });

    
});

</script>
