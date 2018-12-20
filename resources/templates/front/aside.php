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
                <img src="img/map.png" class="img-fluid">
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
     