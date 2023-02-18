<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
		$this->load->database();
        $this->load->helper('url');
        // $this->load->model('blog_model');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$query = $this->db->query('SELECT * FROM blog LIMIT 5');
		$data['posts'] = $query->result();
		$this->load->view('welcome_message', $data);
	}

	public function getPostImage($id) {
		$this->load->database();
		$query = $this->db->get_where('blog', array('blog_id' => $id));
		$result = $query->row_array();
		$image_data = $result['blog_image'];
		header('Content-type: image/jpeg');
		// echo "<p>Hello</p>";
		echo $image_data;
	}

	public function getblog() {
        $itemId = $this->input->get('id');
        $this->load->model('blog_model');
        $data['blog'] = $this->blog_model->get_data_from_id($itemId);
        $this->load->view('blog_see_more', $data);
    }
}
