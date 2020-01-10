<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="registration-box">
    <h1 class="text-center secondary-color">Registration</h1>
    <div class="row">
        <div class="col-lg-6 right-divider mb-5">
           <img class="w-100 h-100" src="<?php echo URLROOT; ?>/images/registration/registration.jpg" alt="">
        </div>

        <div class="col-lg-6">
            <form action="<?php echo URLROOT; ?>/register/create" method='POST'>
                <div class="form-group">
                    <label for="fname">First Name: </label>
                    <input type="text" class="form-control" name="fname" 
                    value="<?php echo isset($data['userData']['fname']) ? 
                      $data['userData']['fname'] : '';  ?>">
                     <!-- Name Errors Check -->
                        <?php if (!empty($data['errors']['errorName'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorName']; ?>
                        </div>
                        <?php } ?>
                </div>

                  <div class="form-group">
                    <label for="lname">Last Name: </label>
                    <input type="text" class="form-control" name="lname"
                    value="<?php echo isset($data['userData']['lname']) ? 
                      $data['userData']['lname'] : '';  ?>">
                     <!-- Last Name Errors Check -->
                        <?php if (!empty($data['errors']['errorLastName'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorLastName']; ?>
                        </div>
                        <?php } ?>
                </div>

                 <div class="form-group">
                    <label for="gender">Gender: </label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="none" selected="" disabled="">Chose your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                     <!-- Gender Errors Check -->
                        <?php if (!empty($data['errors']['errorGender'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorGender']; ?>
                        </div>
                        <?php } ?>
                </div>

                  <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email"
                    value="<?php echo isset($data['userData']['email']) ? 
                      $data['userData']['email'] : '';  ?>">
                     <!-- Email Errors Check -->
                        <?php if (!empty($data['errors']['errorEmail'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorEmail']; ?>
                        </div>
                        <?php } ?>
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="cpassword">Confirm Password: </label>
                    <input type="password" class="form-control" name="cpassword">
                     <!-- Passwords Errors Check -->
                        <?php if (!empty($data['errors']['errorPassword'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorPassword']; ?>
                        </div>
                        <?php } ?>
                </div>

                 <div class="form-group">
                    <label for="birth">Birth Date: </label>
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
                    <input type="file" class="form-control" name="profilePic">
                </div>

                <hr>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4 class="text-info text-center">Join us!</h4>
                            <button name="submit" type="submit" class="btn btn-success rounded">
                                Register
                            </button>
                             <button type="reset" class="btn btn-secondary rounded float-right">
                                Reset
                            </button>
                        </div>

                        <div class="col-lg-7 mb-3">
                            <!-- register with social -->
                            <h4 class="text-info text-center">Register with Social</h4>
                            <i class="fab fa-facebook fa-2x text-primary offset-2"></i>
                            <i class="fab fa-google-plus fa-2x text-danger ml-3"></i>
                            <i class="fab fa-instagram fa-2x text-warning ml-3"></i>
                        </div>
                        <h5 class="text-center alert-danger w-100">Already Have an Account?</h5>
                          <a href="#" class="text-info page-link bg-dark text-center w-100">
                                LOGIN...
                             </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>