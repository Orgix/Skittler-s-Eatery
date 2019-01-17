<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php"); ?>


<?php 
  if(!isset($_SESSIONS['items'])){
    redirect("index.php");
  }
?>

<div class="container-fluid welcome-container">
  <div class="row">
  <div class="col-lg-2 welcome-left">
    <div class="mt-3 mb-3 mt-lg-5">
        <i class="fas fa-user-circle fa-6x"></i>
        <span class="username mt-2 d-block"><?php echo $_SESSION['items']['username']; ?></span>
    </div>
  </div>

<div class="col-lg-10 p-0">
  <div class="container">
    <form action="">
        <div class="row">
          <div class="col-12 pb-3 mt-3">
          <span class="h2">Your profile</span>
        </div>
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="text" name="firstname" placeholder="Firstname">
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <input class="form-control" type="text" name="firstname" placeholder="Surname">
                </div>
          </div>
          <!-- <div class="col-md-12">
          <div class="form-group mw-50">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-key text-dark"></i></div>
                </div>
                <input type="password" name="user_password" class="form-control" placeholder="Enter password">
              </div>
            </div>
          </div> -->
          <div class="col-md-12">
              <div class="form-group mw-50">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                
                <input class="form-control" type="text" name="username" placeholder="Username">
                
                      </div>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group mw-50">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-at"></i></div>
                      </div>

                  <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
              </div>
          </div>
          <div class="col-md-12">

              <div class="form-group mw-50">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                      </div>
                  <input class="form-control" type="tel" name="telephone" placeholder="Telephone">
                </div>
                </div>
          </div>

          <div class="col-12 pb-3 mt-5">
              <span class="h2">Change Password</span>
            </div>
            <div class="col-md-12">

                <div class="form-group mw-50">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-key text-dark"></i></div>
                        </div>
                    <input class="form-control" type="password" name="new_password" placeholder="New password">
                  </div>
                  </div>
            </div>
            <div class="col-md-12">

                <div class="form-group mw-50">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-key text-dark"></i></div>
                        </div>
                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm new password">
                  </div>
                  </div>
            </div>
            <div class="col-md-12">

                <div class="form-group mw-50">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-key text-dark"></i></div>
                        </div>
                    <input class="form-control" type="password" name="old_password" placeholder="Current password">
                  </div>
                  </div>
            </div>
            <div class="col-12 my-4">
              <input type="submit" class="form-control btn btn-danger mw-25" name="submit" value="Save changes">
            </div>
        </div>
      </form>
    </div>
  
</div>
</div>

</div>

<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>