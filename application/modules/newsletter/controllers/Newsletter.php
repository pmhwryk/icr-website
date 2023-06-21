<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsletter extends MX_Controller
{

function __construct() {
parent::__construct();
// Modules::run('site_security/is_login');
        //Modules::run('site_security/has_permission');

}

    function index() {
        $this->manage();
    }

    function manage() {
        $data['news'] = $this->_get('id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }
     function delete() {
        $delete_id = $this->input->post('id');
        $where['id']=$delete_id;
        $this->_delete($where);
    }
    
///////////////////////////     HELPER FUNCTIONS    ////////////////////
    function _get($order_by) {
        $this->load->model('mdl_newsletter');
        $query = $this->mdl_newsletter->_get($order_by);
        return $query;
    }
    function _delete($arr_col) {       
        $this->load->model('mdl_newsletter');
        $this->mdl_newsletter->_delete($arr_col);
    }
    function detail() {
        $update_id = $this->input->post('id');
        $data['post'] = $this->_get_data_from_db($update_id);
        $this->load->view('detail', $data);
    }
    function _get_data_from_db($update_id) {
        $where['newsletter_us.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['email'] = $row->email;
            
                 }
        return $data;
    }
    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_newsletter');
        return $this->mdl_newsletter->_get_by_arr_id($arr_col);
    }
    function get_form_post() {
        $data['email'] = $this->input->post('email');
        return $data;
    }

    function submit() {
        $data = $this->get_form_post();
        if(!empty($data))
            $this->_insert($data);
        redirect(BASE_URL);
    }

    function _insert($data){
        $this->load->model('mdl_newsletter');
        return $this->mdl_newsletter->_insert($data);
    }
}