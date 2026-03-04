<?php
require_once "app/classes/User.php";
require_once "authentication/Authenticator.php";
require_once "inc/header.php";

$user = new User();

if($user->is_logged() && $user->is_2fa_enabled() && $user->is_2fa_entered()){
  header("Location: index.php");
  exit();
}elseif($user->is_logged() && !$user->is_2fa_enabled()){
  header("Location: index.php");
  exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$name=$_POST["name"];
$username=$_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


$created = $user -> create($name, $username, $email, $password);



 if($created)
{
  
$_SESSION['message']['type'] = "success";
$_SESSION['message']['text'] = "Uspesno registrovan nalog";
$Authenticator = new Authenticator();
$secret = $Authenticator->generateRandomSecret();
$_SESSION['auth_secret'] = $secret;
    $qrCodeUrl = $Authenticator->getQR('Moj osnovac-' .$username, $_SESSION['auth_secret']);
    $_SESSION['qrCodeUrl'] = $qrCodeUrl;

    $user_id = $_SESSION['user_id'];
$user->setSecretKey($user_id, $_SESSION['auth_secret']);
header("Location:index.php");
exit();

}else{
  $_SESSION['message']['type'] = "danger";
  $_SESSION['message']['text'] = "Greska";
  header("Location: register.php");
  exit();
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<h3 class="text-center py-5">Register</h3>
<form method="post" action=""  style="position: relative; 
  top: 50px; 
  left: 100px;">
<div class="form-group mb-3" > 
    <label for="name">Full Name<label>
    <input type="text" class="form-control" id="name" name="name" required> 
</div>

<div class="form-group mb-3">
<label for="username">Username</label>
<input type="text" class="form-control" id="username" name="username" required>
</div>

<div class="form-group mb-3">
<label for="email">Email address</label>
<input type="email" class="form-control" id="email" name="email" required> 
</div>

<div class="form-group mb-3">
<label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" required> 
</div>

<button type="submit" class="btn btn-primary">Register</button> 
</form>
</body>
</html>
<?php 
require_once "inc/footer.php";

?>