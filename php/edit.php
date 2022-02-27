<?php
session_start();
include('connect.php');

?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "house_sql";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
    $sql = "SELECT * FROM user where id='" . $id . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูล</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body style="background-image: url('img/b1.png');
            height: 100% ">
    <br><br><br><br><br>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h2>แก้ไขข้อมูล</h2>
            </div>
            <div class="card-body">
                <div class="container ">

                    <section class="header-info "><br>

                        <?php
                        if (isset($_POST['submit'])) {
                            $id = $row['id'];
                        }
                        ?>
                        <form action="action_edit.php" method="post">

                            <label>เลขห้อง</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="room_id" value="<?php echo $row['room_id']; ?>"><br><br>

                            <label>ชื่อ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>


                            <label>นามสกุล</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br><br>

                            <label>เบอร์โทร </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

                            <label>รหัสบัตรประชาชน</label>&nbsp;
                            <input type="text" name="national_id" value="<?php echo $row['national_id']; ?>"><br><br>

                            <input class="btn btn-warning" type="submit" name="Submit" value="บันทึกการแก้ไข">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <button type="button" class="btn btn-secondary" onclick="location.href='user.php'">ย้อนกลับ</button>

                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
                        </form>
                    </section>




                </div>
            </div>

        </div>
    </div>


    <!-- <div class="container">
        <section class="header-info"><br>
            <div class="header-title">
                <h2>แก้ไขข้อมูล</h2><br>
            </div>
           
            <form action="action_edit.php" method="post">
                <div class="row">
                    <div class="col-1">
                        <label>เลขห้อง</label>
                    </div>
                    <div class="col">
                        <input type="text" name="room_id" value="<?php echo $row['room_id']; ?>"><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>ชื่อ</label>
                    </div>
                    <div class="col">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>นามสกุล</label>
                    </div>
                    <div class="col">
                        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>เบอร์โทร </label>
                    </div>
                    <div class="col">
                        <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>รหัสบัตรประชาชน</label>
                    </div>
                    <div class="col">
                        <input type="text" name="national_id" value="<?php echo $row['national_id']; ?>"><br><br>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-2">
                        <input class="btn btn-warning" type="submit" name="Submit" value="บันทึกการแก้ไข">
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-secondary" onclick="location.href='user.php'">ย้อนกลับ</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
            </form>

        </section>


    </div> -->

    </header>

</body>

</html>