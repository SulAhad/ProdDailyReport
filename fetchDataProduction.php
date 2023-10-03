<?php
require('connect_db.php');
$oee = '95.99';
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(plan) AS plan, 
SUM(fact) AS fact, 
SUM(plan_teamA) AS plan_teamA, 
SUM(fact_teamA) AS fact_teamA,
SUM(plan_teamB) AS plan_teamB,
SUM(fact_teamB) AS fact_teamB,
SUM(plan_total) AS plan_total,
SUM(fact_total) AS fact_total,
SUM(deviation) AS deviation,
SUM(OEE_teamA) AS OEE_teamA, 
SUM(innotech1_teamA) AS innotech1_teamA,
SUM(innotech2_teamA) AS innotech2_teamA,
SUM(innotech3_teamA) AS innotech3_teamA,
SUM(uva4_teamA) AS uva4_teamA,
SUM(uva5_teamA) AS uva5_teamA,
SUM(acma_teamA) AS acma_teamA,
SUM(oee_teamB) AS oee_teamB, 
SUM(innotech1_teamB) AS innotech1_teamB,
SUM(innotech2_teamB) AS innotech2_teamB,
SUM(innotech3_teamB) AS innotech3_teamB,
SUM(uva4_teamB) AS uva4_teamB,
SUM(uva5_teamB) AS uva5_teamB,
SUM(acma_teamB) AS acma_teamB,
SUM(oee_total) AS oee_total,
GROUP_CONCAT(comment SEPARATOR ', ') AS comment
    FROM Production_KPI 
