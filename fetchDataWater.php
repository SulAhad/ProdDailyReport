<?php
require('connect_db.php');

$date = $_GET['date'];

if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(w1) AS w1, 
SUM(w2) AS w2, 
SUM(w3) AS w3, 
SUM(w4) AS w4,
SUM(w5) AS w5,
SUM(w6) AS w6
    FROM Active_water_KPI 
WHERE DATE(date) = '$date'
GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    echo"<tr>";
    echo"    <td>м3</td>";
    echo"    <td><p>$row[w1]</p></td>";
    echo"    <td><p>$row[w2]</p></td>";
    echo"    <td><p>$row[w3]</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>использовано активной воды, м3</td>";
    echo"    <td><p>$row[w4]</p></td>";
    echo"    <td><p>$row[w5]</p></td>";
    echo"    <td><p>$row[w6]</p></td>";
    echo"</tr>";
}
}
else
{
   echo"<tr>";
    echo"    <td>м3</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>использовано активной воды, м3</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
}

?>