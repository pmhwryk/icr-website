<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Point extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array(), 'id','id','points','id,title,status,is_deleted','1','0','','','');

		$data['view_file'] = 'main_view';
		$this->load->module('template');
		$this->template->admin($data);
    }
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','points','id,title,status,is_deleted','1','1','','','')->row_array();
			
		} else {
			$data['services'] = $this->_get_data_from_post();
		}
		 
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
    }
    function _get_data_from_post() {
        $data['title'] = $this->input->post('name');
        $data['status'] = "1";
		
		$data['is_deleted']=0;
		return $data;
    }
    function submit() {
		$i=0;
		$update_id = $this->input->post('update_id');
        $data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'points');

			$this->session->set_flashdata('message', 'Prices updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'points');
                   }
			$this->session->set_flashdata('message', 'Prices saved successfully.');
		
		redirect(ADMIN_BASE_URL.'point');
    }

    function delete() {
        $id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) 
		{
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'points');
				
        }
	}

}