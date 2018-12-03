<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>


  <?php include(TEMPLATE_FRONT.DS."parallax_screen.php"); ?>

  <!--Container with headings -->
  <div class="container-fluid p-5 headings-container">
    <!-- Three columns of text below the carousel -->
    <!-- Row -->
    <div class="row text-center">
      <!-- col-lg-4-->
      <div class="col-lg-4 mt-2 headings-item-side bg-white">


        <i class="fas fa-user-circle fa-6x mt-2"></i>
        <h2>Register</h2>
        <p>Why bother using your cellphone? Register and view the menu at your own leisure!Keep track of your favorite orders! Win a 15% discount on your order for every 5 orders!</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      <!-- .col-lg-4 -->
      <div class="col-lg-4 mt-2 headings-item-center ">
        <i class="fas fa-motorcycle fa-6x mt-2"></i>

        <h2>Delivery</h2>
        <p>It is not just the order process that is fast and simplified. Skittler's delivery is guaranteed to deliver the order at your door in less than half an hour! That includes both the process of preparing your order and delivering it at your
          door!</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      <!-- .col-lg-4 -->
      <div class="col-lg-4 mt-2 headings-item-side bg-white">
        <i class="far fa-clock fa-6x mt-2"></i>
        <h2>Support</h2>
        <p>Needless to say, we are here for you for any question regarding us and our menu! We provide 24/7 support. Feel free to either contact us via phone or fill in the contact form from the link below!</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

    </div><!-- /.row -->
  </div>


  <!-- Featurette container -->
  <div class="container-fluid marketing pt-5">
    <!-- row -->
    <div class="row">
      <div class=" col-md-12 col-lg-8 col-xl-9">
        <div class="row featurette">
          <div class=" col-lg-7">
            <h2 class="featurette-heading">Skittler's Burgers.<span class="text-muted">Yammy!</span></h2>
            <p class="lead">Don't falter! Skittler's Eatery burgers are made with love and care from us to you! We use fresh materials , from our home-made buns to the 100% beef burger that will change your definition of joy!</p>
          </div>
          <div class="col-lg-5">
            <img class="featurette-image img-fluid mx-auto rounded" src="<?php echo IMG_PATH;?>/burger-900x600.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-lg-7 order-lg-2">
            <h2 class="featurette-heading">Skittler's Pizza.<span class="text-muted">A cheesy paradise!</span></h2>
            <p class="lead">We take pride in our procedure of preparing pizzas! Our crust is just as thick as it should be , making it the perfect base for our fresh pizza materials! We use all kinds of cheese and we even have vegetarian items
              in our menu. Take a look!</p>
          </div>
          <div class="col-lg-5 order-lg-1">
            <img class="featurette-image img-fluid mx-auto rounded" src="<?php echo IMG_PATH;?>/pizza-900x600.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-lg-7">
            <h2 class="featurette-heading">Skittler's Sandwiches <span class="text-muted"> The joy itself!</span></h2>
            <p class="lead">Our sandwiches are among the best options for someone who wishes to eat something fast while not at home. We use the tastiest materials and our very secret sauce! Apart from the menu sandwiches, you can create a sandwich
              with your own materials.
              There is no holding back. Impress us with your very own combination!</p>
          </div>
          <div class="col-lg-5">
            <img class="featurette-image img-fluid mx-auto rounded" src="<?php echo IMG_PATH;?>/sandwich-900x600.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-lg-7 order-lg-2">

            <h2 class="featurette-heading">Soublaki!<span class="text-muted">Greece's Speciality!</span></h2>
            <p class="lead">Soublaki is actually a piece of meat in a stick. It is normally seasoned with some light spices , depending on the kind of meat used. Skittler's Eatery is using it's very own special sauce along with the spice seasoning.
              It's a combination
              that is bound to knock you out! Take a look !</p>
          </div>

          <div class="col-lg-5 order-lg-1">
            <img class="featurette-image img-fluid mx-auto rounded" src="<?php echo IMG_PATH;?>/soyblaki-900x600.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="last-featurette-divider">
      </div>
      <div class="aside col-md-12 col-lg-4 col-xl-3 pt-4">
        <div class="card">
          <div class="card-header">
            <h4>Product Search</h4>
          </div>
          <div class="card-body">
            <form action="search.php" method="post">
              <div class="input-group">
                <input name="search" type="text" class="form-control">

                <button name="submit" class="btn btn-default" type="submit">
                  <span class="fas fa-search"></span>
                </button>

              </div>
            </form>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-header">
            <i class="fas fa-users fa-2x"></i>
            <span class="h3 font-weight-bold ml-2">Sign In</span>
          </div>
          <div class="card-body">
            <form action="includes/login.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user text-dark"></i></div>
                  </div>
                  <input name="username" type="text" class="form-control" placeholder="Enter username">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key text-dark"></i></div>
                  </div>
                  <input type="password" name="user_password" class="form-control" placeholder="Enter password">
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary form-control" name="login" type="submit">
                  Submit
                </button>
              </div>

              <div class="ml-1">
                <span class="h6"><a href=''>Not a member yet? Join us!</a></span>
              </div>
            </form>
          </div>


        </div>

        <div class="card mt-2 mb-2">
          <div class="card-header">
            <i class="fas fa-map-marker-alt fa-2x"></i>
            <span class="h3 font-weight-bold ml-2">How to find us</span>
          </div>
          <div class="card-body">
            <div class="row d-flex h-100">
              <div class="col-4 col-md-5">
                <img src="<?php echo IMG_PATH;?>/map.png" class="img-fluid">
              </div>
              <div class="col-8 col-md-7 text-center justify-content-center align-self-center">
                <p>
                  Contact Number: 210-2380321
                </p>
                <a class="btn btn-primary" href="#">
                  <i class="fas fa-map fa-x"></i>
                  View map
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- / .row-->

  </div> <!-- /.Featurette container -->
<div id="map"></div>
<?php include(TEMPLATE_FRONT.DS."footer.php");?>
