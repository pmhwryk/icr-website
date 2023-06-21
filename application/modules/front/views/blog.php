<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1 class="primary-heading">Our Blog</h1>
            <p><?=$meta_tags['short_description']?></p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Services Area -->
<section class="features-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php
            if (isset($services) && !empty($services)) {
                foreach ($services as $pi) :
                    $link = (isset($pi['url']) && !empty($pi['url']) ? BASE_URL . 'blog-detail/' . $pi['url'] : 'javascript:void(0);');
                    $link = str_replace(' ', '-', $link); ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="blog">
                            <div class="f-image-container">
                                <img class="blog-img" src="<?= (isset($pi['image']) && !empty($pi['image']) ? Modules::run('api/image_path_with_default', ACTUAL_BLOG_IMAGE_PATH, $pi['image'], STATIC_FRONT_IMAGE, NO_IMAGE) : STATIC_FRONT_IMAGE . NO_IMAGE) ?>" alt="<?= (isset($pi['alt_image']) && !empty($pi['alt_image']) ? $pi['alt_image'] : '') ?>">
                            </div>
                            <div class="blog-detail">
                                <div class="blog-info"><?= (isset($pi['create_date']) && !empty($pi['create_date']) ? date('d F, Y',strtotime($pi['create_date'])) : '') ?> <span><i class="fa fa-clock"></i></span> <?= rand(1, 60) ?> Mins</div>
                                <h4 class="blog-title"><?= (isset($pi['title']) && !empty($pi['title']) ? Modules::run('api/string_length', $pi['title'], '44', '', '') : '') ?></h4>
                                <p class="blog-description"><?= (isset($pi['short_desc']) && !empty($pi['short_desc']) ? Modules::run('api/string_length', $pi['short_desc'], '110', '', '') : '') ?></p>
                                <a href="<?= $link ?>" class="blog-link">Read Insight</a>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
            } ?>
        </div>
    </div>
</section>
