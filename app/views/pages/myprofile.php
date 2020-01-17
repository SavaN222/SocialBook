<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
  <div class="card">
      <div class="card-header cover-img" style="background-image:url('<?php echo URLROOT; ?>/images/cover.png');">
          <img src="<?php echo URLROOT.'/'.$_SESSION['profilePic']; ?>" class='profile-pic'>
          <span class="text-dark text-pic h3">
              <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
          </span>
      </div>
      <div class="card-body">
        <nav class="pt-2 d-flex justify-content-center">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link bg-info text-white" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Info</a>
    <a class="nav-item nav-link bg-info text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pictures</a>
    <a class="nav-item nav-link bg-info text-white" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Feed</a>
  </div>
</nav>
<div class="tab-content mt-4" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Name: <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Birth Date: <?php echo $_SESSION['birthDate']; ?>
  </li>
  <li class="list-group-item align-items-center">
    Total Friends:
    <span class="badge badge-primary badge-pill"> 32</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <button class="btn btn-info w-100"><a class="text-white" href="<?php echo URLROOT; ?>/users/edit">Edit Profile</a></button>
  </li>
</ul>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row">
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
               <?php foreach($data['posts'] as $data['post']): ?>
             <div class="posts py-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="friend_info border border-primary rounded">
                    <div class="card-header d-flex justify-content-between">
                    <div class="friend_data">
                    <img class="rounded-circle post-profile-pic p-2" src="<?php echo URLROOT; ?>/<?php echo $data['post']->profile_pic; ?>" alt=""> 
                    <strong class="text-info">
                        <a href="<?php echo URLROOT; ?>/pages/profile/<?php echo $data['post']->user_id; ?>">
                        <?php echo $data['post']->fname . ' ' . $data['post']->lname; ?>
                        </a>
                    </strong>
                    <small class="text-gray-dark font-italic">
                        <?php echo $data['post']->date_added; ?>
                    </small>
                    </div>
                    <div class="dots">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    </div> <!-- card header -->

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo $data['post']->description; ?>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#">
                                20 <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
                            </a>
                            <a href="#">View posts</a>
                            <a href="#"><i class="fas fa-comment"></i>
                                 Comments 2
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

  </div>
</div>
      </div>
  </div>
</div> <!-- container -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
