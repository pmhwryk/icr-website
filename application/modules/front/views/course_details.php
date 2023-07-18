<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?=$course_detail['courseTitle']?> - Course Detail</h1><br>
            <!-- <h4 class="text-white"></h4> -->
            <p>Drop us Message for any Query</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<section class="course_area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="course_detail_sidebar">
                    <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_COURSE_IMAGE_PATH, (isset($course_detail['courseImage']) && !empty($course_detail['courseImage']) ? $course_detail['courseImage'] : ''), STATIC_FRONT_IMAGE, DEFAULT_COURSE) ?>" alt="image">
                    <h3 class="course_title"><?= (isset($course_detail['courseTitle']) && !empty($course_detail['courseTitle']) ? $course_detail['courseTitle'] : '') ?></h3>
                    <div class="course-custom-meta">
                        <ul>
                            <li>Trainer : <span><?= (isset($course_detail['courseInstructor']) && !empty($course_detail['courseInstructor']) ? $course_detail['courseInstructor'] : '') ?></span> </li>
                            <li>Duration : <span><?= (isset($course_detail['courseDuration']) && !empty($course_detail['courseDuration']) ? $course_detail['courseDuration'] : '') ?></span> </li>
                            <li>Students : <span><?= (isset($enroled_students['total']) && !empty($enroled_students['total']) ? $enroled_students['total'] : '') ?> Members</span> </li>
                        </ul>
                        <div class="contact-form">
                            <h4>Let's Contact us</h4>
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
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="button" class="default-btn contact_submit"><i class='bx bxs-paper-plane'></i>Send Message</button>
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
                    <?= (isset($course_detail['courseDescrition']) && !empty($course_detail['courseDescrition']) ? $course_detail['courseDescrition'] : '') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start detail Area -->

<script type="text/javascript">
    $('.contact_submit').on('click', function() {
        var form_data = $('.contactForm').serialize();
        $.ajax({
            type: 'post',
            url: '<?= BASE_URL ?>contact-submit',
            data: form_data,
            success: function(data) {
                if (data.status == true) {
                    swal("Success!", "Your message has been sent.", "success");
                    location.reload();
                } else {
                    swal("Error!", "Some Error Occur While updating Profile, We will fix it soon", "error");
                }
            }
        });
    });
</script>