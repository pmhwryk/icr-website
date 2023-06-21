<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_slider extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        Modules::run('site_security/is_login');
    }

    function index()
    {
        $data['home_slider'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'home_slider', '*', '1', '0', '', '', '')->result_array();
        $data['view_file'] = 'listing';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create()
    {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id) && $update_id != 0) {
            $data['home_slider'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id), 'id desc', 'id', 'home_slider', '*', '1', '0', '', '', '')->row_array();
        } else {
            $data['home_slider'] = $this->_get_data_from_post();
        }
        $data['update_id'] = $update_id;
        $data['view_file'] = 'create';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit()
    {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                if ($_FILES['image']['size'] > 0) {
                    Modules::run("api/upload_dynamic_image", ACTUAL_GENERAL_SETTING_IMAGE_PATH, '', '', '', $update_id, "image", "image", "id", "home_slider");
                }
            }
            Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'home_slider');
        } else {
            $data['is_active'] = 1;
            $update_id = Modules::run('api/insert_into_specific_table', $data, 'home_slider');
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                if ($_FILES['image']['size'] > 0) {
                    Modules::run("api/upload_dynamic_image", ACTUAL_GENERAL_SETTING_IMAGE_PATH, '', '', '', $update_id, "image", "image", "id", "home_slider");
                }
            }
        }
        redirect(ADMIN_BASE_URL . 'home_slider');
    }

    function delete()
    {
        $update_id = $this->input->post('id');
        Modules::run('api/delete_from_specific_table', array('id' => $update_id),  'home_slider');
        echo '1';
    }

    function change_status_category()
    {
        $update_id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        $data = array('is_active' => $status);
        Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'home_slider');
        echo $status;
    }

    function _get_data_from_post()
    {
        $data['alt_text'] = $this->input->post('alt_text');
        $data['outlet_id'] = DEFAULT_OUTLET;
        return $data;
    }
}
