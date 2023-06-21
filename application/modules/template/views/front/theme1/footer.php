    <div style="text-align: justify;">
        <!-- Start Footer Area -->
        <footer class="footer-area">
            <div class="divider"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <div class="logo">
                                <a href="<?= BASE_URL ?>"><img src="<?= Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, (isset($general_setting['footer_logo']) && !empty($general_setting['footer_logo']) ? $general_setting['footer_logo'] : ''), STATIC_FRONT_IMAGE, DEFAULT_LOGO); ?>" style="max-width:250px; height: auto;" alt="image"></a>
                            </div>
                            <div style="text-align:justify;">
                                <a href="<?= BASE_URL ?>about-us">
                                    <p><strong><?= ((isset($general_setting['footer_heading']) && !empty($general_setting['footer_heading'])) ? $general_setting['footer_heading'] : '') ?></strong> <br /> <?= ((isset($general_setting['footer_text']) && !empty($general_setting['footer_text'])) ? $general_setting['footer_text'] : '') ?></p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Short Links</h3>
                            <ul class="services-list">
                                <li><a href="<?= BASE_URL ?>">Home</a></li>
                                <li><a href="<?= BASE_URL ?>about-us">About Us</a></li>
                                <li><a href="<?= BASE_URL ?>courses">Courses</a></li>
                                <li><a href="<?= BASE_URL ?>our-team">Our Team</a></li>
                                <li><a href="<?= BASE_URL ?>success-stories">Success Stories</a></li>
                                <li><a href="<?= BASE_URL ?>contact-us">Contact Us</a></li>
                                <li><a href="<?= BASE_URL ?>free-opportunities">Free Opportunities</a></li>
                                <li><a href="<?= BASE_URL ?>privacy-policy">Privacy Policy</a></li>
                                <li><a href="<?= BASE_URL ?>terms-and-conditions">Terms and Conditions</a></li>


                            </ul>
                        </div>
                    </div>

                    <!-- <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Support</h3>
                            <ul class="support-list">
                                <li><a href="#">FAQ's</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div> -->

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Contact Info</h3>
                            <ul class="footer-contact-info">
                                <li>Location: <a href="<?= ((isset($general_setting['map']) && !empty($general_setting['map'])) ? $general_setting['map'] : '') ?>" target="_blank"><?= ((isset($general_setting['address']) && !empty($general_setting['address'])) ? $general_setting['address'] : '') ?></a></li>
                                <li>Email: <a href="mailto:<?= ((isset($general_setting['email']) && !empty($general_setting['email'])) ? $general_setting['email'] : '') ?>"><?= ((isset($general_setting['email']) && !empty($general_setting['email'])) ? $general_setting['email'] : '') ?></a></li>
                                <li>Phone: <a href="tel:<?= ((isset($general_setting['phone']) && !empty($general_setting['phone'])) ? $general_setting['phone'] : '') ?>"><?= ((isset($general_setting['phone']) && !empty($general_setting['phone'])) ? $general_setting['phone'] : '') ?></a></li>
                            </ul>
                            <ul class="social">
                                <?php if (isset($general_setting['facebook']) && !empty($general_setting['facebook'])) { ?>
                                    <li><a href="<?= $general_setting['facebook'] ?>" target="_blank"><i class="bx bxl-facebook"></i></a></li>
                                <?php } ?>
                                <?php if (isset($general_setting['instagram']) && !empty($general_setting['instagram'])) { ?>
                                    <li><a href="<?= $general_setting['instagram'] ?>" target="_blank"><i class="bx bxl-instagram"></i></a></li>
                                <?php } ?>
                                <?php if (isset($general_setting['linkedin']) && !empty($general_setting['linkedin'])) { ?>
                                    <li><a href="<?= $general_setting['linkedin'] ?>" target="_blank"><i class="bx bxl-linkedin"></i></a></li>
                                <?php } ?>
                                <?php if (isset($general_setting['youtube']) && !empty($general_setting['youtube'])) { ?>
                                    <li><a href="<?= $general_setting['youtube'] ?>" target="_blank"><i class="bx bxl-youtube"></i></a></li>
                                <?php } ?>
                                <?php if (isset($general_setting['twitter']) && !empty($general_setting['twitter'])) { ?>
                                    <li><a href="<?= $general_setting['twitter'] ?>" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <!-- <p>A project of <a href="https://hwryk.com">Hello World Technologies</a></p> -->
                    <p>A project of <a href="https://hwryk.com">Hello World Technologies</a>. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>

    <div class="go-top"><i class='bx bx-chevron-up'></i></div>
    <!-- Popper Min JS -->
    <!-- <script src="<?= STATIC_FRONT_ASSETS ?>js/popper.min.js"></script> -->
    <!-- Bootstrap Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/bootstrap.min.js"></script>
    <!-- Magnific Popup Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/jquery.magnific-popup.min.js"></script>
    <!-- Appear Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/jquery.appear.min.js"></script>
    <!-- Odometer Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/odometer.min.js"></script>
    <!-- Owl Carousel Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/owl.carousel.min.js"></script>
    <!-- MeanMenu JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/jquery.meanmenu.js"></script>
    <!-- WOW Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/wow.min.js"></script>
    <!-- Message Conversation JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/conversation.js"></script>
    <!-- AjaxChimp Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/form-validator.min.js"></script>
    <!-- Contact Form Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/contact-form-script.js"></script>
    <!-- Particles Min JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/particles.min.js"></script>
    <script src="<?= STATIC_FRONT_ASSETS ?>js/coustom-particles.js"></script>
    <!-- Main JS -->
    <script src="<?= STATIC_FRONT_ASSETS ?>js/main.js"></script>
    <script src="<?= STATIC_FRONT_ASSETS ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= STATIC_FRONT_ASSETS ?>vendor/select2/dist/js/select2.min.js"></script>
    <script src="<?= STATIC_FRONT_ASSETS ?>vendor/DataTables/datatables.min.js"></script>
    

    </body>

    </html>