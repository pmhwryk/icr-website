<div class="loading"></div>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              <i class="m-menu__link-icon flaticon-analytics"></i> Home Slides
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a href="<?= ADMIN_BASE_URL ?>home_slider/create" class="btn btn-outline-primary m-btn m-btn--icon m-btn--pill m-btn--air">
                <span>
                  <i class="flaticon-add"></i>
                  <span>
                    Add New Slide
                  </span>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
          <thead>
            <tr>
              <th>
                S.No
              </th>
              <th>
                Title
              </th>
              <th>
                Status
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            if (isset($home_slider)) {
              foreach ($home_slider  as $row) {
                $i++;
                $edit_url = ADMIN_BASE_URL . 'home_slider/create/' . $row['id'];
            ?>
                <tr>
                  <td>
                    <?php echo $i; ?>
                  </td>
                  <td>
                    Login Slider
                  </td>
                  <td class="not-export-col">
                    <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                      <label>
                        <?php
                        $is_verified = (isset($row['is_active']) && !empty($row['is_active']) ? ($row['is_active'] == 1 ? true : false) : false);
                        ?>
                        <input type="checkbox" class="is_active" <?= ($is_verified == true ? 'checked="checked"' : ''); ?> name="" status='<?= $row['is_active'] ?>' rel="<?= $row['id'] ?>">
                        <span></span>
                      </label>
                    </span>
                  </td>
                  <td nowrap="" class="not-export-col">
                    <span class="dropdown">
                      <a href="javascript:void(0);" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                        <i class="la la-ellipsis-h"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
                        <a class="dropdown-item" href="<?= $edit_url ?>"><i class="la la-edit"></i> Edit Details</a>
                        <a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?= $row['id'] ?>"><i class="fa fa-trash-o"></i> Delete</a>
                      </div>
                    </span>
                  </td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
</div>

<script>
  $(document).off('click', '.delete_record').on('click', '.delete_record', function(e) {
    var id = $(this).attr('rel');
    e.preventDefault();
    swal({
      title: "Are you sure to delete the selected Slide?",
      text: "You will not be able to recover this Slide!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: !0,
      closeOnConfirm: false
    }).then(function(e) {
      if (e.value) {
        $.ajax({
          type: 'POST',
          url: "<?= ADMIN_BASE_URL ?>home_slider/delete",
          data: {
            'id': id
          },
          async: false,
          success: function() {
            swal("Deleted!", "Slide has been deleted.", "success");
            location.reload();
          }
        });
        swal("Deleted!", "Slide has been deleted.", "success");
      }
      if ("cancel" === e.dismiss)
        swal("Cancelled", "Slide is safe :)", "error");
    });
  });

  function is_active() {
    $('.is_active').click(function() {
      var abc = $(this);
      var id = abc.attr('rel');
      var status = abc.attr('status')
      swal({
        title: "Are you sure to change the status?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, change Status!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0,
        closeOnConfirm: false
      }).then(function(e) {
        if (e.value) {
          prvious_request = $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>home_slider/change_status_category",
            data: {
              'id': id,
              'status': status
            },
            async: false,
            success: function(result) {
              abc.removeAttr("class");
              abc.attr("onclick", "return false;");
              swal('Status', 'updated successfully', "success");
              setTimeout(function() {
                location.reload();
              }, 2000);
            }
          });
        }
        if ("cancel" === e.dismiss) {
          swal("Cancelled", "Safe Action:)", "error");
          abc.prop("checked", false);
        }
      });
    });
  }
  is_active();
</script>