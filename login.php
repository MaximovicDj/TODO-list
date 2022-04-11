<?php require_once "includes/header.php" ?>

<!--Checkign if user is logged in, it it is, redirect to index page-->
<?php if(isset($_SESSION['user_id'])) redirect("index.php"); ?>

<div id="wrapper">


  <div>
    <p id="login-title">Wellcome to Login Page</p>
  </div>

  <!--SPAN form displaying messages-->
  <span id="loginResponse"></span>

  <!--Displayig session message From another page-->
  <?php if(isset($_SESSION['message'])): ?>
    <p id="successMsg"><?php echo $_SESSION['message']; ?></p>
  <?php unset($_SESSION['message']); ?>
  <?php endif; ?>


  <form id="login-form">
    <input type="email" name="email" id="email" placeholder="Enter your email here.."><br><br>
    <input type="password" name="password" id="password" placeholder="Enter your password here.."><br><br>
    <button type="button" name="loginBtn" id="loginBtn">Login!</button>
  </form>

  <p id="link"><a href="register.php">Register Here..</a> </p>


</div><!-- END WRAPPER-->

<script src='js/login.js'></script>
<?php require_once "includes/footer.php" ?>
