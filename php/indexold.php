<?php
session_start();
include('connect.php');

$sql = "SELECT num_room.room_id, user.name, user.last_name,user.phone
            from num_room LEFT JOIN user ON
            num_room.room_id=user.room_id";
//$sql2 = "SELECT * FROM room_status";
$result = $conn->query($sql);



?>
<?php
session_start();
include('connect.php');

$sql = "SELECT num_room.room_id, user.name, user.last_name,user.phone
            from num_room LEFT JOIN user ON
            num_room.room_id=user.room_id";
//$sql2 = "SELECT * FROM room_status";
$result = $conn->query($sql);



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

    <link rel="stylesheet" href="tablecss.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <div class="logo">
        <h1>Admin</h1><br>
        <h2>Welcome <strong><?php echo $_SESSION['user']; ?></strong></h2>
    </div>
    <div class="container">
        <nav>
            <ul>

                <li><a href="index.php">หน้าหลัก</a></li>

                <li><a href="user.php">จัดการข้อมูลผู้เช่า</a></li>
                <li><a href="receipt.php">ค่าเช่าห้อง</a></li>
                <li><a href="payment.php">สถานะการจ่ายค่าเช่า</a></li>
                <li><a href="#">สรุปค่าใช้จ่าย</a></li>
                <li><a href="login.php?logout='1'" style="color: red;">Logout</a></li>
            </ul>
        </nav>

        <section class="header-info">
            <div class="header-title">
                <h2>ชื่อผู้เช่า</h2><br>
        </section>

        <table>
            <thead>
                <tr>
                    <td width="5%">#</td>
                    <td width="5%">ห้อง</td>
                    <td width="12%">ชื่อ</td>
                    <td width="12%">นามสกุล</td>
                    <td width="12%">เบอร์โทร</td>




                </tr>
            </thead>
            <tbody>
                <form action="edit.php" method="post">
                    <!-- ข้อมูลที่เราจะทำการ fetch จากฐานข้อมูล -->

                    <?php
                    $number_id = 1;
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <td><?php echo $number_id; ?></td>
                            <td class="name">
                                <?php echo $row['room_id']; ?></td>

                            <td class="name">
                                <?php echo $row['name']; ?></td>

                            <td class="name">
                                <?php echo $row['last_name']; ?></td>

                            <td class="name">
                                <?php echo $row['phone']; ?></td>






                            </td>
                        </tr>
                    <?php
                        $number_id++;
                    endwhile
                    ?>
                </form>
            </tbody>
        </table>


    </div>

    </header>
    <footer>
        <div class="container">
            <div class="footer-top">
                <p>&copy; 2021 Yourcompany</p>
            </div>
            <div class="footer-bottom">
                <ul class="btm-menu">
                    <li><a href="index.php">หน้าหลัก</a></li>
                    <li><a href="user.php">จัดการข้อมูลผู้เช่า</a></li>
                    <li><a href="receipt.php">ค่าเช่าห้อง</a></li>
                    <li><a href="#">สถานะการจ่ายเช่า</a></li>
                    <li><a href="#">สรุปค่าใช้จ่าย</a></li>

                </ul>
                <ul class="social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="login.php?logout='1'" style="color: red;">Logout</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>