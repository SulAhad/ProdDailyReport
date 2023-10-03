<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<html>  
    <head class=""><?php require('head.php')?>
    <script>window.onload = function() {fetchData();  setInterval(function() {fetchData();}, 5000);};
</script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            tr{
                font-size:12px;
            }
            td{
                width: 30px;
            }
        </style>
    </head>  
    <body style="background:aliceblue;" class="container-fluid">
        <?php
            require('mySidebar.php');
            echo"<button style='background:aliceblue;' class='openbtn' onclick='openNav()'>☰ </button>";
        ?>
        <div class="row bg-light card shadow-sm">
            <div class="col-md-3">
                <input placeholder="введите дату " value="<?php echo date('Y-m-d'); ?>" style="margin:2px;" max="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" id="selectedDate" onchange="fetchData()" onload="fetchData()" />
                <script>
                function fetchData() 
                    {
                        var selectedDate = document.getElementById("selectedDate").value;
                        var xhttpSafety = new XMLHttpRequest();
                        var xhttpQuality = new XMLHttpRequest();
                        var xhttpTechnology = new XMLHttpRequest();
                        var xhttpProduction = new XMLHttpRequest();
                        var xhttpSirye = new XMLHttpRequest();
                        var xhttpWater = new XMLHttpRequest();
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
                        xhttpSafety.open("GET", "fetchDataSafety.php?date=" + selectedDate, true);
                        xhttpQuality.open("GET", "fetchDataQuality.php?date=" + selectedDate, true);
                        xhttpTechnology.open("GET", "fetchDataTechnology.php?date=" + selectedDate, true);
                        xhttpProduction.open("GET", "fetchDataProduction.php?date=" + selectedDate, true);
                        xhttpSirye.open("GET", "fetchDataSirye.php?date=" + selectedDate, true);
                        xhttpWater.open("GET", "fetchDataWater.php?date=" + selectedDate, true);
                        xhttpSafety.send();
                        xhttpQuality.send();
                        xhttpTechnology.send();
                        xhttpProduction.send();
                        xhttpSirye.send();
                        xhttpWater.send();
                    }
                    </script>
            </div>
            <div class="col-md-12">
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-4 bg-light">
                        <fieldset class="form-group border card shadow-sm">
                            <div class="table-responsive">
                                <table class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th colspan="3">Безопасность</th>
                                            <th>Смена А</th>
                                            <th>Смена Б</th>
                                            <th>Сульф</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableSafety">
                                        <tr>
                                            <td>Инциденты</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td>Кол-во замечаний</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td>Незапланированное событие</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td>BBSWA</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td>BBSWA</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td>R&PM Замечания</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td>Количество замечаний</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td>R&PM BBSWA</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th colspan="2">Качество</th>
                                            <th>Смена А</th>
                                            <th>Смена Б</th>
                                            <th>Сульф</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableQuality">
                                        <tr>
                                            <td>Брак</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Кол-во замечаний по хим. составу</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Кол-во замечаний Упаковка</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Кол-во претензий</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Забракованный материал</td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                            <td style="background:lightgreen;"><label>0</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4 bg-light">
                        <fieldset class="form-group border card shadow-sm">
                            <div class="table-responsive">
                                <table class="table-hover table-bordered table table-sm ">
                                        <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                            <tr>
                                                <th colspan="3">Технология</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="tableTechnology">
                                            <tr>
                                                <td>кол-во парам.не в лимитах</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                            </tr>
                                            <tr>
                                                <td>композиция</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                            </tr>
                                            <tr>
                                                <td>компаунд</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                            </tr>
                                            <tr>
                                                <td>постдобавки</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>фасовка</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                            </tr>
                                            <tr>
                                                <td>сливная станция</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                            </tr>
                                            <tr>
                                                <td>участок сырья</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td><label></label></td>
                                                <td><label></label></td>
                                            </tr>
                                            <tr>
                                                <td><label></label></td>
                                                <td><label>Смена А</label></td>
                                                <td><label>Смена Б</label></td>
                                                <td><label>Общее</label></td>
                                            </tr>
                                            <tr>
                                                <td>Удельное потребление газа на башенный продукт</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Удельное потребление газа на готовый продукт</td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                <td style='background:lightgreen';><label>0</label></td>
                                                
                                            </tr>
                                                </tbody>
                                    </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table-hover table-bordered table table-sm ">
                                        <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                            <tr>
                                                <th>Активная вода</th>
                                                <th>63 +16 м3 </th>
                                                <th>250 м3</th>
                                                <th>75 м3 (ХР)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableWater">
                                            <tr>
                                                <td>м3</td>
                                                <td><label>0</label></td>
                                                <td><label>0</label></td>
                                                <td><label>0</label></td>
                                            </tr>
                                            <tr>
                                                <td>Использовано активной воды, м3</td>
                                                <td><label>0</label></td>
                                                <td><label>0</label></td>
                                                <td><label>0</label></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4 bg-light">
                        <fieldset class="form-group border card shadow-sm">
                            <div class="table-responsive">
                                <table class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th colspan="2">Производство</th>
                                            <th>Смена А</th>
                                            <th>Смена Б</th>
                                            <th>Сульф</th>
                                            <th>Отклонение</th>
                                        </tr>
                                    </thead>
                                    <tbody  id="tableProduction">
                                        <tr>
                                            <td>план</td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='text-align:center; vertical-align:middle; background:lightcoral;' rowspan="2"><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td>факт</td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="text-align:right;"><label>Общее</label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>OEE</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>Иннотех 1</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>Иннотех 2</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>Иннотех 3</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>UVA 4</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>UVA 5</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><label>АКМА</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td style='background:lightgreen';><label>0</label></td>
                                            <td><label></label></td>
                                            <td><label></label></td>
                                        </tr>
                                            </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th>Сырье</th>
                                            <th>Было</th>
                                            <th>Приход</th>
                                            <th>Расход</th>
                                            <th>Остаток</th>
                                        </tr>
                                    </thead>
                                    <tbody  id="tableSirye">
                                        <tr>
                                            <td>Брак СМС, т</td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                        </tr>
                                        <tr>
                                            <td>Брак Сульфирование, т</td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                        </tr>
                                        <tr>
                                            <td>Брак Сульфирование (на растворение), т</td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                        </tr>
                                        <tr>
                                            <td>Изолятор, т</td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                        </tr>
                                        <tr>
                                            <td>Пыль, т</td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                        </tr>
                                        <tr>
                                            <td>Отсев на растворение, т</td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                            <td><label>0.00</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>