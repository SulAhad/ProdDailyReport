<?php require('connect_db.php'); 
    if(isset($_SESSION['login']) == "")
    {header('Location: bridge.php');}
    $a = $_SESSION['login'];
?>
<html>  
    <head class=""><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    <body class="bg-secondary container">
        <?php
            require('mySidebar.php');
            echo"<button class='bg-secondary openbtn' onclick='openNav()'>☰ </button>";
        ?>
        <div class="row bg-secondary">
            <div class="col-md-12">
                 <fieldset class="form-group border p-1 m-1 card shadow-sm">
                    <div class="table-responsive">Расходы по дням недели
                        <table class="table-hover table-bordered table table-sm ">
                            <thead>
                                
                            </thead>
                            </tbody>
                                <?php
                                    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
                                    $message = "SELECT DATE_FORMAT(date, '%Y-%m-%d') AS date_formatted, 
                                    CASE 
                                            WHEN DAYNAME(date) = 'Monday' THEN 'Понедельник'
                                            WHEN DAYNAME(date) = 'Tuesday' THEN 'Вторник'
                                            WHEN DAYNAME(date) = 'Wednesday' THEN 'Среда'
                                            WHEN DAYNAME(date) = 'Thursday' THEN 'Четверг'
                                            WHEN DAYNAME(date) = 'Friday' THEN 'Пятница'
                                            WHEN DAYNAME(date) = 'Saturday' THEN 'Суббота'
                                            WHEN DAYNAME(date) = 'Sunday' THEN 'Воскресенье'
                                        END AS day_of_week,
                                        
                                    GROUP_CONCAT(DISTINCT name ORDER BY name SEPARATOR ', ') AS name
                                        
                                        FROM Paids
                                        GROUP BY FIELD(day_of_week, 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'),
                                        date_formatted, day_of_week
                                        ORDER BY date_formatted, day_of_week"; 
                                    $link->set_charset("utf8");
                                    $result =  mysqli_query( $link,  $message);
                                    // Создание календаря
$month = date("m");
$year = date("Y");
$current_date = date("Y-m-d"); // текущая дата
$calendar = "<table class='border table table-bordered'>";
$calendar .= "<tr>
                <th>Пн</th>
                <th>Вт</th>
                <th>Ср</th>
                <th>Чт</th>
                <th>Пт</th>
                <th>Сб</th>
                <th>Вс</th>
              </tr>";

// Определение первого дня месяца
$first_day = mktime(0,0,0,$month, 1, $year);

// Определение количества дней в месяце
$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Определение дня недели первого дня месяца
$day_of_week = date("D", $first_day);

// Определение номера дня недели первого дня месяца
switch($day_of_week){
    case "Mon": $blank = 0; break;
    case "Tue": $blank = 1; break;
    case "Wed": $blank = 2; break;
    case "Thu": $blank = 3; break;
    case "Fri": $blank = 4; break;
    case "Sat": $blank = 5; break;
    case "Sun": $blank = 6; break;
}

// Отображение пустых ячеек в календаре до первого дня месяца
$day_count = 1;
while ($blank > 0) 
{
    $calendar .= "<td></td>";
    $blank = $blank-1;
    $day_count++;
}

// Отображение дней месяца в календаре
$day_num = 1;
while ($day_num <= $days_in_month) 
{
    // Получение данных из базы данных для текущего дня
    $sql_day = "SELECT GROUP_CONCAT(DISTINCT name ORDER BY name SEPARATOR ', ') AS name FROM Paids WHERE month = '01'";
    $result_day = $link->query($sql_day);
    $data_day = "";
    
    if ($result_day->num_rows > 0) 
    {
        while($row_day = $result_day->fetch_assoc()) 
        {
            $data_day .= "<br>".$row_day["name"];
            
        }
    }

    // Отображение дня месяца в календаре
    if ($day_count % 7 == 0) 
    {
        $calendar .= "<td class='weekend'>".$day_num.$data_day."</td>";
    }
    elseif ($day_num == date("d") && $month == date("m")) 
    {
        $calendar .= "<td class='today'>".$day_num.$data_day."</td>";
    }
    else 
    {
        $calendar .= "<td>".$day_num.$data_day."</td>";
    }

    $day_num++;
    $day_count++;

    // Переход на новую строку в календаре после каждой недели
    if ($day_count % 7 == 1) 
    {
        $calendar .= "</tr><tr>";
    }
}

// Отображение пустых ячеек в календаре после последнего дня месяца
while ($day_count % 7 != 1) 
{
    $calendar .= "<td></td>";
    $day_count++;
}

$calendar .= "</tr></table>";

echo $calendar;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        
        </div>
    </body>
</html>
