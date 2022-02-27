<?php
session_start();
require_once('connection.php');

if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stmt = $db->prepare('SELECT * FROM tbl_file WHERE id = :id');
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("upload/" . $row['image']); // unlin functoin permanently remove your file

    // delete an original record from db
    $delete_stmt = $db->prepare('DELETE FROM tbl_file WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header("Location: intdex.php");
    $date = date("d-m-Y");
    $time = date("H:i:s");
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

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
</head>
<link rel="stylesheet" href="table.css">

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
        <div class="card text-center">
            <div class="card-header">
                <h2>รายการที่ลูกค้าชำระเงิน </h2>
            </div>
            <div class="card-body">
                <table class="table table-striped custab" id="myTable" style="margin-top: 5px; margin-bottom: 5px;">
                    <thead>
                        <div class="from-group row">
                            <label for="search" class="col-sm-2 col-form-lable" style="text-align: right;">Search: </label>
                            <div class="col-sm-6">
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control mr-sm-2" placeholder="Search">
                            </div>
                        </div>
                        <tr>
                            <td width="10%">เลขห้อง</td>
                            <td width="12%">ชื่อ</td>
                            <td width="12%">นามสกุล</td>
                            <td width="12%">จำนวนเงิน</td>
                            <td width="12%">เวลาที่ส่ง</td>
                            <td width="20%">รูป</td>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $select_stmt = $db->prepare('SELECT * FROM tbl_file');
                        $select_stmt->execute();

                        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['room_id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['payment']; ?></td>
                                <td><?php echo $row['time_sent']; ?></td>
                                <td><img id="myImg" src="upload/<?php echo $row['image']; ?>" width="100px" height="130px" alt=""></td>
                                <td><a href="receipt.php" class="btn btn-success">Action</a></td>
                                <!-- <td><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td> -->
                                <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close fixed-bottom">&times;</span>
            <img class="modal-content" id="img01" width="730px" height="800px">
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            // console.log(this.img);
             var modalImg = document.getElementById("img01");
            img.onclick = function() {
                console.log(this.src);
                modal.style.display = "block";
                modalImg.src = this.src;
                
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        </script>

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
</body>

</html>