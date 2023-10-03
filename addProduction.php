<?php
    require('connect_db.php');
    $date = date("Y-m-d H:i:s");
    $dateTime = htmlspecialchars($_POST['dateTime']);
    $plan = htmlspecialchars($_POST['plan']);
    $fact = htmlspecialchars($_POST['fact']);
    
    $plan_teamA = htmlspecialchars($_POST['plan_teamA']);
    $fact_teamA = htmlspecialchars($_POST['fact_teamA']);
    
    $plan_teamB = htmlspecialchars($_POST['plan_teamB']);
    $fact_teamB = htmlspecialchars($_POST['fact_teamB']);
    
    $plan_total = htmlspecialchars($_POST['plan_total']);
    $fact_total = htmlspecialchars($_POST['fact_total']);
    
    $deviation = htmlspecialchars($_POST['deviation']);
    
    $OEE_teamA = htmlspecialchars($_POST['OEE_teamA']);
    $innotech1_teamA = htmlspecialchars($_POST['innotech1_teamA']);
    $innotech2_teamA = htmlspecialchars($_POST['innotech2_teamA']);
    $innotech3_teamA = htmlspecialchars($_POST['innotech3_teamA']);
    $uva4_teamA = htmlspecialchars($_POST['uva4_teamA']);
    $uva5_teamA = htmlspecialchars($_POST['uva5_teamA']);
    $acma_teamA = htmlspecialchars($_POST['acma_teamA']);
    
    $oee_teamB = htmlspecialchars($_POST['oee_teamB']);
    $innotech1_teamB = htmlspecialchars($_POST['innotech1_teamB']);
    $innotech2_teamB = htmlspecialchars($_POST['innotech2_teamB']);
    $innotech3_teamB = htmlspecialchars($_POST['innotech3_teamB']);
    $uva4_teamB = htmlspecialchars($_POST['uva4_teamB']);
    $uva5_teamB = htmlspecialchars($_POST['uva5_teamB']);
    $acma_teamB = htmlspecialchars($_POST['acma_teamB']);
    
    $oee_total = htmlspecialchars($_POST['oee_total']);
    $comment = htmlspecialchars($_POST['comment']);
    $link->set_charset("utf8");
    $reserve->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `Production_KPI` 
      (`id`, 
      `date`,
      `plan`,
      `fact`,
      
      `plan_teamA`,
      `fact_teamA`,
      
      `plan_teamB`,
      `fact_teamB`,
      
      `plan_total`,
      `fact_total`,
      `deviation`,
      
      `OEE_teamA`,
      `innotech1_teamA`,
      `innotech2_teamA`,
      `innotech3_teamA`,
      `uva4_teamA`,
      `uva5_teamA`,
      `acma_teamA`,
      
      `oee_teamB`,
      `innotech1_teamB`,
      `innotech2_teamB`,
      `innotech3_teamB`,
      `uva4_teamB`,
      `uva5_teamB`,
      `acma_teamB`,
      `oee_total`,
      `comment`) 
      VALUES (NULL,
      '$dateTime',
      '$plan',
      '$fact',
      
      '$plan_teamA',
      '$fact_teamA',
      
      '$plan_teamB',
      '$fact_teamB',
      
      '$plan_total',
      '$fact_total',
      
      '$deviation',
      
      '$OEE_teamA',
      '$innotech1_teamA',
      '$innotech2_teamA',
      '$innotech3_teamA',
      '$uva4_teamA',
      '$uva5_teamA',
      '$acma_teamA',
      
      '$oee_teamB',
      '$innotech1_teamB',
      '$innotech2_teamB',
      '$innotech3_teamB',
      '$uva4_teamB',
      '$uva5_teamB',
      '$acma_teamB',
      '$oee_total',
      '$comment')");
      mysqli_query($reserve, "INSERT INTO `Production_KPI` 
      (`id`, 
      `date`,
      `plan`,
      `fact`,
      
      `plan_teamA`,
      `fact_teamA`,
      
      `plan_teamB`,
      `fact_teamB`,
      
      `plan_total`,
      `fact_total`,
      `deviation`,
      
      `OEE_teamA`,
      `innotech1_teamA`,
      `innotech2_teamA`,
      `innotech3_teamA`,
      `uva4_teamA`,
      `uva5_teamA`,
      `acma_teamA`,
      
      `oee_teamB`,
      `innotech1_teamB`,
      `innotech2_teamB`,
      `innotech3_teamB`,
      `uva4_teamB`,
      `uva5_teamB`,
      `acma_teamB`,
      `oee_total`, `comment`) 
      VALUES (NULL,
      '$dateTime',
      '$plan',
      '$fact',
      
      '$plan_teamA',
      '$fact_teamA',
      
      '$plan_teamB',
      '$fact_teamB',
      
      '$plan_total',
      '$fact_total',
      
      '$deviation',
      
      '$OEE_teamA',
      '$innotech1_teamA',
      '$innotech2_teamA',
      '$innotech3_teamA',
      '$uva4_teamA',
      '$uva5_teamA',
      '$acma_teamA',
      
      '$oee_teamB',
      '$innotech1_teamB',
      '$innotech2_teamB',
      '$innotech3_teamB',
      '$uva4_teamB',
      '$uva5_teamB',
      '$acma_teamB',
      '$oee_total', '$comment')");
// Получаем id последней вставленной строки
$id = mysqli_insert_id($link);
// Возвращаем данные в виде JSON-объекта
echo json_encode(array('id' => $id, 'date' => $dateTime, 

'plan' => $plan, 
'fact' => $fact, 

'plan_teamA' => $plan_teamA, 
'fact_teamA' => $fact_teamA, 

'plan_teamB' => $plan_teamB, 
'fact_teamB' => $fact_teamB, 

'plan_total' => $plan_total, 
'fact_total' => $fact_total, 
'deviation' => $deviation, 

'OEE_teamA' => $OEE_teamA, 
'innotech1_teamA' => $innotech1_teamA, 
'innotech2_teamA' => $innotech2_teamA, 
'innotech3_teamA' => $innotech3_teamA, 
'uva4_teamA' => $uva4_teamA, 
'uva5_teamA' => $uva5_teamA, 
'acma_teamA' => $acma_teamA, 

'oee_teamB' => $oee_teamB, 
'innotech1_teamB' => $innotech1_teamB, 
'innotech2_teamB' => $innotech2_teamB, 
'innotech3_teamB' => $innotech3_teamB, 
'uva4_teamB' => $uva4_teamB, 
'uva5_teamB' => $uva5_teamB, 
'acma_teamB' => $acma_teamB, 
'oee_total' => $oee_total,
'comment' => $comment));
?>