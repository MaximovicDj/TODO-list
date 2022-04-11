<?php


session_start();
require_once "db_connect.php";
require_once "../function/function.php";

$option = $_GET['option'];// $_GET param for choosing action
$msg['error'] = ""; // variables to return JSON to JS
$msg['success'] = ""; // variables to return JSON to JS


// SELECT ALL TASKS FROM DATABASE
if($option == "select")
{
  $result = $db->query("SELECT * FROM tasks WHERE user_id = {$_SESSION['user_id']}");
  $result = $result->fetch_all(MYSQLI_ASSOC);
  echo JSON_encode($result, 256);
}

// ADDING NEW TASK
if($option == "add")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Sanitize input
  $task = trim($_POST['task']);
  $user_id = $_SESSION['user_id'];
  if($task == ""){
    $msg['error'] = "You must enter the task";
  }
  else {
    $result = $db->query("INSERT INTO tasks (title, user_id) VALUES ('{$task}', {$user_id})");
    if($result){
      $msg['success'] = "Successfuly added task";
    }
    else {
      $msg['error'] = "Error while adding task";
    }
  }
  echo JSON_encode($msg, 256);
}


//DELETE Task ON BUTTON 'X'
if($option == "delete")
{
  $id = $_POST['id'];
  $result = $db->query("DELETE FROM tasks WHERE id = {$id}");
  if($result){
    $msg['success'] = "Successfuly done task!";
  }
  else {
    $msg['error'] ="Error while deleteing task";
  }
  echo JSON_encode($msg, 256);
}


 ?>
