        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?=STATIC_FRONT_IMAGE?>demo_01.jpg');">
            </div>
            <div class="page-title section">
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="title-area pull-left">
                            <h2>Edit Profile</h2>
                        </div>
                        <!-- /.pull-right -->
                        <div class="pull-right hidden-xs">
                            <a href="<?=BASE_URL.'portal-dashboard'?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <!-- end clearfix -->
                </div>
            </div>
            
            <div class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="widget-title">
                                <h3>Profile Details</h3>
                                <hr>
                            </div><!-- end title -->
                        </div>
                        <form class="defaultform updateprofile" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="student_id" class="form-control" value="<?=(isset($students['id']) && !empty($students['id']) ? $students['id']:'')?>">
                            <div class="col-lg-4 col-md-12">
                                <div class="space">
                                    <label>Full Name :</label>
                                    <input type="text" name="fullname" class="form-control" value="<?=(isset($students['fullname']) && !empty($students['fullname']) ? $students['fullname']:'')?>" placeholder="Enter your full name">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="space">
                                    <label>Username :</label>
                                    <input type="text" name="username" class="form-control" value="<?=(isset($students['username']) && !empty($students['username']) ? $students['username']:'')?>" placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="space">
                                    <label>Email :</label>
                                    <input type="text" readonly name="email" class="form-control" value="<?=(isset($students['email']) && !empty($students['email']) ? $students['email']:'')?>" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="space">
                                    <label>Phone :</label>
                                    <input type="text" readonly name="text" class="form-control" value="<?=(isset($students['phone']) && !empty($students['phone']) ? $students['phone']:'')?>" placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="space">
                                    <label>Address :</label>
                                    <input type="text" name="address" class="form-control" value="<?=(isset($students['address']) && !empty($students['address']) ? $students['address']:'')?>" placeholder="Enter your address">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="space">
                                    <label>Profile Description :</label>
                                    <textarea class="form-control" name="profile_description"  placeholder="Add your profile description here.."><?=(isset($students['profile_description']) && !empty($students['profile_description']) ? $students['profile_description']:'')?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="space">
                                    <label>Upload Image :</label>
                                    <input type="file" class="dropify" name="profile_img" data-default-file="<?=Modules::run('api/image_path_with_default',ACTUAL_STUDENT_IMAGE_PATH,(isset($students['profile_img']) && !empty($students['profile_img']) ? $students['profile_img'] : ''),'','');?>" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="space clearfix">
                                    <button type="button" class="btn btn-default update-profile-button">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
            <!-- end copyrights -->
        </div>
        
        <script>
            $('.update-profile-button').on('click',function(){
                var form_data = $('.updateprofile').serialize();
                var form = new FormData($('.updateprofile')[0]);
                $.ajax({
                    type:'post',
                    contentType: false,
                    cache: false,
                    processData: false,
                    url:'<?=BASE_URL?>submit-update',
                    data:form,
                    success:function(data){
                        if(data.status==true){
                            swal("Success!","Profile Successfully Updated","success");
                        }else{
                            swal("Error!","Some Error Occur While updating Profile, We will fix it soon","error");
                        }
                    }
                });
            });

            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

            // function image_remover() {
            //     var dropifyElements = {};
            //     $('.dropify').each(function() {
            //         dropifyElements[this.id] = true;
            //     });
            //     var drEvent = $('.dropify').dropify();
                
            //     drEvent.on('dropify.beforeClear', function(event, element) {
            //         var abc = $(this);
            //         id = event.target.id;
            //         if(dropifyElements[id]) {
            //             swal({   
            //                 title: "Are you sure?",   
            //                 text: "You will not be able undo this operation!",   
            //                 type: "warning",   
            //                 showCancelButton: true,   
            //                 confirmButtonColor: "#DD6B55",
            //                 cancelButtonText: "No, cancel!",
            //                 confirmButtonText: "Yes, delete it!",
            //                 closeOnConfirm: false,   
            //                 closeOnCancel: false,
            //                 reverseButtons : true
            //             }).then(function(isConfirm) {
            //                 if (isConfirm.value) {
            //                     var id = abc.parent().parent().attr('id');
            //                     var image = abc.parent().parent().attr('image');
            //                     if(id) {
            //                         $.ajax({
            //                             type: 'POST',
            //                             url: "<?= ADMIN_BASE_URL?>information/delete_image",
            //                             data: {'id': id,image:image},
            //                             async: false,
            //                             success: function(result) {
            //                                 var message= $(result).find('message').text();
            //                                 var status= $(result).find('status').text();
            //                                 abc.parent().parent().attr('id','');
            //                                 abc.parent().parent().attr('image','');
            //                                 element.resetPreview();
            //                                 element.clearElement();
            //                                 swal.close();
            //                                 swal({ title:"Message", text:message, type:status, timer: 2000 });
            //                             }
            //                         });
            //                     }
            //                     else {
            //                         element.resetPreview();
            //                         element.clearElement();
            //                         swal.close();
            //                     }
            //                 } else {    
            //                     swal({ title:"Cancelled", text:"Delete Cancelled :)", type:"error", timer: 2000, });
            //                 } 
            //             });
            //             return false;
            //         }
            //     });
            // }
            // image_remover();
        </script>