<?php
/*************************************************
Modified By: Akabir Abbasi
Date: 17-12-2015
*************************************************/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_pkg_type extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function get_points_data($id)
    {
        $this->db->select('title,points.id');    
        $this->db->from('points');
        $this->db->join('pkg_points', 'points.id = pkg_points.point_id','left');
        $this->db->join('pkg', 'pkg.id = pkg_points.pkg_id','left');
        $this->db->where('pkg.id',$id);
        
        $query = $this->db->get();
        return $query;

    }
}