<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaves extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = $this->get_leaves_requests_of_students(array('leaves.is_deleted'=>0,'leaves.outlet_id'=>DEFAULT_OUTLET),'leaves.student_id desc','leaves.id','','0','','','','0')->result_array();
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function get_leaves_requests_of_students($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset){
        $this->load->model('Mdl_leaves');
        $query = $this->Mdl_leaves->get_leaves_requests_of_students($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset);
        return $query;
    }

    
	function detail() {
		$update_id = $this->input->post('id');
		if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
		$data['leaves'] = $this->get_leaves_requests_of_students(array('leaves.is_deleted'=>0,'leaves.id'=>$update_id),'leaves.student_id desc','leaves.id','','0','','','','0')->row_array();
		$this->load->view('detail', $data);
	}
	function get_approval_name(){
		$update_id = $this->input->post('id');
		if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
		$data['leaves'] = $this->get_leaves_requests_of_students(array('leaves.id'=>$update_id),'leaves.id desc','leaves.id','','0','','','','0')->row_array();
		$this->load->view('receiver', $data);
	}

	function check_student_fee(){
		$status = true;
		$student_id = $this->input->post('student_id');
		$data['fee'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$student_id,'outlet_id'=>DEFAULT_OUTLET), 'id','id','students','totall_fee_package','1','1','','','')->row_array();
		$installments= Modules::run('api/get_specific_table_with_pagination_where_groupby',array('student_id'=>$student_id,'outlet_id'=>DEFAULT_OUTLET), 'id','id','installments','installment_amount,installment_number,is_paid','1','','','','')->result_array();
		$totall_paid=0;
		$installment_number=0;
		$totall_fee=0;
		if(isset($installments) && !empty($installments)){
			foreach($installments as $row){
				
				if($row['is_paid']==1){
					$installment_number++;
					$totall_paid+=$row['installment_amount'];

				}
			}
		}
		$totall_fee = $data['fee']['totall_fee_package'];
		$remaining_fee =$totall_fee-$totall_paid;
		header('Content-Type: application/json');
        echo json_encode(array("status" => $status,"total_fee" => $totall_fee,'remaining_fee'=>$remaining_fee,'installments_number'=>$installment_number));
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
        $message = $this->load->view('voucher',$data,true);
        $this->email->message($message);
        $this->email->send();
        echo 'true';
    }
	function _get_data_from_post() {
	    $data['title'] = $this->input->post('title');
	    $data['student_id'] = $this->input->post('student_id');
	    $data['description'] = $this->input->post('description');
		$data['due_date'] = $this->input->post('payment_date');
		$data['installment_amount'] = $this->input->post('installment_amount');

		return $data;
	}
		
	function change_status() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$name = $this->input->post('name');
		if ($status == 'Approved')
			$status = 'Rejected';
		else {
			$status = 'Approved';
		}
		date_default_timezone_set("Asia/Karachi");

		$data = array('approval_status' => $status,'approved_by'=>$name,'approval_datetime'=>date('Y-m-d H:i:s'));
		Modules::run('api/update_specific_table',array('id'=>$id),$data,'leaves');
		echo $status;
	}
	function delete() {
		$id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) {
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$id), 'id','id','portfolio','image','1','1','','','')->row_array();
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'installments');
		}
	}
}