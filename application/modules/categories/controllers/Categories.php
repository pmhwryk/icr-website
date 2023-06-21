<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        Modules::run('site_security/is_login');
        Modules::run('site_security/has_permission');
    }

    function index()
    {
        $data['category'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'course_category', '*', '1', '0', '', '', '')->result_array();
        $data['view_file'] = 'category_listing';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create()
    {
        $update_id = $this->uri->segment(4);
        if ($update_id && $update_id != 0) {
            $data['users'] = Modules::run('api/_get_specific_table_with_pagination', array("id" => $update_id), "id desc", "course_category", ",id,title", "1", "1")->row_array();
        } else {
            $data['users'] = $this->input->post('title');
        }
        $data['view_file'] = 'category_form';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit()
    {
        $update_id = $this->uri->segment(4);
        $data['title'] = $this->input->post('title');
        $data['outlet_id'] = DEFAULT_OUTLET;
        if ($update_id && $update_id != 0) {
            Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'course_category');
            $this->session->set_flashdata('message', 'Category' . ' ' . DATA_UPDATED);
            $this->session->set_flashdata('status', 'success');
        } else {
            $update_id = Modules::run('api/insert_into_specific_table', $data, 'course_category');
            $this->session->set_flashdata('message', 'Category' . ' ' . DATA_SAVED);
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'categories');
    }

    function delete()
    {
        $id = $this->input->post('id');
        Modules::run('api/delete_from_specific_table', array('id' => $id), 'course_category');
    }

    /////////////// for detail ////////////
    function detail()
    {
        $update_id = $this->input->post('id');
        $data['users_res'] = Modules::run('api/_get_specific_table_with_pagination', array("id" => $update_id), "id desc", "course_category", ",id,title", "1", "1")->row_array();
        $data['update_id'] = $update_id;
        $this->load->view('detail', $data);
    }
}
