<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Terms and Conditions</h2>
            <p>Before you proceed, read our terms and conditions to unlock the full potential of our service</p>
        </div>
    </div>
</div>
<section class="about-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12" style="text-align:justify;padding-bottom:10px;">
            <p><?= (isset($privacy_data['page_content']) ? $privacy_data['page_content'] : ''); ?>
        </div>
</div></div>
    </section>
    
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

        <div class="shape14"><img src="<?= STATIC_FRONT_IMAGE ?>shape/Frame 2.png" alt="image"></div>
        <div class="shape15"><img src="<?= STATIC_FRONT_IMAGE ?>shape/Frame 3.png" alt="image"></div>
        <div class="shape16"><img src="<?= STATIC_FRONT_IMAGE ?>shape/Frame 4.png" alt="image"></div>
        <div class="shape17"><img src="<?= STATIC_FRONT_IMAGE ?>shape/Frame 5.png" alt="image"></div>
        <div class="shape18"><img src="<?= STATIC_FRONT_IMAGE ?>shape/Frame 6.png" alt="image"></div>
    </div>
</div>
<!-- End Subscribe Area -->