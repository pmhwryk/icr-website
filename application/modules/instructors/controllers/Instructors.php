<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Instructors extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        Modules::run('site_security/is_login');
        Modules::run('site_security/has_permission');
    }

    function index()
    {
        $data['instructor'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('is_deleted' => 0, 'outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'instructors', '*', '1', '0', '', '', '')->result_array();
        $data['view_file'] = 'instructors_listing';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create()
    {
        $update_id = $this->uri->segment(4);
        if ($update_id && $update_id != 0) {
            $data['users'] = Modules::run('api/_get_specific_table_with_pagination', array("id" => $update_id), "id desc", "instructors", ",id,name,designation,image", "1", "1")->row_array();
        } else {
            $data['users'] = $this->get_data_from_post();
        }
        $data['view_file'] = 'instructors_form';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit()
    {
        $update_id = $this->uri->segment(4);
        $data = $this->get_data_from_post();
        if ($update_id && $update_id != 0) {
            Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'instructors');
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                if ($_FILES['image']['size'] > 0) {
                    $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id,), 'id', 'id', 'instructors', 'image', '1', '0', '', '', '')->row_array();
                    if (!empty($temp)) {
                        if (isset($temp['image']) && !empty($temp['image'])) {
                            Modules::run('api/delete_images_by_name', ACTUAL_INSTRUCTOR_IMAGE_PATH, '', '', '', $temp['image']);
                        }
                    }
                    Modules::run('api/upload_dynamic_image', ACTUAL_INSTRUCTOR_IMAGE_PATH, '', '', '', $update_id, 'image', 'image', 'id', 'instructors');
                }
            }
            $this->session->set_flashdata('message', 'Instructors' . ' ' . DATA_UPDATED);
            $this->session->set_flashdata('status', 'success');
        } else {
            $update_id = Modules::run('api/insert_into_specific_table', $data, 'instructors');
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                if ($_FILES['image']['size'] > 0) {
                    $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id,), 'id', 'id', 'instructors', 'image', '1', '0', '', '', '')->row_array();
                    if (!empty($temp)) {
                        if (isset($temp['image']) && !empty($temp['image'])) {
                            Modules::run('api/delete_images_by_name', ACTUAL_INSTRUCTOR_IMAGE_PATH, '', '', '', $temp['image']);
                        }
                    }
                    Modules::run('api/upload_dynamic_image', ACTUAL_INSTRUCTOR_IMAGE_PATH, '', '', '', $update_id, 'image', 'image', 'id', 'instructors');
                }
            }
            $this->session->set_flashdata('message', 'Instructors' . ' ' . DATA_SAVED);
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'instructors');
    }

    function get_data_from_post()
    {
        $data['name'] = $this->input->post('name');
        $data['designation'] = $this->input->post('designation');
        $data['outlet_id'] = DEFAULT_OUTLET;
        return $data;
    }

    function delete()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('is_deleted');
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data['is_deleted'] = $status;
        Modules::run('api/update_specific_table', array('id' => $id), $data, 'instructors');
    }

    function delete_image()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('image');
        $status = 'error';
        $message = 'Please try later';
        if (!empty($id) && is_numeric($id) && $id > 0 && !empty($name)) {
            $status = 'info';
            $message = 'Image delete successfully';
            Modules::run('api/update_specific_table', array('id' => $id), array('image' => null), 'instructors');
            Modules::run("api/delete_images_by_name", ACTUAL_INSTRUCTOR_IMAGE_PATH, '', '', '', $name);
        }
        echo "<article lang=''><message>" . $message . "</message><status>" . $status . "</status></article>";
    }

}
