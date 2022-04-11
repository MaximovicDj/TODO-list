<?php

session_start();
require_once "db_connect.php";
require_once "../function/function.php";

$option = $_GET['option']; // $_GET param for choosing action
$msg['error'] = ""; // Variable to return JSON to JS
$msg['success'] = ""; // Variable to return JSON to JS


//LOGIN USER
if($option == "login")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  if($email == ""){
    $msg['error'] = "Field email is required";
  }
  elseif(!userExists($email)){ // CHECKING if USER EXISTS
    $msg['error'] = "User doesn't exists";
  }
  elseif($password == ""){
    $msg['error'] = "Field password is required";
  }
  elseif(!checkUserPass($email, $password)){ // CHECKING IF IS VALID PASSWORD FOR USER
    $msg['error'] = "Wrong password";
  }

  if($msg['error'] == ""){
    $_SESSION['message'] = "Wellcome, make your TO DO list, so you don't forget!";
    createSession($email);
    $msg['success'] = "index.php";
  }

  echo JSON_encode($msg, 256);
}

 ?>
