<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/


// User Constants
////////////////// ADMIN ///////////////  http://punjabitikka.no/
define('CURRENT_DOMAIN', $_SERVER['HTTP_HOST']);

$strHost = $_SERVER['SERVER_NAME'];
$strHost = preg_replace('/www./', '', $strHost, 1);
$folder =  substr($_SERVER['HTTP_HOST'], 0, (strpos($_SERVER['HTTP_HOST'], '.')));

if (empty($folder))
	$folder = 'icr';

if (strpos($_SERVER['HTTP_HOST'], '.') > 0 && $_SERVER['HTTP_HOST'] != '192.168.2.50') {
	$localname = '';
} else
	$localname = 'icr/';

$prefix = 'https';
if ($strHost == 'localhost')
	$prefix = 'http';
define('BASE_URL', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname);
define('BASE_URL_FRONT', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname);
define('IMAGE_BASE_URL', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'uploads/');
define('CAPTCHA_BASE_URL', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'captcha/');
define('ADMIN_BASE_URL', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'admin/');
define('STATIC_ADMIN_CSS', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/admin/theme1/css/');
define('STATIC_ADMIN_JS', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/admin/theme1/js/');
define('STATIC_ADMIN_IMAGE', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/admin/theme1/images/');
define('STATIC_FRONT_OUTLET_CSS', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/front/' . $folder . '/css/');

define('STATIC_FRONT_CSS', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/front/theme1/css/');
define('STATIC_FRONT_JS', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/front/theme1/js/');
define('STATIC_FRONT_IMAGE', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/front/theme1/images/');
define('STATIC_FRONT_ASSETS', $prefix . '://' . $_SERVER['HTTP_HOST'] . '/' . $localname . 'static/front/theme1/assets/');

define('API_KEY', "3ec00dddc00e1dec3115457b0e317c9fb1c34db2");
define('API_CONTENT_TYPE', "Content-Type:application/x-www-form-urlencoded");
define('API_DATETIME', "dateTime:123");
define('API_URL', "url:123");
define('API_HEADER_KEY', "key:cacf66b2b2ef2b102d340a51db35fb0e05bf1584");

define('FIREBASE_API_LINK', './application/modules/api/views/');
define('FIRE_BASE_API_KEY', "AAAAihFTZv0:APA91bFE_6U2s4Qg-94XONFTeOFFwE33-x8P4gsUjfeWgfzjcG-0mdgMg0kD1VzQYQwxMBybhTPaM4jNz7a2cDomAQLLJZSKbLgkDY9mCpedtKRIVD4_txc2KHgHMBNwfBphIJJ_4z1s");

///// verification email configuration ////
define('VERIFY_EMAIL_POST', 465);
define('VERIFY_EMAIL_USER', "verification@flexfit.hwtapps.com");
define('VERIFY_EMAIL_PASS', "6vAUVHNTh-M[");
define('VERIFY_EMAIL_HOST', 'ssl://flexfit.hwtapps.com');

define('OUTLET_USER_DEFAULT_IMAGE', 'user.png');
define('ACTUAL_OUTLET_USER_IMAGE_PATH', 'uploads/outlet_user/');
define('LARGE_OUTLET_USER_IMAGE_PATH',  'uploads/outlet_user/large_images/');
define('MEDIUM_OUTLET_USER_IMAGE_PATH', 'uploads/outlet_user/medium_images/');
define('SMALL_OUTLET_USER_IMAGE_PATH', 'uploads/outlet_user/small_images/');

define('ACTUAL_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/');
define('LARGE_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/large_images/');
define('MEDIUM_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/medium_images/');
define('SMALL_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/small_images/');

define('DEFAULT_IMAGE', 'no-img.png');
define('DEFAULT_LOGO', 'logo.png');
define('ACTUAL_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/');
define('LARGE_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/');
define('MEDIUM_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/');
define('SMALL_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/');

define('ACTUAL_PORTFOLIO_IMAGE_PATH', 'uploads/portfolio/');
define('LARGE_PORTFOLIO_IMAGE_PATH',  'uploads/portfolio/large-images/');
define('MEDIUM_PORTFOLIO_IMAGE_PATH', 'uploads/portfolio/medium-images/');
define('SMALL_PORTFOLIO_IMAGE_PATH', 'uploads/portfolio/small-images/');

define('ACTUAL_GALLERY_IMAGE_PATH', 'uploads/gallery/actual-images/');
define('LARGE_GALLERY_IMAGE_PATH',  'uploads/gallery/large-images/');
define('MEDIUM_GALLERY_IMAGE_PATH', 'uploads/gallery/medium-images/');
define('SMALL_GALLERY_IMAGE_PATH', 'uploads/gallery/small-images/');

define('DEFAULT_PACKAGES', 'no-img.png');

define('DEFAULT_FEATURES_IMAGE', 'feature_default_icon.png');
define('ACTUAL_FEATURES_IMAGE_PATH', 'uploads/features/');
define('LARGE_FEATURES_IMAGE_PATH', 'uploads/features/');
define('MEDIUM_FEATURES_IMAGE_PATH', 'uploads/features/');
define('SMALL_FEATURES_IMAGE_PATH', 'uploads/features/');

define('DEFAULT_OPPORTUNITIES_IMAGE', 'feature_default_icon.png');
define('ACTUAL_OPPORTUNITIES_IMAGE_PATH', 'uploads/opportunities/');
define('LARGE_OPPORTUNITIES_IMAGE_PATH', 'uploads/opportunities/');
define('MEDIUM_OPPORTUNITIES_IMAGE_PATH', 'uploads/opportunities/');
define('SMALL_OPPORTUNITIES_IMAGE_PATH', 'uploads/opportunities/');

define('ACTUAL_SERVICES_IMAGE_PATH', 'uploads/services/actual-images/');
define('LARGE_SERVICES_IMAGE_PATH', 'uploads/services/large-images/');
define('MEDIUM_SERVICES_IMAGE_PATH', 'uploads/services/medium-images/');
define('SMALL_SERVICES_IMAGE_PATH', 'uploads/services/small-images/');

define('DEFAULT_INSTRUCTOR_IMAGE', 'no-profile.jpg');
define('ACTUAL_INSTRUCTOR_IMAGE_PATH', 'uploads/instructors/');

define('DEFAULT_STUDENT', 'no-img.png');
define('ACTUAL_STUDENT_IMAGE_PATH', 'uploads/students/');

define('DEFAULT_COURSE_ICON', 'no-img.png');
define('ACTUAL_COURSE_ICON_PATH', 'uploads/courses/');

define('DEFAULT_COURSE', 'no-img.png');
define('ACTUAL_COURSE_IMAGE_PATH', 'uploads/courses/');
define('SUCCESS_STORIES_IMAGE_PATH', 'uploads/success_stories/');

define('ACTUAL_PRODUCTS_IMAGE_PATH', 'uploads/products/actual-images/');
define('LARGE_PRODUCTS_IMAGE_PATH', 'uploads/products/large-images/');
define('MEDIUM_PRODUCTS_IMAGE_PATH', 'uploads/products/medium-images/');
define('SMALL_PRODUCTS_IMAGE_PATH', 'uploads/products/small-images/');

define('ACTUAL_TESTIMONIAL_IMAGE_PATH', 'uploads/testimonial/actual-images/');
define('LARGE_TESTIMONIAL_IMAGE_PATH',  'uploads/testimonial/large-images/');
define('MEDIUM_TESTIMONIAL_IMAGE_PATH', 'uploads/testimonial/medium-images/');
define('SMALL_TESTIMONIAL_IMAGE_PATH', 'uploads/testimonial/small-images/');

define('ACTUAL_INFORMATION_IMAGE_PATH', 'uploads/information/');
define('LARGE_INFORMATION_IMAGE_PATH',  'uploads/information/');
define('MEDIUM_INFORMATION_IMAGE_PATH', 'uploads/information/');
define('SMALL_INFORMATION_IMAGE_PATH', 'uploads/information/');

define('ACTUAL_INFO_ABOUT_IMAGE_PATH', 'uploads/info_about/actual-images/');
define('LARGE_INFO_ABOUT_IMAGE_PATH',  'uploads/info_about/large-images/');
define('MEDIUM_INFO_ABOUT_IMAGE_PATH', 'uploads/info_about/medium-images/');
define('SMALL_INFO_ABOUT_IMAGE_PATH', 'uploads/info_about/small-images/');

define('ACTUAL_PACKAGE_TYPE_IMAGE_PATH', 'uploads/packages/actual-images/');
define('ACTUAL_PRICE_PLANS_IMAGE_PATH', 'uploads/prices-planes/actual-images/');

define('DEFAULT_PAGE', 'defaultpage.jpg');
define('DEFAULT_WEBPAGES', 'user11.png');
define('ACTUAL_WEBPAGES_IMAGE_PATH', 'uploads/webpages/');
define('LARGE_WEBPAGES_IMAGE_PATH', 'uploads/webpages/large_images/');
define('MEDIUM_WEBPAGES_IMAGE_PATH', 'uploads/webpages/medium_images/');
define('SMALL_WEBPAGES_IMAGE_PATH', 'uploads/webpages/small_images/');

define('APP_IMAGES_PATH', 'uploads/app_images/');
define('OUTLET_DEFAULT_IMAGE', 'logo_default_dark.png');
define('ACTUAL_OUTLET_IMAGE_PATH', 'uploads/outlet/');
define('LARGE_OUTLET_IMAGE_PATH', 'uploads/outlet/large_images/');
define('MEDIUM_OUTLET_IMAGE_PATH', 'uploads/outlet/medium_images/');
define('SMALL_OUTLET_IMAGE_PATH', 'uploads/outlet/small_images/');

define('CSS_FILES', FCPATH . 'static/front/theme1\css/');
define('IMAGE_BASE_URL_ITEMS', FCPATH . 'uploads/items/');
define('THEMES_BASE_URL', FCPATH . 'static/front/');
define('TEMPLATES_BASE_URL', FCPATH . 'application/modules/');

define('DATA_SAVED', 'saved successfully');
define('DATA_UPDATED', 'updated successfully');

//****PRODUCT TYPE****/
define('SHOW', 1);
define('HIDDEN', 2);
define('VERIFICATION_CODE_TIMER', '+10 minutes');
define('PRIMARY_CHANGE_DURATION', '-2 months');

//****Form Validations****//
define('TEXT_BOX_RANGE', 100);
define('TEXT_AREA_RANGE', 255);

////////////////// Pagination constants ///////////////
define('LIMIT', 10);
define('NUM_LINKS', 10);
define('OUTLET', $_SERVER['HTTP_HOST']);

////////////////// BOOKING STATUS CONSTANTS ///////////////
define('INVOICE_OR_BOOKING_SAVED', 1);
define('PAYMENT_COMPLETED', 2);
define('ORDER_CANCELLED', 3);
define('FREE_SERVICE', 4);
define('UNCOMPLETED', 0);
define('BOOKING_CANCELLED', 3);
////////////////// BOOKING STATUS CONSTANTS ///////////////

// ORDER TYPE /////
define('TAKE_IN', 1);
define('TAKE_OUT', 2);
define('DELIVERY', 3);

//****ORDER STATUS****//
define('OS_CONFIRM', 1);
define('OS_IN_PROCESS', 2);
define('OS_DELIVERED', 3);

//****PAYMENT STATUS****//
define('PS_IN_COMPLETE', 0);
define('PS_COMPLETE', 1);

////////////////// BOOKING REMINDER CONSTANTS ///////////////
define('REMINDER_MIN', 1);
define('REMINDER_HR', 2);
define('REMINDER_DAY', 3);
define('REMINDER_MONTH', 4);

////////////////// METRICS ///////////////
define('WEIGHT', 1);
define('VOLUME', 2);
define('PORTION', 3);
define('LENGTH', 4);
define('PERSON', 5);
define('BRAND', 6);
define('OTHER', 7);
define('PM_CASH', 1);
define('PM_CARD', 2);

/******************************/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/* End of file constants.php */

/* Location: ./application/config/constants.php */