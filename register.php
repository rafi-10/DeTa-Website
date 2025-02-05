<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
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
        .cascading-right {
            margin-right: -50px;
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

        <div class="container py-4">

            <div class="row g-0 align-items-center">
                <section class="text-start">
                    <a href="homepage.php"><img src="logo2.jpg" alt="logo" style="width: 250px;"></a>
                </section>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right"
                        style="background: rgba(255, 255, 255, 0.55); backdrop-filter: blur(30px);">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5">Create an new account</h2>
                            <form action="registerAction.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Firstname"
                                                name="r_fname" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Lastname"
                                                name="r_lname" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Username"
                                                name="r_username" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="date" class="form-control" placeholder="Date of birth"
                                                name="r_dob" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control" placeholder="Email" name="r_email"
                                        required />
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="r_pass" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                name="r_con_pass" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <input type="text" class="form-control" placeholder="Address" name="r_address"
                                            required />
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <input type="number" class="form-control" placeholder="Phome Number"
                                            name="r_mobile" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <select class="form-select form-outline" name="r_city" required
                                            placeholder="city">
                                            <option value="">City...</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Sylhet">Sylhet</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Chottogram">Chottogram</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Barishal">Barishal</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <select class="form-select" name="gender"placeholder="Gender"  required >
                                            <option value="">Gender...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="w-100 btn btn-outline-dark" name="signup">Sign-Up</button>

                                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php"
                                        class="link-primary">Sign-In</a></p>


                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="deta_B5.jpg" class="w-100 rounded-2 shadow-4" alt="" />
                </div>
            </div>
        </div>
    </section>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>