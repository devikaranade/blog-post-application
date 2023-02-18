<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function insert_data($data) {
        $this->db->insert('blog', $data);
    }

    function get_data_from_id($id) {
        $query = $this->db->get_where('blog', array('blog_id' => $id));
        $result = $query->row_array();
        return $result;
    }

    public function get_blogs($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('blog');
        return $query->result();
    }
}
