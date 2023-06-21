<?php

/* * ***********************************************
  Created By: Akabir Abbasi
  Dated: 06-11-2014
  version: 1.0
 * *********************************************** */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_outlet_roles extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "roles_outlet";
        return $table;
    }
    
    function _get_all($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

	function _get_where($where, $order_by=''){
		$table = $this->get_table();
		$this->db->where($where);
		if($order_by != '')
			$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

    function get($order_by) {
        $table = $this->get_table();
		$this->db->where('status', 1);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->select("roles_outlet.*, outlet.name as outlet_name, roles.role as role_name");
        $this->db->join("outlet", "roles_outlet.outlet_id = outlet.id", "left");
        $this->db->join("roles", "roles_outlet.role_id = roles.id", "left");
        $this->db->where($col, $value);
        return $this->db->get($table);
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
	

    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() > 0) {           
           
            return true;
        } else {
            return false;
        }
    }

    function _update_where($column, $data) {
        $table = $this->get_table();
        $this->db->where($column);
        return $this->db->update($table, $data);
    }

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $table = $this->get_table();
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }
	
    function _get_by_arr_id($arr_col) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        return $this->db->get($table);
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row = $query->row();
        $id = $row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }
    function _get_records() {
        $table = $this->get_table();       
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }
	
	function _check_e_no($e_no) {
		$table = $this->get_table();
		$this->db->where("`e_num` = '".$e_no."'");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	function _check_e_no_edit($e_no,$id) {
		$table = $this->get_table();
		$this->db->where("`e_num` = '".$e_no."' AND `id` != '".$id."' ");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	
	function _check_email($email) {
		$table = $this->get_table();
		$this->db->where("`email` = '".$email."'");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	function _check_email_edit($email,$id) {
		$table = $this->get_table();
		$this->db->where("`email` = '".$email."' AND `id` != '".$id."' ");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
		
	function _check_username($username) {
		$table = $this->get_table();
		$this->db->where("`user_name` = '".$username."'");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	function _check_username_edit($username,$id) {
		$table = $this->get_table();
		$this->db->where("`user_name` = '".$username."' AND `id` != '".$id."' ");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	
	function _check_ni_no($ni_no) {
		$table = $this->get_table();
		$this->db->where("`ni_no` = '".$ni_no."'");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	function _check_ni_edit($ni_no,$id) {
		$table = $this->get_table();
		$this->db->where("`ni_no` = '".$ni_no."' AND `id` != '".$id."' ");
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		if($num_rows > 0)
			return 1;
		else
			return 0;
	}
	function _get(){
		$table = $this->get_table();
		$this->db->select("id, name, job_title");
		$query = $this->db->get($table);
		return $query;
	}
	
	
	function _fiscal_year($status) {
        $table = $this->get_table();
        $this->db->where('status', 1);
		$query = $this->db->get($table);
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

        return $num_rows;
    }
}
