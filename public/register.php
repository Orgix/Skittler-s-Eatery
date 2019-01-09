<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>


<?php 
    // if(isset($_POST['register'])){
    //     $error = handle_register();
    // }
    // if(isset($_POST['login'])){
    //     echo "nb-what";
    // }
    
?>


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
                          <form method="post" action="">
                             <?php $error = handle_register(); ?>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="user_first_name" placeholder="First Name *" value="<?php echo isset($first_name)? $first_name : ''?>" />
                                  <p><?php echo isset($error['first_name']) ? $error['first_name'] :''; ?></p>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="user_last_name" placeholder="Last Name *" value="<?php echo isset($last_name)? $last_name : ''?>" />
                                  <p><?php echo isset($error['last_name']) ? $error['last_name'] :''; ?></p>
                              </div>
                              <div class="form-group">
                                  <input type="text"  class="form-control" name="username" placeholder="Username *" value="<?php echo isset($username)? $username : ''?>" />
                                  <p><?php echo isset($error['username']) ? $error['username'] :''; ?></p>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" name="user_email" value="<?php echo isset($email)? $email : ''?>" />
                                <p><?php echo isset($error['email']) ? $error['email'] :''; ?></p>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="user_password" placeholder="Password *" value="" />
                                <p><?php echo isset($error['password']) ? $error['password'] :''; ?></p>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="user_password_confirm" placeholder="Confirm Password *" value="" />
                                <p><?php echo isset($error['confirm_password']) ? $error['confirm_password'] :''; ?></p>
                            </div>

                          </div>
                          <div class=" col-md-12 form-group w-100 m-auto text-center">
                              <input type="submit" name="register" class="btnRegister rounded p-2 w-50"  value="Register"/>
                          </div>
                        </form>
                      </div>
                  </div>
                  <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <h3  class="register-heading">Login</h3>
                      <div class="row login-form">

                          <div class="col-md-12">
                          <form method="post">
                          <div class="w-100 text-center my-3">
                               <span class="h6"><?php echo display_message(); ?></span>
                               </div>
                                <?php login_user(); ?>
                            <div class="form-group w-100 m-auto pb-4">
                                <input type="email" name="login_user_email" class="form-control" placeholder="Email" value="" />
                            </div>
                              <div class="form-group w-100 m-auto">
                                  <input type="password" name="login_user_password" class="form-control" placeholder="Password" value="" />
                              </div>
                              <div class="form-group m-auto text-center">
                                  <input name="login" type="submit" class="btnLogin rounded p-2 w-50"  value="Login"/>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

              </div>



<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>