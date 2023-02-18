<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllBlogs extends CI_Controller {
	function __construct() 
    {
        parent::__construct();
		$this->load->model('blog_model');
        $this->load->database();
        $this->load->helper('url');
    }
	public function index()
	{
        $total_rows = $this->db->count_all('blog');
        $limit = 1;
        $data['posts'] = $this->blog_model->get_blogs($limit, 0);
        $data['total_rows'] = $total_rows;
        $data['limit'] = $limit;
        $data['current_page'] = 1;
        $data['total_pages'] = ceil($total_rows / $limit);
        $this->load->view('all_blogs', $data);
	}

    public function page($page = 1) {
        $total_rows = $this->db->count_all('blog');
        $limit = 1;
        $offset = ($page - 1) * $limit;
        $data['posts'] = $this->blog_model->get_blogs($limit, $offset);
        $data['total_rows'] = $total_rows;
        $data['limit'] = $limit;
        $data['current_page'] = $page;
        $data['total_pages'] = ceil($total_rows / $limit);
        $this->load->view('all_blogs', $data);
    }

    public function getblogInAll() {
        $itemId = $this->input->get('id');
        $this->load->model('blog_model');
        $data['blog'] = $this->blog_model->get_data_from_id($itemId);
        $this->load->view('blog_see_more', $data);
    }
}
