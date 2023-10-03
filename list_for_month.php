<?php require('connect_db.php'); 
    if(isset($_SESSION['login']) == "")
    {header('Location: bridge.php');}
    $a = $_SESSION['login'];
?>
<html>  
    <head class=""><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    <body  style="background-color: #1C2021;" class="container">
        <?php
            require('mySidebar.php');
            echo"<button class='bg-secondary openbtn' onclick='openNav()'>☰ </button>";
        ?>
        <style>
            .dark_color {
                  background-color: #1C2021;
                  color: #C9C8B3;
                  border-color: #8E9E93;
                }
        </style>
        <div style="background-color: #1C2021;">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div data-bs-interval="9999999" class="carousel-item">
                        <div class="col-md-12">
                        <fieldset class="form-group border p-1 m-1 shadow-sm">
                            <div class="dark_color  table-responsive">
                                <table class="dark_color table-bordered table table-sm ">
                                    <thead>
                                        <th>Список наименований заявок за ИЮНЬ</th>
                                    </thead>
                                    </tbody>
                                        <?php
                                            $message = "SELECT GROUP_CONCAT(DISTINCT name SEPARATOR ', ') AS name FROM myCalendar WHERE MONTH(date) = '6'";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo"<tr>";
                                                echo"<td>$row[name]</td>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="dark_color table-responsive">Сколько раз было использовано за ИЮНЬ 
                                <table class="dark_color table-bordered table table-sm ">
                                    <thead>
                                        <th>название</th>
                                        <th>частота использования за месяц</th>
                                    </thead>
                                    </tbody>
                                        <?php
                                            $message = "SELECT name, COUNT(*) as count
                                            FROM myCalendar
                                            WHERE MONTH(date) = 6
                                            GROUP BY name
                                            ORDER BY count DESC";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo"<tr>";
                                                echo"<td>$row[name]</td>";
                                                echo"<td>$row[count]</td>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    </div>
                    <div data-bs-interval="9999999" class="carousel-item active">
                        <div class="col-md-12">
                        <fieldset class="form-group border p-1 m-1  shadow-sm">
                            <div class="dark_color table-responsive">
                                <table class="dark_color table-bordered table table-sm ">
                                    <thead>
                                        <th>Список наименований заявок за ИЮЛЬ</th>
                                    </thead>
                                    </tbody>
                                        <?php
                                            $message = "SELECT GROUP_CONCAT(DISTINCT name SEPARATOR ', ') AS name FROM myCalendar WHERE MONTH(date) = '7'";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo"<tr>";
                                                echo"<td>$row[name]</td>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="dark_color table-responsive">Сколько раз было использовано за ИЮЛЬ 
                                <table class="dark_color table table-sm " style="border: none;">
                                    <thead>
                                        <th style='color: #B44141'>название</th>
                                        <th style='color: #B44141'>частота использования за месяц</th>
                                        <th style='color: #B44141'>затраченное время за месяц</th>
                                    </thead>
                                    </tbody>
                                        <?php
                                            $message = "SELECT name, COUNT(*) as count, CONCAT(FLOOR(SUM(time) / 60), ' ч ', SUM(time) % 60, ' мин') as total_time
                                            FROM myCalendar
                                            WHERE MONTH(date) = 7
                                            GROUP BY name
                                            ORDER BY count DESC";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo"<tr>";
                                                echo"<td style='color: #678479; border: none;'>$row[name]</td>";
                                                echo"<td style='color: #B98383; border: none;'>$row[count]</td>";
                                                echo"<td style='color: #9D9E52; border: none;'>$row[total_time]</td>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
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
        </div>
    </body>
</html>
