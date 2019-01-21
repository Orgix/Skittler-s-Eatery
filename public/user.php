<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>


<?php 
  if(!isset($_SESSION['items'])){
    redirect("index.php");
  }
?>

<div class="container-fluid welcome-container">
  <div class="row">
  <div class="col-lg-2 welcome-left">
    <div class="mt-3 mb-3 mt-lg-5">
        <i class="fas fa-user-circle fa-6x"></i>
        <span class="username mt-2 d-block"><?php echo $_SESSION['items']['username']; ?></span>
    </div>
  </div>

<div class="col-lg-10 p-0">
  <div class="container">
      <?php 
        if(isset($_GET['mode'])){
          include(TEMPLATE_FRONT.DS."orders.php");
        }else{
          include(TEMPLATE_FRONT.DS."userform.php");
        }
      ?>
    </div>
  
</div>
</div>

</div>

<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>