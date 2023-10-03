<?php require('connect_db.php'); 
    if(isset($_SESSION['login']) == "")
    {header('Location: bridge.php');}
    $a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head class=""><?php require('head.php')?>
        <script>
            $(document).ready(function() 
            {
                updateTable();
                updateTableTiming();
            });
        </script>
        <script src="https://cdn.emailjs.com/sdk/2.4.0/email.min.js"></script>
    </head>  
    <body>
        <div class="container">
            <div class="row bg-light card shadow-sm">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 bg-light">
                            <div class="alert alert-success" style="display:none; position: fixed; top: 0; right: 0;">Данные успешно сохранены!</div>
                            <div class="alert alert-success_Update" style="background:lightblue; display:none; position: fixed; top: 0; right: 0;">Данные успешно изменены!</div>
                            <div class="alert alert-success_Delete" style="background:lightyellow; display:none; position: fixed; top: 0; right: 0;">Строка успешно удалена!</div>
                            <div class="alert alert-success_noname" style="background:red; display:none; position: fixed; top: 0; right: 0;">Выберите Фамилию!</div>
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <div class="col-md-12">
                                    <form method="post" class="needs-validation">
                                        <div class="row">
                                            <input type="date" style="border-bottom: 2px solid gray; width:28%;" 
                                            value="<?php echo date('Y-m-d'); ?>" id="date" class="form-control m-1" 
                                            max="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" min="<?php echo date('Y-m-d', strtotime('-2 days')); ?>" onkeydown="return false"  required>
                                            <input id='name' class="form-control m-1" list="datalistOptions" style="border-bottom: 2px solid gray; width:68%;" placeholder="Введите Фамилию" required>
                                            <datalist id="datalistOptions">
                                                <?php
                                                    $message = "SELECT DISTINCT name FROM `InspectionList`";
                                                    $link->set_charset("utf8");
                                                    $results  =  mysqli_query( $link,  $message ); 
                                                    while($row = mysqli_fetch_assoc($results))
                                                    {
                                                        echo"<option value='$row[name]'>";
                                                    }
                                                ?>
                                            </datalist>
                                            <label for="textForList" style="font-size:12px;" class="mt-2">Примечание (описание несоответствий)</label>
                                            <select style="border-bottom: 2px solid gray;" id="textForList" class="form-select" aria-label="Default select example" autocomplete="on"> 
                                                <option value=""></option> 
                                                <option value="безопасное поведение на рабочем месте">безопасное поведение на рабочем месте</option> 
                                                <option value="состояние и применение СИЗ">состояние и применение СИЗ</option> 
                                                <option value="работы по наряд-допускам">работы по наряд-допускам</option> 
                                                <option value="знание и соблюдение инструкций по ОТ">знание и соблюдение инструкций по ОТ</option> 
                                                <option value="безопасное вождение и перемещение">безопасное вождение и перемещение</option> 
                                                <option value="обращение с химически опасными веществами">обращение с химически опасными веществами</option> 
                                                <option value="соблюдение процедуры LOTOTO">соблюдение процедуры LOTOTO</option> 
                                                <option value="инструменты и оборудование">инструменты и оборудование</option> 
                                                <option value="состояние знаков эвакуации, средств пожаротушения, электрощитовых">состояние знаков эвакуации, средств пожаротушения, электрощитовых</option> 
                                                <option value="оценка рисков на рабочих местах">оценка рисков на рабочих местах</option> 
                                            </select>
                                            <div class="btn-group mt-4" role="group" id="btnradio" aria-label="Basic radio toggle button group">
                                                <input value="Небезопасно" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                                                <label class="btn btn-outline-danger" for="btnradio1">Небезопасно</label>
                                                <input value="Безопасно" type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked>
                                                <label class="btn btn-outline-success" for="btnradio3">Безопасно</label>
                                            </div>
                                            <label for="comment" style="font-size:12px;" class="mt-2">Комментарий по обходу (опишите своими словами)</label>
                                            <input id='comment' class="form-control" type="text" style="border-bottom: 2px solid gray;" required>
                                            <div style="width:50%;" class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="intervention1">
                                                <label for="intervention1" class="form-check-label" for="flexCheckDefault">Вмешательство на месте</label>
                                            </div>
                                            <div style="width:50%;" class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="intervention2">
                                                <label for="intervention2" class="form-check-label" for="flexCheckDefault">Вопрос перенесен в AL</label>
                                            </div>   
                                            <div style="width:50%;">
                                                <label for="duration" style="font-size:12px;" class="mt-2">Длительность, мин</label>
                                                <input value="10" id='duration' class="form-control" placeholder="0" type="number" style="border-bottom: 2px solid gray;" min="10" step="5" required>
                                            </div>
                                            <div style="width:50%;">
                                                <label for="staff" style="font-size:12px;" class="mt-2">Штатный персонал</label>
                                                <input id='staff' min="0" class="form-control" type="number" style="border-bottom: 2px solid gray;" placeholder="количество наблюдаемых" required>
                                            </div>
                                            <div style="width:50%;">
                                                <label for="contract" style="font-size:12px;" class="mt-2">Подрядный персонал</label>
                                                <input id='contract' min="0" class="form-control" type="number" style="border-bottom: 2px solid gray;" placeholder="количество наблюдаемых" required>
                                            </div>
                                            <label for="production" style="font-size:12px;" class="mt-2">Производство</label>
                                            <select style="border-bottom: 2px solid gray;" id="production" onchange="showList2()" name="production" class="form-select" aria-label="Default select example">
                                                <option value=""></option>
                                                <option value="Сульфирования">Сульфирования</option>
                                                <option value="СМС">СМС</option>
                                                <option value="ALL">ALL</option>
                                            </select>
                                            <label for="areaCMC" style="font-size:12px;" class="mt-2">Участок</label>
                                            <select style="border-bottom: 2px solid gray;" id="areaCMC" onchange="showList3()" name="areaCMC" class="form-select" aria-label="Default select example" placeholder="Участок">
                                                <option value=""></option>
                                            </select>
                                            <!--<input type="file" accept="image/*" id='image' class="form-control mt-4" />-->
                                            <button type="button" class="mt-4 add btn btn-outline-success shadow-sm">Сохранить</button>
                                            <div id="response"></div>
                                        </div>
                                    </form>
                                </div>
                                <script>
                                    function showList2() 
                                    {
                                        var production = document.getElementById("production");
                                        var areaCMC = document.getElementById("areaCMC");
                                        var equipmentCMC = document.getElementById("equipmentCMC");
                                        
                                        // Очистить список 2
                                        areaCMC.innerHTML = "нет данных";
        
                                        // Получить выбранный элемент списка 1
                                        var selected = production.options[production.selectedIndex].value;
                                        
                                        // Добавить элементы в список 2 в зависимости от выбранного элемента списка 1
                                        if (selected == "Сульфирования") 
                                            {
                                                areaCMC.innerHTML += "<option value=''></option>";
                                                areaCMC.innerHTML += "<option value='Поз03'>Поз03</option>";
                                                areaCMC.innerHTML += "<option value='Поз07'>Поз07</option>";
                                                areaCMC.innerHTML += "<option value='Поз11'>Поз11</option>";
                                                areaCMC.innerHTML += "<option value='Поз12'>Поз12</option>";
                                                areaCMC.innerHTML += "<option value='Поз14'>Поз14</option>";
                                                areaCMC.innerHTML += "<option value='Поз16'>Поз16</option>";
                                                areaCMC.innerHTML += "<option value='Поз25'>Поз25</option>";
                                                areaCMC.innerHTML += "<option value='Поз26'>Поз26</option>";
                                                areaCMC.innerHTML += "<option value='Поз28'>Поз28</option>";
                                                areaCMC.innerHTML += "<option value='Поз33'>Поз33</option>";
                                                areaCMC.innerHTML += "<option value='Малая насосная'>Малая насосная</option>";
                                                areaCMC.innerHTML += "<option value='Баковое хозяйство'>Баковое хозяйство</option>";
                                                areaCMC.innerHTML += "<option value='Градирня'>Градирня</option>";
                                                areaCMC.innerHTML += "<option value='Приточка'>Приточка</option>";
                                                areaCMC.innerHTML += "<option value='Вытяжка'>Вытяжка</option>";
                                                areaCMC.innerHTML += "<option value='Сливная'>Сливная</option>";
                                                areaCMC.innerHTML += "<option value='Склад серы'>Склад серы</option>";
                                            }   
                                        else if (selected == "СМС") 
                                            {
                                                areaCMC.innerHTML += "<option value=''></option>";
                                                areaCMC.innerHTML += "<option value='Фасовка'>Фасовка</option>";
                                                areaCMC.innerHTML += "<option value='Паллетайзер'>Паллетайзер</option>";
                                                areaCMC.innerHTML += "<option value='Компаунд'>Компаунд</option>";
                                                areaCMC.innerHTML += "<option value='Композиция'>Композиция</option>";
                                                areaCMC.innerHTML += "<option value='Пост.добавки'>Пост.добавки</option>";
                                                areaCMC.innerHTML += "<option value='Газогенераторная'>Газогенераторная</option>";
                                                areaCMC.innerHTML += "<option value='Отдушка'>Отдушка</option>";
                                                areaCMC.innerHTML += "<option value='Участок сырья'>Участок сырья</option>";
                                                areaCMC.innerHTML += "<option value='Жидкое стекло'>Жидкое стекло</option>";
                                                areaCMC.innerHTML += "<option value='Сливная'>Сливная</option>";
                                                areaCMC.innerHTML += "<option value='Баковое хозяйство'>Баковое хозяйство</option>";
                                                areaCMC.innerHTML += "<option value='Малая насосная'>Малая насосная</option>";
                                                areaCMC.innerHTML += "<option value='Расстарочная'>Расстарочная</option>";
                                                areaCMC.innerHTML += "<option value='Домино'>Домино</option>";
        
                                                
                                            } 
                                        else if (selected == "ALL") 
                                            {
                                                areaCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option>Выберите элемент</option>";
                                                areaCMC.innerHTML += "<option value='Главный корпус'>Главный корпус</option>";
                                                areaCMC.innerHTML += "<option value='АБК'>АБК</option>";
                                                areaCMC.innerHTML += "<option value='ИВК'>ИВК</option>";
                                                areaCMC.innerHTML += "<option value='Сульфирование'>Сульфирование</option>";
                                                areaCMC.innerHTML += "<option value='М.насосная'>М.насосная</option>";
                                                areaCMC.innerHTML += "<option value='Гараж'>Гараж</option>";
                                                areaCMC.innerHTML += "<option value='Сливная'>Сливная</option>";
                                                areaCMC.innerHTML += "<option value='СГП 1'>СГП 1</option>";
                                                areaCMC.innerHTML += "<option value='СГП 2'>СГП 2</option>";
                                                areaCMC.innerHTML += "<option value='Хоз.быт'>Хоз.быт</option>";
                                                areaCMC.innerHTML += "<option value='Лаборатория'>Лаборатория</option>";
                                                areaCMC.innerHTML += "<option value='Столовая'>Столовая</option>";
                                                areaCMC.innerHTML += "<option value='ALL'>ALL</option>";
                                                areaCMC.innerHTML += "<option value='Другое'>Другое</option>";
                                                areaCMC.innerHTML += "<option value='Территория'>Территория</option>";
                                                areaCMC.innerHTML += "<option value='Склад Перкарбоната'>Склад Перкарбоната</option>";
                                                areaCMC.innerHTML += "<option value='Рампа картонажа'>Рампа картонажа</option>";
                                            }
                                    }
                                    function showList3() 
                                    {
                                        var areaCMC = document.getElementById("areaCMC");
                                        var equipmentCMC = document.getElementById("equipmentCMC");
                                        // Очистить список 2
                                        equipmentCMC.innerHTML = "нет данных";
                                        
                                        // Получить выбранный элемент списка 1
                                        var selected = areaCMC.options[areaCMC.selectedIndex].value;
                                        if (selected == "Фасовка") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='Иннотех 1'>Иннотех 1</option>";
                                                equipmentCMC.innerHTML += "<option value='Иннотех 2'>Иннотех 2</option>";
                                                equipmentCMC.innerHTML += "<option value='Иннотех 3'>Иннотех 3</option>";
                                                equipmentCMC.innerHTML += "<option value='UVA 4'>UVA 4</option>";
                                                equipmentCMC.innerHTML += "<option value='UVA 5'>UVA 5</option>";
                                                equipmentCMC.innerHTML += "<option value='AKMA'>AKMA</option>";
                                                equipmentCMC.innerHTML += "<option value='Электротельфер № 85 (Фасовка у окна)'>Электротельфер № 85 (Фасовка у окна)</option>";
                                                equipmentCMC.innerHTML += "<option value='Электротельфер № 90 (Фасовка UVA)'>Электротельфер № 90 (Фасовка UVA)</option>";
                                            }
                                        else if (selected == "Паллетайзер") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='11.10/1К - Транспортирующие линии Clevertech'>11.10/1К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='М69 - Транспортер'>М69 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М70 - Транспортер'>М70 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М71 - Транспортер'>М71 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М72 - Транспортер'>М72 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='11.10/2К - Транспортирующие линии Clevertech'>11.10/2К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='М61 - Транспортер'>М61 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М62 - Транспортер'>М62 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М63 - Транспортер'>М63 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М64 - Транспортер'>М64 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М65 - Транспортер'>М65 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='11.10/3К - Транспортирующие линии Clevertech'>11.10/3К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='М54 - Транспортер>М54 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М55 - Транспортер'>М55 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М56 - Транспортер'>М56 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М57 - Транспортер'>М57 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М58 - Транспортер'>М58 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М59 - Транспортер'>М59 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='11.10/5К - Транспортирующие линии Clevertech'>11.10/5К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='11.10/6К - Транспортирующие линии Clevertech'>11.10/6К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='11.10/8К - Транспортирующие линии Clevertech'>11.10/8К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='11.11/1К - Транспортирующие линии Clevertech'>11.11/1К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='М51 - Транспортер'>М51 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М52 - Транспортер'>М52 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='М53 - Транспортер'>М53 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='11.11/2К - Транспортирующие линии Clevertech'>11.11/2К - Транспортирующие линии Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='11.11/1П - Паллетоукладчик Clevertech'>11.11/1П - Паллетоукладчик Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='11.11/2П - Паллетоукладчик Clevertech'>11.11/2П - Паллетоукладчик Clevertech</option>";
                                                equipmentCMC.innerHTML += "<option value='11.13 - Паллетообёртчик Clevertech (Атланта)'>11.13 - Паллетообёртчик Clevertech (Атланта)</option>";
                                                equipmentCMC.innerHTML += "<option value='М13 - Транспортер'>М13 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='Принтер ZETES'>Принтер ZETES</option>";
                                            }
                                        else if (selected == "Компаунд") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='12M1 - Барабан - смеситель'>12M1 - Барабан - смеситель</option>";
                                                equipmentCMC.innerHTML += "<option value='12А1 - Аэролифт'>12А1 - Аэролифт</option>";
                                                equipmentCMC.innerHTML += "<option value='12В1 - Вентилятор аэролифта<'>12В1 - Вентилятор аэролифта</option>";
                                                equipmentCMC.innerHTML += "<option value='12В2 - Вентилятор'>12В2 - Вентилятор</option>";
                                                equipmentCMC.innerHTML += "<option value='12ВС1 - Вибросито'>12ВС1 - Вибросито</option>";
                                                equipmentCMC.innerHTML += "<option value='12Д1 - Дозатор'>12Д1 - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='12Д2 - Дозатор'>12Д2 - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='12Д2Ш - Шлюзовик'>12Д2Ш - Шлюзовик</option>";
                                                equipmentCMC.innerHTML += "<option value='12Е1 - Бункер'>12Е1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='12Е2 - Емкость'>12Е2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='12Е3 - Емкость'>12Е3 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='12К1 - Конвейер'>12К1 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К2 - Конвейер'>12К2 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К3 - Конвейер'>12К3 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К4 - Конвейер'>12К4 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К5 - Конвейер'>12К5 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К6 - Конвейер<'>12К6 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К7 - Конвейер'>12К7 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К8 - Конвейер'>12К8 - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='12К1 - Скребки'>12К1 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К2 - Скребки'>12К2 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К3 - Скребки'>12К3 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К4 - Скребки'>12К4 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К5 - Скребки'>12К5 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К6 - Скребки'>12К6 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К7 - Скребки'>12К7 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12К8 - Скребки'>12К8 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='12Н1 - Насос'>12Н1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='12НД1 - Насос'>12НД1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='12НД2 - Насос'>12НД2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='12НД3 - Насос(Резерв)'>12НД3 - Насос(Резерв)</option>";
                                                equipmentCMC.innerHTML += "<option value='12Ф1 - Фильтр рукавный аспирационный'>12Ф1 - Фильтр рукавный аспирационный</option>";
                                                equipmentCMC.innerHTML += "<option value='12Ф2 - Фильтр рукавный аспирационный'>12Ф2 - Фильтр рукавный аспирационный</option>";
                                            }
                                        else if (selected == "Композиция") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='8.2/3 - Насос'>8.2/3 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.4/1 - Бункер'>8.4/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.4/2 - Жидкие весы'>8.4/2 - Жидкие весы</option>";
                                                equipmentCMC.innerHTML += "<option value='8.7/1 - Питатель шнековый'>8.7/1 - Питатель шнековый</option>";
                                                equipmentCMC.innerHTML += "<option value='8.7/2 - Питатель шнековый'>8.7/2 - Питатель шнековый</option>";
                                                equipmentCMC.innerHTML += "<option value='8.7/3 - Питатель шнековый'>8.7/3 - Питатель шнековый</option>";
                                                equipmentCMC.innerHTML += "<option value='8.7/4 - Питатель шнековый'>8.7/4 - Питатель шнековый</option>";
                                                equipmentCMC.innerHTML += "<option value='8.7/5 - Питатель шнековый'>8.7/5 - Питатель шнековый</option>";
                                                equipmentCMC.innerHTML += "<option value='8.7/6 - Питатель шнековый'>8.7/6 - Питатель шнековый</option>";
                                                equipmentCMC.innerHTML += "<option value='8.8/1 - Весы бункерные'>8.8/1 - Весы бункерные</option>";
                                                equipmentCMC.innerHTML += "<option value='8.8/2 - Весы бункерные'>8.8/2 - Весы бункерные</option>";
                                                equipmentCMC.innerHTML += "<option value='8.8/3 - Весы бункерные'>8.8/3 - Весы бункерные</option>";
                                                equipmentCMC.innerHTML += "<option value='8.8/4 - Весы бункерные'>8.8/4 - Весы бункерные</option>";
                                                equipmentCMC.innerHTML += "<option value='8.8/5 - Весы бункерные'>8.8/5 - Весы бункерные</option>";
                                                equipmentCMC.innerHTML += "<option value='8.8/6 - Весы бункерные'>8.8/6 - Весы бункерные</option>";
                                                equipmentCMC.innerHTML += "<option value='8.9/1 - Транспортер'>8.9/1 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.9/2 - Транспортер'>8.9/2 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.9/3 - Транспортер'>8.9/3 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.9/4 - Транспортер'>8.9/4 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.9/5 - Транспортер'>8.9/5 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.11/1 - Реактор - смеситель'>8.11/1 - Реактор - смеситель</option>";
                                                equipmentCMC.innerHTML += "<option value='8.11/2 - Реактор - смеситель'>8.11/2 - Реактор - смеситель</option>";
                                                equipmentCMC.innerHTML += "<option value='8.12/1 - Фильтр самоочищающийся'>8.12/1 - Фильтр самоочищающийся</option>";
                                                equipmentCMC.innerHTML += "<option value='8.12/2 - Фильтр самоочищающийся'>8.12/2 - Фильтр самоочищающийся</option>";
                                                equipmentCMC.innerHTML += "<option value='8.13/1 - Насос</option'>8.13/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.13/2 - Насос'>8.13/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.14/1 - Емкость'>8.14/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='8.14/2 - Емкость'>8.14/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='8.15/1 - Насос'>8.15/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.15/2 - Насос'>8.15/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.16/1 - Насос'>8.16/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.16/2 - Насос'>8.16/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.17/1 - Баллестра'>8.17/1 - Баллестра</option>";
                                                equipmentCMC.innerHTML += "<option value='8.17/2Б - Компенсатор давления'>8.17/2Б - Компенсатор давления</option>";
                                                equipmentCMC.innerHTML += "<option value='8.17/3 - Баллестра'>8.17/3 - Баллестра</option>";
                                                equipmentCMC.innerHTML += "<option value='8.17/2 - Баллестра'>8.17/2 - Баллестра</option>";
                                                equipmentCMC.innerHTML += "<option value='9.3 - Вентилятор'>9.3 - Вентилятор</option>";
                                                equipmentCMC.innerHTML += "<option value='9.4 - Башня сушильно-распылительная'>9.4 - Башня сушильно-распылительная</option>";
                                                equipmentCMC.innerHTML += "<option value='9.4В - Вентилятор'>9.4В - Вентилятор</option>";
                                                equipmentCMC.innerHTML += "<option value='9.4Ф - Фильтр сушильной башни'>9.4Ф - Фильтр сушильной башни</option>";
                                                equipmentCMC.innerHTML += "<option value='9.5Л - Лебедка'>9.5Л - Лебедка</option>";
                                                equipmentCMC.innerHTML += "<option value='9.6 - Траспортер наклонный'>9.6 - Траспортер наклонный</option>";
                                                equipmentCMC.innerHTML += "<option value='9.7 - Аэролифт'>9.7 - Аэролифт</option>";
                                                equipmentCMC.innerHTML += "<option value='9.6 - Вентилятор аэролифта'>9.6 - Вентилятор аэролифта</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37Н2/1 - Насос'>10.37Н2/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37Н2/2 - Насос'>10.37Н2/2 - Насос</option>";
                                            }
                                        else if (selected == "Пост.добавки") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='9К6 - Транспортер'>9К6 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.9К - Конвейер'>9.9К - Конвейер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.9Ш - Шлюзовик 'APOLLO''>9.9Ш - Шлюзовик 'APOLLO'</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10К2 - Транспортер'>9.10К2 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10К2 - Скребки'>9.10К2 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10К3 - Транспортер'>9.10К3 - Транспортер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10К3 - Скребки'>9.10К3 - Скребки</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/1А - Бункер А'>9.10/1А - Бункер А</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/1Б - Бункер Б'>9.10/1Б - Бункер Б</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/2 - Бункер'>9.10/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/3А - Бункер'>9.10/3А - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/3Б - Бункер'>9.10/3Б - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/2.1Д - Дозатор'>9.10/2.1Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='9.10/2.2Д - Дозатор'>9.10/2.2Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='9.17В - Вентилятор'>9.17В - Вентилятор</option>";
                                                equipmentCMC.innerHTML += "<option value='9.17Ф - Фильтр рукавный'>9.17Ф - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='9.17Ш - Шлюзовик'>9.17Ш - Шлюзовик</option>";
                                                equipmentCMC.innerHTML += "<option value='9.18В - Вентилятор'>9.18В - Вентилятор</option>";
                                                equipmentCMC.innerHTML += "<option value='9.18ВФ - Фильтр рукавный 'Mikro Pulsaure''>9.18ВФ - Фильтр рукавный 'Mikro Pulsaure'</option>";
                                                equipmentCMC.innerHTML += "<option value='10.1Ф - Фильтр рукавный'>10.1Ф - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='10.1/Ф2 - Фильтр рукавный'>10.1/Ф2 - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='10.5Ф - Фильтр рукавный'>10.5Ф - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='10.13Ф - Фильтр рукавный'>10.13Ф - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='10.20Ф - Фильтр рукавный'>10.20Ф - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='10.36Ф - Фильтр рукавный'>10.36Ф - Фильтр рукавный</option>";
                                                equipmentCMC.innerHTML += "<option value='10.1 - Бункер'>10.1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.2 - Бункер<'>10.2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.3 - Бункер'>10.3 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.4 - Бункер'>10.4 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.5 - Бункер'>10.5 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.6 - Бункер'>10.6 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.7 - Бункер'>10.7 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.8 - Бункер'>10.8 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.9 - Бункер'>10.9 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.10 - Бункер'>10.10 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.11 - Бункер'>10.11 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.12 - Бункер'>10.12 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.13 - Бункер'>10.13 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.14/1 - Бункер'>10.14/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.14/2 - Бункер'>10.14/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.15/1 - Бункер'>10.15/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.15/2 - Бункер'>10.15/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.16/1 - Бункер'>10.16/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.16/2 - Бункер'>10.16/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.17/1 - Бункер'>10.17/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.17/2 - Бункер'>10.17/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.18 - Бункер'>10.18 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.19 - Бункер'>10.19 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.20 - Бункер'>10.20 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.22 - Бункер'>10.22 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.24 - Бункер'>10.24 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.28 - Бункер'>10.28 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.29/1 - Бункер'>10.29/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.29/2 - Бункер'>10.29/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.30/1 - Бункер'>10.30/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.33 - Бункер'>10.33 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.35 - Бункер'>10.35 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.26/1 - Бункер'>10.26/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.36/2 - Бункер'>10.36/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/2 - Бункер'>10.37/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.39 - Бункер'>10.39 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.40 - Бункер'>10.40 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.41 - Бункер'>10.41 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.42 - Бункер'>10.42 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.43 - Бункер'>10.43 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.44 - Бункер'>10.44 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.45 - Бункер'>10.45 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.46 - Бункер'>10.46 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.47 - Бункер'>10.47 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.48 - Бункер'>10.48 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.49 - Бункер'>10.49 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.50 - Бункер'>10.50 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='10.1Д - Дозатор'>10.1Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.2Д - Дозатор'>10.2Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.3Д - Дозатор'>10.3Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.4Д - Дозатор'>10.4Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.5Д - Дозатор'>10.5Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.6Д - Дозатор'>10.6Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.7Д - Дозатор'>10.7Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.8Д - Дозатор'>10.8Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='0.9Д - Дозатор'>10.9Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.10Д - Дозатор'>10.10Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.11Д - Дозатор'>10.11Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.12Д - Дозатор'>10.12Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.13Д - Дозатор'>10.13Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.14Д - Дозатор'>10.14Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.15Д - Дозатор'>10.15Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.16Д - Дозатор'>10.16Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.17Д - Дозатор'>10.17Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.18Д - Дозатор'>10.18Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.19Д - Дозатор'>10.19Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.20Д - Дозатор'>10.20Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.21Д - Дозатор'>10.21Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.22Д - Дозатор'>10.22Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.24Д - Дозатор'>10.24Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.27Д - Дозатор'>10.27Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.28Д - Дозатор'>10.28Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.29Д - Дозатор'>10.29Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.30Д - Дозатор'>10.30Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.31Д - Дозатор'>10.31Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.33Д - Дозатор'>10.33Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.34Д - Дозатор'>10.34Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.35Д - Дозатор'>10.35Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.36Д - Дозатор'>10.36Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37Д - Дозатор'>10.37Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.38Д - Дозатор'>10.38Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.41Д - Дозатор'>10.41Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.42Д - Дозатор'>10.42Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.43Д - Дозатор'>10.43Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.44Д - Дозатор'>10.44Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.45Д - Дозатор'>10.45Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.46Д - Дозатор'>10.46Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.47Д - Дозатор'>10.47Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.48Д - Дозатор'>10.48Д - Дозатор</option>";
                                                equipmentCMC.innerHTML += "<option value='10.1Ш/1 - Шлюзовик'>10.1Ш/1 - Шлюзовик</option>";
                                                quipmentCMC.innerHTML += "<option value='10.1Ш/2 - Шлюзовик'>10.1Ш/2 - Шлюзовик</option>";
                                                quipmentCMC.innerHTML += "<option value='10.36В - Вентилятор'>10.36В - Вентилятор</option>";
                                                quipmentCMC.innerHTML += "<option value='10.37/1-16 - Емкость отдушки'>10.37/1-16 - Емкость отдушки</option>";
                                                quipmentCMC.innerHTML += "<option value='10.37Н2/1 - Насос<'>10.37Н2/1 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.37Н2/2 - Насос'>10.37Н2/2 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.37НД1 А - Насос'>10.37НД1 А - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.37НД1 Б - Насос'>10.37НД1 Б - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.ДЖ2 - Насос'>10.ДЖ2 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.ДЖ4 - Насос<'>10.ДЖ4 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.ДЖ5/1 - Насос<'>10.ДЖ5/1 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.ДЖ5/2 - Насос'>10.ДЖ5/2 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.ДЖ6 - Насос'>10.ДЖ6 - Насос</option>";
                                                quipmentCMC.innerHTML += "<option value='10.М1 - Компомиксер'>10.М1 - Компомиксер</option>";
                                                quipmentCMC.innerHTML += "<option value='10.М2 - Компомиксер'>10.М2 - Компомиксер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К10 - Скребки<'>10К10 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К10 - Транспортер'>10К10 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К2 - Скребки'>10К2 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К2 - Транспортер'>10К2 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К3 - Скребки'>10К3 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К3 - Транспортер'>10К3 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К4 - Скребки'>10К4 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К4 - Транспортер'>10К4 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К6 - Скребки'>10К6 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К6 - Транспортер'>10К6 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К8 - Скребки'>10К8 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К8 - Транспортер'>10К8 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='10К9 - Скребки'>10К9 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='10К9 - Транспортер'>10К9 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='11.1/1 - Нория'>11.1/1 - Нория</option>";
                                                quipmentCMC.innerHTML += "<option value='11.1/2 - Нория'>11.1/2 - Нория</option>";
                                                quipmentCMC.innerHTML += "<option value='11.1/1В - Вибросито'>11.1/1В - Вибросито</option>";
                                                quipmentCMC.innerHTML += "<option value='11.1/2В - Вибросито'>11.1/2В - Вибросито</option>";
                                                quipmentCMC.innerHTML += "<option value='11.1/1М - Миксер 'Helix mixer''>11.1/1М - Миксер 'Helix mixer'</option>";
                                                quipmentCMC.innerHTML += "<option value='11.1/2М - Миксер 'Helix mixer''>11.1/2М - Миксер 'Helix mixer'</option>";
                                                quipmentCMC.innerHTML += "<option value='11.2/1 - Конвейер 'APOLLO''>11.2/1 - Конвейер 'APOLLO'</option>";
                                                quipmentCMC.innerHTML += "<option value='11.2/2 - Конвейер 'APOLLO''>11.2/2 - Конвейер 'APOLLO'</option>";
                                                quipmentCMC.innerHTML += "<option value='11.2/3 - Конвейер 'APOLLO''>11.2/3 - Конвейер 'APOLLO'</option>";
                                                quipmentCMC.innerHTML += "<option value='11.2/4 - Конвейер 'APOLLO''>11.2/4 - Конвейер 'APOLLO'</option>";
                                                quipmentCMC.innerHTML += "<option value='11.2/7 - Скребки'>11.2/7 - Скребки</option>";
                                                quipmentCMC.innerHTML += "<option value='11.2/7 - Транспортер'>11.2/7 - Транспортер</option>";
                                                quipmentCMC.innerHTML += "<option value='Dustcontrol(пылеуборка фасовки)'>Dustcontrol(пылеуборка фасовки)</option>";
                                                quipmentCMC.innerHTML += "<option value='Фтор24(пылеуборка Apollo)'>Фтор24(пылеуборка Apollo)</option>";
                                            }
                                        else if (selected == "Газогенераторная") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='9.1 - Теплогенератор 'MAXON''>9.1 - Теплогенератор 'MAXON'</option>";
                                                equipmentCMC.innerHTML += "<option value='9.1В - Вентилятор 'MAXON''>9.1В - Вентилятор 'MAXON'</option>";
                                                
                                            }
                                        else if (selected == "Отдушка") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='10.37Н2/1 - Насос'>10.37Н2/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37Н2/1 - Насос'>10.37Н2/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/1 - Емкость отдушки'>10.37/1 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/2 - Емкость отдушки<'>10.37/2 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/3 - Емкость отдушки'>10.37/3 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/4 - Емкость отдушки'>10.37/4 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/5 - Емкость отдушки'>10.37/5 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/6 - Емкость отдушки'>10.37/6 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/7 - Емкость отдушки'>10.37/7 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/8 - Емкость отдушки'>10.37/8 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/9 - Емкость отдушки'>10.37/9 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/10 - Емкость отдушки'>10.37/10 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/11 - Емкость отдушки'>10.37/11 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/12 - Емкость отдушки'>10.37/12 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/13 - Емкость отдушки'>10.37/13 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/14 - Емкость отдушки'>10.37/14 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/15 - Емкость отдушки'>10.37/15 - Емкость отдушки</option>";
                                                equipmentCMC.innerHTML += "<option value='10.37/16 - Емкость отдушки'>10.37/16 - Емкость отдушки</option>";
                                                
                                            }
                                        else if (selected == "Участок сырья") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='2.1/1 - Пневморазгрузчик'>2.1/1 - Пневморазгрузчик</option>";
                                                equipmentCMC.innerHTML += "<option value='2.1/1Ш - Загрузочная камера и шлюзовик'>2.1/1Ш - Загрузочная камера и шлюзовик</option>";
                                                equipmentCMC.innerHTML += "<option value='2.1/2 - Воздуходувка'>2.1/2 - Воздуходувка</option>";
                                                equipmentCMC.innerHTML += "<option value='2.1/Р1 - Стол растарочный'>2.1/Р1 - Стол растарочный</option>";
                                                equipmentCMC.innerHTML += "<option value='2.10 - Пресс гидравлический'>2.10 - Пресс гидравлический</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2 - Аспирация соды'>2.2 - Аспирация соды</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/1 - Конвейер 'SCHRAGE''>2.2/1 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/1Ш - Шлюзовик'>2.2/1Ш - Шлюзовик</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/10 - Конвейер 'SCHRAGE''>2.2/10 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/11 - Конвейер 'SCHRAGE''>2.2/11 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/12 - Конвейер 'SCHRAGE''>2.2/12 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/2 - Конвейер 'SCHRAGE''>2.2/2 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/3 - Конвейер 'SCHRAGE''>2.2/3 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/4 - Конвейер 'SCHRAGE''>2.2/4 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/5 - Конвейер 'SCHRAGE''>2.2/5 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/6 - Конвейер 'SCHRAGE''>2.2/6 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/6Ш - Шлюзовик'>2.2/6Ш - Шлюзовик</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/7 - Конвейер 'SCHRAGE''>2.2/7 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/8 - Конвейер 'SCHRAGE''>2.2/8 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/9 - Конвейер 'SCHRAGE''>2.2/9 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.2/Р2 - Стол растарочный'>2.2/Р2 - Стол растарочный</option>";
                                                equipmentCMC.innerHTML += "<option value='2.6/1 - Бункер'>2.6/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.6/2 - Бункер'>2.6/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.6/3 - Бункер'>2.6/3 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.6/4 - Бункер'>2.6/4 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.7/1 - Бункер'>2.7/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.7/2 - Бункер'>2.7/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.7/3 - Бункер'>2.7/3 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.7/4 - Бункер'>2.7/4 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='2.8/1 - Конвейер 'SCHRAGE''>2.8/1 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.8/2 - Конвейер 'SCHRAGE''>2.8/2 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.8/3 - Конвейер 'SCHRAGE''>2.8/3 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.8/4 - Конвейер 'SCHRAGE''>2.8/4 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.9/1 - Конвейер 'SCHRAGE''>2.9/1 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.9/2 - Конвейер 'SCHRAGE''>2.9/2 - Конвейер 'SCHRAGE'</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/1 - Бункер'>8.6/1 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/1Ф - Фильтр 'DALAMATIC''>8.6/1Ф - Фильтр 'DALAMATIC'</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/2 - Бункер'>8.6/2 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/3 - Бункер'>8.6/3 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/4 - Бункер'>8.6/4 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/5 - Бункер'>8.6/5 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/6 - Бункер'>8.6/6 - Бункер</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/2Ф - Фильтр 'DALAMATIC''>8.6/2Ф - Фильтр 'DALAMATIC'</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/3Ф - Фильтр 'DALAMATIC''>8.6/3Ф - Фильтр 'DALAMATIC'</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/4Ф - Фильтр 'DALAMATIC''>8.6/4Ф - Фильтр 'DALAMATIC'</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/5Ф - Фильтр 'DALAMATIC''>8.6/5Ф - Фильтр 'DALAMATIC'</option>";
                                                equipmentCMC.innerHTML += "<option value='8.6/6Ф - Фильтр 'DALAMATIC''>8.6/6Ф - Фильтр 'DALAMATIC'</option>";
                                                equipmentCMC.innerHTML += "<option value='2.6.4/1ш<'>2.6.4/1ш</option>";
                                                equipmentCMC.innerHTML += "<option value='Кран-балка №75 (Сырье рампа)'>Кран-балка №75 (Сырье рампа)</option>";
                                                equipmentCMC.innerHTML += "<option value='Кран-балка №81 (Сырье рампа)'>Кран-балка №81 (Сырье рампа)</option>";
                                                
                                                
                                            }  
                                        else if (selected == "Жидкое стекло") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='4.1/3 - Автоклав'>4.1/3 - Автоклав</option>";
                                                equipmentCMC.innerHTML += "<option value='4.1/4 - Автоклав'>4.1/4 - Автоклав</option>";
                                                equipmentCMC.innerHTML += "<option value='4.1/5 - Автоклав'>4.1/5 - Автоклав</option>";
                                                equipmentCMC.innerHTML += "<option value='4.2/1 - Емкость'>4.2/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='4.2/2 - Емкость'>4.2/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='4.3Ф - Фильтр грязевик'>4.3Ф - Фильтр грязевик</option>";
                                                equipmentCMC.innerHTML += "<option value='4.4 - Насос'>4.4 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='4.5/1 - Емкость'>4.5/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='4.5/2 - Емкость'>4.5/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='4.5/3 - Емкость'>4.5/3 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='4.5/3 - Насос'>4.5/3 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='4.6 - Насос'>4.6 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='4.7А - Насос'>4.7А - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='4.7Б - Насос'>4.7Б - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/1 - Емкость'>6.1/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/2 - Емкост'>6.1/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/3 - Емкость'>6.1/3 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/4 - Емкость'>6.1/4 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/5 - Емкость'>6.1/5 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/6 - Емкость'>6.1/6 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/7 - Емкость'>6.1/7 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/1Ф - Фильтр'>6.1/1Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/2Ф - Фильтр'>6.1/2Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/3Ф - Фильтр'>6.1/3Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/4Ф - Фильтр'>6.1/4Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/5Ф - Фильтр'>6.1/5Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/6Ф - Фильтр'>6.1/6Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.1/7Ф - Фильтр'>6.1/7Ф - Фильтр</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/1 - Насос'>6.2/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/3 - Насос'>6.2/3 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/4 - Насос'>6.2/4 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/5А - Насос'>6.2/5А - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/5Б - Насос'>6.2/5Б - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/7 - Насос'>6.2/7 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='8.1/1 - Емкость'>8.1/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='8.1/2 - Емкость'>8.1/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='8.1/3 - Емкость'>8.1/3 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='8.1/4 - Емкость'>8.1/4 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='8.2/1 - Емкость'>8.2/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='Электротельфер №88 (Автоклавы)'>Электротельфер №88 (Автоклавы)</option>";
                                            } 
                                        else if (selected == "Сливная") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/1 - Насос'>1.15/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/1Ф - Фильтр отстойник'>1.15/1Ф - Фильтр отстойник</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/2 - Насос'>1.15/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/3 - Насос'>1.15/3 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/3Ф - Фильтр отстойник'>1.15/3Ф - Фильтр отстойник</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/4 - Насос'>1.15/4 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/5 - Насос'>1.15/5 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/7 - Насос'>1.15/7 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/8 - Насос'>1.15/8 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.15/9 - Насос'>1.15/9 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.16/1 - Теплообменник'>1.16/1 - Теплообменник</option>";
                                                equipmentCMC.innerHTML += "<option value='1.16/2 - Теплообменник'>1.16/2 - Теплообменник</option>";
                                                equipmentCMC.innerHTML += "<option value='1.18 - Насос'>1.18 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.18М - Емкость'>1.18М - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='13.2/1 - Насос'>13.2/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='13.2/2 - Насос'>13.2/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='3.1/1 - Компрессор'>3.1/1 - Компрессор</option>";
                                                equipmentCMC.innerHTML += "<option value='3.1/2 - Компрессор'>3.1/2 - Компрессор</option>";
                                                equipmentCMC.innerHTML += "<option value='3.1/3 - Компрессор'>3.1/3 - Компрессор</option>";
                                                equipmentCMC.innerHTML += "<option value='3.1/4 - Компрессор'>3.1/4 - Компрессор</option>";
                                                equipmentCMC.innerHTML += "<option value='3.1/8 - Насос'>3.1/8 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='3.1/9 - Насос'>3.1/9 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/8 - Насос'>6.2/8 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='6.2/9 - Насос'>6.2/9 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='Вытяжка компрессоров'>Вытяжка компрессоров</option>";
                                                equipmentCMC.innerHTML += "<option value='Приточка компрессоров'>Приточка компрессоров</option>"
                                            } 
                                        else if (selected == "Баковое хозяйство") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='06V1/1 - Емкость'>06V1/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='06V1/2 - Емкость'>06V1/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='06V1/5 - Емкость'>06V1/5 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.10 - Емкость'>1.10 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.3 - Емкость'>1.3 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.4/1 - Емкость'>1.4/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.6/1 - Емкость'>1.6/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.6/2 - Емкость'>1.6/2 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.7 - Емкость'>1.7 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.9/1 - Емкость'>1.9/1 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.9/5 - Емкост'>1.9/5 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.9/6 - Емкость'>1.9/6 - Емкость</option>";
                                                equipmentCMC.innerHTML += "<option value='1.9/7 - Емкость'>1.9/7 - Емкость</option>";
                                            } 
                                        else if (selected == "Малая насосная") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='06P1/1 - Насос'>06P1/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='06P1/2 - Насос'>06P1/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='06P2/1 - Насос'>06P2/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='06P2/2 - Насос'>06P2/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.20/1 - Насос'>1.20/1 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.20/2 - Насос'>1.20/2 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.20/3 - Насос'>1.20/3 - Насос</option>";
                                                equipmentCMC.innerHTML += "<option value='1.21 - Насос'>1.21 - Насос</option>";
                                            } 
                                        else if (selected == "Расстарочная") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='Другое<'>Другое</option>";
                                            }
                                        else if (selected == "Домино") 
                                            {
                                                equipmentCMC.innerHTML += "<option value=''></option>";
                                                equipmentCMC.innerHTML += "<option value='Другое'>Другое</option>";
                                            }
                                    }
                                    
                                </script>
                            </fieldset>
                        </div>
                        <div class="col-md-7 bg-light">
                            <fieldset class="form-group border m-2 p-3 bg-white card shadow-sm">
                                <legend class="m-2 text-danger">Количество обходов</legend>
                                <div class="table-responsive">
                                    <table class="table-hover table-bordered table table-sm">
                                        <thead>
                                           <tr>
                                            <th>Фамилия И.О.</th>
                                            <th>Август</th>
                                            <th>Сентябрь</th>
                                            <th>Октябрь</th>
                                            <th>Ноябрь</th>
                                            <th>Декабрь</th>
                                            <th>Общее</th>
                                           </tr>
                                        </thead>
                                        <tbody id="tableBodyStat" onload="myFunction()" class="animate-bottom">
                                           <!-- Table data will be updated here -->
                                        </tbody>
                                     </table>
                                </div>
                            </fieldset>
                            <fieldset class="form-group border m-2 p-3 bg-white card shadow-sm">
                                <legend class="m-2 text-danger">Общее время обходов</legend>
                                <div class="table-responsive">
                                    <table class="table-hover table-bordered table table-sm">
                                        <tbody id="tableBodyStatTiming" onload="myFunction()" class="animate-bottom">
                                           <!-- Table data will be updated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="form-group border card shadow-sm">
                        <div class="table-responsive">
                            <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                        <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                            <tr>
                                                <th><p style="text-align: center">Дата</p></th>
                                                <th><p style="text-align: center">Фамилия</p></th>
                                                <th><p style="text-align: center">Описание несоответствий</p></th>
                                                <th><p style="text-align: center">Безопасно/Небезопасно</p></th>
                                                <th class="col-5"><p style="text-align: center">Комментарий</p></th>
                                                <th><p style="text-align: center">Вмешательство на месте</p></th>
                                                <th><p style="text-align: center">Вопрос перенесен в AL</p></th>
                                                <th><p style="text-align: center">Длительность</p></th>
                                                <th><p style="text-align: center">Штатный персонал</p></th>
                                                <th><p style="text-align: center">Подрядный персонал</p></th>
                                                <th><p style="text-align: center">Производство</p></th>
                                                <th><p style="text-align: center">Участок</p></th>
                                                <th style="writing-mode:vertical-rl;"><p style="text-align: center">Изменить</p></th>
                                                <th style="writing-mode:vertical-rl;"><p style="text-align: center">Удалить</p></th>
                                            </tr>
                                        </thead>
                                        <style>
                                           .fontTr
                                           {
                                               font-size:12px;
                                           }
                                           p{
                                                margin: 1px;
                                                margin: 1em;
                                                font-size:12px;
                                            }
                                        </style>
                                        <tbody onload="myFunction()" class="animate-bottom">
                                        <?php
                                        $message = "SELECT * FROM InspectionList ORDER BY date DESC";
                                        $link->set_charset("utf8");
                                        $result = mysqli_query($link, $message);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $date = $row['date'];
                                            $readonly = '';
                                            if (strtotime($date) < strtotime('-3 days')) {
                                                $readonly = 'readonly';
                                            }
                                            echo "<tr>";
                                            $minDate = date('Y-m-d', strtotime('-2 days')); // вычисляем минимальную дату
                                            if ($readonly == '') 
                                            {
                                                echo "<td><input type='date' id='input_date' class='fontTr col form-control border-0' value='$date'  min='$minDate'></td>";
                                                echo "<td><input type='text' class='fontTr col form-control border-0' id='input_name' value='$row[name]' ></input></td>";
                                                echo "<td><input type='text' class='fontTr col-2 form-control border-0' id='input_textForList' value='$row[textForList]' ></input></td>";
                                                if($row['typeSafety'] == 'Небезопасно')
                                                {
                                                    echo "<td><input style='background:lightcoral;' type='text' class='fontTr form-control border-0' id='input_typeSafety' value='$row[typeSafety]' ></input></td>";
                                                }
                                                else
                                                {
                                                    echo "<td><input type='text' class='fontTr form-control border-0' id='input_typeSafety' value='$row[typeSafety]' ></input></td>";
                                                }
                                                echo "<td><input type='text' class='fontTr form-control border-0' id='input_comment' value='$row[comment]' ></input></td>";
                                                echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention1' value='$row[intervention1]' " . ($row['intervention1'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                                echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention2' value='$row[intervention2]' " . ($row['intervention2'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                                echo "<td><input type='number' class='fontTr form-control border-0' id='input_duration' value='$row[duration]' ></input></td>";
                                                echo "<td><input type='number' class='fontTr form-control border-0' id='input_staff' value='$row[staff]' ></input></td>";
                                                echo "<td><input type='number' class='fontTr form-control border-0' id='input_contract' value='$row[contract]' ></input></td>";
                                                echo "<td><input type='text' class='fontTr form-control border-0' id='input_production' value='$row[production]' ></input></td>";
                                                echo "<td><input type='text' class='fontTr form-control border-0' id='input_area' value='$row[area]' ></input></td>";
                                            
                                                echo "<td><button type='button' class='updateInspection btn btn-outline btn-sm btn-light' value='$row[id]'><img src='change.jpg' style='height:13px;'></button></td>";
                                                echo "<td><button type='button' class='deleteInspection btn btn-outline btn-sm btn-light' value='$row[id]'><img src='trash.png' style='height:13px;'></button></td>";
                                            }
                                            else {
                                                    echo "<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                                    echo "<td><p>$row[name]</p></td>";
                                                    echo "<td><p>$row[textForList]</p></td>";
                                                    if($row['typeSafety'] == 'Небезопасно' ){
                                                        echo "<td style='background:lightcoral;'><p>$row[typeSafety]</p></td>";
                                                    }
                                                    else{
                                                        echo "<td><p>$row[typeSafety]</p></td>";
                                                    }
                                                    echo "<td><p>$row[comment]</p></td>";
                                                    echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention1' value='$row[intervention1]' " . ($row['intervention1'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                                    echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention2' value='$row[intervention2]' " . ($row['intervention2'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                                    echo "<td><p>$row[duration]</p></td>";
                                                    echo "<td><p>$row[staff]</p></td>";
                                                    echo "<td><p>$row[contract]</p></td>";
                                                    echo "<td><p>$row[production]</p></td>";
                                                    echo "<td><p>$row[area]</p></td>";
                                                    
                                                }
                                            echo"</tr>";
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>   
        </div>
        <div id="loader-overlayX">
            <div id="loaderX"></div>
        </div>
    </body>
    <?php require('arrowForUp.php') ?>
