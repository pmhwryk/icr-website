<?php 

/*************************************************

Created By: Akabir Abbasi

Dated: 18-08-2015

*************************************************/



if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller{

	

	function __construct() {

		parent::__construct();

	}

	///////////////////////////////////////////////////////////////////////////////////



	function index(){

		//print 'outlet ===>'.DEFAULT_OUTLET;exit;

		//$data['outlet_all']=Modules::run('outlet/_get_all_details_admin','id asc')->result();

		$data['general_settings']=Modules::run('general_setting/_get_where', DEFAULT_OUTLET)->row_array();

		$this->load->view('login_form',$data);

	}

	///////////////////////////////////////////////////////////////////////////////////



	function submit_login(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');

		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean|callback_pword_check');

		$username = $this->input->post('username', TRUE);

		$password = md5($this->input->post('password', TRUE)); 

		$row = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("lower(user_name)"=>$username,"password"=>$password), 'id desc','id','users','id,role_id,user_name,email,outlet_id,device,device_id,last_login','1','1','','','')->row();

		if (empty($row)) {

			redirect(ADMIN_BASE_URL);

			exit();

		}

		$where['emp_id'] = $row->id;

		$where1['emp_id'] = $row->id;

		$role_id = $row->role_id;

		$result = Modules::run('roles/_get_where',$role_id)->row();

		$data['user_id'] = $row->id;

		$data['role_id'] = $result->id; 

		$data['name'] = $row->user_name;

		$data['user_image'] = $row->user_image;

		$data['role'] = $result->role;

		$data['user_email'] = $row->email;

		$data['user_name'] = $row->user_name;

		$data['outlet_id'] = $row->outlet_id;

		$data['device'] = $row->device;

		$data['device_id'] = $row->device_id;

		$data['last_login'] =  date("d-m-Y h:i:s", strtotime($row->last_login));

		$data['is_supperadmin'] = 1;

		$this->session->set_userdata('route_user_data', $data);

		$user_data = $this->session->userdata('route_user_data');

		redirect(ADMIN_BASE_URL.'dashboard');

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function pword_check($txtPassword){

		$password = Modules::run('site_security/make_hash',$txtPassword);

		$username = $this->input->post('txtUserName',TRUE);

		$row = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("lower(user_name)"=>$username,"password"=>$password), 'id desc','id','users','id','1','1','','','')->result_array();

		if (empty($row)){

			$this->form_validation->set_message('pword_check', 'The username or password you have entered is incorrect.');

			return FALSE;

		}else{

			return TRUE;

		}

		

	}

	///////////////////////////////////////////////////////////////////////////////////



	function forgot_password_action(){

		$status = 'error';

		$email = $this->input->post('email');

		

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function email_n_code_check($txtEmail){

		$security_code = $this->input->post('txtCode');

		$rndChar = $this->input->post('hdn_code');

		$query = Modules::run("users/_get_where_custom",'email',$txtEmail);

		$result = $query->row();

		if (!isset($result->email)){

			$this->form_validation->set_message('email_n_code_check', 'This email doesn\'t exist.');

			return FALSE;

		}else if($rndChar != $security_code){

			$this->form_validation->set_message('email_check', 'Incorrect security code.');

			return FALSE;

		}else{

			return true;

		}

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function reset_password(){

		$data['email'] = $this->uri->segment(4);

//		$data['code'] = $this->uri->segment(5);	

		$this->load->view('reset_password', $data);

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function submit_reset_password(){

		$where['email'] = $this->input->post('email');

//		$where['code'] = $this->session->userdata('code');

		$password = $this->input->post('new_password');

		$data['password'] = md5($password);

		$result = Modules::run("users/_update_where_cols", $where, $data);

		echo $result;

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function password_check($txtEmail){

		$new_password = $this->input->post('txtNewPassword');

		$conf_password = $this->input->post('txtConfPassword');

		if($new_password != $conf_password){

			$this->form_validation->set_message('password_check', 'Password doesn\'t match.');

			return FALSE;

		}else{

			return true;

		}

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function success(){

		$data['view_file'] = 'success';

		$this->load->module('template');

		$this->template->admin_login($data);

	}

	///////////////////////////////////////////////////////////////////////////////////

	

	function logout(){

		$this->session->unset_userdata('flaxfit_user_data');

		$this->session->unset_userdata('outlet_data');

		$this->session->unset_userdata('f_station_id');



		$this->index();

	}

	///////////////////////////////////////////////////////////////////////////////////

	

}