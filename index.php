<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">  
    <head><?php require('head.php')?>
        <style>
            #loader {
              border: 4px solid #f3f3f3;
              border-top: 4px solid #3498db;
              border-radius: 50%;
              width: 30px;
              height: 30px;
              animation: spin 1s linear infinite;
              margin: 0 auto;
            }
            
            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }
            .box:hover{
                box-shadow: 0 0 11px rgba(33,33,33,.2);
            }
            .box {
                transition: box-shadow .3s;
            }
            .no-bootstrap{
                display:flex;
            }
            p{
                overflow-wrap: break-word;
                height:5px;
            }
            tr{
                font-size:12px;
                text-align:center;
            }
            td{
                width: 30px;
                
                vertical-align: middle;
            }
            thead{
                background:darkgray; 
                position: sticky; 
                top:0px;
                color:white;
            }
            td.success {
                background: LawnGreen;
            }
            td.danger {
               background: Crimson;
               color:white;
            }
        </style>
        <script>window.onload = function() {fetchData();};</script>
        <script>
            $( function() 
            {
                $( document ).tooltip();
            });
        </script>
        <script>
            function fetchData() 
            {
                var loader = document.getElementById("loader");
                loader.style.display = "block"; // Отображаем лоадер
                var selectedDate = document.getElementById("selectedDate").value;
                var xhttpSafety = new XMLHttpRequest();
                var xhttpQuality = new XMLHttpRequest();
                var xhttpTechnology = new XMLHttpRequest();
                var xhttpProduction = new XMLHttpRequest();
                var xhttpSirye = new XMLHttpRequest();
                var xhttpWater = new XMLHttpRequest();
                var xhttpTop5Problem = new XMLHttpRequest();
                var xhttpInspectionList = new XMLHttpRequest();
                xhttpInspectionList.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableInspection").innerHTML = this.responseText;
                    }
                };
                xhttpSafety.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableSafety").innerHTML = this.responseText;
                    }
                };
                xhttpQuality.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableQuality").innerHTML = this.responseText;
                    }
                };
                xhttpTechnology.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableTechnology").innerHTML = this.responseText;
                    }
                };
                xhttpProduction.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableProduction").innerHTML = this.responseText;
                    }
                };
                xhttpSirye.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableSirye").innerHTML = this.responseText;
                    }
                };
                xhttpWater.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableWater").innerHTML = this.responseText;
                    }
                };
                xhttpTop5Problem.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("tableTop5Problem").innerHTML = this.responseText;
                    }
                };
                xhttpSafety.open("GET", "fetchDataSafety.php?date=" + selectedDate, true);
                xhttpQuality.open("GET", "fetchDataQuality.php?date=" + selectedDate, true);
                xhttpTechnology.open("GET", "fetchDataTechnology.php?date=" + selectedDate, true);
                xhttpProduction.open("GET", "fetchDataProduction.php?date=" + selectedDate, true);
                xhttpSirye.open("GET", "fetchDataSirye.php?date=" + selectedDate, true);
                xhttpWater.open("GET", "fetchDataWater.php?date=" + selectedDate, true);
                xhttpTop5Problem.open("GET", "fetchDataTop5Problem.php?date=" + selectedDate, true);
                xhttpInspectionList.open("GET", "fetchDataInspectionList.php?date=" + selectedDate, true);
                tableTechnology.classList.add("loading");
                tableWater.classList.add("loading");
                tableSafety.classList.add("loading");
                tableInspection.classList.add("loading");
                tableQuality.classList.add("loading");
                tableProduction.classList.add("loading");
                tableSirye.classList.add("loading");
                tableTop5Problem.classList.add("loading");
                xhttpSafety.send();
                xhttpQuality.send();
                xhttpTechnology.send();
                xhttpProduction.send();
                xhttpSirye.send();
                xhttpWater.send();
                xhttpTop5Problem.send();
                xhttpInspectionList.send();
                // Скрываем лоадер после получения ответов
                var numberOfRequests = 8;
                var completedRequests = 0;
                xhttpInspectionList.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableInspection").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpSafety.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableSafety").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpQuality.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableQuality").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpTechnology.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableTechnology").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpProduction.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableProduction").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpSirye.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableSirye").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpWater.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableWater").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                xhttpTop5Problem.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tableTop5Problem").innerHTML = this.responseText;
                    completedRequests++;
                    checkIfAllRequestsCompleted();
                  }
                };
                function checkIfAllRequestsCompleted() {
                  if (completedRequests === numberOfRequests) {
                    loader.style.display = "none";
                  }
                }
            }
        </script>
    </head>  
     <!--_________________________________________________________________________________________________-->
     
     <?php require('sidebar_producrion.php') ?>
      <!--_________________________________________________________________________________________________-->
    <body class="container-fluid">
        <div class="col-md-2">
            <input placeholder="введите дату " value="<?php echo date('Y-m-d'); ?>" style="margin:2px;" max="<?php echo date('Y-m-d'); ?>" type="date" class="form-control box" id="selectedDate" onchange="fetchData()"onload="fetchData()" />
        </div>
        <div id="loader"></div>
        <div id="body" class="no-bootstrap">
            <div class="col-md-4">
                <fieldset class="box form-group card">
                    <div class="table-responsive">
                        <table class="table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th colspan="3">БЕЗОПАСНОСТЬ</th>
                                    <th>СМС</th>
                                    <!--<th>СМЕНА_Б</th>-->
                                    <th>СУЛЬФИРОВАНИЕ</th>
                                </tr>
                            </thead>
                            <tbody id="tableSafety">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table-bordered table table-sm ">
                            <tbody id="tableInspection">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th colspan="2">КАЧЕСТВО</th>
                                    <th>СМС</th>
                                    <!--<th>СМЕНА-Б</th>-->
                                    <th>СУЛЬФИРОВАНИЕ</th>
                                </tr>
                            </thead>
                            <tbody id="tableQuality">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset class="form-group card box">
                    <div class="table-responsive">
                        <table class="table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th colspan="4">КОНТРОЛЬ ПАРАМЕТРОВ ОБОРУДОВАНИЯ</th>
                                </tr>
                            </thead>
                            <tbody id="tableTechnology">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th>АКТИВНАЯ ВОДА</th>
                                    <th>63 +16 м3 </th>
                                    <th>250 м3</th>
                                    <th>75 м3 (ХР)</th>
                                </tr>
                            </thead>
                            <tbody id="tableWater">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset class="form-group card box">
                    <div class="table-responsive">
                       
                        <table id="menu-Production" class="table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th colspan="2"><p>ПРОИЗВОДСТВО</p></th>
                                    <th><p>СМС</p></th>
                                    <!--<th><p>СМЕНА_Б</p></th>-->
                                    <th><p>СУЛЬФИРОВАНИЕ</p></th>
                                    <th><p>ОТКЛОНЕНИЕ</p></th>
                                </tr>
                            </thead>
                            <tbody  id="tableProduction">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                        <script>
                            const menuToggle = document.getElementById("menu-Production");
                            const sidebar = document.getElementById("sidebar_production");
                            const emptyArea = document.getElementById("empty-area");
                            
                            menuToggle.addEventListener("click", function() {
                              toggleSidebar();
                            });
                            
                            emptyArea.addEventListener("click", function() {
                              if (sidebar.style.right === "0px") {
                                toggleSidebar();
                              }
                            });
                            
                            function toggleSidebar() {
                              if (sidebar.style.right === "-600px") {
                                sidebar.style.transition = "right 0.5s ease";
                                sidebar.style.right = "0";
                              } else {
                                sidebar.style.transition = "right 0.5s ease";
                                sidebar.style.right = "-600px";
                              }
                            }
                            window.onclick = function(event) {
                              if (event.target == sidebar) {
                                toggleSidebar();
                              }
                            };
                            window.onload = function() {fetchData();};
                            
                        </script>
                    </div>
                    <div class="table-responsive">
                        <table class="table-hover table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th>СЫРЬЕ</th>
                                    <th>БЫЛО</th>
                                    <th>ПРИХОД</th>
                                    <th>РАСХОД</th>
                                    <th>ОСТАТОК</th>
                                </tr>
                            </thead>
                            <tbody  id="tableSirye">
                                <tr><td>Загрузка...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="col-md-12">
            <fieldset class="form-group border card box">
                <div class="table-responsive">
                    <table class="table-hover table-bordered table table-sm ">
                        <thead>
                            <tr>
                                <th colspan="10">ТОП-5 ПРОБЛЕМ</th>
                            </tr>
                        </thead>
                        <tbody  id="tableTop5Problem">
                            <tr><td>Загрузка...</td></tr>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>
