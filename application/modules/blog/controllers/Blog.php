<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}
	function index() {
		
		$data['query'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET), 'id desc','id','blog','id,title,blog_date,auth_desc,auth_link,auth_image,short_desc,image,alt_image,by_whom,status,blog_detail','1','0','','','');
		
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
    }
    function comments(){
    		$update_id = $this->uri->segment(4);
    	    $data['comments'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('blog_id'=>$update_id), 'id desc','id','comments','*','1','0','','','');
    	    $data['view_file'] = 'comments';
			$this->load->module('template');
			$this->template->admin($data);
    }
    // function index_sub()
	// {
    //     $update_id = $this->uri->segment(4);
    //     // echo $update_id;exit;
	// 	$data['chk'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('p_id'=>$update_id), 'id', 'id', 'sub_blog', 'id,p_id,long_desc,', '1', '*', '', '', '')->result_array();
	// 	$data['view_file'] = 'index_detail';
	// 	$this->load->module('template');
	// 	$this->template->admin($data);
	// }
    // function create_sub()
	// {
	// 	// $p_id = $this->uri->segment(4);
	// 	$update_id=$this->uri->segment(5);
	// 	$data['sub'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id), 'id', 'id', 'sub_blog', 'id,p_id,long_desc', '1', '1', '', '', '')->row_array();
	// 	$data['update_id'] = $update_id;
	// 	$data['view_file'] = 'create_detail';
	// 	$this->load->module('template');
	// 	$this->template->admin($data);
	// }
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$update_id), 'id','id','blog','id,title,url,short_desc,image,alt_image,status,by_whom,blog_date,auth_desc,auth_link,auth_image,blog_detail','1','1','','','')->row_array();
			
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
			$data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$update_id), 'id','id','blog','id,title,short_desc,image,alt_image,status,by_whom,auth_image,blog_date,auth_desc,auth_link','1','1','','','')->row_array();
		$this->load->view('detail', $data);
	}

	function submit() {
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		
		if ($update_id != 0) {
			Modules::run('api/update_specific_table',array('id'=>$update_id),$data,'blog');
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					$old_image_name = $this->input->post('old');
					
					
					if(!empty($old_image_name))
						Modules::run('api/delete_images_by_name',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$old_image_name);
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'image','image','id','blog');
				}
			}

			if(isset($_FILES['auth_image']) && !empty($_FILES['auth_image'])) {
				if($_FILES['auth_image']['size'] > 0) {
					$old_image_name = $this->input->post('old');
					
					
					if(!empty($old_image_name))
						Modules::run('api/delete_images_by_name',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$old_image_name);
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'auth_image','auth_image','id','blog');
				}
			}
			$this->session->set_flashdata('message', 'blog updated successfully.');
		}
		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'blog');
			if(isset($_FILES['image']) && !empty($_FILES['image'])) {
				if($_FILES['image']['size'] > 0) {
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'image','image','id','blog');
				}
			}
			$this->session->set_flashdata('message', 'blog saved successfully.');
		}

		if ($update_id == 0) {
			$update_id = Modules::run('api/insert_into_specific_table',$data,'blog');
			if(isset($_FILES['auth_image']) && !empty($_FILES['auth_image'])) {
				if($_FILES['auth_image']['size'] > 0) {
					Modules::run('api/upload_dynamic_image',ACTUAL_BLOG_IMAGE_PATH,'','','',$update_id,'auth_image','auth_image','id','blog');
				}
			}
			$this->session->set_flashdata('message', 'blog saved successfully.');
		}
		$filename = $this->input->post('replaceing_name');
		if(isset($filename) && !empty($filename)) {
			echo Modules::run('api/reploace_image',$filename,'.PNG','image',$update_id,'id','blog',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH);
		}
		redirect(ADMIN_BASE_URL.'blog');
	}
	// function upload_img()
	// {
	// 	echo "dsad";exit;
	// }
    // function submit_sub()
	// {
	// 	$p_id=$this->input->post('p_id');
	// 	$update_id=$this->input->post('update_id');
	// 	if ($update_id != 0) {

	// 			$description   = $this->input->post('long_desc');
	// 			// print_r($description);exit;
	// 			$info = array('p_id' => $p_id, 'long_desc' => $description);
	// 			Modules::run('api/update_specific_table',array('id'=>$update_id),$info,'sub_blog');
	// 		redirect(ADMIN_BASE_URL . 'blog/'. '/index_sub/'. $p_id);
	// 	} else {
	// 		$description   = $this->input->post('long_desc');
	// 		// print_r($description);exit;
	// 			$info = array('p_id' => $p_id, 'long_desc' => $description, );
	// 			Modules::run('api/insert_into_specific_table', $info, 'sub_blog');
	// 		redirect(ADMIN_BASE_URL . 'blog/'. '/index_sub/'. $p_id);
	// 	}

	// 	$this->session->set_flashdata('message', 'Reviews saved successfully.');
	// }

	function upload_image(){
		$config['image_library'] = 'ImageMagick';
        $config['library_path']='/usr/bin';
        $config['source_image']='uploads/'.$name.'.'.$m[1];
        $config['new_image']='uploads/'.$name.'.'.$png;
        $objImage = new CI_Image_lib($config);

		$this->load->library('upload');
        $this->upload->initialize($config);
	}
	
	function _get_data_from_post() {
        date_default_timezone_set("Asia/Karachi");
		$data['title'] = $this->input->post('title');
        $data['short_desc'] = $this->input->post('short_desc');
        $data['by_whom'] = $this->input->post('by_whom');
        $data['auth_desc'] = $this->input->post('auth_desc');
        $data['auth_link'] = $this->input->post('auth_link');
        $data['url'] = strtolower($this->cleanRegExpress($this->input->post('title')));
        $data['blog_date'] = $this->input->post('blog_date');
        
        $data['create_date']=date('Y-m-d H:i:s');
		$data['alt_image'] = $this->input->post('alt_image');
		$data['blog_detail'] = $this->input->post('long_desc');
		$data['outlet_id'] = DEFAULT_OUTLET;

		return $data;
	}

	function cleanRegExpress($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
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
		Modules::run('api/update_specific_table',array('id'=>$id),$data,'blog');
		echo $status;
	}
	function delete() {
		$id = $this->input->post('id');
		if(isset($id) && !empty($id) && $id > 0) {
			$old_data = Modules::run('api/get_specific_table_with_pagination_where_groupby',array('outlet_id'=>DEFAULT_OUTLET,'id'=>$id), 'id','id','blog','image','1','1','','','')->row_array();
			if(!empty($old_data['image']))
				Modules::run('api/delete_images_by_name',ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$old_data['image']);
            Modules::run('api/delete_from_specific_table',array('id'=>$id),'blog');
            Modules::run('api/delete_from_specific_table',array('p_id'=>$id),'sub_blog');
		}
    }
    function delete_cooments(){
    	  $id=$this->input->post('id');
    	  $blog_id=$this->input->post('blog_id');
		Modules::run('api/delete_from_specific_table',array('id'=>$id,'blog_id'=>$blog_id),'comments');
    }
    function update_comments_status(){
    	  $id=$this->input->post('id');
    	  $blog_id=$this->input->post('blog_id');
    	  $status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else {
			$status = 1;
		}
		$data = array('status' => $status);
		 Modules::run('api/update_specific_table',array('id'=>$id,'blog_id'=>$blog_id),$data,'comments');
    }
    function sub_delete()
	{
        $id=$this->input->post('id');
        // echo $id;exit;
		Modules::run('api/delete_from_specific_table',array('id'=>$id),'sub_blog');
	}
	function delete_image() {
        $id = $this->input->post('id');
        $name = $this->input->post('image');
        $status = 'error';
        $message = 'Please try later';
        if(!empty($id) && is_numeric($id) && $id > 0 && !empty($name)) {
			$status = 'info';
			$message = 'Image delete successfully';
			Modules::run('api/update_specific_table',array('id'=>$id),array('image'=>null),'blog');
			Modules::run("api/delete_images_by_name",ACTUAL_BLOG_IMAGE_PATH,LARGE_BLOG_IMAGE_PATH,MEDIUM_BLOG_IMAGE_PATH,SMALL_BLOG_IMAGE_PATH,$name);
        }
        echo "<article lang=''><message>".$message."</message><status>".$status."</status></article>";
    }	
}