<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_front extends CI_Model {
    function _get_pkgs_points($id) {
		$this->db->select('points.title,points.id');    
		$this->db->from('points');
		$this->db->join('pkg_points', 'pkg_points.point_id = points.id','left');
		$this->db->join('pkg', 'pkg.id = pkg_points.pkg_id','left');
		$this->db->where('pkg_points.pkg_id',$id);
        $query = $this->db->get();
        return $query;
	}
	
    function get_student_data_with_all_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
        $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
        $this->db->select('students.*,courses.title,courses.description,courses.duration,courses.image,instructors.name,instructors.designation');
        $this->db->from('students');
        $this->db->join('courses','courses.id=students.course_id','LEFT');
        $this->db->join('instructors','instructors.id=students.instructor_id','LEFT');
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get();
        return $query;
    }

    // function get_student_data_with_all_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
    //     $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
    //     $this->db->select('students.*,courses.*,instructors.*,installments.*,student_social_links.*,achievements.*');
    //     // $this->db->select('students.id as studentID,students.fullname,students.username,students.email,students.profile_img,students.profile_description,students.address,students.course_enroll_date,students.course_end_date,students.fiver_account_link,courses.id as courseID,courses.title as courseTitle,courses.description as courseDescription,courses.image as courseImage,instructors.id as instructorID,instructors.name instructorName,installments.id as installmentsID,installments.title as notificationTitle,installments.description as notificationDescription,installments.student_id as notificationOfStudent,student_social_links.id as socialID,student_social_links.facebook,student_social_links.instagram,student_social_links.twitter,student_social_links.linked_in,achievements.id as achievemrntID,achievements.title as achievementTitle,achievements.image as achievementimg');
    //     $this->db->from('students');
    //     $this->db->join('courses','courses.id=students.course_id','LEFT');
    //     $this->db->join('instructors','instructors.id=students.instructor_id','LEFT');
    //     $this->db->join('student_social_links','student_social_links.id=students.social_link_id','LEFT');
    //     $this->db->join('installments','installments.id=students.notification_id','LEFT');
	// 	$this->db->join('achievements','achievements.id=students.achievement_id','LEFT');
    //     if(!empty($group_by))
    //         $this->db->group_by($group_by);
    //     if(!empty($cols))
    //         $this->db->where($cols);
    //     if(!empty($or_where))
    //         $this->db->where($or_where);
    //     if(!empty($and_where))
    //         $this->db->where($and_where);
    //     if(!empty($having))
    //         $this->db->having($having);
    //     if($limit != 0)
    //         $this->db->limit($limit, $offset);
    //     $this->db->order_by($order_by);
    //     $query=$this->db->get();
    //     return $query;
    // }

    function get_course_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
        $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
        $this->db->select('courses.id as courseID,courses.title as courseTitle,courses.description as courseDescrition,course_category.title as courseCategory,courses.category_id as courseCategoryID,courses.instructor_id as courseIsntructorID,instructors.name as courseInstructor,courses.duration as courseDuration,courses.icon as courseIcon, courses.image as courseImage, courses.url as courseURL');
        $this->db->from('courses');
        $this->db->join('course_category','course_category.id=courses.category_id','LEFT');
        $this->db->join('instructors','instructors.id=courses.instructor_id','LEFT');
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }

    function get_student_shift($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
        $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
        $this->db->select('students.id, students.shift_id, shift_time_table.start_time, shift_time_table.end_time');
        $this->db->from('students');
        $this->db->join('shift_time_table','shift_time_table.id=students.shift_id','LEFT');
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }

}
