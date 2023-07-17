<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
/////////////// ADMIN PAGES ////////////////
$route['default_controller'] = 'front';
$front = "front/";
$route['login'] = $front . "portal_login";
// $route['pricing'] = $front . "pricing";
// $route['about-us'] = $front."about_us";
$route['privacy-policy'] = $front . "privacy_policy";
$route['terms-and-conditions'] = $front . "terms_condition";
// $route['gallery'] = $front . "gallery";
$route['contact-us'] = $front . "contact_us";
$route['enroll-now'] = $front . "enrollNow";
$route['faqs'] = $front . "faqs";

$route['admin'] = "login";
$route['admin/login/submit_login'] = "login/submit_login";
$route['admin/logout'] = "login/logout";
$route['admin/(.+)'] = "$1/$1";

$route['login-to-student-portal'] = $front . 'portal_login';
$route['portal-account-forgot-password'] = $front . 'forgot_password';
$route['portal-submit-forgot-password'] = $front . 'submit_forgot_password';
$route['portal-otp-verification'] = $front . 'otp_verification';
$route['portal-genrate-password'] = $front . 'genrate_password';
$route['portal-change-password'] = $front . 'change_pass';
$route['submit-portal-login'] = $front . 'submit_portal_login';
$route['portal-dashboard'] = $front . 'portal_dashboard';
$route['logout-from-portal'] = $front . 'logout';



////////////////////Portal Dashboard Pages/////////////////////
$route['portal-courses'] = $front . 'portal_courses';
$route['installments'] = $front . 'installments';
$route['my-profile'] = $front . 'my_profile';
$route['update-student-profile'] = $front . 'update_profile';
$route['submit-update'] = $front . 'submit_update';
$route['leaves'] = $front . 'leaves_listing';
$route['submit-absence-request'] = $front . 'submit_absence_request';
$route['cancel-absence-request'] = $front . 'cancel_absence_request';
$route['achievement'] = $front . 'achievement';

$route['portal-course-details/(.+)'] = $front . 'portal_course_details';


////////////SEO LINKS////////////////////////////////////////

$route['best-it-center-in-rahim-yar-khan'] = $front.'about_us';
$route['best-sofware-house-in-rahim-yar-khan'] = $front.'about_us';
$route['computer-courses-in-rahim-yar-khan'] = $front . 'front_course_listing';
$route['it-courses-in-rahim-yar-khan'] = $front . 'front_course_listing';
	
$web_developemnt = 'web-development';
$route['course/web-development-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$web_developemnt;
$route['course/website-development-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$web_developemnt;

$app_development = 'app-development';
$route['course/app-development-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$app_development;
$route['course/mobile-app-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$app_development;

$graphic_designing = 'graphic-designing';
$route['course/graphic-desingning-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$graphic_designing;
$route['course/best-photoshop-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$graphic_designing;
$route['course/photoshop-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$graphic_designing;

$wordpress_development = 'wordpress-development';
$route['course/wordpress-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$wordpress_development;
$route['course/wordpress-development-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$wordpress_development;

$sqa = 'software-quality-assurance';
$route['course/software-quality-assurance-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$sqa;
$route['course/software-quality-assurance-in-rahim-yar-khan'] = $front.'front_course_details/'.$sqa;

$seo = 'search-engine-optimization-course';
$route['course/best-seo-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$seo;
$route['course/seo-course-in-rahim-yar-khan'] = $front.'front_course_details/'.$seo;
$route['course/seo-service-in-rahim-yar-khan'] = $front.'front_course_details/'.$seo;

$route['free-opportunities'] = $front.'opportunity';

////////////END SEO LINKS////////////////////////////////////////
$route['course/(.+)'] = $front . 'front_course_details';

////////////Front Pages////////////////////////////////////////
$route['about-us'] = $front . 'about_us';
$route['blog'] = $front."blog";
$route['blog-detail/(.+)'] = $front."blog_detail";
$route['courses'] = $front . 'front_course_listing';
$route['our-team'] = $front . 'our_team';
$route['our-student'] = $front . 'our_stundent';
$route['success-stories'] = $front . 'success_stories';
$route['contact-us'] = $front . "contact_us";
$route['contact-submit'] = $front . "contact_submit";
$strHost = $_SERVER['SERVER_NAME'];
$strHost = preg_replace('/www./', '', $strHost, 1);
$route['([a-zA-Z-]+)'] = $front . "page/$1";
$route['404_override'] = '';


