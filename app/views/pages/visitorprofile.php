<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
  <div class="card">
      <div class="card-header cover-img" style="background-image:url('<?php echo URLROOT; ?>/<?php echo $data['coverPic']; ?>');">
          <img src="<?php echo URLROOT.'/'.$data['profilePic']; ?>" class='profile-pic'>
          <span class="text-dark text-pic h3">
              <?php echo $data['fname'] . ' ' . $data['lname']; ?>
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
    Name: <?php echo $data['fname'] . ' ' . $data['lname']; ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Birth Date: <?php echo $data['birthDate']; ?>
  </li>
  <li class="list-group-item align-items-center">
    Total Friends:
    <span class="badge badge-primary badge-pill"><?php echo $data['totalFriends']->total; ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <button type="button" <?php echo $data['status']['btn'] ?> class="btn btn-info"><a class="text-white" 
        href="<?php echo $data['status']['href'] . $data['id']; ?>" >
      <?php echo $data['status']['text']; ?></a></button>   
      <button class="btn btn-info">Send Message</button>    
  </li>
</ul>

  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
       <div class="row">
       <?php foreach($data['gallery'] as $data['photo']): ?>
        <div class="col-lg-4">
            <img src="<?php echo URLROOT; ?>/<?php echo $data['photo']->photo; ?>" alt="..." class="img-thumbnail">
            <p class="gallery-desc border border-secondary rounded">
              <?php echo $data['photo']->description;?>
            </p>
        </div>
       <?php endforeach; ?>
    </div>
  </div>
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
                            <form class="likeForm">
                                <button class="btn likeBtn" value="<?php echo $data['post']->id;?>">
                                    <span data-liked='false' id="likeTxt<?php echo $data['post']->id;?>" class="text-info"><?php echo $data['post']->likes; ?></span>
                                    <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i>
                                </button>
                            </form>
                            <form id="commentsForm<?php echo $data['post']->id; ?>">
                            <a class="btn text-info" data-toggle="collapse" href="#commentBox<?php echo $data['post']->id; ?>" role="button" aria-expanded="false" aria-controls="commentBox<?php echo $data['post']->id; ?>">
                                 <button class="btn commentShow" name="postId" value="<?php echo $data['post']->id; ?>">
                                <i class="fas fa-comment"></i>
                                    Comments
                                 </button>
                            </a>
                            </form>
                        </div>
                            <!-- comments -->
                                <div class="collapse" id="commentBox<?php echo $data['post']->id; ?>">
                                    <div id="commentsOutput<?php echo $data['post']->id;?>">
                                    </div>
                                <form class="d-flex justify-content-between commentForm">
                                    <textarea id="commentText<?php echo $data['post']->id; ?>" name="description" class="form-control description" 
                                    placeholder="<?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?> write a comment..."></textarea>
                                    <button type="submit" class="btn sendcom" name="postId" value="<?php echo $data['post']->id;?>">
                    <i class="fab fa-telegram fa-3x text-info"></i>
                    </button>
                                </form>
                                </div> 
                            <!-- End comments -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
  </div>
</div> <!-- container -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
