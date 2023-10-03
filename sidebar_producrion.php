<style>
    #sidebar_production {
      position: fixed;
      top: 0;
      right: -600px;
      width: 600px;
      height: 100%;
      background-color: white;
      transition: right 0.3s ease;
      z-index: 98;
    }
    
    #sidebar_production ul {
      padding: 0;
      margin: 20px;
    }
    
    #sidebar_production ul li {
      list-style-type: none;
    }
    
    #sidebar_production ul li a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    
    #sidebar_production ul li a:hover {
      background-color: #ccc;
    }
    .scroll {
  overflow-y: scroll; /* Включаем вертикальную прокрутку */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div id="sidebar_production" class="bg-light text-black scroll">

<button type="button" class="btn-close text-light" id="empty-area" aria-label="Закрыть"></button>   

        <p>Объем выпуска, т</p>
        <fieldset id="modal-btn_plan" class="form-group border m-1 card shadow-sm">
            <?php
                $message = "SELECT DISTINCT date, plan FROM Production_KPI WHERE plan > 0 ORDER BY date";
                $link->set_charset("utf8");
                $result = mysqli_query($link, $message);
                
                $labels = array();
                $data = array();
                
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        array_push($labels, $row["date"]);
                        if ($row["plan"] > 0) {
                            array_push($data, $row["plan"]);
                        } else {
                            array_push($data, null);
                        }
                    }
                }
                
                $messages = "SELECT DISTINCT date, fact FROM Production_KPI WHERE fact > 0 ORDER BY date";
                $link->set_charset("utf8");
                $results = mysqli_query($link, $messages);
                
                $labelset = array();
                $dataset = array();
                
                if ($results->num_rows > 0) {
                    while ($rows = mysqli_fetch_assoc($results)) {
                        array_push($labelset, $rows["date"]);
                        if ($rows["fact"] > 0) {
                            array_push($dataset, $rows["fact"]);
                        } else {
                            array_push($dataset, null);
                        }
                    }
                }
                ?>

                <canvas id="myChartALL"></canvas>
                
                <script>
                    var labels = <?php echo json_encode($labels); ?>;
                    var data = <?php echo json_encode($data); ?>;
                    var labelset = <?php echo json_encode($labelset); ?>;
                    var dataset = <?php echo json_encode($dataset); ?>;
                    var balance = Array(data.length).fill(52200);
                
                    var ctx = document.getElementById('myChartALL').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labelset,
                            datasets: [
                                {
                                    label: 'План',
                                    data: data,
                                    backgroundColor: 'rgb(135, 206, 235)',
                                    borderColor: 'rgb(135, 206, 235)',
                                    fill: false
                                },
                                {
                                    label: 'Факт',
                                    data: dataset,
                                    backgroundColor: 'rgb(50, 205, 50)',
                                    borderColor: 'rgb(50, 205, 50)',
                                    fill: false
                                }
                            ]
                        },
                        options: {}
                    });
                </script>
                <div class="col-md-12">
            
            </div>
        </fieldset>
       
        <p>OEE, %</p>
        <fieldset id="modal-btn_all_oee" class="form-group border m-1 card shadow-sm">
                        <?php
                            $message = "SELECT DATE(date) AS day, SUM(CAST(OEE_teamA AS DECIMAL(9,2))) AS total_requests 
                                FROM Production_KPI WHERE OEE_teamA > 0 GROUP BY day";
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
                            $messages = "SELECT DATE(date) AS day, SUM(CAST(oee_teamB AS DECIMAL(9,2))) AS total_requests 
                                FROM Production_KPI  WHERE OEE_teamB > 0 GROUP BY day";
                            $link->set_charset("utf8");
                            $results =  mysqli_query( $link,  $messages);
                            $rows = mysqli_fetch_assoc($results);
                            // Создаем массивы для меток и данных
                            $labelset = array();
                            $dataset = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($results->num_rows > 0) 
                            {
                                while($rows = $results->fetch_assoc()) 
                                {
                                    array_push($labelset, $rows["day"]);
                                    array_push($dataset, $rows["total_requests"]);
                                }
                            }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($labels); ?>;
                            var data = <?php echo json_encode($data); ?>;
                            var labelset = <?php echo json_encode($labelset); ?>;
                            var dataset = <?php echo json_encode($dataset); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChartOEE"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartOEE').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'СМС',
                                        data: data,
                                        backgroundColor:'rgb(154, 205, 50)',
                                        borderColor: 'rgb(154, 205, 50)',
                                        fill: false
                                        
                                    },
                                    /*{
                                        label: 'Смена Б',
                                        data: dataset,
                                        backgroundColor:'rgb(50, 205, 50)',
                                        borderColor: 'rgb(50, 205, 50)',
                                        fill: false
                                  
                                    },*/
                                    {
                                        label: 'цель OEE',
                                        data: balance,
                                        type: 'line',
                                        backgroundColor:'rgb(0, 255, 255)',
                                        borderColor: 'rgb(0, 255, 255)',
                                        fill: false
                                  
                                    }]
                              },
                              options: {}
                            });
                        </script>
                        
                    </fieldset>
                    
        <fieldset id="modal-btn" class="form-group border  m-1 card shadow-sm">
                        <?php
                        $message_innotech1_teamA = "SELECT DISTINCT date, innotech1_teamA FROM Production_KPI WHERE innotech1_teamA > 0 ORDER By date";
                        $link->set_charset("utf8");
                        $result_innotech1_teamA = mysqli_query($link, $message_innotech1_teamA);
                        $row_innotech1_teamA = mysqli_fetch_assoc($result_innotech1_teamA);
                        // Создаем массивы для меток и данных
                        $label_innotech1_teamA = array();
                        $data_innotech1_teamA = array();
                        // Обрабатываем результаты запроса и заполняем массивы
                        if ($result_innotech1_teamA->num_rows > 0) 
                        {
                            while ($row_innotech1_teamA = $result_innotech1_teamA->fetch_assoc()) 
                            {
                                array_push($label_innotech1_teamA, $row_innotech1_teamA["date"]);
                                if ($row_innotech1_teamA["innotech1_teamA"] != 0) 
                                {
                                    array_push($data_innotech1_teamA, $row_innotech1_teamA["innotech1_teamA"]);
                                } else 
                                {
                                    array_push($data_innotech1_teamA, null);
                                }
                            }
                        }
                        ?>
                        <script>
                            var labels = <?php echo json_encode($label_innotech1_teamA); ?>;
                            var data_innotech1_teamA = <?php echo json_encode($data_innotech1_teamA); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChart_innotech1_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_innotech1_teamA').getContext('2d');
                            var chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                            label: 'Иннотех 1',
                                            data: data_innotech1_teamA,
                                            backgroundColor: 'rgb(233, 150, 122)',
                                            borderColor: 'rgb(233, 150, 122)',
                                            fill: false
                                        },
                                        {
                                            label: 'цель OEE',
                                            data: balance,
                                            type: 'line',
                                            backgroundColor: 'rgb(0, 255, 255)',
                                            borderColor: 'rgb(0, 255, 255)',
                                            fill: false
                                        }
                                    ]
                                },
                                options: {}
                            });
                        </script>
                    </fieldset>    
        <fieldset id="modal-btn" class="form-group border  m-1 card shadow-sm">
                        <?php
                        $message_innotech2_teamA = "SELECT DISTINCT date, innotech2_teamA FROM Production_KPI WHERE innotech2_teamA > 0 ORDER By date";
                            $link->set_charset("utf8");
                            $result_innotech2_teamA =  mysqli_query( $link,  $message_innotech2_teamA);
                            $row_innotech2_teamA = mysqli_fetch_assoc($result_innotech2_teamA);
                            // Создаем массивы для меток и данных
                            $label_innotech2_teamA = array();
                            $data_innotech2_teamA = array();
                            if ($result_innotech2_teamA->num_rows > 0) 
                            {
                                while ($row_innotech2_teamA = $result_innotech2_teamA->fetch_assoc()) 
                                {
                                    array_push($label_innotech2_teamA, $row_innotech2_teamA["date"]);
                                    if ($row_innotech2_teamA["innotech2_teamA"] != 0) 
                                    {
                                        array_push($data_innotech2_teamA, $row_innotech2_teamA["innotech2_teamA"]);
                                    } 
                                    else 
                                    {
                                        array_push($data_innotech2_teamA, null);
                                    }
                                }
                            }
                        ?>
                        <script>
                             var label_innotech2_teamA = <?php echo json_encode($label_innotech2_teamA); ?>;
                            var data_innotech2_teamA = <?php echo json_encode($data_innotech2_teamA); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChart_innotech2_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_innotech2_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: label_innotech2_teamA,
                                datasets: [
                                    {
                                        label: 'Иннотех 2',
                                        data: data_innotech2_teamA,
                                        backgroundColor:'rgb(255, 105, 180)',
                                        borderColor: 'rgb(255, 105, 180)',
                                        fill: false
                                        
                                    },
                                    {
                                        label: 'цель OEE',
                                        data: balance,
                                        type: 'line',
                                        backgroundColor:'rgb(0, 255, 255)',
                                        borderColor: 'rgb(0, 255, 255)',
                                        fill: false
                                  
                                    }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset> 

        <fieldset id="modal-btn" class="form-group border  m-1 card shadow-sm">
                        <?php
                        $message_innotech3_teamA = "SELECT DISTINCT date, innotech3_teamA FROM Production_KPI WHERE innotech3_teamA > 0 ORDER By date";
                            $link->set_charset("utf8");
                            $result_innotech3_teamA =  mysqli_query( $link,  $message_innotech3_teamA);
                            $row_innotech3_teamA = mysqli_fetch_assoc($result_innotech3_teamA);
                            // Создаем массивы для меток и данных
                            $label_innotech3_teamA = array();
                            $data_innotech3_teamA = array();
                            if ($result_innotech3_teamA->num_rows > 0) 
                            {
                                while ($row_innotech3_teamA = $result_innotech3_teamA->fetch_assoc()) 
                                {
                                    array_push($label_innotech3_teamA, $row_innotech3_teamA["date"]);
                                    if ($row_innotech3_teamA["innotech3_teamA"] != 0) 
                                    {
                                        array_push($data_innotech3_teamA, $row_innotech3_teamA["innotech3_teamA"]);
                                    } 
                                    else 
                                    {
                                        array_push($data_innotech3_teamA, null);
                                    }
                                }
                            }
                        ?>
                        <script>
                             var label_innotech3_teamA = <?php echo json_encode($label_innotech3_teamA); ?>;
                            var data_innotech3_teamA = <?php echo json_encode($data_innotech3_teamA); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChart_innotech3_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_innotech3_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: label_innotech3_teamA,
                                datasets: [
                                    {
                                        label: 'Иннотех 3',
                                        data: data_innotech3_teamA,
                                        backgroundColor:'rgb(255, 165, 0)',
                                        borderColor: 'rgb(255, 165, 0)',
                                        fill: false
                                        
                                    },
                                    {
                                        label: 'цель OEE',
                                        data: balance,
                                        type: 'line',
                                        backgroundColor:'rgb(0, 255, 255)',
                                        borderColor: 'rgb(0, 255, 255)',
                                        fill: false
                                  
                                    }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>   
        <fieldset id="modal-btn" class="form-group border  m-1 card shadow-sm">
                        <?php
                        $message_uva4_teamA = "SELECT DISTINCT date, uva4_teamA FROM Production_KPI WHERE uva4_teamA > 0 ORDER By date";
                            $link->set_charset("utf8");
                            $result_uva4_teamA =  mysqli_query( $link,  $message_uva4_teamA);
                            $row_uva4_teamA = mysqli_fetch_assoc($result_uva4_teamA);
                            // Создаем массивы для меток и данных
                            $label_uva4_teamA = array();
                            $data_uva4_teamA = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result_uva4_teamA->num_rows > 0) 
                            {
                                while ($row_uva4_teamA = $result_uva4_teamA->fetch_assoc()) 
                                {
                                    array_push($label_uva4_teamA, $row_uva4_teamA["date"]);
                                    if ($row_uva4_teamA["uva4_teamA"] != 0) 
                                    {
                                        array_push($data_uva4_teamA, $row_uva4_teamA["uva4_teamA"]);
                                    } 
                                    else 
                                    {
                                        array_push($data_uva4_teamA, null);
                                    }
                                }
                            }
                        ?>
                        <script>
                            var label_uva4_teamA = <?php echo json_encode($label_uva4_teamA); ?>;
                            var data_uva4_teamA = <?php echo json_encode($data_uva4_teamA); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChart_uva4_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_uva4_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: label_uva4_teamA,
                                datasets: [
                                    {
                                        label: 'UVA 4',
                                        data: data_uva4_teamA,
                                        backgroundColor:'rgb(153, 50, 204)',
                                        borderColor: 'rgb(153, 50, 204)',
                                        fill: false
                                        
                                    },
                                    {
                                        label: 'цель OEE',
                                        data: balance,
                                        type: 'line',
                                        backgroundColor:'rgb(0, 255, 255)',
                                        borderColor: 'rgb(0, 255, 255)',
                                        fill: false
                                  
                                    }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset> 

        <fieldset id="modal-btn" class="form-group border  m-1 card shadow-sm">
                        <?php
                        $message_uva5_teamA = "SELECT DISTINCT date, uva5_teamA FROM Production_KPI WHERE uva5_teamA > 0 ORDER By date";
                            $link->set_charset("utf8");
                            $result_uva5_teamA =  mysqli_query( $link,  $message_uva5_teamA);
                            $row_uva5_teamA = mysqli_fetch_assoc($result_uva5_teamA);
                            // Создаем массивы для меток и данных
                            $label_uva5_teamA = array();
                            $data_uva5_teamA = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result_uva5_teamA->num_rows > 0) 
                            {
                                while ($row_uva5_teamA = $result_uva5_teamA->fetch_assoc()) 
                                {
                                    array_push($label_uva5_teamA, $row_uva5_teamA["date"]);
                                    if ($row_uva5_teamA["uva5_teamA"] != 0) {
                                        array_push($data_uva5_teamA, $row_uva5_teamA["uva5_teamA"]);
                                    } 
                                    else 
                                    {
                                        array_push($data_uva5_teamA, null);
                                    }
                                }
                            }
                        ?>
                        <script>
                            var label_uva5_teamA = <?php echo json_encode($label_uva5_teamA); ?>;
                            var data_uva5_teamA = <?php echo json_encode($data_uva5_teamA); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChart_uva5_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_uva5_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: label_uva5_teamA,
                                datasets: [
                                    {
                                        label: 'UVA 5',
                                        data: data_uva5_teamA,
                                        backgroundColor:'rgb(0, 250, 154)',
                                        borderColor: 'rgb(0, 250, 154)',
                                        fill: false
                                        
                                    },
                                    {
                                        label: 'цель OEE',
                                        data: balance,
                                        type: 'line',
                                        backgroundColor:'rgb(0, 255, 255)',
                                        borderColor: 'rgb(0, 255, 255)',
                                        fill: false
                                  
                                    }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset>    
        <fieldset id="modal-btn" class="form-group border  m-1 card shadow-sm">
                        <?php
                        $message_acma_teamA = "SELECT DISTINCT date, acma_teamA FROM Production_KPI WHERE acma_teamA > 0 ORDER By date";
                            $link->set_charset("utf8");
                            $result_acma_teamA =  mysqli_query( $link,  $message_acma_teamA);
                            $row_acma_teamA = mysqli_fetch_assoc($result_acma_teamA);
                            // Создаем массивы для меток и данных
                            $label_acma_teamA = array();
                            $data_acma_teamA = array();
                            // Обрабатываем результаты запроса и заполняем массивы
                            if ($result_acma_teamA->num_rows > 0) 
                            {
                                while ($row_acma_teamA = $result_acma_teamA->fetch_assoc()) 
                                {
                                    array_push($label_acma_teamA, $row_acma_teamA["date"]);
                                    if ($row_acma_teamA["acma_teamA"] != 0) 
                                    {
                                        array_push($data_acma_teamA, $row_acma_teamA["acma_teamA"]);
                                    } 
                                    else 
                                    {
                                        array_push($data_acma_teamA, null);
                                    }
                                }
                            }
                        ?>
                        <script>
                            var label_acma_teamA = <?php echo json_encode($label_acma_teamA); ?>;
                            var data_acma_teamA = <?php echo json_encode($data_acma_teamA); ?>;
                            var balance = Array(data.length).fill(96.0);
                        </script>
                        <canvas id="myChart_acma_teamA"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_acma_teamA').getContext('2d');
                            var chart = new Chart(ctx, 
                            {
                              type: 'line',
                              data: {
                                labels: label_acma_teamA,
                                datasets: [
                                    {
                                        label: 'АКМА',
                                        data: data_acma_teamA,
                                        backgroundColor:'rgb(85, 107, 47)',
                                        borderColor: 'rgb(85, 107, 47)',
                                        fill: false
                                        
                                    },
                                    {
                                        label: 'цель OEE',
                                        data: balance,
                                        type: 'line',
                                        backgroundColor:'rgb(0, 255, 255)',
                                        borderColor: 'rgb(0, 255, 255)',
                                        fill: false
                                  
                                    }]
                              },
                              options: {}
                            });
                        </script>
                    </fieldset> 

</div>




