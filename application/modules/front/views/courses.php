<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Courses we offer!</h2>
            <p>The Only Purpose Of 'Customer Service'..Is To Change Feelings.</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Services Area -->
<section class="features-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php if (isset($courses_slide) && !empty($courses_slide)) {
                foreach ($courses_slide as $course_item) { ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="features-box" style="min-height:86%;max-height:86%;overflow: hidden; ">
                            <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_COURSE_ICON_PATH, (isset($course_item['courseIcon']) && !empty($course_item['courseIcon']) ? $course_item['courseIcon'] : ''), STATIC_FRONT_IMAGE, DEFAULT_COURSE_ICON) ?>" class="icon" alt="image">

                            <h3><?= ((isset($course_item['courseTitle']) && !empty($course_item['courseTitle'])) ? $course_item['courseTitle'] : '') ?></h3>

                            <div style="text-align:justify;">
                                <p><?php
                                    if (isset($course_item['courseDescrition']) && !empty($course_item['courseDescrition'])) {
                                        $string = strip_tags($course_item['courseDescrition']);
                                        if (strlen($string) > 150) {
                                            $stringCut = substr($string, 0, 150);
                                            $endPoint = strrpos($stringCut, ' ');
                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= '...';
                                        }
                                        echo $string;
                                    } else {
                                        $string = '';
                                        echo $string;
                                    }
                                    ?></p>
                            </div>
                            <div style="margin-block: 15px;">
                                <?php
                                if (isset($course_item['courseURL']) && !empty($course_item['courseURL'])) {
                                    $course_url = $course_item['courseURL'];
                                } else {
                                    $course_url = '#';
                                }
                                ?>
                                <a href="<?= BASE_URL . 'course/' . $course_url ?>" class="read-more">
                                    Read more
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                            <div class="back-icon">
                                <i class='bx bx-conversation'></i>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>
<!-- End Services Area -->

