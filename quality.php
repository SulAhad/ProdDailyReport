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
            <form method="post" id="formToSend">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                            <div data-bs-interval="9999999" class="carousel-item active">
                                <div class="col-md-12">
                                    <div class="row" >
                                        <p style="font-size:30px; border-bottom: 1px solid #f00;">Качество</p>
                                        <div class="col-md-3 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <label style="font-size:12px;" for="dateTime" class="mt-1">Выберите дату</label>
                                                <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
                                            </fieldset>
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <label style="font-size:12px;" for="BrakQuality" class="mt-4">Брак,t.</label>
                                                <div class="form-group row">
                                                    <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="BrakQuality" class="form-control mt-1" placeholder="брак,t." required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-9 bg-light">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                        <p style="font-size:21px; border-bottom: 1px solid #f00;">СМС</p>
                                                        <label style="font-size:12px;" for="Kol_zam_him_sostav_teamA" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                        <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_him_sostav_teamA" class="form-control mt-1" placeholder="кол-во замечаний по хим. составу" required>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_teamA" class="mt-2">Кол-во замечаний Упаковка</label>
                                                        <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_teamA" class="form-control mt-1" placeholder="кол-во замечаний Упаковка" required>
                                                        <label style="font-size:12px;" for="Kol_pretenziy_teamA" class="mt-2">Кол-во претензий</label>
                                                        <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_teamA" class="form-control mt-1" placeholder="кол-во претензий" required>
                                                        <label style="font-size:12px;" for="Zabrakov_mat_teamA" class="mt-2">Забракованный материал</label>
                                                        <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_teamA" class="form-control mt-1" placeholder="забракованный материал" required>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_Sulf" class="mt-2">Активная вода</label>
                                                        <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_Sulf" class="form-control mt-1" placeholder="активная вода" required>
                                                    </fieldset>
                                                </div>
                                                <!--<div class="col-md-4">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                            <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                                            <label style="font-size:12px;" for="Kol_zam_him_sostav_teamB" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                            <input required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_him_sostav_teamB" class="form-control mt-1" placeholder="кол-во замечаний по хим. составу" required>
                                                            <label style="font-size:12px;" for="Kol_zam_upakovka_teamB" class="mt-2">Кол-во замечаний Упаковка</label>
                                                            <input required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_teamB" class="form-control mt-1" placeholder="кол-во замечаний Упаковка" required>
                                                            <label style="font-size:12px;" for="Kol_pretenziy_teamB" class="mt-2">Кол-во претензий</label>
                                                            <input required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_teamB" class="form-control mt-1" placeholder="кол-во претензий" required>
                                                            <label style="font-size:12px;" for="Zabrakov_mat_teamB" class="mt-2">Забракованный материал</label>
                                                            <input required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_teamB" class="form-control mt-1" placeholder="забракованный материал" required>
                                                    </fieldset>
                                                </div>-->
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                            <p style="font-size:21px; border-bottom: 1px solid #f00;">Сульфирование</p>
                                                            <label style="font-size:12px;" for="Kol_zam_him_sostav_Sulf" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                            <input required min="0" type="number" style="border-bottom: 2px solid gray;" style="border-bottom: 2px solid gray;" id="Kol_zam_him_sostav_Sulf" class="form-control mt-1" placeholder="кол-во замечаний по хим. составу" required>
                                                            <label style="font-size:12px;" for="Kol_pretenziy_Sulf" class="mt-2">Кол-во претензий</label>
                                                            <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_Sulf" class="form-control mt-1" placeholder="кол-во претензий" required>
                                                            <label style="font-size:12px;" for="Zabrakov_mat_Sulf" class="mt-2">Забракованный материал</label>
                                                            <input required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_Sulf" class="form-control mt-1" placeholder="забракованный материал" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div data-bs-interval="9999999" class="carousel-item">
                                <div class="col-md-12">
                                     <div class="row" >
                                        <p style="font-size:30px; border-bottom: 1px solid #f00;">комментарии</p>
                                        <div class="col-md-3 bg-light">
                                            
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <label style="font-size:12px;" for="BrakQuality_comment" class="mt-4">Брак,t.</label>
                                                <div class="form-group row">
                                                    <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="BrakQuality_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-9 bg-light">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                        <p style="font-size:21px; border-bottom: 1px solid #f00;">СМС</p>
                                                        <label style="font-size:12px;" for="Kol_zam_him_sostav_teamA_comment" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                        <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_him_sostav_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_teamA_comment" class="mt-2">Кол-во замечаний Упаковка</label>
                                                        <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Kol_pretenziy_teamA_comment" class="mt-2">Кол-во претензий</label>
                                                        <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Zabrakov_mat_teamA_comment" class="mt-2">Забракованный материал</label>
                                                        <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_Sulf_comment" class="mt-2">Активная вода</label>
                                                        <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                    </fieldset>
                                                </div>
                                                <!--<div class="col-md-4">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                            <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                                            <label style="font-size:12px;" for="Kol_zam_him_sostav_teamB_comment" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                            <textarea required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_him_sostav_teamB_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Kol_zam_upakovka_teamB_comment" class="mt-2">Кол-во замечаний Упаковка</label>
                                                            <textarea required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_teamB_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Kol_pretenziy_teamB_comment" class="mt-2">Кол-во претензий</label>
                                                            <textarea required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_teamB_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Zabrakov_mat_teamB_comment" class="mt-2">Забракованный материал</label>
                                                            <textarea required min="0" readonly type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_teamB_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                    </fieldset>
                                                </div>-->
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                            <p style="font-size:21px; border-bottom: 1px solid #f00;">Сульфирование</p>
                                                            <label style="font-size:12px;" for="Kol_zam_him_sostav_Sulf_comment" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                            <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"   style="border-bottom: 2px solid gray;" id="Kol_zam_him_sostav_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Kol_pretenziy_Sulf_comment" class="mt-2">Кол-во претензий</label>
                                                            <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Zabrakov_mat_Sulf_comment" class="mt-2">Забракованный материал</label>
                                                            <textarea required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
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
                    
            </div>
            <button style="width:200px;" type="button" id="myButton" class="add1 btn btn-outline-success m-3">Сохранить</button>
            
            </form>
        </div>
        
        <div class="alert alert-success" style="display:none;">Данные успешно отправлены!</div>
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
                                        url: 'deleteRowQuality.php',
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
            $("#myButton").click(function() 
            {
                      var dateTime = document.getElementById('dateTime');
                        		    var BrakQuality = document.getElementById('BrakQuality');
                        		    
                        		    var Kol_zam_him_sostav_teamA = document.getElementById('Kol_zam_him_sostav_teamA');
                        		    var Kol_zam_upakovka_teamA = document.getElementById('Kol_zam_upakovka_teamA');
                        		    var Kol_pretenziy_teamA = document.getElementById('Kol_pretenziy_teamA');
                        		    var Zabrakov_mat_teamA = document.getElementById('Zabrakov_mat_teamA');
                        		    
                        		    /*var Kol_zam_him_sostav_teamB = document.getElementById('Kol_zam_him_sostav_teamB');
                        		    var Kol_zam_upakovka_teamB = document.getElementById('Kol_zam_upakovka_teamB');
                        		    var Kol_pretenziy_teamB = document.getElementById('Kol_pretenziy_teamB');
                        		    var Zabrakov_mat_teamB = document.getElementById('Zabrakov_mat_teamB');*/
                        		    
                        		    var Kol_zam_him_sostav_Sulf = document.getElementById('Kol_zam_him_sostav_Sulf');
                        		    var Kol_zam_upakovka_Sulf = document.getElementById('Kol_zam_upakovka_Sulf');
                        		    var Kol_pretenziy_Sulf = document.getElementById('Kol_pretenziy_Sulf');
                        		    var Zabrakov_mat_Sulf = document.getElementById('Zabrakov_mat_Sulf');
                        		    
                                    var BrakQuality_comment = document.getElementById('BrakQuality_comment');
                        		    
                        		    var Kol_zam_him_sostav_teamA_comment = document.getElementById('Kol_zam_him_sostav_teamA_comment');
                        		    var Kol_zam_upakovka_teamA_comment = document.getElementById('Kol_zam_upakovka_teamA_comment');
                        		    var Kol_pretenziy_teamA_comment = document.getElementById('Kol_pretenziy_teamA_comment');
                        		    var Zabrakov_mat_teamA_comment = document.getElementById('Zabrakov_mat_teamA_comment');
                        		    
                        		    /*var Kol_zam_him_sostav_teamB_comment = document.getElementById('Kol_zam_him_sostav_teamB_comment');
                        		    var Kol_zam_upakovka_teamB_comment = document.getElementById('Kol_zam_upakovka_teamB_comment');
                        		    var Kol_pretenziy_teamB_comment = document.getElementById('Kol_pretenziy_teamB_comment');
                        		    var Zabrakov_mat_teamB_comment = document.getElementById('Zabrakov_mat_teamB_comment');*/
                        		    
                        		    var Kol_zam_him_sostav_Sulf_comment = document.getElementById('Kol_zam_him_sostav_Sulf_comment');
                        		    var Kol_zam_upakovka_Sulf_comment = document.getElementById('Kol_zam_upakovka_Sulf_comment');
                        		    var Kol_pretenziy_Sulf_comment = document.getElementById('Kol_pretenziy_Sulf_comment');
                        		    var Zabrakov_mat_Sulf_comment = document.getElementById('Zabrakov_mat_Sulf_comment');
                                    $.ajax(
                                        {
                                            type: 'POST',
                                            dataType: 'html',
                                            url: 'addQuality.php',
                                            data: ({dateTime:dateTime.value, 
                                            
                                            BrakQuality_comment:BrakQuality_comment.value, 
                                            
                                            Kol_zam_him_sostav_teamA_comment:Kol_zam_him_sostav_teamA_comment.value, 
                                            Kol_zam_upakovka_teamA_comment:Kol_zam_upakovka_teamA_comment.value, 
                                            Kol_pretenziy_teamA_comment:Kol_pretenziy_teamA_comment.value, 
                                            Zabrakov_mat_teamA_comment:Zabrakov_mat_teamA_comment.value, 
                                            
                                           /* Kol_zam_him_sostav_teamB_comment:Kol_zam_him_sostav_teamB_comment.value, 
                                            Kol_zam_upakovka_teamB_comment:Kol_zam_upakovka_teamB_comment.value, 
                                            Kol_pretenziy_teamB_comment:Kol_pretenziy_teamB_comment.value, 
                                            Zabrakov_mat_teamB_comment:Zabrakov_mat_teamB_comment.value, */
                                            
                                            Kol_zam_him_sostav_Sulf_comment:Kol_zam_him_sostav_Sulf_comment.value, 
                                            Kol_zam_upakovka_Sulf_comment:Kol_zam_upakovka_Sulf_comment.value, 
                                            Kol_pretenziy_Sulf_comment:Kol_pretenziy_Sulf_comment.value,
                                            Zabrakov_mat_Sulf_comment:Zabrakov_mat_Sulf_comment.value,
                                            
                                            BrakQuality:BrakQuality.value, 
                                            
                                            Kol_zam_him_sostav_teamA:Kol_zam_him_sostav_teamA.value, 
                                            Kol_zam_upakovka_teamA:Kol_zam_upakovka_teamA.value, 
                                            Kol_pretenziy_teamA:Kol_pretenziy_teamA.value, 
                                            Zabrakov_mat_teamA:Zabrakov_mat_teamA.value, 
                                            
                                           /* Kol_zam_him_sostav_teamB:Kol_zam_him_sostav_teamB.value, 
                                            Kol_zam_upakovka_teamB:Kol_zam_upakovka_teamB.value, 
                                            Kol_pretenziy_teamB:Kol_pretenziy_teamB.value, 
                                            Zabrakov_mat_teamB:Zabrakov_mat_teamB.value, */
                                            
                                            Kol_zam_him_sostav_Sulf:Kol_zam_him_sostav_Sulf.value, 
                                            Kol_zam_upakovka_Sulf:Kol_zam_upakovka_Sulf.value, 
                                            Kol_pretenziy_Sulf:Kol_pretenziy_Sulf.value, 
                                            Zabrakov_mat_Sulf:Zabrakov_mat_Sulf.value}),
                                            success: function(response) 
                                            {
                                                var data = JSON.parse(response);
                                                BrakQuality.value = "";
                          
                                                Kol_zam_him_sostav_teamA.value = "";
                                                Kol_zam_upakovka_teamA.value = "";
                                                Kol_pretenziy_teamA.value = "";
                                                Zabrakov_mat_teamA.value = "";
                                                
                                               /* Kol_zam_him_sostav_teamB.value = "";
                                                Kol_zam_upakovka_teamB.value = "";
                                                Kol_pretenziy_teamB.value = "";
                                                Zabrakov_mat_teamB.value = "";*/
                                                
                                                Kol_zam_him_sostav_Sulf.value = "";
                                                Kol_zam_upakovka_Sulf.value = "";
                                                Kol_pretenziy_Sulf.value = "";
                                                Zabrakov_mat_Sulf.value = "";
                                                
                                                BrakQuality_comment.value = "";
                          
                                                Kol_zam_him_sostav_teamA_comment.value = "";
                                                Kol_zam_upakovka_teamA_comment.value = "";
                                                Kol_pretenziy_teamA_comment.value = "";
                                                Zabrakov_mat_teamA_comment.value = "";
                                                
                                                /*Kol_zam_him_sostav_teamB_comment.value = "";
                                                Kol_zam_upakovka_teamB_comment.value = "";
                                                Kol_pretenziy_teamB_comment.value = "";
                                                Zabrakov_mat_teamB_comment.value = "";*/
                                                
                                                Kol_zam_him_sostav_Sulf_comment.value = "";
                                                Kol_zam_upakovka_Sulf_comment.value = "";
                                                Kol_pretenziy_Sulf_comment.value = "";
                                                Zabrakov_mat_Sulf_comment.value = "";
                                                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                            }
                                    });
            });
            
                </script>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>