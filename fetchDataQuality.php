<?php
require('connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(BrakQuality) AS brakQuality, 
SUM(Kol_zam_him_sostav_teamA) AS kol_zam_him_sostav_teamA, 
SUM(Kol_zam_upakovka_teamA) AS kol_zam_upakovka_teamA, 
SUM(Kol_pretenziy_teamA) AS kol_pretenziy_teamA,
SUM(Zabrakov_mat_teamA) AS zabrakov_mat_teamA,
SUM(Kol_zam_him_sostav_teamB) AS kol_zam_him_sostav_teamB,
SUM(Kol_zam_upakovka_teamB) AS kol_zam_upakovka_teamB,
SUM(Kol_pretenziy_teamB) AS kol_pretenziy_teamB,
SUM(Zabrakov_mat_teamB) AS zabrakov_mat_teamB,
SUM(Kol_zam_him_sostav_Sulf) AS kol_zam_him_sostav_Sulf,
SUM(Kol_zam_upakovka_Sulf) AS kol_zam_upakovka_Sulf,
SUM(Kol_pretenziy_Sulf) AS kol_pretenziy_Sulf,
SUM(Zabrakov_mat_Sulf) AS zabrakov_mat_Sulf,
GROUP_CONCAT(BrakQuality_comment SEPARATOR ', ') AS brakQuality_comment,
GROUP_CONCAT(Kol_zam_him_sostav_teamA_comment SEPARATOR ', ') AS kol_zam_him_sostav_teamA_comment, 
GROUP_CONCAT(Kol_zam_upakovka_teamA_comment SEPARATOR ', ') AS kol_zam_upakovka_teamA_comment, 
GROUP_CONCAT(Kol_pretenziy_teamA_comment SEPARATOR ', ') AS kol_pretenziy_teamA_comment,
GROUP_CONCAT(Zabrakov_mat_teamA_comment SEPARATOR ', ') AS zabrakov_mat_teamA_comment,
GROUP_CONCAT(Kol_zam_him_sostav_teamB_comment SEPARATOR ', ') AS kol_zam_him_sostav_teamB_comment,
GROUP_CONCAT(Kol_zam_upakovka_teamB_comment SEPARATOR ', ') AS kol_zam_upakovka_teamB_comment,
GROUP_CONCAT(Kol_pretenziy_teamB_comment SEPARATOR ', ') AS kol_pretenziy_teamB_comment,
GROUP_CONCAT(Zabrakov_mat_teamB_comment SEPARATOR ', ') AS zabrakov_mat_teamB_comment,
GROUP_CONCAT(Kol_zam_him_sostav_Sulf_comment SEPARATOR ', ') AS kol_zam_him_sostav_Sulf_comment,
GROUP_CONCAT(Kol_zam_upakovka_Sulf_comment SEPARATOR ', ') AS kol_zam_upakovka_Sulf_comment,
GROUP_CONCAT(Kol_pretenziy_Sulf_comment SEPARATOR ', ') AS kol_pretenziy_Sulf_comment,
GROUP_CONCAT(Zabrakov_mat_Sulf_comment SEPARATOR ', ') AS zabrakov_mat_Sulf_comment
    FROM Quality_KPI 
WHERE DATE(date) = '$date'
GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;

if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
   echo" <tr>";
   echo"     <td>брак, t.</td>";
   if($row['brakQuality'] <= 0)
    {
         echo"<td class='success' title='$row[brakQuality_comment]'><p>".number_format($row['brakQuality'], 2)."</p></td>";
    } else {
         echo"<td class='danger' title='$row[brakQuality_comment]'><p>".number_format($row['brakQuality'], 2)."</p></td>";
    }
   
   echo"     <td><p></p></td>";
   /*echo"     <td><label></label></td>";*/
   echo"     <td><p></p></td>";
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr>";
   echo"     <td colspan='2'>количество замечаний по хим. составу</td>";
   if($row['kol_zam_him_sostav_teamA'] <= 0)
    {
        echo"<td  class='success' title='$row[kol_zam_him_sostav_teamA_comment]'><p>$row[kol_zam_him_sostav_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[kol_zam_him_sostav_teamA_comment]'><p>$row[kol_zam_him_sostav_teamA]</p></td>";
    }
    /*if($row['kol_zam_him_sostav_teamB'] <= 0)
    {
        echo"<td  class='success' title='$row[kol_zam_him_sostav_teamB_comment]'><label>$row[kol_zam_him_sostav_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[kol_zam_him_sostav_teamB_comment]'><label>$row[kol_zam_him_sostav_teamB]</label></td>";
    }*/
    if($row['kol_zam_him_sostav_Sulf'] <= 0)
    {
        echo"<td  class='success'  title='$row[kol_zam_him_sostav_Sulf_comment]'><p>$row[kol_zam_him_sostav_Sulf]</p></td>";
    } else {
        echo"<td  class='danger' title='$row[kol_zam_him_sostav_Sulf_comment]'><p>$row[kol_zam_him_sostav_Sulf]</p></td>";
    }
    
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr>";
   echo"     <td colspan='2'>количество замечаний по упаковке</td>";
   if($row['kol_zam_upakovka_teamA'] <= 0)
    {
        echo"<td  class='success'  title='$row[kol_zam_upakovka_teamA_comment]'><p>$row[kol_zam_upakovka_teamA]</p></td>";
    } else {
        echo"<td  class='danger' title='$row[kol_zam_upakovka_teamA_comment]'><p>$row[kol_zam_upakovka_teamA]</p></td>";
    }
    /*if($row['kol_zam_upakovka_teamB'] <= 0)
    {
        echo"<td  class='success' title='$row[kol_zam_upakovka_teamB_comment]'><label>$row[kol_zam_upakovka_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[kol_zam_upakovka_teamB_comment]'><label>$row[kol_zam_upakovka_teamB]</label></td>";
    }*/
   echo"<td></td>";
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr>";
   echo"     <td colspan='2'>количество претензий</td>";
       if($row['kol_pretenziy_teamA'] <= 0)
    {
        echo"<td class='success'  title='$row[kol_pretenziy_teamA_comment]'><p>$row[kol_pretenziy_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[kol_pretenziy_teamA_comment]'><p>$row[kol_pretenziy_teamA]</p></td>";
    }
        /*if($row['kol_pretenziy_teamB'] <= 0)
    {
        echo"<td  class='success' title='$row[kol_pretenziy_teamB_comment]'><label>$row[kol_pretenziy_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[kol_pretenziy_teamB_comment]'><label>$row[kol_pretenziy_teamB]</label></td>";
    }*/
        if($row['kol_pretenziy_Sulf'] <= 0)
    {
        echo"<td  class='success' title='$row[kol_pretenziy_Sulf_comment]'><p>$row[kol_pretenziy_Sulf]</p></td>";
    } else {
        echo"<td class='danger' title='$row[kol_pretenziy_Sulf_comment]'><p>$row[kol_pretenziy_Sulf]</p></td>";
    }
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr>";
   echo"     <td colspan='2'>забракованный материал</td>";
   if($row['zabrakov_mat_teamA'] <= 0)
    {
        echo"<td  class='success' title='$row[zabrakov_mat_teamA_comment]'><p>$row[zabrakov_mat_teamA]</p></td>";
    } else {
        echo"<td class='danger' title='$row[zabrakov_mat_teamA_comment]'><p>$row[zabrakov_mat_teamA]</p></td>";
    }
    /*if($row['zabrakov_mat_teamB'] <= 0)
    {
        echo"<td class='success'  title='$row[zabrakov_mat_teamB_comment]'><label>$row[zabrakov_mat_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[zabrakov_mat_teamB_comment]'><label>$row[zabrakov_mat_teamB]</label></td>";
    }*/
    if($row['zabrakov_mat_Sulf'] <= 0)
    {
        echo"<td class='success'  title='$row[zabrakov_mat_Sulf_comment]'><p>$row[zabrakov_mat_Sulf]</p></td>";
    } else {
        echo"<td class='danger' title='$row[zabrakov_mat_Sulf_comment]'><p>$row[zabrakov_mat_Sulf]</p></td>";
    }
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo"     <td colspan='2'>активная вода</td>";
    if($row['kol_zam_upakovka_Sulf'] <= 0)
    {
        echo"<td class='success'  title='$row[kol_zam_upakovka_Sulf_comment]'><p>$row[kol_zam_upakovka_Sulf]</p></td>";
    } else {
        echo"<td class='danger'  title='$row[kol_zam_upakovka_Sulf_comment]'><p>$row[kol_zam_upakovka_Sulf]</p></td>";
    }
    echo" </tr>";
}
}
else
{
    echo" <tr>";
   echo"     <td>брак, t.</td>";
   echo"     <td  class='success'><p>0</p></td>";
   echo"     <td><p></p></td>";
   /*echo"     <td><label></label></td>";*/
   echo"     <td><p></p></td>";
   echo" </tr>";
   echo" <tr>";
   echo"     <td colspan='2'>количество замечаний по хим. составу</td>";
   echo"     <td  class='success'><p>0</p></td>";
   /*echo"     <td  class='success'><label>0</label></td>";*/
   echo"     <td  class='success'><p>0</p></td>";
   echo" </tr>";
   echo" <tr>";
   echo"     <td colspan='2'>количество замечаний по упаковке</td>";
   echo"     <td  class='success'><p>0</p></td>";
   /*echo"     <td  class='success'><label>0</label></td>";*/
   echo" </tr>";
   echo" <tr>";
   echo"     <td colspan='2'>количество претензий</td>";
   echo"     <td  class='success'><p>0</p></td>";
   /*echo"     <td  class='success'><label>0</label></td>";*/
   echo"     <td  class='success'><p>0</p></td>";
   echo" </tr>";
   echo" <tr>";
   echo"     <td colspan='2'>забракованный материал</td>";
   echo"     <td  class='success'><p>0</p></td>";
   /*echo"     <td  class='success'><label>0</label></td>";*/
   echo"     <td  class='success'><p>0</p></td>";
   echo" </tr>";
   echo" <tr>";
   echo"     <td colspan='2'>активная вода</td>";
   echo"     <td  class='success'><p>0</p></td>";
   echo" </tr>";
}
?>