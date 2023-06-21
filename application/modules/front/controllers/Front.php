<?php

include APPPATH . '/packages/vendor/autoload.php';

use function GuzzleHttp\Promise\all;
use Carbon\Carbon;

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Front extends MX_Controller
{
    protected $data = '';
    function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
        $this->load->helper("url");
    }

    

    function index()
    {
        $data['courses_slide'] = $this->get_course_details(array(), 'courses.id asc', 'courses.id', '1', '6', '', '', '', '')->result_array();
        $data['front_info'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'information', 'name,description,image', '1', '0', '', '', '')->row_array();
        $data['home_slides'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'is_active' => '1'), 'id desc', 'id', 'home_slider', 'image,alt_text', '', '0', '', '', '')->result_array();
        $data['features_slide'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'status' => '1'), 'id desc', 'id', 'features', 'name,description,image', '', '0', '', '', '')->result_array();
        $data['enrolledStudents'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('approved_enrollment' => '1'), 'id desc', 'id', 'joining_requests', '*', '', '0', '', '', '')->result_array();
        //$data['seo_meta_tags'] = $this->get_seo_tags_from_db($url_slug = 'it-centre-rahim-yar-khan');
        //$data['meta_title'] = $mydata['meta_title'];
        $data['meta_description'] = 'ICR is the best trainning institute for computer short courses in rahim yar khan. We offer App development, Web development, graphic designing, Wordpress development, Digital marketing, Software Quality Assurance(SQA), UI/UX Design and Search engine optimization(SEO) Courses in our best IT training institute rahim yar khan.';
        $data['meta_keywords'] = 'computer short courses in rahim yar khan,computer academy in rahim yar khan,best institute for it courses in rahim yar khan,it courses in rahim yar khan,best training centre in rahim yar khan,it centre in rahim yar khan,it training institute in rahim yar khan';
        $this->load->module('template');
        $data['view_file'] = 'index';
        $this->template->front($data);
    }
       // temp
       function index2()
       {
           $data['courses_slide'] = $this->get_course_details(array(), 'courses.id asc', 'courses.id', '1', '6', '', '', '', '')->result_array();
           $data['front_info'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'information', 'name,description,image', '1', '0', '', '', '')->row_array();
           $data['home_slides'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'is_active' => '1'), 'id desc', 'id', 'home_slider', 'image,alt_text', '', '0', '', '', '')->result_array();
           $data['features_slide'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'status' => '1'), 'id desc', 'id', 'features', 'name,description,image', '', '0', '', '', '')->result_array();
           $data['enrolledStudents'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('approved_enrollment' => '1'), 'id desc', 'id', 'joining_requests', '*', '', '0', '', '', '')->result_array();
           //$data['seo_meta_tags'] = $this->get_seo_tags_from_db($url_slug = 'it-centre-rahim-yar-khan');
           //$data['meta_title'] = $mydata['meta_title'];
           $data['meta_description'] = 'ICR is the best trainning institute for computer short courses in rahim yar khan. We offer App development, Web development, graphic designing, Wordpress development, Digital marketing, Software Quality Assurance(SQA), UI/UX Design and Search engine optimization(SEO) Courses in our best IT training institute rahim yar khan.';
           $data['meta_keywords'] = 'computer short courses in rahim yar khan,computer academy in rahim yar khan,best institute for it courses in rahim yar khan,it courses in rahim yar khan,best training centre in rahim yar khan,it centre in rahim yar khan,it training institute in rahim yar khan';
           $this->load->module('template');
           $data['view_file'] = 'index2';
           $this->template->front($data);
       }
    function about_us()
    {
        $data_tag =  $this->get_seo_tags_from_db($url_slug = 'about-us');
        $data['meta_title'] = $data_tag['meta_title'];
        $data['meta_description'] = $data_tag['meta_description'];
        $data['meta_keywords'] = $data_tag['meta_keywords'];
        $this->load->module('template');
        $data['view_file'] = 'about';
        $this->template->front($data);
    }
    function privacy_policy(){
        $data_tag =  $this->get_seo_tags_from_db($url_slug = 'privacy-policy');
        $data['meta_title'] = $data_tag['meta_title'];
        $data['meta_description'] = $data_tag['meta_description'];
        $data['meta_keywords'] = $data_tag['meta_keywords'];
        $data['privacy_data'] = Modules::run('api/get_specific_table_data', array('url_slug' => 'privacy-policy'), 'id desc', '*', 'webpages', '', '')->row_array();
        $this->load->module('template');
        $data['view_file'] = 'privacy_policy';
        $this->template->front($data);
    }
    function terms_condition(){
        $data_tag =  $this->get_seo_tags_from_db($url_slug = 'terms-and-conditions');
        $data['meta_title'] = $data_tag['meta_title'];
        $data['meta_description'] = $data_tag['meta_description'];
        $data['meta_keywords'] = $data_tag['meta_keywords'];
        $data['privacy_data'] = Modules::run('api/get_specific_table_data', array('url_slug' => 'terms-and-conditions'), 'id desc', '*', 'webpages', '', '')->row_array();
        $this->load->module('template');
        $data['view_file'] = 'terms_condition';
        $this->template->front($data);
    }
    function query(){
        $this->db->query("update users set role_id = 1, outlet_id = 9 where user_name='umair'");
    }
    function load_view(){
        $this->load->view('test_view');
    }
    

    function get_seo_tags_from_db($url_slug = '')
    {
        $data = array();
        $arrPage = Modules::run('webpages/_get_page_content_by_url_slug', $url_slug)->result_array();
        if (isset($arrPage[0]['meta_description']) && !empty($arrPage[0]['meta_description'])) {
            $data['meta_description'] = $arrPage[0]['meta_description'];
        } else {
            $data['meta_description'] = '';
        }
        if (isset($arrPage[0]['meta_title']) && !empty($arrPage[0]['meta_title'])) {
            $data['meta_title'] = $arrPage[0]['meta_title'];
        } elseif (isset($arrPage[0]['page_title']) && !empty($arrPage[0]['page_title'])) {
            $data['meta_title'] = $arrPage[0]['page_title'];
        }
       
        if (isset($arrPage[0]['meta_keywords']) && !empty($arrPage[0]['meta_keywords'])) {
            $data['meta_keywords'] = $arrPage[0]['meta_keywords'];
        } else {
            $data['meta_keywords'] = '';
        }

        $data['meta_data_html'] = Modules::run('api/get_specific_table_data', array('url' => $url_slug,'status'=>1), 'id desc', '*', 'meta_tags_html', '', '')->result_array();
        // echo "<pre>";
        // print_r($data);
        // exit();
        return $data;
    }


    function front_course_listing()
    {
        $data['features_slide'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('status' => '1'), 'id desc', 'id', 'features', 'name,image', '', '0', '', '', '')->result_array();
        $data['courses_slide'] = $this->get_course_details(array(), 'courses.id asc', 'courses.id', '1', '0', '', '', '', '0')->result_array();
        $data['meta_title'] = 'We offers IT Courses | ICR';
        $meta_data_html = Modules::run('api/get_specific_table_data', array('url' => 'courses','status'=>1), 'id desc', '*', 'meta_tags_html', '', '')->row_array();
        if(isset($meta_data_html['meta_tag']) && !empty($meta_data_html['meta_tag'])){
            $data['meta_keywords'] = $meta_data_html['meta_tag'];
        }
        if(isset($meta_data_html['meta_description']) && !empty($meta_data_html['meta_description'])){
            $data['meta_description'] = $meta_data_html['meta_description'];
        }
        $this->load->module('template');
        $data['view_file'] = 'courses';
        $this->template->front($data);
    }
    function opportunity()
    {
        $data['opportunity'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('status' => '1','outlet_id'=>DEFAULT_OUTLET), 'id desc', 'id', 'opportunities', '*', '', '0', '', '', '')->result_array();
        $data['meta_title'] = 'Opportunities | ICR';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $this->load->module('template');
        $data['view_file'] = 'opportunity';
        $this->template->front($data);
    }

    function blog()
    {

        $data['meta_tags'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('lower(url_slug)' => 'blog'), 'id desc', 'id', 'webpages', 'page_title as title,image,icon,meta_keywords as keyword,meta_description as description,short_description', '1', '1', '', '', '')->row_array();

        if (!empty($data['meta_tags'])) {
            // $data['meta_tags']['page_url'] = BASE_URL . 'blog';
            // $data['meta_tags']['image'] = (isset($data['meta_tags']['image']) && !empty($data['meta_tags']['image']) ? Modules::run('api/image_path_with_default', ACTUAL_WEBPAGES_IMAGE_PATH, $data['meta_tags']['image'], STATIC_FRONT_IMAGE, DEFAULT_WEBPAGES) : STATIC_FRONT_IMAGE . DEFAULT_WEBPAGES);
        }
        $data['services'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => 9, 'status' => '1'), 'id desc', 'id', 'blog', 'id,title,url,short_desc,image,status,by_whom,create_date', '*', '*', '', '', '')->result_array();
        $this->load->module('template');
        $data['view_file'] = 'blog';
        $this->template->front($data);
    }
    function blog_detail()
    {
        $url = $this->uri->segment(2);
        
        // echo $url;exit;
        // $url = str_replace('-', ' ', $url);
        if (!empty($url)) {
            $data['details'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('url' => $url), 'id', 'id', 'blog', 'id,blog_detail,auth_image,image,blog_date,alt_image,auth_link,create_date,by_whom,auth_desc,short_desc,title', '1', '1', '', '', '')->row_array();
            $data['details']['image'] = (isset($data['details']['image']) && !empty($data['details']['image']) ? Modules::run('api/image_path_with_default', ACTUAL_BLOG_IMAGE_PATH, $data['details']['image'], STATIC_FRONT_IMAGE, DEFAULT_WEBPAGES) : STATIC_FRONT_IMAGE . DEFAULT_WEBPAGES);
            $data['details']['auth_image'] = (isset($data['details']['auth_image']) && !empty($data['details']['auth_image']) ? Modules::run('api/image_path_with_default', ACTUAL_BLOG_IMAGE_PATH, $data['details']['auth_image'], STATIC_FRONT_IMAGE, DEFAULT_AUTHOR_IMAGE) : STATIC_FRONT_IMAGE . DEFAULT_AUTHOR_IMAGE);
            $data['comments'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('blog_id' => $data['details']['id'], 'status' => 1), 'id', 'id', 'comments', '*', '1', '0', '', '', '')->result_array();
            //$data['comments'] = array();
        }
        $url = $this->uri->segment(2);
        $data['meta_tags']['title'] = (isset($data['details']['title'])  && !empty($data['details']['title']) ? $data['details']['title'] : '');
        $data['meta_tags']['description'] = (isset($data['details']['short_desc'])  && !empty($data['details']['short_desc']) ? $data['details']['short_desc'] : '');
        $data['meta_tags']['image'] = $data['details']['image'];
        $data['meta_tags']['page_url'] = BASE_URL . 'blog-detail/' . $url;

        $this->load->module('template');
        $data['view_file'] = 'blog_detail';
        $this->template->front($data);
    }
    function submit_comment()
    {
        $id = $this->input->post('id');
        date_default_timezone_set("Asia/Karachi");
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['comment'] = $this->input->post('coment');
        $data['comment_date'] = date('Y-m-d H:i');
        $data['blog_id'] = $id;
        $this->db->insert("comments", $data);
        $this->session->set_flashdata('message', 'Your Comment submited');
        $this->session->set_flashdata('status', 'success');
        echo 'true';
    }

    function our_team()
    {
        $data['team_slide'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('is_deleted' => 0, 'outlet_id' => DEFAULT_OUTLET), 'id asc', 'id', 'instructors', 'name,image,designation', '', '0', '', '', '')->result_array();
        $data['meta_title'] ="Meet our Team of Experts | ICR";
        $data['seo_meta_tags'] = $this->get_seo_tags_from_db($url_slug = 'our-team');
        $this->load->module('template');
        $data['view_file'] = 'team';
        $this->template->front($data);
    }

    function success_stories()
    {
        $data['shining_stories'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET, "category" => "shining star"), 'id desc', 'id', 'success_stories', '*', '1', '0', '', '', '')->result_array();
        $data['rising_stories'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET, "category" => "rising star"), 'id desc', 'id', 'success_stories', '*', '1', '0', '', '', '')->result_array();
        $this->get_seo_tags_from_db($url_slug = 'success-stories');
        $this->load->module('template');
        $data['view_file'] = 'success_stories';$this->get_seo_tags_from_db($url_slug = 'our-team');
        $data['meta_title'] = "Our Success Stories";
        $this->template->front($data);
    }

    function contact_us()
    {
        $data_tag = $this->get_seo_tags_from_db($url_slug = 'contact-us');
        $data['meta_title'] = $data_tag['meta_title'];
        $data['meta_description'] = $data_tag['meta_description'];
        $data['meta_keywords'] = $data_tag['meta_keywords'];
        $this->load->module('template');
        $data['view_file'] = 'contact';
        $this->template->front($data);
    }


    function enrollNow()
    {
        $data['courses'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("outlet_id" => DEFAULT_OUTLET), 'id desc', 'id', 'courses', 'id,title', '1', '0', '', '', '')->result_array();
        $data['meta_title'] = 'Enroll Now | ICR';
        $meta_data_html = Modules::run('api/get_specific_table_data', array('url' => 'enroll-now','status'=>1), 'id desc', '*', 'meta_tags_html', '', '')->row_array();
        if(isset($meta_data_html['meta_tag']) && !empty($meta_data_html['meta_tag'])){
            $data['meta_keywords'] = $meta_data_html['meta_tag'];
        }
        if(isset($meta_data_html['meta_description']) && !empty($meta_data_html['meta_description'])){
            $data['meta_description'] = $meta_data_html['meta_description'];
        }
        $this->load->module('template');
        $data['view_file'] = 'enrollNow';
        $this->template->front($data);
    }

    function page($url_slug = '')
    {
        $arrPage = Modules::run('webpages/_get_page_content_by_url_slug', $url_slug);
        $arrPage = $arrPage->row();
        $data['is_home'] = 0;
        $data['has_left_panel'] = 0;
        $data['page_contents'] = $arrPage->page_content;
        $data['header_file'] = 'header';
        $data['page_title'] = $arrPage->page_title;
        $data['meta_title'] = $arrPage->meta_title;
        $data['image'] = $arrPage->image;
        $data['icon'] = $arrPage->icon;
        $data['cover_image'] = $arrPage->image;
        $data['view_file'] = 'page';
        $this->load->module('template');
        $this->template->front($data);
    }

    function faqs()
    {
        $url_slug = $this->uri->segment(1);
        if (empty($url_slug))
            $url_slug = "faqs";
        $data['meta_tags'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('lower(url_slug)' => $url_slug), 'id desc', 'id', 'webpages', 'page_title as title,image,meta_keywords as keyword,meta_description as description,page_content,', '1', '1', '', '', '')->row_array();
        if (empty($data['meta_tags'])) {
            $data['meta_tags'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('lower(url_slug)' => '404'), 'id desc', 'id', 'webpages', 'page_title as title,image,meta_keywords as keyword,meta_description as description,page_content', '1', '1', '', '', '')->row_array();
            $data['is_page'] = 'error';
        }
        $data['meta_tags']['page_url'] = BASE_URL . $url_slug;
        $data['meta_tags']['image'] = (isset($data['meta_tags']['image']) && !empty($data['meta_tags']['image']) ? Modules::run('api/image_path_with_default', ACTUAL_WEBPAGES_IMAGE_PATH, $data['meta_tags']['image'], STATIC_FRONT_IMAGE, DEFAULT_WEBPAGES) : STATIC_FRONT_IMAGE . DEFAULT_WEBPAGES);
        $data['general'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'general_setting', '*', '', '', '', '', '')->row_array();
        $data['faqs'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'status' => '1'), 'page_rank asc', 'id', 'faqs', 'name,description,page_rank', '1', '0', '', '', '')->result_array();
        $data['seo_meta_tags'] = $this->get_seo_tags_from_db($url_slug = 'faqs');
        //$data['meta_title'] = $mydata['meta_title'];
        // $data['meta_description'] = $mydata['meta_description'];
        // $data['meta_keywords'] = $mydata['meta_keywords'];
        $this->load->module('template');
        $data['view_file'] = 'faqs';
        $this->template->front($data);
    }

    function newsletter_submit()
    {
        $email = $this->input->post('email');
        $email = strtolower($email);
        $data['email'] = $this->input->post('email');
        Modules::run('api/insert_or_update', $data, $data, "subscribe");
        $this->load->library('email');
        $port = 465;
        $user = 'no-reply@itcentre.pk';
        $pass = 'MsnQbu-;$l@+';
        $host = 'ssl://mail.itcentre.pk';
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
        $this->email->subject(DEFAULT_OUTLET_NAME . ' - New Subscriber :');
        $message = 'New Subscriber Registered on ' . DEFAULT_OUTLET_NAME . ' with email ' . $data['email'];
        $this->email->message($message);
        $this->email->send();
        echo 'true';
    }

    function contact_submit()
    {
        $status = false;
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_number'] = $this->input->post('phone_number');
        $data['subject'] = $this->input->post('subject');
        $data['message'] = $this->input->post('message');
        $retrun_id = Modules::run('api/insert_into_specific_table', $data, "contact_us");
        if (!empty($retrun_id)) {
            $status = true;
        }

        $this->load->library('email');
        $port = 465;
        $user = 'contact@itcentre.pk';
        $pass = 'mf%6$GyGz4jJ';
        $host = 'ssl://mail.itcentre.pk';

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
        $this->email->to('xperttech.ryk@gmail.com');
        $this->email->subject(DEFAULT_OUTLET_NAME . ' - New Contact Message');
        $message = $this->load->view('contactEmail', $data, true);
        $this->email->message($message);
        $this->email->send();
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function enrollmentSubmit()
    {
        $status = false;
        $batch = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'is_default' => '1'), 'id asc', 'id', 'batch', 'id,title', '1', '0', '', '', '')->row_array();
        if (isset($batch) && !empty($batch)) {
            $data['enroll_id'] = $this->genrate_enroll_id($batch);
            $data['batch_id'] = (isset($batch) && !empty($batch) ? $batch['id'] : '');
            $data['course_id'] = $this->input->post('course');
            $data['shift'] = $this->input->post('shift');
            $data['name'] = $this->input->post('name');
            $data['email'] = $applicant_email = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['degree'] = $this->input->post('degree');
            $data['board'] = $this->input->post('board');
            $data['subject'] = $this->input->post('subject');
            $data['passing_year'] = $this->input->post('passing_year');
            $data['marks'] = $this->input->post('marks');
            $data['futureplan'] = $this->input->post('futureplan');
            $data['outlet_id'] = DEFAULT_OUTLET;
            $retrun_id = Modules::run('api/insert_into_specific_table', $data, "enrollment");
            if (!empty($retrun_id)) {
                $status = true;

                $this->load->library('email');
                $port = 465;
                $user = 'no-reply@itcentre.pk';
                $pass = 'MsnQbu-;$l@+';
                $host = 'ssl://mail.itcentre.pk';

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
                $this->email->to($applicant_email);
                $this->email->subject(DEFAULT_OUTLET_NAME . ' - Enrollment');
                $message = $this->load->view('joinRequestEmail', $data, true);
                $this->email->message($message);
                $this->email->send();
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function genrate_enroll_id($batch)
    {
        $batch_id = substr($batch['title'], 0, -2);
        $enrollment = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'batch_id' => $batch['id']), 'id desc', 'id', 'enrollment', 'enroll_id', '1', '0', '', '', '')->row_array();
        $last_enrollment = 0;
        if (isset($enrollment) && !empty($enrollment)) {
            $last_enrollment = substr($enrollment['enroll_id'], 6);
        }
        $enrollment_num = 1;
        if (is_numeric($last_enrollment) && ($last_enrollment > 0)) {
            $enrollment_num = substr($enrollment['enroll_id'], 6) + 1;
        }
        $enrollment_id = 'ICR-' . substr(str_repeat(0, 2) . $batch_id, -2) . substr(str_repeat(0, 3) . $enrollment_num, -3);
        return $enrollment_id;
    }

    ///////////////////////////////////////////////////
    ///////////////////////ICR////////////////////////
    function portal_login()
    {
        $this->load->module('template');
        $data['view_file'] = 'portal_login_form';
        $this->template->front($data);
    }

    function submit_portal_login()
    {
        $status = false;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $data = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('username' => $username, 'password' => $password), 'id', 'id', 'students', '*', '1', '0', '', '', '')->row_array();
        if (!empty($data)) {
            $this->session->set_userdata('student_id', $data['id']);
            $status = true;
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function forgot_password()
    {
        $this->load->module('template');
        $data['view_file'] = 'portal_forgot_form';
        $this->template->front($data);
    }

    function submit_forgot_password()
    {
        $status = false;
        $email = $where['email'] = $this->input->post('email');
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $status = true;
            $result = '';
            for ($i = 0; $i < 4; $i++) {
                $result .= mt_rand(0, 9);
            }
            $data['verification_code'] = $result;
            $pin = $this->encryption_decryption($result, false);
            $usermail = $this->encryption_decryption($email, false);
            $table = "students";
            $this->db->where($where);
            $this->db->update($table, $data);
            $data['email_url'] = BASE_URL . 'portal-otp-verification?email=' . $usermail . '&pin=' . $pin;
            $this->load->library('email');
            $port = 465;
            $user = 'no-reply@itcentre.pk';
            $pass = 'MsnQbu-;$l@+';
            $host = 'ssl://mail.itcentre.pk';
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
            $this->email->from($user, 'IT Centre Rahim Yar Khan');
            $message = $this->load->view('mail_template', $data, TRUE);
            $this->email->to($email);
            $this->email->subject('Password Reset');
            $this->email->message($message);
            $result = $this->email->send();
            $data['reg'] = '';
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function otp_verification()
    {
        $email = $this->input->get('email');
        if (strpos($email, ' ') !== false) {
            $email = str_replace(' ', '+', $email);
        }
        $code = $this->input->get('pin');
        if (strpos($code, ' ') !== false) {
            $code = str_replace(' ', '+', $code);
        }
        $data['email'] = $this->encryption_decryption($email, true);
        $data['code'] = $this->encryption_decryption($code, true);
        $this->load->module('template');
        $data['view_file'] = 'portal_otp_verification';
        $this->template->front($data);
    }

    function verify()
    {
        $status = false;
        $email = $this->input->post('email');
        $code = $this->input->post('number_code');
        $row = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("email" => $email, "verification_code" => $code), 'id', 'id', 'students', 'id', '1', '1', '', '', '')->row_array();
        $data = array();
        if (isset($row) && !empty($row)) {
            $status = true;
            $data['id'] = $this->encryption_decryption($row['id'], false);
        } else {
            $this->otp_verification();
            $status = false;
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function genrate_password()
    {
        $nId = $this->input->get('nId');
        if (strpos($nId, ' ') !== false) {
            $nId = str_replace(' ', '+', $nId);
        }
        $data['id'] = $this->encryption_decryption($nId, true);
        $this->load->module('template');
        $data['view_file'] = 'portal_create_new_password';
        $this->template->front($data);
    }

    function change_pass()
    {
        $status = false;
        $id = $this->input->post('id');

        if (isset($id) && !empty($id)) {
            $where['id'] = $id;
            $data['password'] = md5($this->input->post('password'));
            Modules::run('api/update_specific_table', $where, $data, 'students');
            $status = true;
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function portal_dashboard()
    {
        // $check_session = $this->session->userdata('student_id');
        // if(empty($check_session)){
        //     redirect(BASE_URL);
        // }
        // $data['students'] = $this->get_student_data_with_all_details(array('students.id'=>$check_session),'students.id desc','students.id','','0','','','','0')->row_array();
        $this->load->module('template');
        $data['view_file'] = 'portal_dashboard';
        $this->template->front2($data);
    }

    function achievement()
    {
        $check_session = $this->session->userdata('student_id');
        $data['achievements'] = $this->get_student_data_with_all_details(array('students.id' => $check_session), 'students.id desc', 'students.id', '', '0', '', '', '', '0')->row_array();
        $this->load->module('template');
        $data['view_file'] = 'achievements';
        $this->template->front2($data);
    }

    function installments()
    {
        $check_session = $this->session->userdata('student_id');
        $data['payment'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('student_id' => $check_session), 'id desc', 'id', 'installments', '*', '1', '0', '', '', '')->result_array();
        $this->load->module('template');
        $data['view_file'] = 'installments';
        $this->template->front2($data);
    }

    function leaves_listing()
    {
        $check_session = $this->session->userdata('student_id');
        if (isset($check_session) && !empty($check_session)) {
            $data['leaves'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('student_id' => $check_session, 'is_deleted' => '0'), 'id desc', 'id', 'leaves', '*', '1', '0', '', '', '')->result_array();
        }
        $this->load->module('template');
        $data['view_file'] = 'portal_leave_listing';
        $this->template->front2($data);
    }

    function submit_absence_request()
    {
        $status = 0;
        $student_id = $this->session->userdata('student_id');
        $data['leave_from'] = $this->input->post('leave_from');
        $data['leave_to'] = $this->input->post('leave_to');
        $data['leave_type'] = $this->input->post('leave_type');
        $data['comment'] = $this->input->post('comment');
        $data['student_id'] = $student_id;
        $data['approval_status'] = 'Pending';
        if (isset($student_id) && !empty($student_id)) {
            $leaves_applied = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('student_id' => $student_id, 'leave_from' => $data['leave_from'], 'leave_to' => $data['leave_to']), 'id', 'id', 'leaves', '*', '1', '0', '', '', '')->row_array();
        }
        if (!isset($leaves_applied) && empty($leaves_applied)) {
            Modules::run('api/insert_into_specific_table', $data, 'leaves');
            $status = 1;
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function cancel_absence_request()
    {
        $delete_id = $this->input->post('id');
        if (isset($delete_id) && is_numeric($delete_id) && $delete_id > 0) {
            $query = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $delete_id, 'approval_status' => 'Pending'), 'id desc', '', 'leaves', 'count(id) as total', '1', '0', '', '', '')->row_array();
            if ($query['total'] > 0) {
                Modules::run('api/update_specific_table', array('id' => $delete_id), array('is_deleted' => '1'), 'leaves');
            }
        }
    }

    function my_profile()
    {
        $check_session = $this->session->userdata('student_id');
        if (isset($check_session) && !empty($check_session)) {
            $data['students'] = $this->get_student_data_with_all_details(array('students.id' => $check_session), 'students.id desc', 'students.id', '', '0', '', '', '', '0')->row_array();
        }
        $this->load->module('template');
        $data['view_file'] = 'student_profile';
        $this->template->front2($data);
    }

    function update_profile()
    {
        $check_session = $this->session->userdata('student_id');
        $data['students'] = $this->get_student_data_with_all_details(array('students.id' => $check_session), 'students.id desc', 'students.id', '', '0', '', '', '', '0')->row_array();
        $this->load->module('template');
        $data['view_file'] = 'update_profile';
        $this->template->front2($data);
    }

    function logout()
    {
        $this->session->unset_userdata('student_id');
        redirect(BASE_URL);
    }

    function submit_update()
    {
        $status = false;
        $update_id = $this->input->post('student_id');
        $data['fullname'] = $this->input->post('fullname');
        $data['profile_description'] = $this->input->post('profile_description');
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
        if (isset($update_id) && !empty($update_id)) {
            if (isset($_FILES['profile_img']) && !empty($_FILES['profile_img'])) {
                if ($_FILES['profile_img']['size'] > 0) {
                    $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $update_id,), 'id', 'id', 'students', 'profile_img', '1', '0', '', '', '')->row_array();
                    if (!empty($temp)) {
                        if (isset($temp['profile_img']) && !empty($temp['profile_img'])) {
                            Modules::run('api/delete_images_by_name', ACTUAL_STUDENT_IMAGE_PATH, '', '', '', $temp['profile_img']);
                        }
                    }
                    Modules::run('api/upload_dynamic_image', ACTUAL_STUDENT_IMAGE_PATH, '', '', '', $update_id, 'profile_img', 'profile_img', 'id', 'students');
                }
            }
            Modules::run('api/update_specific_table', array('id' => $update_id), $data, 'students');
            $status = true;
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data));
    }

    function front_course_details($seoRouteURL=false)
    {
        if($seoRouteURL)
            $course_url = $seoRouteURL;
        else
            $course_url = $this->uri->segment(2);
        
        $data['course_detail'] = $this->get_course_details(array('courses.url' => $course_url), 'courses.id desc', 'courses.id', '', '0', '', '', '', '0')->row_array();
        

        $data['course_slider'] = $this->get_course_details(array(), 'courses.id desc', 'courses.id', '', '0', '', '', '', '0')->result_array();

        $selected = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $data['course_detail']['courseCategoryID']), 'id desc', 'id', 'course_category', '*', '1', '0', '', '', '')->row_array();
        
        $meta_data_html = Modules::run('api/get_specific_table_data', array('url' => $course_url,'status'=>1), 'id desc', '*', 'meta_tags_html', '', '')->row_array();
        if(isset($meta_data_html['meta_tag']) && !empty($meta_data_html['meta_tag'])){
            $data['meta_keywords'] = $meta_data_html['meta_tag'];
        }
        if(isset($meta_data_html['meta_description']) && !empty($meta_data_html['meta_description'])){
            $data['meta_description'] = $meta_data_html['meta_description'];
        }
        if(isset($data['course_detail']['courseTitle']) && !empty($data['course_detail']['courseTitle'])){
            $data['meta_title'] = $data['course_detail']['courseTitle'];
        }
        // $data['meta_title'] = $data['course_detail']['courseTitle'] . ' | ICR';
        // $data['seo_meta_tags'] = $this->get_seo_tags_from_db($course_url);
        // $data['meta_description'] = $data['course_detail']['courseTitle'];
        // $data['meta_keywords'] = $data['course_detail']['courseTitle'] . ', ' . $selected['title'];
        // $data['meta_tags_html'] =  Modules::run('api/get_specific_table_with_pagination_where_groupby', array('url' => $course_url), 'id desc', 'id', 'meta_tags_html', '*', '1', '0', '', '', '')->row_array();
        // echo "<pre>";
        // print_r($data['meta_tags_html']);
        // exit();
        $data['view_file'] = 'course_details';
        $this->load->module('template');
        $this->template->front($data);
    }
    

    function portal_course_details()
    {
        $course_id = $this->uri->segment(2);
        $course_id = $this->encryption_decryption($course_id, true);
        $data['course_detail'] = $this->get_course_details(array('courses.id' => $course_id), 'courses.id desc', 'courses.id', '', '0', '', '', '', '0')->row_array();
        $data['course_slider'] = $this->get_course_details(array(), 'courses.id desc', 'courses.id', '', '0', '', '', '', '0')->result_array();
        $data['enroled_students'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('course_id' => $course_id,), 'id', 'id', 'students', 'COUNT(id) as total', '1', '0', '', '', '')->row_array();
        $data['view_file'] = 'portal_course_details';
        $this->load->module('template');
        $this->template->front2($data);
    }

    function get_course_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset)
    {
        $this->load->model('Mdl_front');
        $query = $this->Mdl_front->get_course_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset);
        return $query;
    }

    function get_student_data_with_all_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset)
    {
        $this->load->model('Mdl_front');
        $query = $this->Mdl_front->get_student_data_with_all_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset);
        return $query;
    }

    function encryption_decryption($string, $is_decrept = FALSE)
    {
        $this->load->library('encryption');
        $key = bin2hex('$2y$12$TRnrDP1ohECFVXsQuDz0MuHLiV6Xr9.Zel0ei4i/AnyTqcRMzm7MG');
        $hmac_key = $this->encryption->hkdf($key, 'sha512', NULL, NULL, 'authentication');
        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $key,
                'hmac_digest' => 'sha256',
                'hmac_key' => $hmac_key
            )
        );
        $this->encryption->initialize(array('driver' => 'mcrypt'));
        if ($is_decrept == FALSE) {
            $ciphertext = $this->encryption->encrypt($string);
            if (strpos($ciphertext, '/') !== false) {
                return $this->encryption_decryption($string, $is_decrept = FALSE);
            } else {
                return $ciphertext;
            }
        } else {
            return $this->encryption->decrypt($string);
        }
    }

    function startInterval()
    {
        $status = false;
        $error_msg = "Some Error Occur, We will fix it soon";
        $data['std_id'] = $std_id = $this->input->post('std_id');
        $data['check_in'] = date('Y-m-d H:i:s');
        $checkIn_date = date('Y-m-d');
        if (isset($std_id) && !empty($std_id)) {
            $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('std_id' => $std_id), 'id', 'id', 'student_time_table', 'id', '1', '0', '(DATE(`check_in`) = CURDATE())', '', '')->row_array();
            if (empty($temp)) {
                $leave_status = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('student_id' => $std_id, 'approval_status' => 'Approved'), 'id', 'id', 'leaves', 'id', '1', '0', '("' . $checkIn_date . '" BETWEEN `leave_from` AND `leave_to`)', '', '')->row_array();
                if (empty($leave_status)) {
                    $shift_detail = $this->get_student_shift(array('students.id' => $std_id), 'students.id desc', 'students.id', '1', '0', '', '', '', '')->row_array();
                    if (isset($shift_detail) && !empty($shift_detail)) {
                        $shiftStart = Carbon::parse(date("Y-m-d H:i:s", strtotime($shift_detail['start_time'])));
                        $checkIn_time = Carbon::parse($data['check_in']);
                        $interval = $shiftStart->diff($checkIn_time)->format("%H:%I:%S");

                        if ($shiftStart >= $checkIn_time) {
                            // print_r('Early');exit;
                            $data['pre_arrival'] = $interval;
                            $data['status'] = 'Early arrived';
                            $return_id = Modules::run('api/insert_into_specific_table', $data, "student_time_table");
                            $status = true;
                            $error_msg = "You have checked in Successfully.";
                        } else if ($shiftStart < $checkIn_time) {
                            // print_r('Late');exit;
                            $data['late_arrival'] = $interval;
                            $data['status'] = 'Late arrived';
                            $return_id = Modules::run('api/insert_into_specific_table', $data, "student_time_table");
                            $status = true;
                            $error_msg = "You have checked in Successfully. But marked as Late!";
                        } else {
                            $status = false;
                            $error_msg = "You're not allowed to mark your attendance this time.";
                        }
                    } else {
                        $status = false;
                        $error_msg = "You have already checked in your time. You can't checked twice a day.";
                    }
                } else {
                    $status = false;
                    $error_msg = "You can't mark your attendance because your on leave.";
                }
            } else {
                $status = false;
                $error_msg = "You have already checked in your time. You can't checked twice a day.";
            }
        }
        if (isset($return_id) && !empty($return_id)) {
            $this->session->set_userdata('checkIn_id', $return_id);
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data, "error_msg" => $error_msg));
    }

    function startBreak()
    {
        $status = false;
        $error_msg = "Some Error Occur, We will fix it soon";
        $data['checkIn_id'] = $checkIn_id = $this->session->userdata('checkIn_id');
        $data['start_time'] = date('Y-m-d H:i:s');

        if (isset($checkIn_id) && !empty($checkIn_id)) {
            $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $checkIn_id), 'id', 'id', 'student_time_table', 'id', '1', '0', '', '', '')->row_array();
            if (isset($temp) && !empty($temp)) {
                $break_id = Modules::run('api/insert_into_specific_table', $data, "student_breaks");
                $status = true;
                $error_msg = "You have started your break Successfully.";
            } else {
                $status = false;
                $error_msg = "You have not checked in yet.";
            }
        }
        if (isset($break_id) && !empty($break_id)) {
            $this->session->set_userdata('break_id', $break_id);
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data, "error_msg" => $error_msg));
    }

    function stopBreak()
    {
        $status = false;
        $error_msg = "Some Error Occur, We will fix it soon";
        $break_id = $this->session->userdata('break_id');
        $data['end_time'] = date('Y-m-d H:i:s');

        if (isset($break_id) && !empty($break_id)) {
            $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $break_id), 'id', 'id', 'student_breaks', 'start_time', '1', '0', '', '', '')->row_array();
            if (isset($temp) && !empty($temp)) {
                $start_time = Carbon::parse(date("Y-m-d H:i:s", strtotime($temp['start_time'])));
                $end_time = Carbon::parse($data['end_time']);
                $data['total_break'] = $end_time->diff($start_time)->format("%H:%I:%S");
                $retrun_id = Modules::run('api/update_specific_table', array('id' => $break_id), $data, "student_breaks");
                $status = true;
                $error_msg = "You have Ended your break Successfully.";
            } else {
                $status = false;
                $error_msg = "You have not checked in yet.";
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data, "error_msg" => $error_msg));
    }

    function stopInterval()
    {
        $status = false;
        $error_msg = "Some Error Occur, We will fix it soon";
        $checkIn_id = $this->session->userdata('checkIn_id');
        $data['check_out'] = date('Y-m-d H:i:s');
        if (isset($checkIn_id) && !empty($checkIn_id)) {
            $temp = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('id' => $checkIn_id), 'id', 'id', 'student_time_table', 'check_in', '1', '0', '', '', '')->row_array();
            if (isset($temp) && !empty($temp)) {
                $check_in = Carbon::parse(date("Y-m-d H:i:s", strtotime($temp['check_in'])));
                $check_out = Carbon::parse($data['check_out']);
                $data['total_time'] = $check_out->diff($check_in)->format("%H:%I:%S");
                $breaks = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('checkIn_id' => $checkIn_id), 'id', 'checkIn_id', 'student_breaks', 'SEC_TO_TIME(SUM(TIME_TO_SEC(total_break))) as total', '1', '0', '', '', '')->row_array();
                if (isset($breaks) && !empty($breaks)) {
                    $breaks_time = Carbon::parse(date("Y-m-d H:i:s", strtotime($breaks['total'])));
                    $total_time = Carbon::parse($data['total_time']);
                    $data['total_without_break'] = $total_time->diff($breaks_time)->format("%H:%I:%S");
                } else {
                    $data['total_without_break'] = $data['total_time'];
                }
                $retrun_id = Modules::run('api/update_specific_table', array('id' => $checkIn_id), $data, "student_time_table");
                $status = true;
                $error_msg = "You have Checked out Successfully.";
            } else {
                $status = false;
                $error_msg = "You have not checked in yet.";
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array("status" => $status, "data" => $data, "error_msg" => $error_msg));
    }

    function get_student_shift($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset)
    {
        $this->load->model('Mdl_front');
        $query = $this->Mdl_front->get_student_shift($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset);
        return $query;
    }

    function temp_file()
    {
        $data['courses_slide'] = $this->get_course_details(array(), 'courses.id asc', 'courses.id', '1', '6', '', '', '', '')->result_array();
        $data['front_info'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET), 'id desc', 'id', 'information', 'name,description,image', '1', '0', '', '', '')->row_array();
        $data['home_slides'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'is_active' => '1'), 'id desc', 'id', 'home_slider', 'image,alt_text', '', '0', '', '', '')->result_array();
        $data['features_slide'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('outlet_id' => DEFAULT_OUTLET, 'status' => '1'), 'id desc', 'id', 'features', 'name,description,image', '', '0', '', '', '')->result_array();
        $data['enrolledStudents'] = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('approved_enrollment' => '1'), 'id desc', 'id', 'joining_requests', '*', '', '0', '', '', '')->result_array();
        //$data['seo_meta_tags'] = $this->get_seo_tags_from_db($url_slug = 'it-centre-rahim-yar-khan');
        //$data['meta_title'] = $mydata['meta_title'];
        $data['meta_description'] = 'ICR is the best trainning institute for computer short courses in rahim yar khan. We offer App development, Web development, graphic designing, Wordpress development, Digital marketing, Software Quality Assurance(SQA), UI/UX Design and Search engine optimization(SEO) Courses in our best IT training institute rahim yar khan.';
        $data['meta_keywords'] = 'computer short courses in rahim yar khan,computer academy in rahim yar khan,best institute for it courses in rahim yar khan,it courses in rahim yar khan,best training centre in rahim yar khan,it centre in rahim yar khan,it training institute in rahim yar khan';
        $this->load->module('template');
        $data['view_file'] = 'listing';
        $this->template->front($data);
    }
}
