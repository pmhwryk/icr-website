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
                                <h3>Let's Login Your Account</h3>
                                <form method="POST" id="loginForm" onsubmit="return false;">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12"> 
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control username" required data-error="Please enter your username" placeholder="Your Username">
                                                <div class="help-block with-errors"></div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12"> 
                                            <div class="form-group"> 
                                                <input type="password" name="password" class="form-control password" required data-error="Please enter your password" placeholder="Your Password">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn portal-form-btn"><i class='bx bxs-paper-plane'></i>Login</button>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <a href="portal-account-forgot-password" style="float: right;">Forgot Password?</a>
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

        <script>
            $('.portal-form-btn').on('click',function(e){
                e.preventDefault();
                var username = $('.username').val();
                var pass = $('.password').val();
                $.ajax({
                    type:'POST',
                    url:'<?=BASE_URL?>submit-portal-login',
                    data:{'username':username,'password':pass},
                    success:function(data){
                        if(data.status==true){
                            window.location.href = '<?=BASE_URL?>portal-dashboard';
                        }else{
                            swal('Error','Incorrect Username or Password!','error');
                        }
                    }
                })
            })
        </script>