<?php

$config = array();
$ci = &get_instance();
$ci->load->library('session');
require_once(BASEPATH . 'database/DB' . EXT);

$db = &DB();
$user_data = $ci->session->userdata('user_data');
$user_data = $ci->session->userdata('route_user_data');
$outlet_data = $ci->session->userdata('outlet_data');
$f_station_id = $ci->session->userdata('f_station_id');
$strHost = CURRENT_DOMAIN;
$strHost = preg_replace('/www./', '', $strHost, 1);
$chack = false;
$is_station = 0;

if (isset($f_station_id) && $f_station_id > 0)
    $station_id = $f_station_id;
else {
    $station = $ci->uri->segment(1);
    if ($station == 'meny')
        $station_id = $ci->uri->segment(2);
}

///define('DEFAULT_MODULE', 'modules');

if (isset($station_id) && !empty($station_id)) {
    $station_id = str_replace('aB-c121dd73d', '', $station_id);
    $station_id = str_replace('d83', '', $station_id);
    $row = $db->get_where('outlet', array('id' => $station_id))->row();
    if (isset($row) && !empty($row)) {
        $is_station = 1;
        $ci->session->set_userdata('f_station_id', $station_id);
        define('DEFAULT_OUTLET', $row->id);
        define('DEFAULT_OUTLET_NAME', $row->name);
        define('DEFAULT_OUTLET_PHONE', $row->phone);
        define('DEFAULT_OUTLET_FACEBOOK', $row->facebook_link);
        define('DEFAULT_ADDRESS', $row->address);
        define('DEFAULT_CITY', $row->city);
        define('DEFAULT_COUNTRY', $row->country);
        define('DEFAULT_POST_CODE', $row->post_code);
        define('DEFAULT_OUTLET_EMAIL', $row->email);
        define('DEFAULT_LANG', $row->id);
        define('DEFAULT_URL', $row->url);
        define('DEFAULT_OUTLET_FRONT_LOGO', $row->image);
        define('DEFAULT_OUTLET_MOBILE_FRONT_LOGO', $row->adminlogo_small);
        define('DEFAULT_ORGINATION_NO', $row->orgination_no);
        define('DEFAULT_OUTLET_FRONT_FAVICON', $row->fav_icon);
        define('DEFAULT_OUTLET_ADMIN_LOGO', $row->adminlogo);
        define('DEFAULT_OUTLET_ADMIN_LOGO_SMALL', $row->adminlogo_small);
        define('DEFAULT_FACEBOOK_APP_ID', $row->facebook_appId);
        define('DEFAULT_FACKBOOK', $row->facebook_link);
        define('DEFAULT_TWITTER', $row->twitter_link);
        define('DEFAULT_GOOGLE', $row->googleplus_link);
        define('DEFAULT_LINKEDIN', $row->linkedin_link);
        define('DEFAULT_IOS', $row->ios_store);
        define('DEFAULT_GOOGLE_STORE', $row->google_store);
    }
}

