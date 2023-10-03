<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head><?php require('head.php')?></head>  
    <body class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12 bg-light"><p style="font-size:30px; border-bottom: 1px solid #f00;">ТОП-5 ПРОБЛЕМ</p>
                <div class="alert alert-success" style="display:none; position: fixed; top: 0; right: 0;">Данные успешно отправлены!</div>
                <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                    <div class="table-responsive">
                        <table class="table-hover table-bordered table table-sm ">
                            <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                <tr>
                                    <th><p style="text-align: center">Описание проблемы</p></th>
                                    <th><p style="text-align: center">Оператор линии</p></th>
                                    <th><p style="text-align: center">Причина</p></th>
                                    <th><p style="text-align: center">Непосредственное действие</p></th>
                                    <th><p style="text-align: center">Устранил</p></th>
                                    <th><p style="text-align: center">Коренная причина</p></th>
                                    <th><p style="text-align: center">Действие</p></th>
                                    <th><p style="text-align: center">Ответственный</p></th>
                                    <th><p style="text-align: center">Район / Участок</p></th>
                                    <th><p style="text-align: center">Простой, мин.</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><textarea id="description_problem" style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><textarea id="operator"            style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><textarea id="cause"               style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><textarea id="immediate_action"    style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><textarea id="eliminated"          style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><textarea id="root_cause"          style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><textarea id="action"              style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td>
                                        <select id="responce" class="form-select" aria-label="Default select example" autocomplete="on"> 
                                            <option value=""></option> 
                                            <option value="sergej.adushkin@lab-industries.ru"   >Адушкин С   </option> 
                                            <option value="vladimir.kaldin@lab-industries.ru"   >Калдин В    </option> 
                                            <option value="ilya.ragimov@lab-industries.ru"      >Рагимов И   </option> 
                                            <option value="valerij.kanskij@lab-industries.ru"   >Канский В   </option> 
                                            <option value="dmitrij.kanskij@lab-industries.ru"   >Канский Д   </option> 
                                            <option value="leonid.kolchin@lab-industries.ru"    >Колчин Л    </option> 
                                            <option value="alexey.kostin@lab-industries.ru"     >Костин А    </option> 
                                            <option value="inna.khritova@lab-industries.ru"     >Хритова И   </option> 
                                            <option value="sergej.bodryago@lab-industries.ru"   >Бодряго С   </option> 
                                            <option value="viktor.ovchinnikov@lab-industries.ru">Овчинников В</option> 
                                            <option value="dmitrij.nefedov@lab-industries.ru"   >Нефедов Д   </option> 
                                            <option value="anton.maksimov@lab-industries.ru"    >Максимов А  </option> 
                                            <option value="ivan.mikhajlov@lab-industries.ru"    >Михайлов И  </option> 
                                            <option value="elena.pertseva@lab-industries.ru"    >Перцева Е   </option>
                                            <option value="akhad.suleymanov@lab-industries.ru"  >Сулейманов А</option>
                                        </select>
                                    </td>
                                    <td><textarea id="area"                style="height:40px;"    type="text"   class="form-control"></textarea></td>
                                    <td><input    id="downtime"            style="height:40px;"    type="number" class="form-control"/></td>
                                </tr>
                            </tbody>
                        </table>
                        <button style="width:200px;" type="button" id="myButton" class="add btn btn-outline-success m-3">Сохранить</button>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <fieldset class="form-group border p-3 m-1 card shadow-sm">
                    <div class="table-responsive">
                        <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th><p style="text-align: center">Дата</p></th>
                                            <th><p style="text-align: center">Описание проблемы</p></th>
                                            <th><p style="text-align: center">Оператор линии</p></th>
                                            <th><p style="text-align: center">Причина</p></th>
                                            <th><p style="text-align: center">Непосредственное действие</p></th>
                                            <th><p style="text-align: center">Устранил</p></th>
                                            <th><p style="text-align: center">Коренная причина</p></th>
                                            <th><p style="text-align: center">Действие</p></th>
                                            <th><p style="text-align: center">Ответственный</p></th>
                                            <th><p style="text-align: center">Район / Участок</p></th>
                                            <th><p style="text-align: center">Простой, мин.</p></th>
                                            <th><p style="text-align: center">Изменить</p></th>
                                            <th><p style="text-align: center">Удалить</p></th>
                                        </tr>
                                    </thead>
                                    <tbody onload="myFunction()" class="animate-bottom">
                                        <style>
                                            p{
                                                margin: 1px;
                                                margin: 1em;
                                                font-size:12px;
                                            }
                                            .fontTr
                                           {
                                               font-size:12px;
                                           }
                                        </style>
                                    <?php
                                    $message = "SELECT * FROM Top5Problem ORDER BY date DESC";
                                    $link->set_charset("utf8");
                                    $result =  mysqli_query( $link,  $message);
                                    while($row = mysqli_fetch_assoc($result))
                                    { 
                                        $date = $row['date'];
                                        $readonly = '';
                                        if (strtotime($date) < strtotime('-5 days')) 
                                        {
                                            $readonly = 'readonly';
                                        }
                                        echo "<tr>";
                                        $minDate = date('Y-m-d', strtotime('-4 days')); // вычисляем минимальную дату
                                        if ($readonly == '') 
                                        {
                                            echo"<td><input type='date' class='fontTr form-control' style='border:none;'   id='input_date'                value='$row[date]'    ></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_description_problem' value='$row[description_problem]'     ></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_operator'            value='$row[operator]'        ></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_cause'               value='$row[cause]' /></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_immediate_action'    value='$row[immediate_action]'></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_eliminated'          value='$row[eliminated]'    ></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_root_cause'          value='$row[root_cause]'></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_action'              value='$row[action]'></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_responce'            value='$row[responce]'></input></td>";
                                            echo"<td><input type='text' class='fontTr form-control' style='border:none;'   id='input_area'                value='$row[area]'></input></td>";
                                            echo"<td><input type='number' class='fontTr form-control' style='border:none;' id='input_downtime'            value='$row[downtime]'></input></td>";
                                            echo"<td><button type='button' class='updateTop5Problem btn btn-outline btn-sm btn-light' value='$row[id]'><img src='change.jpg' style='height:16px;'></button></td>";
                                            echo"<td><button type='button' class='deleteTop5Problem btn btn-outline btn-sm btn-light' value='$row[id]'><img src='trash.png'  style='height:16px;'></button></td>";
                                        } 
                                        else 
                                        {
                                            echo "<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                            echo "<td><p>$row[description_problem]</p></td>";
                                            echo "<td><p>$row[operator]</p></td>";
                                            echo "<td><p>$row[cause]</p></td>";
                                            echo "<td><p>$row[immediate_action]</p></td>";
                                            echo "<td><p>$row[eliminated]</p></td>";
                                            echo "<td><p>$row[root_cause]</p></td>";
                                            echo "<td><p>$row[action]</p></td>";
                                            echo "<td><p>$row[responce]</p></td>";
                                            echo "<td><p>$row[area]</p></td>";
                                            echo "<td><p>$row[downtime]</p></td>";
                                        }
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
        <script>
            $(document).ready(function() 
            {
                $(".add").click(function()
        		{   
        		    var description_problem = document.getElementById('description_problem');
        		    var operator = document.getElementById('operator');
        		    var cause = document.getElementById('cause');
        		    var immediate_action = document.getElementById('immediate_action');
        		    var eliminated = document.getElementById('eliminated');
        		    var root_cause = document.getElementById('root_cause');
        		    var action = document.getElementById('action');
        		    var responce = document.getElementById('responce');
        		    var area = document.getElementById('area');
        		    var downtime = document.getElementById('downtime');
        		    var email_name = 'Замечание по листу Топ 5 проблем';
                    var email_email = "Топ-5 проблем";
                    var email_address = document.getElementById('responce');
                    var email_message = 'Описание проблемы: ' + description_problem.value + "\r\n"  
                    + 'Оператор линии: ' + operator.value + "\r\n"  
                    + 'Причина: ' + cause.value + "\r\n"  
                    + 'Непосредственное действие: ' + immediate_action.value + "\r\n"  
                    + 'Устранил: ' + eliminated.value + "\r\n"  
                    + 'Коренная причина: ' + root_cause.value + "\r\n"  
                    + 'Действие: ' + action.value + "\r\n"  
                    + 'Район / Участок: ' + area.value + "\r\n"  
                    + 'Простой, мин.: ' + downtime.value;
                    $.ajax(
                    {
                        type: 'POST',
                        url: 'send_email.php',
                        data: 
                        {
                            email_name: email_name,
                            email_email: email_email,
                            email_address: email_address.value,
                            email_message: email_message
                        },
                        success: function(response) 
                        {
                            $('#response').html(response);
                        }
                    });
                    $.ajax(
                    {
                        type: 'POST',
                        dataType: 'html',
                        url: 'addTop5Problem.php',
                        data: (
                            {
                                description_problem:description_problem.value, 
                                operator:operator.value, 
                                cause:cause.value, 
                                immediate_action:immediate_action.value, 
                                eliminated:eliminated.value, 
                                root_cause:root_cause.value, 
                                action:action.value, 
                                responce:responce.value,
                                area:area.value,
                                downtime:downtime.value
                            }),
                            success: function(response) 
                            {   
                                description_problem.value = "";
                                operator.value = "";
                                cause.value = "";
                                immediate_action.value = "";
                                eliminated.value = "";
                                root_cause.value = "";
                                action.value = "";
                                responce.value = "";
                                area.value = "";
                                downtime.value = "";
                                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                // Добавление новой строки в таблицу
                                var data = JSON.parse(response);
                                var newRow = "<tr><td><input id='input_date' class='fontTr form-control' style='border:none;' type='date' value='" + 
                                  data.date + "'></input></td><td><input style='border:none;' id='input_description_problem'  class='fontTr form-control' value='" + 
                                  data.description_problem + "'></input></td><td style='border:none;'><input id='input_operator'  style='border:none;'  class='fontTr form-control' value='" + 
                                  data.operator + "'></input></td><td><input style='border:none;' id='input_cause'   class='fontTr form-control' value='" + 
                                  data.cause + "'></input></td><td><input style='border:none;' id='input_immediate_action' class='fontTr form-control' value='" + 
                                  data.immediate_action + "'></input></td><td><input id='input_eliminated' style='border:none;'  class='fontTr form-control' value='" + 
                                  data.eliminated + "'></input></td><td><input id='input_root_cause'  style='border:none;' class='fontTr form-control' value='" + 
                                  data.root_cause + "'></input></td><td><input id='input_action' style='border:none;' class='fontTr form-control' value='" + 
                                  data.action + "'></input></td><td><input id='input_responce' style='border:none;'  class='fontTr form-control' value='" + 
                                  data.responce + "'></input></td><td><input id='input_area'  style='border:none;'  class='fontTr form-control' value='" + 
                                  data.area + "'></input></td><td><input id='input_downtime' type='number' style='border:none;' class='fontTr form-control' value='" + 
                                  data.downtime + "'></input></td><td><button type='button' class='fontTr updateTop5Problem btn btn-outline btn-sm btn-light' value='" + 
                                  data.id + "'><img src='change.jpg' style='height:13px;'></button></td><td style='font-size:10px;'><button type='button' class='deleteTop5Problem btn btn-outline btn-sm btn-light' value='" + 
                                  data.id + "'><img src='trash.png' style='height:13px;'></button></td></tr>";
                                $('#myTable tbody').prepend(newRow);
                            }
                        });
        		    });
                });
        </script>
        <script>
            $(document).on("click", ".deleteTop5Problem", function() 
            {
                var deleteUser = this.value;
                var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                $.ajax(
                    {
                        type: 'POST',
                        dataType: 'html',
                        url: 'deleteTop5Problem.php',
                        data: 
                        { 
                            idUser: deleteUser 
                        },
                        success: function(response) 
                        {
                            var data = JSON.parse(response);
                            row.remove(); // удаляем строку таблицы
                        }
                    });
            });

        </script>
        <script>
            $(document).on("click", ".updateTop5Problem", function() 
            {
                var idTop5Problem = $(this).val();
                var input_date = $(this).closest("tr").find("#input_date").val();
                var input_description_problem = $(this).closest("tr").find("#input_description_problem").val();
                var input_operator = $(this).closest("tr").find("#input_operator").val();
                var input_cause = $(this).closest("tr").find("#input_cause").val();
                var input_immediate_action = $(this).closest("tr").find("#input_immediate_action").val();
                var input_eliminated = $(this).closest("tr").find("#input_eliminated").val();
                var input_root_cause = $(this).closest("tr").find("#input_root_cause").val();
                var input_action = $(this).closest("tr").find("#input_action").val();
                var input_responce = $(this).closest("tr").find("#input_responce").val();
                var input_area = $(this).closest("tr").find("#input_area").val();
                var input_downtime = $(this).closest("tr").find("#input_downtime").val();
                $.ajax(
                    {
                        type: 'POST',
                        dataType: 'html',
                        url: 'updateTop5Problem.php',
                        data: 
                        {
                            id: idTop5Problem,
                            input_date: input_date,
                            input_description_problem: input_description_problem,
                            input_operator: input_operator,
                            input_cause: input_cause,
                            input_immediate_action: input_immediate_action,
                            input_eliminated: input_eliminated,
                            input_root_cause: input_root_cause,
                            input_action: input_action,
                            input_responce: input_responce,
                            input_area: input_area,
                            input_downtime: input_downtime
                        },
                        success: function(response) 
                        {
                            var data = JSON.parse(response);
                        }
                    });
            });
        </script>
        <div id="loader-overlayX">
        <div id="loaderX"></div>
    </div>
    </body>
</html>