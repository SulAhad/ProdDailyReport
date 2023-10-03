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
    <body class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <p style="font-size:30px; border-bottom: 1px solid #f00;">Технология</p>
                <fieldset class="form-group border card shadow-sm">
                            <div  style="height: 100vh;"  class="table-responsive">
                                <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead class="text-light" style="background:darkgray; position: sticky;">
                                        <tr>
                                            <th style="writing-mode:vertical-rl">Дата</th>
                                            
                                            <th style="writing-mode:vertical-rl">кол-во парам.не в лимитах</th>
                                            <th style="writing-mode:vertical-rl">композиция</th>
                                            <th style="writing-mode:vertical-rl">компаунд</th>
                                            <th style="writing-mode:vertical-rl">постдобавки</th>
                                            <th style="writing-mode:vertical-rl">фасовка</th>
                                            <th style="writing-mode:vertical-rl">сливная станция</th>
                                            <th style="writing-mode:vertical-rl">участок сырья</th>
                                            
                                            <th style="writing-mode:vertical-rl">Удельное потребление газа на башенный продукт</th>
                                            <th style="writing-mode:vertical-rl">Удельное потребление газа на готовый продукт</th>
                                             
                                            <th style="writing-mode:vertical-rl">Удельное потребление газа на башенный продукт</th>
                                            <th style="writing-mode:vertical-rl">Удельное потребление газа на готовый продукт</th>
                                            
                                            <th style="writing-mode:vertical-rl">Удельное потребление газа на башенный продукт</th>
                                            <th style="writing-mode:vertical-rl">Удельное потребление газа на готовый продукт</th>
                                            <th style="writing-mode:vertical-rl">Производительность башни</th>
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody onload="myFunction()" class="animate-bottom">
                                    <?php
                                    $message = "SELECT * FROM Technology_KPI ORDER BY date DESC";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo"<tr>";
                                                            echo"<td><input type='date' class='form-control' required min='0' style='border:none; width:100%;' id='dateTechnology' value='$row[date]'    ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' title='$row[Params_limits_comment]' required min='0' style='border:none; width:100%;'   id='Params_limits' value='$row[Params_limits]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Compositsia_comment]' required min='0' style='border:none; width:100%;'   id='Compositsia'value='$row[Compositsia]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Compaund_comment]' required min='0' style='border:none; width:100%;'   id='Compaund'value='$row[Compaund]'        ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Postdobavki_comment]' required min='0' style='border:none; width:100%;'   id='Postdobavki'value='$row[Postdobavki]'   ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Fasovka_comment]' required min='0' style='border:none; width:100%;'   id='Fasovka'value='$row[Fasovka]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Slivnaya_comment]' required min='0' style='border:none; width:100%;'   id='Slivnaya'value='$row[Slivnaya]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Uch_sirya_comment]' required min='0' style='border:none; width:100%;'   id='Uch_sirya'value='$row[Uch_sirya]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' title='$row[Udeln_potr_gaza_teamA_comment]' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_teamA'value='$row[Udeln_potr_gaza_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Udeln_potr_gaza_gotoviy_prod_teamA_comment]' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_gotoviy_prod_teamA'value='$row[Udeln_potr_gaza_gotoviy_prod_teamA]'></input></td>";
                                                             
                                                            echo"<td><input type='number' class='form-control' title='$row[Udeln_potr_gaza_teamB_comment]' required min='0' style='border:none; width:100%;' readonly  id='Udeln_potr_gaza_teamB'value='$row[Udeln_potr_gaza_teamB]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Udeln_potr_gaza_gotoviy_prod_teamB_comment]' required min='0' style='border:none; width:100%;' readonly  id='Udeln_potr_gaza_gotoviy_prod_teamB'value='$row[Udeln_potr_gaza_gotoviy_prod_teamB]'></input></td>";
                                                             
                                                            echo"<td><input type='number' class='form-control' title='$row[Udeln_potr_gaza_total_comment]' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_total'value='$row[Udeln_potr_gaza_total]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Udeln_potr_gaza_gotoviy_prod_total_comment]' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_gotoviy_prod_total' value='$row[Udeln_potr_gaza_gotoviy_prod_total]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[proizvidit_bashni]' required min='0' style='border:none; width:100%;'   id='proizvidit_bashni' value='$row[proizvidit_bashni]' ></input></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='updateTechnology btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='deleteTechnology btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                            $(document).ready
                                                (function() 
                                                    {$(".updateTechnology").click
                                                        (function()
                                                    		{
                                                    		    var idTechnology = $(this).val();
                                                    		    var dateTechnology = $(this).closest("tr").find("#dateTechnology").val();
                                                    		    var proizvidit_bashni = $(this).closest("tr").find("#proizvidit_bashni").val();
                                                    		    
                                                                var Params_limits = $(this).closest("tr").find("#Params_limits").val();
                                                                var Compositsia = $(this).closest("tr").find("#Compositsia").val();
                                                                var Compaund = $(this).closest("tr").find("#Compaund").val();
                                                                var Postdobavki = $(this).closest("tr").find("#Postdobavki").val();
                                                                var Fasovka = $(this).closest("tr").find("#Fasovka").val();
                                                                var Slivnaya = $(this).closest("tr").find("#Slivnaya").val();
                                                                var Uch_sirya = $(this).closest("tr").find("#Uch_sirya").val();
                                                                
                                                                var Udeln_potr_gaza_teamA = $(this).closest("tr").find("#Udeln_potr_gaza_teamA").val();
                                                                var Udeln_potr_gaza_gotoviy_prod_teamA = $(this).closest("tr").find("#Udeln_potr_gaza_gotoviy_prod_teamA").val();
                                                                
                                                                var Udeln_potr_gaza_teamB = $(this).closest("tr").find("#Udeln_potr_gaza_teamB").val();
                                                                var Udeln_potr_gaza_gotoviy_prod_teamB = $(this).closest("tr").find("#Udeln_potr_gaza_gotoviy_prod_teamB").val();
                                                                
                                                                var Udeln_potr_gaza_total = $(this).closest("tr").find("#Udeln_potr_gaza_total").val();
                                                                var Udeln_potr_gaza_gotoviy_prod_total = $(this).closest("tr").find("#Udeln_potr_gaza_gotoviy_prod_total").val();
                                                                
                                                    			$.ajax(
                                                                    {type: 'POST',
                                                                        dataType: 'html',
                                                                        url: 'updateTechnology.php',
                                                                        
                                                                        data: ({dateTechnology:dateTechnology, 
                                                                        
                                                                                Params_limits:Params_limits,
                                                                                Compositsia:Compositsia,
                                                                                Compaund:Compaund,
                                                                                Postdobavki:Postdobavki,
                                                                                Fasovka:Fasovka,
                                                                                Slivnaya:Slivnaya,
                                                                                Uch_sirya:Uch_sirya,
                                                                                
                                                                                Udeln_potr_gaza_teamA:Udeln_potr_gaza_teamA,
                                                                                Udeln_potr_gaza_gotoviy_prod_teamA:Udeln_potr_gaza_gotoviy_prod_teamA,
                                                                                
                                                                                Udeln_potr_gaza_teamB:Udeln_potr_gaza_teamB,
                                                                                Udeln_potr_gaza_gotoviy_prod_teamB:Udeln_potr_gaza_gotoviy_prod_teamB,
                                                                                
                                                                                Udeln_potr_gaza_total:Udeln_potr_gaza_total,
                                                                                Udeln_potr_gaza_gotoviy_prod_total:Udeln_potr_gaza_gotoviy_prod_total,
                                                                                proizvidit_bashni:proizvidit_bashni,
                                                                                idTechnology:idTechnology}),
                                                                        success: function(response) 
                                                                        {
                                                                            var data = JSON.parse(response);}});});});
                                            </script>
                                    <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".deleteTechnology").click
                                    (
                                		function()
                                		{
                                		    var deleteUser = this.value;
                                		    const { target } = event;
                                			$.ajax(
                                                {
                                                    type: 'POST',
                                                    dataType: 'html',
                                                    url: 'deleteRowTechnology.php',
                                                    data: ({idUser:deleteUser}),
                                                    success: function(response) 
                                                    {
                                                        var data = JSON.parse(response);
                                                        target.parentNode.parentNode.remove();
                                                    }
                                                });
                                		}
                            	    );
                                }
                            );
                        </script>
                        </fieldset>
            </div>
</div>

            <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>