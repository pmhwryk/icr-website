<?php if (!empty($page_contents)) { ?>
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2><?php echo $page_title ?></h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Content Area -->
    <section class="pt-100 pb-70">
        <div class="container">
            <?php echo $page_contents; ?>
        </div>
    </section>
    <!-- End Content Area -->
<?php
} else { ?>
    <section class="pt-100 pb-100">
        <div class="container text-center">
            <img src="https://www.mastertoysinc.com/image/catalog/pages/page-404-icon.png">
        </div>
    </section>
<?php } ?>