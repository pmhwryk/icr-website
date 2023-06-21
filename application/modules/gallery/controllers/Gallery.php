<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id','id','gallery','id,link,name,image,status','1','0','','','');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$update_id), 'id','id','gallery','id,link,name,image,alt_image,status','1','1','','','')->row_array();
		} else {
			$data['services'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail() {
		$update_id = $this->input->post('id');
		if(!empty($update_id) && is_numeric($update_id) && $update_id > 0)
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$update_id), 'id','id','gallery','id,link,image,name,status','1','1','','','')->row_array();
		$this->load->view('detail', $data);
	}

	function submit() {
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'gallery');
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					$old_image_name = $this->input->post('old_image_name');
					if(!empty($old_image_name))
						Modules::run('api/delete_images_by_name',ACTUAL_GALLERY_IMAGE_PATH,LARGE_GALLERY_IMAGE_PATH,MEDIUM_GALLERY_IMAGE_PATH,SMALL_GALLERY_IMAGE_PATH,$old_image_name);
					Modules::run('api/upload_dynamic_image',ACTUAL_GALLERY_IMAGE_PATH,'','','',$update_id,'image','image','id','gallery');
				}
			}
			$this->session->set_flashdata('message', 'Statistics updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'gallery');
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					Modules::run('api/upload_dynamic_image',ACTUAL_GALLERY_IMAGE_PATH,'','','',$update_id,'image','image','id','gallery');
				}
			}
			$this->session->set_flashdata('message', 'gallery saved successfully.');
		}
		redirect(ADMIN_BASE_URL.'gallery');
	}
	function _get_data_from_post() {
	    $data['link'] = $this->input->post('link');
	    $data['name'] = $this->input->post('name');
	    $data['alt_image'] = $this->input->post('alt_image');
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
		Modules::run('api/update_specific_table',array('id'=>$id),$data,'gallery');
		echo $status;
	}
	function delete() {
		$id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) {
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$id), 'id','id','gallery','image','1','1','','','')->row_array();
			if(!empty($old_data['image']))
				Modules::run('api/delete_images_by_name',ACTUAL_GALLERY_IMAGE_PATH,LARGE_GALLERY_IMAGE_PATH,MEDIUM_GALLERY_IMAGE_PATH,SMALL_GALLERY_IMAGE_PATH,$old_data['image']);
			Modules::run('api/delete_from_specific_table',array('id'=>$id),'gallery');
		}
	}
	function delete_image() {
        $id = $this->input->post('id');
        $name = $this->input->post('image');
        $status = 'error';
        $message = 'Please try later';
        if(!empty($id) && is_numeric($id) && $id > 0 && !empty($name)) {
			$status = 'info';
			$message = 'Image delete successfully';
			Modules::run('api/update_specific_table',array('id'=>$id),array('image'=>null),'gallery');
			Modules::run("api/delete_images_by_name",ACTUAL_GALLERY_IMAGE_PATH,LARGE_GALLERY_IMAGE_PATH,MEDIUM_GALLERY_IMAGE_PATH,SMALL_GALLERY_IMAGE_PATH,$name);
        }
        echo "<article lang=''><message>".$message."</message><status>".$status."</status></article>";
    }	
}