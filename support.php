<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">  
    <head><?php require('head.php');?></head> 
 
    <body class="container-fluid">
        <fieldset class="form-group border card shadow-sm">
            <?php
                $message = "SELECT COUNT(*) AS visits_count, SUM(CASE WHEN referrer = 'ip_false' THEN 1 ELSE 0 END) AS ip_false_count FROM visitorsKPI WHERE DATE(timeEnter) = CURDATE()";
                $reserve->set_charset("utf8");
                $result = mysqli_query($reserve, $message);
                while ($row = mysqli_fetch_assoc($result))
                    {   
                        echo "Количество посещений за сегодня: $row[visits_count]<br>";
                        echo "Количество заблокированных посещений за сегодня: $row[ip_false_count]";
                    }
            ?>
            <div class="table-responsive">
                <table id="myTable" class="table-hover table-bordered table table-sm ">
                    <thead class="text-light" style="background:darkgray; position: sticky; top:0px;">
                        <tr>
                            <th style="width:auto;">№</th>
                            <th style="width:auto;">ip_address</th>
                            <th style="width:auto;">browser</th>
                            <th style="width:auto;">timeEnter</th>
                            <th style="width:auto;">referrer</th>
                            <th style="width:auto;">language</th>
                            <th style="width:auto;">full</th>
                        </tr>
                    </thead>
                    <tbody onload="myFunction()" class="animate-bottom">
                    <?php
                        $message = "SELECT * FROM visitorsKPI ORDER BY id DESC";
                        $reserve->set_charset("utf8");
                        $result = mysqli_query($reserve, $message);
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            if ($row['referrer'] == 'ip_false') 
                            {
                                echo "<tr style='background:LightSalmon; font-size:12px;'>";
                                echo "<td>$row[id]</td>";
                                echo "<td>$row[ip_address]</td>";
                                echo "<td>$row[browser]</td>";
                                echo "<td>$row[timeEnter]</td>";
                                echo "<td>$row[referrer]</td>";
                                echo "<td>$row[language]</td>";
                                echo "<td>$row[latitude]</td>";
                                echo "</tr>";
                            } 
                            else if($row['referrer'] == 'pass_false/trying to pass')
                            {
                                echo "<tr style='background:Gold; font-size:12px;'>";
                                echo "<td>$row[id]</td>";
                                echo "<td>$row[ip_address]</td>";
                                echo "<td>$row[browser]</td>";
                                echo "<td>$row[timeEnter]</td>";
                                echo "<td>$row[referrer]</td>";
                                echo "<td>$row[language]</td>";
                                echo "<td>$row[latitude]</td>";
                                echo "</tr>";
                            }
                            else 
                            {
                                echo "<tr style='background:#A0DB8E; font-size:12px;'>";
                                echo "<td>$row[id]</td>";
                                echo "<td>$row[ip_address]</td>";
                                echo "<td>$row[browser]</td>";
                                echo "<td>$row[timeEnter]</td>";
                                echo "<td>$row[referrer]</td>";
                                echo "<td>$row[language]</td>";
                                echo "<td>$row[latitude]</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
        
    </body>
    <div id="loader-overlayX">
        <div id="loaderX"></div>
    </div>
    <?php require('arrowForUp.php') ?>
</html>