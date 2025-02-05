<?php

if (isset($_POST['reviewSubmit'])) {
    include 'config.php';

    $movie_title = $_POST['movietitle'];
    $review_title = $_POST['reviewtitle'];
    $director_name = $_POST['director'];
    $genres = implode(",", $_POST['genreSelect']);
    $language = $_POST['language'];
    $audiences = $_POST['age'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $thumbnial = $_FILES['picture'];

    $imageLoc = $_FILES['picture']['tmp_name'];
    $imageName = $_FILES['picture']['name'];
    $image_dest = "thumbnial/" . $imageName;
    move_uploaded_file($imageLoc, $image_dest);



    $insert_query = "INSERT INTO `user_reviews`(`Movie Title`, `Review Title`, `Director Name`, `Genres`,`Language`,`Audiences`, `Description`, `Rating`, `Thumbnail`) VALUES 
    ('$movie_title','$review_title','$director_name','$genres','$language',' $audiences','$description','$rating','$image_dest')";

    if (!mysqli_query($conn, $insert_query)) {
        die("Not Inserted!!");
    } else {
        echo "<script>alert('Your review submitted Successfully!')</script>";
        echo "<script>location.href='userReview.php'</script>";
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='userReview.php'</script>";
}
