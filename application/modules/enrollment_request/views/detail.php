<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <table class="table table-striped table-condensed" >
            <tbody>
                <tr>
                    <td>Student Name:</td>
                    <td><?=(isset($query['name']) && !empty($query['name']) ? $query['name'] : '')?></td>
                </tr>
                <tr>
                    <td>Phone No:</td>
                    <td>
                    <?=(isset($query['phone_number']) && !empty($query['phone_number']) ? $query['phone_number'] : '')?>
                    </td>
                </tr>
               
            
                <tr>
                    <td>Student Timings:</td>
                    <td>
                    <?=(isset($query['timing']) && !empty($query['timing']) ? $query['timing'] : 'NILL')?>
                    </td>
                </tr>
                <tr>
                    <td>Universty:</td>
                    <td>
                    <?=(isset($query['university']) && !empty($query['university']) ? $query['university'] : '')?>
                    </td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td>
                    <?=(isset($query['department']) && !empty($query['department']) ? $query['department'] : 'NILL')?>
                    </td>
                </tr>
                <tr>
                    <td>Semester:</td>
                    <td>
                    <?=(isset($query['semester']) && !empty($query['semester']) ? $query['semester'] : 'NILL')?>
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                    <?=(isset($query['address']) && !empty($query['address']) ? $query['address'] : 'NILL')?>
                    </td>
                </tr>
                <tr>
                    <td>Career Plane:</td>
                    <td>
                    <?=(isset($query['careerplan']) && !empty($query['careerplan']) ? $query['careerplan'] : 'NILL')?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>