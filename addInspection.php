<?php
require('connect_db.php');
    //$date = date("Y-m-d");
    $date = htmlspecialchars($_POST['date']);
    $textForList = htmlspecialchars($_POST['textForList']);
    $name = htmlspecialchars($_POST['name']);
    $duration = htmlspecialchars($_POST['duration']);
    
    $number_of_rounds= htmlspecialchars($_POST['number_of_rounds']);
    $number_of_nonconformities = htmlspecialchars($_POST['number_of_nonconformities']);
    
    $production = htmlspecialchars($_POST['production']);
    $equipmentCMC = htmlspecialchars($_POST['equipmentCMC']);
    
    $areaCMC = htmlspecialchars($_POST['areaCMC']);
    $link->set_charset("utf8");
    $reserve->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `bypassList` 
      (`id`, 
      `date`,
      `name`,
      `text`,
      `duration`,
      `number_of_rounds`,
      `number_of_nonconformities`,
      `production`,
      `area`,
      `equipment`) 
      VALUES (NULL,
      '$date',
      '$name',
      '$textForList',
      '$duration',
      '$number_of_rounds',
      '$number_of_nonconformities',
      '$production',
      '$areaCMC',
      '$equipmentCMC')");
      mysqli_query($reserve, "INSERT INTO `bypassList` 
      (`id`, 
      `date`,
      `name`,
      `text`,
      `duration`,
      `number_of_rounds`,
      `number_of_nonconformities`,
      `production`,
      `area`,
      `equipment`) 
      VALUES (NULL,
      '$date',
      '$name',
      '$textForList',
      '$duration',
      '$number_of_rounds',
      '$number_of_nonconformities',
      '$production',
      '$areaCMC',
      '$equipmentCMC')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'date' => $date, 
'name' => $name, 
'text' => $textForList, 
'duration' => $duration, 
'number_of_rounds' => $number_of_rounds, 
'number_of_nonconformities' => $number_of_nonconformities, 
'production' => $production, 
'area' => $areaCMC, 
'equipment' => $equipmentCMC));
?>