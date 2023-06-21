<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Batch extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        Modules::run('site_security/is_login');
        Modules::run('site_security/has_permission');
    }

    function index()
    {
        $data['batches'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array(), 'id desc', 'id', 'batch', '*', '1', '0', '', '', '')->result_array();
        $data['view_file'] = 'batch_listing';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create()
    {
        $update_id = $this->uri->segment(4);
        if ($update_id && $update_id != 0) {
            $data['batch'] = Modules::run('api/_get_specific_table_with_pagination', array("id" => $update_id), "id desc", "batch", "*", "1", "1")->row_array();
        } else {
            $data['batch'] = $this->get_data_from_post();
        }
        $data['view_file'] = 'batch_form';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit()
    {
        $update_id = $this->uri->segment(4);
        $data = $this->get_data_from_post();
        if ($update_id && $update_id != 0) {
            Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'batch');
            $this->session->set_flashdata('message', 'Success Story' . ' ' . DATA_UPDATED);
            $this->session->set_flashdata('status', 'success');
        } else {
            $update_id = Modules::run('api/insert_into_specific_table', $data, 'batch');
            $this->session->set_flashdata('message', 'Success Story' . ' ' . DATA_SAVED);
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'batch');
    }

    function change_status_category()
    {
        $update_id = $this->input->post('id');
        $status = $this->input->post('status');
        Modules::run('api/update_specific_table', array(), array('is_default' => 0), 'batch');
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        $data = array('is_default' => $status);
        Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'batch');
    }

    function get_data_from_post()
    {
        $data['title'] = $this->input->post('title');
        $data['start_date'] = $this->input->post('start_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['outlet_id'] = DEFAULT_OUTLET;
        return $data;
    }

    function delete()
    {
        $id = $this->input->post('id');
        Modules::run('api/delete_from_specific_table', array('id' => $id), 'batch');
    }
}
