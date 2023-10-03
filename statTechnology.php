<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head class=""><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    <style>
        .danger{
            background:lightCoral;
        }
        .success{
            background:lightGreen;
        }
    </style>
    <body class="container">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE proizvidit_bashni > 0 GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div data-bs-interval="9999999" class="carousel-item">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Январь</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 01 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni01"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni01').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 01 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Февраль</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 02 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni02"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni02').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 02 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Март</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 03 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni03"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni03').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 03 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Апрель</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 04 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni04"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni04').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 04 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Май</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 05 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni05"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni05').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 05 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Июнь</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 06 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni06"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni06').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 06 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Июль</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 07 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni07"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni07').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 07 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Август</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 08 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni08"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni08').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 08 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item active">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Сентябрь</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 09 AND proizvidit_bashni > 0 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni09"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni09').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 09 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            if($row['total_requests'] <= 12)
                                            {
                                                echo "<td style='background:lightCoral;'>" . round($row['total_requests'], 2) . "</td>";
                                            }
                                            else
                                            {
                                                echo "<td style='background:lightgreen;'>" . round($row['total_requests'], 2) . "</td>";
                                            }
                                            
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Октябрь</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 10 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni10"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni10').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 10 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Ноябрь</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 11 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni11"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni11').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 11 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item ">
                            <fieldset class="form-group border p-1 m-1 bg-light card shadow-sm "><p>Декабрь</p>
                            <?php
                                $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                            FROM Technology_KPI WHERE MONTH(date) = 12 GROUP BY day";
                                $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var target = Array(data.length).fill(12);
                        </script>
                        <canvas id="myChartproizvidit_bashni12"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartproizvidit_bashni12').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Производительность башни, тонн/час',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                },
                                {
                                    label: 'цель',
                                    data: target,
                                    type: 'line',
                                    backgroundColor:'rgb(255, 0, 0)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    fill: false
                              
                                }]
                              },
                              options: {}
                            });
                        </script>
                    <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>дата</th>
                                    <th>значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT DATE(date) AS day, SUM(proizvidit_bashni) AS total_requests 
                                    FROM Technology_KPI WHERE MONTH(date) = 12 GROUP BY day";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[day]</td>";
                                            echo "<td>" . round($row['total_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
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
                <div class="col-md-12">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <div style="height:500px;"  class="table-responsive">
                        <table class="table-hover table-bordered table table table-sm">
                            <thead class="text-light bg-secondary" style="position: sticky; top:0px;">
                                <tr>
                                    <th>Месяц</th>
                                    <th>Среднее значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $message = "SELECT CASE
                                        WHEN MONTH(date) = 1 THEN 'январь'
                                        WHEN MONTH(date) = 2 THEN 'февраль'
                                        WHEN MONTH(date) = 3 THEN 'март'
                                        WHEN MONTH(date) = 4 THEN 'апрель'
                                        WHEN MONTH(date) = 5 THEN 'май'
                                        WHEN MONTH(date) = 6 THEN 'июнь'
                                        WHEN MONTH(date) = 7 THEN 'июль'
                                        WHEN MONTH(date) = 8 THEN 'август'
                                        WHEN MONTH(date) = 9 THEN 'сентябрь'
                                        WHEN MONTH(date) = 10 THEN 'октябрь'
                                        WHEN MONTH(date) = 11 THEN 'ноябрь'
                                        WHEN MONTH(date) = 12 THEN 'декабрь'
                                    END AS month, AVG(proizvidit_bashni) AS average_requests 
                                    FROM Technology_KPI 
                                    GROUP BY month
                                    ORDER BY MONTH(date)";
                                    $link->set_charset("utf8");
                                    $results  =  mysqli_query( $link,  $message ); 
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        echo"<tr>";
                                            echo"<td>$row[month]</td>";
                                            echo "<td>" . round($row['average_requests'], 2) . "</td>";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </fieldset>
            </div>
        </div>
        <div class="row bg-light mt-4 card shadow-sm">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Params_limits) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartParams_limits"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartParams_limits').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество параметров не в лимитах',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Compositsia) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartCompositsia"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartCompositsia').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Композиция',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Compaund) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartCompaund"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartCompaund').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Компаунд',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Postdobavki) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartPostdobavki"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartPostdobavki').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Постдобавки',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Fasovka) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartFasovka"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartFasovka').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Фасовка',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
                    <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Slivnaya) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartSlivnaya"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartSlivnaya').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Сливная',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
                </div>
            </div>
                        <div class="col-md-6">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Uch_sirya) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUch_sirya"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUch_sirya').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Участок сырья',
                                  data: data,
                                  backgroundColor:'rgb(255, 0, 0)',
                                  borderColor: 'rgb(255, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
            </div>
            
            
            

        </div>
        <div class="row bg-light card shadow-sm mt-4">
            <div class="col-md-12">
            <p>TEAM A</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_teamA) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_gotoviy_prod_teamA) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_gotoviy_prod_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_gotoviy_prod_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа на готовый продукт',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light card shadow-sm mt-4">
            <div class="col-md-12">
            <p>TEAM B</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_teamB) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_gotoviy_prod_teamB) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_gotoviy_prod_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_gotoviy_prod_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа на котовый продукт',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light card shadow-sm mt-4 mb-4">
            <div class="col-md-12">
            <p>Сульфирование</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_total) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_total"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_total').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа, общее',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Udeln_potr_gaza_gotoviy_prod_total) AS total_requests 
                            FROM Technology_KPI GROUP BY day";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            $row = mysqli_fetch_assoc($result);
                            // Создаем массивы для меток и данных
                            $labels = array();
                            $data = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                array_push($labels, $row["day"]);
                                array_push($data, $row["total_requests"]);
                              }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                        </script>
                        <canvas id="myChartUdeln_potr_gaza_gotoviy_prod_total"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartUdeln_potr_gaza_gotoviy_prod_total').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Удельное потребление газа на готовый продукт, общее',
                                  data: data,
                                  backgroundColor:'rgb(0, 255, 127)',
                                  borderColor: 'rgb(0, 128, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>
