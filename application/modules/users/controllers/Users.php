<?php 
/*************************************************
Created By: Imran Haider
Dated: 01-01-2014
version: 1.0
*************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MX_Controller
{

    function __construct() {
    parent::__construct();
        Modules::run('site_security/is_login');
        Modules::run('site_security/has_permission');
    }

    function index() {
		$data['users_rec'] = $this->_get_where_cols(array('status <>'=>'3'), 'id desc')->result_array();
		$data['view_file'] = 'users_listing';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function load_listing() {
		$data['users_rec'] = $this->_get_where_cols(array(), 'id desc')->result_array();
        $this->load->view('listing', $data);      
    }


    function create(){	
        $update_id = $this->uri->segment(4);
		if($update_id && $update_id != 0) {
			$data['users'] = $this->_get_data_from_db($update_id);
		}else{
			$data['users'] = $this->_get_data_from_post();
		}
        $data['update_id'] = $update_id; 
        $arr_roles = Modules::run('roles/_get_by_arr_id',array('id <>'=>'1'))->result_array();
		$roles = array();
        foreach($arr_roles as $row){
            $roles[$row['id']] = $row['role'];
        }
		$data['roles_title'] = $roles;
        $data['view_file'] = 'users_form';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if ($update_id && $update_id != 0) {
            $where['id'] = $update_id;
            $itemInfo = $this->_getItemById($update_id);
            if(isset($_FILES['user_image']) && !empty($_FILES['user_image'])) {
                if(isset($itemInfo->user_image) && !empty($itemInfo->user_image))
                    Modules::run("api/delete_images_by_name",ACTUAL_OUTLET_USER_IMAGE_PATH,LARGE_OUTLET_USER_IMAGE_PATH,MEDIUM_OUTLET_USER_IMAGE_PATH,SMALL_OUTLET_USER_IMAGE_PATH,$itemInfo->user_image);
                if($_FILES['user_image']['size']>0) {
                    Modules::run("api/upload_dynamic_image",ACTUAL_OUTLET_USER_IMAGE_PATH,LARGE_OUTLET_USER_IMAGE_PATH,MEDIUM_OUTLET_USER_IMAGE_PATH,SMALL_OUTLET_USER_IMAGE_PATH,$update_id,"user_image","user_image","id","users");
                }
            }
            $this->_update($where, $data);
			$this->session->set_flashdata('message', 'User'.' '.DATA_UPDATED);				
            $this->session->set_flashdata('status', 'success');                
        }
        else {
            $data = $this->_get_data_from_post();
            $user_data = $this->session->userdata('route_user_data');
            if(!isset($user_data['user_id']))
                $user_data['user_id'] = 0;
            $data['created_user'] = $user_data['user_id'];
            $id = $this->_insert($data);
            if(isset($_FILES['user_image']) && !empty($_FILES['user_image'])) {
                if($_FILES['user_image']['size']>0) {
                    Modules::run("api/upload_dynamic_image",ACTUAL_OUTLET_USER_IMAGE_PATH,LARGE_OUTLET_USER_IMAGE_PATH,MEDIUM_OUTLET_USER_IMAGE_PATH,SMALL_OUTLET_USER_IMAGE_PATH,$id,"user_image","user_image","id","users");
                }
            }
			$this->session->set_flashdata('message', 'User'.' '.DATA_SAVED);
	        $this->session->set_flashdata('status', 'success');
            $data['users'] = $this->_get()->result_array();
            $data['view_file'] = 'users_listing';
            $this->load->module('template');
            $this->template->admin($data);
        }
        redirect(ADMIN_BASE_URL . 'users');
    }

    function _get_data_from_db($update_id) {
        $where['users.id'] = $update_id;
        $query = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("users.id"=>$update_id), 'id desc','id','users','*','1','0','','','');
        foreach ($query->result() as
                $row) {
            $data['user_name'] = $row->user_name;
            $data['country'] = $row->country;
            $data['first_name'] = $row->first_name;
            $data['last_name'] = $row->last_name;
            $data['phone'] = $row->phone;
            $data['address1'] = $row->address1;
            $data['address2'] = $row->address2;
            $data['city'] = $row->city;
            $data['email'] = $row->email;
            $data['country'] = $row->country;
            $data['state'] = $row->state;
            $data['password'] = $row->password;
			$data['role_id'] = $row->role_id;
			$data['user_image'] = $row->user_image;
			$data['gender'] = $row->gender;
        }
        return $data;
    }
    function change_password() {
        $update_id = $this->input->post('id');
        $data['users'] = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $this->load->view('password_form', $data);
    }
    function validate (){
        $user_name = $this->input->post('user_name');
        $user = $this->input->post('user');
        if (defined('DEFAULT_CHILD_OUTLET'))   $nOutlet_id = DEFAULT_CHILD_OUTLET;
        else  $nOutlet_id = DEFAULT_OUTLET;    
        $id = $nOutlet_id;

        $query = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("user_name"=>$user_name,'id <>'=>$user), 'id desc','id','users','id','1','0','','','');
        if ($query->num_rows() > 0) echo '1';
        else echo '0';
    }
    function check_duplicate_email() {
        $message="Please enter email address";
        $type='error';
        $email = $this->input->post('email');
        $user = $this->input->post('user');
        if(!empty($email)) {
            $condition['email'] = $email;
            if(!empty($user))
                $condition['id <>'] = $user;
            $checking = Modules::run('api/_get_specific_table_with_pagination',$condition, 'id asc','users','email','1','1')->result_array();
            if(empty($checking)) {
                $type='success';
                $message = "email verified";
            }
            else
                $message = "Please enter unique email address.";
        }
        echo "<article lang=''><message>".$message."</message><type>".$type."</type></article>";
    }
    function _get_data_from_post() {
		$data['user_name'] = $this->input->post('user_name');
		$data['country'] = $this->input->post('country');
		$data['state'] = $this->input->post('state');
		$data['city'] = $this->input->post('city');
		$data['address1'] = $this->input->post('address1');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
        $data['first_name'] = $this->input->post('first_name');
        $data['last_name'] = $this->input->post('last_name');
        $data['gender'] = $this->input->post('gender');
		$password = $this->input->post('password');
		if(isset($password) && !empty($password))
			$data['password'] =  $this->hashpassword($this->input->post('password'));
		$data['role_id'] = $this->input->post('role_id'); 
		$data['outlet_id'] = DEFAULT_OUTLET;
        $data['status'] = 1;
     
        return $data;
    }

    function delete(){
        $id = $this->input->post('id');
        $user_checking = Modules::run('api/_get_specific_table_with_pagination',array("id"=>$id), "id desc","users","user_image","1","1")->result_array();
        if(!empty($user_checking)) {
            Modules::run('api/update_specific_table',array("id"=>$id),array("status"=>'3'),"users")->result_array();
        }
    }

    function change_pass() {  
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post_password();
        if ($update_id && $update_id != 0) {
            $where['id'] = $update_id;
            $this->_update($where, $data);                        
            $this->session->set_flashdata('message', 'Password'.' '.'updated successfully');                                     
            $this->session->set_flashdata('status', 'success');
                
        }        
        redirect(ADMIN_BASE_URL . 'users');
    }

	function change_password_action(){
        $where['id'] = $this->input->post('user_name');
        $data['password'] = md5($this->input->post('password'));
		$this->_update($where, $data);
	}

    function hashpassword($password) {
        return md5($password);
    }

	function _get_data_from_post_password() {
        $data['user_name'] = $this->input->post('user_name');
        $data['password'] =  $this->hashpassword($this->input->post('password'));
        return $data;
    }
	
    function change_status_event() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        $data = array('status' => $status);
        $status = $this->_update_status_event($id, $data);
        echo '<status>succefull</status><message>Status change successfully</message>';
    }
    /////////////// for detail ////////////
    function detail() {
        $update_id = $this->input->post('id');
        $data['users_res'] = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $this->load->view('detail', $data);
    }

////////////////////////////////////////////////
function _get($order_by='id desc'){
$this->load->model('mdl_users');
$query = $this->mdl_users->_get($order_by);
return $query;
}

function _get_with_limit($limit, $offset, $order_by='id asc') {
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_with_limit($limit, $offset, $order_by);
return $query;
}

function _getItemById($id) {
$this->load->model('mdl_users');
return $this->mdl_users->_getItemById($id);
}

function _get_by_arr_id($arr_col) {
$this->load->model('mdl_users');
return $this->mdl_users->_get_by_arr_id($arr_col);
}

function _get_zabiha($table , $distance, $longitude, $latitude) {
$this->load->model('mdl_users');
return $this->mdl_users->_get_zabiha($table , $distance, $longitude, $latitude);
}

function _get_where($id){
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_where($id);
return $query;
}

function _get_where_login($username , $password){
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_where_login($username,$password);
return $query;
}

function _get_where_user($id){
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_where_user($id);
return $query;
}
function _get_where_validate($id,$user_name){
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_where_validate($id,$user_name);
return $query;
}

function _get_where_cols($cols,$order_by){
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_where_cols($cols,$order_by);
return $query;
}

function _get_where_custom($col, $value,$order_by='id asc') {
   // print '<br>this =====controler ====>>';exit;
$this->load->model('mdl_users');
$query = $this->mdl_users->_get_where_custom($col, $value,$order_by);
return $query;
}
function _update_status_event($id, $data) {
    $this->load->model('mdl_users');
    $this->mdl_users->_update_id($id, $data);
}
function _insert($data){
$this->load->model('mdl_users');
return $this->mdl_users->_insert($data);
}

function _update_status_news($id, $data) {
    $this->load->model('mdl_users');
    $this->mdl_users->_update_id($id, $data);
}

function _update($arr_col, $data) {
$this->load->model('mdl_users');
$this->mdl_users->_update($arr_col, $data);
}

function _update_where_cols($cols, $data){
$this->load->model('mdl_users');
return $this->mdl_users->_update_where_cols($cols, $data);
}



function _count_where($column, $value) {
$this->load->model('mdl_users');
$count = $this->mdl_users->_count_where($column, $value);
return $count;
}

function _get_max() {
$this->load->model('mdl_users');
$max_id = $this->mdl_users->_get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_users');
$query = $this->mdl_users->_custom_query($mysql_query);
return $query;
}

function _get_tokens($outlet = DEFAULT_OUTLET)
{
    $arr_where = array('outlet_id' => $outlet);
    $arr_users = $this->_get_where_cols($arr_where)->result_array();
    $arr_token = array();
    if (count( $arr_users) > 0)
    {
        foreach ($arr_users as $key => $arr_value) {
            if(isset($arr_value['token']) && !empty($arr_value['token']))
                $arr_token[] = $arr_value['token'];
        }
        
    }
     /*print '<br>resul here ===>>><pre>';
       print_r($arr_token);
    exit;*/
    return $arr_token;
}

function _get_app_key($create_from, $id){
    $sql = 'Select app_key from app_details where create_from = "'.$create_from.'" and id = '.$id;
    $query = $this->_custom_query($sql)->row();
    return $query->app_key;

}

}