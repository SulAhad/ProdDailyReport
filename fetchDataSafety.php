<?php
require('connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(Incedents) AS incedents, 
SUM(NearMiss) AS nearMiss, 
SUM(Bbswa) AS bbswa, 
SUM(Kol_vo_zam) AS kol_vo_zam,
SUM(Kol_zam_teamA) AS kol_zam_teamA,
SUM(Kol_zam_teamB) AS kol_zam_teamB,
SUM(Kol_zam_Sulf) AS kol_zam_Sulf,
SUM(Bbs_teamA) AS bbs_teamA,
SUM(Bbs_teamB) AS bbs_teamB,
SUM(Bbs_Sulf) AS bbs_Sulf,
SUM(Rpm_zam_teamA) AS rpm_zam_teamA,
SUM(Rpm_zam_teamB) AS rpm_zam_teamB,
SUM(Rpm_zam_Sulf) AS rpm_zam_Sulf,
SUM(Rpm_bbs_teamA) AS rpm_bbs_teamA,
SUM(Rpm_bbs_teamB) AS rpm_bbs_teamB,
SUM(Rpm_bbs_Sulf) AS rpm_bbs_Sulf,
GROUP_CONCAT(Incedents_comment SEPARATOR ' ') AS incedents_comment,
GROUP_CONCAT(NearMiss_comment SEPARATOR ' ') AS nearMiss_comment,
GROUP_CONCAT(Bbswa_comment SEPARATOR ' ') AS bbswa_comment,
GROUP_CONCAT(Kol_vo_zam_comment SEPARATOR ' ') AS kol_vo_zam_comment,
GROUP_CONCAT(Kol_zam_teamA_comment SEPARATOR ' ') AS kol_zam_teamA_comment,
GROUP_CONCAT(Kol_zam_teamB_comment SEPARATOR ' ') AS kol_zam_teamB_comment,
GROUP_CONCAT(Kol_zam_Sulf_comment SEPARATOR ' ') AS kol_zam_Sulf_comment,
GROUP_CONCAT(Bbs_teamA_comment SEPARATOR ' ') AS bbs_teamA_comment,
GROUP_CONCAT(Bbs_teamB_comment SEPARATOR ' ') AS bbs_teamB_comment,
GROUP_CONCAT(Bbs_Sulf_comment SEPARATOR ' ') AS bbs_Sulf_comment,
GROUP_CONCAT(Rpm_zam_teamA_comment SEPARATOR ' ') AS rpm_zam_teamA_comment,
GROUP_CONCAT(Rpm_zam_teamB_comment SEPARATOR ' ') AS rpm_zam_teamB_comment,
GROUP_CONCAT(Rpm_zam_Sulf_comment SEPARATOR ' ') AS rpm_zam_Sulf_comment,
GROUP_CONCAT(Rpm_bbs_teamA_comment SEPARATOR ' ') AS rpm_bbs_teamA_comment,
GROUP_CONCAT(Rpm_bbs_teamB_comment SEPARATOR ' ') AS rpm_bbs_teamB_comment,
GROUP_CONCAT(Rpm_bbs_Sulf_comment SEPARATOR ' ') AS rpm_bbs_Sulf_comment
    FROM Safety_KPI 
WHERE DATE(date) = '$date'
GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    echo"<tr>";
    echo"    <td>инциденты</td>";
    if($row['incedents'] <= 0)
    {
        echo"<td class='success' title='$row[incedents_comment]'><p>$row[incedents]</p></td>";
    } else {
        echo"<td class='danger' title='$row[incedents_comment]'><p>$row[incedents]</p></td>";
    }
    echo"    <td>количество замечаний</td>";
    if($row['kol_zam_teamA'] <= 0)
    {
        echo"<td class='success' title='$row[kol_zam_teamA_comment]'><p>$row[kol_zam_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[kol_zam_teamA_comment]'><p>$row[kol_zam_teamA]</p></td>";
    }
    /*if($row['kol_zam_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[kol_zam_teamB_comment]'><label>$row[kol_zam_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[kol_zam_teamB_comment]'><label>$row[kol_zam_teamB]</label></td>";
    }*/
    if($row['kol_zam_Sulf'] <= 0)
    {
        echo"<td class='success' title='$row[kol_zam_Sulf_comment]'><p>$row[kol_zam_Sulf]</p></td>";
    } else {
        echo"<td class='danger' title='$row[kol_zam_Sulf_comment]'><p>$row[kol_zam_Sulf]</p></td>";
    }
    echo"</tr>";
    /*-----------------------------------------------------------------------------------------------------------------------*/
    echo"<tr>";
    echo"    <td>действия на грани риска</td>";
    if($row['nearMiss'] <= 0)
    {
        echo"<td class='success' title='$row[nearMiss_comment]'><p>$row[nearMiss]</p></td>";
    } else {
        echo"<td class='danger' title='$row[nearMiss_comment]'><p>$row[nearMiss]</p></td>";
    }
    echo"    <td>обход по безопасности</td>";
    if($row['bbs_teamA'] <= 0)
    {
        echo"<td class='success' title='$row[bbs_teamA_comment]'><p>$row[bbs_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[bbs_teamA_comment]'><p>$row[bbs_teamA]</p></td>";
    }
    /*if($row['bbs_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[bbs_teamB_comment]'><label>$row[bbs_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[bbs_teamB_comment]'><label>$row[bbs_teamB]</label></td>";
    }*/
    if($row['bbs_Sulf'] <= 0)
    {
        echo"<td class='success' title='$row[bbs_Sulf_comment]'><p>$row[bbs_Sulf]</p></td>";
    } else {
        echo"<td class='danger' title='$row[bbs_Sulf_comment]'><p>$row[bbs_Sulf]</p></td>";
    }
    echo"</tr>";
        /*-----------------------------------------------------------------------------------------------------------------------*/
    echo"<tr>";
    /*echo"    <td>обход по безопасности</td>";
    if($row['bbswa'] <= 0)
    {
        echo"<td class='success' title='$row[bbswa_comment]'><p>$row[bbswa]</p></td>";
    } else {
        echo"<td class='danger' title='$row[bbswa_comment]'><p>$row[bbswa]</p></td>";
    }*/
    /*echo"    <td>r&pm замечания</td>";
    if($row['rpm_zam_teamA'] <= 0)
    {
        echo"<td class='success' title='$row[rpm_zam_teamA_comment]'><p>$row[rpm_zam_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[rpm_zam_teamA_comment]'><p>$row[rpm_zam_teamA]</p></td>";
    }*/
    /*if($row['rpm_zam_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[rpm_zam_teamB_comment]'><label>$row[rpm_zam_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[rpm_zam_teamB_comment]'><label>$row[rpm_zam_teamB]</label></td>";
    }*/
    /*if($row['rpm_zam_Sulf'] <= 0)
    {
        echo"<td class='success' title='$row[rpm_zam_Sulf_comment]'><p>$row[rpm_zam_Sulf]</p></td>";
    } else {
        echo"<td class='danger' title='$row[rpm_zam_Sulf_comment]'><p>$row[rpm_zam_Sulf]</p></td>";
    }*/
    /*echo"</tr>";*/
        /*-----------------------------------------------------------------------------------------------------------------------*/
    /*echo"<tr>";
    echo"    <td>количество замечаний</td>";
    if($row['kol_vo_zam'] <= 0)
    {
        echo"<td class='success' title='$row[kol_vo_zam_comment]'><p>$row[kol_vo_zam]</p></td>";
    } else {
        echo"<td class='danger' title='$row[kol_vo_zam_comment]'><p>$row[kol_vo_zam]</p></td>";
    }*/
   /* echo"    <td>r&pm BBSWA</td>";
    if($row['rpm_bbs_teamA'] <= 0)
    {
        echo"<td class='success' title='$row[rpm_bbs_teamA_comment]'><p>$row[rpm_bbs_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[rpm_bbs_teamA_comment]'><p>$row[rpm_bbs_teamA]</p></td>";
    }*/
    /*if($row['rpm_bbs_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[rpm_bbs_teamB_comment]'><label>$row[rpm_bbs_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[rpm_bbs_teamB_comment]'><label>$row[rpm_bbs_teamB]</label></td>";
    }*/
    /*if($row['rpm_bbs_Sulf'] <= 0)
    {
        echo"<td class='success' title='$row[rpm_bbs_Sulf_comment]'><p>$row[rpm_bbs_Sulf]</p></td>";
    } else {
        echo"<td class='danger' title='$row[rpm_bbs_Sulf_comment]'><p>$row[rpm_bbs_Sulf]</p></td>";
    }*/
    /*echo"</tr>";*/
}
}
else
{
    echo"<tr>";
    echo"    <td>инциденты</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td>кол-во замечаний</td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>действия на грани риска</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td>обход по безопасности</td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
   /* echo"<tr>";
    echo"    <td>обход по безопасности</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td>r&pm замечания</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td class='success'><label>0</label></td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>количество замечаний</td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td>r&pm bbswa</td>";
    echo"    <td class='success'><p>0</p></td>";*/
    /*echo"    <td class='success'><label>0</label></td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";*/
}
?>