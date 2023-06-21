<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <table class="table table-striped table-condensed" >
            <tbody>
                <tr>
                    <td>Installment Title:</td>
                    <td><?=(isset($installments['installmentTitle']) && !empty($installments['installmentTitle']) ? $installments['installmentTitle'] : '')?></td>
                </tr>
                <tr>
                    <td>Installment Description:</td>
                    <td>
                    <?=(isset($installments['installmentDescription']) && !empty($installments['installmentDescription']) ? $installments['installmentDescription'] : '')?>
                    </td>
                </tr>
                <tr>
                    <td>Student Name:</td>
                    <td>
                    <?=(isset($installments['studentName']) && !empty($installments['studentName']) ? $installments['studentName'] : '')?>
                    </td>
                </tr>
                <tr>
                    <td>Installment Paid Amount:</td>
                    <td>
                    <?php $checkpayment=(isset($installments['installmentPaidStatus']) && !empty($installments['installmentPaidStatus']) ? $installments['installmentPaidStatus']:'');
                    if($checkpayment==1){?>
                    <?=(isset($installments['installmentAmount']) && !empty($installments['installmentAmount']) ? $installments['installmentAmount'] : 'NILL')?>

                   <?php }else{
                       echo 'Installment is Not Paid yet';
                   }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Status datetime:</td>
                    <td>
                    <?=(isset($installments['installmentPaymentDate']) && !empty($installments['installmentPaymentDate']) ? $installments['installmentPaymentDate'] : 'NILL')?>
                    </td>
                </tr>
                <tr>
                    <td>Payment Status Updated By:</td>
                    <td>
                    <?=(isset($installments['installmentPaymentReceiver']) && !empty($installments['installmentPaymentReceiver']) ? $installments['installmentPaymentReceiver'] : 'NILL')?>
                    </td>
                </tr>
               
            </tbody>
        </table>
    </div>
</div>