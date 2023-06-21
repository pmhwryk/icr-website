<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Language extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');

}

    function index() {
        $this->manage();
    }

    function manage() {
        $data['news'] = $this->_get('language_id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
      function create() {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id) && $update_id != 0) {
            $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin_form($data);
    }

    function _get_data_from_post() {
        $data['language_name'] = $this->input->post('language_name');
        return $data;
    }
       function _get_data_from_db($update_id) {
        $where['language_id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['language_name'] = $row->language_name;
           
        }
        return $data;
    }
    function submit() {

            $update_id = $this->uri->segment(4);
            $data = $this->_get_data_from_post();
            if (is_numeric($update_id) && $update_id != 0) {
                $where['language_id'] = $update_id;
                $this->_update($where, $data);
                $this->session->set_flashdata('message', 'language'.' '.DATA_UPDATED);                                      
                        $this->session->set_flashdata('status', 'success');
            }
            if (is_numeric($update_id) && $update_id == 0) {
                $id = $this->_insert($data);
                $this->session->set_flashdata('message', 'language'.' '.DATA_SAVED);                                        
                $this->session->set_flashdata('status', 'success');
            }
            redirect(ADMIN_BASE_URL . 'language');
        
    }
    function detail() {
        $update_id = $this->input->post('id');
        $data['post'] = $this->_get_data_from_db($update_id);
        $this->load->view('detail', $data);
    }
     function change_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($status == PUBLISHED)
            $status = UN_PUBLISHED;
        else
            $status = PUBLISHED;
        $data = array('language_status' => $status);
        $status = $this->_update_id($id, $data);
        echo $status;
    }
    function delete() {
        $delete_id = $this->input->post('id');
        $where['language_id'] = $delete_id;
        $this->_delete($where);
    }

    //////////////////////////////////////////////////////

     function _get($order_by) {
        $this->load->model('mdl_language');
        $query = $this->mdl_language->_get($order_by);
        return $query;
    }
       function _insert($data) {
        $this->load->model('mdl_language');
        return $this->mdl_language->_insert($data);
    }
      function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_language');
        return $this->mdl_language->_get_by_arr_id($arr_col);
    }
     function _update_id($id, $data) {
        $this->load->model('mdl_language');
        $this->mdl_language->_update_id($id, $data);
    }
    function _update($arr_col, $data) {
        $this->load->model('mdl_language');
        $this->mdl_language->_update($arr_col, $data);
    }
    function _delete($arr_col) {       
        $this->load->model('mdl_language');
        $this->mdl_language->_delete($arr_col);
    }


}