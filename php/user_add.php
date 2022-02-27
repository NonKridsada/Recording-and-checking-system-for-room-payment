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
    <!-- <link rel="stylesheet" href="header.css"> -->
    <link rel="stylesheet" href="table.css">
    <!-- <link rel="stylesheet" href="main.css"> -->

    <br><br><br><br><br>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h2>เพิ่มชื่อผู้เช่าใหม่</h2>
            </div>
            <div class="card-body">
                <div class="container ">

                    <section class="header-info "><br>

                        <form action="actionadd_user.php" method="post">

                            <label>เลขห้อง</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select type="text" name="room_id">
                                <option value="">-- เลือกห้อง --</option>
                                <?php
                                include "connect.php";
                                // $records = mysqli_query($conn, "SELECT * FROM num_room");
                                $records = mysqli_query($conn, "SELECT DISTINCT room_id FROM num_room WHERE room_id NOT IN (SELECT room_id FROM user)");
                                while ($data = mysqli_fetch_array($records)) {
                                    echo "<option value='" . $data['room_id'] . "'>" . $data['room_id'] . "</option>";  // displaying data in option menu
                                }
                                ?>


                            </select><br><br>
                            <!-- <input type="text" name="room_id" size="10"><br> -->

                            <label>ชื่อ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="name"><br><br>

                            <label>นามสกุล</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="last_name"><br><br>

                            <label>เบอร์โทร </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="phone"><br><br>

                            <label>รหัสบัตรประชาชน</label>&nbsp;
                            <input type="text" name="national_id"><br><br>


                            <br>

                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-success" type="submit" value="เพิ่มข้อมูล">เพิ่มข้อมูล</button><br>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">ย้อนกลับ</button>
                                </div>
                            </div>
                        </form>
                    </section>


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

                </div>
            </div>

        </div>
    </div>

</body>

</html>