<?php
include("../includes/config.php");
$user = $_SESSION['userLogged'];
$userID = $user["id"];
$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'];
$description = $data['description'];
$state = $data['state'];
$errors = array();
//  validation
if (empty($title)) {
  $errors['title'] =  "Task title must fill.";
} else {
  //title validate
  if (strlen($title) < 3 || strlen($title) > 15) {
    $errors["title"] = "Title must be between 3 and 50 characters";
  } else {
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors["title"] = "Invaild title format";
    }
  }
  if (strlen($description) > 20) {
    $errors["description"] = "Description must not be more than 50 char.";
  } else {
    if (!preg_match('/^[a-zA-Z\s]+$/', $description)) {
      $errors["description"] = "Invaild description format";
    }
  }
}

if (empty($errors)) {
  $date = date("Y-m-d h:m:s");
  $query = "INSERT INTO tasks (userID,title,description,state,added_at) VALUES 
    ('$userID','$title','$description','$state','$date')";
  mysqli_query($con, $query);
} else {
  die(json_encode($errors));
}
