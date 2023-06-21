<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meta_tags_html extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby','', 'id','id','meta_tags_html','*','1','0','','','');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['meta_data'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','meta_tags_html','*','1','1','','','')->row_array();
		}
		$data['page_id'] = $this->uri->segment(4);
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail() {
		$update_id = $this->input->post('id');
		if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$update_id), 'id','id','meta_tags_html','id,name,description,image,status','1','1','','','')->row_array();
		$this->load->view('detail', $data);
	}

	function submit() {
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'meta_tags_html');
			$this->session->set_flashdata('message', 'meta_tags_html updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'meta_tags_html');
			$this->session->set_flashdata('message', 'meta_tags_html saved successfully.');
		}
		redirect(ADMIN_BASE_URL.'meta_tags_html');
	}
	function _get_data_from_post() {
	    $data['meta_tag'] = htmlentities($this->input->post('meta_tag'));
	    if($this->input->post('url'))
	    	$data['url'] = $this->input->post('url');
	    if($this->input->post('page_id'))
	    	$data['page_id'] = $this->input->post('page_id');
		if($this->input->post('meta_description'))
	    	$data['meta_description'] = $this->input->post('meta_description');
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
		Modules::run('api/update_specific_table',array('id'=>$id),$data,'meta_tags_html');
		echo $status;
	}
	
	function delete() {
		$id = $this->input->post('id');
		$status = 'error';
        $message = 'Please try later';
		if(isset($id) && !empty($id) && $id > 0) {
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'meta_tags_html');
			$status = 'info';
			$message = 'Image delete successfully';
		}
		echo "<article lang=''><message>".$message."</message><status>".$status."</status></article>";
	}
	
}