</html>
<script>
function updateTable() 
{
   $.ajax({
    url: "updateTable.php",
    success: function(data) 
    {
     $("#tableBodyStat").html(data);
    }
   });
}
function updateTableTiming() 
{
   $.ajax({
    url: "updateTableTiming.php",
    success: function(data) 
    {
     $("#tableBodyStatTiming").html(data);
    }
   });
}
$(document).ready(function() 
{ $(".add").click(function() 
    {
        var intervention1 = document.getElementById('intervention1');
        var intervention2 = document.getElementById('intervention2');
        
        var isButton1Pressed = false;
        var isButton2Pressed = false;
        if (intervention1.checked) {isButton1Pressed = 1;}
        else{isButton1Pressed = 0;}
        if (intervention2.checked) {isButton2Pressed = 1;}
        else{isButton2Pressed = 0;}
        
        var date = document.getElementById('date').value;
        var name = document.getElementById('name').value;
        var textForList = document.getElementById('textForList').value;
        const selectedButton = document.querySelector('#btnradio1:checked');
        const typeSafety = selectedButton ? selectedButton.value : 'Безопасно';
        var comment = document.getElementById('comment').value;
        var duration = document.getElementById('duration').value;
        var staff = document.getElementById('staff').value;
        var contract = document.getElementById('contract').value;
        var production = document.getElementById('production').value;
        var area = document.getElementById('areaCMC').value;
        if(typeSafety == 'Небезопасно'){
            var email_name = 'Небезопасное замечание по листу обходов';
            var email_email = "Лист обходов";
            var email_address = "alexey.kostin@lab-industries.ru";
            var email_message = name + "\r\n"  + textForList + "\r\n"  + comment;
            $.ajax({
                type: 'POST',
                url: 'send_email.php',
                data: {
                    email_name: email_name,
                    email_email: email_email,
                    email_address: email_address,
                    email_message: email_message},
                success: function(response) 
                {
                    $('#response').html(response);
                }
            });
        }
            
        if(name != ""){
            
            $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'addInspectionNew.php',
            data: {
                date: date,
                name: name,
                textForList: textForList,
                comment: comment,
                duration: duration,
                staff: staff,
                contract: contract,
                production: production,
                isButton1Pressed: isButton1Pressed,
                isButton2Pressed: isButton2Pressed,
                typeSafety: typeSafety,
                area: area
            },success: function(response) 
                        {
                            $('#name').val('');
                            $('#textForList').val('');
                            $('#typeSafety').val('');
                            $('#comment').val('');
                            $('#intervention1').prop('checked', false);
                            $('#intervention2').prop('checked', false);
                            $('#duration').val('');
                            $('#staff').val('');
                            $('#contract').val('');
                            $('#production').val('');
                            $('#area').val('');
                            var data = JSON.parse(response);
                            var newRow = "<tr><td><input id='input_date' type='date' class='fontTr form-control border-0' value='" + 
                              data.date + "'></td><td><input id='input_name' type='text' class='fontTr form-control border-0' value='" + 
                              data.name + "'></td><td><input id='input_textForList' type='text' class='fontTr form-control border-0' value='" + 
                              data.textForList + "'></td><td><input id='input_typeSafety' type='text' class='fontTr form-control border-0' value='" + 
                              data.typeSafety + "'></td><td><input id='input_comment' type='text' class='fontTr form-control border-0' value='" + 
                              data.comment + "'></td><td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' value='" + data.intervention1 + "' " + (data.intervention1 == 1 ? 'checked' : 'unchecked') + "></td><td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' value='" + 
                              data.intervention2 + "' " + (data.intervention2 == 1 ? 'checked' : 'unchecked') + "></td><td><input id='input_duration' type='number' class='fontTr form-control border-0' value='" + 
                              data.duration + "'></td><td><input id='input_staff' type='number' class='fontTr form-control border-0' value='" + 
                              data.staff + "'></td><td><input id='input_contract' type='number' class='fontTr form-control border-0' value='" + 
                              data.contract + "'></td><td><input id='input_production' type='text' class='fontTr form-control border-0' value='" + 
                              data.production + "'></td><td><input id='input_area' type='text' class='fontTr form-control border-0' value='" + 
                              data.area + "'></td><td><button type='button' class='fontTr updateInspection btn btn-outline btn-sm btn-light' value='" + 
                            data.id + "'><img src='change.jpg' style='height:13px;'></button></td><td style='font-size:10px;'><button type='button' class='deleteInspection btn btn-outline btn-sm btn-light' value='" + 
                            data.id + "'><img src='trash.png' style='height:13px;'></button></td></tr>";
                            $('#myTable tbody').prepend(newRow);
                            updateTable();
                            updateTableTiming();
                            $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
            }
            
        });
        }
        else{
            $('.alert-success_noname').fadeIn(1000).delay(3000).fadeOut(1000);
        }
        
    });
    
});

