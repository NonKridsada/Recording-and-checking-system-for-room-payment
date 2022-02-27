<?php
session_start();
require_once('connection.php');

?>
<?php
//header('Coontent-Type: application/json');

require_once 'connect.php';

// $sqlQuery = " SELECT * FROM receipt_room ORDER BY id";
// $result = mysqli_query($conn, $sqlQuery);

$sql = "SELECT SUM(elect)  AS elect_sum1 FROM receipt_room WHERE month = 1; ";
$sql2 = "SELECT SUM(elect)  AS elect_sum2 FROM receipt_room WHERE month = 2; ";
$sql3 = "SELECT SUM(elect)  AS elect_sum3 FROM receipt_room WHERE month = 3; ";
$sql4 = "SELECT SUM(elect)  AS elect_sum4 FROM receipt_room WHERE month = 4; ";
$sql5 = "SELECT SUM(elect)  AS elect_sum5 FROM receipt_room WHERE month = 5; ";
$sql6 = "SELECT SUM(elect)  AS elect_sum6 FROM receipt_room WHERE month = 6; ";
$sql7 = "SELECT SUM(elect)  AS elect_sum7 FROM receipt_room WHERE month = 7; ";
$sql8 = "SELECT SUM(elect)  AS elect_sum8 FROM receipt_room WHERE month = 8; ";
$sql9 = "SELECT SUM(elect)  AS elect_sum9 FROM receipt_room WHERE month = 9; ";
$sql10 = "SELECT SUM(elect)  AS elect_sum10 FROM receipt_room WHERE month = 10; ";
$sql11 = "SELECT SUM(elect)  AS elect_sum11 FROM receipt_room WHERE month = 11; ";
$sql12 = "SELECT SUM(elect)  AS elect_sum12 FROM receipt_room WHERE month = 12; ";

$sqls = "SELECT SUM(water)  AS water_sum1 FROM receipt_room WHERE month = 1; ";
$sqls2 = "SELECT SUM(water)  AS water_sum2 FROM receipt_room WHERE month = 2; ";
$sqls3 = "SELECT SUM(water)  AS water_sum3 FROM receipt_room WHERE month = 3; ";
$sqls4 = "SELECT SUM(water)  AS water_sum4 FROM receipt_room WHERE month = 4; ";
$sqls5 = "SELECT SUM(water) AS water_sum5 FROM receipt_room WHERE month = 5; ";
$sqls6 = "SELECT SUM(water)  AS water_sum6 FROM receipt_room WHERE month = 6; ";
$sqls7 = "SELECT SUM(water) AS water_sum7 FROM receipt_room WHERE month = 7; ";
$sqls8 = "SELECT SUM(water) AS water_sum8 FROM receipt_room WHERE month = 8; ";
$sqls9 = "SELECT SUM(water) AS water_sum9 FROM receipt_room WHERE month = 9; ";
$sqls10 = "SELECT SUM(water) AS water_sum10 FROM receipt_room WHERE month = 10; ";
$sqls11 = "SELECT SUM(water) AS water_sum11 FROM receipt_room WHERE month = 11; ";
$sqls12 = "SELECT SUM(water) AS water_sum12 FROM receipt_room WHERE month = 12; ";

// $sqlelect = "SELECT SUM(CASE WHEN name='month' THEN elect END) as 1,
//                     SUM(CASE WHEN name='month' THEN elect END) as 2 FROM receipt_room";

$resultelect = mysqli_query($conn, $sql);
$resultelect2 = mysqli_query($conn, $sql2);
$resultelect3 = mysqli_query($conn, $sql3);
$resultelect4 = mysqli_query($conn, $sql4);
$resultelect5 = mysqli_query($conn, $sql5);
$resultelect6 = mysqli_query($conn, $sql6);
$resultelect7 = mysqli_query($conn, $sql7);
$resultelect8 = mysqli_query($conn, $sql8);
$resultelect9 = mysqli_query($conn, $sql9);
$resultelect10 = mysqli_query($conn, $sql10);
$resultelect11  = mysqli_query($conn, $sql11);
$resultelect12 = mysqli_query($conn, $sql12);

$resultelects = mysqli_query($conn, $sqls);
$resultelects2 = mysqli_query($conn, $sqls2);
$resultelects3 = mysqli_query($conn, $sqls3);
$resultelects4 = mysqli_query($conn, $sqls4);
$resultelects5 = mysqli_query($conn, $sqls5);
$resultelects6 = mysqli_query($conn, $sqls6);
$resultelects7 = mysqli_query($conn, $sqls7);
$resultelects8 = mysqli_query($conn, $sqls8);
$resultelects9 = mysqli_query($conn, $sqls9);
$resultelects10 = mysqli_query($conn, $sqls10);
$resultelects11 = mysqli_query($conn, $sqls11);
$resultelects12 = mysqli_query($conn, $sqls12);

