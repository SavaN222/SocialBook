<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="registration-box">
    <h1 class="text-center secondary-color">Registration</h1>
    <div class="alert alert-info" role="alert">
    Like others social networks we are going to sell your data, <strong>BUT!</strong>
    you will get 10%.
    </div>
    <div class="row">
        <div class="col-lg-6 right-divider mb-5">
           <img class="w-100 h-100" src="<?php echo URLROOT; ?>/images/registration/registration.jpg" alt="">
        </div>

        <div class="col-lg-6">
            <form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/register/index" method='POST'>
                <div class="form-group">
                    <label for="fname">First Name: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control" name="fname" 
                    value="<?php echo isset($data['userData']['fname']) ? 
                      $data['userData']['fname'] : '';  ?>">
                </div>
                <!-- Name Errors Check -->
                        <?php if (!empty($data['errors']['errorName'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorName']; ?>
                        </div>
                        <?php } ?>

                  <div class="form-group">
                    <label for="lname">Last Name: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control" name="lname"
                    value="<?php echo isset($data['userData']['lname']) ? 
                      $data['userData']['lname'] : '';  ?>">
                </div>
                <!-- Last Name Errors Check -->
                        <?php if (!empty($data['errors']['errorLastName'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorLastName']; ?>
                        </div>
                        <?php } ?>

                 <div class="form-group">
                    <label for="gender">Gender: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        </div>
                    <select name="gender" id="gender" class="form-control">
                        <option value="none" selected="" disabled="">Chose your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                 <!-- Gender Errors Check -->
                        <?php if (!empty($data['errors']['errorGender'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorGender']; ?>
                        </div>
                        <?php } ?>

                  <div class="form-group">
                    <label for="email">Email: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                    <input type="email" class="form-control" name="email"
                    value="<?php echo isset($data['userData']['email']) ? 
                      $data['userData']['email'] : '';  ?>">
                </div>
                 <!-- Email Errors Check -->
                        <?php if (!empty($data['errors']['errorEmail'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorEmail']; ?>
                        </div>
                        <?php } ?>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>        
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="cpassword">Confirm Password: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                    <input type="password" class="form-control" name="cpassword">
                </div>
                <!-- Passwords Errors Check -->
                        <?php if (!empty($data['errors']['errorPassword'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorPassword']; ?>
                        </div>
                        <?php } ?>

                 <div class="form-group">
                    <label for="birth">Birth Date: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    <input type="date" class="form-control" name="birth"
                    value="<?php echo isset($data['userData']['birthDate']) ? 
                      $data['userData']['birthDate'] : '';  ?>">
                </div>
                <!-- Birth Date Errors Check -->
                        <?php if (!empty($data['errors']['errorBirth'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorBirth']; ?>
                        </div>
                        <?php } ?>

                 <div class="form-group">
                    <label for="profilePic">Profile Pic: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-camera"></i></span>
                        </div>
                    <input type="file" class="form-control" name="profilePic">
                </div>
                 <!-- Picture Errors Check -->
                        <?php if (!empty($data['errors']['errorPic'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorPic']; ?>
                        </div>
                        <?php } ?>

                        <div class="form-group">
                    <label for="coverPic">Cover Pic: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-camera"></i></span>
                        </div>
                    <input type="file" class="form-control" name="coverPic">
                </div>
                 <!-- Picture Errors Check -->
                        <?php if (!empty($data['errors']['errorCoverPic'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorCoverPic']; ?>
                        </div>
                        <?php } ?>

                <hr>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4 class="text-info text-center">Join us!</h4>
                            <button name="submit" type="submit" class="btn btn-info rounded">
                                Register
                            </button>
                             <button type="reset" class="btn btn-secondary rounded float-right">
                                Reset
                            </button>
                        </div>

                        <div class="col-lg-7 mb-3">
                            <!-- register with social -->
                            <h4 class="text-info text-center">Register with Social</h4>
                            <i class="fab fa-facebook fa-3x text-primary offset-2"></i>
                            <i class="fab fa-google-plus fa-3x text-danger ml-3"></i>
                            <i class="fab fa-instagram fa-3x text-warning ml-3"></i>
                        </div>
                        <h5 class="text-center alert alert-warning w-100">Already Have an Account?</h5>
                          <h5 class="text-center alert alert-primary w-100">
                              <a class="text-dark" href="<?php echo URLROOT; ?>/login/index">Login..</a>
                          </h5>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> <!-- container -->
<?php require APPROOT . '/views/inc/footer.php'; ?>