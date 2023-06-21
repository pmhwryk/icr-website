<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id','id','subscribe','id,email','1','0','','','');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','subscribe','id,email','1','1','','','')->row_array();
		} else {
			$data['services'] = $this->_get_data_from_post();
		}
		for ($i = 1; $i <= 30; $i++) {
			$resultRank[$i] = $i;
		}
		$data['rank'] = $resultRank;
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail() {
		$update_id = $this->input->post('id');
		if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','subscribe','id,email','1','1','','','')->row_array();
		$this->load->view('detail', $data);
	}

	function submit() {
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'subscribe');
			$this->session->set_flashdata('message', 'subscribe updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'subscribe');
			$this->session->set_flashdata('message', 'subscribe saved successfully.');
		}
		redirect(ADMIN_BASE_URL.'subscribe');
	}
	function _get_data_from_post() {
	    $data['email'] = $this->input->post('email');
	
		return $data;
	}
		
	function change_status() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else {
			$status = 1;
		}
		$data = array('status' => $status);
		Modules::run('api/update_specific_table',array('id'=>$id),$data,'subscribe');
		echo $status;
	}
	function delete() {
		$id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0)
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'subscribe');
	}	
}