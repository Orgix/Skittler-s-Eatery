<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>


<?php 
  if(!isset($_SESSION['items'])){
    redirect("index.php");
  }
?>


<div class="container">
  <div class="text-center pt-5 pb-1 h1 thank-text">
    Your order has been successfully submitted and awaits approval. Thank you for ordering from us !
  </div>
  <div class="text-center my-5 py-5">
    <i class="far fa-clock fa-10x"></i><br>
    <div class="mt-5"><span class="h2 mt-5 pt-2 delivery-time">Estimated Delivery time is 35 minutes</span></div>
    
  </div>
</div>


<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>