<?php
    $input_date = htmlspecialchars($_POST['input_date']);
    $input_text = htmlspecialchars($_POST['input_text']);
    $input_name = htmlspecialchars($_POST['input_name']);
    $input_duration = htmlspecialchars($_POST['input_duration']);
    $input_number_of_rounds = htmlspecialchars($_POST['input_number_of_rounds']);
    $input_number_of_nonconformities = htmlspecialchars($_POST['input_number_of_nonconformities']);
    $input_production = htmlspecialchars($_POST['input_production']);
    $input_area = htmlspecialchars($_POST['input_area']);
    $input_equipment = htmlspecialchars($_POST['input_equipment']);
    $id = htmlspecialchars($_POST['id']);
    $link = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_default');
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE bypassList 
      SET date = '$input_date', 
      name = '$input_name',
      text = '$input_text',
      duration = '$input_duration',
      number_of_rounds = '$input_number_of_rounds',
      number_of_nonconformities = '$input_number_of_nonconformities',
      production = '$input_production',
      area = '$input_area',
      equipment = '$input_equipment' WHERE id = '$id'");
?>
