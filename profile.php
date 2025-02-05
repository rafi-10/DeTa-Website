<?php
session_start();
include "config.php";
$loggedInUser = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '{$_SESSION['username']}'");
$row = mysqli_fetch_assoc($loggedInUser);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>

<body class="bg-light">
    <section style="background-color: #eee;" >
        <div class="container py-5">
            <div>
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div>
                <div class="col-lg-4 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="image/user.png" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <h5 class="my-3">
                                <?php echo $row['username'] ?>
                            </h5>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-primary ms-1 disabled">Upload
                                    Profile</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['firstname'] . ' ' . $row['lastname'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['email'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['mobile'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['dob'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['address'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">City</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['city'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $row['gender'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h2>
                            <p><?php echo $row['username'] ?></p>
                            <i class="far fa-edit fa-2x mb-4"></i>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">User Information</h3>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="font-weight-bold">Email:</h6>
                                <p><?php echo $row['email'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <h6 class="font-weight-bold">Phone:</h6>
                                <p class="text-muted"><?php echo $row['mobile'] ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="font-weight-bold">Address:</h6>
                                <p><?php echo $row['address'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <h6 class="font-weight-bold">City:</h6>
                                <p class="text-muted"><?php echo $row['city'] ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="font-weight-bold">Date of Birth:</h6>
                                <p><?php echo $row['dob'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <h6 class="font-weight-bold">Gender:</h6>
                                <p class="text-muted"><?php echo $row['gender'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>