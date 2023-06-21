<?php
/*************************************************
Modified By: Akabir Abbasi
Date: 17-12-2015
*************************************************/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_courses extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_course_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
        $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
        $this->db->select('courses.id as courseID,courses.title as courseTitle,courses.description as courseDescrition,courses.icon as courseIcon,course_category.title as courseCategory,courses.category_id as courseCategoryID,courses.duration as courseDuration,courses.instructor_id as courseIsntructorID,instructors.name as courseInstructor,courses.duration as courseDuration,courses.image as courseImage,courses.url as url');
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
}