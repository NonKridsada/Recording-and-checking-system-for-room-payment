<?php
    header('Coontent-Type: application/json');

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
    echo $elect2;
    echo $elect3;
    echo $elect4;
    echo $elect5;
    echo $elect6;
    echo $elect7;
    echo $elect8;
    echo $elect9;
    echo $elect10;
    echo $elect11;
    echo $elect12;

    
?>