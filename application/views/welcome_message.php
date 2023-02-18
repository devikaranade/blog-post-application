<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<style>
	body {
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
        height: 100%;
      }

      .see-more {
          border: none;
          background-color: inherit;
      }

      .see-more:hover {
          
      }

      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        color: #fff;
        padding: 10px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
      }

      .navbar-logo {
        height: 50px;
        /* width: 0px; */
        width: 100px;
        margin-left: 10px;
      }

      .navbar-links {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-right: 10px;
      }

      .navbar-links a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
      }

      .card-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 6%;
      }

      .card {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 10px;
        max-width: 700px;
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .card-title {
        color: #333;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .card-image {
        flex-basis: 30%;
        max-width: 100%;
        border-radius: 5px;
      }

      .card-content {
        color: #666;
        flex-basis: 70%;
        margin-left: 20px;
      }

      .card-meta {
        color: #999;
        font-size: 14px;
      }

      .card-meta p {
        margin: 5px 0;
      }

      #underlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9998;
        background-color: rgba(0, 0, 0, 0.5);
        filter: blur(4px);
    }

      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8); /* Add semi-transparent background */
      }

/* Modal Content */
      .modal-content {
        color: #FF0000;
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px; /* Set a maximum width for the modal content */
        position: absolute;
        top: 50%; /* Position the modal content in the center of the screen */
        left: 50%;
        transform: translate(-50%, -50%);
      }

      #close-container {
        position: absolute;
        top: 0;
        right: 0;
      }

      #close-modal {
        margin: 10px;
        /* background: transparent; */
        border: none;
      }

      #close-modal i {
        color: #333;
        font-size: 20px;
      }
    </style>
</head>
<body>
<script>
  window.onload = function() {
  var buttons = document.querySelectorAll('.see-more');
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', function() {
      var itemId = this.getAttribute('data-item-id');
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          var details = document.getElementById('modal-content');
          var modal = document.getElementById('modal');
          var underlay = document.getElementById('underlay');

          underlay.style.display = 'block'

          details.innerHTML = xhr.responseText;
          details.style.color = "#000000";
          details.style.backgroundColor = "#FEFEFE";
          details.style.margin = "auto";
          details.style.padding = "20px";
          details.style.border = "1px solid";
          details.style.width = "80%";
          details.style.maxWidth = "600px";
          details.style.position = "absolute";
          details.style.top = "50%";
          details.style.left = "50%";
          details.style.transform = "translate(-50%, -50%)";


          modal.style.position = 'fixed';
          modal.style.zIndex = 9999;
          modal.style.left = 0;
          modal.style.top = 0;
          modal.style.width = '100%';
          modal.style.height = '100%';
          modal.style.overflow = 'auto';
          modal.style.display = 'block';

          var closeButton = document.getElementById('close-modal');
          closeButton.addEventListener('click', function() {
            modal.style.display = 'none';
            underlay.style.display = 'none';
          });


          // var modalContent = window.getComputedStyle(document.querySelector('.modal-content'));
        }
      };
      xhr.open('GET', 'getblog?id=' + itemId);
      xhr.send();
    });
  }
};
</script>
    <div id="modal">
      <div id="modal-content"></div>
        <div id="close-container">
          <button id="close-modal"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="navbar">
      <!-- <img class="navbar-logo" src="application/views/images/techread.png" alt="Logo" > -->
      <p>Tech Read</p>
      <div class="navbar-links">
        <a href="/">Home</a>
        <a href="Createblog">New Blog</a>
        <a href="AllBlogs">All Blog</a>
      </div>
    </div>
    <div id="underlay">
    </div>
    
    <div class="card-container">
      <?php foreach ($posts as $post) { ?>
        <div class="card">
          <img class="card-image" height=200 width=200 src="<?php 
            // base_url("blog/image/{$post->blog_id}") 
            $base_url = base_url(); // Get the base URL without the port number
            $port = $_SERVER['SERVER_PORT']; // Get the current port number
            // $base_url = 'http:/' . $_SERVER['SERVER_NAME'] . ":" . $port . '/blog/image/' . $post->blog_id;
            $base_url = str_replace(parse_url($base_url, PHP_URL_SCHEME) . '://', parse_url($base_url, PHP_URL_SCHEME) . '://' . $_SERVER['SERVER_NAME'] . ':' . $port . '/', 'blog/image/' . $post->blog_id);
            echo $base_url; ?>" alt="Blog Post Image">
          <div class="card-content">
            <h2 class="card-title"><?php echo $post->title?></h2>
            <p><?php echo substr($post->description, 0, 150) . "....";?> <a class="see-more" href="#" data-item-id="<?= $post->blog_id ?>"> See More</a></p>
            <div class="card-meta">
              <p>Author: <b><?php echo $post->author_name?></b></p>
              <p>Published: February 16, 2023</p>
            </div>
          </div>
        </div>
         
      <?php } ?>
    </div>

</body>
</html>