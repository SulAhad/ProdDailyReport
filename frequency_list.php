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
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div data-bs-interval="9999999" class="carousel-item">
                            <fieldset class="form-group border p-1 m-1 card shadow-sm">
                            <div class="table-responsive">Заявки по дням недели
                                <table class="table-hover table-bordered table table-sm ">
                                    <thead>
                                        <th style='width:20%;'>название</th>
                                        <th style=''>Июнь</p></th>
                                    </thead>
                                    </tbody>
                                        <?php
                                            $message = "SELECT CASE 
                                                    WHEN DAYNAME(date) = 'Monday' THEN 'Понедельник'
                                                    WHEN DAYNAME(date) = 'Tuesday' THEN 'Вторник'
                                                    WHEN DAYNAME(date) = 'Wednesday' THEN 'Среда'
                                                    WHEN DAYNAME(date) = 'Thursday' THEN 'Четверг'
                                                    WHEN DAYNAME(date) = 'Friday' THEN 'Пятница'
                                                    WHEN DAYNAME(date) = 'Saturday' THEN 'Суббота'
                                                    WHEN DAYNAME(date) = 'Sunday' THEN 'Воскресенье'
                                                END AS day_of_week, GROUP_CONCAT(DISTINCT name ORDER BY name SEPARATOR ', ') AS name
                                            FROM `myCalendar` WHERE MONTH(date) = 6
                                            GROUP BY FIELD(day_of_week, 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье')"; 
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {echo"<tr>";
                                                echo"<td style='height:90px;'>$row[day_of_week]</td>";
                                                echo"<td>$row[name]</td>";
                                            echo"</tr>";}?>
                                    </tbody>
                                </table>
                            </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item active">
                            <fieldset class="form-group border p-1 m-1 card shadow-sm">
                            <div class="table-responsive">Заявки по дням недели
                                <table class="table-hover table-bordered table table-sm ">
                                    <thead>
                                        <th style='width:20%;'>название</th>
                                        <th style=''>Июль</p></th>
                                    </thead>
                                    </tbody>
                                        <?php
                                            $message = "SELECT CASE 
                                                    WHEN DAYNAME(date) = 'Monday' THEN 'Понедельник'
                                                    WHEN DAYNAME(date) = 'Tuesday' THEN 'Вторник'
                                                    WHEN DAYNAME(date) = 'Wednesday' THEN 'Среда'
                                                    WHEN DAYNAME(date) = 'Thursday' THEN 'Четверг'
                                                    WHEN DAYNAME(date) = 'Friday' THEN 'Пятница'
                                                    WHEN DAYNAME(date) = 'Saturday' THEN 'Суббота'
                                                    WHEN DAYNAME(date) = 'Sunday' THEN 'Воскресенье'
                                                END AS day_of_week, GROUP_CONCAT(DISTINCT name ORDER BY name SEPARATOR ', ') AS name
                                            FROM `myCalendar` WHERE MONTH(date) = 7
                                            GROUP BY FIELD(day_of_week, 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье')"; 
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {echo"<tr>";
                                                echo"<td style='height:90px;'>$row[day_of_week]</td>";
                                                echo"<td>$row[name]</td>";
                                            echo"</tr>";}?>
                                    </tbody>
                                </table>
                            </div>
                </fieldset>
                        </div>
                    </div>
                    <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-prev" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-next" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
                <fieldset class="form-group border p-1 m-1 card shadow-sm">
                    <div class="table-responsive">Сколько дней назад произошла эта заявка
                        <table class="table-hover table-bordered table table-sm ">
                            <thead>
                                <th>название</th>
                                <th>Сколько дней назад произошла эта заявка</th>
                            </thead>
                            </tbody>
                                <?php
                                    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
                                    $message = "SELECT name, DATEDIFF(NOW(), MAX(date)) AS days_since_last_record FROM `myCalendar` GROUP BY name ORDER BY days_since_last_record desc";
                                    $link->set_charset("utf8");
                                    $result =  mysqli_query( $link,  $message);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[name]</td>";
                                            echo"<td>$row[days_since_last_record]</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </body>
</html>
