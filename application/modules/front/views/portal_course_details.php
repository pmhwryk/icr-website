        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?=STATIC_FRONT_IMAGE?>upload/demo_01.jpg');">
            </div>
            <div class="page-title section">
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="title-area pull-left">
                            <h2>Edit Profile</h2>
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
            
            <div class="section course_area">
                <div class="container">
                    <div class="contact-inner">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="course_detail_sidebar">
                                    <img src="<?= Modules::run('api/image_path_with_default',ACTUAL_COURSE_IMAGE_PATH,(isset($course_detail['courseImage']) && !empty($course_detail['courseImage']) ? $course_detail['courseImage'] : ''),STATIC_FRONT_IMAGE,DEFAULT_COURSE) ?>" alt="image">
                                    <h3 class="course_title"><?=(isset($course_detail['courseTitle']) && !empty($course_detail['courseTitle']) ? $course_detail['courseTitle'] : '')?></h3>
                                    <div class="course-custom-meta">
                                        <ul>
                                            <li>Category : <span><?=(isset($course_detail['courseCategory']) && !empty($course_detail['courseCategory']) ? $course_detail['courseCategory']:'')?></span> </li>
                                            <li>Students : <span><?=(isset($enroled_students['total']) && !empty($enroled_students['total']) ? $enroled_students['total']:'')?> Members</span> </li>
                                            <li>Duration : <span><?=(isset($course_detail['courseDuration']) && !empty($course_detail['courseDuration']) ? $course_detail['courseDuration']:'')?></span> </li>
                                            <li>Trainer : <span><?=(isset($course_detail['courseInstructor']) && !empty($course_detail['courseInstructor']) ? $course_detail['courseInstructor']:'')?></span> </li>
                                        </ul>
                                        <div class="contact-form">
                                            <h3>Let's Contact us</h3>
                                            <form id="contactForm" method="post">
                                                <div class="row"> 
                                                    <div class="col-lg-12 col-md-12"> 
                                                        <div class="form-group">
                                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                                                            <div class="help-block with-errors"></div> 
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12"> 
                                                        <div class="form-group"> 
                                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12"> 
                                                        <div class="form-group">
                                                            <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="subject" id="subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="message" class="form-control" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <button type="button" class="default-btn contact_submit"><i class="fa fa-paper-plane"></i> Send Message</button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- end meta -->
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <div class="course_detail_description">
                                    <!-- <h4>Overview:</h4> -->
                                    <?=(isset($course_detail['courseDescrition']) && !empty($course_detail['courseDescrition']) ? $course_detail['courseDescrition'] : '')?>
                                    <!-- <h4>Course Outline:</h4> -->
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div>
                </div><!-- end container -->
            </div><!-- end section -->
            <!-- end copyrights -->
        </div>
        

        <script type="text/javascript">
            $('.contact_submit').on('click',function(){
                var form_data = $('.contactForm').serialize();
                $.ajax({
                    type:'post',
                    url:'<?=BASE_URL?>contact-submit',
                    data:form_data,
                    success:function(data){
                        if(data.status==true){
                            swal("Success!","Your message has been sent.","success");
                            location.reload();
                        }else{
                            swal("Error!","Some Error Occur While updating Profile, We will fix it soon","error");
                        }
                    }
                });
            });
        </script>
