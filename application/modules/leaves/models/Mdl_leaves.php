<?php
/*************************************************
Modified By: Akabir Abbasi
Date: 17-12-2015
*************************************************/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_leaves extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_leaves_requests_of_students($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
        $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
        $this->db->select('leaves.id as leavesID,leaves.leave_from as leaveFromDate,leaves.leave_to as leaveToDate,leaves.comment as leaveComments,leaves.leave_type as leaveType,leaves.created_at as leaveRequestDate,leaves.approval_status as leaveApprovalStatus,leaves.approved_by as leaveApprovedBy,students.id as studentID,students.fullname as leaveRequestedBy,leaves.is_deleted as leaveDeleteStatus');
        $this->db->from('leaves');
        $this->db->join('students','students.id=leaves.student_id','LEFT');
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

    function get_student_data_with_all_details($cols,$order_by,$group_by,$page_number,$limit,$or_where,$and_where,$having,$offset) {
        $offset = (!is_numeric($offset) ? ($page_number-1)*$limit : $offset);
        $this->db->select('students.id as studentID,students.fullname,students.roll_number as studendRollNumber,students.username,students.email,students.profile_img,students.profile_description,students.address,students.phone as studentPhoneNo,students.instructor_id as studentIsntructorID,students.course_id as studentCourseID,students.course_enroll_date,students.course_end_date,students.fiver_account_link,students.batch as studentBatch,courses.id as courseID,courses.title as courseTitle,courses.description as courseDescription,courses.image as courseImage,instructors.id as instructorID,instructors.name as instructorName,leaves.id as leavesID,leaves.title as notificationTitle,leaves.description as notificationDescription,leaves.student_id as notificationOfStudent,student_social_links.id as socialID,student_social_links.facebook,student_social_links.instagram,student_social_links.twitter,student_social_links.linked_in,achievements.id as achievemrntID,achievements.title as achievementTitle,achievements.image as achievementimg');
        $this->db->from('students');
        $this->db->join('courses','courses.id=students.course_id','LEFT');
        $this->db->join('instructors','instructors.id=students.instructor_id','LEFT');
        $this->db->join('student_social_links','student_social_links.id=students.social_link_id','LEFT');
        $this->db->join('leaves','leaves.id=students.notification_id','LEFT');
		$this->db->join('achievements','achievements.id=students.achievement_id','LEFT');
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