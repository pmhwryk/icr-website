<h4 class="form-section">Image</h4>
<div class="col-md-6 col-md-offset-6">
    <div class="col-md-12">
        <div class="form-group last">
            
            <div class="col-md-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="<?=(isset($detail['image']) && !empty($detail['image']) ? Modules::run('api/image_path_with_default',ACTUAL_WEBPAGES_IMAGE_PATH,$detail['image'],STATIC_FRONT_IMAGE,DEFAULT_WEBPAGES) : STATIC_FRONT_IMAGE.DEFAULT_WEBPAGES);?>" alt=""/>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <h4 class="form-section">Image</h4>
    <?php
        $item_img = BASE_URL.'/uploads/webpages/actual_images/'.$detail['image'];
    ?>
    <img src="<?= $item_img ?>" style="height:227px"/>
 -->

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Title:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['page_title']) && !empty($detail['page_title']) ? $detail['page_title'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>URL Slug:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['url_slug']) && !empty($detail['url_slug']) ? $detail['url_slug'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Rank:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['page_rank']) && !empty($detail['page_rank']) ? $detail['page_rank'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Meta Title:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['meta_title']) && !empty($detail['meta_title']) ? $detail['meta_title'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4"><b>Meta Keywords:</b></label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['meta_keywords']) && !empty($detail['meta_keywords']) ? $detail['meta_keywords'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Meta Description:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['meta_description']) && !empty($detail['meta_description']) ? $detail['meta_description'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Short Description:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($detail['short_desc']) && !empty($detail['short_desc']) ? $detail['short_desc'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label col-md-12"><b>Page Contents:</b></label>
            <div class="form-group m-form__group m--margin-top-10">
                <div class="alert m-alert m-alert--default" role="alert">
                    <?php 
                        echo (isset($detail['page_content']) && !empty($detail['page_content']) ? $detail['page_content'] : '');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>