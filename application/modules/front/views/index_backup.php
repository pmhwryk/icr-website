<link type="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<style>
    .post-slide {
        background: #fff;
        margin: 20px 15px 20px;
        border-radius: 15px;
        padding-top: 1px;
        box-shadow: 0px 14px 22px -9px #bbcbd8;
    }

    .post-slide .post-img {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        margin: -12px 15px 8px 15px;
        margin-left: -10px;
    }

    .post-slide .post-img img {
        width: 100%;
        height: auto;
        transform: scale(1, 1);
        transition: transform 0.2s linear;
    }

    .post-slide:hover .post-img img {
        transform: scale(1.1, 1.1);
    }

    .post-slide .over-layer {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        background: linear-gradient(-45deg, rgba(6, 190, 244, 0.75) 0%, rgba(45, 112, 253, 0.6) 100%);
        transition: all 0.50s linear;
    }

    .post-slide:hover .over-layer {
        opacity: 1;
        text-decoration: none;
    }

    .post-slide .over-layer i {
        position: relative;
        top: 45%;
        text-align: center;
        display: block;
        color: #fff;
        font-size: 25px;
    }

    .post-slide .post-content {
        background: #fff;
        padding: 2px 20px 40px;
        border-radius: 15px;
        height: 30%;
    }

    .post-slide .post-title a {
        font-size: 15px;
        font-weight: bold;
        color: #333;
        display: inline-block;
        text-transform: uppercase;
        transition: all 0.3s ease 0s;
    }

    .post-slide .post-title a:hover {
        text-decoration: none;
        color: #3498db;
    }

    .post-slide .post-description {
        line-height: 24px;
        color: #808080;
        margin-bottom: 25px;
    }

    .post-slide .post-date {
        color: #a9a9a9;
        font-size: 14px;
    }

    .post-slide .post-date i {
        font-size: 20px;
        margin-right: 8px;
        color: #CFDACE;
    }

    .post-slide .read-more {
        padding: 7px 20px;
        float: right;
        font-size: 12px;
        background: #2196F3;
        color: #ffffff;
        box-shadow: 0px 10px 20px -10px #1376c5;
        border-radius: 25px;
        text-transform: uppercase;
    }

    .post-slide .read-more:hover {
        background: #3498db;
        text-decoration: none;
        color: #fff;
    }

    .owl-controls .owl-buttons {
        text-align: center;
        margin-top: 20px;
    }

    .owl-controls .owl-buttons .owl-prev {
        background: #fff;
        position: absolute;
        top: -13%;
        left: 15px;
        padding: 0 18px 0 15px;
        border-radius: 50px;
        box-shadow: 3px 14px 25px -10px #92b4d0;
        transition: background 0.5s ease 0s;
    }

    .owl-controls .owl-buttons .owl-next {
        background: #fff;
        position: absolute;
        top: -13%;
        right: 15px;
        padding: 0 15px 0 18px;
        border-radius: 50px;
        box-shadow: -3px 14px 25px -10px #92b4d0;
        transition: background 0.5s ease 0s;
    }

    .owl-controls .owl-buttons .owl-prev:after,
    .owl-controls .owl-buttons .owl-next:after {
        content: "\f104";
        font-family: FontAwesome;
        color: #333;
        font-size: 30px;
    }

    .owl-controls .owl-buttons .owl-next:after {
        content: "\f105";
    }

    @media only screen and (max-width:1280px) {
        .post-slide .post-content {
            padding: 0px 15px 25px 15px;
        }
    }
