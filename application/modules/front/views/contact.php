<script src="<?= STATIC_FRONT_ASSETS ?>js/form-validator.min.js"></script>
<style>
    .redBorderClass {
        border: 1px solid red !important;
    }
    input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type="number"] {
  -moz-appearance: textfield;
}
</style>
<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Contact Us</h1>
            <p>Drop us Message for any Query</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<section class="contact-info-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-info-box">
                    <div class="icon" style="width: 50px; height: 50px; background-color: #f7f7f7; border-radius: 50%; line-height: 1.8; text-align: center; font-size:30px; color: #00B0E8;">
                        <i class='bx bx-map'></i>
                    </div>
                    <h3>Our Address</h3>
                    <p><?= ((isset($general_setting['address']) && !empty($general_setting['address'])) ? $general_setting['address'] : '') ?></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact-info-box">
                    <div class="icon" style="width: 50px; height: 50px; background-color: #f7f7f7; border-radius: 50%; line-height: 1.8; text-align: center; font-size:30px; color: #00B0E8;">
                        <i class='bx bx-phone-call'></i>
                    </div>
                    <h3>Contact</h3>
                    <p>Mobile:
                        <a href="tel:<?= ((isset($general_setting['phone']) && !empty($general_setting['phone'])) ? $general_setting['phone'] : '') ?>"><?= ((isset($general_setting['phone']) && !empty($general_setting['phone'])) ? $general_setting['phone'] : '') ?></a>
                    </p>
                    <p>E-mail: <a href="mailto:<?= ((isset($general_setting['email']) && !empty($general_setting['email'])) ? $general_setting['email'] : '') ?>"><?= ((isset($general_setting['email']) && !empty($general_setting['email'])) ? $general_setting['email'] : '') ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Contact Area -->

<section class="contact-area ptb-100">
    <div class="container">
        <div class="contact-inner">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-image" data-tilt>
                        <img src="<?= STATIC_FRONT_ASSETS ?>img/contact.png" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <h3>Let's Contact us</h3>
                        <form class="defaultform contactForm" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control validatefield" required data-error="Please enter your name" placeholder="Your Name" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input  type="email" name="email" id="email" class="form-control validatefield" required data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                    <input type="number" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control validatefield" placeholder="Your Phone" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="subject" class="form-control validatefield" required data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control validatefield" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="button" class="default-btn contact_submit"><i class='bx bxs-paper-plane'></i>Send Message</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php //echo form_close(); 
                            ?>
                        </form>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                 function validateForm() {
        var isValid = true;
        $('.validatefield').each(function() {
            if ($(this).val() === '') {
                $(this).addClass("redBorderClass");
                isValid = false;
            } else

                $(this).removeClass("redBorderClass");
        });
        return isValid;
    }
                $('.contact_submit').on('click', function() {
                    event.preventDefault();
                    if (validateForm()) {
                        var form_data = $('.contactForm').serialize();

                    $.ajax({
                        type: 'post',
                        url: '<?= BASE_URL ?>contact-submit',
                        data: form_data,
                        success: function(data) {
                            if (data.status == true) {
                                swal("Success!", "Your message has been sent.", "success");
                                $('.contactForm input, .contactForm textarea').val('');
                            } else {
                                swal("Error!", "Some Error Occur While updating Profile, We will fix it soon", "error");
                            }
                        }
                    });
                }
                });
            </script>

            <div class="contact-info">
                <div class="contact-info-content">
                    <h3>Contact us by Phone Number or Email Address</h3>
                    <h2>
                        <a href="tel:<?= ((isset($general_setting['phone']) && !empty($general_setting['phone'])) ? $general_setting['phone'] : '') ?>"><?= ((isset($general_setting['phone']) && !empty($general_setting['phone'])) ? $general_setting['phone'] : '') ?></a>
                        <span>OR</span>
                    </h2>
                    <h3>
                        <a href="mailto:<?= ((isset($general_setting['email']) && !empty($general_setting['email'])) ? $general_setting['email'] : '') ?>"><?= ((isset($general_setting['email']) && !empty($general_setting['email'])) ? $general_setting['email'] : '') ?></a>
                    </h3>
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
    </div>
</section>
<!-- End Contact Area -->