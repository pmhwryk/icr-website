<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkg_type extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
        $data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array(), 'id','id','pkg_type','id,title,pkg_id','1','0','','','');
        
       

		$data['view_file'] = 'main_view';
		$this->load->module('template');
		$this->template->admin($data);
    }
	function create() {
        
        $data['pkg'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array(), 'id','id','pkg','id,image,name as title','*','0','','','')->result_array();
        //print_r($data);exit;
        $data['points'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array(), 'id','id','points','id,title,status,is_deleted','1','0','','','')->result_array();

		$update_id = $this->uri->segment(4);
	 
		$data['pkg_type']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','pkg_type','id,title,pkg_id,image,price,description,bg_color','1','1','','','')->row_array();
	
		if (is_numeric($update_id) && $update_id != 0) {
			
            $data['selectedtypes']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('pkg_id'=>$update_id), 'id','id','pkg_points','id,pkg_id,point_id','*','0','','','')->result_array();
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','pkg','id,name,image,rank','1','1','','','')->row_array();
			
		} else {
			$data['services'] = $this->_get_data_from_post();
		}
		//print_r($data['points']);exit;
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
    }
    function _get_data_from_post() {
       //print_r($_POST);exit;
		$data['title'] = $this->input->post('name');
		$data['pkg_id']=$this->input->post('pkg');
		$data['price']=$this->input->post('price');
		$data['description']=$this->input->post('description');
		$data['bg_color']=$this->input->post('bg_color');
		
       
		return $data;
    }
    function submit() {
		$i=0;
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		//print_r($data);exit;
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'pkg_type');
			$this->set_outlet_categories($update_id);
		  $old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id desc','id','pkg_type','image','1','1','','','')->row_array();
                   
			$this->session->set_flashdata('message', 'Package Type updated successfully.');
		}
		if ($update_id == 0) {
			$update_id=Modules::run('api/insert_into_specific_table',$data,'pkg_type');
			$this->set_outlet_categories($update_id);
			$this->session->set_flashdata('message', 'Package Type saved successfully.');
		}
		if(isset($_FILES['image']) && !empty($_FILES['image'])) {
            if($_FILES['image']['size']>0) {
                if(isset($old_data['image']) && !empty($old_data['image']))
                    Modules::run("api/delete_images_by_name",ACTUAL_PRICE_PLANS_IMAGE_PATH,'','','',$old_data['image']);
                Modules::run("api/upload_dynamic_image",ACTUAL_PRICE_PLANS_IMAGE_PATH,'','','',$update_id,"image","image","id","pkg_type");
            }
        }
		$this->set_outlet_categories($update_id);
		redirect(ADMIN_BASE_URL.'pkg_type');
    }
    function delete() {
        $id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) 
		{
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'pkg_type');
				
        }
	}

	function set_outlet_categories($update_id) {
        $old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('pkg_id'=>$update_id), 'id desc','id','pkg_points','id,point_id,pkg_id','1','0','','','')->result_array();
        $categories = $this->input->post('points');
		if(!empty($categories)) {
            foreach($categories as $ot):
                $previous = array_search($ot, array_column($old_data, 'point_id'));
                if(is_numeric($previous)) {
                    unset($old_data[$previous]);
                    $old_data = array_values($old_data);
                }
				else
					Modules::run('api/insert_into_specific_table',array('pkg_id'=>$update_id,'point_id'=>$ot),'pkg_points');
            endforeach;
        }
        if(!empty($old_data)) {
            foreach($old_data as $od):
                Modules::run('api/delete_from_specific_table',array('id'=>$od['id']),'pkg_points');
            endforeach;
        }
    }

    function get_points_data()
    {
        $id = $this->input->post('id');
        $this->load->model('Mdl_pkg_type');
		$data['points']=$this->Mdl_pkg_type->get_points_data($id)->result_array();
        $this->load->view('pointsdata',$data);
       
       //print_r($rslt->result_array());
       
    }
}