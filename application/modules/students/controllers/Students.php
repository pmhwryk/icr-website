<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = $this->get_student_data_with_all_details(array('students.is_deleted'=>0,'students.outlet_id'=>DEFAULT_OUTLET),'students.id desc','students.id','','0','','','','0')->result_array();
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}
	function get_student_data_with_all_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset){
        $this->load->model('Mdl_students');
        $query = $this->Mdl_students->get_student_data_with_all_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset);
        return $query;
    }
	function student_with_multiple_instructors($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset){
		$this->load->model('Mdl_students');
        $query = $this->Mdl_students->student_with_multiple_instructors($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset)->result_array();
		return $query;
    }
	
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['students'] = $this->get_student_data_with_all_details(array('students.id'=>$update_id,'students.outlet_id'=>DEFAULT_OUTLET),'students.id desc','students.id','','0','','','','0')->row_array();
			$data['courses'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','courses','*','','0','','','')->result_array();
			$data['instructors'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','instructors','*','','0','','','')->result_array();
			$data['categories'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','course_category','*','','0','','','')->result_array();
		} else {
			$data['students'] = $this->_get_data_from_post();
			$data['courses'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','courses','*','','0','','','')->result_array();
			$data['instructors'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','instructors','*','','0','','','')->result_array();
			$data['categories'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','course_category','*','','0','','','')->result_array();

		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail() {
		$update_id = $this->input->post('id');
		if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$update_id), 'id','id','students','*','1','1','','','')->row_array();
		$this->load->view('detail', $data);
	}

	function submit() {
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'students');
			$instData=$this->input->post('student_id');
			$instructors= $this->input->post('instructor_id');
			if(isset($instData) && !empty($instData)){
				for($x = 0; $x < sizeof($instructors); $x++){
					$updateArray[] = array(
						'instructor_id'=>$instructors[$x],
						'student_id'=>$instData
					);
					Modules::run('api/delete_from_specific_table',array('student_id'=>$instData),'studendinstructors');
				}
				foreach($updateArray as $row){
					$st_ins_data['instructor_id'] = $row['instructor_id'];
					$st_ins_data['student_id'] = $row['student_id'];
					$st_ins_data['outlet_id'] = DEFAULT_OUTLET;
					$checkPrev = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('student_id'=>$update_id,'instructor_id'=>$st_ins_data['instructor_id']), 'id','id','studendinstructors','instructor_id,student_id','1','1','','','')->row_array();
					if(empty($checkPrev)){
						Modules::run('api/insert_into_specific_table',$st_ins_data,'studendinstructors');
					}
				}
			}
			
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					$temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id'=>$update_id,'outlet_id'=>DEFAULT_OUTLET), 'id', 'id', 'students', 'image', '1', '0', '', '', '')->row_array();
                    if(!empty($temp)){
                        if(isset($temp['image']) && !empty($temp['image'])){
                            Modules::run('api/delete_images_by_name',ACTUAL_COURSE_IMAGE_PATH,'','','',$temp['image']);
                        }
                    }
					Modules::run('api/upload_dynamic_image',ACTUAL_COURSE_IMAGE_PATH,'','','',$update_id,'image','image','id','students');
				}
			}
			$this->session->set_flashdata('message', 'Students updated successfully.');
		}else {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'students');
			if(isset($update_id) && !empty($update_id)){
				$instructors= $this->input->post('instructor_id');
				foreach($instructors as $row){
					$instData['instructor_id'] = $row;
					$instData['student_id']=$update_id;
					Modules::run('api/insert_into_specific_table',$instData,'studendinstructors');
				}
				if(isset($_FILES['image']) && !empty($_FILES['image'])) {
					if($_FILES['image']['size'] > 0) {
						Modules::run('api/upload_dynamic_image',ACTUAL_COURSE_IMAGE_PATH,'','','',$update_id,'image','image','id','students');
					}
				}
			}
			
			$this->session->set_flashdata('message', 'Students saved successfully.');
		}
		redirect(ADMIN_BASE_URL.'students');
	}
	function _get_data_from_post() {
	    $data['fullname'] = $this->input->post('fullname');
	    $data['username'] = $this->input->post('username');
	    $data['email'] = $this->input->post('email');
		$password=$this->input->post('password');
		$data['password'] = md5($password);
	    $data['profile_description'] = $this->input->post('profile_description');
		$data['address'] = $this->input->post('address');
		$data['dob'] = $this->input->post('dob');

		$data['course_id'] = $this->input->post('course_id');
	    $data['fiver_account_link'] = $this->input->post('fiver_account_link');
	    $data['phone'] = $this->input->post('phone');
		$data['roll_number'] = $this->input->post('roll_number');
	    $data['batch'] = $this->input->post('batch');
	    $data['totall_fee_package'] = $this->input->post('totall_fee_package');
		$data['course_enroll_date'] = $this->input->post('course_enroll_date');
	    $data['course_end_date'] = $this->input->post('course_end_date');
		$data['outlet_id'] = DEFAULT_OUTLET;
		return $data;
	}
		
	function change_status() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else {
			$status = 1;
		}
		$data = array('status' => $status);
		Modules::run('api/update_specific_table',array('id'=>$id),$data,'students');
		echo $status;
	}
	function delete() {
		$id = $this->input->post('id');
		$status = $this->input->post('delete');
		if($status==1){
			$status=0;
		}else{
			$status=1;
		}
		$data['is_deleted'] = $status;
		if(isset($id) && !empty($id) && $id > 0) {
			Modules::run('api/update_specific_table',array('id'=>$id),$data,'students');
		}
	}
	
	function change_password() {
        $update_id = $this->input->post('id');
		$data['users'] =  Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=> $update_id), 'id','id','students','username,password,id','1','1','','','')->row_array();
        $data['update_id'] = $update_id;
        $this->load->view('password_form', $data);
    }

	function change_pass() {  
		$status =  false;
        $update_id = $this->input->post('update_id');
        $data['password']  = md5($this->input->post('password'));
        if ($update_id && $update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'students');                 
            $this->session->set_flashdata('message', 'Students'.' '.'updated successfully');                                     
            $this->session->set_flashdata('status', 'success');
			$status =  true;
        }        
        
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status,"data" => $data));
    }

	
	function _get_data_from_post_password() {
        $data['username'] = $this->input->post('username');
        $data['password'] =  md5($this->input->post('password'));
        return $data;
    }

}