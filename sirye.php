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
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12 bg-light">
                        <p style="font-size:30px; border-bottom: 1px solid #f00;">Сырьё</p>
                            <fieldset class="form-group border card shadow-sm">
                                <div class="col-md-4">
                                    <label for="dateTime" style="font-size:12px;" class="m-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
                                </div>
                            <div class="table-responsive mt-4">
                                
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
                                    <tbody>
                                        <tr>
                                            <td>Брак СМС, т</td>
                                            <td><input required min="0" type="number" id="brak_sms_bilo" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sms_prihod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sms_rashod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sms_ostatok" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>Брак Сульфирование, т</td>
                                            <td><input required min="0" type="number" id="brak_sulf_bilo" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sulf_prihod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sulf_rashod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sulf_ostatok" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>Брак Сульфирование (на растворение), т</td>
                                            <td><input required min="0" type="number" id="brak_sulf_rastvor_bilo" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sulf_rastvor_prihod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sulf_rastvor_rashod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="brak_sulf_rastvor_ostatok" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>Изолятор, т</td>
                                            <td><input required min="0" type="number" id="isolator_bilo" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="isolator_prihod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="isolator_rashod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="isolator_ostatok" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>Пыль, т</td>
                                            <td><input required min="0" type="number" id="pil_bilo" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="pil_prihod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="pil_rashod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="pil_ostatok" class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>Отсев на растворение, т</td>
                                            <td><input required min="0" type="number" id="otsev_bilo" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="otsev_prihod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="otsev_rashod" class="form-control" required></td>
                                            <td><input required min="0" type="number" id="otsev_ostatok" class="form-control" required></td>
                                        </tr>
                                            </tbody>
                                        </table>
                                    </div>
                </fieldset>
                    </div>
                    <button style="width:200px;" type="button" class="add btn btn-outline-success m-3">Сохранить</button>
                    <script>
        $(document).ready
            (function() 
                {
                    $(".add").click
                    (
                		function()
                		{
                		    var dateTime = document.getElementById('dateTime');
                		    var brak_sms_bilo = document.getElementById('brak_sms_bilo');
                		    var brak_sms_prihod = document.getElementById('brak_sms_prihod');
                		    var brak_sms_rashod = document.getElementById('brak_sms_rashod');
                		    var brak_sms_ostatok = document.getElementById('brak_sms_ostatok');
                		    var brak_sulf_bilo = document.getElementById('brak_sulf_bilo');
                		    var brak_sulf_prihod = document.getElementById('brak_sulf_prihod');
                		    var brak_sulf_rashod = document.getElementById('brak_sulf_rashod');
                		    var brak_sulf_ostatok = document.getElementById('brak_sulf_ostatok');
                		    var brak_sulf_rastvor_bilo = document.getElementById('brak_sulf_rastvor_bilo');
                		    var brak_sulf_rastvor_prihod = document.getElementById('brak_sulf_rastvor_prihod');
                		    var brak_sulf_rastvor_rashod = document.getElementById('brak_sulf_rastvor_rashod');
                		    var brak_sulf_rastvor_ostatok = document.getElementById('brak_sulf_rastvor_ostatok');
                		    var isolator_bilo = document.getElementById('isolator_bilo');
                		    var isolator_prihod = document.getElementById('isolator_prihod');
                		    var isolator_rashod = document.getElementById('isolator_rashod');
                		    var isolator_ostatok = document.getElementById('isolator_ostatok');
                		    var pil_bilo = document.getElementById('pil_bilo');
                		    var pil_prihod = document.getElementById('pil_prihod');
                		    var pil_rashod = document.getElementById('pil_rashod');
                		    var pil_ostatok = document.getElementById('pil_ostatok');
                		    var otsev_bilo = document.getElementById('otsev_bilo');
                		    var otsev_prihod = document.getElementById('otsev_prihod');
                		    var otsev_rashod = document.getElementById('otsev_rashod');
                		    var otsev_ostatok = document.getElementById('otsev_ostatok');
                            $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: 'addSirye.php',
                                    data: ({dateTime:dateTime.value, brak_sms_bilo:brak_sms_bilo.value, 
                                    brak_sms_prihod:brak_sms_prihod.value, 
                                    brak_sms_rashod:brak_sms_rashod.value, 
                                    brak_sms_ostatok:brak_sms_ostatok.value,
                                    brak_sulf_bilo:brak_sulf_bilo.value, 
                                    brak_sulf_prihod:brak_sulf_prihod.value, 
                                    brak_sulf_rashod:brak_sulf_rashod.value, 
                                    brak_sulf_ostatok:brak_sulf_ostatok.value, 
                                    brak_sulf_rastvor_bilo:brak_sulf_rastvor_bilo.value, 
                                    brak_sulf_rastvor_prihod:brak_sulf_rastvor_prihod.value, 
                                    brak_sulf_rastvor_rashod:brak_sulf_rastvor_rashod.value, 
                                    brak_sulf_rastvor_ostatok:brak_sulf_rastvor_ostatok.value, 
                                    isolator_bilo:isolator_bilo.value, 
                                    isolator_prihod:isolator_prihod.value, 
                                    isolator_rashod:isolator_rashod.value, 
                                    isolator_ostatok:isolator_ostatok.value, 
                                    pil_bilo:pil_bilo.value, 
                                    pil_prihod:pil_prihod.value, 
                                    pil_rashod:pil_rashod.value, 
                                    pil_ostatok:pil_ostatok.value, 
                                    otsev_bilo:otsev_bilo.value, 
                                    otsev_prihod:otsev_prihod.value, 
                                    otsev_rashod:otsev_rashod.value, 
                                    otsev_ostatok:otsev_ostatok.value}),
                                    success: function(response) 
                                    {
                                        var data = JSON.parse(response);
                                        brak_sms_bilo.value = "";
                                        brak_sms_prihod.value = "";
                                        brak_sms_rashod.value = "";
                                        brak_sms_ostatok.value = "";
                                        brak_sulf_bilo.value = "";
                                        brak_sulf_prihod.value = "";
                                        brak_sulf_rashod.value = "";
                                        brak_sulf_ostatok.value = "";
                                        brak_sulf_rastvor_bilo.value = "";
                                        brak_sulf_rastvor_prihod.value = "";
                                        brak_sulf_rastvor_rashod.value = "";
                                        brak_sulf_rastvor_ostatok.value = "";
                                        isolator_bilo.value = "";
                                        isolator_prihod.value = "";
                                        isolator_rashod.value = "";
                                        isolator_ostatok.value = "";
                                        pil_bilo.value = "";
                                        pil_prihod.value = "";
                                        pil_rashod.value = "";
                                        pil_ostatok.value = "";
                                        otsev_bilo.value = "";
                                        otsev_prihod.value = "";
                                        otsev_rashod.value = "";
                                        otsev_ostatok.value = "";
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
        <div class="alert alert-success" style="display:none;">
         Данные успешно отправлены!
        </div>

        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>