<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='login.php'</script>";
}
include "config.php";

$moviedata = mysqli_query($conn, "SELECT * FROM `movies`");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Tickets booking</title>

    <style>
        .movies-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .movies-heading h1 {
            font-family: 'Arvo', serif;
            color: #ffcc00;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: flickerAnimation 1.5s infinite;
        }

        @keyframes flickerAnimation {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
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
    </style>
</head>

<body class="bg-image">
    <section class="top-bar">
        <div class="left-content">
            <a href="home.php">
                <h2 class="title">DeTa Website</h2>
            </a>
            <ul class="navigation">
                <li><a href="home.php">Home</a></li>
                <li><a class="active" href="#">Movies</a></li>
                <?php
                if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin@gmail.com') {
                    echo "<li><a href='addmovie.php'>Add Movies</a></li>";
                }
                ?>

            </ul>
        </div>
        <div class="right-content">
            <img src="image/filter.png" alt="" class="filter">
            <img src="image/cart.png" alt="" class="cart">
            <img src="image/help.png" alt="" class="help">
            <div class="profile-img-box">
                <img src="image/user.png" alt="">
            </div>
            <img src="image/menu.png" alt="" class="menu">
        </div>

    </section>

    <section class="main-container">
        <div class="sidebar">
            <form action="#">
                <div class="sidebar-groups">
                    <h3 class="sg-title">Categories</h3>
                    <input type="checkbox" id="adventure" name="adventure" value="adventure">
                    <label for="adventure">Adventure</label><br>
                    <input type="checkbox" id="action" name="action" value="action">
                    <label for="action">Action</label><br>
                    <input type="checkbox" id="animation" name="animation" value="animation">
                    <label for="animation">Animation</label><br>
                    <input type="checkbox" id="comedy" name="comedy" value="comedy">
                    <label for="comedy">Comedy</label><br>
                    <input type="checkbox" id="science" name="science" value="science">
                    <label for="science">Science Fiction</label><br>
                    <input type="checkbox" id="thriller" name="thriller" value="thriller">
                    <label for="thriller">Thriller</label><br>
                    <input type="checkbox" id="history" name="history" value="history">
                    <label for="history">History</label><br>
                    <input type="checkbox" id="documentary" name="documentary" value="documentary">
                    <label for="documentary">Documentary</label><br>
                    <input type="checkbox" id="fantasy" name="fantasy" value="fantasy">
                    <label for="fantasy">Fantasy</label><br>

                </div>
                <div class="sidebar-groups">
                    <h3 class="sg-title">Language</h3>
                    <input type="checkbox" id="english" name="english" value="english">
                    <label for="english">English</label><br>
                    <input type="checkbox" id="spanish" name="spanish" value="spanish">
                    <label for="spanish">Spanish</label><br>
                    <input type="checkbox" id="hindi" name="hindi" value="hindi">
                    <label for="hindi">Hindi</label><br>
                </div>
                <div class="sidebar-groups">
                    <h3 class="sg-title">Time</h3>
                    <input type="radio" id="morning" name="time" value="morning">
                    <label for="morning">Morning</label><br>
                    <input type="radio" id="night" name="time" value="night">
                    <label for="night">Night</label><br>
                </div>
                <div class="sidebar-groups">
                    <a href="#" class="btn-l btn">Apply Filters</a>
                </div>
            </form>
        </div>
        <div class="movies-container">
            <div class="upcoming-img-box">
                <img src="image/upcoming.webp" alt="">
                <p class="upcoming-title">Upcoming Movie</p>
                <div class="buttons">
                    <?php
                    echo "<script>
            function showAlert(event) {
                event.preventDefault();
                alert('This movie not yet come theatre!');
                // You can add additional logic here if needed
            }
          </script>";
                    ?>

                    <a href="buyticket.php" class="btn" onclick="showAlert(event)">Book Now</a>

                    <a href="https://youtu.be/o5F8MOz_IDw?si=YPSrqFyCjNRZoBRH" class="btn-alt btn">Play Trailer</a>
                </div>
            </div>
            <div class="movies-heading">
                <h1>🎬 Now In Theaters.. 🍿</h1>
            </div>

            <?php
            echo "<div class='current-movies'>";
            while ($row = mysqli_fetch_array($moviedata)) {
                echo "<div class='current-movie'>
                        <div class='cm-img-box'>
                            <img src='" . $row['photo'] . "' alt=''>
                        </div>
                        <h3 class='movie-title'>" . $row['name'] . "</h3>
                        <p class='screen-name'>Screen : " . $row['screen'] . "</p>
                        <div class='booking'>
                            <h2 class='price'>৳ " . $row['price'] . "</h2>
                            <a href='buyticket.php?movie=" . urlencode($row['name']) . "&price=" . urlencode($row['price']) . "' class='btn'>Buy Tickets</a>
                        </div>
                    </div>";
            }


            echo "</div>";

            ?>
        </div>

    </section>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>