<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_enrollment extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_enrollment_data_with_all_details($cols, $order_by, $group_by, $page_number, $limit, $or_where, $and_where, $having, $offset)
    {
        $offset = (!is_numeric($offset) ? ($page_number - 1) * $limit : $offset);
        $this->db->select('enrollment.*,courses.title as course_title,batch.title as batch_title');
        $this->db->from('enrollment');
        $this->db->join('courses', 'courses.id=enrollment.course_id', 'LEFT');
        $this->db->join('batch', 'batch.id=enrollment.batch_id', 'LEFT');
        if (!empty($group_by))
            $this->db->group_by($group_by);
        if (!empty($cols))
            $this->db->where($cols);
        if (!empty($or_where))
            $this->db->where($or_where);
        if (!empty($and_where))
            $this->db->where($and_where);
        if (!empty($having))
            $this->db->having($having);
        if ($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get();
        return $query;
    }
}
