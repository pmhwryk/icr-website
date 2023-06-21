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
                    <td><?php if(isset($services['short_desc']) && !empty($services['short_desc'])){echo $services['short_desc'];}else {echo 'NILL';}?></td>
                </tr>
                <td>Users:</td>
                    <td><?php if(isset($services['users']) && !empty($services['users'])){echo $services['users'];}else {echo 'NILL';}?></td>
                </tr>
                <td>Size:</td>
                    <td><?php if(isset($services['size']) && !empty($services['size'])){echo $services['size'];}else {echo 'NILL';}?></td>
                </tr>
                <td>Prices:</td>
                    <td><?php if(isset($services['price']) && !empty($services['price'])){echo $services['price'];}else {echo 'NILL';}?></td>
                </tr>
                <td>Duration:</td>
                    <td><?php if(isset($services['duration']) && !empty($services['duration'])){echo $services['duration'];}else {echo 'NILL';}?></td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>