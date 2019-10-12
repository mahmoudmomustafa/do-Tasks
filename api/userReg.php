<?php
include("../includes/config.php");
$data = json_decode(file_get_contents("php://input"), true);
$fullName = $data['fullName'];
$userName = $data['userName'];
$email = $data['email'];
$password = $data['password'];
$rePassword = $data['rePassword'];
$errors = array();
//  validate email
if (empty($fullName) || empty($userName) || empty($email) || empty($password)) {
  $errors['Error'] =  "Fill All field";
} else {
  //firstName validate
  if (strlen($fullName) < 3 || strlen($fullName) > 50) {
    $errors["fullName"] = "Name must be between 5 and 25 characters";
  } else {
    if (!preg_match('/^[a-zA-Z\s]+$/', $fullName)) {
      $errors["fullName"] = "Invaild Name format";
    }
  }
  //UserName validate
  $userQuery = mysqli_query($con, "SELECT userName FROM users WHERE userName='$userName'");
  if (mysqli_num_rows($userQuery) != 0) {
    $errors["userName"] = "UserName already taken";
  } else {
    if (strlen($userName) < 5 || strlen($userName) > 50) {
      $errors["userName"] = "UserName must be between 5 and 25 characters";
    } else {
      if (!preg_match('/^[a-zA-Z\s]+$/', $userName)) {
        $errors["userName"] = "Invaild UserName format";
      }
    }
  }
  //email validate
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Invalid Email address";
  } else {
    $query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) != 0) {
      $errors["email"] = "Mail address is taken";
    }
  }
  //password validate
  if ($password != $rePassword) {
    $errors["password"] = "Passwords not match";
  } else {
    if (strlen($password) < 3) {
      $errors["password"] = "Passwords must be more than 3 char.";
    }
  }
}

if (empty($errors)) {
  $encryptPass = md5($password); //hash password
  $date = date("Y-m-d h:m:s");
  $query = "INSERT INTO users (fullName,userName,email,password,created_at) VALUES 
    ('$fullName','$userName','$email','$encryptPass','$date')";
  $quer = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($quer) == 1) {
    $row = $quer->fetch_assoc();
    $_SESSION['userLogged'] = $row;
  }
} else {
  die(json_encode($errors));
}
