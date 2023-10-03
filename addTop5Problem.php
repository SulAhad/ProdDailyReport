<?php
    require('connect_db.php');
    $date = date("Y-m-d");
    $description_problem = htmlspecialchars($_POST['description_problem']);
    $operator = htmlspecialchars($_POST['operator']);
    $cause = htmlspecialchars($_POST['cause']);
    $immediate_action = htmlspecialchars($_POST['immediate_action']);
    $eliminated = htmlspecialchars($_POST['eliminated']);
    $root_cause = htmlspecialchars($_POST['root_cause']);
    $action = htmlspecialchars($_POST['action']);
    $responce = htmlspecialchars($_POST['responce']);
    $area = htmlspecialchars($_POST['area']);
    $downtime = htmlspecialchars($_POST['downtime']);
    
    //$date = htmlspecialchars($_POST['date']);
    $reserve->set_charset("utf8");
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Top5Problem` 
      (`id`, 
      `date`,
      `description_problem`,
      `operator`,
      `cause`,
      `immediate_action`,
      `eliminated`,
      `root_cause`,
      `action`,
      `responce`,
      `area`,
      `downtime`)
      VALUES (NULL,
      '$date',
      '$description_problem',
      '$operator',
      '$cause',
      '$immediate_action',
      '$eliminated',
      '$root_cause',
      '$action',
      '$responce',
      '$area',
      '$downtime')");
      mysqli_query($reserve, "INSERT INTO `Top5Problem` 
      (`id`, 
      `date`,
      `description_problem`,
      `operator`,
      `cause`,
      `immediate_action`,
      `eliminated`,
      `root_cause`,
      `action`,
      `responce`,
      `area`,
      `downtime`)
      VALUES (NULL,
      '$date',
      '$description_problem',
      '$operator',
      '$cause',
      '$immediate_action',
      '$eliminated',
      '$root_cause',
      '$action',
      '$responce',
      '$area',
      '$downtime')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 
'date' => $date, 
'description_problem' => $description_problem, 
'operator' => $operator, 
'cause' => $cause, 
'immediate_action' => $immediate_action, 
'eliminated' => $eliminated, 
'root_cause' => $root_cause, 
'action' => $action, 
'responce' => $responce, 
'area' => $area,
'downtime' => $downtime));
?>