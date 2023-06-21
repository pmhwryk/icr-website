<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Enrollment extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}

	function index()
	{
		// $data['enrollments'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET), 'id desc', 'id', 'enrollment', '*', '', '0', '', '', '')->result_array();
		$data['enrollments'] = $this->get_enrollment_data_with_all_details(array('enrollment.outlet_id' => DEFAULT_OUTLET), 'enrollment.id desc', 'enrollment.id', '1', '', '', '', '', '')->result_array();
		$data['view_file'] = 'enrollment_listing';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail()
	{
		$update_id = $this->input->post('id');
		if (!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['enrollment'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id), 'id desc', 'id', 'enrollment', '*', '', '0', '', '', '')->row_array();
		$this->load->view('detail', $data);
	}

	function get_enrollment_data_with_all_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset)
	{
		$this->load->model('Mdl_enrollment');
		$query = $this->Mdl_enrollment->get_enrollment_data_with_all_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset);
		return $query;
	}

	function sent_installment_to_student($data)
	{
		$email = strtolower($data['student']['email']);
		$this->load->library('email');
		$port = 465;
		$user = "info@pos.fajira.com";
		$pass = "hbJ0~&Aw}@z$";
		$host = 'ssl://pos.fajira.com';
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => $host,
			'smtp_port' => $port,
			'smtp_user' =>  $user,
			'smtp_pass' =>  $pass,
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n"
		);
		$this->email->initialize($config);
		$this->email->from($user, DEFAULT_OUTLET_NAME);
		$this->email->to($email);
		$this->email->subject(DEFAULT_OUTLET_NAME . ' - Student Fee Voucher :');
		$message = $this->load->view('voucher', $data, true);
		$this->email->message($message);
		$this->email->send();
		echo 'true';
	}

	function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$name = $this->input->post('name');
		if ($status == 1)
			$status = 0;
		else {
			$status = 1;
		}
		date_default_timezone_set("Asia/Karachi");

		$data = array('is_paid' => $status, 'payment_receive_by' => $name, 'payment_datetime' => date('Y-m-d H:i:s'));
		Modules::run('api/update_specific_table', array('id' => $id), $data, 'installments');
		echo $status;
	}

	function delete()
	{
		$id = $this->input->post('id');
		if (isset($id) && !empty($id) && $id > 0) {
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'id' => $id), 'id', 'id', 'portfolio', 'image', '1', '1', '', '', '')->row_array();
			Modules::run('api/delete_from_specific_table', array('id' => $id), 'installments');
		}
	}
}
