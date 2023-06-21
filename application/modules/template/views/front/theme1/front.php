<?php $this->load->view('front/theme1/header');?>
<?php 

 	if(!isset($view_file)){
			$view_file = '';
		}
	
	$path = 'front/'.$view_file;
	$this->load->view($path);
	
 ?>
<?php $this->load->view('front/theme1/footer');?>
