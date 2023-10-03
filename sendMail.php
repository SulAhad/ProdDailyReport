<?php require('connect_db.php'); 
    if(isset($_SESSION['login']) == "")
    {header('Location: bridge.php');}
    $a = $_SESSION['login'];
?>
<html>  
    <head class=""><?php require('head.php')?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script src="https://cdn.emailjs.com/sdk/2.4.0/email.min.js"></script>
        <style>
            table {width: 100%;}
            th, td 
            {
              text-align: center;
              padding: 10px;
            }
        </style>
    </head>  
    <body class=" container">
        <?php
            require('mySidebar.php');
            echo"<button class=' openbtn' onclick='openNav()'>☰ </button>";
        ?>
        <div class="row">
            <div class="col-md-12 bg-light">
                <form id="emailForm" method="post" enctype="multipart/form-data">
                    <label>Введите тему</label>
                    <input name="name" class="form-control" value="Сменное задание"/><br>
                    <label>Введите почту от кого</label>
                    <input name="email" class="form-control" value="akhad.suleymanov@lab-industries.ru"/><br>
                    <label>Введите почту кому</label>
                    <select id="emailList" class="form-control">
                        <option value=""></option>
                      <option value="akhad.suleymanov@lab-industries.ru">akhad.suleymanov@lab-industries.ru</option>
                      <option value="sulahad@yandex.ru">sulahad@yandex.ru</option>
                      <option value="valerij.kanskij@lab-industries.ru">valerij.kanskij@lab-industries.ru</option>
                      <option value="sergey.fomin@lab-industries.ru">sergey.fomin@lab-industries.ru</option>
                      <option value="anastasia.arzamaszeva@lab-industries.ru">anastasia.arzamaszeva@lab-industries.ru</option>
                    </select>
                    <input name="address" id="addressInput" class="form-control"/><br>
                    
                    <script>
                      const emailList = document.getElementById("emailList");
                      const addressInput = document.getElementById("addressInput");
                    
                      emailList.addEventListener("change", () => {
                        const selectedValue = emailList.value;
                        addressInput.value += (addressInput.value ? ", " : "") + selectedValue;
                        // Удаляем выбранный адрес из списка
                        const selectedOption = emailList.querySelector(`option[value='${selectedValue}']`);
                        if (selectedOption) {
                          selectedOption.remove();
                        }
                      });
                    </script>
                    <label>Введите сообщение</label>
                    <div id="table" class="table-responsive">
                        <table style="border:1px; border-color:black;" class="table-bordered table table-sm">
                            <thead>
                                <input style="border:none; font-weight:bold;" max="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" id="selectedDate" onchange="fetchData()" />
                                <tbody style="border:1px; border-color:black;" id="tableBody"></tbody>
                            </thead>
                        </table>
                    </div><br>
                    <script>
                        var today = new Date();
                        var formattedDate = today.toISOString().substr(0, 10);
                        document.getElementById("selectedDate").value = formattedDate;
                        function fetchData() {
                            var selectedDate = document.getElementById("selectedDate").value;
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("tableBody").innerHTML = this.responseText;}};
                            xhttp.open("GET", "fetchDataToSendMail.php?date=" + selectedDate, true);
                            xhttp.send();}
                        fetchData();
                    </script>
                    <input type="submit" value="Отправить">
                </form>
                <div id="response"></div>
            </div>
            <script>
                $(document).ready(function() 
                {
                    $('#emailForm').submit(function(e) 
                    {
                        e.preventDefault();
                        var form = $(this);
                        var name = form.find('input[name="name"]').val();
                        var email = form.find('input[name="email"]').val();
                        var address = form.find('input[name="address"]').val();
                        var message = $('#tableBody').text(); // Получение данных из tableBody
                        $.ajax({
                            type: 'POST',
                            url: 'send_email.php',
                            data: {
                                name: name,
                                email: email,
                                address: address,
                                message: message},
                            success: function(response) 
                            {
                                $('#response').html(response);
                                form.find('input[type="text"]').val('');
                                form.find('input[type="email"]').val('');
                                form.find('input[type="address"]').val('');
                                form.find('textarea').val('');
                            }
                        });
                    });
                    /*function scheduleSendEmail() 
                    {
                        var now = new Date();
                        var currentHour = now.getHours();
                        var currentMinute = now.getMinutes();
                        if (currentHour === 11 && currentMinute === 35) 
                        {
                            $('#emailForm').submit();
                        }
                    }
                    setInterval(scheduleSendEmail, 60000);*/
                });
            </script>
        </div>
    </body>
</html>
