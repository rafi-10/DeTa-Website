<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeTa Website</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    .welcome-container {
      border: 10px solid #f78e06;
      border-radius: 30px;
      padding: 20px;
      max-width: 600px;
 
    }
  </style>
</head>

<body>

<div class="container-fluid">

<div style="background-color: #000000;">
    <header class="p-4 d-flex justify-content-between align-items-center">
      <a href="homepage.php" class="d-flex align-items-center text-white text-decoration-none">
        <img src="logo.jpg" alt="logo" style="width: 210px;">
      </a>

      <ul class="nav col-lg-auto ms-auto mb-2 mb-md-0">
        <li><a href="homepage.php" class="nav-link text-white">H O M E</a></li>
        <li><a href="#" class="nav-link text-white">D A S H B O A R D</a></li>
        <li><a href="#" class="nav-link text-white">C O N T A C T</a></li>
        <li><a href="register.php" class="nav-link text-white">R E G I S T E R</a></li>
        <li><a href="login.php" class="nav-link text-white">L O G I N</a></li>
      </ul>
    </header>
  </div>




  <div class="bg-image" style="background-image: url('deta_B.jpg');background-size: cover;height: 100vh;">
    <div class="text-center d-flex align-items-center justify-content-center" style="height: 100vh;">
      <div class="welcome-container">
        <h1 class="display-1 fw-bold text-body-emphasis" name="font"
          style="color: #ffffff;font-family: 'Roboto Mono', monospace;">Welcome</h1>
        <div class="col-lg-6 mx-auto" style="color: #ffffff;">
          <p class="lead welcome-text" name="font" style="font-family: 'Amatic SC', cursive; font-size: 30px;">Welcome
            visitors to our site with a
            short, engaging introduction. Join with us asap...!!</p>

          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="register.php">
              <button type="button" class="btn btn-secondary outline-secondary btn-lg px-4">Register</button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-dark text-white text-center p-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4>Contact Us</h4>
            <p>Email: detawebsite@gmail.com</p>
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
        <div >
          <p>&copy; 2023 DeTa Website. All rights reserved.</p>
        </div>
      </div>
    </footer>



</div>
  
</body>

</html>