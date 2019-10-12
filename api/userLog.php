<?php
include("../includes/config.php");
$data = json_decode(file_get_contents("php://input"), true);
$errors = array();
//  validate email
if (empty($data["email"]) || empty($data["password"])) {
  $errors['Error'] =  "Fill All field";
} else {
  // check if email is exists
  $password = md5($data["password"]);
  $email = $data["email"];
  $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
  if (mysqli_num_rows($query) == 1) {
    $row = $query->fetch_assoc();
    $_SESSION['userLogged'] = $row;
  } else {
    $errors['Error'] = "Not found in record";
  }
}
if (!empty($errors)) {
  die(json_encode($errors));
}
