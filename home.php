<?php

session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
  echo "<script>alert('Please Login First!')</script>";
  echo "<script>location.href='login.php'</script>";
}

// Fetch user reviews
$reviewdata = mysqli_query($conn, "SELECT * FROM `user_reviews`");
if (!$reviewdata) {
  die("Error fetching user reviews: " . mysqli_error($conn));
}

$userReviews = array();
while ($row = mysqli_fetch_assoc($reviewdata)) {
  $userReviews[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeTa Website</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Open+Sans:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {

      background-image: url('deta_B.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: auto;
    }

    #search-input {
      padding: 25px;
      border: none;
      border-radius: 4px 0 0 4px;

    }

    #search-button {
      padding: 25px;
      background-color: #e50914;
      border: none;
      border-radius: 0 5px 5px 0;
      color: #fff;
      cursor: pointer;
    }

    /* Feature card css start from here */
    div [class^="col-"] {
      padding-left: 5px;
      padding-right: 5px;
    }

    .card {
      transition: 0.5s;
      cursor: pointer;
    }

    .card-title {
      font-size: 15px;
      transition: 1s;
      cursor: pointer;
    }

    .card-title i {
      font-size: 15px;
      transition: 1s;
      cursor: pointer;
      color: #ffa710
    }

    .card-title i:hover {
      transform: scale(1.25) rotate(100deg);
      color: #18d4ca;

    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .card-text {
      height: 80px;
    }

    .card::before,
    .card::after {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      transform: scale3d(0, 0, 1);
      transition: transform .3s ease-out 0s;
      background: rgba(255, 255, 255, 0.1);
      content: '';
      pointer-events: none;
    }

    .card::before {
      transform-origin: left top;
    }

    .card::after {
      transform-origin: right bottom;
    }

    .card:hover::before,
    .card:hover::after,
    .card:focus::before,
    .card:focus::after {
      transform: scale3d(1, 1, 1);
    }

    /* Carousel css start from here */

    .carousel {
      margin-bottom: 4rem;
    }

    .carousel {
      position: relative;
    }

    .carousel-item {
      height: 480px;
    }


    .carousel-item {
      border-radius: 12px;
      overflow: hidden;
      position: relative;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, border 0.3s ease-in-out;
      backdrop-filter: blur(10px);
      /* Adjust the blur intensity as needed */
    }

    .carousel-item:hover {
      transform: perspective(1000px) rotateY(5deg) scale(1.05);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      border: 2px solid #18d4ca;
      /* Adjust the border color and width as needed */
    }


    /* Increase font size for description */
    /* Add animation to the review description */
    .carousel-caption .review-description {
      font-size: 22px;
      animation: fadeInUp 1s ease-in-out;
      /* Example animation, you can adjust properties */
    }

    /* Add animation to genres text */
    .carousel-caption .genres-text {
      font-size: 15px;
      animation: fadeInRight 1s ease-in-out;
      /* Example animation, you can adjust properties */
    }


    /* Add animation to the review description */
    .carousel-caption .review-description {
      font-size: 22px;
      animation: fadeInUp 1s ease-in-out;
      /* Example animation, you can adjust properties */
    }

    /* Add animation to genres text */
    .carousel-caption .genres-text {
      font-size: 15px;
      animation: fadeInRight 1s ease-in-out;
      /* Example animation, you can adjust properties */
    }

    /* Add animation to paragraph and h1 elements */
    .carousel-caption p,
    .carousel-caption h1 {
      font-family: 'Roboto', sans-serif;
      font-size: 20px;
      color: #fff;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
      animation: fadeIn 1s ease-in-out;
      /* Example animation, you can adjust properties */
    }

    /* Additional animation for h1 elements */
    .carousel-caption h1 {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 5px;
      animation: bounceInDown 1s ease-in-out;
      /* Example animation, you can adjust properties */
    }

    /* Keyframes for the animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(-20px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes bounceInDown {

      from,
      20%,
      40%,
      60%,
      80%,
      to {
        animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      }

      0% {
        opacity: 0;
        transform: translateY(-3000px);
      }

      20% {
        opacity: 1;
        transform: translateY(25px);
      }

      40% {
        transform: translateY(-20px);
      }

      60% {
        transform: translateY(10px);
      }

      80% {
        transform: translateY(-5px);
      }

      to {
        transform: translateY(0);
      }
    }

    .btn-read-more {
      font-family: 'Verdana', sans-serif;
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .btn-read-more:hover {
      background-color: #2980b9;
      transform: scale(1.1);
    }

    .review-description {
      font-family: 'Arial', sans-serif;
      font-size: 14px;
      color: #666;
      margin-top: 10px;
    }

    .carousel-control-prev:hover::before,
    .carousel-control-next:hover::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, transparent 10%, #555 70%);
      transform: scale(0);
      animation: ripple 0.5s linear;
    }

    @keyframes ripple {
      to {
        transform: scale(3);
        opacity: 0;
      }
    }

    @keyframes bubble {
      0% {
        transform: scale(1);
        opacity: 1;
      }

      50% {
        transform: scale(1.2);
        opacity: 0.7;
      }

      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <div style="background-color: #000000;">
    <header class="p-4 d-flex justify-content-between align-items-center">
      <a href="home.php" class="d-flex align-items-center text-white text-decoration-none">
        <img src="logo.jpg" alt="logo" style="width: 210px;">
      </a>

      <ul class="nav col-lg-auto ms-auto mb-2 mb-md-0">
        <li><a href="home.php" class="nav-link text-white">H O M E</a></li>
        <li><a href="#feature-section" class="nav-link text-white">F E A T U R E</a></li>
        <li><a href="ticket.php" class="nav-link text-white">B U Y T I C K E T S</a></li>
        <li><a href="#userReviewsCarousel" class="nav-link text-white">R E V I E W S</a></li>
        <li><a href="#" class="nav-link text-white">C O N T A C T</a></li>
      </ul>
      <div class="dropdown text-end">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" style="margin-right: 20px;">
          <img src="image/user.png" alt="" width="32" height="32" class="rounded-circle">
        </a>

        <ul class="dropdown-menu text-small">
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </header>
  </div>



  <div class="bg-image" style="background-image: url('deta_B.jpg'); background-size: cover; height: 100vh;">
    <div class="text-center d-flex align-items-center justify-content-center" style="height: 100vh;">
      <div class="welcome-container" style="background-color: rgba(0, 0, 0, 0.3); padding: 20px; border-radius: 10px;">
        <h1 class="display-4 fw-bold" name="font" style="color: #ffffff; font-family: 'Roboto Mono', monospace;">
          Unlimited Movies TV, Shows and More.
        </h1>
        <div class="col-lg-12 mx-auto" style="color: rgba(255, 255, 255, 0.9);">
          <p class="lead welcome-text" name="font" style="font-family: 'Amatic SC', cursive; font-size: 30px;">Dive into
            a reel adventure with us - where every click unlocks a world of movies and TV shows!<br>Finds your...</p>

          <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search movies and shows">
            <button id="search-button">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Display User Reviews -->
  <div id='userReviewsCarousel' class='carousel slide' data-bs-ride='carousel'>
    <div class='carousel-inner'>
      <?php
      // Display user reviews in carousel
      foreach ($userReviews as $index => $review) {
        $activeClass = ($index === 0) ? 'active' : '';
        $movieId = $review['id'];
        $thumbnail = $review['Thumbnail'];
        $genres = $review['Genres'];
        $rating = $review['Rating'];
        // Convert numeric rating to star symbols
        $starRating = "<span style='font-size: 24px;'>" . str_repeat("⭐", intval($rating)) . "</span>";
        echo "<div class='carousel-item $activeClass' style='background-image: url($thumbnail); background-size: cover;'>
                  <div class='container'>
                    <div class='carousel-caption text-start'>
                      <p>$starRating</p>
                      <h1 style='font-family: Montserrat, sans-serif;'>{$review['Movie Title']}</h1>
                      <p class='genres-text'>{$review['Genres']}</p>              
                      <a class='btn btn-secondary btn-read-more' href='#' style='background-color: rgba(0, 0, 0, 0.7);' data-bs-toggle='modal' data-bs-target='#readMoreModal' data-movie-id='$movieId'>
                           Read more 
                         <i class='fas fa-chevron-right'></i>
                      </a>
                    </div>
                  </div>
              </div>";
      }
      ?>
    </div>
    <!-- Add carousel controls if needed -->
    <button class='carousel-control-prev' type='button' data-bs-target='#userReviewsCarousel' data-bs-slide='prev'>
      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
      <span class='visually-hidden'>Previous</span>
    </button>
    <button class='carousel-control-next' type='button' data-bs-target='#userReviewsCarousel' data-bs-slide='next'>
      <span class='carousel-control-next-icon' aria-hidden='true'></span>
      <span class='visually-hidden'>Next</span>
    </button>
  </div>


  <!-- Feature  -->
  <div id="feature-section">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
          <a href="userReview.php" style="text-decoration: none;">
            <div class="card card-block p-3 text-center">
              <h4 class="card-title text-right"></h4>
              <img src="image/review.png" alt="Review Image">
              <h5 class="card-title mt-3 mb-3 fw-bold">Drop a Review</h5>
              <p class="card-text">Share your experience.</p>
            </div>
          </a>
        </div>

        <div class="col-md-4 mb-3">
          <a href="ticket.php" style="text-decoration: none;">
            <div class="card card-block p-3 text-center">
              <h4 class="card-title text-right"></h4>
              <img src="image/tickets.jpg" alt="Tickets Image">
              <h5 class="card-title mt-3 mb-3 fw-bold">Buy Tickets</h5>
              <p class="card-text">Book your seat now</p>
            </div>
          </a>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card card-block p-3 text-center">
            <h4 class="card-title text-right"></h4>
            <img src="image/feature3.jpg" alt="Feature 3 Image">
            <h5 class="card-title mt-3 mb-3">Feature 3</h5>
            <p class="card-text">............</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Model Pop Up window -->
  <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="readMoreModalLabel">Movie Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- <h1 id="movieTitle"></h1>
          <h2 id="reviewTitle"></h2>
          <p id="directorName"></p> -->
        </div>
      </div>
    </div>
  </div>



  <footer class="bg-dark text-white text-center p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Contact Us</h4>
          <p>Email: detawebsite@gamil.com</p>
          <p>Phone: +88 01345678910</p>
        </div>
        <div class="col-md-6">
          <h4>Follow Us</h4>
          <a href="#" class="text-white text-decoration-none me-3">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-white text-decoration-none me-3">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-white text-decoration-none me-3">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>
    <div>
      <p>&copy; 2024 DeTa Website. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- When user clicked Read more button this JS code show a pop up window and display that movie all data -->
  <script>
    $(document).ready(function() {
      $('.btn-read-more').click(function() {
        var movieId = $(this).data('movie-id');

        $.ajax({
          url: 'get_movie_details.php',
          method: 'GET',
          data: {
            movie_id: movieId
          },
          dataType: 'json',
          success: function(response) {
            if (!response.error) {
              $('#readMoreModalLabel').text(response['Movie Title']);
              $('.modal-body').html(
                '<div class="container animate__animated animate__fadeIn">' +
                '<div class="row">' +
                '<div class="col-md-12 text-center mb-4">' +
                '<img src="' + response['Thumbnail'] + '" alt="Thumbnail" class="img-fluid rounded">' +
                '</div>' +
                '<div class="col-md-8 text-left">' + 

                '<p><strong style="color: #3498db;">Review Title:</strong> ' + response['Review Title'] + '</strong></p>' +
                '<hr>' +
                '<p><strong style="color: #3498db;">Genres:</strong> ' + response['Genres'] + '</p>' +
                '<hr>' +
                '<p><strong style="color: #3498db;">Description:</strong>' + response['Description'] + '</p>' +

                '<hr>' +
                '<p><strong style="color: #3498db;">Director:</strong> ' + response['Director Name'] + '</p>' +
                '<hr>' +
                '<p><strong style="color: #3498db;">Language:</strong> ' + response['Language'] + '</p>' +
                '<hr>' +
                '<p><strong style="color: #3498db;">Audiences:</strong> ' + response['Audiences'] + '</p>' +
                '<hr>' +
                '<p><strong style="color: #3498db;">Rating:</strong> ' + response['Rating'] + '</p>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-12 text-center mt-4">' +
                '<button class="btn btn-outline-info btn-book-now" style="background-color: #3498db; color: #fff;" onclick="bookNow(\'' + response['Movie Title'] + '\')">Book Now</button>' +
                '</div>' +
                '</div>' +
                '</div>'
              );
            } else {
              alert('Error fetching movie details: ' + response.error);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX Error:', textStatus, errorThrown);
            alert('AJAX Error: Please check the console for details.');
          }
        });
      });
    });

    function bookNow(movieTitle) {
      window.location.href = 'buyticket.php?movie=' + encodeURIComponent(movieTitle);
    }
  </script>


</body>

</html>