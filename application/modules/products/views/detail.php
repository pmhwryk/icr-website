<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <table class="table table-striped table-condensed" >
            <tbody>
                <tr>
                    <td>Title:</td>
                    <td><?php if(isset($services['name']) && !empty($services['name'])){echo $services['name'];}else {echo 'NIL';}?></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><?php if(isset($services['description']) && !empty($services['description'])){echo $services['description'];}else {echo 'NIL';}?></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <img style="max-height: 100px;" src="<?= (isset($services['image']) && !empty($services['image']) ? Modules::run('api/image_path_with_default',ACTUAL_products_IMAGE_PATH, $services['image'], STATIC_FRONT_IMAGE, NO_IMAGE) : STATIC_FRONT_IMAGE.NO_IMAGE) ?>"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>