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
    $sql = "SELECT * FROM receipt_room where id='" . $id . "'";
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
                <h2>แก้ไขค่าเช่าห้อง</h2>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <section class="header-info">
                        <div class="header-title"><br>

                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $id = $row['id'];
                        }
                        ?>
                        <form action="action_edit_receipt.php" method="post">

                            <label>เดือน</label>&nbsp;&nbsp;


                            <input type="text" size="3" name="month" value="<?php echo $row['month']; ?>">


                            <label>ปี</label>&nbsp;&nbsp;


                            <input type="text" size="5" name="year" value="<?php echo $row['year']; ?>">

                            <br><br>

                            <label>เลขห้อง</label>&nbsp;&nbsp;

                            <input type="text" name="room_id" value="<?php echo $row['room_id']; ?>"><br><br>

                            <label>เลขห้อง</label>&nbsp;&nbsp;

                            <input type="text" name="elect" value="<?php echo $row['elect']; ?>"><br><br>

                            <label>ค่าน้ำ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <input type="text" name="water" value="<?php echo $row['water']; ?>"><br><br>


                            <label>ค่าห้อง</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <input type="text" name="room_rate" value="<?php echo $row['room_rate']; ?>"><br><br>

                            <label>จ่ายมาแล้ว</label>&nbsp;&nbsp;

                            <input type="text" name="received_payment" value="<?php echo $row['received_payment']; ?>"><br><br>

                            <input type="radio" name="status_payment" <?php if (isset($status_payment) && $status_payment == "nopay") echo "checked"; ?> value="ค้างชำระเงิน">ค้างชำระ<br>

                            <input type="radio" name="status_payment" <?php if (isset($status_payment) && $status_payment == "pay") echo "checked"; ?> value="ชำระเงินแล้ว">ชำระเงินแล้ว

                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br><br>

                            <button class="btn btn-warning" type="submit" name="Submit" value="บันทึกการแก้ไข">บันทึกการแก้ไข</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary" onclick="location.href='receipt.php'">ย้อนกลับ</button>

                        </form>

                    </section>
                </div>

            </div>
            
        </div>

        <!-- <section class="header-info">
            <div class="header-title"><br>
                <h2>แก้ไขค่าเช่าห้อง</h2><br>
            </div>
            
            <form action="action_edit_receipt.php" method="post">
                <div class="row">
                    <div class="col-sm-1">
                        <label>เดือน</label>
                    </div>
                    <div class="col-sm-1">
                        <input type="text" size="3" name="month" value="">
                    </div>
                    <div class="col-sm-1">
                        <label>ปี</label>
                    </div>
                    <div class="col-sm-1">
                        <input type="text" size="5" name="year" value="">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-1">
                        <label>เลขห้อง</label>
                    </div>
                    <div class="col">
                        <input type="text" name="room_id" value=""><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>เลขห้อง</label>
                    </div>
                    <div class="col">
                        <input type="text" name="elect" value=""><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>ค่าน้ำ</label>
                    </div>
                    <div class="col">
                        <input type="text" name="water" value=""><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>ค่าห้อง</label>
                    </div>
                    <div class="col">
                        <input type="text" name="room_rate" value=""><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label>จ่ายมาแล้ว</label>
                    </div>
                    <div class="col">
                        <input type="text" name="received_payment" value=""><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <input type="radio" name="status_payment" value="ค้างชำระเงิน">ค้างชำระ<br>
                    </div>
                    <div class="col-2">
                        <input type="radio" name="status_payment" value="ชำระเงินแล้ว">ชำระเงินแล้ว
                    </div>
                </div>
                <input type="hidden" name="id" value=""><br><br>
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-warning" type="submit" name="Submit" value="บันทึกการแก้ไข">บันทึกการแก้ไข</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-secondary" onclick="location.href='receipt.php'">ย้อนกลับ</button>
                    </div>
            </form>

        </section> -->


    </div>

    </header>

</body>

</html>