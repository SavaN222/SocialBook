<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="registration-box">
    <h1 class="text-center secondary-color">Login</h1>
    <div class="row">
        <div class="col-lg-6 right-divider mb-5">
           <img class="w-100 h-100" src="<?php echo URLROOT; ?>/images/registration/registration.jpg" alt="">
        </div>

        <div class="col-lg-6">
            <form action="<?php echo URLROOT; ?>/login/login" method='POST'>
                  <div class="form-group">
                    <label for="email">Email: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="errorLogin">
                    <!-- Last Name Errors Check -->
                        <?php if (!empty($data)) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errorMsg']; ?>
                        </div>
                        <?php } ?>
                </div>
                <hr>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4 class="text-info text-center">Login!</h4>
                            <button name="submit" type="submit" class="btn btn-info rounded">
                                Login
                            </button>
                             <button type="reset" class="btn btn-secondary rounded float-right">
                                Reset
                            </button>
                        </div>

                        <div class="col-lg-7 mb-3">
                            <!-- register with social -->
                            <h4 class="text-info text-center">Login with Social</h4>
                            <i class="fab fa-facebook fa-3x text-primary offset-2"></i>
                            <i class="fab fa-google-plus fa-3x text-danger ml-3"></i>
                            <i class="fab fa-instagram fa-3x text-warning ml-3"></i>
                        </div>
                        <h5 class="text-center alert alert-warning w-100">Not have an account? :(</h5>
                        <button type="button" class="btn btn-info btn-outline-primary w-100">
                            <a href="<?php echo URLROOT; ?>/register" class="text-white">Register</a>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> <!-- container -->
<?php require APPROOT . '/views/inc/footer.php'; ?>