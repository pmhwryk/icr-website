

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Team</h1>
                    <p>Meet Our experts always ready to help you.</p>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Team Area -->
        <section class="team-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Meet Our experts always ready to help you</h2>
                </div>

                <div class="row">
                    <?php
                    if(isset($team_slide) && !empty($team_slide)) {
                        foreach($team_slide as $team_item){ ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single-team-box wow fadeInUp" data-wow-delay=".2s">
                                    <div class="image">
                                        <img src="<?= Modules::run('api/image_path_with_default',ACTUAL_INSTRUCTOR_IMAGE_PATH,(isset($team_item['image']) && !empty($team_item['image']) ? $team_item['image'] : ''),STATIC_FRONT_IMAGE,DEFAULT_INSTRUCTOR_IMAGE) ?>" alt="<?= ((isset($team_item['name']) && !empty($team_item['name'])) ? $team_item['name'] : '') ?>">
                                        <!-- <ul class="social">
                                            <li><a href="#" target="_blank"><i class="bx bxl-facebook"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="bx bxl-instagram"></i></a></li>
                                        </ul> -->
                                    </div>
                                    <div class="content">
                                        <h3><?= ((isset($team_item['name']) && !empty($team_item['name'])) ? $team_item['name'] : '') ?></h3>
                                        <span><?= ((isset($team_item['designation']) && !empty($team_item['designation'])) ? $team_item['designation'] : '') ?></span>
                                    </div>
                                </div>
                            </div>
                    <?php }
                        } ?>
                </div>
            </div>
        </section>
        <!-- End Team Area -->

        <!-- Start Free Trial Area -->
        <section class="free-trial-area ptb-100 bg-f4f5fe">
            <div class="container">
                <div class="free-trial-content">
                    <h2>Programming is a skill best acquired by practice and example rather than from books.</h2>
                    <p>Nobody ever mastered any skill except through intensive persistent and intelligent practice.</p>
                </div>
            </div>

            <div class="shape10"><img src="<?=STATIC_FRONT_IMAGE?>shape/10.png" alt="shape10"></div>
            <div class="shape11"><img src="<?=STATIC_FRONT_IMAGE?>shape/7.png" alt="shape11"></div>
            <div class="shape12"><img src="<?=STATIC_FRONT_IMAGE?>shape/11.png" alt="shape12"></div>
            <div class="shape13"><img src="<?=STATIC_FRONT_IMAGE?>shape/12.png" alt="shape13"></div>
        </section>
        <!-- End Free Trial Area -->
