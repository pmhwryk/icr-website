<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//include_once APPPATH . '/modules/outlet/controllers/outlet.php';

class Admin_api extends MX_Controller {

    protected $data = '';

    function __construct() {
        $this->lang->load('english', 'english');
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }
   
}