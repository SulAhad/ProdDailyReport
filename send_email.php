<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name = $_POST['email_name'];
  $email = $_POST['email_email'];
  $address = $_POST['email_address'];
  $message = $_POST['email_message'];

  $to = $address; // Замените на фактический адрес получателя
  $subject = $name;
  $body = $message;

  $headers = "From: $email";
    // Формирование тела письма с вложением



  // Отправка письма с вложением
  if (mail($to, $subject, $body, $headers)) {
    echo "Сообщение успешно отправлено руководителю!";
  } else {
    echo "Ошибка при отправке сообщения.";
  }
}
?>