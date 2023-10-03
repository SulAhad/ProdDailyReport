<?php
require('connect_db.php');
//$fileNme = $_FILES["image"]["type"];
//$base64 = file_get_contents($_FILES['image']['tmp_name']);
//$imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));


$date = mysqli_real_escape_string($link, $_POST['date']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$textForList = mysqli_real_escape_string($link, $_POST['textForList']);
$comment = mysqli_real_escape_string($link, $_POST['comment']);
$duration = mysqli_real_escape_string($link, $_POST['duration']);
$staff = mysqli_real_escape_string($link, $_POST['staff']);
$contract = mysqli_real_escape_string($link, $_POST['contract']);
$isButton1Pressed = $_POST['isButton1Pressed'];
$isButton2Pressed = $_POST['isButton2Pressed'];
$typeSafety = $_POST['typeSafety'];
$production = mysqli_real_escape_string($link, $_POST['production']);
$area = mysqli_real_escape_string($link, $_POST['area']);
//$nameFile = $_FILES['image']['name'];
//$tmp_name = $_FILES['image']['tmp_name'];
//$upload_dir = 'uploads/';
$link->set_charset("utf8");
mysqli_query($link, "INSERT INTO InspectionList 
    (id, date, name, textForList, typeSafety, comment, 
    intervention1, intervention2, duration, staff, contract,
    production, area) 
    VALUES (NULL, '$date', '$name', '$textForList', 
    '$typeSafety', '$comment', '$isButton1Pressed', '$isButton2Pressed', 
    '$duration', '$staff', '$contract', '$production', 
    '$area')");
$reserve->set_charset("utf8");
mysqli_query($reserve, "INSERT INTO InspectionList 
    (id, date, name, textForList, typeSafety, comment, 
    intervention1, intervention2, duration, staff, contract,
    production, area) 
    VALUES (NULL, '$date', '$name', '$textForList', 
    '$typeSafety', '$comment', '$isButton1Pressed', '$isButton2Pressed', 
    '$duration', '$staff', '$contract', '$production', 
    '$area')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 
'date' => $date, 
'name' => $name, 
'textForList' => $textForList, 
'typeSafety' => $typeSafety, 
'comment' => $comment, 
'intervention1' => $isButton1Pressed, 
'intervention2' => $isButton2Pressed, 
'duration' => $duration, 
'staff' => $staff, 
'contract' => $contract, 
'production' => $production, 
'area' => $area));

?>