</style>
<!-- Start Main Banner Area -->
<div class="main-banner main-banner-one">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="main-banner-content">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="content">
                                <h1>
                                    <?= ((isset($general_setting['home_heading']) && !empty($general_setting['home_heading'])) ? $general_setting['home_heading'] : '') ?>
                                </h1>
                                <!-- <div class="default-btn" style="margin-top:15px;">
                                        <a href="<?= BASE_URL ?>enroll-now" style="color: white!important;">
                                            <i class="bx bxs-spreadsheet"></i> 
                                            Enroll Now
                                        </a>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <!-- <img class="banner-image" src="<?= Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, (isset($general_setting['home_image']) && !empty($general_setting['home_image']) ? $general_setting['home_image'] : ''), STATIC_FRONT_IMAGE, DEFAULT_IMAGE) ?>" alt="image"> -->
                <div class="home-slider owl-carousel owl-theme">
                    <?php foreach ($home_slides as $slide) {
                        if (isset($slide['image']) && !empty($slide['image'])) {
                            ?>
                            <img class="banner-image"
                                src="<?= Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, (isset($slide['image']) && !empty($slide['image']) ? $slide['image'] : ''), STATIC_FRONT_IMAGE, DEFAULT_IMAGE) ?>"
                                alt="<?= (isset($slide['alt_text']) && !empty($slide['alt_text'])) ? $slide['alt_text'] : ''; ?>">
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="shape20"><img src="<?= STATIC_FRONT_IMAGE ?>shape/19.png" alt="image"></div>
    <div class="shape21"><img src="<?= STATIC_FRONT_IMAGE ?>shape/20.png" alt="image"></div>
    <div class="shape19"><img src="<?= STATIC_FRONT_IMAGE ?>shape/18.png" alt="image"></div>
    <div class="shape22"><img src="<?= STATIC_FRONT_IMAGE ?>shape/21.png" alt="image"></div>
    <div class="shape23"><img src="<?= STATIC_FRONT_IMAGE ?>shape/22.svg" alt="image"></div>
    <div class="shape24"><img src="<?= STATIC_FRONT_IMAGE ?>shape/23.png" alt="image"></div>
    <div class="shape26"><img src="<?= STATIC_FRONT_IMAGE ?>shape/25.png" alt="image"></div>
</div>
<!-- End Main Banner Area -->

<!-- abouts -->
<section class="about-area pt-100">
    <div class="container">
        <div class="section-title">
            <h2>Get to know about <span>IT Centre Rahim Yar Khan</span></h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12" style="text-align: justify;">
                <p><strong>
                        <?= ((isset($general_setting['about_heading']) && !empty($general_setting['about_heading'])) ? $general_setting['about_heading'] : '') ?>
                    </strong><br />
                    <?= ((isset($general_setting['about_short']) && !empty($general_setting['about_short'])) ? $general_setting['about_short'] : '') ?>
                </p>
                <div class="default-btn" style="margin-top:15px;">
                    <a href="<?= BASE_URL ?>about-us" style="color: white!important;">
                        <i class="bx bxs-spreadsheet"></i>
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end abouts -->

<!-- Start Services Area -->
<section class="features-area pt-100">
    <div class="container">
        <div class="section-title">
            <h2>Courses we Offer!</h2>
        </div>
        <div class="row">
            <?php if (isset($courses_slide) && !empty($courses_slide)) {
                foreach ($courses_slide as $course_item) {
                    ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="features-box" style="min-height:86%;max-height:86%;overflow: hidden; ">
                            <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_COURSE_ICON_PATH, (isset($course_item['courseIcon']) && !empty($course_item['courseIcon']) ? $course_item['courseIcon'] : ''), STATIC_FRONT_IMAGE, DEFAULT_COURSE_ICON) ?>"
                                class="icon" alt="image">
                            <h3>
                                <?= ((isset($course_item['courseTitle']) && !empty($course_item['courseTitle'])) ? $course_item['courseTitle'] : '') ?>
                            </h3>
                            <div style="text-align:justify;">
                                <p>
                                    <?php
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
                                    ?>
                                </p>
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
        <div class="others-options" style="text-align:right;">
            <a href="<?= BASE_URL ?>courses" class="default-btn">
                <i class="bx bxs-hot"></i>View more<span></span>
            </a>
        </div>
    </div>
</section>

<!-- web development -->
<section class="services-area bg-right-shape ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="services-content it-service-content">
                <div class="content left-content">
                <div class="icon">
                        <img src="http://localhost/icr-website/static/front/theme1/assets/img/icon1.png" alt="image">
                    </div>
                    <h2>ICR - Place of Knowledge</h2>
                    <div style="text-align: justify;">
                        <p>ICR is providing a positive and healthy work environment to promote employees' safety,
                            growth, and goal attainment.</p>
                        <p>The more you work with determinant people, the more success is guaranteed.</p>
                    </div>
                    <!-- <a href="#" class="default-btn">
                            <i class="bx bxs-spreadsheet"></i>
                            Learn More
                        </a> -->
                </div>
            </div>
            <div class="services-image wow fadeInRight" data-wow-delay=".3s">
                <div class="image">
                    <img src="<?= STATIC_FRONT_ASSETS ?>img/img6.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Area -->

<!-- Start Features Area -->
<section class="features-area ptb-100 bg-f4f6fc">
    <div class="container">
        <div class="section-title">
            <h2>
                <?= ((isset($general_setting['feature_heading']) && !empty($general_setting['feature_heading'])) ? $general_setting['feature_heading'] : '') ?>
            </h2>
        </div>
        <div class="row">
            <?php if (isset($features_slide) && !empty($features_slide)) {
                foreach ($features_slide as $feature_item) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="features-box-one wow fadeInLeft" data-wow-delay=".1s" style="text-align: justify;">
                            <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_FEATURES_IMAGE_PATH, (isset($feature_item['image']) && !empty($feature_item['image']) ? $feature_item['image'] : ''), STATIC_FRONT_IMAGE, DEFAULT_FEATURES_IMAGE) ?>"
                                class="icon" alt="image">
                            <h3>
                                <?= ((isset($feature_item['name']) && !empty($feature_item['name'])) ? $feature_item['name'] : '') ?>
                            </h3>
                            <p>
                                <?= ((isset($feature_item['description']) && !empty($feature_item['description'])) ? $feature_item['description'] : '') ?>
                            </p>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>
<!-- End Features Area -->

<section class="our-loving-clients pt-100">
    <div class="container">
        <div class="section-title">
            <h2>
                <?= ((isset($general_setting['platform_heading']) && !empty($general_setting['platform_heading'])) ? $general_setting['platform_heading'] : '') ?>
            </h2>
        </div>
        <div class="clients-logo-list align-items-center" style="overflow: hidden;height: 280px;" id='client'>
            <div class="col-lg-3 col-md-6">
                <div class="features-box-one wow fadeInLeft" data-wow-delay=".1s" style="padding:30px">
                    <a href="https://www.freelancer.com/">
                        <img src="<?= STATIC_FRONT_ASSETS ?>img/platforms/freelancer_platform-1.png" alt="image"
                            style=" max-width: 100%;height: 50px;" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="features-box-one wow fadeInLeft" data-wow-delay=".1s" style="padding:30px">
                    <a href="https://www.upwork.com/">
                        <img src="<?= STATIC_FRONT_ASSETS ?>img/platforms/freelancer_platform-2.png" alt="image"
                            style=" max-width: 100%;height: 50px;" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="features-box-one wow fadeInLeft" data-wow-delay=".1s" style="padding:30px">
                    <a href="https://www.fiverr.com/">
                        <img src="<?= STATIC_FRONT_ASSETS ?>img/platforms/freelancer_platform-3.png" alt="image"
                            style=" max-width: 100%;height: 50px;" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="features-box-one wow fadeInLeft" data-wow-delay=".1s" style="padding:30px">
                    <a href="https://www.peopleperhour.com/">
                        <img src="<?= STATIC_FRONT_ASSETS ?>img/platforms/freelancer_platform-4.png" alt="image"
                            style=" max-width: 100%;height: 50px;" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Loving Clients Area -->

<!-- Enrolled Students -->
<!-- <section class="our-loving-clients pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <h2>
                    OUR Enrolled Students
                </h2>
            </div>
            <?php if ($enrolledStudents) { ?>
                <div class="container-fluid">
                    <div class="row" style="text-align: center">
                        <div class="col-md-12">
                            <div class="partner-slides owl-carousel owl-theme">
                                <?php foreach ($enrolledStudents as $key => $val) { ?>
                                    <div class="post-slide">
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="#"><?php echo $val['name'] ?></a>
                                            </h3>
                                            <p class="post-description">Lecture Timing: <?php echo $val['timing'] ?></p>
                                            <span class="post-date"><i class="fa fa-clock-o"></i><?php echo $val['created_date'] ?></span>
                                            <span>
                                                <a href="#" class="read-more">Application Status: ACCEPTED</a>
                                            </span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </section> -->

<!-- Start Subscribe Content -->
<div class="preloader-area" id="lodevent" style="display: none;background-color: #ff612f63;">
    <div class="spinner">
        <div class="inner">
            <div class="disc"></div>
            <div class="disc"></div>
            <div class="disc"></div>
        </div>
    </div>
</div>

<div class="col-5 alert alert-success align-items-center" id="replay"
    style="display:none;position: absolute;z-index: 100;margin-left: 75px;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div id="validator-newsletter" class="form-result"></div>
</div>
<div class="subscribe-content border-radius-0" id="hidsection">
    <h2>
        <?= ((isset($general_setting['subscriber_heading']) && !empty($general_setting['subscriber_heading'])) ? $general_setting['subscriber_heading'] : '') ?>
    </h2>
    <form class="newsletter-form" data-toggle="validator">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8">
                <input type="email" class="input-newsletter" placeholder="example.com" name="EMAIL" required=""
                    autocomplete="off" id='subemail'>
            </div>

            <div class="col-lg-4 col-md-4">
                <button type="submit" class="disabled" style="pointer-events: all; cursor: pointer;" id='subscribe'
                    onclick="subfun()" data-toggle="alert" data-target="#alert"><i class="bx bxs-hot"></i> Subscribe
                    Now</button>
            </div>

            <div class="col-lg-12 col-md-12">

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
                    success: function (repaly) {
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
    <script>
        $(document).ready(function () {
            $("#news-slider").owlCarousel({
                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigation: true,
                navigationText: ["", ""],
                pagination: true,
                autoPlay: true
            });
        });
    </script>
    <div class="shape14"><img src="<?= STATIC_FRONT_IMAGE ?>shape/13.png" alt="image"></div>
    <div class="shape15"><img src="<?= STATIC_FRONT_IMAGE ?>shape/14.png" alt="image"></div>
    <div class="shape16"><img src="<?= STATIC_FRONT_IMAGE ?>shape/15.png" alt="image"></div>
    <div class="shape17"><img src="<?= STATIC_FRONT_IMAGE ?>shape/16.png" alt="image"></div>
    <div class="shape18"><img src="<?= STATIC_FRONT_IMAGE ?>shape/17.png" alt="image"></div>
</div>
<!-- End Subscribe Content -->