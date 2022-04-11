<?php require_once "includes/header.php" ?>

<!--Checking if  user is not logged in, if it's not, redirect to login page-->
<?php if(!isset($_SESSION['user_id'])) redirect("login.php"); ?>


<div id="user-wellcome">
  <p>Wellcome  <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></p>
  <span id="logout-link"><a href='logout.php'>Logout</a></span>
</div>


<div id="wrapper">

     <div>
       <p id="list-title">DON'T FOREG TO...</p>
     </div>


     <div id="indexResponse">
       <span></span>
     </div>


     <div id="addDiv">
         <input type="text" placeholder="Title..." name="addInput" id="addInput"><button id="addBtn">Add</button>
     </div>


     <!--DIV for Load Tasks form database-->
     <div class="list">

     </div>

</div><!--END DIV WRAPPER-->

<script src='js/index.js'></script>
<?php require_once "includes/footer.php" ?>
