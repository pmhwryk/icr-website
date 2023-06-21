<?php
/************************************************
Created By: Akabir Abbasi
Dated: 21-10-2014
version: 1.0
*************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Outlet_roles extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
Modules::run('site_security/has_permission');

}

    function index() {
		$where_user['id'] = $this->uri->segment(4);
        $res_user = Modules::run("users/_get_by_arr_id", $where_user)->row();
		$data['query'] = $this->_get_where_custom('emp_id', $res_user->id);
		$update_id = $this->uri->segment(5);
        if (is_numeric($update_id)) {
            $data['role_outlet'] = $this->_get_data_from_db($update_id);
        } else {
            $data['role_outlet'] = $this->_get_data_from_post();
        }
		$data['arr_outlet'] = Modules::run("outlet/get_outlets_array");
		$data['res_user'] = $res_user;
        $data['update_id'] = $update_id;
        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create() {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id)) {
            $data['fiscal_year'] = $this->_get_data_from_db($update_id);
        } else {
            $data['fiscal_year'] = $this->_get_data_from_post();
        }
        $data['arr_month'] = $this->config->item('arr_month');
        $data['arr_year'] = $this->config->item('arr_year');
        $data['update_id'] = $update_id;
        $data['view_file'] = 'create';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function _get_data_from_db($update_id) {
		$where['id'] = $update_id;
        $row = $this->_get_by_arr_id($where)->row();
		$data['emp_id'] = $row->emp_id;
		$data['role_id'] = $row->role_id;
		$data['outlet_id'] = $row->outlet_id;
        return $data;
    }

    function _get_data_from_post() {
        $data['emp_id'] = $this->input->post('hdn_employee_id');
        $data['role_id'] = $this->input->post('role_id');
        $data['outlet_id'] = $this->input->post('outlet_id');
        return $data;
    }

    function submit() {
        $update_id = $this->input->post('hdn_outlet_role_id');
		$data = $this->_get_data_from_post();
		if (is_numeric($update_id) && $update_id > 0) {
			$this->_update($update_id, $data);
			echo 1;return;
		}
		if (!is_numeric($update_id)) {
			$where_outlet_role['emp_id'] = $data['emp_id'];
			$where_outlet_role['outlet_id'] = $data['outlet_id'];
			$check_exist = $this->_get_by_arr_id($where_outlet_role);
			if($check_exist->num_rows() > 0){
				echo 2;return;
			}else{
				$this->_insert($data);
				echo 3;return;
			}
		}
	}
	
	function edit(){
		$outlet_role_id = $this->input->post('id');
		$where_user['id'] = $this->input->post('emp_id');
        $res_user = Modules::run("users/_get_by_arr_id", $where_user)->row();
		$data['res_user'] = $res_user;
		$data['role_outlet'] = $this->_get_data_from_db($outlet_role_id);
		$data['outlet_role_id'] = $outlet_role_id;
		$data['arr_outlet'] = Modules::run("outlet/get_outlets_array");
		$this->load->view('edit_outlet_role', $data);
	}

    function delete() {
        $delete_id = $this->input->post('id');
        $this->_delete($delete_id);
		$id = $this->_get_max();
		$id = $this->_set_active($id);
    }

	function get_outlet_roles(){
		$user_id = $this->uri->segment(4);
		$data['outlet_roles'] = $this->_get_where_custom('emp_id', $user_id);
		$this->load->view('outlet_role_data', $data);
	}

	function get_roles_outlets_combo(){
		$station_id = $this->uri->segment(4);
		$where_roles['outlet_id'] = $station_id;
		$arr_roles = Modules::run("roles/_get_by_arr_id", $where_roles);
		$html='<select class="form-control select2me" name="role_id">';
		$html.='<option value="">--Select Role--</option>';
		if($arr_roles->num_rows > 0){ 
			foreach($arr_roles->result_array() as $row){
				$html.='<option value="'.$row['id'].'">'.$row['role'].'</option>';
			}
		}
		$html.='</select>';
		echo $html;
	}

	function get_roles_outlets_combo_selected(){
		$station_id = $this->uri->segment(4);
		$emp_id = $this->uri->segment(5);
		$where_outlet_role['outlet_id'] = $station_id;
		$where_outlet_role['emp_id'] = $emp_id;
		$row_outlet_role = $this->_get_by_arr_id($where_outlet_role)->row();

		$where_roles['outlet_id'] = $station_id;
		$arr_roles = Modules::run("roles/_get_by_arr_id", $where_roles);

		$html ='<select class="form-control select2me" name="role_id">';
		$html.='<option value="">--Select Role--</option>';
		if($arr_roles->num_rows > 0){ 
			foreach($arr_roles->result_array() as $row){
				$attr = '';
				if($row_outlet_role->role_id == $row['id']){$attr = 'selected="selected"';}
				$html .= '<option value="'.$row['id'].'" '.$attr.'>'.$row['role'].'</option>';
			}
		}
		$html.='</select>';
		echo $html;
	}

    ////////////////////// GENERAL FUNCTIONS //////////////////////
    function _getById($id) {
        $this->load->model('mdl_outlet_roles');
        return $this->mdl_outlet_roles->_getById($id);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_outlet_roles');
        return $this->mdl_outlet_roles->_get_by_arr_id($arr_col);
    }

    function _get($order_by) {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->get($order_by);
        return $query;
    }

    function _get_all($order_by) {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->_get_all($order_by);
        return $query;
    }

    function _get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function _get_where_custom($col, $value) {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_outlet_roles');
        return $this->mdl_outlet_roles->_insert($data);
    }
	
    function _update($id, $data) {
        $this->load->model('mdl_outlet_roles');
        return $this->mdl_outlet_roles->_update($id, $data);
    }

    function _update_where($column, $data) {
        $this->load->model('mdl_outlet_roles');
        return $this->mdl_outlet_roles->_update_where($column, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_outlet_roles');
        $this->mdl_outlet_roles->_delete($id);
    }

    function _count_where($column, $value) {
        $this->load->model('mdl_outlet_roles');
        $count = $this->mdl_outlet_roles->count_where($column, $value);
        return $count;
    }

    function _get_max() {
        $this->load->model('mdl_outlet_roles');
        $max_id = $this->mdl_outlet_roles->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->_custom_query($mysql_query);
        return $query;
    }

    function _pword_check($username, $password) {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->pword_check($username, $password);
        return $query;
    }

    function _get_records() {
        $this->load->model('mdl_outlet_roles');
        return $this->mdl_outlet_roles->_get_records();
    }

	function _get_where($where, $order_by='') {
        $this->load->model('mdl_outlet_roles');
        $query = $this->mdl_outlet_roles->_get_where($where, $order_by);
        return $query;
    }
}