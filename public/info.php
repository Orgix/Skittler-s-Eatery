<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>

<div class="container-fluid welcome-container">
  <div class="row">
    <div class="col-12 p-0">
      <div class="w-100  text-center info-title position-relative">
          <div class="info-title-overlay"></div>
            <?php

                if(isset($_GET['page'])){
                    $pages=[['about','About Us'], ['faq','FAQs'], ['howitworks','How does it work'],
                    ['contact','Contact Us'], ['terms','Terms & Conditions'],['privacy','Privacy Policy'],
                    ['methods', 'Payment Methods'], ['evaluation','Evaluation Policy'],['sitemap','Sitemap']];
                    $pageRequested = $_GET['page']; 
                    $pageInfo = get_info($pageRequested);
                    $title = $pageInfo[0];
            
                
            ?>
            <span class="h2 text-light"><?php echo $title ?></span>
          </div>
        </div>
  <div class="col-md-3 welcome-left">
            <div class="menu-card card d-block d-md-none mb-0 text-center">
                <div class="card-header collapsed" data-toggle="collapse" data-target="#info_list" aria-expanded="False">
                  <a class="h4">
                    Information
                  </a>
                </div>
              </div>
        <ul class="collapse info-list my-2 p-0 w-100 " id="info_list">
            <?php echo generate_items($pages, $pageRequested); ?>
            
  </div>

<div class="col-md-9 p-0">
    
<div class="container my-3 info-text">
   <?php include(TEMPLATE_FRONT.DS."info/".$pageInfo[1]); ?>
 </div> 
</div>
</div>

</div>
<?php
                 }
                 else{
                     redirect("index.php");
                 }?>
<?php include(TEMPLATE_FRONT.DS."footer.php")?>