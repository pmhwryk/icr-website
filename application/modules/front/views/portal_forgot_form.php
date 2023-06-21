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
                                <h3>Forgot Your Password</h3>
                                <form method="POST" id="forgotForm">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-12"> 
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control email" required data-error="Please enter your email" placeholder="Your Email">
                                                <div class="help-block with-errors"></div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn forgot-form-btn"><i class='bx bxs-paper-plane'></i>Forgot</button>
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

        <script>
            $('.forgot-form-btn').on('click',function(e){
                e.preventDefault();
                var email = $('.email').val();
                $.ajax({
                    type:'POST',
                    url:'<?=BASE_URL?>portal-submit-forgot-password',
                    data:{'email':email},
                    success:function(data){
                        if(data.status==true){
                            window.location.href = '<?=BASE_URL?>';
                        }else{
                            swal('Error','Incorrect Email, Please enter a registered email!','error');
                        }
                    }
                })
            })
        </script>