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
                <p style="font-size:30px; border-bottom: 1px solid #f00;">Безопасность</p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th style="writing-mode:vertical-rl">Дата</th>
                                            <th style="writing-mode:vertical-rl">Incedents</th>
                                            <th style="writing-mode:vertical-rl">Near miss</th>
                                            <th style="writing-mode:vertical-rl">BBSWA</th>
                                            <th style="writing-mode:vertical-rl">Количество замечаний</th>
                                             
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний team A</th>
                                            <th style="writing-mode:vertical-rl">BBSWA</th>
                                            <th style="writing-mode:vertical-rl">R&PM Замечания</th>
                                            <th style="writing-mode:vertical-rl">R&PM BBSWA</th>
                                             
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний team B</th>
                                            <th style="writing-mode:vertical-rl">BBSWA</th>
                                            <th style="writing-mode:vertical-rl">R&PM Замечания</th>
                                            <th style="writing-mode:vertical-rl">R&PM BBSWA</th>
                                          
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний Сульф</th>
                                            <th style="writing-mode:vertical-rl">BBSWA</th>
                                            <th style="writing-mode:vertical-rl">R&PM Замечания</th>
                                            <th style="writing-mode:vertical-rl">R&PM BBSWA</th>
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody onload="myFunction()" class="animate-bottom">
                                    <?php
                                    $message = "SELECT * FROM Safety_KPI ORDER BY date DESC";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo"<tr>";
                                                            echo"<td><input type='date' class='form-control' required min='0' style='border:none; width:100%;' id='dateSafety' value='$row[date]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Incedents_comment]' required min='0' style='border:none; width:100%;'   id='Incedents' value='$row[Incedents]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[NearMiss_comment]' required min='0' style='border:none; width:100%;'   id='NearMiss'value='$row[NearMiss]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Bbswa_comment]' required min='0' style='border:none; width:100%;'   id='Bbswa'value='$row[Bbswa]'        ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Kol_vo_zam_comment]' required min='0' style='border:none; width:100%;'   id='Kol_vo_zam'value='$row[Kol_vo_zam]'   ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Kol_zam_teamA_comment]' required min='0' style='border:none; width:100%;'   id='Kol_zam_teamA'value='$row[Kol_zam_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Bbs_teamA_comment]' required min='0' style='border:none; width:100%;'   id='Bbs_teamA'value='$row[Bbs_teamA]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_zam_teamA_comment]' required min='0' style='border:none; width:100%;'   id='Rpm_zam_teamA'value='$row[Rpm_zam_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_bbs_teamA_comment]' required min='0' style='border:none; width:100%;'   id='Rpm_bbs_teamA'value='$row[Rpm_bbs_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_bbs_teamA_comment]' required min='0' style='border:none; width:100%;' readonly   id='Kol_zam_teamB'value='$row[Kol_zam_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Bbs_teamB_comment]' required min='0' style='border:none; width:100%;' readonly id='Bbs_teamB'value='$row[Bbs_teamB]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_zam_teamB_comment]' required min='0' style='border:none; width:100%;' readonly  id='Rpm_zam_teamB'value='$row[Rpm_zam_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_bbs_teamB_comment]' required min='0' style='border:none; width:100%;' readonly  id='Rpm_bbs_teamB'value='$row[Rpm_bbs_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Kol_zam_Sulf_comment]' required min='0' style='border:none; width:100%;'   id='Kol_zam_Sulf' value='$row[Kol_zam_Sulf]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Bbs_Sulf_comment]' required min='0' style='border:none; width:100%;'   id='Bbs_Sulf'value='$row[Bbs_Sulf]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_zam_Sulf_comment]' required min='0' style='border:none; width:100%;'   id='Rpm_zam_Sulf'value='$row[Rpm_zam_Sulf]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' title='$row[Rpm_bbs_Sulf_comment]' required min='0' style='border:none; width:100%;'   id='Rpm_bbs_Sulf'value='$row[Rpm_bbs_Sulf]' ></input></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='updateSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='deleteSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
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
                                        <script>
                                            $(document).ready
                                                (function() 
                                                    {$(".updateSafety").click
                                                        (function()
                                                    		{
                                                    		    var idSafety = $(this).val();
                                                    		    var dateSafety = $(this).closest("tr").find("#dateSafety").val();
                                                                var Incedents = $(this).closest("tr").find("#Incedents").val();
                                                                
                                                                var NearMiss = $(this).closest("tr").find("#NearMiss").val();
                                                                
                                                                var Bbswa = $(this).closest("tr").find("#Bbswa").val();
                                                                var Kol_vo_zam = $(this).closest("tr").find("#Kol_vo_zam").val();
                                                                
                                                                var Kol_zam_teamA = $(this).closest("tr").find("#Kol_zam_teamA").val();
                                                                var Bbs_teamA = $(this).closest("tr").find("#Bbs_teamA").val();
                                                                var Rpm_zam_teamA = $(this).closest("tr").find("#Rpm_zam_teamA").val();
                                                                var Rpm_bbs_teamA = $(this).closest("tr").find("#Rpm_bbs_teamA").val();
                                                                
                                                                var Kol_zam_teamB = $(this).closest("tr").find("#Kol_zam_teamB").val();
                                                                var Bbs_teamB = $(this).closest("tr").find("#Bbs_teamB").val();
                                                                var Rpm_zam_teamB = $(this).closest("tr").find("#Rpm_zam_teamB").val();
                                                                var Rpm_bbs_teamB = $(this).closest("tr").find("#Rpm_bbs_teamB").val();
                                                                
                                                                var Kol_zam_Sulf = $(this).closest("tr").find("#Kol_zam_Sulf").val();
                                                                var Bbs_Sulf = $(this).closest("tr").find("#Bbs_Sulf").val();
                                                                var Rpm_zam_Sulf = $(this).closest("tr").find("#Rpm_zam_Sulf").val();
                                                                var Rpm_bbs_Sulf = $(this).closest("tr").find("#Rpm_bbs_Sulf").val();
                                                    			$.ajax(
                                                                    {type: 'POST',
                                                                        dataType: 'html',
                                                                        url: 'updateSafety.php',
                                                                        
                                                                        data: ({dateSafety:dateSafety, Incedents:Incedents,
                                                                        
                                                                                NearMiss:NearMiss,
                                                                                Bbswa:Bbswa,
                                                                                Kol_vo_zam:Kol_vo_zam,
                                         
                                                                                Kol_zam_teamA:Kol_zam_teamA,
                                                                                Bbs_teamA:Bbs_teamA,
                                                                                Rpm_zam_teamA:Rpm_zam_teamA,
                                                                                Rpm_bbs_teamA:Rpm_bbs_teamA,
                                             
                                                                                Kol_zam_teamB:Kol_zam_teamB,
                                                                                Bbs_teamB:Bbs_teamB,
                                                                                Rpm_zam_teamB:Rpm_zam_teamB,
                                                                                Rpm_bbs_teamB:Rpm_bbs_teamB,
                                                                                
                                                                                Kol_zam_Sulf:Kol_zam_Sulf,
                                                                                Bbs_Sulf:Bbs_Sulf,
                                                                                Rpm_zam_Sulf:Rpm_zam_Sulf,
                                                                                Rpm_bbs_Sulf:Rpm_bbs_Sulf,
                                                                                
                                                                                idSafety:idSafety}),
                                                                        success: function(response) 
                                                                        {
                                                                            var data = JSON.parse(response);}});});});
                                            </script>
                                        <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".deleteSafety").click
                                    (
                                		function()
                                		{
                                		    var deleteUser = this.value;
                                		    const { target } = event;
                                			$.ajax(
                                                {
                                                    type: 'POST',
                                                    dataType: 'html',
                                                    url: 'deleteRowSafety.php',
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
                    </div>
                </fieldset>
            </div>
        </div>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>