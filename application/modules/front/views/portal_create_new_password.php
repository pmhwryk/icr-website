        <section class="contact-area ptb-100">
            <div class="container">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="contact-image" data-tilt>
                                <img src="<?=STATIC_FRONT_ASSETS?>img/contact.png" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col_form">
                            <div class="contact-form">
                                <h3>Create New Password</h3>
                                <form method="POST" id="loginForm" onsubmit="return false;">
                                    <input type="hidden" name="id" class="nId" value="<?=((isset($id) && !empty($id)) ? $id : '')?>">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12"> 
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control password" required data-error="Please enter your password" placeholder="Your Password">
                                                <div class="help-block with-errors"></div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12"> 
                                            <div class="form-group"> 
                                                <input type="password" name="conPassword" class="form-control con_password" required data-error="Please enter your password" placeholder="Re Enter Your Password">
                                                <div class="help-block with-errors message"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn portal-form-btn"><i class='bx bxs-paper-plane'></i>Submit</button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->

        <script type="text/javascript">
            $('.password, .con_password').on('keyup', function () {
                if ($('.password').val() != $('.con_password').val()) {
                    $('.message').html('Not Matched').css('color', 'red');
                }else{
                    $('.message').html('Matched').css('color', 'green');
                }
            });
        </script>

        <script>
            $('.portal-form-btn').on('click',function(e){
                e.preventDefault();
                var nId = $('.nId').val();
                var password = $('.password').val();
                $.ajax({
                    type:'POST',
                    url:'<?=BASE_URL?>portal-change-password',
                    data:{'id':nId,'password':password},
                    success:function(data){
                        if(data.status==true){
                            window.location.href = '<?=BASE_URL?>';
                        }else{
                            swal('Error','Incorrect Username or Password!','error');
                        }
                    }
                })
            })
        </script>