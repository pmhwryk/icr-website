<?php $payment_status=$installments['installmentPaidStatus'];
    $installment_id = $installments['installmentID'];

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
                    if(!isset($users['payment_receive_by']) || empty($users['payment_receive_by'])) 
                        $users['payment_receive_by'] = "";
                ?>
                <input type="text" class="form-control m-input payment_receive_by" name="payment_receive_by" value="<?=$users['payment_receive_by']?>" >
                
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
    var name=$('.payment_receive_by').val();
    var status = '<?=$payment_status?>';
    var installment_id = '<?=$installment_id?>';
    $.ajax({
        type:'post',
        url:'<?=ADMIN_BASE_URL?>installments/change_status',
        data:{'id':installment_id,'status':status,'name':name},
        success:function(data){
            if(data==1){
                swal('Paid','Installment status Changed to paid successfull','success');
            }else{
                swal('Unpaid','Installment status Changed to unpaid successfull','success');
            }
            setTimeout(function(){
                location.reload();

            },3000)
        }
    })
})
</script>