<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_newsletter extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "newsletter";
        return $table;
    }
	
    function _insert($data){
        $table = $this->get_table();
        $this->db->insert($table, $data);
        return $this->db->insert_id();
        
    }
     function _delete($arr_col) {       
        $table = $this->get_table();
        $this->db->where($arr_col);
        $this->db->delete($table);
    }
    function _get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }
    function _get_by_arr_id($arr_col) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        return $this->db->get($table);
    }

}