</script>
<script>

    $(document).on("click", ".deleteInspection", function() {
        var deleteUser = this.value;
        var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'deleteInspectionNew.php',
            data: { idUser: deleteUser },
            success: function(response) {
                var data = JSON.parse(response);
                row.remove(); // удаляем строку таблицы
                updateTable();
                updateTableTiming();
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
    });

</script>
<script>
    $(document).on("click", ".updateInspection", function() {
        var idInspect = $(this).val();
        var input_date = $(this).closest("tr").find("#input_date").val();
        var input_name = $(this).closest("tr").find("#input_name").val();
        var input_textForList = $(this).closest("tr").find("#input_textForList").val();
        var input_typeSafety = $(this).closest("tr").find("#input_typeSafety").val();
        var input_comment = $(this).closest("tr").find("#input_comment").val();
        var input_duration = $(this).closest("tr").find("#input_duration").val();
        var input_staff = $(this).closest("tr").find("#input_staff").val();
        var input_contract = $(this).closest("tr").find("#input_contract").val();
        var input_production = $(this).closest("tr").find("#input_production").val();
        var input_area = $(this).closest("tr").find("#input_area").val();
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'updateInspectionNew.php',
            data: {
                id: idInspect,
                input_date: input_date,
                input_name: input_name,
                input_textForList: input_textForList,
                input_typeSafety: input_typeSafety,
                input_comment: input_comment,
                input_duration: input_duration,
                input_staff: input_staff,
                input_contract: input_contract,
                input_production: input_production,
                input_area: input_area
            },
            success: function(response) {
                updateTable();
                updateTableTiming();
                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
            }
        });
    });
</script>