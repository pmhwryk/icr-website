<!doctype html>
<html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Student Fee Voucher</title>
    <meta name="description" content="Student Fee Voucher">
    <style type="text/css">
        .reset_btn {background:#20e277; text-decoration:none !important; font-weight:500; margin-top:30px; color:#fff !important; text-transform:uppercase; font-size:14px; padding:10px 24px; display:inline-block; border-radius:50px; }
        p {color:#455056; font-size:15px; margin:0;}
        .info-section{width:100%;margin-left:60px;text-align:left}.dis-block{display:flex;width:100%}.dis-block .date{float:right;margin:auto;margin-left:200px}.dis-block .batch{margin-left:106px}.logo-icr{width:108px;height:81px;margin-top:20px}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">
                                    <img src="https://itcentre.pk/assets/img/Logo-icr.png" class="logo-icr" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:33px 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0; font-size:32px; font-family:'Rubik',sans-serif;">Hi, <?=(isset($student['fullname']) && !empty($student['fullname']) ? $student['fullname']:'')?> </h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <p>Pay your Monthly Fee of App developmet course:</p>
                                        <div class="info-section">
                                            <div class="dis-block">
                                                <p style="margin-top:20px;">Roll No: <strong><?=(isset($student['studendRollNumber']) && !empty($student['studendRollNumber']) ? $student['studendRollNumber']:'')?></strong></p>
                                                <p class="date" style="margin-top:20px;">Due Date: <strong><?=(isset($installment['due_date']) && !empty($installment['due_date']) ? $installment['due_date']:'')?></strong></p>

                                            </div>
                                            <p style="margin-top:20px;">Name: <strong><?=(isset($student['fullname']) && !empty($student['fullname']) ? $student['fullname']:'')?></strong></p>
                                            <div class="dis-block">
                                                <p style="margin-top:20px;">Department: <strong><?=(isset($student['courseTitle']) && !empty($student['courseTitle']) ? $student['courseTitle']:'')?></strong></p>
                                                <p class="batch" style="margin-top:20px;">Batch: <strong><?=(isset($student['studentBatch']) && !empty($student['studentBatch']) ? $student['studentBatch']:'')?></strong></p>
                                            </div>
                                        </div>

                                        <div class="info-section" style="margin-top: 20px;border: 1px solid;margin-left: 54px;padding: 10px;width: 74%;">
                                            <div class="dis-block">
                                                <p ><strong>DESCRIPTION</strong></p>
                                                <p class="date" style="margin-left: 250px;"><strong>AMOUNT</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Registration Fee</p>
                                                <p class="date" style="margin-left: 250px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Admission/ Re-Admission Fee</p>
                                                <p class="date" style="margin-left: 157px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Annual Charges</p>
                                                <p class="date" style="margin-left: 251px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Tuition Fee</p>
                                                <p class="date" style="margin-left: 283px;"><strong><?=(isset($installment['installment_amount']) && !empty($installment['installment_amount']) ? $installment['installment_amount']:'')?></strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Security Deposit</p>
                                                <p class="date" style="margin-left: 250px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Examination Fee</p>
                                                <p class="date" style="margin-left: 247px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Other Dues</p>
                                                <p class="date" style="margin-left: 282px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Pending Dues</p>
                                                <p class="date" style="margin-left: 263px;"><strong>--</strong></p>
                                            </div>

                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p ><strong>Payable Within Due Date:</strong></p>
                                                <p class="date" style="margin-left: 174px;"><strong><?=(isset($installment['installment_amount']) && !empty($installment['installment_amount']) ? $installment['installment_amount']:'')?></strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p ><strong>Fine</strong>(from 5th to 10th)</p>
                                                <p class="date" style="margin-left: 211px;"><strong>--</strong></p>
                                            </div>
                                            

                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p ><strong>Payable After due date:</strong></p>
                                                <p class="date" style="margin-left: 187px;"><strong>--</strong></p>
                                            </div>
                                            <div class="dis-block" style="margin-top: 20px;">
                                                <p >Please Contact ICR Managment for Further Information</p>
                                            </div>
                                        </div>
                                      

                                        <p style="margin-top:20px;">Pay Your Fee in Due date to prevent fine.</p>
                                        <!-- <a href="<?= $email_url ?>" class="reset_btn">Verify Email</a> -->

                                        <p style="text-align:left; margin-top:20px;"><strong>Cheers,</strong></p>
                                        <p style="text-align:left;">ICR Managment</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href='http://itcentre.pk/' target='_blank' style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.itcentre.pk</strong></a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
