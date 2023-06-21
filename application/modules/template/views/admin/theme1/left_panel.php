<?php
$curr_url = $this->uri->segment(2);
$secon_curr_url = $this->uri->segment(3);
$active = "active";
$outlet_id = DEFAULT_OUTLET;
if (defined('DEFAULT_CHILD_OUTLET'))   $outlet_id = DEFAULT_CHILD_OUTLET;
?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark">
        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
            <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
                <?php
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'dashboard');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'dashboard') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>dashboard" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Dashboard
                                    </span>
                                    <!-- <span class="m-menu__link-badge">
                                        <span class="m-badge m-badge--danger">
                                            2
                                        </span>
                                    </span> -->
                                </span>
                            </span>
                        </a>
                    </li>
                <?php } ?>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">
                        Manage Courses
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                <?php
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'courses');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'courses') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>courses" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Courses
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'categories');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'categories') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>categories" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Course Categories
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'instructors');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'instructors') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>instructors" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Instructors
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'batch');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'batch') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>batch" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Batches
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php } ?>

                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        Manage Students
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                <?php
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'students');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'students') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>students" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Students
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'enrollment');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'enrollment') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>enrollment" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Enrollments
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'enrollment_request');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'enrollment_request') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>enrollment_request" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Enrollment Requests
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'installments');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'installments') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>installments" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Installments
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'leaves');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'leaves') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>leaves" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Leaves
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php } ?>

                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        Manage Settings
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                <?php
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'users');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'users') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>users" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-user-add"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Users
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'general_setting');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'general_setting') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>general_setting" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        General Setting
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'home_slider');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'home_slider') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>home_slider" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Home Slider
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'features');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'features') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>features" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Features
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                // update
                if ($user_data['role'] != 'portal admin')
                $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'opportunities');
            else
                $permission = true;
            if ($permission) {
            ?>
                <li class="m-menu__item <?php if ($curr_url == 'opportunities') {
                                            echo 'm-menu__item--active';
                                        } ?>" aria-haspopup="true">
                    <a href="<?= ADMIN_BASE_URL ?>opportunities" class="m-menu__link">
                        <i class="m-menu__link-icon flaticon-settings-1"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                Opportunities
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
            <?php }

                // update
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'portfolio');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'portfolio') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>portfolio" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Clients
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'information');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'information') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>information" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Home Information
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'subscribe');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'subscribe') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>subscribe" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Subscriber
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'success_stories');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'success_stories') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>success_stories" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Success Stories
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php }
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'webpages');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'webpages') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>webpages" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Webpages
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php } 
                if ($user_data['role'] != 'portal admin')
                    $permission = Modules::run('permission/has_control_permission', $role_id, $outlet_id, 'meta_tags_html');
                else
                    $permission = true;
                if ($permission) {
                ?>
                    <li class="m-menu__item <?php if ($curr_url == 'meta_tags_html') {
                                                echo 'm-menu__item--active';
                                            } ?>" aria-haspopup="true">
                        <a href="<?= ADMIN_BASE_URL ?>meta_tags_html" class="m-menu__link">
                            <i class="m-menu__link-icon flaticon-settings-1"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Meta Tags HTML
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>