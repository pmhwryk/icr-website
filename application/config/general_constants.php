<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

for ($i = 1; $i <= 30; $i++) {
    $resultRank[$i] = $i;
}

for ($year = 2014; $year <= 2050; $year++) {
    $arr_year[$year] = $year;
}

date_default_timezone_set("Asia/Karachi");
$config = array(
    'Date_Format_Type' => array(1 => date("Y/m/d"), 2 => date('m/d/Y'), 3 => date('d/m/Y')),
    'time_Format_Type' => array(1 => date("H:s A"), 2 => date('H:s a'), 3 => date('H:s')),
    'Date_Format_Type_JS' => array(1 => "YYYY/MM/DD", 2 => 'MM/DD/YYYY', 3 => 'DD/MM/YYYY'),
    'time_Format_Type_JS' => array(1 => "h:mm A", 2 => 'h:mm a', 3 => 'H:mm'),
    'Rank' => $resultRank,
    'sub_modules' => array('outlet_lang'),
	'Gender' => array(1 => 'Male', 2 => 'Female'),
	'Employment_Contract_Code' => array(1 => 'Employed', 2 => 'Contractor'),
    'reminder_types' => array(REMINDER_MIN => 'Min(s)', REMINDER_HR => 'Hr(s)', REMINDER_DAY => 'Day(s)', REMINDER_MONTH => 'Months(s)'),
    'Essentials' => array(WEIGHT => 'Weight', VOLUME => 'Volume', PORTION => 'Part', LENGTH => 'Size', PERSON =>'Person',BRAND =>'Brand',OTHER =>'Other'),
    'restaurant_type' => array(1 => 'Asiatisk mat', 2 => 'Hamburger', 3 => 'Indisk mat', 4 => 'Italiensk Pizza', 5 => 'Kebab', 6 => 'Pakistansk mat', 7 => 'Pizza', 8 => 'Sushi'),
    'order_type' => array(0 => 'NIL', TAKE_IN => 'Dine In', TAKE_OUT => 'Take Away', DELIVERY => 'Delivery'),
    'order_status' => array(OS_CONFIRM => 'Confirmed', OS_IN_PROCESS => 'In Process', OS_DELIVERED => 'Delivered'),
    'payment_status' => array(PS_IN_COMPLETE => 'Incomplete', PS_COMPLETE => 'Complete'),


);