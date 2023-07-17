<!doctype html>
<html lang="zxx">

<head>
    <?php
    $page_title = (isset($meta_tags['title']) && !empty($meta_tags['title']) ? $meta_tags['title'] : '');
    $page_keyword = (isset($meta_tags['keyword']) && !empty($meta_tags['keyword']) ? $meta_tags['keyword'] : '');
    $page_description = (isset($meta_tags['description']) && !empty($meta_tags['description']) ? $meta_tags['description'] : '');
    $page_url = (isset($meta_tags['page_url']) && !empty($meta_tags['page_url']) ? $meta_tags['page_url'] : 'javascript:void(0);');
    $page_image = (isset($meta_tags['image']) && !empty($meta_tags['image']) ? $meta_tags['image'] : STATIC_FRONT_IMAGE);
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <title>
    <?php 
        if (empty($meta_title)) {
            if (isset($seo_meta_tags['meta_title'])) {
                $meta_title = $seo_meta_tags['meta_title'];
            } else {
                $meta_title = "ICR | IT Centre Rahim Yar Khan";
            }
        }
        
        echo $meta_title;
    ?>
</title>
    <?php 
        if(isset($seo_meta_tags['meta_data_html']) && !empty($seo_meta_tags['meta_data_html']) ){
            foreach($seo_meta_tags['meta_data_html'] as $meta_html){
                //print html meta tags
                echo html_entity_decode($meta_html['meta_tag']."\n&#x09;");
            }
        }
        else{
            // $meta_keywords = $seo_meta_tags['meta_keywords'];
            // $meta_description = $seo_meta_tags['meta_description'];
            if(empty($meta_keywords)){
                $meta_keywords = (isset($seo_meta_tags['meta_keywords']) ? $seo_meta_tags['meta_keywords'] : '');
            }
            if(empty($meta_description)){
                $meta_description = (isset($seo_meta_tags['meta_description'])  ? $seo_meta_tags['meta_description'] : '');
            }
            if(empty($meta_keywords))
                $meta_keywords = 'IT centre, ICR, Software training institute';
            if(empty($meta_description))
                $meta_description ='IT Centre is the top leading IT training institute in RYK. ICR has been providing quality IT education since 2018. More than 500+ students got IT Skills.';
    ?>
    <!-- Page Meta Tags -->
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <meta name="description" content="<?= $meta_description ?>">
    <?php } ?>

    <meta name="author" content="<?= BASE_URL ?>">
    <?php
    $segments = $this->uri->segment_array(); // Get the segments as an array
    $lastSegment = end($segments); // Get the last segment from the array
    $content = ($lastSegment != '') ? $lastSegment : BASE_URL; // Set the appropriate content
    ?>
    <meta property="og:url" content="<?php echo $content ?>">
    <meta property="og:title" content="<?= $meta_title ?>">
    <meta property="og:type" content="Brand">
    <meta property="og:site_name" content="<?= DEFAULT_OUTLET_NAME ?>">
    <meta property="og:description" content="<?= $meta_description!=''?  $meta_description : 'IT Centre is the top leading IT training institute in RYK. ICR has been providing quality IT education since 2018. More than 500+ students got IT Skills.' ?>">
    <meta property="og:image" content="<?= $page_image ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FavIcon -->
    <link rel="icon" type="image/png" href="<?= Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, (isset($general_setting['fav_icon']) && !empty($general_setting['fav_icon']) ? $general_setting['fav_icon'] : ''), STATIC_FRONT_IMAGE, 'favicon.png'); ?>">
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/bootstrap.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/animate.min.css">
    <!-- BoxIcons Min CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/boxicons.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/owl.carousel.min.css">
    <!-- Odometer Min CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/odometer.min.css">
    <!-- MeanMenu CSS -->
    <!-- <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/meanmenu.css"> -->
    <!-- Magnific Popup Min CSS -->
    <!-- <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/magnific-popup.min.css"> -->
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/style.css?v=3">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>css/responsive.css">
    <!-- icon  -->
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= STATIC_FRONT_ASSETS ?>vendor/DataTables/datatables.min.css">
    <!-- jQuery Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/jquery.min.js"></script>
    <!-- Meta Pixel Code -->

    <!-- Start SEO Schema -->
    
