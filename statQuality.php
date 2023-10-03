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
    <body class="container">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                    $message = "SELECT BrakQuality_comment, DATE(date) AS day, SUM(BrakQuality) AS total_requests 
                                FROM Quality_KPI GROUP BY day";
                    $link->set_charset("utf8");
                    $result =  mysqli_query($link, $message);
                    
                    // Создаем массивы для меток и данных
                    $labels = array();
                    $data = array();
                    
                    // Обрабатываем результаты запроса и заполняем массивы
                    while($row = mysqli_fetch_assoc($result)) {
                        array_push($labels, $row["day"]);
                        array_push($data, $row["total_requests"]);
                        $labelFromDB = $row["BrakQuality_comment"];
                    }
                    
                    ?>
                    
                    <script>
                        var labels = <?php echo json_encode($labels); ?>;
                        var data = <?php echo json_encode($data); ?>;
                        var labelFromDB = <?php echo json_encode($labelFromDB); ?>;
                    </script>
                    
                    <canvas id="myChartBrakQuality"></canvas>
                    <script>
                        var ctx = document.getElementById('myChartBrakQuality').getContext('2d');
                        var chart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: labels,
                            datasets: [{
                              label: "Количество Брака",
                              data: data,
                              backgroundColor:'rgb(233, 150, 122)',
                              borderColor: 'rgb(233, 150, 122)',
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
            <p>СМС</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_him_sostav_teamA) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_him_sostav_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_him_sostav_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний по хим.составу',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_upakovka_teamA) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_upakovka_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_upakovka_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний, упаковка',
                                  data: data,
                                  backgroundColor:'rgb(240, 230, 140)',
                                  borderColor: 'rgb(240, 230, 140)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_pretenziy_teamA) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_pretenziy_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_pretenziy_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество претензий',
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
                            $message = "SELECT DATE(date) AS day, SUM(Zabrakov_mat_teamA) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartZabrakov_mat_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartZabrakov_mat_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Забракованный материал',
                                  data: data,
                                  backgroundColor:'rgb(139, 0, 0)',
                                  borderColor: 'rgb(139, 0, 0)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_upakovka_Sulf) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_upakovka_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_upakovka_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Активная вода',
                                  data: data,
                                  backgroundColor:'rgb(127, 255, 212)',
                                  borderColor: 'rgb(127, 255, 212)',
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
        <!--<div class="row bg-light card shadow-sm mt-4">
            <div class="col-md-12">
            <p>TEAM B</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_him_sostav_teamB) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_him_sostav_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_him_sostav_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний по хим.составу',
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
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_upakovka_teamB) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_upakovka_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_upakovka_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний, упаковка',
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
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_pretenziy_teamB) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_pretenziy_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_pretenziy_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество претензий',
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
                            $message = "SELECT DATE(date) AS day, SUM(Zabrakov_mat_teamB) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartZabrakov_mat_teamB"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartZabrakov_mat_teamB').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Забракованный материал',
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
        </div>-->
        <div class="row bg-light card shadow-sm mt-4 mb-4">
            <div class="col-md-12">
            <p>Сульфирование</p>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_zam_him_sostav_Sulf) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_zam_him_sostav_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_zam_him_sostav_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество замечаний по хим.составу',
                                  data: data,
                                  backgroundColor:'rgb(0, 139, 139)',
                                  borderColor: 'rgb(0, 139, 139)',
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
                            $message = "SELECT DATE(date) AS day, SUM(Zabrakov_mat_Sulf) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartZabrakov_mat_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartZabrakov_mat_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Забракованный материал',
                                  data: data,
                                  backgroundColor:'rgb(0, 139, 139)',
                                  borderColor: 'rgb(0, 139, 139)',
                                  fill: false
                                }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset id="modal-btn" class="form-group border p-1 m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(Kol_pretenziy_Sulf) AS total_requests 
                            FROM Quality_KPI GROUP BY day";
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
                        <canvas id="myChartKol_pretenziy_Sulf"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartKol_pretenziy_Sulf').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'bar',
                              data: {
                                labels: labels,
                                datasets: [{
                                  label: 'Количество претензий',
                                  data: data,
                                  backgroundColor:'rgb(0, 139, 139)',
                                  borderColor: 'rgb(0, 139, 139)',
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
