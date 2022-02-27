<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: rgb(255, 204, 255);
}
</style>
<meta charset="utf-8" />
<title>โปรแกรมแสดงข้อมูลพนักงาน</title>
</head>
<body>
<h3>โปรแกรมแสดงข้อมูลพนักงาน</h3>
<?php
include("connect.php");
$tb="user_tpl";
$sql="Select * From $tb";
$db_query=mysqli_query($con,$sql);
$num_rows=mysqli_num_rows($db_query); /* นับ Reccord ที่พบ */
?>
<table width="91%" border="1" align="center">
<tr> 
<td width="8%"bgcolor="#0099ff"> 
<div align="center">รหัสบัตรประชาชน</div>
</td>
<td width="12%"bgcolor="#0088cc"> 
<div align="center">ชื่อ</div>
</td>
<td width="12%"bgcolor="#39ac39"> 
<div align="center">นามสกุล</div>
</td>
<td width="11%"bgcolor="#ace600"> 
<div align="center">room</div>
</td>
<td width="11%"bgcolor="#ffa64d"> 
<div align="center">telephone</div>
</td>
<td width="8%"bgcolor="#0099ff"> 
<div align="center">user</div>
</td>
<td width="8%"bgcolor="#0099ff"> 
<div align="center">name</div>
</td>
</tr>
<?php
$a=0;
while($a < $num_rows)
{
$result = mysqli_fetch_array($db_query);
$eid = $_POST['eid'];
$name = $_POST['name'];
$last = $_POST['last'];
$room = $_POST['room'];
$phone = $_POST['phone'];
$user = $_POST['user'];
$pass = $_POST['pass'];
 
?>
 
<tr> 
<td width="8%"bgcolor="#99d6ff"> 
<div align="center"><?php echo"$eid";?></div>
</td>
<td width="12%"bgcolor="#99ddff"> 
<?php echo"$name";?>
</td>
<td width="12%"bgcolor="#8cd98c"> 
<?php echo"$last";?>
</td>
<td width="11%"bgcolor="#d2ff4d"> 
<?php echo"$room";?>
</td>
<td width="11%"bgcolor="#ffcc99"> 
<?php echo"$phone";?>
</td>
<td width="8%"bgcolor="#99d6ff"> 
<div align="center"><?php echo"$user";?></div>
</td>
<td width="8%"bgcolor="#99d6ff"> 
<div align="center"><?php echo"$pass";?></div>
</td>
</tr>
<?php
$a++;
}
echo"<center><br>จำนวน Reccord = $num_rows</center>";
mysqli_close($con);
?>
</table>
</body>
</html>