<script src="//code.tidio.co/v4jaoozj1dgxz6ryfshbtn7dov2rcjlb.js" async></script>

    <?php 

        function clean($string) {
            $rep = ["'",'"',",","(",")","[","]","/",";"];
            $string = str_replace($rep, '', $string); // Replaces all spaces with hyphens.
            return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
        }
        
        if(isset($course_detail['courseDescrition']) && (!empty($course_detail['courseDescrition'])))
            $courseDescription = substr(strip_tags($course_detail['courseDescrition']), 0, 1000);
        
        elseif(!empty($meta_description))
            $courseDescription = $meta_description;
        else
            $courseDescription = "IT Centre is the top leading IT training institute in RYK. ICR has been providing quality IT education since 2018 More than 500+ students got IT Skills. ICR is established in the region to provide tools & resources to our students for polishing their skills hence making their names in the IT market. Most Reliable Technology Provider in the Region Rahim Yar Khan Pakistan No.1 IT Centre Top of the list in Rahim Yar Khan and the other Major City of Pakistan Lahore. Hello World Technologies offering best services for web development, app development, graphic designing, UI/UX desinging.";

        $courseDescription = clean($courseDescription);
    ?>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
            "openingHours":"Mo,Tu,We,Th,Fr 08:00-20:00"
          },
          "headline": "<?=isset($course_detail['courseTitle'])? $course_detail['courseTitle'] : $meta_title?>",
          "description": "<?=$courseDescription?>",
          "image": "https://www.itcentre.pk/uploads/courses/41c2b6f92-app-dev.webp",
          "url" : "https://www.itcentre.pk",
          "location":{
            "@type" : "GeoCoordinates",
            "latitude" : "28.412129",
            "longitude" : "70.3314437"
          },
          "author": {
            "@type": "Organization",
            "name": "Hello World Technologies ICR IT Center Rahim Yar Khan",
            "url": "https://helloworldtech.com",
            "telephone": "+923028882969"
          },  
          "publisher": {
            "@type": "Organization",
            "name": "ICR IT Center",
            "logo": {
              "@type": "ImageObject",
              "url": "https://www.itcentre.pk/uploads/general_setting/a7f5952912-artboard-10@4x.png"
            }
          },
          "datePublished": "2022-10-31",
          "dateModified": "2022-10-31"
        }
    </script>
    <!-- End SEO Schema -->


    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '331273985567177');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=331273985567177&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2XQV8QGVS5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-2XQV8QGVS5');
    </script>
    <style>
        .pinkBg {
            background-color: #ed184f !important;
            background-image: linear-gradient(90deg, #fd8b55, #fd8b55);
        }

        .intro-banner-vdo-play-btn {
            height: 50px;
            width: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            margin: -30px 0 0 -30px;
            border-radius: 100px;
            z-index: 1
        }

        .intro-banner-vdo-play-btn i {
            color: white;
            line-height: 46px;
            font-size: 20px
        }

        .intro-banner-vdo-play-btn .ripple {
            position: absolute;
            width: 160px;
            height: 160px;
            z-index: -1;
            left: 50%;
            top: 50%;
            opacity: 0;
            margin: -80px 0 0 -80px;
            border-radius: 100px;
            -webkit-animation: ripple 1.8s infinite;
            animation: ripple 1.8s infinite
        }

        @-webkit-keyframes ripple {
            0% {
                opacity: 0.5;
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            100% {
                opacity: 0;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes ripple {
            0% {
                opacity: 0.5;
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            100% {
                opacity: 0;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        .intro-banner-vdo-play-btn .ripple:nth-child(2) {
            animation-delay: .3s;
            -webkit-animation-delay: .3s
        }

        .intro-banner-vdo-play-btn .ripple:nth-child(3) {
            animation-delay: .6s;
            -webkit-animation-delay: .6s
        }

        /* On screens that are 600px or less, set the background color to olive */
        @media screen and (max-width: 600px) {
            .call {
                bottom: 30px !important;
            }
        }

        .pinkBg2 {
            background-color: #25d366 !important;
            background-image: linear-gradient(90deg, #25d366, #25d366);
        }

        .intro-banner-vdo-play-btn2 {
            height: 50px;
            width: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            margin: -30px 0 0 -30px;
            border-radius: 100px;
            z-index: 1
        }

        .intro-banner-vdo-play-btn2 i {
            color: white;
            line-height: 52px;
            font-size: 25px
        }

        .intro-banner-vdo-play-btn2 .ripple {
            position: absolute;
            width: 160px;
            height: 160px;
            z-index: -1;
            left: 50%;
            top: 50%;
            opacity: 0;
            margin: -80px 0 0 -80px;
            border-radius: 100px;
            -webkit-animation: ripple 1.8s infinite;
            animation: ripple 1.8s infinite
        }

        @-webkit-keyframes ripple {
            0% {
                opacity: 0.5;
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            100% {
                opacity: 0;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes ripple {
            0% {
                opacity: 0.5;
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            100% {
                opacity: 0;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        .intro-banner-vdo-play-btn2 .ripple:nth-child(2) {
            animation-delay: .3s;
            -webkit-animation-delay: .3s
        }

        .intro-banner-vdo-play-btn2 .ripple:nth-child(3) {
            animation-delay: .6s;
            -webkit-animation-delay: .6s
        }

        /* On screens that are 600px or less, set the background color to olive */
        @media screen and (max-width: 600px) {
            .call2 {
                bottom: 30px !important;
            }
        }
        .spacle-nav .navbar .navbar-nav .nav-item a{
            margin-left:10px !important;
            margin-right:10px !important;
        }
    </style>
</head>

<body>
    <!-- <div class="preloader-area" style="display: none;background-color: #ff612f63;" id="prelod" >
        <div class="spinner">
            <div class="inner">
                <div class="disc"></div>
                <div class="disc"></div>
                <div class="disc"></div>
            </div>
        </div>
    </div> -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="spacle-responsive-nav">
            <div class="container">
                <div class="spacle-responsive-menu">
                    <div class="logo">
                        <a href="<?= BASE_URL ?>">
                            <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, (isset($general_setting['image']) && !empty($general_setting['image']) ? $general_setting['image'] : ''), STATIC_FRONT_IMAGE, DEFAULT_LOGO); ?>" style="max-width: 250px;" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacle-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= BASE_URL ?>">
                        <img src="<?= Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, (isset($general_setting['image']) && !empty($general_setting['image']) ? $general_setting['image'] : ''), STATIC_FRONT_IMAGE, DEFAULT_LOGO); ?>" style="max-width: 250px;" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul  style="margin-left:13px;font-size:14px;!important " class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>about-us" class="nav-link">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>courses" class="nav-link">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>our-team" class="nav-link">Our Team</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>our-student" class="nav-link">Students</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>success-stories" class="nav-link">Success Stories</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>contact-us" class="nav-link">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>free-opportunities" class="nav-link">Free Opportunities</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?= BASE_URL ?>privacy-policy" class="nav-link">Privacy Policy</a>
                            </li> -->
                            <div class="others-options">
                                <!-- <a href="<?= BASE_URL ?>login" class="default-btn">
                                    <i class="bx bx-log-in"></i>Candidate Login
                                </a> -->
                                <a href="<?= BASE_URL ?>enroll-now" class="default-btn">
                                    <i class="bx bx-log-in"></i> Enroll Now
                                </a>
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- <div class="call" style="position:fixed;z-index:9999;right:120px;bottom:30px">
        <a href="tel:+919033012100" class="intro-banner-vdo-play-btn pinkBg">
            <i class="fa fa-phone whiteText" aria-hidden="true"></i>
            <span class="ripple pinkBg"></span>
        </a>
    </div>
    <div class="call2" style="position:fixed;z-index:9999;right:250px;bottom:30px">
        <a href="https://api.whatsapp.com/send?text=https://qubetatechnolab.com/" class="intro-banner-vdo-play-btn2 pinkBg2" target="_blank">
            <i class="fa fa-whatsapp whiteText" aria-hidden="true"></i>
            <span class="ripple pinkBg2"></span>
        </a>
    </div> -->
    <!-- End Navbar Area -->