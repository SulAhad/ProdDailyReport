<?php
require('connect_db.php');
if(isset($_POST['send']))
{
        $typeSafety = $_POST['btnradio'];
        $today = date('d.m.Y');
        $month = date('m');
        $fileNme = $_FILES["image"]["type"];
        if($fileNme != null)
        {
            $imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $base64 = file_get_contents($_FILES['image']['tmp_name']);
            $status = "Не выбрано";
            $ip = $_SERVER['REMOTE_ADDR'];
            $ipClient = $_SERVER['SERVER_PORT'];
            $a = 'admin';
            //Если данные верны
            if($link)
                 {
                $link->set_charset("utf8");
                mysqli_query($link, "INSERT INTO `bypassList` 
                  (`id`, 
                  `date`, 
                  `name`, 
                  `text`, 
                  `status`,
                  `image`,
                  `area`,
                  `monthName`,
                  `type`,
                  `typeSafety`) 
                  VALUES (NULL,
                  '$today', 
                  '$_POST[LastName]',
                  '$_POST[DefText]',
                  '$status',
                  '$imagetmp',
                  '$_POST[area]',
                  '$month',
                  '$_POST[type]',
                  '$typeSafety')");
                  echo "<script>document.location.href='index.php';</script>";
                }
        }
        else
        {
            
            $status = "Не выбрано";
            $ip = $_SERVER['REMOTE_ADDR'];
            $ipClient = $_SERVER['SERVER_PORT'];
            $a = 'admin';
            //Если данные верны
            if($link)
                 {
                $link->set_charset("utf8");
                mysqli_query($link, "INSERT INTO `bypassList` 
                  (`id`, 
                  `date`, 
                  `name`, 
                  `text`, 
                  `status`,
                  `area`,
                  `monthName`,
                  `type`,
                  `typeSafety`) 
                  VALUES (NULL,
                  '$today', 
                  '$_POST[LastName]',
                  '$_POST[DefText]',
                  '$status',
                  '$_POST[area]',
                  '$month',
                  '$_POST[type]',
                  '$typeSafety')");
                  echo "<script>document.location.href='index.php';</script>";
                }
        }

        
}
?>-->