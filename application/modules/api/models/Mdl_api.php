<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_api extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function insert_or_delete($where,$data,$table) {
        $insert_id = 0;
        if(!empty($where))
        $this->db->where($where);
        $query=$this->db->get($table)->num_rows();
        if($query > 0) {
          if(!empty($where))
            $this->db->where($where);
            $this->db->delete($table);
        }
        else {
          $this->db->insert($table, $data);
          $insert_id = $this->db->insert_id();
        }
        return $insert_id; 
    }
    function delete_from_specific_table($where,$table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function update_specific_table($where,$data,$table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function insert_or_update($where,$data,$table) {
        $insert_id = 0;
        if(!empty($where))
            $this->db->where($where);
        $query=$this->db->get($table)->num_rows();
        if($query > 0) {
          if(!empty($where))
            $this->db->where($where);
            $this->db->update($table, $data);
        }
        else {
          $this->db->insert($table, $data);
          $insert_id = $this->db->insert_id();
        }
        return $insert_id; 
    }
    function _insert_into_specific_table($data,$table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    

    function insert_or_update_specific_image($where,$data,$table,$index) {
        $inserted_id = array();
        if(!empty($where))
        $this->db->where($where);
        $query=$this->db->get($table);
        $query2=$query->result_array();
        $query=$query->num_rows();
        if($query > 0) {
          if(!empty($where))
            $this->db->where($where);
            $this->db->update($table, $data);
            if(isset($query2[0][$index]) && !empty($query2[0][$index])) {
                $inserted_id['update_insert'] ="update";
                $inserted_id['inserted_id'] = $query2[0][$index];
            }
            else {
                $inserted_id['update_insert'] ="update";
                $inserted_id['inserted_id'] = '0';
            }
        }
        else {
          $this->db->insert($table, $data);
          $insert_idd = $this->db->insert_id();
          $inserted_id['update_insert'] ="insert";
          $inserted_id['inserted_id'] = $insert_idd;
        }
        if(isset($inserted_id))
          return $inserted_id; 
    }
    function _get_specific_table_with_pagination($cols, $order_by,$table,$select,$page_number,$limit){
        $offset=($page_number-1)*$limit;
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($cols))
        $this->db->where($cols);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_specific_table_data($where,$order,$select,$table_name,$page_number,$limit) {
        $offset = ($page_number-1) *$limit;
        $this->db->select($select);
        $this->db->from($table_name);
        if(isset($where) && !empty($where))
            $this->db->where($where);
        if(isset($limit) && !empty($limit))
            if($limit !=0)
                $this->db->limit($limit,$offset);
        if(isset($order) && !empty($order))
            $this->db->order_by($order);
        return $this->db->get();
    }

    function get_specific_table_with_pagination_where_groupby($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where='',$and_where='',$having=''){
        $offset=($page_number-1)*$limit;
        $this->db->select($select,false);
        $this->db->from($table);
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
