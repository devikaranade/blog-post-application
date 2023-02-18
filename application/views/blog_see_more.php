<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <style>
        /* Modal Structure */
        .modal {
        display: none; /* Hide the modal by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top of everything */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scrolling */
        background-color: rgba(0,0,0,0.8); /* Black background with opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: 10% auto; /* 10% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Modal Image */
        .modal-image {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        }

        /* Modal Text */
        .modal-text {
        margin-top: 20px;
        }

        /* Modal Artist */
        .modal-artist {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        }

        /* Artist Info */
        .artist-info {
        display: flex;
        flex-direction: column;
        }

        .artist-info h4 {
        margin: 0;
        }

        .artist-info p {
        margin: 0;
        font-size: 0.8rem;
        color: gray;
        }

        /* Like Button */
        .like-button {
        background-color: white;
        border: 1px solid gray;
        padding: 10px 20px;
        cursor: pointer;
        }

        .like-button:hover {
        background-color: gray;
        color: white;
        }

    </style>
</head>
<body>
    <!-- Modal Structure -->
    <!-- <div class="modal"> -->
    <!-- <div class="modal-content"> -->
        <?php 
            $imageDataEncoded = base64_encode($blog['blog_image']);
            $imageHtml = "<img class='modal-image' height=200 width=200 src='data:image/png;base64,".$imageDataEncoded."'/>";
            echo $imageHtml;
        ?>
        <div class="modal-text">
            <h2><?php echo $blog['title'] ?></h2>
            <p><?php echo $blog['description'] ?></p>
        </div>
        <div class="modal-artist">
        <div class="artist-info">
            <h4>Author Name</h4>
            <p><?php echo $blog['author_name'] ?></p>
        </div>
        <!-- <div class="artist-actions">
            <button class="like-button">Like</button>
        </div> -->
        </div>
    <!-- </div> -->
    <!-- </div> -->
</body>
</html>