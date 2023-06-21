<?php $approval_status=$leaves['leaveApprovalStatus'];
    $leave_id = $leaves['leavesID'];
?>
<form action="" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal">
<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-12">
            <label>
                Please Enter Your Name
            </label>
            <div class="input-group m-input-group m-input-group--square">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-user"></i>
                    </span>
                </div>
                <?php
                    if(!isset($approval['leaveApprovedBy']) || empty($approval['leaveApprovedBy'])) 
                        $approval['leaveApprovedBy'] = "";
                ?>
                <input type="text" class="form-control m-input leaveApprovedBy" name="leaveApprovedBy" value="<?=$approval['leaveApprovedBy']?>" >
                
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-8">
            <button type="submit" class="btn btn-primary submit_button">
                Submit
            </button>
            
        </div>
    </div>
   
</div>

</form>
  
<script>
$('.form-horizontal').submit(function(e){
    e.preventDefault();
    var name=$('.leaveApprovedBy').val();
    var status = '<?=$approval_status?>';
    var leave_id = '<?=$leave_id?>';
    $.ajax({
        type:'post',
        url:'<?=ADMIN_BASE_URL?>leaves/change_status',
        data:{'id':leave_id,'status':status,'name':name},
        success:function(data){
            if(data=='Approved'){
                swal('Approved','The Leave Request Approved Successfully','success');
            }else{
                swal('Rejected!','The Leave Request Rejected Successfully','success');
            }
            setTimeout(function(){
                location.reload();

            },3000)
        }
    })
})
</script>