<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <title>Production Daily Report</title>
        <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
        <link rel="canonical" href="/sign-in/">
        <link href="signin.css" rel="stylesheet">
        <link href="bootstrap.min.css" rel="stylesheet">
        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
        <link href="signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form method="post" action="" class="needs-validation">
                <img class="mb-4" src="free-icon.png" alt="" width="50%" height="50%">
                <p class="mb-3 fw-normal">ПОЖАЛУЙСТА, АВТОРИЗУЙТЕСЬ</p>
                <div class="form-floating">
                    <input name="login" type="text" class="form-control" id="floatingInput" value="" placeholder="введите логин" required>
                    <label for="floatingInput">Логин</label>
                    <div class="invalid-feedback">Введите логин.</div>
                </div>
                <div class="form-floating mt-1">
                    <input name="password" type="password" class="form-control" id="floatingPassword" value="" placeholder="введите пароль" required>
                    <label for="floatingPassword">Пароль</label>
                    <div class="invalid-feedback">
                        Введите пароль.
                    </div>
                </div>
                <input type="submit" value="ВОЙТИ" name="send" class="w-100 btn btn-primary"></input>

<?php
class User {
    protected $adminLogin = 'admin';
    protected $adminPass = '12345a';
    protected $userPass = '12345a';

    function user_access() {
        if(isset($_POST['login']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            if($login == $this->adminLogin && $password == $this->adminPass) {
                $_SESSION['login'] = $login;
                $visitor_ip = $_SERVER['REMOTE_ADDR'];
                $location_data = json_decode(file_get_contents("http://ip-api.com/json/".$visitor_ip));
                $str = json_encode($location_data);
                $latitude = $location_data->lat;
                $longitude = $location_data->lon;
                $visitor_ip = $_SERVER['REMOTE_ADDR'];
                $reserve = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_StandbyDatabase');
                $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
                $referrer = 'enter to app';
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $today = date("Y-m-d H:i:s");
                $login = 'Гость';
                $name = $_SERVER['REQUEST_TIME'];
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $reserve->set_charset("utf8");
                mysqli_query($reserve,"INSERT INTO visitorsKPI 
                (id, ip_address, browser, timeEnter, referrer, screen_resolution, language, latitude, longitude) 
                VALUES (NULL, '$visitor_ip', '$browser', '$today', '$referrer', '$name', '$language', '$str', '$longitude')");
                echo "<script>document.location.href='index.php';</script>";
                exit;
            } elseif($password == $this->userPass) {
                $_SESSION['login'] = $login;
                echo "<script>document.location.href='index.php';</script>";
                exit;
            } else {
                $visitor_ip = $_SERVER['REMOTE_ADDR'];
                $location_data = json_decode(file_get_contents("http://ip-api.com/json/".$visitor_ip));
                $str = json_encode($location_data);
                $latitude = $location_data->lat;
                $longitude = $location_data->lon;
                $reserve = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_StandbyDatabase');
                $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
                $referrer = 'pass_false/trying to pass';
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $today = date("Y-m-d H:i:s");
                $login = 'Гость';
                $name = $_SERVER['REQUEST_TIME'];
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $reserve->set_charset("utf8");
                mysqli_query($reserve,"INSERT INTO visitorsKPI 
                (id, ip_address, browser, timeEnter, referrer, screen_resolution, language, latitude, longitude) 
                VALUES (NULL, '$visitor_ip', '$browser', '$today', '$referrer', '$name', '$language', '$str', '$longitude')");
                echo "Введенные логин и пароль неверны!<br>";
                echo "<a href='index.php'>Назад</a>";
            }
        } else {
            $visitor_ip = $_SERVER['REMOTE_ADDR'];
                $location_data = json_decode(file_get_contents("http://ip-api.com/json/".$visitor_ip));
                $str = json_encode($location_data);
                $latitude = $location_data->lat;
                $longitude = $location_data->lon;
                $reserve = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_StandbyDatabase');
                $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
                $referrer = 'pass_false/trying to pass';
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $today = date("Y-m-d H:i:s");
                $login = 'Гость';
                $name = $_SERVER['REQUEST_TIME'];
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $reserve->set_charset("utf8");
                mysqli_query($reserve,"INSERT INTO visitorsKPI 
                (id, ip_address, browser, timeEnter, referrer, screen_resolution, language, latitude, longitude) 
                VALUES (NULL, '$visitor_ip', '$browser', '$today', '$referrer', '$name', '$language', '$str', '$longitude')");
            echo "Пожалуйста, введите логин и пароль!<br>";
            echo "<a href='index.php'>Назад</a>";
        }
    }
}
                
if(isset($_POST['send']))
    {
                $location_data = json_decode(file_get_contents("http://ip-api.com/json/".$visitor_ip));
                $str = json_encode($location_data);
                $latitude = $location_data->lat;
                $longitude = $location_data->lon;
                $visitor_ip = $_SERVER['REMOTE_ADDR'];
                $reserve = mysqli_connect('localhost', 'u1851636_default', 'MQkl8Q7m02kstwUv', 'u1851636_StandbyDatabase');
                $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
                $referrer = 'pass_true';
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $today = date("Y-m-d H:i:s");
                $login = 'Гость';
                $name = $_SERVER['REQUEST_TIME'];
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $reserve->set_charset("utf8");
                mysqli_query($reserve,"INSERT INTO visitorsKPI 
                (id, ip_address, browser, timeEnter, referrer, screen_resolution, language, latitude, longitude) 
                VALUES (NULL, '$visitor_ip', '$browser', '$today', '$referrer', '$name', '$language', '$str', '$longitude')");
    
    $object = new User;
    $object->user_access();
    }

echo <<<_END
<style>.btn {text-decoration:none;}</style>
            </form>
<footer class="fixed-bottom  w-250 mw-100 container-fluid">
    <p class="mb-1"><small class="text-muted">&copy; 2023 LAB Industries</small></p><p class="text-muted"><small>designed by Suleymanov</small></p>
</footer>
        </main>
    </body>
</html>
_END;
?>