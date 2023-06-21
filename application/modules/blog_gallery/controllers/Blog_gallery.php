<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_gallery extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function run_query(){
		// $query = " CREATE TABLE `blog_gallery` (
		// `id` int(11) NOT NULL,
		// `image` text DEFAULT NULL,
		// `alt_image` text DEFAULT NULL,
		// `created_at` timestamp NOT NULL DEFAULT current_timestamp()
		// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		$query = "ALTER TABLE blog_gallery CHANGE id id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY;";
		$this->db->query($query);
	}
	function index() {
		
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby','', 'id','id','blog_gallery','*','1','0','','','');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
    }

    function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$update_id), 'id','id','blog_gallery','*','1','1','','','')->row_array();
			
		} else {
			$data['services'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function submit() {
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'blog_gallery');
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					$old_image_name = $this->input->post('old');
					
					
					if(!empty($old_image_name))
						Modules::run('api/delete_images_by_name',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$old_image_name);
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'image','image','id','blog_gallery');
				}
			}

			if(isset($_FILES['auth_image']) && !empty($_FILES['auth_image'])) {
				if($_FILES['auth_image']['size'] > 0) {
					$old_image_name = $this->input->post('old');
					
					
					if(!empty($old_image_name))
						Modules::run('api/delete_images_by_name',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$old_image_name);
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'auth_image','auth_image','id','blog_gallery');
				}
			}
			$this->session->set_flashdata('message', 'blog gallery updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'blog_gallery');
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'image','image','id','blog_gallery');
				}
			}
			$this->session->set_flashdata('message', 'blog gallery saved successfully.');
		}

		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'blog');
			if(isset($_FILES['auth_image']) && !empty($_FILES['auth_image'])) {
				if($_FILES['auth_image']['size'] > 0) {
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'auth_image','auth_image','id','blog_gallery');
				}
			}
			$this->session->set_flashdata('message', 'blog gallery saved successfully.');
		}
		$filename = $this->input->post('replaceing_name');
		if(isset($filename) && !empty($filename)) {
			echo Modules::run('api/reploace_image',$filename,'.PNG','image',$update_id,'id','blog_gallery',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH);
		}
		redirect(ADMIN_BASE_URL.'blog_gallery');
	}

	function upload_image(){
		$config['image_library'] = 'ImageMagick';
        $config['library_path']='/usr/bin';
        $config['source_image']='uploads/'.$name.'.'.$m[1];
        $config['new_image']='uploads/'.$name.'.'.$png;
        $objImage = new CI_Image_lib($config);

		$this->load->library('upload');
        $this->upload->initialize($config);
	}
	function delete() {
		$id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) {
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$id), 'id','id','blog_gallery','image','1','1','','','')->row_array();
			if(!empty($old_data['image']))
				Modules::run('api/delete_images_by_name',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$old_data['image']);
            Modules::run('api/delete_from_specific_table',array('id'=>$id),'blog_gallery');
		}
    }
	
	function _get_data_from_post() {
        date_default_timezone_set("Asia/Karachi");
		$data['alt_image'] = $this->input->post('alt_image');
		return $data;
	}


}