<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Outlet_lang extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
Modules::run('site_security/has_permission');

}
function index(){
	$this->manage();
}
function manage(){
	 	$outlet_id = $this->uri->segment(4);
		$query = $this->_get_data_from_db($outlet_id);
		//print_r($query); exit;
			foreach($query->result() as $outlet){
				$result[$outlet->id] = $outlet->name;
			}
			
		if(isset($result) && !empty($result))
			$data['outlets'] = $result;
		$data['langs'] = Modules::run('lang/_get','lang_name');
		if(!is_numeric($outlet_id)){
		$outlet_id = 1; // default_outlet_id
		}
		$data['outlet_id'] = $outlet_id;
		$data['outlet_selected_langs'] = $this->_get_outlet_selected_lang($outlet_id);
		$query2 = Modules::run('lang/_get_default_outlet_lang_record',$outlet_id);
		if(isset($query2)){
				foreach($query2->result() as $lang){
				$result2[$lang->id] = $lang->lang_name;
				$data['store_lang_id'] = $lang->id ;
				}
		}
		$data['view_file'] = 'outlet_langform';
		$this->load->module('template');
		$this->template->admin($data);
	}
function _get_data_from_db($outlet_id){
			$where['is_multilang'] = 1;	
			$where['id'] = $outlet_id;
			$data = Modules::run('outlet/_get_by_arr_id',$where);
			return $data;	
	}
function _get_outlet_selected_lang($outlet_id){
			$where['outlet_id'] = $outlet_id;
			$data = $this->_get_by_arr_id($where);
			return $data;	
	}

function _get_data_from_post(){ 
			$data['arr_lang'] = $this->input->post('chkLang'); 
			$data['outlet_id'] = $this->input->post('lstOutlet'); 
			return $data;	
	}
function submit(){
			$data = $this->_get_data_from_post();
			$where['outlet_id'] = $data['outlet_id'];
			$where['is_default'] = 0;
			//print_r($where);
			//exit;
			$this->_delete_by_arr_id($where);
			if(!empty($data))
			{
				$temp = '';
				foreach($data['arr_lang'] as $lang){
					$temp['lang_id'] = $lang['lang_id']; 
					$temp['outlet_id'] = $data['outlet_id'];
					$this->_insert($temp);
				}
			}
	redirect(ADMIN_BASE_URL.'outlet');
}
function _default_lang($id,$data){ 
			$data2['arr_lang'] = $data; 
			$data2['outlet_id'] = $id;
			$data2['is_default'] = 1;  
			return $data2;	
	}
function _submit($id,$data){
			$data2 = $this->_default_lang($id,$data);
			$where['outlet_id'] = $id;
			$this->_delete_by_arr_id($where);
			if(!empty($data2))
			{
				$temp = '';
				foreach($data2['arr_lang'] as $lang){
					$temp['lang_id'] = $lang['lang_id']; 
					$temp['outlet_id'] = $data2['outlet_id'];
					$temp['is_default'] = $data2['is_default'];
					$this->_insert($temp);
				}
			}
}

///////////////////////////////General Functions////////////////////////////////
function _get_by_arr_id($arr_col){
$this->load->model('mdl_outlet_lang');
return $this->mdl_outlet_lang->_get_by_arr_id($arr_col);
}
function _get($order_by){
$this->load->model('mdl_outlet_lang');
$query = $this->mdl_outlet_lang->_get($order_by);
return $query;
}

function _get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_outlet_lang');
$query = $this->mdl_outlet_lang->_get_with_limit($limit, $offset, $order_by);
return $query;
}

function _get_where($id){
$this->load->model('mdl_outlet_lang');
$query = $this->mdl_outlet_lang->_get_where($id);
return $query;
}

function _get_where_custom($col, $value) {
$this->load->model('mdl_outlet_lang');
$query = $this->mdl_outlet_lang->_get_where_custom($col, $value);
return $query;
}

function _get_where_cols($cols) {
$this->load->model('mdl_outlet_lang');
$query = $this->mdl_outlet_lang->_get_where_custom($cols);
return $query;
}

function _insert($data){
$this->load->model('mdl_outlet_lang');
$this->mdl_outlet_lang->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_outlet_lang');
$this->mdl_outlet_lang->_update($id, $data);
}

function _delete_by_arr_id($arr_col){
$this->load->model('mdl_outlet_lang');
return $this->mdl_outlet_lang->_delete_by_arr_id($arr_col);
}

function _delete($id){
$this->load->model('mdl_outlet_lang');
$this->mdl_outlet_lang->_delete($id);
}

function _count_where($column, $value) {
$this->load->model('mdl_outlet_lang');
$count = $this->mdl_outlet_lang->_count_where($column, $value);
return $count;
}

function _get_max() {
$this->load->model('mdl_outlet_lang');
$max_id = $this->mdl_outlet_lang->_get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_outlet_lang');
$query = $this->mdl_outlet_lang->_custom_query($mysql_query);
return $query;
}

}