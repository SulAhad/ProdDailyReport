<head>  
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ежедневный мониторинг производства</title>
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src='bootstrap.bundle.min.js'></script>
        <link href='ajax-form-send.js'>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link type="image/x-icon" href="https://img.icons8.com/office/80/000000/line-chart.png" width="94" height="94" rel="shortcut icon">
       <style>
            #clock {
                color: grey;
                font-size: 18px;
                font-weight:bold;
                padding: 6px; /* убираем отступ справа */
            }
        </style>
       <header class="border-bottom">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="2left">
                    <?php require('bootstrapSidebar.php');?>
                </div>
                <h4 style="padding:6px;">ЕЖЕДНЕВНЫЙ МОНИТОРИНГ ПРОИЗВОДСТВА</h4>
                
                
                <div id="1right" class="d-flex align-items-center">
                <div id="clock" class="me-auto"></div>
                
            </div>
            </div>
        </header>
        <script>
            var hour = 0;
            var min = 0;
            var sec = 0;
            
            function currentTime() {
              var date = new Date(); /* получаем текущую дату и время */
              var day = date.getDate();
              var month = date.getMonth();
              var year = date.getFullYear();
              hour = date.getHours();
              min = date.getMinutes();
              sec = date.getSeconds();
              hour = updateTime(hour);
              min = updateTime(min);
              sec = updateTime(sec);
              day = updateTime(day);
              month = getMonthName(month);
              
              document.getElementById("clock").innerHTML = hour + " : " + min + " : " + sec; /* добавляем время и дату в div */
              
              var t = setTimeout(function(){ currentTime() }, 1000); /* устанавливаем таймер на повторение функции каждую секунду */
            }
            
            function updateTime(k) {
              if (k < 10) {
                return "0" + k;
              }
              else {
                return k;
              }
            }
            
            function getMonthName(month) {
                var months = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
                return months[month];
            }
            
            currentTime(); /* вызываем функцию currentTime(), чтобы запустить процесс */
        </script>
     <!-- <header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <div class="d-flex align-items-center">

        <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>-->
  
  
        <script src="sidebars.js"></script>
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
            <script>
            document.addEventListener("DOMContentLoaded", function(event) 
            {
                var loaderOverlay = document.getElementById("loader-overlayX");
                window.addEventListener("beforeunload", function() 
                {
                    loaderOverlay.style.display = "block";
                });
            });
        </script>
    <style>
    
            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }
            
            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }
            
            /* Add animation to "page content" */
            .animate-bottom {
              position: relative;
              -webkit-animation-name: animatebottom;
              -webkit-animation-duration: 1s;
              animation-name: animatebottom;
              animation-duration: 1s
            }
            
            @-webkit-keyframes animatebottom {
              from { bottom:-100px; opacity:0 } 
              to { bottom:0px; opacity:1 }
            }
            
            @keyframes animatebottom { 
              from{ bottom:-100px; opacity:0 } 
              to{ bottom:0; opacity:1 }
            }
    </style>
    <style>
        #loader-overlayX 
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 9999;
        }
        #loaderX 
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        @keyframes spin 
        {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
        <style>
            input.borderSolid{
                border-bottom: 2px solid gray;
            }
            textarea.borderSolid{
                border-bottom: 2px solid gray;
            }
            p.namesForTitle{
                font-size:30px; 
                border-bottom: 1px solid #f00;
            }
            body{
                background: radial-gradient(#F5F5F5, #E0FFFF);
            }
            .bodyBackground{
                 background: radial-gradient(#E0FFFF, #E0FFFF);
            }
            .sidebar {
                background-color: #FFFFFF;
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }
            .sidebar a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 16px;
              color: DarkGreen;
              display: block;
              transition: 0.3s;
            }
            .sidebar .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }
            .openbtn {
              font-size: 16px;
              cursor: pointer;
              color: black;
              padding: 10px 15px;
              border: none;
            }
            #main {
              transition: margin-left .5s;
              padding: 16px;
            }
            .sidebar{
                background: radial-gradient(#F5F5F5, #F5DEB3);
            }
            li:hover {
                background: #FFFFFF; /* Цвет фона под ссылкой */ 
               } 
            .closebtn:hover {
                background: none; /* Цвет фона под ссылкой */ 
            }
            .mb-3:hover {
                background: none; /* Цвет фона под ссылкой */ 
            }
        </style>
        
        
</head>  
