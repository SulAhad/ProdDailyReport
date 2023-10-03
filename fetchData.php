<?php
require('connect_db.php');

$date = $_GET['date'];

if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT *, 
CASE 
    WHEN time < 60 THEN CONCAT(time, ' мин') 
    WHEN (time % 60) = 0 THEN CONCAT(FLOOR((time) / 60), ' ч') 
    ELSE CONCAT(FLOOR((time) / 60), ' ч ', (time) % 60, ' мин') 
END as hour 
FROM myCalendar 
WHERE DATE(date) = '$date'";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
while($row = mysqli_fetch_assoc($result)) 
{
    echo "<tr>";
        echo "<td>$invoiceId</td>";
        echo "<td>$date</td>";
        if(!empty($row['production']) && !empty($row['costCentr']))
        {
            echo "<td>" . $row['production'] . " / " . $row['costCentr'] . "</td>";
        } 
        else 
        {
            echo "<td>" . $row['costCentr'] . "</td>";
        }
        echo "<td style='text-align: left;'>$row[name]</td>";
        echo "<td>Сулейманов А.А.</td>";
        echo "<td>$row[hour]</td>";
        echo "<td></td>";
        echo "<td></td>";
    echo "</tr>";
    $invoiceId++;
}
    echo "<tr>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        $message = "SELECT *, 
        CASE 
        WHEN SUM(time) < 60 THEN CONCAT(SUM(time), ' мин')
        WHEN SUM(time) % 60 = 0 THEN CONCAT(FLOOR(SUM(time) / 60), ' ч')
        ELSE CONCAT(FLOOR(SUM(time) / 60), ' ч ', SUM(time) % 60, ' мин')
        END as total_time 
        FROM myCalendar WHERE DATE(date) = '$date'";
        $link->set_charset("utf8");
        $result =  mysqli_query($link, $message);
        $row = mysqli_fetch_assoc($result);
        echo "<td style='color:lightgray;'>$row[total_time]</td>";
        echo "<td></td>";
        echo "<td></td>";
    echo "</tr>";
?>