<?php

session_start();
require_once "db_connect.php";
require_once "../function/function.php";

$option = $_GET['option']; // $_GET param for choosing action
$msg['error'] = ""; // Variable to return JSON to JS
$msg['success'] = ""; // Variable to return JSON to JS


//REGISTER NEW USER AND STORE TO DATABASE
if($option == "register")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Sanitize input
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  if($first_name == ""){
    $msg['error'] = "Field name is required";
  }
  elseif($last_name == ""){
    $msg['error'] = "Field last name is required";
  }
  elseif($email == ""){
    $msg['error'] = "Field email is required";
  }
  elseif(userExists($email)){ // Checking if user exists
    $msg['error'] = "User already exists";
  }
  elseif($password == ""){
    $msg['error'] = "Field password is required";
  }
  elseif(strlen($password) < 6){ //checking if password is too short
    $msg['error'] = "Password need to be at least 6 characters long";
  }
  else {
    if($msg['error'] == ""){
      $password = password_hash($password, PASSWORD_DEFAULT); // Hashing password
      $result = $db->query("INSERT INTO users (first_name, last_name, email, password) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}')");
      if($result){
        $_SESSION['message'] = "You have successfuly registered, you can login now"; // returning session message to display in another page
        $msg['success'] = "login.php";
      }
      else $msg['error'] = "Error while registration";
    }
  }

  echo JSON_encode($msg, 256);
}

 ?>
