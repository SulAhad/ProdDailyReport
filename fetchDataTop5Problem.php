<?php
require('connect_db.php');

$date = $_GET['date'];

if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT * 
    FROM Top5Problem 
WHERE DATE(date) = '$date'";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
    echo"<tr>";
        echo"    <th>Описание проблемы</th>";
        echo"    <th>Оператор линии</th>";
        echo"    <th>Причина</th>";
        echo"    <th>Непосредственное действие</th>";
        echo"    <th>Устранил</th>";
        echo"    <th>Коренная причина</th>";
        echo"    <th>Действие</th>";
        echo"    <th>Ответственный</th>";
        echo"    <th>Район\Участок</th>";
        echo"    <th>Простой, мин</th>";
        echo"</tr>";
    while($row = mysqli_fetch_assoc($result)) 
    {
        
        echo"<tr>";
        echo"    <td>$row[description_problem]</td>";
        echo"    <td>$row[operator]</td>";
        echo"    <td>$row[cause]</td>";
        echo"    <td>$row[immediate_action]</td>";
        echo"    <td>$row[eliminated]</td>";
        echo"    <td>$row[root_cause]</td>";
        echo"    <td>$row[action]</td>";
        echo"    <td>$row[responce]</td>";
        echo"    <td>$row[area]</td>";
        echo"    <td>$row[downtime]</td>";
        echo"</tr>";
    }
}
else
{
    echo"<tr>";
    echo"    <th>Описание проблемы</th>";
    echo"    <th>Оператор линии</th>";
    echo"    <th>Причина</th>";
    echo"    <th>Непосредственное действие</th>";
    echo"    <th>Устранил</th>";
    echo"    <th>Коренная причина</th>";
    echo"    <th>Действие</th>";
    echo"    <th>Ответственный</th>";
    echo"    <th>Район\Участок</th>";
    echo"    <th>Простой, мин</th>";
    echo"</tr>";
}

?>