if (isset($outlet_data) && $outlet_data != NULL && $user_data['role'] == 'portal admin' && $is_station == 0) {
    $row = $db->get_where('outlet', array('id' => $outlet_data['outlet_id']))->row();
    if (isset($row->parent_id) && !empty($row->parent_id)) {
        define('DEFAULT_CHILD_OUTLET', $outlet_data['outlet_id']);
        define('DEFAULT_CHILD_OUTLET_NAME', $row->name);
        $row = $db->get_where('outlet', array('id' => $row->parent_id))->row();
        define('DEFAULT_OUTLET', $row->id);
        define('DEFAULT_OUTLET_NAME',  $row->name);
        define('DEFAULT_CHILD', 1);
    } else {
        define('DEFAULT_OUTLET', $outlet_data['outlet_id']);
        if (isset($outlet_data['outlet_name']))
            define('DEFAULT_OUTLET_NAME', $outlet_data['outlet_name']);
        define('DEFAULT_CHILD', 0);
    }

    define('DEFAULT_OUTLET_EMAIL', $row->email);
    define('DEFAULT_OUTLET_FRONT_LOGO', $row->image);
    define('DEFAULT_OUTLET_MOBILE_FRONT_LOGO', $row->adminlogo_small);
    define('DEFAULT_OUTLET_PHONE', $row->phone);
    define('DEFAULT_OUTLET_FACEBOOK', $row->facebook_link);
    define('DEFAULT_ADDRESS', $row->address);
    define('DEFAULT_CITY', $row->city);
    define('DEFAULT_COUNTRY', $row->country);

    define('DEFAULT_POST_CODE', $row->post_code);
    define('DEFAULT_OUTLET_FRONT_FAVICON', $row->fav_icon);

    define('DEFAULT_FACKBOOK', $row->facebook_link);
    define('DEFAULT_TWITTER', $row->twitter_link);
    define('DEFAULT_GOOGLE', $row->googleplus_link);
    define('DEFAULT_LINKEDIN', $row->linkedin_link);
    define('DEFAULT_IOS', $row->ios_store);
    define('DEFAULT_GOOGLE_STORE', $row->google_store);

    define('DEFAULT_URL', $strHost);
    $chack = true;
} else if (isset($user_data) && $user_data != NULL  && $is_station == 0) {
    $row = $db->get_where('outlet', array('id' => $user_data['outlet_id']))->row();
    if (isset($row->parent_id) && !empty($row->parent_id)) {
        define('DEFAULT_CHILD', 1);
        define('DEFAULT_CHILD_OUTLET', $user_data['outlet_id']);
        define('DEFAULT_CHILD_OUTLET_NAME', $row->name);
        $row = $db->get_where('outlet', array('id' => $row->parent_id))->row();
        define('DEFAULT_OUTLET', $row->id);
        define('DEFAULT_OUTLET_NAME',  $row->name);
    } else {
        define('DEFAULT_CHILD', 0);
        define('DEFAULT_OUTLET', $user_data['outlet_id']);
        define('DEFAULT_OUTLET_NAME',  $row->name);
    }
    define('DEFAULT_LANG', 1);
    define('DEFAULT_OUTLET_EMAIL', $row->email);
    define('DEFAULT_OUTLET_PHONE', $row->phone);
    define('DEFAULT_OUTLET_FACEBOOK', $row->facebook_link);
    define('DEFAULT_ADDRESS', $row->address);
    define('DEFAULT_CITY', $row->city);
    define('DEFAULT_POST_CODE', $row->post_code);
    define('DEFAULT_COUNTRY', $row->country);
    define('DEFAULT_OUTLET_FRONT_LOGO', $row->image);
    define('DEFAULT_OUTLET_MOBILE_FRONT_LOGO', $row->adminlogo_small);

    define('DEFAULT_OUTLET_FRONT_FAVICON', $row->fav_icon);
    define('DEFAULT_FACKBOOK', $row->facebook_link);
    define('DEFAULT_TWITTER', $row->twitter_link);
    define('DEFAULT_GOOGLE', $row->googleplus_link);
    define('DEFAULT_LINKEDIN', $row->linkedin_link);
    define('DEFAULT_IOS', $row->ios_store);
    define('DEFAULT_GOOGLE_STORE', $row->google_store);
    define('DEFAULT_ORGINATION_NO', $row->orgination_no);
    define('DEFAULT_FACEBOOK_APP_ID', $row->facebook_appId);

    define('DEFAULT_URL', $strHost);
    $chack = true;
} else if ($is_station == 0) {
    $row = $db->get_where('outlet', array('url' => $strHost))->row();
    if (isset($row) && !empty($row)) {
        $row_child = $db->get_where('outlet', array('parent_id' => $row->id, 'status' => '1'))->row();
        if (isset($row_child) && !empty($row_child)) define('DEFAULT_CHILD', '1');
        else define('DEFAULT_CHILD', '0');

        define('DEFAULT_OUTLET', $row->id);
        define('DEFAULT_OUTLET_NAME', $row->name);
        define('DEFAULT_OUTLET_PHONE', $row->phone);
        define('DEFAULT_OUTLET_FACEBOOK', $row->facebook_link);
        define('DEFAULT_ADDRESS', $row->address);
        define('DEFAULT_CITY', $row->city);
        define('DEFAULT_COUNTRY', $row->country);
        define('DEFAULT_POST_CODE', $row->post_code);
        define('DEFAULT_OUTLET_EMAIL', $row->email);
        define('DEFAULT_LANG', $row->id);
        define('DEFAULT_URL', $strHost);
        define('DEFAULT_OUTLET_FRONT_LOGO', $row->image);
        define('DEFAULT_OUTLET_MOBILE_FRONT_LOGO', $row->adminlogo_small);

        define('DEFAULT_ORGINATION_NO', $row->orgination_no);

        define('DEFAULT_OUTLET_FRONT_FAVICON', $row->fav_icon);
        define('DEFAULT_OUTLET_ADMIN_LOGO', $row->adminlogo);
        define('DEFAULT_OUTLET_ADMIN_LOGO_SMALL', $row->adminlogo_small);
        define('DEFAULT_FACEBOOK_APP_ID', $row->facebook_appId);

        define('DEFAULT_FACKBOOK', $row->facebook_link);
        define('DEFAULT_TWITTER', $row->twitter_link);
        define('DEFAULT_GOOGLE', $row->googleplus_link);
        define('DEFAULT_LINKEDIN', $row->linkedin_link);
        define('DEFAULT_IOS', $row->ios_store);
        define('DEFAULT_GOOGLE_STORE', $row->google_store);
    } else {
        echo '<h2>Invalid URL! Contact to administrator.</h2>';
        exit;
    }
}
$where4['outlet_id'] = DEFAULT_OUTLET;
$db->where($where4);
$rowcount = $db->get('general_setting');
$row4 = $rowcount->row();
define('ITEM_PRICE_VAT_INCLUDED_PERCENTAGE', 15);

if (count($rowcount->result_array()) > 0) {
    define('DEFAULT_LANGUAGE', $row4->language);
    define('DEFAULT_CURRENCY_CODE', 'GBP');
    if ($row4->date_format > 0)
        define('DEFAULT_DATE_FORMAT', $row4->date_format);
    else
        define('DEFAULT_DATE_FORMAT', 1);
    if ($row4->time_format > 0)
        define('DEFAULT_TIME_FORMAT', $row4->time_format);
    else
        define('DEFAULT_TIME_FORMAT', 1);
} else {
    define('DEFAULT_CURRENCY', 14);
    // define('DEFAULT_COUNTRY', 235);
    define('DEFAULT_THEME', 'a');
    define('DEFAULT_DATE_FORMAT', 1);
    define('DEFAULT_TIME_FORMAT', 1);
    define('TAKE_IN_VAT', 25);
    define('TAKE_OUT_VAT', 15);
    define('DELIVERY_CHARGES', 69);
    define('DELIVERY_CHARGES_VAT', 25);
    define('DELIVERY_FIXED', 1);
    //define('DELIVERY_TIME', '60-75 min');
}