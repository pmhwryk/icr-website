<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array(), 'id','id','pricing','id,name,short_desc,status','1','0','','','');
		$data['view_file'] = 'main_view';
		$this->load->module('template');
		$this->template->admin($data);
    }
    function detail() {
		$update_id = $this->input->post('id');
		//if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','pricing','id,name,short_desc,size,price,users,duration,status','1','1','','','')->row_array();
		$this->load->view('detail', $data);
    }
    


    function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','pricing','id,name,short_desc,status,size,users,price,duration','1','1','','','')->row_array();
		} else {
			$data['services'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
    }
    function _get_data_from_post() {

        $data['name'] = $this->input->post('name');
        $data['users'] = $this->input->post('user');
        $data['price'] = $this->input->post('price');
        $data['size'] = $this->input->post('size');
        $data['status'] = "1";
        $data['duration'] = $this->input->post('duration');
		$data['short_desc'] = $this->input->post('description');
        $data['short_desc'] = (isset($data['short_desc']) && !empty($data['short_desc']) ? $data['short_desc'] : '');
		return $data;
    }
    function submit() {
		$update_id = $this->input->post('update_id');
        $data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'pricing');
			$this->session->set_flashdata('message', 'Prices updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'pricing');
			$this->session->set_flashdata('message', 'Prices saved successfully.');
		}
		redirect(ADMIN_BASE_URL.'pricing');
    }

    function delete() {
        $id = $this->input->post('id');
        if(isset($id) && !empty($id) && $id > 0) 
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'pricing');
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
            Modules::run('api/update_specific_table',array('id'=>$id),$data,'pricing');
            echo $status;
        }



}