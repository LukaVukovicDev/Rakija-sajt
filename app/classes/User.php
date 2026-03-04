<?php
require_once __DIR__ . '/../config/config.php';

class User{
protected $conn;

public function __construct(){
global $conn;
$this->conn = $conn;


}
public function setSecretKey($user_id, $secretKey) {
  $sql = "UPDATE users SET secretKey = ? WHERE user_id = ?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bind_param("si", $secretKey, $user_id);
  $stmt->execute();
}

public function getSecretKey($user_id) {
  $sql = "SELECT secretKey FROM users WHERE user_id = ?";
  
  // Prepare the SQL statement
  $stmt = $this->conn->prepare($sql);

  // Check if the statement was prepared successfully
  if (!$stmt) {
      return false; // Handle the error appropriately
  }

  // Bind the user_id parameter
  $stmt->bind_param("i", $user_id);

  // Execute the statement
  $stmt->execute();

  // Bind the result to a variable
  $stmt->bind_result($secretKey);

  // Fetch the result
  if ($stmt->fetch()) {
      // $secretKey now contains the secretKey from the database
      return $secretKey;
  } else {
      return null; // User not found or no result
  }

  // Close the statement
  $stmt->close();
}


public function is_2fa_enabled(){

$query = "SELECT * FROM users WHERE user_id = ? AND 2fa = 1";
$stmt=$this->conn->prepare($query);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
return true;

}

return false;


}

public function is_2fa_entered(){

  if( $_SESSION['failed']==false){
return true;


  }else{

return false;
  }

}

public function set_2fa($newstate, $user_id){
  $sql = "UPDATE users SET 2fa=?  WHERE user_id = ?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bind_param("ii", $newstate, $user_id);
  $stmt->execute();
}

public function getUserInfo($userId) {
  $sql = "SELECT username, email, 2fa FROM users WHERE user_id = ?";
  $stmt = $this->conn->prepare($sql);

  if ($stmt === false) {
      return false;
  }

  $stmt->bind_param("i", $userId);

  if ($stmt->execute() === false) {   
      return false;
  }

  $stmt->bind_result($username, $email, $twoFactorAuth);

  if ($stmt->fetch()) {
      return [
          'username' => $username,
          'email' => $email,
          '2fa' => $twoFactorAuth
      ];
  } else {
      return null; 
  }
}


  public function create($name,$username, $email, $password){

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql ="INSERT INTO users(name, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);

    $result = $stmt->execute();

if ($result){
    $_SESSION['user_id'] = $stmt->insert_id;
    return true;

}else{
  return false;

    }

  }

public function login($username, $password){
$sql = "SELECT user_id, password FROM users WHERE username = ?";
$stmt = $this->conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$results= $stmt->get_result();

if($results->num_rows == 1){
$user = $results->fetch_assoc();

if(password_verify($password, $user['password'])){
$_SESSION['user_id'] = $user['user_id'];

return true;


}

}

return false;

}

public function is_logged(){

if(isset($_SESSION['user_id'])){
return true;

}
return false;
}

public function is_admin(){

$query = "SELECT * FROM users WHERE user_id = ? AND is_admin = 1";
$stmt=$this->conn->prepare($query);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
return true;

}

return false;

}


public function logout(){
unset($_SESSION['user_id']);

}

}

?>