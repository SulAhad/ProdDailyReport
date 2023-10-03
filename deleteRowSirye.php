<?php
    $idUser = htmlspecialchars($_POST['idUser']);
    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
    $sql = "DELETE FROM `Sirye_KPI` WHERE id = '$idUser'";
    $link->set_charset("utf8");
    mysqli_query($link, $sql);
    // Возвращаем данные в виде JSON-объекта
    echo json_encode(array('idUser' => $idUser));
?>