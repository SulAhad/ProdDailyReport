<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">  
    <head class=""><?php require('head.php')?></head>  
    <body class="container">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <div class="alert alert-success" style="display:none; position: fixed; top: 0; right: 0;">Данные успешно сохранены!</div>
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12 bg-light">
                        <p style="font-size:30px; border-bottom: 1px solid #f00;">Активная вода</p>
                            <fieldset class="form-group border card shadow-sm">
                                <div class="col-md-4">
                                    <label for="date" style="font-size:12px;" class="m-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d');?>" id="date" class="form-control m-1" 
                                            max="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" min="<?php echo date('Y-m-d', strtotime('-4 days')); ?>" onkeydown="return false" class="form-control mt-1" onchange="fetchData()">
                                </div>
                                <script>window.onload = function() {fetchData();};</script>
                                <script>
                                    function fetchData() {
                                        var selectedDate = document.getElementById("date").value;

                                            var xhttp = new XMLHttpRequest();
                                          
                                            xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("table").innerHTML = this.responseText;
                                                }
                                            };
                                            xhttp.open("GET", "fetchDataRedactActiveWater.php?date=" + selectedDate, true);
                                            xhttp.send();
                                        }
                                </script>
                                <div class="table-responsive mt-4">
                                    <table class="table-hover table-bordered table table-sm ">
                                        <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                            <th>
                                                <td>63 +16 м3</td>
                                                <td>250 м3</td>
                                                <td>75 м3 (ХР)</td>
                                            </th>
                                        </thead>
                                        <tbody id="table">
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                    </div>
                    <button style="width:200px;" type="button" class="add_activ_water btn btn-outline-success m-3">Сохранить</button>
                    <script>
        $(document).ready
            (function() 
                {
                    $(".add_activ_water").click
                    (
                		function()
                		{
                		    var date = document.getElementById('date');
                		    var w1 = document.getElementById('w1');
                		    var w2 = document.getElementById('w2');
                		    var w3 = document.getElementById('w3');
                		    var w4 = document.getElementById('w4');
                		    var w5 = document.getElementById('w5');
                		    var w6 = document.getElementById('w6');
                            $.ajax(
                            {
                                type: 'POST',
                                dataType: 'html',
                                url: 'addActive_water.php',
                                data: ({date:date.value, 
                                w1:w1.value, 
                                w2:w2.value, 
                                w3:w3.value, 
                                w4:w4.value, 
                                w5:w5.value, 
                                w6:w6.value}),
                                success: function(response) 
                                {
                                    var data = JSON.parse(response);
                                    w1:w1.value = "0";
                                    w2:w2.value = "0";
                                    w3:w3.value = "0";
                                    w4:w4.value = "0";
                                    w5:w5.value = "0";
                                    w6:w6.value = "0";
                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                }
                            });
                        }
            	    );
                }
            );
        </script>
                </form>
            </div>
        </div>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>