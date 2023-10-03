<?php 
require('connect_db.php');
$visitor_ip = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$location_data = json_decode(file_get_contents("http://ip-api.com/json/".$visitor_ip));
$str = json_encode($location_data);
$latitude = $location_data->lat;
$longitude = $location_data->lon;
$allowed_ip = array('212.176.115.57', '217.118.90.206', '93.81.135.183');

if (in_array($visitor_ip, $allowed_ip)) {
    require('bridge2.php');
} else {
    $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $referrer = 'ip_false';
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $today = date("Y-m-d H:i:s");
    $login = 'Гость';
    $name = $_SERVER['REQUEST_TIME'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $reserve->set_charset("utf8");
    mysqli_query($reserve,"INSERT INTO visitorsKPI 
    (id, ip_address, browser, timeEnter, referrer, screen_resolution, language, latitude, longitude) 
    VALUES (NULL, '$visitor_ip', '$browser', '$today', '$referrer', '$name', '$language', '$str', '$longitude')");
    session_destroy();
    echo "<style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
          }
          h1 {
            text-align: center;
            margin-top: 50px;
          }
          p {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
          }
        </style>";
    echo "<body>";
    echo "<h1>Доступ запрещен!</h1>";
    echo "<p>Извините, но вам запрещен доступ на этот сайт в соответствии с цифровой безопасностью предприятия. Мы понимаем, что это может быть неудобно для вас, но мы принимаем все меры для защиты нашей информации и обеспечения безопасности нашего бизнеса.</p>";
    echo "<p>Мы строго следуем политике безопасности и применяем передовые технологии для защиты наших данных. Мы убеждены, что это необходимо для сохранения конфиденциальности наших клиентов и защиты нашей компании от любых угроз.</p>";
    echo "<p>Если вы имеете официальное разрешение на доступ к этому сайту, пожалуйста, свяжитесь с администрацией предприятия, чтобы получить соответствующие разрешения.</p>";
    echo "<p>Мы благодарим вас за понимание и надеемся на ваше сотрудничество в обеспечении безопасности нашей компании.</p>";
    echo "</body>";
    exit();
} 
?>
