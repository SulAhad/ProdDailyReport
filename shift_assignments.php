<?php require('connect_db.php'); 
    if(isset($_SESSION['login']) == "")
    {header('Location: bridge.php');}
    $a = $_SESSION['login'];
?>
<html>  
    <head class=""><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <!-- Подключаем библиотеку html2pdf.js -->
    
    </head>  
    <body class=" container-fluid">
        <?php
            require('mySidebar.php');
            echo"<button class=' openbtn' onclick='openNav()'>☰ </button>";
        ?>
        
        <style>
            table {
              width: 100%;
            }
            
            th, td {
              text-align: center;
              padding: 10px;
            }
        </style>
        <div class="row">
                    
            <fieldset class="form-group  p-1 ">
                <div class="table-responsive">
                    <table  style="border:1px; border-color:black;" class="table-bordered table table-sm ">
                        <thead>
                                <th>СМЕННОЕ ЗАДАНИЕ ГРУППЫ ПРОМАВТОМАТИКИ</th>
                                <th>Задание выдал ____________________</th>
                        </thead>
                    </table>
                    <table  style="border:1px; border-color:black;" class="table-bordered table table-sm ">
                        <thead>
                            <tr>
                                <th style="width:1%; writing-mode:vertical-rl">Номер</th>
                                <th style="width:3%;"><input style="border:none; font-weight:bold;" max="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" id="selectedDate" onchange="fetchData()" /></th>
                                <th style="width:12%;">Производство и МВЗ</th>
                                <th>Наименование работ</th>
                                <th style="width:10%;">Исполнитель (ФИО)</th>
                                <th style="width:6%;">Кол-во часов</th>
                                <th style="width:10%;">Работу выполнил</th>
                                <th style="width:10%;">Работу принял</th>
                            </tr>
                        </thead>
                        <tbody style="border:1px; border-color:black;" id="tableBody"></tbody>
                        <thead>
                            <tr style="height:60px;">
                                <th style="width:10%;" colspan='4'>Утверждаю: Главный инженер ________________Канский В.С.</th>
                                <th style="width:10%;" colspan='4'>Директор ООО "Цифра" ____________________Адельский Д.В.</th>
                            </tr>
                        </thead>
                    </table>
                    <script>
                        function fetchData() 
                        {
                            var selectedDate = document.getElementById("selectedDate").value;
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() 
                            {
                                if (this.readyState == 4 && this.status == 200) 
                                {
                                    // Handle the response from the server
                                    document.getElementById("tableBody").innerHTML = this.responseText;
                                }
                            };
                            xhttp.open("GET", "fetchData.php?date=" + selectedDate, true);
                            xhttp.send();
                        }
                    </script>
                </div>
            </fieldset>
        </div>
    </body>
</html>
