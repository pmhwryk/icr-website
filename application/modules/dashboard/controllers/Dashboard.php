<?php 
/*************************************************
Created By: Imran Haider
Dated: 01-01-2014
version: 1.0
*************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller{

	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
	}

	function index(){
		$data['view_file'] = 'home';
		$this->load->module('template');
		$this->template->admin($data);
	} 
}