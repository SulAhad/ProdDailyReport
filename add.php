<?php
    $name = htmlspecialchars($_POST['name']);
    $orderName = htmlspecialchars($_POST['orderName']);
    $time = htmlspecialchars($_POST['time']);
    $production = htmlspecialchars($_POST['production']);
    $areaCMC = htmlspecialchars($_POST['areaCMC']);
    $equipmentCMC = htmlspecialchars($_POST['equipmentCMC']);
    $costCentr = htmlspecialchars($_POST['costCentr']);
    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `myCalendar` 
      (`id`, 
      `name`,
      `time`,
      `orderName`,
      `production`,
      `area`,
      `equipment`,
      `costCentr`) 
      VALUES (NULL,
      '$name',
      '$time',
      '$orderName',
      '$production',
      '$areaCMC',
      '$equipmentCMC',
      '$costCentr')");
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('name' => $name, 'time' => $time, 'orderName' => $orderName, 'production' => $production, 'area' => $areaCMC, 'equipment' => $equipmentCMC, 'costCentr' => $costCentr));
?>