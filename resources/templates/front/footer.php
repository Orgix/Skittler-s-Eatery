<footer class="sktl text-light">
    <!--questionable overlay , might be deleted soon -->
    <div class="sktl-overlay" style="background-color: rgb(255, 255, 255); opacity: 1;"></div>
    <div class="container text-center">
      <div class="row content">
        <div class="col-md-3 order-1 order-md-1 col-sm-12">
          <div class="mb-3 img-logo">
            <a href="#">
              <img src="img/logo/logo.png" alt="Skittler's Eatery" media-simple="true">
            </a>
          </div>
          <p>
            Skittler's Eatery
          </p>
        </div>
        <div class="col-md-3 order-2 order-md-4 text-left">
          <p class="mb-4 text-white font-weight-bold">
          <u>OPENING HOURS:</u>
        </p>
        <p>
          Mon-Tue: 12am - 11pm
        </p>
        <p>
          Wed: 12am - 10pm
        </p>
        <p>
          Thu-Fri: 11am - 12pm
        </p>
        <p>
          Weekend: 11am - 12pm
        </p>

        </div>










        <div class="col-md-3 col-12 order-md-2 order-3">
          <div class="d-block d-md-none card ft-card mb-0 text-left ">
            <div class="card-header collapsed" data-toggle="collapse" data-target="#col_1" aria-expanded="False">
              <a class="card-title">
                RECENT NEWS
              </a>
            </div>
          </div>
          <p class="mb-4 text-white font-weight-bold d-none d-md-block">
            <u>RECENT NEWS</u>
          </p>
          <div id="col_1" class="collapse list">
            <p class="text-light">
              <a href="info.php?page=about" class="text-black">About us</a>
              <br><a href="info.php?page=faq" class="text-black">FAQs</a>
              <br><a href="info.php?page=howitworks" class="text-black">How does it work</a>
              <br><a href="info.php?page=terms" class="text-black">Terms & Conditions</a>
              <br><a href="info.php?page=privacy" class="text-black">Privacy Policy</a>
            </p>
          </div>
        </div>
        <div class="col-md-3 col-12 order-md-3 order-4 ">
          <div class="d-block d-md-none card ft-card mb-0 text-left ">
            <div class="card-header collapsed" data-toggle="collapse" data-target="#col_2" aria-expanded="False">
              <a class="card-title">
                CATEGORIES
              </a>
            </div>
          </div>
          <p class="mb-4 text-light font-weight-bold d-none d-md-block">
            <u>CATEGORIES</u>
          </p>
          <div id="col_2" class="collapse list">
            <p class="text-light">
              <a href="menu.php" class="text-black">Menu</a>
              <br><a href="#" class="text-black">Our blog</a>
              <br><a href="info.php?page=methods" class="text-black">Payment Methods</a>
              <br><a href="info.php?page=evaluation" class="text-black">Evaluation Policy</a>
              <br><a href="info.php?page=sitemap" class="text-black">Sitemap</a>
            </p>
          </div>
        </div>
      </div>
      <div class="footer-lower">
        <div class="row">
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-lg-6  mb-lg-0 mb-2 copyright">
            <span class="">
              © Skittler's Eatery 2019 - All Rights Reserved
            </span>
          </div>
          <div class="col-sm-12  col-lg-6 m-auto">
            <div class="social-list align-right">
              <div class="soc-item d-inline-block pl-1 pr-1 pl-sm-2 pr-sm-2">
                <a href="#" target="_blank">
                  <i class="fab fa-twitter fa-2x"></i>
                </a>
              </div>
              <div class="soc-item d-inline-block pl-1 pr-1 pl-sm-2 pr-sm-2">
                <a href="#" target="_blank">
                  <i class="fab fa-facebook fa-2x"></i>
                </a>
              </div>
              <div class="soc-item d-inline-block pl-1 pr-1 pl-sm-2 pr-sm-2">
                <a href="#" target="_blank">
                  <i class="fab fa-youtube fa-2x"></i>
                </a>
              </div>
              <div class="soc-item d-inline-block pl-1 pr-1 pl-sm-2 pr-sm-2">
                <a href="#" target="_blank">
                  <i class="fab fa-instagram fa-2x"></i>
                </a>
              </div>
              <div class="soc-item d-inline-block pl-1 pr-1 pl-sm-2 pr-sm-2">
                <a href="#" target="_blank">
                  <i class="fab fa-google-plus-g fa-2x"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="go_to_top"><i class="fa fa-angle-up fa-3x"></i></div>
  </footer>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

  <?php 
    $script_include = '<script src="js/';
    if($pageName == 'index'){
      echo '<script src="js/parallax.min.js" async></script>';
      include(TEMPLATE_FRONT.DS."map.php");
      echo $script_include.'home.js" async></script>';
    }
    elseif($pageName == 'menu'){
      echo $script_include.'menu.js" async></script>';
    }
  ?>

  <script src='js/script.js' async></script>
  
  </body>

</html>