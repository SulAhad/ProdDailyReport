<?php 
    require('connect_db.php'); 
?>
<html>  
    <head class=""><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    <body style="background:aliceblue;" class="container-fluid">
        <?php
            require('mySidebar.php');
            echo"<button style='background:aliceblue;' class='openbtn' onclick='openNav()'>☰ </button>";
        ?>
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
                <label>Quality</label>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive"  style="height:800px;">
                                <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th style="">Дата</th>
                                            
                                            <th style="writing-mode:vertical-rl">Брак,t.</th>
                                            
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний по хим.составу Team A</th>
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний по упаковке Team A</th>
                                            <th style="writing-mode:vertical-rl">Кол-во претензий Team A</th>
                                            <th style="writing-mode:vertical-rl">Забракованные материалы Team A</th>
                                             
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний по хим.составу Team B</th>
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний по упаковке Team B</th>
                                            <th style="writing-mode:vertical-rl">Кол-во претензий Team B</th>
                                            <th style="writing-mode:vertical-rl">Забракованные материалы Team B</th>
                                             
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний по хим.составу Сульф</th>
                                            <th style="writing-mode:vertical-rl">Кол-во замечаний по упаковке Сульф</th>
                                            <th style="writing-mode:vertical-rl">Кол-во претензий Сульф</th>
                                            <th style="writing-mode:vertical-rl">Забракованные материалы Сульф</th>
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form>
                                    <?php
                                    $message = "SELECT * FROM `Quality_KPI`";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        
                                                        echo"<tr>";
                                                            echo"<td ><input required min='0' class='form-control'  id='dateTime'  value='$row[date]'  style='border:none; width:100%;' type='date'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='BrakQuality' type='number' style='border:none; height:100%; width:100%;' value='$row[BrakQuality]'    ></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_zam_him_sostav_teamA' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_zam_him_sostav_teamA]'     ></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_zam_upakovka_teamA' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_zam_upakovka_teamA]'        ></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_pretenziy_teamA' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_pretenziy_teamA]'   ></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Zabrakov_mat_teamA' type='number' style='border:none; height:100%; width:100%;' value='$row[Zabrakov_mat_teamA]'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_zam_him_sostav_teamB' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_zam_him_sostav_teamB]'    ></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_zam_upakovka_teamB' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_zam_upakovka_teamB]'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_pretenziy_teamB' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_pretenziy_teamB]'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Zabrakov_mat_teamB' type='number' style='border:none; height:100%; width:100%;' value='$row[Zabrakov_mat_teamB]'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_zam_him_sostav_Sulf' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_zam_him_sostav_Sulf]'    ></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_zam_upakovka_Sulf' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_zam_upakovka_Sulf]'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Kol_pretenziy_Sulf' type='number' style='border:none; height:100%; width:100%;' value='$row[Kol_pretenziy_Sulf]'></input></td>";
                                                            echo"<td ><input required min='0' class='form-control' id='Zabrakov_mat_Sulf' type='number' style='border:none; height:100%; width:100%;' value='$row[Zabrakov_mat_Sulf]' ></input></td>";
                                                            echo"<td style='width:5%;'><button id='idQuality' type='button' class='updateQuality btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='deleteQuality btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                            <script>
                                            $(document).ready
                                                (function() 
                                                    {$(".updateQuality").click
                                                        (function()
                                                    		{
                                                    		    var idQuality = $(this).val();
                                                    		    
                                                                var dateTime = $(this).closest("tr").find("#dateTime").val();
                                                                
                                                                var BrakQuality = $(this).closest("tr").find("#BrakQuality").val();
                                                                
                                                                var Kol_zam_him_sostav_teamA = $(this).closest("tr").find("#Kol_zam_him_sostav_teamA").val();
                                                                var Kol_zam_upakovka_teamA = $(this).closest("tr").find("#Kol_zam_upakovka_teamA").val();
                                                                var Kol_pretenziy_teamA = $(this).closest("tr").find("#Kol_pretenziy_teamA").val();
                                                                var Zabrakov_mat_teamA = $(this).closest("tr").find("#Zabrakov_mat_teamA").val();
                                                                
                                                                var Kol_zam_him_sostav_teamB = $(this).closest("tr").find("#Kol_zam_him_sostav_teamB").val();
                                                                var Kol_zam_upakovka_teamB = $(this).closest("tr").find("#Kol_zam_upakovka_teamB").val();
                                                                var Kol_pretenziy_teamB = $(this).closest("tr").find("#Kol_pretenziy_teamB").val();
                                                                var Zabrakov_mat_teamB = $(this).closest("tr").find("#Zabrakov_mat_teamB").val();
                                                                
                                                                var Kol_zam_him_sostav_Sulf = $(this).closest("tr").find("#Kol_zam_him_sostav_Sulf").val();
                                                                var Kol_zam_upakovka_Sulf = $(this).closest("tr").find("#Kol_zam_upakovka_Sulf").val();
                                                                var Kol_pretenziy_Sulf = $(this).closest("tr").find("#Kol_pretenziy_Sulf").val();
                                                                var Zabrakov_mat_Sulf = $(this).closest("tr").find("#Zabrakov_mat_Sulf").val();
                                                    			$.ajax(
                                                                    {type: 'POST',
                                                                        dataType: 'html',
                                                                        url: 'updateQuality.php',
                                                                        
                                                                        data: ({dateTime:dateTime, BrakQuality:BrakQuality,
                                                                        
                                                                                Kol_zam_him_sostav_teamA:Kol_zam_him_sostav_teamA,
                                                                                Kol_zam_upakovka_teamA:Kol_zam_upakovka_teamA,
                                                                                Kol_pretenziy_teamA:Kol_pretenziy_teamA,
                                                                                Zabrakov_mat_teamA:Zabrakov_mat_teamA,
                                         
                                                                                Kol_zam_him_sostav_teamB:Kol_zam_him_sostav_teamB,
                                                                                Kol_zam_upakovka_teamB:Kol_zam_upakovka_teamB,
                                                                                Kol_pretenziy_teamB:Kol_pretenziy_teamB,
                                                                                Zabrakov_mat_teamB:Zabrakov_mat_teamB,
                                             
                                                                                Kol_zam_him_sostav_Sulf:Kol_zam_him_sostav_Sulf,
                                                                                Kol_zam_upakovka_Sulf:Kol_zam_upakovka_Sulf,
                                                                                Kol_pretenziy_Sulf:Kol_pretenziy_Sulf,
                                                                                Zabrakov_mat_Sulf:Zabrakov_mat_Sulf,
                                                                                
                                                                                idQuality:idQuality}),
                                                                        success: function(response) 
                                                                        {
                                                                            var data = JSON.parse(response);}});});});
                                            </script>
                                            </form>
                                        </table>
                                    </div>
                                    
                                    <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".deleteQuality").click
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
                </fieldset>
            </div>
             <div class="col-md-12">
                 <label>Safety</label>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive"  style="height:800px;">
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
                                    <tbody>
                                    <?php
                                    $message = "SELECT * FROM `Safety_KPI`";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        /*echo"<tr>";
                                                            echo"<td >$row[date]</td>";
                                                            echo"<td id='inputIncedents'>    $row[Incedents]    </td>";
                                                            echo"<td id='inputNearMiss'>     $row[NearMiss]     </td>";
                                                            echo"<td id='inputBbswa'>        $row[Bbswa]        </td>";
                                                            echo"<td id='inputKol_vo_zam'>   $row[Kol_vo_zam]   </td>";
                                                            echo"<td id='inputKol_zam_teamA'>$row[Kol_zam_teamA]</td>";
                                                            echo"<td id='inputBbs_teamA'>    $row[Bbs_teamA]  </td>";
                                                            echo"<td id='inputRpm_zam_teamA'>$row[Rpm_zam_teamA]</td>";
                                                            echo"<td id='inputRpm_bbs_teamA'>$row[Rpm_bbs_teamA]</td>";
                                                            echo"<td id='inputKol_zam_teamB'>$row[Kol_zam_teamB]</td>";
                                                            echo"<td id='inputBbs_teamB'>    $row[Bbs_teamB]    </td>";
                                                            echo"<td id='inputRpm_zam_teamB'>$row[Rpm_zam_teamB]</td>";
                                                            echo"<td id='inputRpm_bbs_teamB'>$row[Rpm_bbs_teamB]</td>";
                                                            echo"<td id='inputKol_zam_Sulf'> $row[Kol_zam_Sulf] </td>";
                                                            echo"<td id='inputBbs_Sulf'>     $row[Bbs_Sulf]    </td>";
                                                            echo"<td id='inputRpm_zam_Sulf'> $row[Rpm_zam_Sulf] </td>";
                                                            echo"<td id='inputRpm_bbs_Sulf'> $row[Rpm_bbs_Sulf] </td>";
                                                            echo"<td style='width:5%;'><button type='button' class='update btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='deleteSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";*/
                                                        echo"<tr>";
                                                            echo"<td><input type='date' class='form-control' required min='0' style='border:none; width:100%;' id='dateSafety' value='$row[date]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Incedents' value='$row[Incedents]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='NearMiss'value='$row[NearMiss]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Bbswa'value='$row[Bbswa]'        ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Kol_vo_zam'value='$row[Kol_vo_zam]'   ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Kol_zam_teamA'value='$row[Kol_zam_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Bbs_teamA'value='$row[Bbs_teamA]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Rpm_zam_teamA'value='$row[Rpm_zam_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Rpm_bbs_teamA'value='$row[Rpm_bbs_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Kol_zam_teamB'value='$row[Kol_zam_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Bbs_teamB'value='$row[Bbs_teamB]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Rpm_zam_teamB'value='$row[Rpm_zam_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Rpm_bbs_teamB'value='$row[Rpm_bbs_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Kol_zam_Sulf' value='$row[Kol_zam_Sulf]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Bbs_Sulf'value='$row[Bbs_Sulf]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Rpm_zam_Sulf'value='$row[Rpm_zam_Sulf]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Rpm_bbs_Sulf'value='$row[Rpm_bbs_Sulf]' ></input></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='updateSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='deleteSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
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
            <div class="col-md-12">
                <label>Technology</label>
                <fieldset class="form-group border card shadow-sm">
                            <div class="table-responsive"  style="height:800px;">
                                <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
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
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $message = "SELECT * FROM `Technology_KPI`";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo"<tr>";
                                                            echo"<td><input type='date' class='form-control' required min='0' style='border:none; width:100%;' id='dateTechnology' value='$row[date]'    ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Params_limits' value='$row[Params_limits]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Compositsia'value='$row[Compositsia]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Compaund'value='$row[Compaund]'        ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Postdobavki'value='$row[Postdobavki]'   ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Fasovka'value='$row[Fasovka]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Slivnaya'value='$row[Slivnaya]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Uch_sirya'value='$row[Uch_sirya]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_teamA'value='$row[Udeln_potr_gaza_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_gotoviy_prod_teamA'value='$row[Udeln_potr_gaza_gotoviy_prod_teamA]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_teamB'value='$row[Udeln_potr_gaza_teamB]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_gotoviy_prod_teamB'value='$row[Udeln_potr_gaza_gotoviy_prod_teamB]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_total'value='$row[Udeln_potr_gaza_total]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='Udeln_potr_gaza_gotoviy_prod_total' value='$row[Udeln_potr_gaza_gotoviy_prod_total]' ></input></td>";
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
            <div class="col-md-12">
                <label>Production</label>
                <fieldset class="form-group border card shadow-sm">
                            <div class="table-responsive"  style="height:800px;">
                                <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th style="writing-mode:vertical-rl">Дата</th>
                                            
                                            <th style="writing-mode:vertical-rl">план</th>
                                            <th style="writing-mode:vertical-rl">факт</th>
                                            
                                            <th style="writing-mode:vertical-rl">План Смена А</th>
                                            <th style="writing-mode:vertical-rl">Факт Смена А</th>
                                            
                                            <th style="writing-mode:vertical-rl">План Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Факт Смена Б</th>
                                            
                                            <th style="writing-mode:vertical-rl">План Общее</th>
                                            <th style="writing-mode:vertical-rl">Факт Общее</th>
                                            
                                            <th style="writing-mode:vertical-rl">Отклонение</th>
                                            
                                            <th style="writing-mode:vertical-rl">OEE Смена А</th>
                                            <th style="writing-mode:vertical-rl">Иннтоех 1 Смена А</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 2 Смена А</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 3 Смена А</th>
                                            <th style="writing-mode:vertical-rl">UVA 4 Смена А</th>
                                            <th style="writing-mode:vertical-rl">UVA 5 Смена А</th>
                                            <th style="writing-mode:vertical-rl">АКМА Смена А</th>
                                            
                                            <th style="writing-mode:vertical-rl">OEE Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Иннтоех 1 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 2 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">Иннотех 3 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">UVA 4 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">UVA 5 Смена Б</th>
                                            <th style="writing-mode:vertical-rl">АКМА Смена Б</th>
                                            
                                            <th style="writing-mode:vertical-rl">OEE Общее</th>
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $message = "SELECT * FROM `Production_KPI`";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo"<tr>";
                                                            echo"<td><input type='date' class='form-control' required min='0' style='border:none; width:100%;' id='dateProduction' value='$row[date]'    ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='plan' value='$row[plan]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='fact'value='$row[fact]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='plan_teamA'value='$row[plan_teamA]'        ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='fact_teamA'value='$row[fact_teamA]'   ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='plan_teamB'value='$row[plan_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='fact_teamB'value='$row[fact_teamB]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='plan_total'value='$row[plan_total]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='plan_total'value='$row[plan_total]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='deviation'value='$row[deviation]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='OEE_teamA' value='$row[OEE_teamA]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='innotech1_teamA' value='$row[innotech1_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='innotech2_teamA' value='$row[innotech2_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='innotech3_teamA' value='$row[innotech3_teamA]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='uva4_teamA'value='$row[uva4_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='uva5_teamA'value='$row[uva5_teamA]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='acma_teamA' value='$row[acma_teamA]' ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='oee_teamB'value='$row[oee_teamB]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='innotech1_teamB'value='$row[innotech1_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='innotech2_teamB'value='$row[innotech2_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='innotech3_teamB' value='$row[innotech3_teamB]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='uva4_teamB'value='$row[uva4_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='uva5_teamB'value='$row[uva5_teamB]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='acma_teamB' value='$row[acma_teamB]' ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='oee_total' value='$row[oee_total]' ></input></td>";
                                                            
                                                            echo"<td style='width:5%;'><button type='button' class='updateProduction btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td style='width:5%;'><button type='button' class='deleteProduction btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
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
                                                                var plan_teamB = $(this).closest("tr").find("#plan_teamB").val();
                                                                var fact_teamB = $(this).closest("tr").find("#fact_teamB").val();
                                                                var plan_total = $(this).closest("tr").find("#plan_total").val();
                                                                
                                                                var plan_total = $(this).closest("tr").find("#plan_total").val();
                                                                var deviation = $(this).closest("tr").find("#deviation").val();
                                                                
                                                                var OEE_teamA = $(this).closest("tr").find("#OEE_teamA").val();
                                                                var innotech1_teamA = $(this).closest("tr").find("#innotech1_teamA").val();
                                                                var innotech2_teamA = $(this).closest("tr").find("#innotech2_teamA").val();
                                                                var innotech3_teamA = $(this).closest("tr").find("#innotech3_teamA").val();
                                                                var uva4_teamA = $(this).closest("tr").find("#uva4_teamA").val();
                                                                var uva5_teamA = $(this).closest("tr").find("#uva5_teamA").val();
                                                                var acma_teamA = $(this).closest("tr").find("#acma_teamA").val();
                                                                
                                                                var oee_teamB = $(this).closest("tr").find("#oee_teamB").val();
                                                                var innotech1_teamB = $(this).closest("tr").find("#innotech1_teamB").val();
                                                                var innotech2_teamB = $(this).closest("tr").find("#innotech2_teamB").val();
                                                                var innotech3_teamB = $(this).closest("tr").find("#innotech3_teamB").val();
                                                                var uva4_teamB = $(this).closest("tr").find("#uva4_teamB").val();
                                                                var uva5_teamB = $(this).closest("tr").find("#uva5_teamB").val();
                                                                var acma_teamB = $(this).closest("tr").find("#acma_teamB").val();
                                                                
                                                                var oee_total = $(this).closest("tr").find("#oee_total").val();
                                                                
                                                    			$.ajax(
                                                                    {type: 'POST',
                                                                        dataType: 'html',
                                                                        url: 'updateProduction.php',
                                                                        
                                                                        data: ({dateProduction:dateProduction, 
                                                                        
                                                                                plan:plan,
                                                                                fact:fact,
                                                                                plan_teamA:plan_teamA,
                                                                                fact_teamA:fact_teamA,
                                                                                plan_teamB:plan_teamB,
                                                                                fact_teamB:fact_teamB,
                                                                                plan_total:plan_total,
                                                                                
                                                                                plan_total:plan_total,
                                                                                deviation:deviation,
                                                                                
                                                                                OEE_teamA:OEE_teamA,
                                                                                innotech1_teamA:innotech1_teamA,
                                                                                innotech2_teamA:innotech2_teamA,
                                                                                innotech3_teamA:innotech3_teamA,
                                                                                uva4_teamA:uva4_teamA,
                                                                                uva5_teamA:uva5_teamA,
                                                                                acma_teamA:acma_teamA,
                                                                                
                                                                                oee_teamB:oee_teamB,
                                                                                innotech1_teamB:innotech1_teamB,
                                                                                innotech2_teamB:innotech2_teamB,
                                                                                innotech3_teamB:innotech3_teamB,
                                                                                uva4_teamB:uva4_teamB,
                                                                                uva5_teamB:uva5_teamB,
                                                                                acma_teamB:acma_teamB,
                                                                                oee_total:oee_total,
                                                                                idProduction:idProduction}),
                                                                        success: function(response) 
                                                                        {
                                                                            var data = JSON.parse(response);}});});});
                                            </script>
                <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".deleteProduction").click
                                    (
                                		function()
                                		{
                                		    var deleteUser = this.value;
                                		    const { target } = event;
                                			$.ajax(
                                                {
                                                    type: 'POST',
                                                    dataType: 'html',
                                                    url: 'deleteRowProduction.php',
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
            <div class="col-md-12 mb-4">
                <label>Сырьё</label>
                <fieldset class="form-group border card shadow-sm">
                            <div class="table-responsive"  style="height:800px;">
                                <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                       <tr>
                                            <th style="writing-mode:vertical-rl">Дата</th>
                                            <th style="writing-mode:vertical-rl">Брак Было</th>
                                            <th style="writing-mode:vertical-rl">Брак Приход</th>
                                            <th style="writing-mode:vertical-rl">Брак Расход</th>
                                            <th style="writing-mode:vertical-rl">Брак Остаток</th>
                                            
                                            <th style="writing-mode:vertical-rl">Брак Сульф Было</th>
                                            <th style="writing-mode:vertical-rl">Брак Сульф Приход</th>
                                            <th style="writing-mode:vertical-rl">Брак Сульф Расход</th>
                                            <th style="writing-mode:vertical-rl">Брак Сульф Остаток</th>
                                            
                                            <th style="writing-mode:vertical-rl">Брак Сульф Раствор Было</th>
                                            <th style="writing-mode:vertical-rl">Брак Сульф Раствор Приход</th>
                                            <th style="writing-mode:vertical-rl">Брак Сульф Раствор Расход</th>
                                            <th style="writing-mode:vertical-rl">Брак Сульф Раствор Остаток</th>
                                            
                                            <th style="writing-mode:vertical-rl">Изолятор Было</th>
                                            <th style="writing-mode:vertical-rl">Изолятор Приход</th>
                                            <th style="writing-mode:vertical-rl">Изолятор Расход</th>
                                            <th style="writing-mode:vertical-rl">Изолятор Остаток</th>
                                            
                                            <th style="writing-mode:vertical-rl">Пыль Было</th>
                                            <th style="writing-mode:vertical-rl">Пыль Приход</th>
                                            <th style="writing-mode:vertical-rl">Пыль Расход</th>
                                            <th style="writing-mode:vertical-rl">Пыль Остаток</th>
                                            
                                            <th style="writing-mode:vertical-rl">Отсев Было</th>
                                            <th style="writing-mode:vertical-rl">Отсев Приход</th>
                                            <th style="writing-mode:vertical-rl">Отсев Расход</th>
                                            <th style="writing-mode:vertical-rl">Отсев Остаток</th>
                                            <th style="writing-mode:vertical-rl">Изменить</th>
                                            <th style="writing-mode:vertical-rl">Удалить</th>
                                            
                                        </tr>
                                    </thead>
                                   <tbody>
                                    <?php
                                    $message = "SELECT * FROM `Sirye_KPI`";
                                                    $link->set_charset("utf8");
                                                    $result =  mysqli_query( $link,  $message);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo"<tr>";
                                                            echo"<td><input type='date' class='form-control' required min='0' style='border:none; width:100%;' id='dateSirye' value='$row[date]'    ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sms_bilo'                    value='$row[brak_sms_bilo]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sms_prihod'                    value='$row[brak_sms_prihod]'     ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sms_rashod'              value='$row[brak_sms_rashod]'        ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sms_ostatok'              value='$row[brak_sms_ostatok]'   ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_bilo'              value='$row[brak_sulf_bilo]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_prihod'              value='$row[brak_sulf_prihod]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_rashod'              value='$row[brak_sulf_rashod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_ostatok'              value='$row[brak_sulf_ostatok]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_rastvor_bilo'               value='$row[brak_sulf_rastvor_bilo]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_rastvor_prihod'               value='$row[brak_sulf_rastvor_prihod]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_rastvor_rashod'         value='$row[brak_sulf_rastvor_rashod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='brak_sulf_rastvor_ostatok'         value='$row[brak_sulf_rastvor_ostatok]'></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='isolator_bilo'         value='$row[isolator_bilo]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='isolator_prihod'              value='$row[isolator_prihod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='isolator_rashod'              value='$row[isolator_rashod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='isolator_ostatok'              value='$row[isolator_ostatok]' ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='pil_bilo'               value='$row[pil_bilo]'    ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='pil_prihod'         value='$row[pil_prihod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='pil_rashod'         value='$row[pil_rashod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='pil_ostatok'         value='$row[pil_ostatok]' ></input></td>";
                                                            
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='otsev_bilo'              value='$row[otsev_bilo]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='otsev_prihod'              value='$row[otsev_prihod]'></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='otsev_rashod'              value='$row[otsev_rashod]' ></input></td>";
                                                            echo"<td><input type='number' class='form-control' required min='0' style='border:none; width:100%;'   id='otsev_ostatok'               value='$row[otsev_ostatok]' ></input></td>";
                                                            
                                                            echo"<td><button type='button' class='updateSirye btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                            echo"<td><button type='button' class='deleteSirye btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                        echo"</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                            $(document).ready
                                                (function() 
                                                    {$(".updateSirye").click
                                                        (function()
                                                    		{
                                                    		    var idSirye = $(this).val();
                                                    		    var dateSirye = $(this).closest("tr").find("#dateSirye").val();
                                                    		    
                                                                var brak_sms_bilo = $(this).closest("tr").find("#brak_sms_bilo").val();
                                                                var brak_sms_prihod = $(this).closest("tr").find("#brak_sms_prihod").val();
                                                                var brak_sms_rashod = $(this).closest("tr").find("#brak_sms_rashod").val();
                                                                var brak_sms_ostatok = $(this).closest("tr").find("#brak_sms_ostatok").val();
                                                                
                                                                var brak_sulf_bilo = $(this).closest("tr").find("#brak_sulf_bilo").val();
                                                                var brak_sulf_prihod = $(this).closest("tr").find("#brak_sulf_prihod").val();
                                                                var brak_sulf_rashod = $(this).closest("tr").find("#brak_sulf_rashod").val();
                                                                var brak_sulf_ostatok = $(this).closest("tr").find("#brak_sulf_ostatok").val();
                                                                
                                                                var brak_sulf_rastvor_bilo = $(this).closest("tr").find("#brak_sulf_rastvor_bilo").val();
                                                                var brak_sulf_rastvor_prihod = $(this).closest("tr").find("#brak_sulf_rastvor_prihod").val();
                                                                var brak_sulf_rastvor_rashod = $(this).closest("tr").find("#brak_sulf_rastvor_rashod").val();
                                                                var brak_sulf_rastvor_ostatok = $(this).closest("tr").find("#brak_sulf_rastvor_ostatok").val();
                                                                
                                                                var isolator_bilo = $(this).closest("tr").find("#isolator_bilo").val();
                                                                var isolator_prihod = $(this).closest("tr").find("#isolator_prihod").val();
                                                                var isolator_rashod = $(this).closest("tr").find("#isolator_rashod").val();
                                                                var isolator_ostatok = $(this).closest("tr").find("#isolator_ostatok").val();
                                                                
                                                                var pil_bilo = $(this).closest("tr").find("#pil_bilo").val();
                                                                var pil_prihod = $(this).closest("tr").find("#pil_prihod").val();
                                                                var pil_rashod = $(this).closest("tr").find("#pil_rashod").val();
                                                                var pil_ostatok = $(this).closest("tr").find("#pil_ostatok").val();
                                                                
                                                                var otsev_bilo = $(this).closest("tr").find("#otsev_bilo").val();
                                                                var otsev_prihod = $(this).closest("tr").find("#otsev_prihod").val();
                                                                var otsev_rashod = $(this).closest("tr").find("#otsev_rashod").val();
                                                                var otsev_ostatok = $(this).closest("tr").find("#otsev_ostatok").val();
                                                                
                                                    			$.ajax(
                                                                    {type: 'POST',
                                                                        dataType: 'html',
                                                                        url: 'updateSirye.php',
                                                                        
                                                                        data: ({dateSirye:dateSirye, 
                                                                        
                                                                                brak_sms_bilo:brak_sms_bilo,
                                                                                brak_sms_prihod:brak_sms_prihod,
                                                                                brak_sms_rashod:brak_sms_rashod,
                                                                                brak_sms_ostatok:brak_sms_ostatok,
                                                                                
                                                                                brak_sulf_bilo:brak_sulf_bilo,
                                                                                brak_sulf_prihod:brak_sulf_prihod,
                                                                                brak_sulf_rashod:brak_sulf_rashod,
                                                                                brak_sulf_ostatok:brak_sulf_ostatok,
                                                                                
                                                                                brak_sulf_rastvor_bilo:brak_sulf_rastvor_bilo,
                                                                                brak_sulf_rastvor_prihod:brak_sulf_rastvor_prihod,
                                                                                brak_sulf_rastvor_rashod:brak_sulf_rastvor_rashod,
                                                                                brak_sulf_rastvor_ostatok:brak_sulf_rastvor_ostatok,
                                                                                
                                                                                isolator_bilo:isolator_bilo,
                                                                                isolator_prihod:isolator_prihod,
                                                                                isolator_rashod:isolator_rashod,
                                                                                isolator_ostatok:isolator_ostatok,
                                                                                
                                                                                pil_bilo:pil_bilo,
                                                                                pil_prihod:pil_prihod,
                                                                                pil_rashod:pil_rashod,
                                                                                pil_ostatok:pil_ostatok,
                                                                                
                                                                                otsev_bilo:otsev_bilo,
                                                                                otsev_prihod:otsev_prihod,
                                                                                otsev_rashod:otsev_rashod,
                                                                                otsev_ostatok:otsev_ostatok,
                                                                                
                                                                                idSirye:idSirye}),
                                                                        success: function(response) 
                                                                        {
                                                                            var data = JSON.parse(response);}});});});
                                            </script>
                                    <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".deleteSirye").click
                                    (
                                		function()
                                		{
                                		    var deleteUser = this.value;
                                		    const { target } = event;
                                			$.ajax(
                                                {
                                                    type: 'POST',
                                                    dataType: 'html',
                                                    url: 'deleteRowSirye.php',
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

            
    </body>
</html>