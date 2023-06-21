<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Free Opportunities</h2>
            <p>Unlock the door to endless possibilities with our diverse range of opportunities!</p>
        </div>
    </div>
</div>
<section class="services-area bg-right-shape ptb-100">
        <div class="container-fluid">
            <?php 
             $i=0;
            foreach($opportunity as $val){
                if(isset($val['title']) && !empty($val['title']) && isset($val['description']) && !empty($val['description'])){
              ?>
                <?php if($i == 0){ 
                    $i = 1;
                    ?>
   <div style="margin-bottom:25px !important;" class="row align-items-center">
                <div class="services-content it-service-content">
                    <div class="content left-content">
                        <div class="icon">
                            <img src="<?= STATIC_FRONT_ASSETS ?>img/icon1.png" alt="image">
                        </div>
                        <h2><?= ($val['title'] ? $val['title'] : '') ?></h2>
                        <div style="text-align: justify;">
                            <p><?= ($val['description'] ? $val['description'] : '') ?></p>
                        </div>
                        <!-- <a href="#" class="default-btn">
                            <i class="bx bxs-spreadsheet"></i>
                            Learn More
                        </a> -->
                    </div>
                </div>
                <div class="services-image wow fadeInRight" data-wow-delay=".3s">
                    <div class="image">
                    <?php 
						$path = (isset($val['image']) && !empty($val['image']) ? Modules::run('api/image_path_with_default',ACTUAL_OPPORTUNITIES_IMAGE_PATH, $val['image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
						$path = ($path == STATIC_FRONT_IMAGE.DEFAULT_PACKAGES ? '' : $path);
									?>
                        <img src="<?= $path ?>" alt="image">
                    </div>
                </div>
            </div>
              <?php
                }else if($i == 1){
                    $i=0;
                    ?>
 <div  style="margin-bottom:25px !important;" class="row align-items-center">
 <div class="services-image wow fadeInLeft" data-wow-delay=".3s">
                    <div class="image">
                    <?php 
						$path = (isset($val['image']) && !empty($val['image']) ? Modules::run('api/image_path_with_default',ACTUAL_OPPORTUNITIES_IMAGE_PATH, $val['image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES) : '');
						$path = ($path == STATIC_FRONT_IMAGE.DEFAULT_PACKAGES ? '' : $path);
									?>
                        <img src="<?= $path ?>" alt="image">
                    </div>
                </div>
 
                <div class="services-content it-service-content">   
                <div class="content left-content">
                        <div class="icon">
                            <img src="<?= STATIC_FRONT_ASSETS ?>img/icon1.png" alt="image">
                        </div>
                        <h2><?= ($val['title'] ? $val['title'] : '') ?></h2>
                        <div style="text-align: justify;">
                            <p><?= ($val['description'] ? $val['description'] : '') ?></p>
                        </div>
                    </div>
                </div>


            </div>

<?php  
 }

                ?>
            <?php }
        } ?>
        </div>
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

        <div class="shape14"><img src="<?= STATIC_FRONT_IMAGE ?>shape/13.png" alt="image"></div>
        <div class="shape15"><img src="<?= STATIC_FRONT_IMAGE ?>shape/14.png" alt="image"></div>
        <div class="shape16"><img src="<?= STATIC_FRONT_IMAGE ?>shape/15.png" alt="image"></div>
        <div class="shape17"><img src="<?= STATIC_FRONT_IMAGE ?>shape/16.png" alt="image"></div>
        <div class="shape18"><img src="<?= STATIC_FRONT_IMAGE ?>shape/17.png" alt="image"></div>
    </div>
</div>
<!-- End Subscribe Area -->