<!-- Start Video Presentation Area -->
<section class="video-presentation-area ptb-100">
    <div class="container-fluid">
        <div class="section-title">
            <h2>Our amazing features</h2>
        </div>
        <div class="video-box container">
            <section class="features-area pt-100 pb-70 bg-f4f6fc">
                <div class="container-fluid">
                    <div class="row">
                        <?php if (isset($features_slide) && !empty($features_slide)) {
                            foreach ($features_slide as $feature_item) { ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="features-box-one wow fadeInLeft" data-wow-delay=".1s">
                                        <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_FEATURES_IMAGE_PATH, (isset($feature_item['image']) && !empty($feature_item['image']) ? $feature_item['image'] : ''), STATIC_FRONT_IMAGE, DEFAULT_FEATURES_IMAGE) ?>" class="icon" alt="image">
                                        <h3><?= ((isset($feature_item['name']) && !empty($feature_item['name'])) ? $feature_item['name'] : '') ?></h3>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </section>
            <!-- End Features Area -->

            <div class="shape2"><img src="<?= STATIC_FRONT_IMAGE ?>shape/2.png" alt="image"></div>
            <div class="shape3"><img src="<?= STATIC_FRONT_IMAGE ?>shape/3.png" alt="image"></div>
            <div class="shape6"><img src="<?= STATIC_FRONT_IMAGE ?>shape/6.png" alt="image"></div>
        </div>

        <div class="funfacts-inner">
            <div class="row">
                <div class="col-lg-3 col-6 col-sm-3 col-md-3">
                    <div class="single-funfacts">
                        <h3><span class="odometer" data-count="180">00</span><span class="sign-icon">+</span></h3>
                        <p>Students</p>
                    </div>
                </div>

                <div class="col-lg-3 col-6 col-sm-3 col-md-3">
                    <div class="single-funfacts">
                        <h3><span class="odometer" data-count="20">00</span><span class="sign-icon">+</span></h3>
                        <p>Team</p>
                    </div>
                </div>

                <div class="col-lg-3 col-6 col-sm-3 col-md-3">
                    <div class="single-funfacts">
                        <h3><span class="odometer" data-count="15">00</span><span class="sign-icon">+</span></h3>
                        <p>Courses</p>
                    </div>
                </div>

                <div class="col-lg-3 col-6 col-sm-3 col-md-3">
                    <div class="single-funfacts">
                        <h3><span class="odometer" data-count="70">00</span><span class="sign-icon">+</span></h3>
                        <p>Alumni</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-cta-box">
            <h3>Have any question about us?</h3>
            <p>Don't hesitate to contact us.</p>
            <a href="<?= BASE_URL ?>contact-us" class="default-btn">
                <i class="bx bxs-edit-alt"></i> Contact Us
            </a>
        </div>
    </div>

    <div class="shape-map1"><img src="<?= STATIC_FRONT_IMAGE ?>map1.png" alt="image"></div>
    <div class="shape7"><img src="<?= STATIC_FRONT_IMAGE ?>shape/7.png" alt="image"></div>
    <div class="shape8"><img src="<?= STATIC_FRONT_IMAGE ?>shape/8.png" alt="image"></div>
    <div class="shape9"><img src="<?= STATIC_FRONT_IMAGE ?>shape/9.png" alt="image"></div>
</section>
<!-- End Video Presentation Area -->

<!-- Start Subscribe Area -->
<div class="">
    <div class="preloader-area" id="lodevent" style="display: none;background-color: #ff612f63;">
        <div class="spinner">
            <div class="inner">
                <div class="disc"></div>
                <div class="disc"></div>
                <div class="disc"></div>
            </div>
        </div>
    </div>

    <div class="col-5 alert alert-success align-items-center" id="replay" style="display:none;position: absolute;z-index: 100;margin-left: 75px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div id="validator-newsletter" class="form-result"></div>
    </div>

    <div class="subscribe-content border-radius-0" id="hidsection">
        <h2><?= ((isset($general_setting['subscriber_heading']) && !empty($general_setting['subscriber_heading'])) ? $general_setting['subscriber_heading'] : '') ?></h2>
        <form class="newsletter-form" data-toggle="validator">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8">
                    <input type="email" class="input-newsletter" placeholder="example.com" name="EMAIL" required="" autocomplete="off" id='subemail'>
                </div>
                <div class="col-lg-4 col-md-4">
                    <button type="submit" class="disabled" style="pointer-events: all; cursor: pointer;" id='subscribe' onclick="subfun()" data-toggle="alert" data-target="#alert"><i class="bx bxs-hot"></i> Subscribe Now</button>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            function subfun() {
                var email = document.getElementById('subemail').value;
                var subemail = 'email=' + email;
                console.log(subemail);
                var dis = document.getElementById('replay');
                var eventl = document.getElementById('lodevent');
                if (email == "") {
                    $('#replay').show();
                    /*dis.style.display="block";*/
                } else {
                    $.ajax({
                        type: "post",
                        url: 'subscribajax.php',
                        data: subemail,
                        beforeSend() {
                            eventl.style.display = "block";
                        },
                        success: function(repaly) {
                            console.log(repaly);
                            $('#emreplay').html(repaly);
                            $('#validator-newsletter').innerHTML = "success";
                            if (repaly == 1) {
                                eventl.style.display = "none";
                                $('#replay').hide();

                                $('#hidsection').hide();
                                $('.alert').css('margin-bottom', '40px');

                            } else {
                                alert(replay);
                            }
                        }
                    });
                }
            }
        </script>

        <div class="shape14"><img src="<?= STATIC_FRONT_IMAGE ?>shape/13.png" alt="image"></div>
        <div class="shape15"><img src="<?= STATIC_FRONT_IMAGE ?>shape/14.png" alt="image"></div>
        <div class="shape16"><img src="<?= STATIC_FRONT_IMAGE ?>shape/15.png" alt="image"></div>
        <div class="shape17"><img src="<?= STATIC_FRONT_IMAGE ?>shape/16.png" alt="image"></div>
        <div class="shape18"><img src="<?= STATIC_FRONT_IMAGE ?>shape/17.png" alt="image"></div>
    </div>
</div>
<!-- End Subscribe Area -->