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
    
    <a class="nav-item nav-link bg-info text-white" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edit Post</a>
  </div>
</nav>
<div class="tab-content mt-4" id="nav-tabContent">

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <?php foreach($data['posts'] as $data['post']): ?>
             <div class="posts py-3">
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
                    <div class="dots ">
                      <a class="btn dropdown-toggle" href="#" role="button" id="postControl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <!-- dropdown controls -->
                        <div class="dropdown-menu" aria-labelledby="postControl">
                          <a class="dropdown-item" href="#">Back Home</a>
                          <a class="dropdown-item" href="<?php echo URLROOT; ?>/posts/deletePost/<?php echo $data['post']->id;?>">
                          Delete Post
                        </a>
                        </div>
                    </div>
                    </div> <!-- card header -->

                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo URLROOT;?>/posts/updatePost/<?php echo $data['post']->id;?>" method="POST">
                            <textarea type="text" name="description" class="form-control"><?php echo $data['post']->description;?></textarea>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                                <button name="submit" class="btn btn-info">UPDATE POST</button> 
                            </form>
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
