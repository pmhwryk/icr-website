<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}

	function index()
	{
		$data['courses'] = $this->get_course_details(array('courses.outlet_id' => DEFAULT_OUTLET), 'courses.id desc', 'courses.id', '', '0', '', '', '', '0')->result_array();
		$data['view_file'] = 'courses_listing';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function create()
	{
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['courses'] = $this->get_course_details(array('courses.id' => $update_id), 'courses.id desc', 'courses.id', '', '0', '', '', '', '0')->row_array();
		} else {
			$data['courses'] = $this->_get_data_from_post();
		}
		$data['instructors'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET), 'id desc', 'id', 'instructors', '*', '', '0', '', '', '')->result_array();
		$data['categories'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET), 'id desc', 'id', 'course_category', '*', '', '0', '', '', '')->result_array();
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail()
	{
		$update_id = $this->input->post('id');
		if (!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'id' => $update_id), 'id', 'id', 'courses', 'id,link,image,name,status', '1', '1', '', '', '')->row_array();
		$this->load->view('detail', $data);
	}

	function submit()
	{
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'courses');
			if (isset($_FILES['image']) && !empty($_FILES['image'])) {
				if ($_FILES['image']['size'] > 0) {
					$temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id,), 'id', 'id', 'courses', 'image', '1', '0', '', '', '')->row_array();
					if (!empty($temp)) {
						if (isset($temp['image']) && !empty($temp['image'])) {
							Modules::run('api/delete_images_by_name', ACTUAL_COURSE_IMAGE_PATH, '', '', '', $temp['image']);
						}
					}
					Modules::run('api/upload_dynamic_image', ACTUAL_COURSE_IMAGE_PATH, '', '', '', $update_id, 'image', 'image', 'id', 'courses');
				}
			}
			if (isset($_FILES['icon']) && !empty($_FILES['icon'])) {
				if ($_FILES['icon']['size'] > 0) {

					$temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id,), 'id', 'id', 'courses', 'icon', '1', '0', '', '', '')->row_array();
					if (!empty($temp)) {
						if (isset($temp['icon']) && !empty($temp['icon'])) {
							Modules::run('api/delete_images_by_name', ACTUAL_COURSE_IMAGE_PATH, '', '', '', $temp['icon']);
						}
					}
					Modules::run('api/upload_dynamic_image', ACTUAL_COURSE_IMAGE_PATH, '', '', '', $update_id, 'icon', 'icon', 'id', 'courses');
				}
			}
			$this->session->set_flashdata('message', 'Courses updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table', $data, 'courses');
			if (isset($_FILES['image']) && !empty($_FILES['image'])) {
				if ($_FILES['image']['size'] > 0) {
					Modules::run('api/upload_dynamic_image', ACTUAL_COURSE_IMAGE_PATH, '', '', '', $update_id, 'image', 'image', 'id', 'courses');
				}
			}
			$this->session->set_flashdata('message', 'Courses saved successfully.');
		}
		redirect(ADMIN_BASE_URL . 'courses');
	}


	function _get_data_from_post()
	{
		$data['title'] = $this->input->post('title');
		$data['url'] = strtolower(cleanRegExpress($this->input->post('url')));
		$data['description'] = $this->input->post('description');
		$data['category_id'] = $this->input->post('category_id');
		$data['duration'] = $this->input->post('duration');
		$data['instructor_id'] = $this->input->post('instructor_id');
		$data['outlet_id'] = DEFAULT_OUTLET;
		return $data;
	}

	function get_course_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset)
	{
		$this->load->model('Mdl_courses');
		$query = $this->Mdl_courses->get_course_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset);
		return $query;
	}

	function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else {
			$status = 1;
		}
		$data = array('status' => $status);
		Modules::run('api/update_specific_table', array('id' => $id), $data, 'courses');
		echo $status;
	}

	function delete()
	{
		$id = $this->input->post('id');
		if (isset($id) && !empty($id) && $id > 0) {
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'id' => $id), 'id', 'id', 'courses', 'image', '1', '1', '', '', '')->row_array();
			if (!empty($old_data['image']))
				Modules::run('api/delete_images_by_name', ACTUAL_GENERAL_SETTING_IMAGE_PATH, '', '', '', $old_data['image']);
			Modules::run('api/delete_from_specific_table', array('id' => $id), 'courses');
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
			Modules::run('api/update_specific_table', array('id' => $id), array('image' => null), 'courses');
			Modules::run("api/delete_images_by_name", ACTUAL_GENERAL_SETTING_IMAGE_PATH, '', '', '', $name);
		}
		echo "<article lang=''><message>" . $message . "</message><status>" . $status . "</status></article>";
	}

}