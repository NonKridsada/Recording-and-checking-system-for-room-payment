<?php
session_start();
require_once('connection.php');
if (isset($_REQUEST['btn_insert'])) {
    try {
        $room_id = $_REQUEST['room_id'];
        $name = $_REQUEST['name'];
        $last_name = $_REQUEST['last_name'];
        $payment = $_REQUEST['payment'];

        $image_file = $_FILES['txt_file']['name'];

        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "upload/" . $image_file;

        if (empty($name)) {
            $errorMsg = "Please Enter name";
        } else if (empty($image_file)) {
            $errorMsg = "please Select Image";
        } else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
            if (!file_exists($path)) { // check file not exist in your upload folder path
                if ($size < 5000000) { // check file size 5MB
                    move_uploaded_file($temp, 'upload/' . $image_file); // move upload file temperory directory to your upload folder
                } else {
                    $errorMsg = "Your file too large please upload 5MB size"; // error message file size larger than 5mb
                }
            } else {
                $errorMsg = "File already exists... Check upload filder"; // error message file not exists your upload folder path
            }
        } else {
            $errorMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
        }

        if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare('INSERT INTO tbl_file(room_id,name,last_name,payment, image) VALUES ( :froom_id, :fname, :flast_name, :fpayment, :fimage)');
            $insert_stmt->bindParam(':froom_id', $room_id);
            $insert_stmt->bindParam(':fname', $name);
            $insert_stmt->bindParam(':flast_name', $last_name);
            $insert_stmt->bindParam(':fpayment', $payment);
            $insert_stmt->bindParam(':fimage', $image_file);

            if ($insert_stmt->execute()) {
                $insertMsg = "File Uploaded successfully...";
                header('refresh:2;user_payment.php');
            }
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูล</title>



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
    <link rel="stylesheet" href="table.css">
    <div class="logo">
        <br>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="user_page.php">หน้าหลัก</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ชำระค่าเช่า
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="user_page.php">ตามเลขห้อง</a></li>

                                <li><a class="dropdown-item" href="user_payment.php">ตามเดือน</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['user']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" style="color: red;" href="login.php?logout='1'">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br><br><br><br>

        <div class="card ">
            <div class="card-header text-center">
                <h3>ส่งรูปการชำระเงิน</h3>
            </div>
            <div class="card-body" style="margin-left: 100px; ">
                <section class="header-info" style="margin-top: 20px; margin-bottom: 20px;">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">เลขห้อง</label>
                            <div class="col-sm-9">
                                <input type="text" name="room_id" class="form-control" placeholder="เลขห้องที่ต้องการชำระเงิน">
                            </div>
                        </div><br>

                        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">ชื่อ</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="กรุณากรอกชื่อ">
                                </div>
                            </div><br>

                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">นามสกุล</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="last_name" class="form-control" placeholder="กรุณากรอกนามสกุล">
                                    </div>
                                </div><br>

                                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">จำนวนเงินที่โอน</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="payment" class="form-control" placeholder="จำนวนเงินที่โอน">
                                        </div>
                                    </div><br>

                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">หลักฐานการโอน</label>
                                            <div class="col-sm-9"><br>
                                                <input type="file" name="txt_file" class="form-control">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="submit" name="btn_insert" class="btn btn-success" value="ยืนยัน">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="user_payment.php" class="btn btn-danger">ยกเลิก</a>
                                            </div>
                                        </div>


                                    </form>

                                </form>
                            </form>
                        </form>
                    </form>
                </section>
            </div>
        </div>
    </div>

</body>

</html>