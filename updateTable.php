<?php
require('connect_db.php');
$messageName = "SELECT name,
 COUNT(*) AS rounds_count,
 SUM(CASE WHEN MONTH(date) = 1 THEN 1 ELSE 0 END) AS january_rounds,
 SUM(CASE WHEN MONTH(date) = 2 THEN 1 ELSE 0 END) AS february_rounds,
 SUM(CASE WHEN MONTH(date) = 3 THEN 1 ELSE 0 END) AS march_rounds,
 SUM(CASE WHEN MONTH(date) = 4 THEN 1 ELSE 0 END) AS april_rounds,
 SUM(CASE WHEN MONTH(date) = 5 THEN 1 ELSE 0 END) AS may_rounds,
 SUM(CASE WHEN MONTH(date) = 6 THEN 1 ELSE 0 END) AS june_rounds,
 SUM(CASE WHEN MONTH(date) = 7 THEN 1 ELSE 0 END) AS july_rounds,
 SUM(CASE WHEN MONTH(date) = 8 THEN 1 ELSE 0 END) AS august_rounds,
 SUM(CASE WHEN MONTH(date) = 9 THEN 1 ELSE 0 END) AS september_rounds,
 SUM(CASE WHEN MONTH(date) = 10 THEN 1 ELSE 0 END) AS october_rounds,
 SUM(CASE WHEN MONTH(date) = 11 THEN 1 ELSE 0 END) AS november_rounds,
 SUM(CASE WHEN MONTH(date) = 12 THEN 1 ELSE 0 END) AS december_rounds
FROM InspectionList
GROUP BY name
ORDER BY name, january_rounds, february_rounds, march_rounds, 
april_rounds, may_rounds, june_rounds, july_rounds, august_rounds, september_rounds, october_rounds, november_rounds, december_rounds;";
$link->set_charset("utf8");
$resultName = mysqli_query($link, $messageName);
while ($rowName = mysqli_fetch_assoc($resultName)) {
    echo "<tr>";
    echo "<td>" . $rowName['name'] . "</td>";
    echo "<td>" . $rowName['august_rounds'] . "</td>";
    echo "<td>" . $rowName['september_rounds'] . "</td>";
    echo "<td>" . $rowName['october_rounds'] . "</td>";
    echo "<td>" . $rowName['november_rounds'] . "</td>";
    echo "<td>" . $rowName['december_rounds'] . "</td>";
    echo "<td>" . $rowName['rounds_count'] . "</td>";
    echo "</tr>";
}
mysqli_close($link);
?>