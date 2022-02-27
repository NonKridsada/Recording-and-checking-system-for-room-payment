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
<?php
session_start();
include('connect.php');

$sql = "SELECT num_room.room_id, user.name, user.last_name,user.phone
            from num_room LEFT JOIN user ON
            num_room.room_id=user.room_id";
//$sql2 = "SELECT * FROM room_status";
$result = $conn->query($sql);



?>

<!-- <link rel="stylesheet" href="header.css"> -->
<link rel="stylesheet" href="table.css">
<!-- <link rel="stylesheet" href="main.css"> -->
<!-- style="background-image: url('https://www.summitroofing.com/images/bg/bg-12.jpg');
            height: 100vh" -->

<body style="background-image: url('img/b1.png');
            height: 100% ">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                จัดการข้อมูลผู้เช่า
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="user_add.php">เพิ่มข้อมูลผู้เช่า</a></li>
                                <li><a class="dropdown-item" href="user.php">ข้อมูลผู้เช่า</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                จัดการค่าเช่า
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="receipt.php">ค่าเช่าห้อง</a></li>
                                <li><a class="dropdown-item" href="payment.php">สถานะการจ่ายค่าเช่า</a></li>
                                <li><a class="dropdown-item" href="total.php">สรุปค่าใช้จ่าย</a></li>

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
        <!-- <div style="background-image: url('https://www.summitroofing.com/images/bg/bg-12.jpg');
            height: 100% "> -->

        <div class="card text-center">
            <div class="card-header">
                <h2>ชื่อผู้เช่า</h2>
                <div class="from-group row">
                    <label for="search" class="col-sm-2 col-form-lable" style="text-align: right;">Search: </label>
                    <div class="col-sm-6">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control mr-sm-2" placeholder="Search">
                    </div>
                    <div class="col">
                        <a href="user_add.php" class="btn btn-success btn-xs pull-right"><b>+</b> เพิ่มผู้เช่า </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped custab" id="myTable" style="margin-top: 5px; margin-bottom: 5px;">
                    <thead>
                        <tr>
                            <!-- <td width="5%">#</td> -->
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
                                <!-- <td><?php echo $number_id; ?></td> -->
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
        </div>

        <script>
            function myFunction() {
                // Declare variables 
                var input, filter, table, tr, td, i, occurrence;

                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    occurrence = false; // Only reset to false once per row.
                    td = tr[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                        currentTd = td[j];
                        if (currentTd) {
                            if (currentTd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                                occurrence = true;
                            }
                        }
                    }
                    if (!occurrence) {
                        tr[i].style.display = "none";
                    }
                }
            }
        </script>
        <!-- </div> -->
    </div>
</body>

</html>