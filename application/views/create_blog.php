<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blog Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
      body {
        background-color: #f1f1f1;
      }
      .card {
        margin-top: 50px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
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
        width: auto;
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
    </style>
  </head>
  <body>
    <div class="navbar">
      <!-- <img class="navbar-logo" src="https://dummyimage.com/100x50/000/fff" alt="Logo"> -->
      <p>Tech Read</p>
      <div class="navbar-links">
        <a href="/">Home</a>
        <a href="">New Blog</a>
        <a href="AllBlogs">All Blog</a>
      </div>
    </div>
    <div style="margin-top: 8%;" class="container">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Create a new blog post</h2>
          <form action="<?php 
            $base_url = base_url(); // Get the base URL without the port number
            $port = $_SERVER['SERVER_PORT']; // Get the current port number
            $base_url = str_replace(parse_url($base_url, PHP_URL_SCHEME) . '://', parse_url($base_url, PHP_URL_SCHEME) . '://' . $_SERVER['SERVER_NAME'] . ':' . $port . '/', 'Upload');
            echo $base_url;
          
          ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
              <label for="author-name">Author Name</label>
              <input type="text" class="form-control" id="author-name" name="author_name" required>
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
