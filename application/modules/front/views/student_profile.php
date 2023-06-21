
        <!-- Sidebar -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?=STATIC_FRONT_IMAGE?>demo_01.jpg');">
                
                <!-- end page-title -->
            </div>
            <div class="page-title section">
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="title-area pull-left">
                            <h2>My Account</h2>
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
                        <div class="col-md-8 col-sm-12">
                            <div class="about-widget clearfix">
                                <div class="widget-title">
                                    <h3>Students Information</h3>
                                    <hr>
                                </div><!-- end title -->
                                <div class="row">
                                    <div class="col-md-2 col-sm-12">
                                        <div class="team-member-img text-center">
                                            <img src="<?= Modules::run('api/image_path_with_default',ACTUAL_STUDENT_IMAGE_PATH,(isset($students['profile_img']) && !empty($students['profile_img']) ? $students['profile_img'] : ''),STATIC_FRONT_IMAGE,DEFAULT_STUDENT) ?>" alt="" class="img-responsive">
                                            <br>
                                            <a href="<?=BASE_URL.'update-student-profile'?>" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit Profile</a>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-md-10 col-sm-12">
                                        <div class="team-member-name">
                                            <p><?=(isset($students['fullname']) && !empty($students['fullname']) ? $students['fullname']:'')?></p>
                                            <span><?=(isset($students['title']) && !empty($students['title']) ? $students['title']:'')?></span>
                                        </div>
                                        <div class="data-head">
                                            <h6 class="overline-title">Basics</h6>
                                        </div>
                                        <?php // print_r($students); ?>
                                        <div class="data-item">
                                            <div class="col-md-6 col-sm-12">
                                                <span>Full Name</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span><?=(isset($students['fullname']) && !empty($students['fullname']) ? $students['fullname']:'')?></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="col-md-6 col-sm-12">
                                                <span>Email</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span><?=(isset($students['email']) && !empty($students['email']) ? $students['email']:'')?></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="col-md-6 col-sm-12">
                                                <span>Phone</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span><?=(isset($students['phone']) && !empty($students['phone']) ? $students['phone']:'')?></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="col-md-6 col-sm-12">
                                                <span>Date of Birth</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span><?=(isset($students['dob']) && !empty($students['dob']) ? date("d-m-Y", strtotime($students['dob'])) :'')?></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="col-md-6 col-sm-12">
                                                <span>Address</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span><?=(isset($students['address']) && !empty($students['address']) ? $students['address']:'')?></span>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="widget-title">
                                            <h3>My Achievements</h3>
                                            <hr>
                                        </div>
                                        <ul class="customlist">
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_01.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_02.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_03.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_04.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_05.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_06.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_07.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_08.png" alt="" class="img-responsive"></li>
                                            <li><img src="<?=STATIC_FRONT_IMAGE?>/icons/award_09.png" alt="" class="img-responsive"></li>
                                        </ul> -->
                                    </div>
                                </div><!-- end row -->      
                            </div><!-- end widget -->
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-12 m30">
                            <div class="about-widget clearfix">
                                <div class="widget-title">
                                    <h3>Course Details</h3>
                                    <hr>
                                </div><!-- end title -->
                                <?php
                                    if(isset($students['course_id']) && !empty($students['course_id'])){
                                        $course_id = Modules::run('front/encryption_decryption',$students['course_id'],false);
                                    }else{
                                        $course_id = '#';
                                    }
                                ?>
                                <div class="course_detail_sidebar">
                                    <img src="<?= Modules::run('api/image_path_with_default',ACTUAL_COURSE_IMAGE_PATH,(isset($students['image']) && !empty($students['image']) ? $students['image'] : ''),STATIC_FRONT_IMAGE,DEFAULT_STUDENT) ?>" alt="" class="img-responsive" width="100%">

                                    <h3 class="course_title"><a href="<?=BASE_URL.'portal-course-details/'.$course_id?>"><?=(isset($students['title']) && !empty($students['title']) ? $students['title'] : '')?></a></h3>
                                    <div class="course-custom-meta">
                                        <ul>
                                            <li>Course Enrollment Date : <span><?=(isset($students['course_enroll_date']) && !empty($students['course_enroll_date']) ? date("d-m-Y", strtotime($students['course_enroll_date'])) : '')?></span> </li>
                                            <li>Course End Date : <span><?=(isset($students['course_end_date']) && !empty($students['course_end_date']) ? date("d-m-Y", strtotime($students['course_end_date'])) : '')?></span> </li>
                                            <li>Duration : <span><?=(isset($students['duration']) && !empty($students['duration']) ? $students['duration'] : '')?></span> </li>
                                            <li>Trainer : <span><?=(isset($students['name']) && !empty($students['name']) ? $students['name'] : '')?></span> </li>
                                        </ul>
                                    </div><!-- end meta -->
                                </div>
                            </div><!-- end about-widget -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <!-- <div class="section lb">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="register-widget clearfix">
                                <div class="widget-title">
                                    <h3>My Freelancing Profiles</h3>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
<script>
$(document).ready(function(){
    var form_id ='<?=$course_id?>';
})
</script>