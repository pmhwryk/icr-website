<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>
		ICR | Dashboard
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="<?= STATIC_ADMIN_JS ?>webfont.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script> -->
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<!--begin::Page Vendors -->
	<link href="<?= STATIC_ADMIN_CSS ?>admin_fullcalendar_bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="<?= STATIC_ADMIN_CSS ?>admin_vendors_bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_style_bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_datatables_bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>bs-filestyle.css">
	<link href="<?= STATIC_ADMIN_CSS ?>vendors.bundle.css">
	<link href="<?= STATIC_ADMIN_CSS ?>style.bundle.css">
	<link href="<?= STATIC_ADMIN_CSS ?>toastr.css">
	<!-- DATETIMEPICKER-->
	<link rel="stylesheet" href="<?php echo STATIC_ADMIN_CSS ?>bootstrap-fileupload.css">
	<script src="<?php echo STATIC_ADMIN_JS ?>jquery.js"></script>
	<link rel="stylesheet" href="<?php echo STATIC_ADMIN_CSS ?>dropify.css">
	<script src="<?php echo STATIC_ADMIN_JS ?>dropify.js"></script>
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?= STATIC_ADMIN_IMAGE ?>admin_favicon.png" />
	<script>
		$('.dropify').dropify();
	</script>
</head>
<!-- end::Head -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="<?= ADMIN_BASE_URL ?>dashboard" class="m-brand__logo-wrapper">
									<?php
									$outlet_detail = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("id" => DEFAULT_OUTLET), 'id desc', 'id', 'outlet', 'adminlogo', '1', '1', '', '', '')->row_array();
									if (!isset($outlet_detail['adminlogo']))
										$outlet_detail['adminlogo'] = "";
									$logo = Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, $outlet_detail['adminlogo'], STATIC_ADMIN_IMAGE, DEFAULT_LOGO);
									?>
									<img class="img-fluid" alt="" src="<?= (isset($general_settings['image']) && !empty($general_settings['image']) ? Modules::run('api/image_path_with_default', ACTUAL_GENERAL_SETTING_IMAGE_PATH, $general_settings['image'], STATIC_FRONT_IMAGE, '') : STATIC_FRONT_IMAGE . DEFAULT_LOGO); ?>" />
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block ">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Header Menu Toggler -->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>
								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>
					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
							<i class="la la-close"></i>
						</button>
						<?php
						$data = $this->session->userdata('route_user_data');
						$profile_image = OUTLET_USER_DEFAULT_IMAGE;
						if (isset($data['user_image']) && !empty($data['user_image']))
							$profile_image = $data['user_image'];
						$profile_image = Modules::run('api/image_path_with_default', ACTUAL_OUTLET_USER_IMAGE_PATH, $profile_image, STATIC_FRONT_IMAGE, OUTLET_USER_DEFAULT_IMAGE);
						$profile_name = "";
						if (isset($data['user_name']) && !empty($data['user_name']))
							$profile_name = ucwords($data['user_name']);
						?>
						<!-- END: Horizontal Menu -->
						<!-- BEGIN: Topbar -->
						<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
							<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
								<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
									<select name="outlet_id" class="form-control dropdown outlet-dropdown">
										<?php if (isset($outlets) && !empty($outlets)) {
											foreach ($outlets['all_outlet_id'] as $row) {
												if ($row['id'] == DEFAULT_OUTLET) {
													$select = 'selected="Selected"';
												} else {
													$select = '';
												}
										?>
												<option <?= $select ?> value="<?= (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>" class="dropdown-item"><?= (isset($row['name']) && !empty($row['name']) ? $row['name'] : '') ?></option>
										<?php }
										} ?>
									</select>
								</li>
							</ul>
						</div>
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
										<a href="javascript:void(0);" class="m-nav__link m-dropdown__toggle">
											<i class="fa fa-caret-down" aria-hidden="true" style="margin-top: 19px;margin-right: 6px;"></i>
											<span class="m-topbar__userpic">
												<img style="width:100%;" src="<?= $profile_image ?>" class="m--img-rounded m--marginless m--img-centered" alt="" />
											</span>
											<span class="m-topbar__username m--hide">
												<?= $profile_name ?>
											</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center" style="background: url(<?= STATIC_ADMIN_IMAGE ?>user_profile_bg.jpg); background-size: cover;">
													<div class="m-card-user m-card-user--skin-dark">
														<div class="m-card-user__pic">
															<img src="<?= $profile_image ?>" class="m--img-rounded m--marginless" alt="" />
														</div>
														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">
																<?php echo $profile_name; ?>
															</span>
															<a href="javascript:void(0);" class="m-card-user__email m--font-weight-300 m-link">
																<?php if (isset($data['role']) && !empty($data['role'])) echo ucwords($data['role']); ?>
															</a>
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">
																	Section
																</span>
															</li>
															<!-- <li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																				<span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span>
																			</span>
																		</span>
																	</a>
																</li> -->

															<!-- <li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">
																			Activity
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">
																			Messages
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">
																			FAQ
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">
																			Support
																		</span>
																	</a>
																</li> -->
															<li class="m-nav__separator m-nav__separator--fit"></li>
															<li class="m-nav__item">
																<a href="<?= ADMIN_BASE_URL . 'logout' ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																	Logout
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>

		<script>
			$('.outlet-dropdown').on('change',
				function() {
					var outlet_id = $(this).val();
					var outlet_name = $('.outlet-dropdown :selected').text();
					$.ajax({
						type: 'post',
						url: '<?= ADMIN_BASE_URL ?>outlet/set_outlet_session',
						data: {
							'outlet_id': outlet_id,
							'outlet_name': outlet_name
						},
						success: function(data) {
							location.reload();
						}
					})
				});
		</script>