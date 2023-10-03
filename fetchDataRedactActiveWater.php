<?php
require('connect_db.php');
$date = $_GET['date'];
$today = date('Y-m-d');
if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT 
SUM(w1) AS w1_total, 
SUM(w2) AS w2_total, 
SUM(w3) AS w3_total, 
SUM(w4) AS w4_total, 
SUM(w5) AS w5_total, 
SUM(w6) AS w6_total FROM Active_water_KPI WHERE date = '$date'";
$link->set_charset("utf8");
$result =  mysqli_query( $link,  $message);
        while($row = mysqli_fetch_assoc($result))
        {
            echo"<tr>";
            echo"    <td>м3</td>";
            echo"    <td><input min='0' type='number' id='w1' placeholder='$row[w1_total]' class='form-control'></td>";
            echo"    <td><input min='0' type='number' id='w2' placeholder='$row[w2_total]' class='form-control'></td>";
            echo"    <td><input min='0' type='number' id='w3' placeholder='$row[w3_total]' class='form-control'></td>";
            echo"</tr>";
            echo"<tr>";
            echo"    <td>Использовано активной воды, м3</td>";
            echo"    <td><input min='0' type='number' id='w4' placeholder='$row[w4_total]' class='form-control'></td>";
            echo"    <td><input min='0' type='number' id='w5' placeholder='$row[w5_total]' class='form-control'></td>";
            echo"    <td><input min='0' type='number' id='w6' placeholder='$row[w6_total]' class='form-control'></td>";
            echo"</tr>";
        }
?>