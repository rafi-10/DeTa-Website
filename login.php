<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Add any additional styles or fonts here -->
    <style>
        .cascading-left {
            margin-left: -50px;
        }

        body {
            font-family: 'Signika', sans-serif;
            background-color: #2c3e50;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 8px 20px;
        }

    </style>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <div class="container py-2"> 
            <div class="row g-0 align-items-center">
            <section class="text-end">
                    <a href="homepage.php"><img src="logo2.jpg" alt="logo" style="width: 250px;"></a>
                </section>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <!-- Place your image here -->
                    <img src="deta_B5.jpg" class="w-100 h-auto rounded-2 shadow-4" style="max-height: 570px;" />

                </div>
                <div class="col-lg-6">
                    <div class="card cascading-left"
                        style="background: rgba(255, 255, 255, 0.55);backdrop-filter: blur(30px);">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5">Sign In</h2>
                            <form action="loginAction.php" method="POST">
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" placeholder="Email" name="l_email"
                                        required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" placeholder="Password" name="l_pass"
                                        required />
                                </div>

                                <button type="submit" class="w-100 btn btn-outline-dark" name="signin">Sign In</button>

                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                                        class="link-danger">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>