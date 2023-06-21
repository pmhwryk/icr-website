<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>User Name:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['user_name']) && !empty($users_res['user_name'])) 
                            echo $users_res['user_name'];
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Full Name:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(!isset($users_res['first_name']) || empty($users_res['first_name'])) 
                            $users_res['first_name'] = "";
                        if(!isset($users_res['last_name']) || empty($users_res['last_name'])) 
                            $users_res['last_name'] = '';
                        echo $users_res['first_name']." ".$users_res['last_name'];
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!--/row-->
<div class="row">
<!--/span-->
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Address:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['address1']) && !empty($users_res['address1'])) 
                            echo $users_res['address1'];
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Country:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['country']) && !empty($users_res['country'])) 
                            echo $users_res['country'];
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>City:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['city']) && !empty($users_res['city'])) 
                            echo $users_res['city'];
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>State:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['state']) && !empty($users_res['state'])) 
                            echo $users_res['state'];
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Email:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['email']) && !empty($users_res['email'])) 
                            echo $users_res['email'];
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Phone:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        if(isset($users_res['phone']) && !empty($users_res['phone'])) 
                            echo $users_res['phone'];
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>