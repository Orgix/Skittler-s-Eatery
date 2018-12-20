 <!-- bootstrap 4 navbar -->
 <nav class="navbar navbar-expand-md navbar-dark bg-ultra-dark sticky-top">
    <div class="d-flex flex-grow-1">
      <span class="w-100 d-sm-block d-none d-md-none">
        <!-- hidden spacer to center brand on mobile -->
      </span>
      <a class="title font-weight-bold navbar-brand d-md-inline-block" href="index.php">
        Skittler's Eatery
      </a>
      <!-- <a class="navbar-brand-two mx-auto d-md-none d-inline-block" href="#">
        <img src="logo.png" alt="logo">
      </a> -->
      <div class="w-100 text-right mt-1">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 pb-1" id="myNavbar">
      <ul class="navbar-nav ml-auto flex-nowrap font-weight-bold">
        <li class="nav-item">
          <a href="index.php" class="nav-link mr-3 mt-2 menu-item  p-0"><i class="fas fa-home mr-1"></i>Home</a>
        </li>
        <li class="nav-item">
          <a href="menu.php" class="nav-link mr-3 mt-2 menu-item  p-0"><i class="fas fa-book-open mr-1"></i>Menu</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link mr-3 mt-2 menu-item  p-0"><i class="fas fa-info-circle mr-1"></i>About us</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link mr-3 mt-2 menu-item  p-0"><i class="fas fa-phone mr-1"></i>Contact</a>
        </li>
        <li class='nav-item'>
          <a href='register.php' class='nav-link  mr-1  ml-md-2 mt-2   menu-item  p-0'><i class="fas fa-sign-in-alt mr-1"></i>Sign In</a>
        </li>
        <div class="dropdown d-none d-md-block">
        <button class="dropdown-toggle btn btn-danger text-white ml-md-2 font-weight-bold" type="button" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i><span class="pl-2">Username</span>
        </button>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item font-weight-bold" href="#"><i class="fa fa-user mr-1 mr-md-2"></i>My profile</a></li>
            <li><a class="dropdown-item font-weight-bold" href="#"><i class="fa fa-shopping-basket mr-1 mr-md-2"></i>My orders</a></li>
            <li><a class="dropdown-item font-weight-bold" href="#"><i class="fa fa-shopping-cart mr-1 mr-md-2"></i>My cart</a></li>
            <li><a class="dropdown-item font-weight-bold" href="#"><i class="fas fa-sign-out-alt mr-1 mr-md-2"></i>Logout</a></li>

          </ul>
      </div>
      <li class="d-block d-md-none" id="small-breakpoint">
        <hr class="toggler-divider">
        <div class="text-center"><span class="h4">Username</span></div>
        <ul class=""></ul>
</li>
      </ul>
    </div>
  </nav>
<!-- /.bootstrap 4 navbar -->