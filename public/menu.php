<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>

<div class="container-fluid welcome-container">
  <div class="row">
    <div class="col-12 p-0">
        <div class="w-100  text-center menu-title position-relative">
            <div class="menu-title-overlay"></div>
              <span class="h2 text-light">Our menu</span>
            </div>
    </div>
  <div class="col-lg-3 position-relative d-none d-lg-block welcome-left">

      <div class="my-3">
        <span class="h3">Order Page</span>
      </div>

      <ul class="category_list m-0 p-0 w-100">
        <?php $category = get_categories(); 
              echo $category[1];
        ?>
      </ul>

    </div>
<div class="col-lg-9 p-0 ">



  <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active menu-tab" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Order</a>
    <a class="nav-item nav-link checkout-tab" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Checkout</a>
  </div>
</nav>
<div class="tab-content pb-4" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="container-fluid menu" >
     <?php fetch_categories_with_items($category[0]); ?>
    </div>
  </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container checkout">
      <form id="order-form" method="POST">
  <div class="form-row py-2">
    <div class="col-md-6">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" placeholder="Address and Number" required>
    </div>
    <div class="col-md-2">
      <label for="floor">Select Floor</label>
      <select class="form-control" name="floor">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
      </select>
    </div>
    <div class="col-md-4"></div>
    </div>
    <div class="form-row py-2">
      <div class="col-md-8">
        <label for="doorbell">Doorbell Name</label>
        <input type="text" class="form-control" name="doorbell" placeholder="Name" required>
      </div>
      <div class="col-md-8 my-2">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" name="phone" required>
      </div>
    </div>
  <div class="form-row py-2">
    <div class="col-md-8">
    <label for="extraInfo">Add more details (optional)</label>
    <textarea class="form-control" name="extraInfo" rows="4"></textarea>
  </div>
  </div>
  <button type="submit" class="btn submit-button">Submit Order</button>
  </form>

  </div>
    </div>
  </div>

</div>

</div>
</div>

</div>





<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>