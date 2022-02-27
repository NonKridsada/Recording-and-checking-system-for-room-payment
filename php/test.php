<?php
session_start();
include('connect.php');


$sql = "SELECT * FROM user";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูล</title>

    

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<?php
session_start();
include('connect.php');

$sql = "SELECT num_room.room_id, user.name, user.last_name,user.phone
            from num_room LEFT JOIN user ON
            num_room.room_id=user.room_id";
//$sql2 = "SELECT * FROM room_status";
$result = $conn->query($sql);



?>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="main.css">

<body>

    <div class="logo">
        <h1>Admin</h1><br>
        <h2>Welcome <strong><?php echo $_SESSION['user']; ?></strong></h2>
    </div><br><br><br><br><br><br>
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
        </section><br><br>

        <table class="table table-striped custab">
            <thead>
                <a href="user.php" class="btn btn-primary btn-xs pull-right"><b>+</b> เพิ่มผู้เช่า </a>
                <tr>
                    <td width="5%">#</td>
                    <td width="5%">ห้อง</td>
                    <td width="12%">ชื่อ</td>
                    <td width="12%">นามสกุล</td>
                    <td width="12%">เบอร์โทร</td>
                    <!-- <th class="text-center">Action</th> -->
                </tr>
            </thead>
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



</body>

</html>