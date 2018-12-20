<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>

<div class="container-fluid welcome-container">
  <div class="row">
  <div class="col-lg-2 d-none d-lg-block welcome-left">
    <div class="mt-5 pt-5 inner-left">
        <img src="img/svgs/burger.svg" alt="">
        <h3>Welcome</h3>
        <p>You are 30 seconds away from our delicious menu</p>
    </div>
  </div>

<div class="col-lg-10 p-0">

  <div class="welcome-screen" data-parallax="scroll" data-image-src="img/1-1949-.jpg">
    <div class="parallax-curtain"></div>
      <div class="w-100 text-center">


        <div class="welcome-text text-light m-auto w-75 position-absolute">
          <span class="font-weight-bold">YOUR FAVORITE</span><br>
          <span class="font-weight-bold">FOOD DELIVERY SERVICE</span><br>
          <p>Welcome to Food Delivery, a place where you can order your favorite restaurant dishes, drinks, and desserts at   affordable price. We are glad to offer you the best food in the area to everyone.</p>
          <a href="menu.php"><span class="btn text-light font-weight-bold">ORDER NOW</span></a>
      </div>
    </div>
  </div>
</div>
</div>

</div>


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
            <img class="featurette-image img-fluid mx-auto rounded" src="img/burger-900x600.jpg" alt="Generic placeholder image">
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
            <img class="featurette-image img-fluid mx-auto rounded" src="img/pizza-900x600.jpg" alt="Generic placeholder image">
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
            <img class="featurette-image img-fluid mx-auto rounded" src="img/sandwich-900x600.jpg" alt="Generic placeholder image">
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

          <div class="col-lg-5 order-lg-1 ">
            <img class="featurette-image img-fluid mx-auto rounded" src="img/soyblaki-900x600.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">
      </div>



      <!--Aside-->
        <?php include(TEMPLATE_FRONT.DS."aside.php"); ?>
      <!-- / .aside-->
    </div><!-- /.row-->
  </div> <!-- /.Featurette container -->




  <!--google map api-->
  <div id="map"></div>

<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>