$rowe1 = mysqli_fetch_assoc($resultelect);
$rowe2 = mysqli_fetch_assoc($resultelect2);
$rowe3 = mysqli_fetch_assoc($resultelect3);
$rowe4 = mysqli_fetch_assoc($resultelect4);
$rowe5 = mysqli_fetch_assoc($resultelect5);
$rowe6 = mysqli_fetch_assoc($resultelect6);
$rowe7 = mysqli_fetch_assoc($resultelect7);
$rowe8 = mysqli_fetch_assoc($resultelect8);
$rowe9 = mysqli_fetch_assoc($resultelect9);
$rowe10 = mysqli_fetch_assoc($resultelect10);
$rowe11 = mysqli_fetch_assoc($resultelect11);
$rowe12 = mysqli_fetch_assoc($resultelect12);

$roww1 = mysqli_fetch_assoc($resultelects);
$roww2 = mysqli_fetch_assoc($resultelects2);
$roww3 = mysqli_fetch_assoc($resultelects3);
$roww4 = mysqli_fetch_assoc($resultelects4);
$roww5 = mysqli_fetch_assoc($resultelects5);
$roww6 = mysqli_fetch_assoc($resultelects6);
$roww7 = mysqli_fetch_assoc($resultelects7);
$roww8 = mysqli_fetch_assoc($resultelects8);
$roww9 = mysqli_fetch_assoc($resultelects9);
$roww10 = mysqli_fetch_assoc($resultelects10);
$roww11 = mysqli_fetch_assoc($resultelects11);
$roww12 = mysqli_fetch_assoc($resultelects12);


$elect1 = $rowe1['elect_sum1'];
$elect2 = $rowe2['elect_sum2'];
$elect3 = $rowe3['elect_sum3'];
$elect4 = $rowe4['elect_sum4'];
$elect5 = $rowe5['elect_sum5'];
$elect6 = $rowe6['elect_sum6'];
$elect7 = $rowe7['elect_sum7'];
$elect8 = $rowe8['elect_sum8'];
$elect9 = $rowe9['elect_sum9'];
$elect10 = $rowe10['elect_sum10'];
$elect11 = $rowe11['elect_sum11'];
$elect12 = $rowe12['elect_sum12'];

$water1 = $roww1['water_sum1'];
$water2 = $roww2['water_sum2'];
$water3 = $roww3['water_sum3'];
$water4 = $roww4['water_sum4'];
$water5 = $roww5['water_sum5'];
$water6 = $roww6['water_sum6'];
$water7 = $roww7['water_sum7'];
$water8 = $roww8['water_sum8'];
$water9 = $roww9['water_sum9'];
$water10 = $roww10['water_sum10'];
$water11 = $roww11['water_sum11'];
$water12 = $roww12['water_sum12'];


mysqli_close($conn);

echo $elect1;
// echo $elect2;
// echo $elect3;
// echo $elect4;
// echo $elect5;
// echo $elect6;
// echo $elect7;
// echo $elect8;
// echo $elect9;
// echo $elect10;
// echo $elect11;
// echo $elect12;

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
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/helpers.esm.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="chart.css">

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
        </nav><br><br><br><br>
        <section class="header-info">
            <div class="header-title">
                <h2>สรุปผล </h2><br>
            </div>
        </section>
        <div class="card text-center">
            <div class="card-header">
                <h3>รายจ่ายรวมต่อเดือน</h3>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
                    <script>
                        var ctx = document.getElementById("myChart");
                        var tx = 2000;
                        var e1 = "<?php echo $elect1 + $water1; ?>"
                        var e2 = "<?php echo $elect2 + $water2; ?>"
                        var e3 = "<?php echo $elect3 + $water3; ?>"
                        var e4 = "<?php echo $elect4 + $water4; ?>"
                        var e5 = "<?php echo $elect5 + $water5; ?>"
                        var e6 = "<?php echo $elect6 + $water6; ?>"
                        var e7 = "<?php echo $elect7 + $water7; ?>"
                        var e8 = "<?php echo $elect8 + $water8; ?>"
                        var e9 = "<?php echo $elect9 + $water9; ?>"
                        var e10 = "<?php echo $elect10 + $water10; ?>"
                        var e11 = "<?php echo $elect11 + $water11; ?>"
                        var e12 = "<?php echo $elect12 + $water12; ?>"
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                datasets: [{
                                    label: 'Total',
                                    data: [e1, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>

        </div>

    </div>

</body>


</html>