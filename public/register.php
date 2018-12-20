<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>

<div class="container-fluid register">
      <div class="row">
          <div class="col-lg-3 d-none d-lg-block register-left bg-ultra-dark">

              <img src="img/svgs/burger.svg" alt="">
              <h3>Welcome</h3>
              <p>You are 30 seconds away from our delicious menu</p>

        </div>
          <div class="col-lg-9 d-md-12 register-right mt-0">
              <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Register</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Login</a>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h3 class="register-heading">Register</h3>
                      <div class="row register-form">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="First Name *" value="" />
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Last Name *" value="" />
                              </div>
                              <div class="form-group">
                                  <input type="text"  class="form-control" placeholder="Username *" value="" />
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                            </div>

                          </div>
                          <div class=" col-md-12 form-group w-100 m-auto text-center">
                              <input type="submit" class="btnRegister rounded p-2 w-50"  value="Register"/>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <h3  class="register-heading">Login</h3>
                      <div class="row login-form">

                          <div class="col-md-12">
                            <div class="form-group w-100 m-auto pb-4">
                                <input type="text" class="form-control" placeholder="Userame" value="" />
                            </div>
                              <div class="form-group w-100 m-auto">
                                  <input type="password" class="form-control" placeholder="Password" value="" />
                              </div>
                              <div class="form-group w-100 m-auto text-center">
                                  <input type="submit" class="btnLogin rounded p-2 w-50"  value="Login"/>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

              </div>



<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>