WHERE DATE(date) = '$date'
GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td>план</td>";
    echo"    <td><p>".number_format($row['plan'], 2)."</p></td>";
    echo"    <td><p>".number_format($row['plan_teamA'], 2)."</p></td>";
    /*echo"    <td><p>".number_format($row['plan_teamB'], 2)."</p></td>";*/
    echo"    <td><p>".number_format($row['plan_total'], 2)."</p></td>";
    if($row['deviation'] >= 0)
        {
            echo"<td class='success' rowspan='2'><p>".number_format($row['deviation'], 2)."</p></td>";
        } else {
            echo"<td class='danger' rowspan='2'><p>".number_format($row['deviation'], 2)."</p></td>";
        }
    echo"</tr>";
   /* _____________________________________________________________________________________________________________________________________*/
    echo "<tr>";
    echo "    <td>факт</td>";
    if($row['plan'] < $row['fact'])
        {
            echo"<td class='success'><p>".number_format($row['fact'], 2)."</p></td>";
        } else {
            echo"<td class='danger'><p>".number_format($row['fact'], 2)."</p></td>";
        }
    if($row['plan_teamA'] < $row['fact_teamA'])
        {
            echo"<td class='success'><p>".number_format($row['fact_teamA'], 2)."</p></td>";
        } else {
            echo"<td class='danger'><p>".number_format($row['fact_teamA'], 2)."</p></td>";
        }
    /*if($row['plan_teamB'] == 0 && $row['fact_teamB'] == 0)
        {
            echo"<td class='success'><p>".number_format($row['fact_teamB'], 2)."</p></td>";
        }
        elseif($row['plan_teamB'] < $row['fact_teamB'])
        {
            echo"<td class='success'><p>".number_format($row['fact_teamB'], 2)."</p></td>";
        } else {
            echo"<td class='danger'><p>".number_format($row['fact_teamB'], 2)."</p></td>";
        }*/
    if($row['plan_total'] == 0 && $row['fact_total'] == 0)
        {
            echo"<td class='success'><p>".number_format($row['fact_total'], 2)."</p></td>";
        }
        elseif($row['plan_total'] < $row['fact_total'])
        {
            echo"<td class='success'><p>".number_format($row['fact_total'], 2)."</p></td>";
        } else {
            echo"<td class='danger'><p>".number_format($row['fact_total'], 2)."</p></td>";
        }
    echo "</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td colspan='5' style='text-align:right;'><p>ОБЩЕЕ</p></td";
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>OEE</p></td>";
    if($row['OEE_teamA'] >= $oee || $row['OEE_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['OEE_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['OEE_teamA'], 2). "%"."</p></td>";
    }
    echo "<td class='success'><p>".number_format($row['oee_teamB'], 2). "%"."</p></td>";
    /*if($row['oee_teamB'] >= $oee)
    {
        echo "<td style='background:lime;'><label>".number_format($row['oee_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['oee_teamB'], 2)."</label></td>";
    }*/
    /*echo"    <td><p></p></td>";*/
    if($row['oee_total'] >= $oee || $row['oee_total'] == 0)
    {
        echo "<td class='success' title='$row[comment]'><p>".number_format($row['oee_total'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger' title='$row[comment]'><p>".number_format($row['oee_total'], 2). "%"."</p></td>";
    }
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>иннотех 1</p></td>";
    if($row['innotech1_teamA'] >= $oee || $row['innotech1_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['innotech1_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['innotech1_teamA'], 2). "%"."</p></td>";
    }
   /* echo "<td class='success'><p>".number_format($row['innotech1_teamB'], 2)."</p></td>";*/
    /*if($row['innotech1_teamB'] >= $oee )
    {
        echo "<td style='background:lime;'><label>".number_format($row['innotech1_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['innotech1_teamB'], 2)."</label></td>";
    }*/
    echo"    <td colspan='2' rowspan='6'>$row[comment]</td>";
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>иннотех 2</p></td>";
    if($row['innotech2_teamA'] >= $oee || $row['innotech2_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['innotech2_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['innotech2_teamA'], 2). "%"."</p></td>";
    }
   /* echo "<td class='success'><p>".number_format($row['innotech2_teamB'], 2)."</p></td>";*/
    /*if($row['innotech2_teamB'] >= $oee)
    {
        echo "<td style='background:lime;'><label>".number_format($row['innotech2_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['innotech2_teamB'], 2)."</label></td>";
    }*/
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>иннотех 3</p></td>";
    if($row['innotech3_teamA'] >= $oee || $row['innotech3_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['innotech3_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['innotech3_teamA'], 2). "%"."</p></td>";
    }
   /* echo "<td class='success'><p>".number_format($row['innotech3_teamB'], 2)."</p></td>";*/
    /*if($row['innotech3_teamB'] >= $oee )
    {
        echo "<td style='background:lime;'><label>".number_format($row['innotech3_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['innotech3_teamB'], 2)."</label></td>";
    }*/
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>uva 4</p></td>";
    if($row['uva4_teamA'] >= $oee || $row['uva4_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['uva4_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['uva4_teamA'], 2). "%"."</p></td>";
    }
    /*echo "<td class='success'><p>".number_format($row['uva4_teamB'], 2)."</p></td>";*/
    /*if($row['uva4_teamB'] >= $oee)
    {
        echo "<td style='background:lime;'><label>".number_format($row['uva4_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['uva4_teamB'], 2)."</label></td>";
    }*/
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>uva 5</p></td>";
    if($row['uva5_teamA'] >= $oee || $row['uva5_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['uva5_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['uva5_teamA'], 2). "%"."</p></td>";
    }
   /* echo "<td class='success'><p>".number_format($row['uva5_teamB'], 2)."</p></td>";*/
    /*if($row['uva5_teamB'] >= $oee)
    {
        echo "<td style='background:lime;'><label>".number_format($row['uva5_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['uva5_teamB'], 2)."</label></td>";
    }*/
    echo"</tr>";
    /* _____________________________________________________________________________________________________________________________________*/
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>акма</p></td>";
    if($row['acma_teamA'] >= $oee || $row['acma_teamA'] == 0)
    {
        echo "<td class='success'><p>".number_format($row['acma_teamA'], 2). "%"."</p></td>";
    } else {
        echo "<td class='danger'><p>".number_format($row['acma_teamA'], 2). "%"."</p></td>";
    }
    /*echo "<td class='success'><p>".number_format($row['acma_teamB'], 2)."</p></td>";*/
    /*if($row['acma_teamB'] >= $oee)
    {
        echo "<td style='background:lime;'><label>".number_format($row['acma_teamB'], 2)."</label></td>";
    } else {
        echo "<td style='background:red;'><label>".number_format($row['acma_teamB'], 2)."</label></td>";
    }*/
    echo"</tr>";
}
}
else
{
    echo"<tr>";
    echo"    <td>план</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td class='success' rowspan=''><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>факт</td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td colspan='5' style='text-align:right;'><p>ОБЩЕЕ</p></td";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>OEE</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td class='success'><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>иннотех 1</p></td>";
    echo"    <td class='success'><p>0</p></td>";
    /*echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td><p></p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>иннотех 2</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td><p></p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>иннотех 3</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td><p></p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>uva 4</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td><p></p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>uva 5</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td><p></p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td></td>";
    echo"    <td><p>акма</p></td>";
    echo"    <td class='success'><p>0</p></td>";
   /* echo"    <td class='success'><p>0</p></td>";*/
    echo"    <td><p></p></td>";
    echo"    <td><p></p></td>";
    echo"</tr>";
}
?>