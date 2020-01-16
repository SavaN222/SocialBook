<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row p-2">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-info">
                <img src="<?php echo URLROOT.'/'.$_SESSION['profilePic']; ?>" class="card-img-top rounded " alt="...">
          </div>
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $_SESSION['fname']; ?></h5>
                <p class="card-blockquote font-italic">Lorem ipsum.</p>
                <hr>
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <a href="#" class="btn btn-primary">View Profile</a>
          </div>
        </div>
    </div> <!-- col-lg-3 -->

    <div class="col-lg-6"> 
        <div class="card mb-3">
            <div class="card-body border-strong">
                <p class="card-text text-primary text-center">Say something...</p>
                <form action="">
                    <div class="form-group">
                        <textarea name="" id="" class="form-control"></textarea>
                    </div>
                <div class="form-icons d-flex ">
                    <div class="form-group">
                         <button type="submit" class="btn">
                         <i class="fas fa-camera fa-3x text-info"></i>
                        </button>
                </div>
                <div class="form-group ml-auto">
                    <button type="submit" class="btn">
                    <i class="fab fa-telegram fa-3x text-info"></i>
                    </button>
                </div>
        </div>

        </form>
                    
            </div>
        </div>

        <div class="posts py-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="friend_info border border-primary rounded">
                    <div class="card-header d-flex justify-content-between">
                    <div class="friend_data">
                    <img class="rounded-circle post-profile-pic p-2" src="<?php echo URLROOT; ?>/images/profile/rohan-g-hdzBDVVsRT4-unsplash1579107981.jpg" alt=""> 
                    <strong class="text-info">John Doe</strong>
                    <small class="text-gray-dark font-italic">23.12.2020</small>
                    </div>
                    <div class="dots">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    </div> <!-- card header -->

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit incidunt provident iusto animi non nam iste. Minus error aliquid est.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#">
                                20 <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
                            </a>
                            <a href="#">
                                <i class="fas fa-comment"></i> Comments 2
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="posts py-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="friend_info border border-primary rounded">
                    <div class="card-header d-flex justify-content-between">
                    <div class="friend_data">
                    <img class="rounded-circle post-profile-pic p-2" src="<?php echo URLROOT; ?>/images/profile/rohan-g-hdzBDVVsRT4-unsplash1579107981.jpg" alt=""> 
                    <strong class="text-info">John Doe</strong>
                    <small class="text-gray-dark font-italic">23.12.2020</small>
                    </div>
                    <div class="dots">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    </div> <!-- card header -->

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit incidunt provident iusto animi non nam iste. Minus error aliquid est.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#">
                                20 <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
                            </a>
                            <a href="#">
                                <i class="fas fa-comment"></i> Comments 2
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- col-lg-6 -->

    <div class="col-lg-3"> 
        <div class="card">
            <div class="card-header bg-info">
                <img src="https://picsum.photos/200/300?random=1" class="card-img-top" alt="...">
          </div>
            <div class="card-body text-center">
                <h5 class="card-title">Random Pics.</h5>
                <p class="card-blockquote font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, illum!</p>
                <hr>
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <a href="#" class="btn btn-primary">View Profile</a>
          </div>
        </div>
    </div><!-- col-lg-3 -->
</div> <!-- row -->
</div> <!-- container -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
