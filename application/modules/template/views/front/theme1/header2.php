<!doctype html>
<html class="no-js" lang="">
<head>
    <?php
        $page_title = (isset($meta_tags['title']) && !empty($meta_tags['title']) ? $meta_tags['title'] : '');
        $page_keyword = (isset($meta_tags['keyword']) && !empty($meta_tags['keyword']) ? $meta_tags['keyword'] : '');
        $page_description = (isset($meta_tags['description']) && !empty($meta_tags['description']) ? $meta_tags['description'] : '');
        $page_url = (isset($meta_tags['page_url']) && !empty($meta_tags['page_url']) ? $meta_tags['page_url'] : 'javascript:void(0);');
        $page_image = (isset($meta_tags['image']) && !empty($meta_tags['image']) ? $meta_tags['image'] : STATIC_FRONT_IMAGE);
    ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=(strtolower($page_url) != BASE_URL ? $page_title : '').DEFAULT_OUTLET_NAME.(strtolower($page_url) == BASE_URL ? " | ".$page_title : '')?></title>
    <meta name="description" content="<?=$page_description?>">
    <meta name="author" content="<?=BASE_URL?>">
    <meta name="keywords" content="<?=$page_keyword?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url" content="<?=$page_url?>">
    <meta property="og:title" content="<?=$page_title?>">
    <meta property="og:type" content="Brand">
    <meta property="og:site_name" content="<?=DEFAULT_OUTLET_NAME?>">
    <meta property="og:description" content="<?=$page_description?>">
    <meta property="og:image" content="<?=$page_image?>">
    
    <!-- FAV ICON -->
    <link rel="icon" type="image/png" href="<?=Modules::run('api/image_path_with_default',ACTUAL_GENERAL_SETTING_IMAGE_PATH,(isset($general_settings['fav_icon']) && !empty($general_settings['fav_icon']) ? $general_settings['fav_icon'] : ''),STATIC_FRONT_IMAGE,'favicon.png');?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>responsive.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>colors.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>style.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>custom.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_ASSETS?>vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_ASSETS?>vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_ASSETS?>vendor/dropify/dist/css/dropify.min.css">
    
    <script src="<?=STATIC_FRONT_JS?>jquery.js"></script>
    <script src="<?=STATIC_FRONT_ASSETS?>vendor/dropify/dist/js/dropify.min.js"></script>
    <style>
        .logo img{
            width: 140px;
        }
        .logo{
            height: 100px;
            margin-bottom: -14px;
            margin-top: -28px;
        }
        html,body{
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .portal-login-btn{
            background: white;
            border-radius: 30px;
            padding: 6px !important;
            margin-top: 10px;
        }
        .icon-bar{
            background-color: #fff !important;
        }
    </style>

    <?php
        $message = $this->session->flashdata('message');
        $status = $this->session->flashdata('status');
        if (isset($message) && !empty($message) && $status == 'success') {
    ?>
        <script>$(document).ready(function() {toastr.success("<?= $message ?>")});</script>
    <?php }
        if (isset($message) && !empty($message) && $status == 'error') {?>
        <script>
            $(document).ready(function() {
            toastr.error("<?= $message ?>")
            });
        </script>
    <?php }
    ?>
</head>
<body class="leftmenu memberprofile">

