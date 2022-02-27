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