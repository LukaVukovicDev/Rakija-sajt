<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/classes/User.php';
require_once "Authenticator.php";

$user= new User();




if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}
$scrkey=$user->getSecretKey($_SESSION['user_id']);
$Authenticator = new Authenticator();
$checkResult = $Authenticator->verifyCode($scrkey, $_POST['code'], 2);    // 2 = 2*30sec clock tolerance



if ($checkResult) {
    $_SESSION['failed'] = false; // Reset to false on successful verification
    $_SESSION['authenticated'] = true;
    header("Location: ../index.php");
    exit();
} else {
    $_SESSION['failed'] = true;
    $_SESSION['authenticated'] = false; 
    header("location: index.php");
    die();
}

$is2faEntered = $user->is_2fa_entered();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentication Successful</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel='shortcut icon' href='/favicon.ico'  />
    <style>
        body,html {
            height: 100%;
        }       


        .bg { 
            /* The image used */
            background-image: url("images/bg.jpg");
            /* Full height */
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
           
            background-size: cover;
        }
    </style>
</head>
<body  class="bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"  style="background: white; padding: 20px; box-shadow: 10px 10px 5px #888888; margin-top: 100px;">
                <hr>
                    <div style="text-align: center;">
                           <h1>Authentication Successful</h1>
                           
                    </div>
                <hr>    
                    
            </div>
        </div>
    </div>
</body>
</html>