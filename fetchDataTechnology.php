<?php
require('connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(Params_limits) AS params_limits, 
SUM(Compositsia) AS compositsia, 
SUM(Compaund) AS compaund, 
SUM(Postdobavki) AS postdobavki,
SUM(Fasovka) AS fasovka,
SUM(Slivnaya) AS slivnaya,
SUM(Uch_sirya) AS uch_sirya,
SUM(Udeln_potr_gaza_teamA) AS udeln_potr_gaza_teamA,
SUM(Udeln_potr_gaza_gotoviy_prod_teamA) AS udeln_potr_gaza_gotoviy_prod_teamA,
SUM(Udeln_potr_gaza_teamB) AS udeln_potr_gaza_teamB,
SUM(Udeln_potr_gaza_gotoviy_prod_teamB) AS udeln_potr_gaza_gotoviy_prod_teamB,
SUM(Udeln_potr_gaza_total) AS udeln_potr_gaza_total,
SUM(Udeln_potr_gaza_gotoviy_prod_total) AS udeln_potr_gaza_gotoviy_prod_total,
GROUP_CONCAT(Params_limits_comment SEPARATOR ', ') AS params_limits_comment,
GROUP_CONCAT(Compositsia_comment SEPARATOR ', ') AS compositsia_comment,
GROUP_CONCAT(Compaund_comment SEPARATOR ', ') AS compaund_comment,
GROUP_CONCAT(Postdobavki_comment SEPARATOR ', ') AS postdobavki_comment,
GROUP_CONCAT(Fasovka_comment SEPARATOR ', ') AS fasovka_comment,
GROUP_CONCAT(Slivnaya_comment SEPARATOR ', ') AS slivnaya_comment,
GROUP_CONCAT(Uch_sirya_comment SEPARATOR ', ') AS uch_sirya_comment,
GROUP_CONCAT(Udeln_potr_gaza_teamA_comment SEPARATOR ', ') AS udeln_potr_gaza_teamA_comment,
GROUP_CONCAT(Udeln_potr_gaza_gotoviy_prod_teamA_comment SEPARATOR ', ') AS udeln_potr_gaza_gotoviy_prod_teamA_comment,
GROUP_CONCAT(Udeln_potr_gaza_teamB_comment SEPARATOR ', ') AS udeln_potr_gaza_teamB_comment,
GROUP_CONCAT(Udeln_potr_gaza_gotoviy_prod_teamB_comment SEPARATOR ', ') AS udeln_potr_gaza_gotoviy_prod_teamB_comment,
GROUP_CONCAT(Udeln_potr_gaza_total_comment SEPARATOR ', ') AS udeln_potr_gaza_total_comment,
GROUP_CONCAT(Udeln_potr_gaza_gotoviy_prod_total_comment SEPARATOR ', ') AS udeln_potr_gaza_gotoviy_prod_total_comment
    FROM Technology_KPI 
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
    echo"    <td>кол-во парам.не в лимитах</td>";
    if($row['params_limits'] <= 0)
    {
        echo"<td class='success' title='$row[params_limits_comment]'><label>$row[params_limits]</label></td>";
    } else {
        echo"<td class='danger' title='$row[params_limits_comment]'><label>$row[params_limits]</label></td>";
    }
    echo"    <td><label></label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>композиция</td>";
    if($row['compositsia'] <= 0)
    {
        echo"<td class='success' title='$row[compositsia_comment]'><label>$row[compositsia]</label></td>";
    } else {
        echo"<td class='danger' title='$row[compositsia_comment]'><label>$row[compositsia]</label></td>";
    }
    echo"    <td><label></label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>компаунд</td>";
    if($row['compaund'] <= 0)
    {
        echo"<td class='success' title='$row[compaund_comment]'><label>$row[compaund]</label></td>";
    } else {
        echo"<td class='danger' title='$row[compaund_comment]'><label>$row[compaund]</label></td>";
    }
    echo"    <td><label></label></td>";
   /* echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>постдобавки</td>";
    if($row['postdobavki'] <= 0)
    {
        echo"<td class='success' title='$row[postdobavki_comment]'><label>$row[postdobavki]</label></td>";
    } else {
        echo"<td class='danger' title='$row[postdobavki_comment]'><label>$row[postdobavki]</label></td>";
    }
    echo"    <td><label></label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>фасовка</td>";
    if($row['fasovka'] <= 0)
    {
        echo"<td class='success' title='$row[fasovka_comment]'><label>$row[fasovka]</label></td>";
    } else {
        echo"<td class='danger' title='$row[fasovka_comment]'><label>$row[fasovka]</label></td>";
    }
    echo"    <td><label></label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>сливная станция</td>";
    if($row['slivnaya'] <= 0)
    {
        echo"<td class='success' title='$row[slivnaya_comment]'><label>$row[slivnaya]</label></td>";
    } else {
        echo"<td class='danger' title='$row[slivnaya_comment]'><label>$row[slivnaya]</label></td>";
    }
    echo"    <td><label></label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>участок сырья</td>";
    if($row['uch_sirya'] <= 0)
    {
        echo"<td class='success' title='$row[uch_sirya_comment]'><label>$row[uch_sirya]</label></td>";
    } else {
        echo"<td class='danger' title='$row[uch_sirya_comment]'><label>$row[uch_sirya]</label></td>";
    }
    echo"    <td><label></label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td><p></p></td>";
    echo"    <td><p>CMC</p></td>";
    /*echo"    <td><label>СМЕНА-Б</label></td>";*/
    echo"    <td><p>ОБЩЕЕ</p></td>";
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>удельное потребление газа на башенный продукт</td>";
    if($row['udeln_potr_gaza_teamA'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_teamA_comment]'><label>$row[udeln_potr_gaza_teamA]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_teamA_comment]'><label>$row[udeln_potr_gaza_teamA]</label></td>";
    }
    /*if($row['udeln_potr_gaza_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_teamB_comment]'><label>$row[udeln_potr_gaza_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_teamB_comment]'><label>$row[udeln_potr_gaza_teamB]</label></td>";
    }*/
    if($row['udeln_potr_gaza_total'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_total_comment]'><label>$row[udeln_potr_gaza_total]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_total_comment]'><label>$row[udeln_potr_gaza_total]</label></td>";
    }
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>удельное потребление газа на готовый продукт</td>";
    if($row['udeln_potr_gaza_gotoviy_prod_teamA'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_gotoviy_prod_teamA_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_teamA]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_gotoviy_prod_teamA_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_teamA]</label></td>";
    }
    /*if($row['udeln_potr_gaza_gotoviy_prod_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_gotoviy_prod_teamB_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_gotoviy_prod_teamB_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_teamB]</label></td>";
    }*/
    if($row['udeln_potr_gaza_gotoviy_prod_total'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_gotoviy_prod_total_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_total]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_gotoviy_prod_total_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_total]</label></td>";
    }
    echo"</tr>";
}
}
else
{
    echo"<tr>";
    echo"    <td>кол-во парам.не в лимитах</td>";
    echo"    <td class='success'><label>0</label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"    <td><p></p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>композиция</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td><p></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr>";
    echo"    <td>компаунд</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td><p></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr>";
    echo"    <td>постдобавки</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td><p></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr>";
    echo"    <td>фасовка</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td><p></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr>";
    echo"    <td>сливная станция</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td><p></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr>";
    echo"    <td>участок сырья</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td><p></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr>";
    echo"    <td><p></p></td>";
    echo"    <td><p>СМС</p></td>";
    /*echo"    <td><label>СМЕНА-Б</label></td>";*/
    echo"    <td><p>ОБЩЕЕ</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>удельное потребление газа на башенный продукт</td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>удельное потребление газа на готовый продукт</td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
}
?>