              
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								 <h3 class="m-portlet__head-text">
								      <i class="fa fa-list"></i>
                                      <?php
                                                if (empty($update_id)) 
                                                    $strTitle = 'Add Roles';
                                                else 
                                                    $strTitle = 'Edit Roles';
                                                echo $strTitle;
                                                ?>
                                    <!--<a href="<?php echo ADMIN_BASE_URL . 'roles'; ?>"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>-->
                                </h3>
							</div>
						</div>
					</div>
					
					
					
                     <?php
                                    $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed', 'data-parsley-validate' => '', 'novalidate' => '' );
                                    if (empty($update_id)) {
                                        $update_id = 0;
                                    } else {
                                        $hidden = array('hdnId' => $update_id); ////edit case
                                    }
                                    if (isset($hidden) && !empty($hidden))
                                        echo form_open_multipart(ADMIN_BASE_URL . 'roles/submit/' . $update_id , $attributes, $hidden);
                                    else
                                        echo form_open_multipart(ADMIN_BASE_URL . 'roles/submit/' . $update_id , $attributes);
                                    ?>
                
                    <?php
                    $attributes = array('id' => 'roles_form', 'class' => 'form-horizontal no-mrg m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed');
                    echo form_open_multipart('', $attributes);
                    $data = array(
                        'name' => 'hdn_role_id',
                        'class' => 'hdn_role_id',
                        'id' => 'hdn_role_id',
                        'type' => 'hidden',
                        
                    );
                    echo form_input($data);
                    
                    ?>
                    <div class="m-portlet__body">
                        <div class="row form-group m-form__group">
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <?php
                                    $attribute = array('class' => 'control-label col-md-4');
                                    echo form_label('Business', 'station', $attribute); 
                                    ?>
                                    <div class="col-md-8">
                                         <?php echo form_dropdown('station', $stations,'', 'class="form-control select2me" id="station" required'); ?></div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6">
                                <?php if (isset($roles_admin)) {
                                   
                                } else {   $roles_admin['role'] = ''; } ?>
                                <div class="form-group">
                                    <?php

                                    $data = array(
                                        'name' => 'title',
                                        'id' => 'title',
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'required' => '1',
                                         'value' => $roles_admin['role'],
                                        'tabindex'=>2
                                    );
                                    $attribute = array('class' => 'control-label col-md-4','style'=>'text-align:right;');
                                    ?>
                                    <?php echo form_label('Title', 'title', $attribute); ?>
                                    <div class="col-md-8">
                                        <?php echo form_input($data); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
				</div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="btn btn-primary ">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL . 'roles'; ?>">
										<button  class="btn btn-secondary">
											Cancel
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
                        <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script>
$(document).ready(function() {
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
        var id = $("#hdn_role_id").val();
        alert(id);
        event.preventDefault();
        $("#role_spinners").show();
        $.ajax({
            type: "POST",

            url:  "<?= ADMIN_BASE_URL ?>roles/submit",
            data: $("#roles_form").serialize(),
            success: function(type){ 

                $("#role_spinners").hide();
               // $("#roles_listing").load( "<?= ADMIN_BASE_URL ?>roles/get_roles",function() {
                //var outlet_text = $("#outlet option:selected").text();
                //$('#search_outlet option').filter(function() { return $(this).text() == outlet_text; }).attr('selected',true);
                   // $('form#roles_form').find(":input").val('');
                    if(type == 1) {
                       
                        toastr.success('Role Added Successfully');
                    }
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
                    toastr.success('Hereeeeeee');
              //  });
            }
        });
    });
    
    $(document).on("click","#role_edit", function(event){
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

    });
    
     $(document).on("click","#role_delete", function(event){
        event.preventDefault();
        var role_id = $(this).attr('rel');
        $("#del_roles_"+role_id).show();

        $.ajax({
        type: "POST",
        url:  "<?= ADMIN_BASE_URL ?>roles/delete_role",
        data: { role_id: role_id},
        success: function(result){
            $("#del_roles_"+role_id).hide();
            if(result == 'no_permission'){
                        var message = 'You don\'t have permission.';
                        toastr.error(message);
                        return;
                    } 
            
            $("#roles_listing").load( "<?= ADMIN_BASE_URL ?>roles/get_roles", function() {
                    $('form#roles_form').find(":input").val('');
                        var message = 'Role Deleted Successfully.';
                        toastr.success(message);
                });
            
        }
        });
    });
</script>