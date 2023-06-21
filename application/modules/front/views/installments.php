        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?=STATIC_FRONT_IMAGE?>demo_01.jpg');">
            </div>
            <div class="page-title section">
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="title-area pull-left">
                            <h2>Installments</h2>
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
                            <div class="course-widget">
                                <div class="course-table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr. No#</th>
                                                <th>Payment Type</th>
                                                <th>Amount</th>
                                                <th>Due Date</th>
                                                <th>Payment Status</th>
                                                <th>Payment DateTime</th>
                                                <th>Received By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($payment) && !empty($payment)){
                                                $counter = 0;
                                                foreach($payment as $row){
                                                    $counter++;
                                            ?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=((isset($row['title']) && !empty($row['title'])) ? $row['title'] : '')?></td>
                                                <td><?=((isset($row['installment_amount']) && !empty($row['installment_amount'])) ? $row['installment_amount'].' PKR' : '')?></td>
                                                <td><?=((isset($row['due_date']) && !empty($row['due_date'])) ? date("d-m-Y", strtotime($row['due_date'])) : '')?></td>
                                                <td><span class="label <?=((isset($row['is_paid']) && ($row['is_paid'] == 1)) ? 'label-success' : 'label-danger')?>"><?=((isset($row['is_paid']) && ($row['is_paid'] == 1)) ? 'Paid' : 'Unpaid')?></span></td>
                                                <td><?=((isset($row['payment_datetime']) && !empty($row['payment_datetime'])) ? $row['payment_datetime'] : '')?></td>
                                                <td><?=((isset($row['payment_receive_by']) && !empty($row['payment_receive_by'])) ? $row['payment_receive_by'] : '')?></td>
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
        </div>