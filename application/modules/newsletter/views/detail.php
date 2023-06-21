<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
               
                    <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><b>Name:</b></label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                <?php 
                                                    if(isset($post['name']) && !empty($post['name']))
                                                        echo  $post['name'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><b>Email:</b></label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                <?php 
                                                    if(isset($post['email']) && !empty($post['email']))
                                                        echo $post['email'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><b>Phone Number:</b></label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                <?php 
                                                    if(isset($post['phone']) && !empty($post['phone']))
                                                        echo $post['phone'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><b>Subject:</b></label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                <?php 
                                                    if(isset($post['subject']) && !empty($post['subject']))
                                                    echo $post['subject'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><b>Message:</b></label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                <?php 
                                                    if(isset($post['message']) && !empty($post['message']))
                                                       echo $post['message'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                
                <!-- END FORM-->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>