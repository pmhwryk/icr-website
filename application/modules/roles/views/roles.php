 

<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Roles
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="roles/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
				 <table id="sample_1" class="table  table-bordered">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th width='2%'>S.No <i class="fa fa-sort" style="font-size:13px;"></th>
                        <th>Title <i class="fa fa-sort" style="font-size:13px;"></th>
                        <th class="" style="width:200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions</th>
                        </tr>
                        </thead>
                        <tbody class="courser table-body">
                        <?php
                        $i = 0;
                        if (isset($roles)) { foreach ($roles as $row) {
							$i++;
							$edit_url = ADMIN_BASE_URL . 'roles/create/' . $row['id']; 
                            if($row['role'] =='portal admin'){ $i++; continue; }
							?>
							<tr id="Row_<?=$row['id']?>" class="odd gradeX">
							<td class="sr"><?php echo $i;?></td>
							<td><?php echo $row['role']?></td>
							<td nowrap="">
							<?php
                            $permission_url = ADMIN_BASE_URL . 'permission/manage/'.$row['id'].'/'.$row['outlet_id'].'/'.$row['role'];
                            ?>
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item " href="<?=$permission_url ?>" rel="<?=$row->id?>"><i class="fa fa-eye"></i> Permissions</a>
										<a class="dropdown-item action_edit" href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?=$row['id']?>"><i class="fa fa-trash-o"></i> Delete</a>
									</div>
								</span>
							</td>
							</tr>
							<?php 
                        } }
                        ?>
                        </tbody>
                    </table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
</div>
<script>
$(document).ready(function() {

    $('#sample_1').dataTable(
                {
                    "aLengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
                    "iDisplayLength": 10
                    
                }
        );

    $("#roles_listing").load( "<?= ADMIN_BASE_URL ?>roles/get_roles",{'station':<?=DEFAULT_OUTLET?>});
    $(document).off('change',"#search_station").on('change',"#search_station",function(){
        var station = $(this).val();
        $("#roles_listing").load('<?php ADMIN_BASE_URL?>roles/get_roles',{'station':station});
    });
    
    /*$("#search_outlet").change(function(){
        $("#roles_listing").load( "<? //= ADMIN_BASE_URL ?>roles/get_roles");
    });*/
});

    $(document).on("submit","form#roles_form", function(event){
        event.preventDefault();
        $("#role_spinners").show();
        $.ajax({
            type: "POST",
            url:  "<?= ADMIN_BASE_URL ?>roles/submit",
            data: $("#roles_form").serialize(),
            success: function(type){ 
                $("#role_spinners").hide();
                $("#roles_listing").load( "<?= ADMIN_BASE_URL ?>roles/get_roles",function() {
                //var outlet_text = $("#outlet option:selected").text();
                //$('#search_outlet option').filter(function() { return $(this).text() == outlet_text; }).attr('selected',true);
                    $('form#roles_form').find(":input").val('');
                    if(type == 1)
                        var message = 'Role Saved Successfully.';
                    if(type == 2)
                        var message = 'Role Updated Successfully.';
                    if(type == 3)
                    {
                        var message = 'Role already exists.';
                        toastr.error(message);
                        return;
                    }
                    if(type == 'no_permission'){
                        var message = 'You don\'t have permission.';
                        toastr.error(message);
                        return;
                    }
                    toastr.success(message);
                });
            }
        });
    });
    
   /* $(document).on("click","#role_edit", function(event){
        event.preventDefault();
        var role_id = $(this).attr('rel');
            $.ajax({
            type: "POST",
            url:  "<?=ADMIN_BASE_URL ?>roles/edit_role",
            data: {role_id: role_id},
            success: function(form_html){
                $("#role_spinners").hide();
                if(form_html == 'no_permission'){
                        var message = 'You don\'t have permission.';
                        toastr.error(message);
                        return;
                    } 
                $("#roles_form_div").html('');
                $("#roles_form_div").html(form_html);
                $("html, body").animate({ scrollTop: "0px" });
            }
        });

    });*/
    
      $(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
        swal({
            title : "Are you sure to delete the selected Role?",
            text : "You will not be able to recover this Role!",
            type : "warning",
            showCancelButton : true,
             confirmButtonColor : "#DD6B55",
            confirmButtonText : "Yes, delete it!",
            closeOnConfirm : false
        },
        function () {
            $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>roles/delete_role",
            data: {'id': id},
            async: false,
            success: function(data) {
               
             if (data  > 0) {
               toastr.error('Error : Role Is Assigned To User ');
               setTimeout(function() {   
                       location.reload()
                     }, 2000);
               return false;
             }
             else
             {
                $("#sample_1").load("<?= ADMIN_BASE_URL ?>roles/roles_load_listing");
                swal("Deleted!", "Role has been deleted.", "success");
             }
            }
            });
          
      });
    });
</script>