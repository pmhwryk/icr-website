        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?=STATIC_FRONT_IMAGE?>demo_01.jpg');">
            </div>
            <div class="page-title section">
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="title-area pull-left">
                            <h2>Leaves</h2>
                        </div>
                        <!-- /.pull-right -->
                        <div class="pull-right hidden-xs">
                            <a href="<?=BASE_URL.'portal-dashboard'?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <!-- end clearfix -->
                </div>
            </div>
            
            <div class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="pull-right hidden-xs">
                                <button class="btn btn-default btn-sm" style="margin-bottom: 15px;" data-toggle="modal" data-target="#absenceModal"><i class="fa fa-plus"></i> Absence request</button>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="course-widget">
                                <div class="course-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr. No#</th>
                                                <th>Absence period</th>
                                                <th>Type</th>
                                                <th style="width: 300px;">Comments</th>
                                                <th>Applied on</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($leaves) && !empty($leaves)){
                                                $counter = 0;
                                                foreach($leaves as $row){
                                                    $counter++;
                                            ?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=((isset($row['leave_from']) && !empty($row['leave_from'])) ? date("d-m-Y", strtotime($row['leave_from'])) : '')?> To 
                                                <?=((isset($row['leave_to']) && !empty($row['leave_to'])) ? date("d-m-Y", strtotime($row['leave_to'])) : '')?></td>
                                                <td><?=((isset($row['leave_type']) && !empty($row['leave_type'])) ? $row['leave_type'] : '')?></td>
                                                <td><?=((isset($row['comment']) && !empty($row['comment'])) ? $row['comment'] : '')?></td>
                                                <td><?=((isset($row['created_at']) && !empty($row['created_at'])) ? $row['created_at'] : '')?></td>
                                                <td><span class="label <?=((isset($row['approval_status']) && ($row['approval_status'] == 'Approved')) ? 'label-success' : ((isset($row['approval_status']) && ($row['approval_status'] == 'Pending')) ? 'label-info' : 'label-danger'))?>"><?=((isset($row['approval_status']) && !empty($row['approval_status'])) ? $row['approval_status'] : '')?></span></td>
                                                <td><a href="javascript:void(0);" rel="<?=((isset($row['id']) && !empty($row['id'])) ? $row['id'] : '')?>" class="btn btn-default btn-sm delete_record"><i class="fa fa-times"></i> Cancel</a></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><!-- end course-table -->
                            </div><!--widget -->
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
            <!-- end copyrights -->
        </div>



<!-- Modal -->
<div class="modal fade" id="absenceModal" tabindex="-1" role="dialog" aria-labelledby="absenceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="absenceModalLabel">Absence request</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form class="defaultform absenceRequest" method="post" enctype="multipart/form-data">
                            <div class="space">
                                <label>From : </label>
                                <input type="date" name="leave_from" class="form-control" value="<?=(isset($students['leave_from']) && !empty($students['leave_from']) ? $students['leave_from']:'')?>" placeholder="Enter your name">
                            </div>
                            <div class="space">
                                <label>To : </label>
                                <input type="date" name="leave_to" class="form-control" value="<?=(isset($students['leave_to']) && !empty($students['leave_to']) ? $students['leave_to']:'')?>" placeholder="Enter your name">
                            </div>
                            <div class="space">
                                <label>Absent Type : </label>
                                <select name="leave_type" class="form-control">
                                    <option value="Monthly Leave" <?=(isset($students['leave_type']) && !empty($students['leave_type']) ? 'selected':'')?>>Monthly Leave</option>
                                    <option value="Sick Leave" <?=(isset($students['leave_type']) && !empty($students['leave_type']) ? 'selected':'')?>>Sick Leave</option>
                                    <option value="Remote Work" <?=(isset($students['leave_type']) && !empty($students['leave_type']) ? 'selected':'')?>>Remote Work</option>
                                </select>
                            </div>
                            <div class="space">
                                <label>Comments : </label>
                                <textarea name="comment" class="form-control"></textarea>
                            </div>
                            <div class="pull-right hidden-xs">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="button" class="btn btn-default leave_submit" data-dismiss="modal">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">
    $('.leave_submit').on('click',function(){
        var form_data = $('.absenceRequest').serialize();
        $.ajax({
            type: 'post',
            url: '<?=BASE_URL?>submit-absence-request',
            data: form_data,
            success:function(data){
                if(data.status==1){
                    swal("Success!","Absence has been requested.","success");
                }else{
                    swal("Warning!","You have already requested for the same absence","warning");
                }
            }
        });
    });

	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected Record?",
			text : "You will not be able to recover this Record!",
			type : "warning",
			showCancelButton : true,
			confirmButtonColor : "#DD6B55",
			confirmButtonText : "Yes, delete it!",
			closeOnConfirm : false
		}).then(function(e) {
			if(e.value) {
				$.ajax({
					type: 'POST',
					url: "<?=BASE_URL?>cancel-absence-request",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "Record has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Record has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "Record is safe :)", "error");
		});
    });

</script>
