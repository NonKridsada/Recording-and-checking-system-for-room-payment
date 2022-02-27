<?php 

    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
            $passwordenc = md5($password);
            $query = "SELECT * FROM login WHERE username = '$username' AND password = '$passwordenc'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result);

                $_SESSION['userid'] = $row['id'];
                $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
                $_SESSION['userlevel'] = $row['userlevel'];

                if ($_SESSION['userlevel'] == 'a') {
                    header("Location: index.php");
                }

                if ($_SESSION['userlevel'] == 'm') {
                    header("Location: user_page.php");
                }
            } else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: login.php");
            }

        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: login.php");
    }
}


?>