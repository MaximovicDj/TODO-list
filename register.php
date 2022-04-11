<?php require_once "includes/header.php" ?>

<!--Checkign if user is logged in, it it is, redirect to index page-->
<?php if(isset($_SESSION['user_id'])) redirect("index.php"); ?>

<div id="wrapper">

  <div>
    <p id="register-title">Join Us!</p>
  </div>

  <!--Span for displaying messages-->
  <span id="regResponse"></span>

  <form id="register-form">
    <input type="text" name="first_name" id="first_name" placeholder="Enter your name here.."><br><br>
    <input type="text" name="last_name" id="last_name" placeholder="Enter your last name here.."><br><br>
    <input type="email" name="email" id="email" placeholder="Enter your email here.."><br><br>
    <input type="password" name="password" id="password" placeholder="Enter your password here.."><br><br>

    <button type="button" name="registerBtn" id="registerBtn">Register!</button>
  </form>

  <p id="login-link"><a href="login.php">Login Here..</a> </p>


</div><!-- END WRAPPER-->

<script src="js/register.js"></script>
