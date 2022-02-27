<?php

session_start();

require_once "connect.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $user_check = "SELECT * FROM login WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $passwordenc = md5($password);

        $query = "INSERT INTO login (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Insert user successfully";
            header("Location: login.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: login.php");
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="login.css">

</head>

<body>

    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->


    <!-- <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Register</h2>
            <p>Register from here to access.</p>
        </div>
        <div class="sidenav">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/p11.jpg" class="d-block w-100" alt="..." style="height: 100% ">
                    </div>
                    <div class="carousel-item">
                        <img src="img/p22.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/p33.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="col-md-3 col-sm-12">

            <div class="login-form">
                <h2>Application<br> Login</h2>
                <p>Register from here to access.</p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <?php include('errors.php'); ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="text-info">
                            <h3>
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="username" class="form-control" placeholder="Enter your username" required><br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <labe lfor="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <labe lfor="firstname">Firstname</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="firstname" class="form-control" placeholder="Enter your firstname" required><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <labe lfor="lastname">Lastname</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="lastname" class="form-control" placeholder="Enter your lastname" required><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="login.php">Go login</a>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-3">
                                        <button type="submit" name="submit" value="Submit" class="btn btn-success">Confirm</button>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->


    <section class="vh-100" style="background-image: url('img/b1.png');
            height: 100% ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/p1.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />

                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                        <!-- <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Register</span>
                                        </div> -->
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h5>


                                        <!-- <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h5> -->

                                        <?php include('errors.php'); ?>
                                        <?php if (isset($_SESSION['error'])) : ?>
                                            <div class="text-info">
                                                <h3>
                                                    <?php
                                                    echo $_SESSION['error'];
                                                    unset($_SESSION['error']);
                                                    ?>
                                                </h3>
                                            </div>
                                        <?php endif ?>
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example17">Username</label>
                                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter your username" required />
                                            <!-- <input type="text" name="username" class="form-control" placeholder="Enter your username" required><br> -->

                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Enter your password" name="password" required />
                                            <!-- <input type="password" name="password" class="form-control" placeholder="Enter your password" required><br> -->

                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Firstname</label>
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" placeholder="Enter your firstname" name="firstname" required />
                                            <!-- <input type="text" name="firstname" class="form-control" placeholder="Enter your firstname" required><br> -->

                                        </div>
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Lastname</label>
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" placeholder="Enter your lastname" name="lastname" required />
                                            <!-- <input type="text" name="lastname" class="form-control" placeholder="Enter your lastname" required><br> -->

                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit" value="Submit">Confirm</button>
                                            <!-- <button type="submit" name="submit" value="Submit" class="btn btn-success">Confirm</button> -->

                                        </div>

                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">have an account already? login <a href="login.php" style="color: #393f81;">Login here</a></p>
                                        <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a> -->
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>