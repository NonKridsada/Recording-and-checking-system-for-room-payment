<?php
session_start();
include('connect.php');

$sql = "SELECT num_room.room_id, receipt_room.status_payment,receipt_room.month,receipt_room.year,
            receipt_room.elect, receipt_room.water, receipt_room.room_rate,receipt_room.received_payment,receipt_room.id
            from num_room LEFT JOIN receipt_room ON
            num_room.room_id=receipt_room.room_id";
$sql2 = "SELECT * FROM receipt_room";
$result = $conn->query($sql2);
$date = date("Y-m-d");
$time = date("H:i:s");

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
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="table.css">
    <div class="container">


        <div class="card text-center">
            <div class="card-header">
                <h2>เพิ่มค่าเช่าห้อง</h2>
            </div>
            <div class="card-body">
                <form action="actionadd_receipt.php" method="post">

                    <label>เลขห้อง</label>&nbsp;&nbsp;&nbsp;&nbsp;

                    <!-- <input type="text" name="room_id"> -->
                    <select type="text" name="room_id">
                        <option value="">-- เลือกห้อง --</option>
                        <?php
                        include "connect.php";
                        $records = mysqli_query($conn, "SELECT * FROM user");
                        while ($data = mysqli_fetch_array($records)) {
                            echo "<option value='" . $data['room_id'] . "'>" . $data['room_id'] . "</option>";  // displaying data in option menu
                        }
                        ?>
                    </select>
                    <br><br>

                    <!-- <input type="text" name="room_id" size="5"><br><br> -->


                    <label>เดือน</label>&nbsp;&nbsp;
                    <select type="text" name="month">
                        <option value=""> </option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <label>ปี</label>

                    <input type="text" size="5" name="year">&nbsp;(เช่น ค.ศ. 2021)&nbsp;&nbsp;<br><br>



                    <label>ค่าไฟ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="elect">&nbsp;&nbsp;บาท<br><br>

                    <label>ค่าน้ำ </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="water">&nbsp;&nbsp;บาท<br><br>

                    <label>ค่าเช่าห้อง</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="room_rate">&nbsp;&nbsp;บาท<br><br><br>

                    <label>สถานะการชำระเงิน</label><br>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>

                    <input type="radio" name="status_payment" <?php if (isset($status_payment) && $status_payment == "nopay") echo "checked"; ?> value="ค้างชำระเงิน">ยังไม่ได้ชำระเงิน
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status_payment" <?php if (isset($status_payment) && $status_payment == "pay") echo "checked"; ?> value="ชำระเงินแล้ว">ชำระเงินแล้ว

            </div>
            <br><br>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-success" type="submit" value="เพิ่มข้อมูล">เพิ่มข้อมูล</button><br>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" onclick="location.href='receipt.php'">ย้อนกลับ</button>
                </div>
            </div><br><br>
            </form>
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

    </div>

    </header>

</body>

</html>