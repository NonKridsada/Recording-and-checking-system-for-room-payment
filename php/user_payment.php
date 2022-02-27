<?php

session_start();
$sql = "SELECT * FROM num_room";

if (!$_SESSION['userid']) {
    header("Location: login.php");
} else {

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
        <div class="container">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar navbar navbar navbar-light fixed-top" style="background-color: #e3f2fd;">
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

                <div class="card text-center">
                    <!-- <div class="card-header">
                        Featured
                    </div> -->
                    <div class="card-body">
                        <div class="header-title">
                            <h2>เลือกชำระค่าเช่าห้อง</h2><br>
                        </div>

                        <form action="user_payment.php" method="post">
                            <label>เลขห้อง</label>&nbsp;&nbsp;
                            <select type="text" name="room_id" class="btn btn-secondary dropdown-toggle">
                                <option value="">-- เลือกห้องที่ต้องการชำระ --</option>
                                <?php
                                include "connect.php";
                                $records = mysqli_query($conn, "SELECT * FROM user");
                                while ($data = mysqli_fetch_array($records)) {
                                    echo "<option value='" . $data['room_id'] . "'>" . $data['room_id'] . "</option>";  // displaying data in option menu
                                }
                                ?>


                            </select><br><br>
                            <label>เดือน</label>
                            <select type="text" name="month" class="btn btn-secondary dropdown-toggle">
                                <option value=""> </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>&nbsp;&nbsp;
                            <label>ปี</label>
                            <input type="text" size="5" name="year"> เช่น ค.ศ. 2021&nbsp;&nbsp;<br><br>
                            <input class="btn btn-success" type="submit" value="ยืนยัน"><br><br>
                        </form>
                    </div>
                    <!-- <div class="card-footer text-muted">
                        2 days ago
                    </div> -->
                </div>
                <br><br>
                <div class="card text-center">
                    <div class="card-header">
                        <h2>รายการค่าเช่า</h2>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_POST['room_id']) && isset($_POST['month']) && isset($_POST['year'])) {
                            $room_id = $_POST['room_id'];
                            $month = $_POST['month'];
                            $year = $_POST['year'];
                            $sql = "SELECT * FROM receipt_room WHERE room_id='$room_id' AND month='$month' AND year='$year'  ";
                            $result = $conn->query($sql);

                        ?>
                            <table class="table table-striped custab" style="background-color: #FFFFFF; margin-top: 5px;">
                                <thead>
                                    <tr>

                                        <td width="5%">เลขห้อง</td>
                                        <td width="16%">เดือน/ปี</td>
                                        <td width="15%">ค่าไฟ</td>
                                        <td width="15%">ค่าน้ำ</td>
                                        <td width="15%">ค่าห้อง</td>
                                        <td width="14%">รวมทั้งหมด</td>
                                        <td width="12%">สถานะ</td>
                                        <td width="12%">ชำระเงิน</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="user_payment_sent.php" method="post">

                                        <?php
                                        $number_id = 1;
                                        while ($row = $result->fetch_assoc()) : ?>

                                            <tr>

                                                <td class="name">
                                                    <?php echo $row['room_id']; ?></td>

                                                <td class="name">

                                                    <?php echo $row['month']; ?>/
                                                    <?php echo $row['year']; ?>
                                                </td>

                                                <td class="name">
                                                    <?php echo $row['elect']; ?></td>

                                                <td class="name">
                                                    <?php echo $row['water']; ?></td>

                                                <td class="name">
                                                    <?php echo $row['room_rate']; ?></td>


                                                <td class="name">
                                                    <?php echo $row['elect'] + $row['water'] + $row['room_rate']; ?></td>

                                                <td class="name">
                                                    <?php echo $row['status_payment']; ?></td>

                                                <td class="name">

                                                    <input class="btn btn-success" type="submit" value="ชำระเงิน">

                                                </td>
                                            </tr>

                                        <?php
                                            $number_id++;
                                        endwhile
                                        ?>

                                    <?php

                                }


                                    ?>

                                    <?php mysqli_close($conn); ?>

                                    </form>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <section class="header-info">

            </section>

            </header>
            <br><br><br><br><br><br><br>

    </body>

    </html>
<?php } ?>