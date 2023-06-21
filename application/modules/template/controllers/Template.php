<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template extends MX_Controller {

	function __construct() {
		parent::__construct();
	}

	function admin($data){
		$data['outlets'] =	$this->get_outlets();
		$data['user_data'] = $user_data = $this->session->userdata('route_user_data');
		$role_id = 0;
		if (isset($user_data['role_id']) && !empty($user_data['role_id']))
			$role_id = $user_data['role_id'];
		$data['role_id'] = $role_id;
		// $data['general_settings']=Modules::run('general_setting/_get_where', DEFAULT_OUTLET)->row_array();
		$this->load->view('admin/theme1/admin',$data);
	}
	
	function admin_form($data){
		$data['outlets'] =	$this->get_outlets(); 
		$data['user_data'] = $user_data = $this->session->userdata('route_user_data');
		$role_id = 0;
		if (isset($user_data['role_id']) && !empty($user_data['role_id']))
			$role_id = $user_data['role_id'];
		$data['role_id'] = $role_id;
		$data['general_settings']=Modules::run('general_setting/_get_where', DEFAULT_OUTLET)->row_array();
		$this->load->view('admin/theme1/admin_form',$data);
	}
	
	function index(){
		$this->load->view('theme1');
	}

	function front($data){
		$data['toppanel_pages'] = Modules::run('webpages/_get_toppanel_pages')->result_array();
		$data['general_setting'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id'=>DEFAULT_OUTLET), 'id desc', 'id', 'general_setting', '*', '1', '0', '', '', '')->row_array();
		$data['footer_links'] = Modules::run('webpages/_get_footerpanel_pages')->result_array();
		$this->load->view('front/theme1/front',$data);
	}

	function front2($data){
		$data['general_setting'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id'=>DEFAULT_OUTLET), 'id desc', 'id', 'general_setting', '*', '1', '0', '', '', '')->row_array();
		$check_session = $this->session->userdata('student_id');
        if(empty($check_session)){
            redirect(BASE_URL);
        }
		$this->load->view('front/theme1/front2',$data);
	}

	function get_outlets(){
		$outlets = array();
		$user_data = $this->session->userdata('route_user_data');
		if($user_data['role_id'] == '5' || $user_data['role'] == 'portal admin'){
			$result = Modules::run('outlet/get_outlets_array');
		
			foreach($result as $key => $name){
				$outlets[$key]['id'] = $key;
				$outlets[$key]['name'] = $name;
			}
		}else{
			$result = Modules::run('roles_outlet/_get_where_custom', 'emp_id', $user_data['user_id']);
			foreach($result->result() as $key => $row){
				$outlet = Modules::run('outlet/_get_where',$row->outlet_id)->row();
				$outlets[$key]['id'] = $outlet->id;
				$outlets[$key]['name'] = $outlet->name;
			}
			
		}
		$data['all_outlet_id']=Modules::run('outlet/_get_all_details_admin','id asc')->result_array();
		$data['outlet_id'] = DEFAULT_OUTLET;
		$data['outlets'] = $outlets;
		return $data;
	}
	
	function footer($data)
	{
		$this->load->view('common/footer', $data);
	}
	
}
