<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <style>
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

      .card-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 8%;
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

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #f0f0f0;
            color: #333;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #333;
            color: #fff;
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
      xhr.open('GET', 'getblogInAll?id=' + itemId);
      xhr.send();
    });
  }
};

</script>
    <div class="navbar">
      <!-- <img class="navbar-logo" src="https://dummyimage.com/100x50/000/fff" alt="Logo"> -->
      <p>Tech Read</p>
      <div class="navbar-links">
        <a href="/">Home</a>
        <a href= "/Createblog"> New Blog</a>
        <a href="">All Blog</a>
      </div>
    </div>
    <div id="modal">
      <div id="modal-content"></div>
        <div id="close-container">
          <button id="close-modal"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div id="underlay">
    </div>
    <div class="card-container">
      <?php foreach ($posts as $post) { ?>
        <div class="card">
        <?php 
            $imageDataEncoded = base64_encode($post->blog_image);
            $imageHtml = "<img class='card-image' height=200 width=200 src='data:image/png;base64,".$imageDataEncoded."'/>";
            echo $imageHtml;
        ?>
          <div class="card-content">
            <h2 class="card-title"><?php echo $post->title?></h2>
            <p><?php echo substr($post->description, 0, 150) . "....";?><a class="see-more" href="#" data-item-id="<?= $post->blog_id ?>"> See More</a></p>
            <div class="card-meta">
              <p>Author: <b><?php echo $post->author_name?></b></p>
              <p>Published: February 16, 2023</p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <?php 
        $base_url = base_url('AllBlogs');
        $port = $_SERVER['SERVER_PORT'];
        $current_url = 'http' . (isset($_SERVER['HTTP']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME'] . ':' . $port . $_SERVER['REQUEST_URI'];
        // Determine the current page number from the URL
        $current_page = (int) substr(strrchr($current_url, '/'), 1);
        // $current_page = (int) $current_url == 0 ? 1:$current_url;
        $last_char = substr($current_url, -1);
        $current_url = $last_char != 's' ? substr($current_url, 0, -2) : $current_url;

       if ($total_pages > 1) {
            echo '<div class="pagination">';
            if ($current_page > 1) {
                echo '<a href="' . $current_url . '">First</a>';
                echo '<a href="' . $current_url . '/' . ($current_page - 1) . '">Previous</a>';
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                $url = $current_url;
                $class = ($i == $current_page) ? 'active' : '';
                echo '<a href="' . $url . '/' . $i . '" class="' . $class . '">' . $i . '</a>';
            }
            if ($current_page < $total_pages) {
                echo '<a href="' . $current_url . '/' . ($current_page + 1) . '">Next</a>';
                echo '<a href="' . $current_url . '/' . $total_pages . '">Last</a>';
            }
            echo '</div>';
        }
     ?>

</body>
</html>