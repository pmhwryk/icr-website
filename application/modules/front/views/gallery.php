    <main>
            <!-- page-title-area start -->
            <div class="page-title-area pos-relative  pt-90 pb-60 fix"
                style="background-image: url();">
                <div class="shape-slider">
                    <!--<img class="shape shape-2  " src="<?php echo STATIC_FRONT_IMAGE ?>shape/shape2.png" alt="">-->
                    <!--<img class="shape shape-4 " src="<?php echo STATIC_FRONT_IMAGE ?>shape/shape3.png" alt="">-->
                    <!--<img class="shape shape-5 " src="<?php echo STATIC_FRONT_IMAGE ?>shape/shape-sq.png" alt="">-->
                    <!--<img class="shape shape-6 " src="<?php echo STATIC_FRONT_IMAGE ?>shape/shape-c-2.png" alt="">-->
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="page-title mb-30 text-center">
                                <h3><?php echo $meta_tags['title']?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-title-area end -->

            <!-- portfolio-area -->
            <div class="portfolio-area pt-20 ">
                <div class="container">
                    <div class="row grid text-center">
                        <?php
                        if (isset($gallery) && !empty($gallery))
                            {
                            $counter = 0;
                            foreach ($gallery as $key => $in):
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat4 cat2 mb-30">
                            <div class="xn-portfolio">
                                <div class="xn-portfolio-thumb grad-overlay mb-25">
                                    <img src="<?=(isset($in['image']) && !empty($in['image']) ? Modules::run('api/image_path_with_default', ACTUAL_GALLERY_IMAGE_PATH, $in['image'], STATIC_FRONT_IMAGE, DEFAULT_IMAGE) : STATIC_FRONT_IMAGE . DEFAULT_IMAGE) ?>" alt="<?php echo $in['image']; ?>">
                                    <div class="port-view">
                                        <a class="popup-image" href="<?=(isset($in['image']) && !empty($in['image']) ? Modules::run('api/image_path_with_default', ACTUAL_GALLERY_IMAGE_PATH, $in['image'], STATIC_FRONT_IMAGE, DEFAULT_IMAGE) : STATIC_FRONT_IMAGE . DEFAULT_IMAGE) ?>"><i class="far fa-search"></i></a>
                                        <a class="port-link" href="<?php echo $in['link']; ?>"><i class="far fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="xn-port-content-static">
                                    <h3><?php echo $in['name']; ?></h3>
                                </div>
                            </div>
                        </div>
                         <?php
                        endforeach;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- portfolio-area end -->
            





        </main>