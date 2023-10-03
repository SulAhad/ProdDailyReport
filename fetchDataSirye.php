<?php
require('connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
  header('Location: bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(brak_sms_bilo) AS brak_sms_bilo, 
SUM(brak_sms_prihod) AS brak_sms_prihod, 
SUM(brak_sms_rashod) AS brak_sms_rashod, 
SUM(brak_sms_ostatok) AS brak_sms_ostatok,
SUM(brak_sulf_bilo) AS brak_sulf_bilo,
SUM(brak_sulf_prihod) AS brak_sulf_prihod,
SUM(brak_sulf_rashod) AS brak_sulf_rashod,
SUM(brak_sulf_ostatok) AS brak_sulf_ostatok,
SUM(brak_sulf_rastvor_bilo) AS brak_sulf_rastvor_bilo,
SUM(brak_sulf_rastvor_prihod) AS brak_sulf_rastvor_prihod,
SUM(brak_sulf_rastvor_rashod) AS brak_sulf_rastvor_rashod,
SUM(brak_sulf_rastvor_ostatok) AS brak_sulf_rastvor_ostatok,
SUM(isolator_bilo) AS isolator_bilo, 
SUM(isolator_prihod) AS isolator_prihod, 
SUM(isolator_rashod) AS isolator_rashod, 
SUM(isolator_ostatok) AS isolator_ostatok,
SUM(pil_bilo) AS pil_bilo,
SUM(pil_prihod) AS pil_prihod,
SUM(pil_rashod) AS pil_rashod,
SUM(pil_ostatok) AS pil_ostatok,
SUM(otsev_bilo) AS otsev_bilo,
SUM(otsev_prihod) AS otsev_prihod,
SUM(otsev_rashod) AS otsev_rashod,
SUM(otsev_ostatok) AS otsev_ostatok
    FROM Sirye_KPI 
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
    echo"    <td>брак смс, т</td>"; 
    echo"    <td><p>".number_format($row['brak_sms_bilo'], 2).   "</p></td>";
    echo"    <td><p>".number_format($row['brak_sms_prihod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['brak_sms_rashod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['brak_sms_ostatok'], 2)."</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>брак сульфирование, т</td>";
    echo"    <td><p>".number_format($row['brak_sulf_bilo'], 2).   "</p></td>";
    echo"    <td><p>".number_format($row['brak_sulf_prihod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['brak_sulf_rashod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['brak_sulf_ostatok'], 2)."</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>брак сульфирование (на растворение), т</td>";
    echo"    <td><p>".number_format($row['brak_sulf_rastvor_bilo'], 2).   "</p></td>";
    echo"    <td><p>".number_format($row['brak_sulf_rastvor_prihod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['brak_sulf_rastvor_rashod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['brak_sulf_rastvor_ostatok'], 2)."</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>изолятор, т</td>";
    echo"    <td><p>".number_format($row['isolator_bilo'], 2).   "</p></td>";
    echo"    <td><p>".number_format($row['isolator_prihod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['isolator_rashod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['isolator_ostatok'], 2)."</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>пыль, т</td>";
    echo"    <td><p>".number_format($row['pil_bilo'], 2).   "</p></td>";
    echo"    <td><p>".number_format($row['pil_prihod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['pil_rashod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['pil_ostatok'], 2)."</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>отсев на растворение, т</td>";
    echo"    <td><p>".number_format($row['otsev_bilo'], 2).   "</p></td>";
    echo"    <td><p>".number_format($row['otsev_prihod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['otsev_rashod'], 2). "</p></td>";
    echo"    <td><p>".number_format($row['otsev_ostatok'], 2)."</p></td>";
    echo"</tr>";
}
}
else
{
    echo"<tr>";
    echo"    <td>брак смс, т</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>брак сульфирование, т</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>брак сульфирование (на растворение), т</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>изолятор, т</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>пыль, т</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
    echo"<tr>";
    echo"    <td>отсев на растворение, т</td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"    <td><p>0</p></td>";
    echo"</tr>";
}

?>