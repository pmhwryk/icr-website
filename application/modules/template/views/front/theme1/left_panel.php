    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <a class="navbar-brand with-text" href="<?=BASE_URL.'portal-dashboard'?>">
                <img src="<?=Modules::run('api/image_path_with_default',ACTUAL_GENERAL_SETTING_IMAGE_PATH,(isset($general_setting['image']) && !empty($general_setting['image']) ? $general_setting['image'] : ''),STATIC_FRONT_IMAGE,DEFAULT_LOGO);?>" alt="logo" style="max-width:150px; height: auto;">
            </a>
            <ul class="sidebar-nav">
                <li class="<?php if($this->uri->segment(1)=='portal-dashboard'){?>active<?php } ?>"><a href="<?=BASE_URL.'portal-dashboard'?>">Dashboard <span><i class="fa fa-dashboard"></i></span></a></li>
                <li class="<?php if($this->uri->segment(1)=='leaves'){?>active<?php } ?>"><a href="<?=BASE_URL.'leaves'?>">Leaves <span><i class="fa fa-trophy"></i></span></a></li>
                <li class="<?php if($this->uri->segment(1)=='installments'){?>active<?php } ?>"><a href="<?=BASE_URL.'installments'?>">Installments<span><i class="fa fa-comment-o"></i></span></a></li>
                <li class="<?php if($this->uri->segment(1)=='my-profile'){?>active<?php } ?>"><a href="<?=BASE_URL.'my-profile'?>">My Profile <span><i class="fa fa-user"></i></span></a></li>
                <!-- <li class="<?php if($this->uri->segment(1)=='portal-courses'){?>active<?php } ?>"><a href="<?=BASE_URL.'portal-courses'?>">My Courses <span><i class="fa fa-briefcase"></i></span></a></li> -->
                <!-- <li class="<?php if($this->uri->segment(1)=='update-student-profile'){?>active<?php } ?>"><a href="<?=BASE_URL.'update-student-profile'?>">Edit Profile <span><i class="fa fa-edit"></i></span></a></li> -->

                <!-- <li><a href="member-login.html">Login Account <span><i class="fa fa-key"></i></span></a></li> -->
                <!-- <li><a href="member-register.html">Register New Account <span><i class="fa fa-lock"></i></span></a></li> -->
                <!-- <li><a href="forum.html">Visit Forum Topics <span><i class="fa fa-comments-o"></i></span></a></li> -->
                <li><a href="<?=BASE_URL?>logout-from-portal">Logout</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
