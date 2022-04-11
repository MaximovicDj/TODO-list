<?php

//function to check if user exitst;
function userExists($email){
  global $db;
  $result = $db->query("SELECT * FROM users WHERE email = '{$email}'");
  $row = $result->fetch_object();
  if($row) return true;
  else return false;
}


//function to check user password
function checkUserPass($email, $password){
  global $db;
  $result = $db->query("SELECT * FROM users WHERE email = '{$email}'");
  $row = $result->fetch_object();
  $hash_password = $row->password;
  if(password_verify($password, $hash_password)) return $row;
  else return false;

}


//create session
function createSession($email){
  global $db;
  $result = $db->query("SELECT * FROM users WHERE email = '{$email}'");
  $row = $result->fetch_object();
  $_SESSION['user_id'] = $row->id;
  $_SESSION['first_name'] = $row->first_name;
  $_SESSION['last_name'] = $row->last_name;
  $_SESSION['email'] = $row->email;
}


//redirect function
function redirect($location){
  header("location:{$location}");
}


 ?>
