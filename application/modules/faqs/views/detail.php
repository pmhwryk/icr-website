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
                    <td>Page Rank:</td>
                    <td>
                        <?=(isset($services['page_rank']) && !empty($services['page_rank']) ? $services['page_rank'] : 0)?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>