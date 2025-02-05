<?php
include 'config.php';

if (isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];

    $select_query = "SELECT * FROM `user_reviews` WHERE `id` = $movie_id";
    $result = mysqli_query($conn, $select_query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Return JSON-encoded movie details
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Movie details not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
