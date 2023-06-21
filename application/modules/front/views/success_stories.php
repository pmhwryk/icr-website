<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Success Stories</h2>
            <p>Providing Internship opportunities Changes The Whole Equation.</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Testimonials Area -->
<section class="testimonials-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>Our Shining <span>Stars</span></h2>
            <p>Congratulations! to our Shining Stars. You are so pretty and always shining like the diamonds in the stars.</p>
        </div>
        <div class="testimonials-slides owl-carousel owl-theme">
            <?php
            if (isset($shining_stories)) {
                foreach ($shining_stories as $row) {
            ?>
                    <!-- <div class="single-testimonials-item"> -->
                        <!-- <div class="client-info"> -->
                            <img src="<?= Modules::run('api/image_path_with_default', SUCCESS_STORIES_IMAGE_PATH, $row['image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES); ?>" alt="">
                            <!-- <h3><?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : "") ?></h3> -->
                            <!-- <span><?= (isset($row['job_title']) && !empty($row['job_title']) ? $row['job_title'] : "") ?></span> -->
                        <!-- </div> -->
                        <!-- <div class="testimonials-desc">
                        <p><?= (isset($row['description']) && !empty($row['description']) ? $row['description'] : "") ?></p>
                        </div> -->
                    <!-- </div> -->
            <?php }
            } ?>
        </div>
    </div>
    <!-- <div class="container">
        <div class="section-title">
            <h2>Our Rising <span>Stars</span></h2>
            <p>Congratulations! to our Rising Stars. You are so pretty and always shining like the diamonds in the stars.</p>
        </div>
        <div class="success-stories-slides owl-carousel owl-theme">
            <?php
            if (isset($rising_stories)) {
                foreach ($rising_stories as $row) {
            ?>
                    <div class="single-testimonials-item">
                        <div class="client-info">
                            <img src="<?= Modules::run('api/image_path_with_default', SUCCESS_STORIES_IMAGE_PATH, $row['image'], STATIC_FRONT_IMAGE, DEFAULT_PACKAGES); ?>" alt="">
                            <h3><?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : "") ?></h3>
                            <span><?= (isset($row['job_title']) && !empty($row['job_title']) ? $row['job_title'] : "") ?></span>
                            <p><?= (isset($row['description']) && !empty($row['description']) ? $row['description'] : "") ?></p>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div> -->
</section>
<!-- End Testimonials Area -->

<!-- Start Free Trial Area -->
<section class="free-trial-area ptb-100 bg-f4f5fe">
    <div class="container">
        <div class="free-trial-content">
            <h2>Without Knowledge, Skill cannot be focused. Without Skill, Strength cannot be brought to bear and without Strength, Knowledge may not be applied.</h2>
            <p>Growth occurs when individuals confront problems, struggle to master them, and through that struggle develop new aspects of their skills, capacities, views about life.</p>
        </div>
    </div>

    <div class="shape10"><img src="<?= STATIC_FRONT_ASSETS ?>img/shape/10.png" alt="image"></div>
    <div class="shape11"><img src="<?= STATIC_FRONT_ASSETS ?>img/shape/7.png" alt="image"></div>
    <div class="shape12"><img src="<?= STATIC_FRONT_ASSETS ?>img/shape/11.png" alt="image"></div>
    <div class="shape13"><img src="<?= STATIC_FRONT_ASSETS ?>img/shape/12.png" alt="image"></div>
</section>
<!-- End Free Trial Area -->