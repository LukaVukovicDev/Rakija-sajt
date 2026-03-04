<?php 
require_once "app/classes/User.php";
require_once "inc/header.php";

$user=new User();


if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST['username'];
$password = $_POST['password'];


$result= $user->login($username, $password);

if(!$result){
$_SESSION['message']['type'] = "danger";
$_SESSION['message']['text']= "Netacan username ili sifra!!!";
header("Location: login.php");
exit();
}
if ($user->is_logged()) {
  // Check if 2FA is enabled for the logged-in user
  if ($user->is_2fa_enabled()) {
      // Redirect to 2FA authentication page
      header("Location: authentication/index.php");
      exit();
  } else {
      // Redirect to the main index page
      header("Location: index.php");
      exit();
  }
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="row justify-content-center"> 
  <div class="col-lg-5">
    <h3 class="text-center py-5">Login</h3> 
    <form action="" method="POST">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="username" name="username" class="form-control" id="username"> 
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password"> 
  </div>
  <button type="submit" class="btn btn-primary">Login</button> 
    </form>


  <a href="register.php">Register</a> </div>
</div>
</body>
</html>


<?php require_once "inc/footer.php";?>