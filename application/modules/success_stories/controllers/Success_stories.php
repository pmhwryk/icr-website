<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Success_stories extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        Modules::run('site_security/is_login');
        Modules::run('site_security/has_permission');
    }

    function index()
    {
        $data['success_stories'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET), 'id desc', 'id', 'success_stories', '*', '1', '0', '', '', '')->result_array();
        $data['view_file'] = 'stories_listing';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create()
    {
        $update_id = $this->uri->segment(4);
        if ($update_id && $update_id != 0) {
            $data['success_story'] = Modules::run('api/_get_specific_table_with_pagination', array("id" => $update_id), "id desc", "success_stories", "*", "1", "1")->row_array();
        } else {
            $data['success_story'] = $this->get_data_from_post();
        }
        $data['view_file'] = 'story_form';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit()
    {
        $update_id = $this->uri->segment(4);
        $data = $this->get_data_from_post();
        if ($update_id && $update_id != 0) {
            Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'success_stories');
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                if ($_FILES['image']['size'] > 0) {
                    $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id,), 'id', 'id', 'success_stories', 'image', '1', '0', '', '', '')->row_array();
                    if (!empty($temp)) {
                        if (isset($temp['image']) && !empty($temp['image'])) {
                            Modules::run('api/delete_images_by_name', SUCCESS_STORIES_IMAGE_PATH, '', '', '', $temp['image']);
                        }
                    }
                    Modules::run('api/upload_dynamic_image', SUCCESS_STORIES_IMAGE_PATH, '', '', '', $update_id, 'image', 'image', 'id', 'success_stories');
                }
            }
            $this->session->set_flashdata('message', 'Success Story' . ' ' . DATA_UPDATED);
            $this->session->set_flashdata('status', 'success');
        } else {
            $update_id = Modules::run('api/insert_into_specific_table', $data, 'success_stories');
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                if ($_FILES['image']['size'] > 0) {
                    Modules::run('api/upload_dynamic_image', SUCCESS_STORIES_IMAGE_PATH, '', '', '', $update_id, 'image', 'image', 'id', 'success_stories');
                }
            }
            $this->session->set_flashdata('message', 'Success Story' . ' ' . DATA_SAVED);
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'success_stories');
    }

    function get_data_from_post()
    {
        $data['name'] = $this->input->post('name');
        $data['job_title'] = $this->input->post('job_title');
        $data['category'] = $this->input->post('category');
        $data['description'] = $this->input->post('description');
        $data['outlet_id'] = DEFAULT_OUTLET;
        return $data;
    }

    function delete()
    {
        $id = $this->input->post('id');
        if (isset($id) && !empty($id) && $id > 0) {
            $old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'id' => $id), 'id', 'id', 'success_stories', 'image', '1', '1', '', '', '')->row_array();
            if (!empty($old_data['image']))
                Modules::run('api/delete_images_by_name', SUCCESS_STORIES_IMAGE_PATH, '', '', '', $old_data['image']);
            Modules::run('api/delete_from_specific_table', array('id' => $id), 'success_stories');
        }
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
            Modules::run('api/update_specific_table', array('id' => $id), array('image' => null), 'success_stories');
            Modules::run("api/delete_images_by_name", SUCCESS_STORIES_IMAGE_PATH, '', '', '', $name);
        }
        echo "<article lang=''><message>" . $message . "</message><status>" . $status . "</status></article>";
    }
}
