<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head ><?php require('head.php')?></head>  
    <body class="container">
        <div class="row bg-light card shadow-sm">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                            <div data-bs-interval="9999999" class="carousel-item active">
                                <div class="col-md-12">
                                    <div class="row">
                                        <p class="namesForTitle">Безопасность</p>
                                        <div class="col-md-6 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="col-md-12">
                                                    <label style="font-size:12px;" for="dateTime" class="mt-2">Выберите дату</label>
                                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="borderSolid form-control mt-1">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group row">
                                                            <label for="Incedents" class="col-sm-5 col-form-label mt-4">Инциденты</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" type="number" id="Incedents" class="borderSolid form-control mt-4" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="NearMiss" class="col-sm-5 col-form-label mt-2">Действия на грани риска</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" type="number" id="NearMiss" class="borderSolid form-control mt-2" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Bbswa" class="col-sm-5 col-form-label mt-2">Обход по безопасности</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" readonly type="number" id="Bbswa" class="borderSolid form-control mt-2" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Kol_vo_zam" class="col-sm-5 col-form-label mt-2">Количество замечаний</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" readonly type="number" id="Kol_vo_zam" class="borderSolid form-control mt-2" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">СМС</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamA" class="mt-2">Кол-во замечаний</label>
                                                    <input type="number" required min="0" id="Kol_zam_teamA" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" >
                                                    <label style="font-size:12px;" for="Bbs_teamA" class="mt-2">Обход по безопасности</label>
                                                    <input type="number" required min="0" id="Bbs_teamA" class="borderSolid form-control mt-1" placeholder="обход по безопасности" >
                                                    <label style="font-size:12px;" for="Rpm_zam_teamA" class="mt-2">R&PM Замечания</label>
                                                    <input type="number" required min="0" id="Rpm_zam_teamA" class="borderSolid form-control mt-1" placeholder="r&pm замечания" >
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamA" class="mt-2">R&PM BBSWA</label>
                                                    <input type="number" required min="0" id="Rpm_bbs_teamA" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" >
                                                </div>
                                            </fieldset>
                                        </div>
                                        <!--<div class="col-md-2 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamB" class="mt-2">Кол-во замечаний</label>
                                                    <input readonly type="number" required min="0" id="Kol_zam_teamB" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" >
                                                    <label style="font-size:12px;" for="Bbs_teamB" class="mt-2">Обход по безопасности</label>
                                                    <input readonly type="number" required min="0" id="Bbs_teamB" class="borderSolid form-control mt-1" placeholder="обход по безопасности" >
                                                    <label style="font-size:12px;" for="Rpm_zam_teamB" class="mt-2">R&PM Замечания</label>
                                                    <input readonly type="number" required min="0" id="Rpm_zam_teamB" class="borderSolid form-control mt-1" placeholder="r&pm замечания" >
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamB" class="mt-2">R&PM BBSWA</label>
                                                    <input readonly type="number" required min="0" id="Rpm_bbs_teamB" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" >
                                                </div>
                                            </fieldset>
                                        </div>-->
                                        <div class="col-md-3 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Сульфирование</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_Sulf" class="mt-2">Кол-во замечаний</label>
                                                    <input type="number" min="0" id="Kol_zam_Sulf" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" >
                                                    <label style="font-size:12px;" for="Bbs_Sulf" class="mt-2">Обход по безопасности</label>
                                                    <input type="number" min="0" id="Bbs_Sulf" class="borderSolid form-control mt-1" placeholder="обход по безопасности" >
                                                    <label style="font-size:12px;" for="Rpm_zam_Sulf" class="mt-2">R&PM Замечания</label>
                                                    <input type="number" min="0" id="Rpm_zam_Sulf" class="borderSolid form-control mt-1" placeholder="r&pm замечания" >
                                                    <label style="font-size:12px;" for="Rpm_bbs_Sulf" class="mt-2">R&PM BBSWA</label>
                                                    <input type="number" min="0" id="Rpm_bbs_Sulf" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" >
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-bs-interval="9999999" class="carousel-item">
                                <div class="col-md-12">
                                    <div class="row">
                                        <p style="font-size:30px; border-bottom: 1px solid #f00;">комментарии</p>
                                        <div class="col-md-6 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group row">
                                                            <label for="Incedents_comment" class="col-sm-5 col-form-label mt-4">Инциденты</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0" type="text" id="Incedents_comment" class="borderSolid form-control mt-4" placeholder="комментарий"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="NearMiss_comment" class="col-sm-5 col-form-label mt-2">Действия на грани риска</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0" type="text" id="NearMiss_comment" class="borderSolid form-control mt-2" placeholder="комментарий" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Bbswa_comment" class="col-sm-5 col-form-label mt-2">Обход по безопасности</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0"  type="text" id="Bbswa_comment" class="borderSolid form-control mt-2" placeholder="комментарий" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Kol_vo_zam_comment" class="col-sm-5 col-form-label mt-2">Количество замечаний</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0"  type="text" id="Kol_vo_zam_comment" class="borderSolid form-control mt-2" placeholder="комментарий" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">СМС</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamA_comment" class="mt-2">Кол-во замечаний</label>
                                                    <textarea type="text" min="0" id="Kol_zam_teamA_comment" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" ></textarea>
                                                    <label style="font-size:12px;" for="Bbs_teamA_comment" class="mt-2">Обход по безопасности</label>
                                                    <textarea type="text" min="0" id="Bbs_teamA_comment" class="borderSolid form-control mt-1" placeholder="обход по безопасности" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_zam_teamA_comment" class="mt-2">R&PM Замечания</label>
                                                    <textarea type="text" min="0" id="Rpm_zam_teamA_comment" class="borderSolid form-control mt-1" placeholder="r&pm замечания" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamA_comment" class="mt-2">R&PM BBSWA</label>
                                                    <textarea type="text" min="0" id="Rpm_bbs_teamA_comment" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" ></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <!--<div class="col-md-2 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamB_comment" class="mt-2">Кол-во замечаний</label>
                                                    <textarea readonly type="text" min="0" id="Kol_zam_teamB_comment" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" ></textarea>
                                                    <label style="font-size:12px;" for="Bbs_teamB_comment" class="mt-2">Обход по безопасности</label>
                                                    <textarea readonly type="text" min="0" id="Bbs_teamB_comment" class="borderSolid form-control mt-1" placeholder="обход по безопасности" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_zam_teamB_comment" class="mt-2">R&PM Замечания</label>
                                                    <textarea readonly type="text" min="0" id="Rpm_zam_teamB_comment" class="borderSolid form-control mt-1" placeholder="r&pm замечания" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamB_comment" class="mt-2">R&PM BBSWA</label>
                                                    <textarea readonly type="text" min="0" id="Rpm_bbs_teamB_comment" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" ></textarea>
                                                </div>
                                            </fieldset>
                                        </div>-->
                                        <div class="col-md-3 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Сульфирование</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_Sulf_comment" class="mt-2">Кол-во замечаний</label>
                                                    <textarea type="text" min="0" id="Kol_zam_Sulf_comment" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" ></textarea>
                                                    <label style="font-size:12px;" for="Bbs_Sulf_comment" class="mt-2">Обход по безопасности</label>
                                                    <textarea type="text" min="0" id="Bbs_Sulf_comment" class="borderSolid form-control mt-1" placeholder="обход по безопасности" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_zam_Sulf_comment" class="mt-2">R&PM Замечания</label>
                                                    <textarea type="text" min="0" id="Rpm_zam_Sulf_comment" class="borderSolid form-control mt-1" placeholder="r&pm замечания" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_bbs_Sulf_comment" class="mt-2">R&PM BBSWA</label>
                                                    <textarea type="text" min="0" id="Rpm_bbs_Sulf_comment" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" ></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--<a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-prev" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </a>-->
                    <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-next" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                <button style="width:200px;" type="button" class="add btn btn-outline-success m-3">Сохранить</button>    
            </div>
            <script>
            const Bbs_teamA = document.getElementById("Bbs_teamA");
            const Bbs_Sulf = document.getElementById("Bbs_Sulf");
            const Bbswa = document.getElementById("Bbswa");        
            
            const updateBbswa = () => {
              const sum = Number(Bbs_teamA.value) + Number(Bbs_Sulf.value);
              Bbswa.value = sum;
            };
            Bbs_teamA.addEventListener("input", () => {
              updateBbswa();
            });
            Bbs_Sulf.addEventListener("input", () => {
              updateBbswa();
            });
            
            const Kol_zam_teamA = document.getElementById("Kol_zam_teamA");
            const Kol_zam_Sulf = document.getElementById("Kol_zam_Sulf");
            const Kol_vo_zam = document.getElementById("Kol_vo_zam");        
            
            const update_Kol_vo_zam = () => 
            {
                const sum = Number(Kol_zam_teamA.value) + Number(Kol_zam_Sulf.value);
                Kol_vo_zam.value = sum;
            };
            
            Kol_zam_teamA.addEventListener("input", () => {
              update_Kol_vo_zam();
            });
            Kol_zam_Sulf.addEventListener("input", () => {
              update_Kol_vo_zam();
            });
            </script>
        </div>
        <div class="alert alert-success mt-4" style="display:none;">
                    Данные успешно отправлены!
            </div>
        <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".delete").click
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
        <script>
        $(document).ready
            (function() 
                {
                    $(".add").click
                    (
                		function()
                		{
                		    var dateTime = document.getElementById('dateTime');
                		    
                		    var Incedents = document.getElementById('Incedents');
                		    var NearMiss = document.getElementById('NearMiss');
                		    var Bbswa = document.getElementById('Bbswa');
                		    var Kol_vo_zam = document.getElementById('Kol_vo_zam');
                		    
                		    var Kol_zam_teamA = document.getElementById('Kol_zam_teamA');
                		    var Bbs_teamA = document.getElementById('Bbs_teamA');
                		    var Rpm_zam_teamA = document.getElementById('Rpm_zam_teamA');
                		    var Rpm_bbs_teamA = document.getElementById('Rpm_bbs_teamA');
                		   /* 
                		    var Kol_zam_teamB = document.getElementById('Kol_zam_teamB');
                		    var Bbs_teamB = document.getElementById('Bbs_teamB');
                		    var Rpm_zam_teamB = document.getElementById('Rpm_zam_teamB');
                		    var Rpm_bbs_teamB = document.getElementById('Rpm_bbs_teamB');*/
                		    
                		    var Kol_zam_Sulf = document.getElementById('Kol_zam_Sulf');
                		    var Bbs_Sulf = document.getElementById('Bbs_Sulf');
                		    var Rpm_zam_Sulf = document.getElementById('Rpm_zam_Sulf');
                		    var Rpm_bbs_Sulf = document.getElementById('Rpm_bbs_Sulf');
                		    
                		    var Incedents_comment = document.getElementById('Incedents_comment');
                		    var NearMiss_comment = document.getElementById('NearMiss_comment');
                		    var Bbswa_comment = document.getElementById('Bbswa_comment');
                		    var Kol_vo_zam_comment = document.getElementById('Kol_vo_zam_comment');
                		    
                		    var Kol_zam_teamA_comment = document.getElementById('Kol_zam_teamA_comment');
                		    var Bbs_teamA_comment = document.getElementById('Bbs_teamA_comment');
                		    var Rpm_zam_teamA_comment = document.getElementById('Rpm_zam_teamA_comment');
                		    var Rpm_bbs_teamA_comment = document.getElementById('Rpm_bbs_teamA_comment');
                		    
                		   /* var Kol_zam_teamB_comment = document.getElementById('Kol_zam_teamB_comment');
                		    var Bbs_teamB_comment = document.getElementById('Bbs_teamB_comment');
                		    var Rpm_zam_teamB_comment = document.getElementById('Rpm_zam_teamB_comment');
                		    var Rpm_bbs_teamB_comment = document.getElementById('Rpm_bbs_teamB_comment');*/
                		    
                		    var Kol_zam_Sulf_comment = document.getElementById('Kol_zam_Sulf_comment');
                		    var Bbs_Sulf_comment = document.getElementById('Bbs_Sulf_comment');
                		    var Rpm_zam_Sulf_comment = document.getElementById('Rpm_zam_Sulf_comment');
                		    var Rpm_bbs_Sulf_comment = document.getElementById('Rpm_bbs_Sulf_comment');
                            $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: 'addSafety.php',
                                    data: ({dateTime:dateTime.value, 
                                    Incedents:Incedents.value, 
                                    NearMiss:NearMiss.value, 
                                    Bbswa:Bbswa.value, 
                                    Kol_vo_zam:Kol_vo_zam.value, 
                                    
                                    Kol_zam_teamA:Kol_zam_teamA.value, 
                                    Bbs_teamA:Bbs_teamA.value, 
                                    Rpm_zam_teamA:Rpm_zam_teamA.value, 
                                    Rpm_bbs_teamA:Rpm_bbs_teamA.value, 
                                   /* 
                                    Kol_zam_teamB:Kol_zam_teamB.value, 
                                    Bbs_teamB:Bbs_teamB.value, 
                                    Rpm_zam_teamB:Rpm_zam_teamB.value, 
                                    Rpm_bbs_teamB:Rpm_bbs_teamB.value, 
                                    */
                                    Kol_zam_Sulf:Kol_zam_Sulf.value, 
                                    Bbs_Sulf:Bbs_Sulf.value, 
                                    Rpm_zam_Sulf:Rpm_zam_Sulf.value, 
                                    Rpm_bbs_Sulf:Rpm_bbs_Sulf.value,
                                    
                                    Incedents_comment:Incedents_comment.value, 
                                    NearMiss_comment:NearMiss_comment.value, 
                                    Bbswa_comment:Bbswa_comment.value, 
                                    Kol_vo_zam_comment:Kol_vo_zam_comment.value, 
                                    
                                    Kol_zam_teamA_comment:Kol_zam_teamA_comment.value, 
                                    Bbs_teamA_comment:Bbs_teamA_comment.value, 
                                    Rpm_zam_teamA_comment:Rpm_zam_teamA_comment.value, 
                                    Rpm_bbs_teamA_comment:Rpm_bbs_teamA_comment.value, 
                                    
                                  /*  Kol_zam_teamB_comment:Kol_zam_teamB_comment.value, 
                                    Bbs_teamB_comment:Bbs_teamB_comment.value, 
                                    Rpm_zam_teamB_comment:Rpm_zam_teamB_comment.value, 
                                    Rpm_bbs_teamB_comment:Rpm_bbs_teamB_comment.value, 
                                    */
                                    Kol_zam_Sulf_comment:Kol_zam_Sulf_comment.value, 
                                    Bbs_Sulf_comment:Bbs_Sulf_comment.value, 
                                    Rpm_zam_Sulf_comment:Rpm_zam_Sulf_comment.value, 
                                    Rpm_bbs_Sulf_comment:Rpm_bbs_Sulf_comment.value}),
                                    success: function(response) 
                                    {
                                        var data = JSON.parse(response);
                                        Incedents.value = "";
                                        NearMiss.value = "";
                                        Bbswa.value = "";
                                        Kol_vo_zam.value = "";
                                        
                                        Kol_zam_teamA.value = "";
                                        Bbs_teamA.value = "";
                                        Rpm_zam_teamA.value = "";
                                        Rpm_bbs_teamA.value = "";
                                        
                                       /* Kol_zam_teamB.value = "";
                                        Bbs_teamB.value = "";
                                        Rpm_zam_teamB.value = "";
                                        Rpm_bbs_teamB.value = "";*/
                                        
                                        Kol_zam_Sulf.value = "";
                                        Bbs_Sulf.value = "";
                                        Rpm_zam_Sulf.value = "";
                                        Rpm_bbs_Sulf.value = "";
                                        
                                        Incedents_comment.value = "";
                                        NearMiss_comment.value = "";
                                        Bbswa_comment.value = "";
                                        Kol_vo_zam_comment.value = "";
                                        
                                        Kol_zam_teamA_comment.value = "";
                                        Bbs_teamA_comment.value = "";
                                        Rpm_zam_teamA_comment.value = "";
                                        Rpm_bbs_teamA_comment.value = "";
                                        
                                      /*  Kol_zam_teamB_comment.value = "";
                                        Bbs_teamB_comment.value = "";
                                        Rpm_zam_teamB_comment.value = "";
                                        Rpm_bbs_teamB_comment.value = "";*/
                                        
                                        Kol_zam_Sulf_comment.value = "";
                                        Bbs_Sulf_comment.value = "";
                                        Rpm_zam_Sulf_comment.value = "";
                                        Rpm_bbs_Sulf_comment.value = "";
                                       $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    }
                                });
                        }
            	    );
                }
            );
        </script>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>