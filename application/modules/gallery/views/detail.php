<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <table class="table table-striped table-condensed" >
            <tbody>
                <tr>
                    <td>Link:</td>
                    <td><?php if(isset($services['link']) && !empty($services['link'])){echo $services['link'];}else {echo 'NIL';}?></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <img style="max-height: 100px;" src="<?= (isset($services['image']) && !empty($services['image']) ? Modules::run('api/image_path_with_default',ACTUAL_STATISTICS_IMAGE_PATH, $services['image'], STATIC_FRONT_IMAGE, NO_IMAGE) : STATIC_FRONT_IMAGE.NO_IMAGE) ?>"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>