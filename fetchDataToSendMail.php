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
    echo"Добрый день!" . "\r\n";
    echo"Отправляю сменное задание в новом формате." . "\r\n";
while($row = mysqli_fetch_assoc($result)) 

{
    echo"$invoiceId." . " " . "{$row['name']} - {$row['hour']}" . "\r\n";
    $invoiceId++;
    /*echo "<tr style='clear:both'>";
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

    echo "</tr>";
    $invoiceId++;*/
}
echo"Хорошего дня!" . "\r\n";
echo"-- " . "\r\n";
echo"С уважением," . "\r\n";
echo"Suleimanov Ahad" . "\r\n";
echo"IT Engineer" . "\r\n";
echo" " . "\r\n";
echo"Mobile: +7-937-246-4662" . "\r\n";
echo"E-Mail: akhad.suleymanov@lab-industries.ru" . "\r\n";
?>