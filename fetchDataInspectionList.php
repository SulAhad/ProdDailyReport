<?php
require('connect_db.php');
$date = $_GET['date'];
if(!isset($_SESSION['login'])) {
  header('Location: bridge.php');
  exit();
}
$message = "SELECT DATE(date) AS day, COUNT(name) AS count_name, typeSafety, comment, textForList
    FROM InspectionList 
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
        echo"    <td><p>количество обходов</p></td>";
        echo"    <td class='success'>$row[count_name]</td>";
        echo"</tr>";
    }
}
else{ 
    echo"<tr>";
        echo"    <td><p>количество обходов</p></td>";
        echo"    <td  class='danger'><p>0</p></td>";
    echo"</tr>";
}
?>
