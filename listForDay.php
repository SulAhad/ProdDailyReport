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
                    <div class="table-responsive">Потраченное время за текущий день 
                        <table class="table-hover table-bordered table table-sm ">
                            <thead>
                                <th>название</th>
                                <th>время</th>
                            </thead>
                            </tbody>
                                <?php
                                    $date = date("Y-m-d");
                                    $message = "SELECT name, CONCAT(FLOOR(SUM(time) / 60), ' ч ', SUM(time) % 60, ' мин') as total_time
                                    FROM myCalendar
                                    WHERE DATE(date) = '$date'
                                    GROUP BY name ORDER BY total_time DESC";
                                    $link->set_charset("utf8");
                                    $result =  mysqli_query( $link,  $message);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[name]</td>";
                                        
                                            echo"<td>$row[total_time]</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm">
                   <?php
                    $date = date("Y-m-d");
                    function getRandomColor() {
                        $letters = '0123456789ABCDEF';
                        $color = '#';
                        for ($i = 0; $i < 6; $i++) {
                            $color .= $letters[rand(0, 15)];
                        }
                        return $color;
                    }
                    $message = "SELECT name, SUM(time) AS total_time
                                FROM myCalendar
                                WHERE DATE(date) = '$date'
                                GROUP BY name ORDER BY total_time DESC";
                    $link->set_charset("utf8");
                    $results = mysqli_query($link, $message); 
                    $rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
                    // Создаем массивы для меток, данных и цветов
                    $labels = array();
                    $data = array();
                    $colors = array();
                    // Обрабатываем результаты запроса и заполняем массивы
                    foreach ($rows as $row) {
                        array_push($labels, $row["name"]);
                        array_push($data, $row["total_time"]);
                        array_push($colors, getRandomColor());
                    }
                ?>
                <script>
                    var labels = <?php echo json_encode($labels); ?>;
                    var data = <?php echo json_encode($data); ?>;
                    var colors = <?php echo json_encode($colors); ?>;
                </script>
                <canvas id="myChart"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Потраченное время за текущий день ',
                                data: data,
                                backgroundColor: colors,
                                borderColor: 'rgb(0, 0, 0)',
                                fill: false
                            }]
                        },
                        options: {}
                    });
                </script>
                </fieldset>
            </div>
        </div>
    </body>
</html>
