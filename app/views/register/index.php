<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="registration-box">
    <h1 class="text-center secondary-color">Registration</h1>
    <div class="row">
        <div class="col-lg-6 right-divider mb-5">
           <img class="w-100 h-100" src="<?php echo URLROOT; ?>/images/registration/registration.jpg" alt="">
        </div>
        <div class="col-lg-6">
            <form action="#">
                <div class="form-group">
                    <label for="fname">First Name: </label>
                    <input type="text" class="form-control" name="fname">
                </div>
                  <div class="form-group">
                    <label for="lname">Last Name: </label>
                    <input type="text" class="form-control" name="lname">
                </div>
                 <div class="form-group">
                    <label for="gender">Gender: </label>
                    <select name="" id="" class="form-control">
                        <option value="" selected="" disabled="">Chose your gender</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                        <option value="">Other</option>
                    </select>
                </div>
                  <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password: </label>
                    <input type="password" class="form-control" name="cpassword">
                </div>
                 <div class="form-group">
                    <label for="birth">Birth Date: </label>
                    <input type="date" class="form-control" name="birth">
                </div>
                 <div class="form-group">
                    <label for="profilePic">Profile Pic: </label>
                    <input type="file" class="form-control" name="profilePic">
                </div>
                <hr>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4 class="text-info text-center">Join us!</h4>
                            <button type="submit" class="btn btn-success rounded">
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