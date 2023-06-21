<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkg extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
        $data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array(), 'id','id','pkg','id,name,rank','1','0','','','');
       

		$data['view_file'] = 'main_view';
		$this->load->module('template');
		$this->template->admin($data);
    }
	function create() {
        
        //print_r($data);exit;
       
        
		$update_id = $this->uri->segment(4);
		$data['selectedtypes']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('pkg_id'=>$update_id), 'id','id','pkg_points','id,pkg_id,point_id','*','0','','','')->result_array();
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','pkg','id,name,rank,image','1','1','','','')->row_array();
			
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
        
        $data['name'] = $this->input->post('name');
        $data['rank']=  $this->input->post('rank');
        $data['price']=  $this->input->post('price');
        $data['description']=  $this->input->post('description');
		//print_r($data);exit;
		return $data;
    }
    function submit() {
		$i=0;
		$update_id = $this->input->post('update_id');
        $data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'pkg');
			$this->set_outlet_categories($update_id);
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id desc','id','pkg','image','1','1','','','')->row_array();
                   
			$this->session->set_flashdata('message', 'price updated successfully.');
		}
		if ($update_id == 0) {
			$update_id=Modules::run('api/insert_into_specific_table',$data,'pkg');
			$this->set_outlet_categories($update_id);
			$this->session->set_flashdata('message', 'Prices saved successfully.');
		}
		 if(isset($_FILES['image']) && !empty($_FILES['image'])) {
            if($_FILES['image']['size']>0) {
                if(isset($old_data['image']) && !empty($old_data['image']))
                    Modules::run("api/delete_images_by_name",ACTUAL_PACKAGE_TYPE_IMAGE_PATH,'','','',$old_data['image']);
                Modules::run("api/upload_dynamic_image",ACTUAL_PACKAGE_TYPE_IMAGE_PATH,'','','',$update_id,"image","image","id","pkg");
            }
        }
		redirect(ADMIN_BASE_URL.'pkg');
    }
    function delete() {
        $id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) 
		{
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'pkg');
				
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
}