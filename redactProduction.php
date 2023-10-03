<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    
    <body  class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <div class="alert alert-success_Update" style="background:lightblue; display:none; position: fixed; top: 0; right: 0;">Данные успешно изменены!</div>
                <div class="alert alert-success_Delete" style="background:lightyellow; display:none; position: fixed; top: 0; right: 0;">Строка успешно удалена!</div>
                <p style="font-size:30px; border-bottom: 1px solid #f00;">редактирование - Производство</p>
                <fieldset class="form-group border card shadow-sm">
                            <div  style="height: 100vh;" class="table-responsive">
                                <table  id="myTable"class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky;">
                                        <tr>
                                            <th style="writing-mode:vertical-rl">Дата</th>
                                            
                                            <th style="writing-mode:vertical-rl">план</th>
                                            <th style="writing-mode:vertical-rl">факт</th>
                                            
                                            <th style="writing-mode:vertical-rl">План Смена А</th>
                                            <th style="writing-mode:vertical-rl">Факт Смена А</th>
                                            
                                            <!--<th style="writing-mode:vertical-rl">План Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Факт Смена Б</th>-->
                                            
                                            <!--<th style="writing-mode:vertical-rl">План Общее</th>
                                            <th style="writing-mode:vertical-rl">Факт Общее</th>-->
                                            
                                            <th style="writing-mode:vertical-rl">Отклонение</th>
                                            
                                            <th style="writing-mode:vertical-rl">OEE Смена А</th>
                                            <th style="writing-mode:vertical-rl">Иннтоех 1 Смена А</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 2 Смена А</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 3 Смена А</th>
                                            <th style="writing-mode:vertical-rl">UVA 4 Смена А</th>
                                            <th style="writing-mode:vertical-rl">UVA 5 Смена А</th>
                                            <th style="writing-mode:vertical-rl">АКМА Смена А</th>
                                            
                                            
                                            <!--<th style="writing-mode:vertical-rl">Иннтоех 1 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 2 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 3 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">UVA 4 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">UVA 5 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">АКМА Смена Б</th>-->
                                            
                                            <th style="writing-mode:vertical-rl">OEE Общее</th>
                                            
                                            <th style="writing-mode:vertical-rl" class="col-5">Комментарий</th>
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                        </tr>
                                    </thead>
                                    <style>
                                           .fontTr
                                           {
                                               font-size:12px;
                                           }
                                           p{
                                                margin: 1px;
                                                margin: 1em;
                                                font-size:12px;
                                            }
                                       </style>
                                    <tbody onload="myFunction()" class="animate-bottom">
                                    <?php
                                    $message = "SELECT * FROM Production_KPI ORDER BY date DESC";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {$date = $row['date'];
                                                        $readonly = '';
                                                        if (strtotime($date) < strtotime('-4 days')) 
                                                        {$readonly = 'readonly';}
                                                        echo"<tr>";
                                                            $minDate = date('Y-m-d', strtotime('-3 days')); // вычисляем минимальную дату
                                                            if ($readonly == '') 
                                                            {
                                                            echo"<td><input type='date' class='fontTr form-control' required style='border:none;' id='dateProduction' value='$date' min='$minDate'></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='plan' value='$row[plan]'    ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='fact'value='$row[fact]'     ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='plan_teamA'value='$row[plan_teamA]'        ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='fact_teamA'value='$row[fact_teamA]'   ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='deviation'value='$row[deviation]'></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='OEE_teamA' value='$row[OEE_teamA]'    ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='innotech1_teamA' value='$row[innotech1_teamA]'></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='innotech2_teamA' value='$row[innotech2_teamA]'></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='innotech3_teamA' value='$row[innotech3_teamA]' ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='uva4_teamA'value='$row[uva4_teamA]'></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='uva5_teamA'value='$row[uva5_teamA]'></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='acma_teamA' value='$row[acma_teamA]' ></input></td>";
                                                            echo"<td><input type='text' title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' class='fontTr form-control' min='0' style='border:none; width:100%;'   id='oee_total' value='$row[oee_total]' ></input></td>";
                                                            echo"<td><input type='text' class='fontTr form-control' style='border:none; width:100%;' id='comment' value='$row[comment]'></input></td>";
                                                             
                                                            echo "<td><button type='button' class='updateProduction btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='change.jpg' style='height:13px;'></button></td>";
                                                            echo "<td><button type='button' class='deleteProduction btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='trash.png' style='height:13px;'></button></td>";
                                                                
                                                            }
                                                            else {
                                                                echo "<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                                                echo "<td><p>$row[plan]</p></td>";
                                                                echo "<td><p>$row[fact]</p></td>";
                                                                echo "<td><p>$row[plan_teamA]</p></td>";
                                                                echo "<td><p>$row[fact_teamA]</p></td>";
                                                                echo "<td><p>$row[deviation]</p></td>";
                                                                echo "<td><p>$row[OEE_teamA]</p></td>";
                                                                echo "<td><p>$row[innotech1_teamA]</p></td>";
                                                                echo "<td><p>$row[innotech2_teamA]</p></td>";
                                                                echo "<td><p>$row[innotech3_teamA]</p></td>";
                                                                echo "<td><p>$row[uva4_teamA]</p></td>";
                                                                echo "<td><p>$row[uva5_teamA]</p></td>";
                                                                echo "<td><p>$row[acma_teamA]</p></td>";
                                                                echo "<td><p>$row[oee_total]</p></td>";
                                                                echo "<td><p>$row[comment]</p></td>";
                                                            }
                                                        echo"</tr>";
                                                    }
                                                        ?>
                                            </tbody>
                                            <script>
                                            function validateInput(input) {
                                              var value = input.value;
                                              var regex = /^[0-9.]+$/; // только цифры и точка
                                              if (!regex.test(value)) {
                                                input.value = input.value.replace(/[^0-9.]/g, ''); // удаляем все символы кроме цифр и точки
                                                input.style.backgroundColor = 'lightcoral'; // подсвечиваем красным
                                                $(input).tooltip({ // инициализируем tooltip
                                                  show: { effect: "fade", duration: 200 },
                                                  hide: { effect: "fade", duration: 200 }
                                                }).tooltip("open"); // открываем tooltip
                                              } else {
                                                var dotCount = (value.match(/\./g) || []).length; // считаем количество точек
                                                if (dotCount > 1) {
                                                  input.value = input.value.replace(/\./g, ''); // удаляем все точки кроме первой
                                                  input.style.backgroundColor = 'red'; // подсвечиваем красным
                                                  $(input).tooltip({ // инициализируем tooltip
                                                    show: { effect: "fade", duration: 200 },
                                                    hide: { effect: "fade", duration: 200 }
                                                  }).tooltip("open"); // открываем tooltip
                                                } else {
                                                  input.style.backgroundColor = ''; // сбрасываем цвет
                                                  $(input).tooltip("destroy"); // удаляем tooltip
                                                }
                                              }
                                            }
                                            </script>
                                        </table>
                                    </div>
                        </fieldset>
                        <script>
                                            $(document).ready
                                                (function() 
                                                    {$(".updateProduction").click
                                                        (function()
                                                    		{
                                                    		    var idProduction = $(this).val();
                                                    		    var dateProduction = $(this).closest("tr").find("#dateProduction").val();
                                                    		    
                                                                var plan = $(this).closest("tr").find("#plan").val();
                                                                var fact = $(this).closest("tr").find("#fact").val();
                                                                var plan_teamA = $(this).closest("tr").find("#plan_teamA").val();
                                                                var fact_teamA = $(this).closest("tr").find("#fact_teamA").val();
                                                                /*var plan_teamB = $(this).closest("tr").find("#plan_teamB").val();
                                                                var fact_teamB = $(this).closest("tr").find("#fact_teamB").val();*/
                                                                /*var plan_total = $(this).closest("tr").find("#plan_total").val();
                                                                
                                                                var plan_total = $(this).closest("tr").find("#plan_total").val();*/
                                                                var deviation = $(this).closest("tr").find("#deviation").val();
                                                                
                                                                var OEE_teamA = $(this).closest("tr").find("#OEE_teamA").val();
                                                                var innotech1_teamA = $(this).closest("tr").find("#innotech1_teamA").val();
                                                                var innotech2_teamA = $(this).closest("tr").find("#innotech2_teamA").val();
                                                                var innotech3_teamA = $(this).closest("tr").find("#innotech3_teamA").val();
                                                                var uva4_teamA = $(this).closest("tr").find("#uva4_teamA").val();
                                                                var uva5_teamA = $(this).closest("tr").find("#uva5_teamA").val();
                                                                var acma_teamA = $(this).closest("tr").find("#acma_teamA").val();
                                                                
                                                                /*var oee_teamB = $(this).closest("tr").find("#oee_teamB").val();
                                                                var innotech1_teamB = $(this).closest("tr").find("#innotech1_teamB").val();
                                                                var innotech2_teamB = $(this).closest("tr").find("#innotech2_teamB").val();
                                                                var innotech3_teamB = $(this).closest("tr").find("#innotech3_teamB").val();
                                                                var uva4_teamB = $(this).closest("tr").find("#uva4_teamB").val();
                                                                var uva5_teamB = $(this).closest("tr").find("#uva5_teamB").val();
                                                                var acma_teamB = $(this).closest("tr").find("#acma_teamB").val();*/
                                                                
                                                                var oee_total = $(this).closest("tr").find("#oee_total").val();
                                                                var comment = $(this).closest("tr").find("#comment").val();
                                                    			$.ajax(
                                                                    {type: 'POST',
                                                                        dataType: 'html',
                                                                        url: 'updateProduction.php',
                                                                        
                                                                        data: ({dateProduction:dateProduction, 
                                                                        
                                                                                plan:plan,
                                                                                fact:fact,
                                                                                plan_teamA:plan_teamA,
                                                                                fact_teamA:fact_teamA,
                                                                                /*plan_teamB:plan_teamB,
                                                                                fact_teamB:fact_teamB,*/
                                                                               
                                                                                
                                                                               
                                                                                deviation:deviation,
                                                                                
                                                                                OEE_teamA:OEE_teamA,
                                                                                innotech1_teamA:innotech1_teamA,
                                                                                innotech2_teamA:innotech2_teamA,
                                                                                innotech3_teamA:innotech3_teamA,
                                                                                uva4_teamA:uva4_teamA,
                                                                                uva5_teamA:uva5_teamA,
                                                                                acma_teamA:acma_teamA,
                                                                                
                                                                                /*oee_teamB:oee_teamB,
                                                                                innotech1_teamB:innotech1_teamB,
                                                                                innotech2_teamB:innotech2_teamB,
                                                                                innotech3_teamB:innotech3_teamB,
                                                                                uva4_teamB:uva4_teamB,
                                                                                uva5_teamB:uva5_teamB,
                                                                                acma_teamB:acma_teamB,*/
                                                                                oee_total:oee_total,
                                                                                comment:comment,
                                                                                idProduction:idProduction}),
                                                                        success: function(response) 
                                                                        {
                                                                            $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                                                            var data = JSON.parse(response);}});});});
                                            </script>
                                            <script>
                                    $(document).ready(function() {
                                      $(".deleteProduction").click(function() {
                                        var deleteUser = $(this).val();
                                        var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                                        $.ajax({
                                          type: 'POST',
                                          dataType: 'html',
                                          url: 'deleteRowProduction.php',
                                          data: {idUser: deleteUser},
                                          success: function(response) {
                                            var data = JSON.parse(response);
                                            row.remove(); // удаляем строку таблицы
                                            $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                                          }
                                        });
                                      });
                                    });
                                    </script>
                
            </div>
</div>

            <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
        <script>
        var myVar;
        function myFunction() 
        {
            myVar = setTimeout(showPage, 3000);
        }
        function showPage() 
        {
          document.getElementById("myDiv").style.display = "block";
        }
    </script>
    </body>
</html>