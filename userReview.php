<?php

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Review</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <!-- Fontawesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Rubik+Scribble&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <style>
    .navbar-brand {
      display: block;
      width: 100%;
      font-size: 2.5rem;
      font-family: 'Roboto', cursive;
      text-align: center;
    }

    form#reviewForm {
      max-width: 800px;
      /* Set the maximum width as needed */
      margin: 0 auto;

      border: 2px solid rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      animation: inputZoom 0.3s ease-in-out;
    }


    body {
      background-image: url('deta_B.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: auto;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;

    }
    @keyframes inputZoom {
      from {
        transform: scale(0.5);
      }

      to {
        transform: scale(1);
      }
    }

    label {
      font-weight: bold;
      color: #ffffff;
      font-size: 1.2rem;
    }
    .rating {
      display: flex;
      justify-content: left;
      align-items: left;
      grid-gap: 1rem;
      font-size: 2rem;
      color: var(yellow);
      margin-bottom: 2rem;
    }

    .rating .star {
      cursor: pointer;
    }
    .rating .star:hover {
      transform: scale(1.1);
    }

  </style>

</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 50px;">
      <a class="navbar-brand" href="home.php">
        <i class="fa-solid fa-house me-5"></i> User Review
      </a>
    </nav>
  </header>

  <main>

    <form id="reviewForm" class="form-group" method="post" action="reviewAction.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="movietitle" class="text-muted">Movie Title:</label>
        <input type="text" class="form-control" id="movietitle" name="movietitle" required>
      </div>
      <div class="form-group">
        <label for="reviewtitle" class="text-muted">Review Title:</label>
        <input type="text" class="form-control" id="reviewtitle" name="reviewtitle" required>
      </div>
      <div class="form-group">
        <label for="director" class="text-muted">Director Name:</label>
        <input type="text" class="form-control" id="director" name="director" required>
      </div>

      <div class="form-group genres-checkbox">
        <label class="text-muted">Select Genres:</label>
        <div class="row">
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="drama" value="Drama">
              <label class="form-check-label" for="starCineplex">Drama</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="action" value="Action">
              <label class="form-check-label" for="action">Action</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="romance" value="Romance">
              <label class="form-check-label" for="romance">Romance</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="comedy" value="Comedy">
              <label class="form-check-label" for="comedy">Comedy</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="horror" value="Horror">
              <label class="form-check-label" for="horror">Horror</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="thriller" value="Thriller">
              <label class="form-check-label" for="thriller">Thriller</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="sciencefiction" value="Science Fiction">
              <label class="form-check-label" for="sciencefiction">Science fiction</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="mystery" value="Mystery">
              <label class="form-check-label" for="mystery">Mystery</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="genreSelect[]" id="fantasy" value="Fantasy">
              <label class="form-check-label" for="fantasy">Fantasy</label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="language" class="text-muted">Language:</label>
        <select class="form-control" name="language" id="language">
          <option value="#">Select language...</option>
          <option value="English">English</option>
          <option value="Bangla">Bangla</option>
          <option value="Spanish">Spanish</option>
          <option value="Hindi">Hindi</option>
        </select>
      </div>


      <div class="form-group">
        <label for="age" class="text-muted">Recommended Audiences:</label>
        <select class="form-control" name="age" id="age">
          <option value="#">Select audiences...</option>
          <option value="General audiences">General audiences</option>
          <option value="Parental guidance suggested">Parental guidance suggested</option>
          <option value="Parents strongly cautioned">Parents strongly cautioned</option>
          <option value="Restricted">Restricted</option>
        </select>
      </div>
      <div class="form-group">
        <label for="description" class="text-muted">Description:</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
      </div>

      <div class="form-group rating">
        <label for="rating" class="text-muted">Your Rating:</label>
        <input type="number" name="rating" hidden>
        <i class='bx bx-star star' style="--i: 0;"></i>
        <i class='bx bx-star star' style="--i: 1;"></i>
        <i class='bx bx-star star' style="--i: 2;"></i>
        <i class='bx bx-star star' style="--i: 3;"></i>
        <i class='bx bx-star star' style="--i: 4;"></i>
      </div>
      <div class="form-group">
        <label for="picture" class="text-muted">Upload Thumbnail:</label>
        <input type="file" class="form-control-file" id="picture" name="picture" required>
      </div>
      <div class="form-group" style="text-align:center;">
        <button type="submit" class="btn btn-primary" name="reviewSubmit">Submit</button>
      </div>
    </form>


    </section>
  </main>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
  <script>
    const allStar = document.querySelectorAll('.rating .star')
    const ratingValue = document.querySelector('.rating input')

    allStar.forEach((item, idx) => {
      item.addEventListener('click', function() {
        let click = 0
        ratingValue.value = idx + 1

        allStar.forEach(i => {
          i.classList.replace('bxs-star', 'bx-star')
          i.classList.remove('active')
        })
        for (let i = 0; i < allStar.length; i++) {
          if (i <= idx) {
            allStar[i].classList.replace('bx-star', 'bxs-star')
            allStar[i].classList.add('active')
          } else {
            allStar[i].style.setProperty('--i', click)
            click++
          }
        }
      })
    })
  </script>

</body>

</html>