<style>
    input.larger {
        transform: scale(1.4);
        margin-top: 5px;
        margin-left: 20px;
        margin-right: 20px;
    }
    .m-form .m-form__section.m-form__section--label-align-right .m-form__group>label, .m-form.m-form--label-align-right .m-form__group>label {
    text-align: left;
}
.right{text-align: right;
    float: right;}
    .red_border {
    border: 1px solid red !important;
  }
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <?php
                                if (!isset($update_id) || empty($update_id))
                                    $update_id = 0;
                                ?>
                                <h3 class="m-portlet__head-text">
                                    <i class="fa fa-list"></i>
                                    <?php if (!empty($update_id)) echo "Update";
                                    else echo "Add"; ?>
                                    Create Detail
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <?php
                    $p_id = $this->uri->segment(4);
                    //    echo $p_id;exit;
                    $attributes = array('autocomplete' => 'off', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal', 'method' => 'post', 'id' => 'm_form_1');
                    $hidden = array('update_id' => $update_id, 'p_id' => $p_id);
                    echo form_open_multipart(ADMIN_BASE_URL . 'blog/submit_sub/' . $p_id . '/' . $update_id, $attributes, $hidden);
                    ?>
                    <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label>
									Long Description:
								</label>
								<div class="input-group m-input-group m-input-group--square">
                                <textarea name="long_desc" rows="4" class="summernote  form-control"> <?=(isset($sub['long_desc']) && !empty($sub['long_desc']) ? $sub['long_desc'] : '')?></textarea>
									<!-- <textarea class="ckeditor form-control notrequired" name="long_desc" rows="4"><?=(isset($sub['long_desc']) && !empty($sub['long_desc']) ? $sub['long_desc'] : '')?></textarea> -->
								</div>
							</div>
						</div>



                      
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary submit_button">
                                        Submit
                                    </button>
                                    <a href="<?php echo ADMIN_BASE_URL . 'index_detail'; ?>">
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- <script src="https://cdn.ckeditor.com/4.7.2/basic/ckeditor.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script> 
<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height:400,
//             callbacks: {
//      onImageUpload: function(files, editor, welEditable) {
//       var url= sendFile(files[0], editor, welEditable);
//     }
//   },
//   height: 300,
//   focus: true,

});
// function sendFile(file, editor, welEditable) {
//     data = new FormData();
//     data.append("file", file);
//     console.log(editor);
//     $.ajax({
//       data: data,
//       type: "POST",
//       url: "blog/upload_img",
//       cache: false,
//       contentType: false,
//       processData: false,
//       success: function(url) {
//         editor.insertImage(welEditable, url);
//         console.log(url); //eg:https://server-url/assets/images/a8f15ed.jpg
//       },
//       error: function(jqXHR, stat, err){
//         console.log(stat+':'+err);
//       }
//     }); 
//   }     
            
            
          
        SummernoteDemo.init();

    })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>