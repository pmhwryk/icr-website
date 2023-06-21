<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title><?php echo DEFAULT_OUTLET_NAME; ?> | Login</title>
	<meta name="description" content="User login">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
	<link href="<?= STATIC_ADMIN_CSS ?>admin_login.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_plugins_bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_style_bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_base_light.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_menu_light.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_menu_dark.css" rel="stylesheet" type="text/css" />
	<link href="<?= STATIC_ADMIN_CSS ?>admin_aside_dark.css" rel="stylesheet" type="text/css" />
	<style type="text/css">

	</style>
	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?= STATIC_ADMIN_IMAGE ?>admin_favicon.png" />
</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
	<!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " style="background-image: url('https://pakish.pk/wp-content/uploads/2018/05/website-login-background.jpg');height: 100vh;    min-height: 650px;">
				<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
					<div class="kt-login__container">
						<div class="kt-login__logo">
							<a href="javascript:void(0)">
								<img style="max-height:200px;" src="<?=(isset($general_settings['image']) && !empty($general_settings['image']) ? Modules::run('api/image_path_with_default',ACTUAL_GENERAL_SETTING_IMAGE_PATH,$general_settings['image'],STATIC_FRONT_IMAGE,DEFAULT_LOGO) : STATIC_FRONT_IMAGE.DEFAULT_LOGO);?>">
							</a>
						</div>
						<div class="kt-login__signin">
							<div class="kt-login__head">
								<h3 class="kt-login__title">Sign In To Admin</h3>
							</div>
							<?php
							$attributes = array('autocomplete' => 'off', 'id' => 'login', 'class' => 'kt-form');
							echo form_open(ADMIN_BASE_URL . 'login/submit_login', $attributes);
							?>
							<div class="input-group">
								<input class="form-control" type="text" placeholder="User Name" name="username" autocomplete="off">
							</div>
							<div class="input-group">
								<input class="form-control" type="password" placeholder="Password" name="password">
							</div>
							<div class="row kt-login__extra">
								<!-- <div class="col kt-align-right">
									<a href="javascript:;" id="kt_login_forgot" class="kt-link kt-login__link">Forget Password ?</a>
								</div> -->
							</div>
							<div class="kt-login__actions">
								<button id="kt_login_signin_submit" class="btn btn-pill kt-login__btn-primary">Login</button>
							</div>
							<?php echo form_close(); ?>
						</div>
						<!-- <div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_forgot_submit" class="btn btn-pill kt-login__btn-primary" attribute ="<?= ADMIN_BASE_URL ?>login/forgot_password_action">Request</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div> -->
						<!-- <div class="kt-login__account">
							<span class="kt-login__account-msg">
								Design and Developed by
							</span>&nbsp;&nbsp;
							<a href="https://hwryk.com" target="_blank" class="kt-link kt-link--light kt-login__account-link">Hello World Technologies</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Page -->

	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"dark": "#282a3c",
					"light": "#ffffff",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": [
						"#c5cbe3",
						"#a1a8c3",
						"#3d4465",
						"#3e4466"
					],
					"shape": [
						"#f0f3ff",
						"#d9dffa",
						"#afb4d4",
						"#646c9a"
					]
				}
			}
		};
	</script>
	<!-- end::Global Config -->
	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="<?= STATIC_ADMIN_JS ?>admin_plugins_bundle.js" type="text/javascript"></script>
	<script src="<?= STATIC_ADMIN_JS ?>admin_scripts_bundle.js" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->
	<!--begin::Page Scripts(used by this page) -->
	<script src="<?= STATIC_ADMIN_JS ?>admin_login_general.js" type="text/javascript"></script>

	<!--end::Page Scripts -->
</body>

</html>