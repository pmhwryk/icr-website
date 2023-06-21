<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <div class="m-content">
      <div class="m-portlet m-portlet--mobile">
         <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                     <i class="m-menu__link-icon flaticon-edit"></i> Blog
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
                        Name
                     </th>
                     <th>
                        Email
                     </th>
                     <th>
                        Comment
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
                     
                        if (isset($comments)) {
                     
                        	foreach ($comments->result() as $row):
                     
                        		$i++;   
                     
                                $edit_url = ADMIN_BASE_URL . 'blog/create/' . $row->id;
                                $sub_url = ADMIN_BASE_URL . 'blog/index_sub/' . $row->id;
                                $comment_url = ADMIN_BASE_URL . 'blog/comments/' . $row->id;
                     
                        ?>
                  <tr>
                     <td>
                        <?php echo $i;?>
                     </td>
                     <td>
                        <?php echo $row->name; ?>
                     </td>
                     <td>
                        <?php echo $row->email; ?>
                     </td>
                     <td>
                        <?php echo $row->comment; ?>
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
                              <a class="dropdown-item action_publish" href="javascript:void(0)" data-blog="<?=$row->blog_id?>" rel="<?=$row->id?>" status=<?=$row->status?>><i class="fa fa-long-arrow-<?php echo ($status_class != 'danger' ? 'up' : 'down');?>"></i> Update Status</a>
                              <a class="dropdown-item delete_record" href="javascript:void(0)" data-blog="<?=$row->blog_id?>" rel="<?=$row->id?>"><i class="fa fa-trash-o"></i> Delete</a>
                              <!-- <a class="dropdown-item " href="<?=$sub_url?>"><i class="la la-edit "></i> Manage Details</a> -->
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
          var blog_id = $(this).data('blog');
          e.preventDefault();
   
   	swal({
   
   		title : "Are you sure to delete the selected Comment?",
   
   		text : "You will not be able to recover this Comment!",
   
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
   
   				url: "<?= ADMIN_BASE_URL?>blog/delete_cooments",
   
   				data: {'id': id, 'blog_id': blog_id},
   
   				async: false,
   
   				success: function() {
   
   					swal("Deleted!", "Comment has been deleted.", "success");
   
   					location.reload();
   
   				}
   
   			});
   
   			swal("Deleted!", "Comment has been deleted.", "success");
   
   		}
   
   		if("cancel" === e.dismiss)
   
   			swal("Cancelled", "Comment is safe :)", "error");
   
   	});
   
      });
   
   
   
   
   
   
      $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
   
   	event.preventDefault();
   
   	var id = $(this).attr('rel');
      var blog_id = $(this).data('blog');
   
   	var status = $(this).attr('status');
   
   	$.ajax({
   
   	type: 'POST',
   
   		url: "<?= ADMIN_BASE_URL ?>blog/update_comments_status",
   
   		data: {'id': id, 'status': status, 'blog_id': blog_id},
   
   		async: false,
   
   		success: function(result) {
   
   			toaster_success_setting();
   
   			toastr.success("Status change successfully");
   
   			location.reload();
   
   		}
   
   	});
   
   });
   
</script>