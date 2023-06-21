<table class="table table-striped table-bordered table-hover" id="sample_1">
    <thead>
        <tr>
        <th>Station</th>
        <th>Role</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        if (isset($outlet_roles) && !empty($outlet_roles)) { foreach ($outlet_roles->result() as $row) { $i++; ?>
            <tr id="Row_<?=$row->id ?>" class="odd gradeX">
                <td class="word_wrap "><?php echo $row->outlet_name ?></td>
                <td class="word_wrap "><?php echo $row->role_name ?></td>
                <td nowrap="nowrap">
                <?php
                echo anchor('javascript:;', '<i class="fa fa-edit"></i>', array('class' => 'action_edit btn blue c-btn', 'rel'=> $row->id, 'emp_id'=> $row->emp_id, 'outlet_id'=> $row->outlet_id, 'title' => 'Edit Record'));echo "&nbsp;";
                echo anchor('javascript:;', '<i class="fa fa-times"></i>', array('class' => 'action_delete btn red c-btn', 'rel' => $row->id, 'title' => 'Delete Record'));
                ?>
                </td>
            </tr> 
		<?php } } ?>
    </tbody>
</table>

<script>
$(document).ready(function() {
 oTable = $('#sample_1').dataTable({
                    "aLengthMenu": [[5, 10, 25, 50, 100, 200, -1], [5, 10, 25, 50, 100, 200, "All"]],
                    "iDisplayLength": 10,
                    "aoColumns": [
						{"bSortable": false},
						{"bSortable": false},
						{"bSortable": false},
                    ]
                });
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
</script>