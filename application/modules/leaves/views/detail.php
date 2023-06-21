<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <table class="table table-striped table-condensed" >
            <tbody>
               
                <tr>
                    <td>Student Name:</td>
                    <td>
                    <?=(isset($leaves['leaveRequestedBy']) && !empty($leaves['leaveRequestedBy']) ? $leaves['leaveRequestedBy'] : '')?>
                    </td>
                </tr>
                <tr>
                    <td>Approval Status:</td>
                    <td>
                    <?=(isset($leaves['leaveApprovalStatus']) && !empty($leaves['leaveApprovalStatus']) ? $leaves['leaveApprovalStatus']:'');?>
                    </td>
                </tr>
                <tr>
                    <td>Request datetime:</td>
                    <td>
                    <?=(isset($leaves['leaveRequestDate']) && !empty($leaves['leaveRequestDate']) ? $leaves['leaveRequestDate'] : 'NILL')?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Absence Period
                    </td>
                    <td>
                    <?php $leaveFrom=(isset($leaves['leaveFromDate']) && !empty($leaves['leaveFromDate']) ? $leaves['leaveFromDate']:'');
								$leaveFrom = date("d-m-Y", strtotime($leaveFrom));
								  $leaveTo=(isset($leaves['leaveToDate']) && !empty($leaves['leaveToDate']) ? $leaves['leaveToDate']:'');
								  $leaveTo = date("d-m-Y", strtotime($leaveTo));

								echo $leaveFrom .'-to-'; echo $leaveTo;
							?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Leave Reason
                    </td>
                    <td>
                    <?=(isset($leaves['leaveComments']) && !empty($leaves['leaveComments']) ? $leaves['leaveComments']:'Null')?>

                    </td>
                </tr>
               
            </tbody>
        </table>
    </div>
</div>