<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateBlog extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
		$this->load->database();
        $this->load->helper('url');
        $this->load->model('blog_model');
    }

	public function index()
	{
		// $query = $this->db->query('SELECT * FROM user');

        // foreach ($query->result() as $row) {
        //     $data["id"] = $row->id;
		// }	
		
		$this->load->view('create_blog');
		
	}

    public function add_data() {
        // Load the form validation and database libraries
        $this->load->library('form_validation');
        $this->load->database();
        
        // Set the validation rules for the form fields
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('content', 'Content', 'required');
        // $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        // If the form was not submitted or failed validation, display the form again
        // if ($this->form_validation->run() === FALSE) {
        //     $this->load->view('blog_form');
        // }
        // else {
            // Get the form data
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('content'),
                'author_id' => 1,
                'author_name' => $this->input->post('author_name'),
                // 'email' => $this->input->post('email'),
            );
            
            // Upload the image file and add the file path to the data array
            // if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            //     $upload_path = 'uploads/';
            //     $file_name = basename($_FILES['image']['name']);
            //     $file_path = $upload_path . $file_name;
            //     move_uploaded_file($_FILES['image']['tmp_name'], $file_path);
            //     $data['blog_image'] = $file_path;
            // }
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $data['blog_image'] = file_get_contents($_FILES['image']['tmp_name']);
            }
            
            // Insert the data into the database
            $this->blog_model->insert_data($data);
            // $port = $_SERVER['SERVER_PORT'];
            // $redirectlink = $_SERVER['SERVER_NAME'] . ':' . $port . '/Home';
            // $redirectlink = $_SERVER['SERVER_PORT'];
            // $base_url = base_url(); // Get the base URL without the port number
            // $port = $_SERVER['SERVER_PORT']; // Get the current port number
            // Redirect to the home page
            // header('Location: '.$redirectlink);

            // echo ("Your blog has been posted!"); 
        // }            
        // $data = array(
        //     'title' => $this->input->post('title'),
        //     'description' => $this->input->post('content'),
        //     // 'author_name' => $this->input->post('author_name'),
        //     'author_id' => 1
        // );
        // $imagePath = "";
        // if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        //     $targetDir = "uploads/";
        //     $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        //     $imageType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        //     $allowedTypes = array("jpg", "jpeg", "png", "gif");
        //     if (in_array($imageType, $allowedTypes)) {
        //     if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        //         $imagePath = $targetFile;
        //         }
        //     }
        // $this->blog_model->insert_data($data);
        // $title = $data["title"];
        // $content = $data["content"];
        // $authorName = $data["author_name"];
        // // $email = $_POST["email"];
        // echo "<h2>$title</h2>";
        // // if ($imagePath) {
        // //     echo "<img src='$imagePath' alt=''>";
        // // }
        // echo "<p>$content</p>";
        // echo "<p>By $authorName</p>";
    }
}
