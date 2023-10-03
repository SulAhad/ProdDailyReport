<?php
require('connect_db.php');
$message = "SELECT name, 
       SUM(duration) AS total_duration,
       MONTH(date) AS month
FROM InspectionList
WHERE MONTH(date) >= 8
GROUP BY name, MONTH(date)
ORDER BY name, MONTH(date)";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $month = $row['month'];
    $total_duration = $row['total_duration'];
    $formatted_duration = "";

    if ($total_duration % 60 == 0) {
        $hours = floor($total_duration / 60);
        $formatted_duration = ($hours == 0) ? '' : $hours . ' ч';
    } else {
        $hours = floor($total_duration / 60);
        $minutes = $total_duration % 60;
        $formatted_duration = ($hours == 0) ? $minutes . ' мин' : $hours . ' ч ' . $minutes . ' мин';}

    if (!isset($data[$name])) {
        $data[$name] = array();
    }

    $data[$name][$month] = $formatted_duration;
}
echo "<tr><th>Фамилия</th><th>Август</th><th>Сентябрь</th><th>Октябрь</th><th>Ноябрь</th><th>Декабрь</th></tr>";

foreach ($data as $name => $months) {
    echo "<tr>";
    echo "<td>" . $name . "</td>";
    for ($i = 8; $i <= 12; $i++) {
        $duration = isset($months[$i]) ? $months[$i] : "";
        echo "<td>" . $duration . "</td>";
    }
    echo "</tr>";
}
mysqli_close($link);
?>