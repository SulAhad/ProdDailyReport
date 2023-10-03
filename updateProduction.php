<?php
    $dateProduction = htmlspecialchars($_POST['dateProduction']);
    $plan = htmlspecialchars($_POST['plan']);
    $fact = htmlspecialchars($_POST['fact']);
    $plan_teamA = htmlspecialchars($_POST['plan_teamA']);
    $fact_teamA = htmlspecialchars($_POST['fact_teamA']);
    /*$plan_teamB = htmlspecialchars($_POST['plan_teamB']);
    $fact_teamB = htmlspecialchars($_POST['fact_teamB']);*/
    /*$plan_total = htmlspecialchars($_POST['plan_total']);
    $plan_total = htmlspecialchars($_POST['plan_total']);*/
    $deviation = htmlspecialchars($_POST['deviation']);
    $OEE_teamA = htmlspecialchars($_POST['OEE_teamA']);
    $innotech1_teamA = htmlspecialchars($_POST['innotech1_teamA']);
    $innotech2_teamA = htmlspecialchars($_POST['innotech2_teamA']);
    $innotech3_teamA = htmlspecialchars($_POST['innotech3_teamA']);
    $uva4_teamA = htmlspecialchars($_POST['uva4_teamA']);
    $uva5_teamA = htmlspecialchars($_POST['uva5_teamA']);
    $acma_teamA = htmlspecialchars($_POST['acma_teamA']);
   /* $oee_teamB = htmlspecialchars($_POST['oee_teamB']);
    $innotech1_teamB = htmlspecialchars($_POST['innotech1_teamB']);
    $innotech2_teamB = htmlspecialchars($_POST['innotech2_teamB']);
    $innotech3_teamB = htmlspecialchars($_POST['innotech3_teamB']);
    $uva4_teamB = htmlspecialchars($_POST['uva4_teamB']);
    $uva5_teamB = htmlspecialchars($_POST['uva5_teamB']);
    $acma_teamB = htmlspecialchars($_POST['acma_teamB']);*/
    $oee_total = htmlspecialchars($_POST['oee_total']);
    $comment = htmlspecialchars($_POST['comment']);
    $idProduction = htmlspecialchars($_POST['idProduction']);
    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE Production_KPI 
      SET date = '$dateProduction', 
      plan = '$plan',
      fact = '$fact',
      plan_teamA = '$plan_teamA',
      fact_teamA = '$fact_teamA',
      
      
      deviation = '$deviation',
      OEE_teamA = '$OEE_teamA',
      innotech1_teamA = '$innotech1_teamA',
      innotech2_teamA = '$innotech2_teamA',
      innotech3_teamA = '$innotech3_teamA',
      uva4_teamA = '$uva4_teamA',
      uva5_teamA = '$uva5_teamA',
      acma_teamA = '$acma_teamA',
     
      OEE_total = '$oee_total',
      comment = '$comment'
      WHERE id = '$idProduction'");
?>
