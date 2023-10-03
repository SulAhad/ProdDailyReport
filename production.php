<?php require('connect_db.php'); 
if(isset($_SESSION['login']) == "")
{header('Location: bridge.php');}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head class=""><?php require('head.php')?></head>  
    <body class="container">
        <form  method="post" id="formToSend">
            <div class="row bg-light card shadow-sm mt-4">
                <p style="font-size:30px; border-bottom: 1px solid #f00;">Производство</p>
                <div class="col-md-12">
                    <div class="alert alert-success" style="display:none; position: fixed; top: 0; right: 0;">Данные успешно сохранены!</div>
                    
                    <div class="row" method="post" id="formToSend">
                        <div class="col-md-3 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <div class="form-group row">
                                    <label style="font-size:12px;" for="dateTime" class="mt-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
                                    <label style="font-size:12px;" for="plan" class="mt-2">План</label>
                                    <input min="0" type="number" id="plan" readonly style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="план" required>
                                    <label style="font-size:12px;" for="fact" class="mt-2">Факт</label>
                                    <input min="0" type="number" id="fact" readonly style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="факт" required>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-2 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена A</p>
                                <label style="font-size:12px;" for="plan_teamA" class="mt-1">План</label>
                                <input min="0" type="number" id="plan_teamA"  style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="план" required>
                                <label style="font-size:12px;" for="fact_teamA" class="mt-1">Факт</label>
                                <input min="0" type="number" id="fact_teamA"  style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="факт" required>
                            </fieldset>
                        </div>
                        <div class="col-md-2 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                <label for="plan_teamB" style="font-size:12px;" class="mt-1">План</label>
                                <input min="0" readonly type="number" id="plan_teamB" style="border-bottom: 2px solid gray;"  class="form-control mt-1" placeholder="план" required>
                                <label for="fact_teamB" style="font-size:12px;" class="mt-1">Факт</label>
                                <input min="0" readonly type="number" id="fact_teamB"  style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="факт" required>
                            </fieldset>
                        </div>
                        <div class="col-md-2 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Сульфирование</p>
                                <label for="plan_total" style="font-size:12px;" class="mt-1">План</label>
                                <input min="0" type="number" id="plan_total"  style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="план" required>
                                <label for="fact_total" style="font-size:12px;" class="mt-1">Факт</label>
                                <input min="0" type="number" id="fact_total"  style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="факт" required>
                            </fieldset>
                        </div>
                        <div class="col-md-3 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Отклонение</p>
                                <label for="deviation" style="font-size:12px;" class="mt-1">Отклонение</label>
                                <input required min="0" type="number" id="deviation" readonly style="border-bottom: 2px solid gray;"  class="form-control mt-2" placeholder="отклонение" required>
                            </fieldset>
                        </div>
                        <script>
                            const plan_teamA = document.getElementById("plan_teamA");
                            const plan_teamB = document.getElementById("plan_teamB");
                            const plan_total = document.getElementById("plan_total");
                            const plan = document.getElementById("plan");
                            
                            const calculateSum = () => {
                              const sum = Number(plan_teamA.value) + Number(plan_teamB.value) + Number(plan_total.value);
                              plan.value = sum.toFixed(2);;
                            };
                            
                            plan_teamA.addEventListener("input", calculateSum);
                            plan_teamB.addEventListener("input", calculateSum);
                            plan_total.addEventListener("input", calculateSum);
                        </script>
                        <script>
                            const fact_teamA = document.getElementById("fact_teamA");
                            const fact_teamB = document.getElementById("fact_teamB");
                            const fact_total = document.getElementById("fact_total");
                            const fact = document.getElementById("fact");
                            
                            const calculateSum_fact = () => {
                              const sum = Number(fact_teamA.value) + Number(fact_teamB.value) + Number(fact_total.value);
                              fact.value = sum.toFixed(2);;
                            };
                            
                            fact_teamA.addEventListener("input", calculateSum_fact);
                            fact_teamB.addEventListener("input", calculateSum_fact);
                            fact_total.addEventListener("input", calculateSum_fact);
                        </script>
                        <script>
                            const inputs = document.querySelectorAll("input");

                            inputs.forEach(input => {
                              input.addEventListener("input", () => {
                                const planTeamAValue = parseFloat(plan_teamA.value) || 0;
                                const planTeamBValue = parseFloat(plan_teamB.value) || 0;
                                const planTotalValue = parseFloat(plan_total.value) || 0;
                                const factTeamAValue = parseFloat(fact_teamA.value) || 0;
                                const factTeamBValue = parseFloat(fact_teamB.value) || 0;
                                const factTotalValue = parseFloat(fact_total.value) || 0;
                                
                                const planSum = planTeamAValue + planTeamBValue + planTotalValue;
                                const factSum = factTeamAValue + factTeamBValue + factTotalValue;
                                
                                deviation.value = (factSum - planSum).toFixed(2);
                              });
                            });
                        </script>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <div class="form-group row">
                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена A</p>
                                    
                                    <label for="OEE_teamA" style="font-size:12px;" class="mt-2">OEE</label>
                                    <input required min="0" type="number" id="OEE_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="oee" required>
                                    
                                    <label for="innotech1_teamA" style="font-size:12px;" class="mt-2">Innotech 1</label>
                                    <input required min="0" type="number" id="innotech1_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="innotech 1" required>
                                    
                                    <label for="innotech2_teamA" style="font-size:12px;" class="mt-2">Innotech 2</label>
                                    <input required min="0" type="number" id="innotech2_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="innotech 2" required>
                                    
                                    <label for="innotech3_teamA" style="font-size:12px;" class="mt-2">Innotech 3</label>
                                    <input required min="0" type="number" id="innotech3_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="innotech 3" required>
                                    
                                    <label for="uva4_teamA" style="font-size:12px;" class="mt-2">UVA 4</label>
                                    <input required min="0" type="number" id="uva4_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="uva 4" required>
                                    
                                    <label for="uva5_teamA" style="font-size:12px;" class="mt-2">UVA 5</label>
                                    <input required min="0" type="number" id="uva5_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="uva 5" required>
                                    
                                    <label for="acma_teamA" style="font-size:12px;" class="mt-2">ACMA</label>
                                    <input required min="0" type="number" id="acma_teamA" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="acma" required>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                <label for="oee_teamB" style="font-size:12px;" class="mt-2">OEE</label>
                                <input required min="0" readonly type="number" id="oee_teamB" style="border-bottom: 2px solid gray;"  class="form-control mt-1" placeholder="oee" required>
                                <label for="innotech1_teamB" style="font-size:12px;" class="mt-2">Innotech 1</label>
                                <input required min="0" readonly type="number" id="innotech1_teamB" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="innotech 1" required>
                                <label for="innotech2_teamB" style="font-size:12px;" class="mt-2">Innotech 2</label>
                                <input required min="0" readonly type="number" id="innotech2_teamB" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="innotech 2" required>
                                <label for="innotech3_teamB" style="font-size:12px;" class="mt-2">Innotech 3</label>
                                <input required min="0" readonly type="number" id="innotech3_teamB" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="innotech 3" required>
                                <label for="uva4_teamB" style="font-size:12px;" class="mt-2">UVA 4</label>
                                <input required min="0" readonly type="number" id="uva4_teamB" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="uva 4" required>
                                <label for="uva5_teamB" style="font-size:12px;" class="mt-2">UVA 5</label>
                                <input required min="0" readonly type="number" id="uva5_teamB" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="uva 5" required>
                                <label for="acma_teamB" style="font-size:12px;" class="mt-2">ACMA</label>
                                <input required min="0" readonly type="number" id="acma_teamB" style="border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="acma" required>
                            </fieldset>
                        </div>
                        <div class="col-md-4 bg-light">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px;  border-bottom: 1px solid #f00;">Общее</p>
                                <input required min="0" type="number" id="oee_total" style="border-bottom: 2px solid gray;"  class="form-control mt-2" placeholder="oee" required>
                                <p style="font-size:21px; border-bottom: 1px solid #f00;" class="mt-2">Комментарий</p>
                                <textarea required min="0" type="text" id="comment" style="border-bottom: 2px solid gray; height: 300px;"  class="form-control mt-2" placeholder="введите комментарий" required></textarea>
                            </fieldset>
                        </div>
                    </div>
                    <button style="width:200px;" type="button" class="add btn btn-outline-success m-3">Сохранить</button>
                    <div class="alert alert-plan" style="display:none; position: fixed;">ОШИБКА СОХРАНЕНИЯ! Строка "План" не может быть пустым!</div>
                </div>
            </div>
            <script>
            $(document).ready
                (function() 
                    {
                        $(".add").click
                        (
                    		function()
                    		{
                    		    
                    		    var dateTime = document.getElementById('dateTime');
                    		    var plan = document.getElementById('plan');
                    		    var fact = document.getElementById('fact');
                    		    
                    		    var plan_teamA = document.getElementById('plan_teamA');
                    		    var fact_teamA = document.getElementById('fact_teamA');
                    		    
                    		    var plan_teamB = document.getElementById('plan_teamB');
                    		    var fact_teamB = document.getElementById('fact_teamB');
                    		    
                    		    var plan_total = document.getElementById('plan_total');
                    		    var fact_total = document.getElementById('fact_total');
                    		    
                    		    var deviation = document.getElementById('deviation');
                    		    
                    		    var OEE_teamA = document.getElementById('OEE_teamA');
                    		    var innotech1_teamA = document.getElementById('innotech1_teamA');
                    		    var innotech2_teamA = document.getElementById('innotech2_teamA');
                    		    var innotech3_teamA = document.getElementById('innotech3_teamA');
                    		    var uva4_teamA = document.getElementById('uva4_teamA');
                    		    var uva5_teamA = document.getElementById('uva5_teamA');
                    		    var acma_teamA = document.getElementById('acma_teamA');
                    		    
                    		    var oee_teamB = document.getElementById('oee_teamB');
                    		    var innotech1_teamB = document.getElementById('innotech1_teamB');
                    		    var innotech2_teamB = document.getElementById('innotech2_teamB');
                    		    var innotech3_teamB = document.getElementById('innotech3_teamB');
                    		    var uva4_teamB = document.getElementById('uva4_teamB');
                    		    var uva5_teamB = document.getElementById('uva5_teamB');
                    		    var acma_teamB = document.getElementById('acma_teamB');
                    		    var oee_total = document.getElementById('oee_total');
                    		    var comment = document.getElementById('comment');
                    		    if(plan_teamA.value == 0 || plan_teamA.value == null)
                    		    {
                    		        $('.alert-plan').fadeIn(1000).delay(3000).fadeOut(1000);
                    		    }
                    		    else{
                    		        $.ajax(
                                    {
                                        type: 'POST',
                                        dataType: 'html',
                                        url: 'addProduction.php',
                                        data: ({dateTime:dateTime.value, plan:plan.value, 
                                        fact:fact.value, 
                                        
                                        plan_teamA:plan_teamA.value, 
                                        fact_teamA:fact_teamA.value, 
                                        
                                        plan_teamB:plan_teamB.value, 
                                        fact_teamB:fact_teamB.value, 
                                        
                                        plan_total:plan_total.value, 
                                        fact_total:fact_total.value, 
                                        
                                        deviation:deviation.value, 
                                        
                                        OEE_teamA:OEE_teamA.value,
                                        innotech1_teamA:innotech1_teamA.value, 
                                        innotech2_teamA:innotech2_teamA.value, 
                                        innotech3_teamA:innotech3_teamA.value, 
                                        uva4_teamA:uva4_teamA.value, 
                                        uva5_teamA:uva5_teamA.value, 
                                        uva5_teamA:uva5_teamA.value, 
                                        acma_teamA:acma_teamA.value, 
                                        
                                        oee_teamB:oee_teamB.value,
                                        innotech1_teamB:innotech1_teamB.value, 
                                        innotech2_teamB:innotech2_teamB.value, 
                                        innotech3_teamB:innotech3_teamB.value, 
                                        uva4_teamB:uva4_teamB.value, 
                                        uva5_teamB:uva5_teamB.value, 
                                        comment:comment.value, 
                                        acma_teamB:acma_teamB.value,
                                        oee_total:oee_total.value}),
                                        success: function(response) 
                                        {
                                            var data = JSON.parse(response);
                                            plan.value = "";
                                            fact.value = "";
                                            plan_teamA.value = "";
                                            fact_teamA.value = "";
                                            plan_teamB.value = "";
                                            fact_teamB.value = "";
                                            plan_total.value = "";
                                            fact_total.value = "";
                                            deviation.value = "";
                                            OEE_teamA.value = "";
                                            innotech1_teamA.value = "";
                                            innotech2_teamA.value = "";
                                            innotech3_teamA.value = "";
                                            uva4_teamA.value = "";
                                            uva5_teamA.value = "";
                                            uva5_teamA.value = "";
                                            acma_teamA.value = "";
                                            oee_teamB.value = "";
                                            innotech1_teamB.value = "";
                                            innotech2_teamB.value = "";
                                            innotech3_teamB.value = "";
                                            uva4_teamB.value = "";
                                            uva5_teamB.value = "";
                                            acma_teamB.value = "";
                                            comment.value = "";
                                            oee_total.value = "";
                                            $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                        }
                                    });
                    		    }
                                
                            }
                	    );
                    }
                );
            </script>
        </form>
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
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
</html>        