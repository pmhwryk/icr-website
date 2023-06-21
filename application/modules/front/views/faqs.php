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
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-title-area end -->

            <!-- faq-area -->
            <section class="inner-faq-area  pb-125">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="section-title inner-faq-title mb-70">
                                <h2><?php echo $general['faqs_heading']; ?></h2>
                                <p><?php echo $general['faqs_desc']; ?></p>
                            </div>
                            <div class="faq-wrapper inner-faq-wrapper pb-130">
                                <h3><i class="fal fa-cube"></i> <?php echo $general['faqs_subhead']; ?></h3>
                                <div class="accordion" id="accordionExample">
                                       <?php
                                if (isset($faqs) && !empty($faqs))
                                    {
                                    foreach ($faqs as $key=> $fa):
            
                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?php echo $key; ?>">
                                            <h5 class="mb-0">
                                                <a href="#" class="btn-link <?php if($key!="0") echo "collapsed"; ?>" data-toggle="collapse" data-target="#collapse<?php echo $key; ?>"
                                                    aria-expanded="<?php if($key=="0") echo "true"; else echo "false"; ?>" aria-controls="collapse<?php echo $key; ?>">
                                                    <?php echo $fa['name']; ?>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse<?php echo $key; ?>" class="collapse  <?php if($key=="0") echo "show"; ?>" aria-labelledby="heading<?php echo $key; ?>"
                                            data-parent="#accordionExample">
                                            <div class="card-body"><?php echo $fa['description']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- faq-area-end -->
      

        </main>